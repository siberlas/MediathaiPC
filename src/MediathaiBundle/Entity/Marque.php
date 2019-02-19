<?php

namespace MediathaiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marque
 */
class Marque
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
    private $description;


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
     * @return Marque
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
     * Set description
     *
     * @param string $description
     * @return Marque
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @var \MediathaiBundle\Entity\Service
     */
    private $service;


    /**
     * Set service
     *
     * @param \MediathaiBundle\Entity\Service $service
     * @return Marque
     */
    public function setService(\MediathaiBundle\Entity\Service $service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \MediathaiBundle\Entity\Service 
     */
    public function getService()
    {
        return $this->service;
    }
    /**
     * @var \MediathaiBundle\Entity\Media
     */
    private $image;


    /**
     * Set image
     *
     * @param \MediathaiBundle\Entity\Media $image
     * @return Marque
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
