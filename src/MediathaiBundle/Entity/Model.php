<?php

namespace MediathaiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 */
class Model
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
     * @return Model
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
     * @var \MediathaiBundle\Entity\Marque
     */
    private $marque;


    /**
     * Set marque
     *
     * @param \MediathaiBundle\Entity\Marque $marque
     * @return Model
     */
    public function setMarque(\MediathaiBundle\Entity\Marque $marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \MediathaiBundle\Entity\Marque 
     */
    public function getMarque()
    {
        return $this->marque;
    }
    /**
     * @var \MediathaiBundle\Entity\Media
     */
    private $image;


    /**
     * Set image
     *
     * @param \MediathaiBundle\Entity\Media $image
     * @return Model
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
