<?php

namespace MediathaiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Couleur
 */
class Couleur
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
     * @return Couleur
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
     * @var \MediathaiBundle\Entity\Model
     */
    private $model;


    /**
     * Set model
     *
     * @param \MediathaiBundle\Entity\Model $model
     * @return Couleur
     */
    public function setModel(\MediathaiBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \MediathaiBundle\Entity\Model 
     */
    public function getModel()
    {
        return $this->model;
    }
    /**
     * @var \MediathaiBundle\Entity\Media
     */
    private $image;


    /**
     * Set image
     *
     * @param \MediathaiBundle\Entity\Media $image
     * @return Couleur
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
