<?php

namespace MediathaiBundle\Controller;

use MediathaiBundle\Entity\Model;
use MediathaiBundle\Entity\Reparation;
use MediathaiBundle\Entity\Panne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MediathaiBundle\Entity\Reparateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository('MediathaiBundle:Service')->findAll();

        return $this->render('MediathaiBundle:Default:index.html.twig',array('services'=>$services));
    }

    public function boutiqueAction()
    {
        return $this->render('MediathaiBundle:Reparer:boutique.html.twig');
    }

    public function servicesAction($service_id)
    {
        $fil=array();
        $session = $this->get('session');
        $session->set('service_id',$service_id);
        $session->set('fil',$fil);
        $marque_id = null;


        $em = $this->getDoctrine()->getManager();
        $marques = $em->getRepository('MediathaiBundle:Marque')->findBy(array('service' => $service_id));

        return $this->render('MediathaiBundle:Reparer:services.html.twig',array('marques' => $marques,'service_id' => $service_id));
    }


    public function modelsAction($marque_id)
    {
        $fil=array();
        $session = $this->get('session');
        $session->set('marque_id',$marque_id);

        $em = $this->getDoctrine()->getManager();
        $models = $em->getRepository('MediathaiBundle:Model')->findBy(array('marque' => $marque_id));
        $marque = $em->getRepository('MediathaiBundle:Marque')->find($marque_id);

        $session->set('filAppareil', $marque->getNom());
        $fil['Appareil'] =  $marque->getNom();

       // dump($models);

        return $this->render('MediathaiBundle:Reparer:models.html.twig',array('models' => $models,'service_id'=>$session->get('service_id'),'marque_id' =>$marque_id,'fil' => $fil));
    }

    public function couleursAction($model_id)
    {
        $fil=array();
        $session = $this->get('session');
        $session->set('model_id',$model_id);
        $service_id = $session->get('service_id');
        $marque_id =  $session->get('marque_id');

        $em = $this->getDoctrine()->getManager();
        $couleurs= $em->getRepository('MediathaiBundle:Couleur')->findBy(array('model' => $model_id));

        $model = $em->getRepository('MediathaiBundle:Model')->find($model_id);

        if($model instanceof Model)
        $session->set('filModel', $model->getNom());

        $fil['Appareil'] = $session->get('filAppareil');

        if($model instanceof Model)
        $fil['Model'] =  $model->getNom();


        return $this->render('MediathaiBundle:Reparer:couleurs.html.twig',array('couleurs' => $couleurs,'model_id' => $model_id,'service_id'=>$service_id,'fil' => $fil,'marque_id' => $marque_id));
    }

    public function pannesAction($model_id,$couleur_id)
    {
        $fil=array();
        $session = $this->get('session');
        $service_id = $session->get('service_id');
        $marque_id =  $session->get('marque_id');

        $session->set('couleur_id',$couleur_id);
        $em = $this->getDoctrine()->getManager();
        $pannes= $em->getRepository('MediathaiBundle:Panne')->findBy(array('model' => $model_id));
        $couleur = $em->getRepository('MediathaiBundle:Couleur')->find($couleur_id);

        $session->set('filCouleur', $couleur->getNom());

        $fil['Appareil'] = $session->get('filAppareil');
        $fil['Model'] =  $session->get('filModel');
        $fil['Couleur'] =  $couleur->getNom();

        return $this->render('MediathaiBundle:Reparer:pannes.html.twig',array('pannes' => $pannes,'fil' => $fil,'model_id' => $model_id,'couleur_id' =>$couleur_id,'service_id' => $service_id, 'marque_id' => $marque_id));
    }

    public function rendezvousAction()
    {
        return $this->render('MediathaiBundle:Reparer:rendez-vous.html.twig');
    }

    public function recapitulatifAction($pannes = null ,$panne = null,Request $request)
    {
        $fil=array();
        $prixTotal = 0;
        $tabInfo = array();
        $tabPannes = array();
        $tabObjectPannes = array();
        $argPannes = $pannes;

        $em = $this->getDoctrine()->getManager();


        $services = $em->getRepository('MediathaiBundle:Service')->findAll();
        $service = $em->getRepository('MediathaiBundle:Marque')->find($this->get('session')->get('service_id'));
        $marque = $em->getRepository('MediathaiBundle:Marque')->find($this->get('session')->get('marque_id'));
        $model = $em->getRepository('MediathaiBundle:Model')->find($this->get('session')->get('model_id'));
        $couleur = $em->getRepository('MediathaiBundle:Couleur')->find($this->get('session')->get('couleur_id'));

        $tabInfo['Model'] = $model->getNom();
        $tabInfo['Couleur'] = $couleur->getNom();
        $session = $this->get('session');

        $fil['Appareil'] = $session->get('filAppareil');
        $fil['Model'] =  $session->get('filModel');
        $fil['Couleur'] =   $session->get('filCouleur');

      //  dump($pannes);
        if ($pannes != null) {

            $tabPannes= explode(',',$pannes);

            $fil['pannes'] = $tabPannes;
            $session->set('tabPannes', $tabPannes);

            foreach ($tabPannes as $nomPanne) {
                $objectPanne = $em->getRepository('MediathaiBundle:Panne')->findBy(array('nom' =>$nomPanne ));
                array_push($tabObjectPannes,$objectPanne[0]);
            }
           // dump($tabObjectPannes);
            $session->set('pannes',$tabObjectPannes);
        }
        else {
            $fil['pannes'] = $session->get('tabPannes');
        }

        if($panne != null) {

            $tabObjectPannes = $session->get('pannes');
            $objectPanne = $em->getRepository('MediathaiBundle:Panne')->findBy(array('nom' =>$panne ));
            //dump($objectPanne[0]);
            $key = -1;
            foreach ( $tabObjectPannes as $keyObject => $object ) {
                //dump($keyObject);
                if($object->getNom() == $objectPanne[0]->getNom() ) {
                    $key = $keyObject;
                }
            }

            if($key !=  -1) {
                unset($tabObjectPannes[$key]);
               // dump($tabObjectPannes);
            }
            $session->set('pannes',$tabObjectPannes);
        }
        else {
            $argPannes = $session->get('argPannes');
        }

        $reparation = new Reparation();
        $formReparation = $this->get('form.factory')->createBuilder('form',$reparation);
        $formReparation
           ->add('nomClient' , 'text')
           ->add('prenomClient' , 'text')
           ->add('adresseClient' , 'text')
           ->add('mailClient', 'text')
           ->add('telClient', 'text')
           ->add('date' , 'text')
           ->add('heure' , 'text')
            ->add('commentaire',"textarea")
           ->add('valider' , 'submit');

        $form =  $formReparation->getForm();

       $form->handleRequest($request);
        if($form->isValid()) {

            foreach ($session->get('pannes') as $object) {
                $prixTotal = $prixTotal + $object->getPrix();
            }

            $reparation->setIdReparateur(0);
            $reparation->setPrix($prixTotal);
            $reparation->setMarque($marque->getNom());
            $reparation->setPannes(serialize($session->get('panne')));
            $reparation->setType($service->getNom());
            $reparation->setCouleur($couleur->getNom());

            $em = $this->getDoctrine()->getManager();
            $em->persist($reparation);
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice',"Votre demande de réparation à bien été prise en compte");

            $container = $this->container;
            $mailer = $container->get('mailer');

            $message = (new \Swift_Message('test swiftMailer'))
            ->setFrom('lassana.dansoko@gmail.com')
            ->setTo('lassana.dansoko@gmail.com')
                ->setBody(
                    $this->renderView(
                        'MediathaiBundle:Default:index.html.twig',
                        array('services' => $services)
                    ),
                        'text/html');

            $request->getSession()->getFlashBag()->add('notice',"Votre demande de réparation à bien été prise en compte");
            $mailer->send($message);

            return $this->redirectToRoute('mediathai_homepage');
        }
        return $this->render('MediathaiBundle:Reparer:recapitulatif.html.twig',array('tabInfo' => $tabInfo, 'tabObjectPannes' => $tabObjectPannes,'fil' => $fil,'pannes' =>$argPannes,'service_id' => $service->getId(),'marque_id' => $marque->getId(),'model_id'=>$model->getId(),'couleur_id'=>$couleur->getId(),'form'=>$form->createView()));
    }

    public function testAction()
    {
        return $this->render('MediathaiBundle:Reparer:test.html.twig');
    }
}


