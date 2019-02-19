<?php

namespace MediathaiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 */
class Service
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
     * @return Service
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
     * @var \MediathaiBundle\Entity\Media
     */
    private $image;


    /**
     * Set image
     *
     * @param \MediathaiBundle\Entity\Media $image
     * @return Service
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
