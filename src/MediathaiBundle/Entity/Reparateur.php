<?php

namespace MediathaiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reparateur
 */
class Reparateur
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var string
     */
    private $photo;

    /**
     * @var int
     */
    private $note;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Reparateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Reparateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Reparateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Reparateur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Reparateur
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set note
     *
     * @param integer $note
     * @return Reparateur
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }
    /**
     * @var string
     */
    private $oneToOne;


    /**
     * Set oneToOne
     *
     * @param string $oneToOne
     * @return Reparateur
     */
    public function setOneToOne($oneToOne)
    {
        $this->oneToOne = $oneToOne;

        return $this;
    }

    /**
     * Get oneToOne
     *
     * @return string 
     */
    public function getOneToOne()
    {
        return $this->oneToOne;
    }
    /**
     * @var \MediathaiBundle\Entity\Media
     */
    private $image;


    /**
     * Set image
     *
     * @param \MediathaiBundle\Entity\Media $image
     * @return Reparateur
     */
    public function setImage(\MediathaiBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \MediathaiBundle\Entity\Media 
     */
    public function getImage()
    {
        return $this->image;
    }
}
