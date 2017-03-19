<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Randonnees as Randonnees;

/**
 * Commentaires
 *
 * @ORM\Table(name="commentaires")
 * @ORM\Entity
 */
class Commentaires
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Randonnees", inversedBy="commentaires")
     * @ORM\JoinColumn(name="randonnee_cle", referencedColumnName="cle")
     */
    private $randonnee;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="collective_cle", type="integer")
     */
    private $collectiveCle;

    /**
     * @var string
     *
     * @ORM\Column(name="animateur_surnom", type="string", length=255, nullable=false)
     */
    private $animateurSurnom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    private $timestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", length=65535, nullable=true)
     */
    private $commentaire;



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
     * Set collectiveCle
     *
     * @param integer $collectiveCle
     *
     * @return Commentaires
     */
    public function setCollectiveCle($collectiveCle)
    {
        $this->collectiveCle = $collectiveCle;

        return $this;
    }

    /**
     * Get collectiveCle
     *
     * @return integer
     */
    public function getCollectiveCle()
    {
        return $this->collectiveCle;
    }

    /**
     * Set animateurSurnom
     *
     * @param string $animateurSurnom
     *
     * @return Commentaires
     */
    public function setAnimateurSurnom($animateurSurnom)
    {
        $this->animateurSurnom = $animateurSurnom;

        return $this;
    }

    /**
     * Get animateurSurnom
     *
     * @return string
     */
    public function getAnimateurSurnom()
    {
        return $this->animateurSurnom;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return Commentaires
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Commentaires
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set randonnee
     *
     * @param Randonnees $randonnee
     *
     * @return Commentaires
     */
    public function setRandonnee(Randonnees $randonnee = null)
    {
        $this->randonnee = $randonnee;

        return $this;
    }

    /**
     * Get randonnee
     *
     * @return Randonnees
     */
    public function getRandonnee()
    {
        return $this->randonnee;
    }
}
