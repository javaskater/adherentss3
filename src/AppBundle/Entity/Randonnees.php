<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Randonnees
 *
 * @ORM\Table(name="randonnees")
 * @ORM\Entity
 */
class Randonnees
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cle;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="typeRando", type="string", length=20, nullable=true)
     */
    private $typerando;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbParticipants", type="integer", nullable=true)
     */
    private $nbparticipants;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="nomProgramme", type="string", length=255, nullable=true)
     */
    private $nomprogramme;

    /**
     * @var float
     *
     * @ORM\Column(name="distanceInferieure", type="float", precision=10, scale=0, nullable=true)
     */
    private $distanceinferieure;

    /**
     * @var float
     *
     * @ORM\Column(name="distanceCalculee", type="float", precision=10, scale=0, nullable=true)
     */
    private $distancecalculee;

    /**
     * @var float
     *
     * @ORM\Column(name="distanceSuperieure", type="float", precision=10, scale=0, nullable=true)
     */
    private $distancesuperieure;

    /**
     * @var integer
     *
     * @ORM\Column(name="unite", type="integer", nullable=true)
     */
    private $unite;

    /**
     * @var integer
     *
     * @ORM\Column(name="allure", type="integer", nullable=true)
     */
    private $allure;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDepartAller", type="datetime", nullable=true)
     */
    private $heuredepartaller;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureChgtArriveeAller", type="datetime", nullable=true)
     */
    private $heurechgtarriveealler;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureChgtDepartAller", type="datetime", nullable=true)
     */
    private $heurechgtdepartaller;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureArriveeAller", type="datetime", nullable=true)
     */
    private $heurearriveealler;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureDepartRetour", type="datetime", nullable=true)
     */
    private $heuredepartretour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureChgtArriveeRetour", type="datetime", nullable=true)
     */
    private $heurechgtarriveeretour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureChgtDepartRetour", type="datetime", nullable=true)
     */
    private $heurechgtdepartretour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureArriveeRetour", type="datetime", nullable=true)
     */
    private $heurearriveeretour;

    /**
     * @var string
     *
     * @ORM\Column(name="allerGareDepart", type="string", length=255, nullable=true)
     */
    private $allergaredepart;

    /**
     * @var string
     *
     * @ORM\Column(name="allerChangementNb", type="string", length=255, nullable=true)
     */
    private $allerchangementnb;

    /**
     * @var string
     *
     * @ORM\Column(name="allerGareArrivee", type="string", length=255, nullable=true)
     */
    private $allergarearrivee;

    /**
     * @var string
     *
     * @ORM\Column(name="itineraire", type="text", length=65535, nullable=true)
     */
    private $itineraire;

    /**
     * @var string
     *
     * @ORM\Column(name="retourGareDepart", type="string", length=255, nullable=true)
     */
    private $retourgaredepart;

    /**
     * @var string
     *
     * @ORM\Column(name="retourChangementNb", type="string", length=255, nullable=true)
     */
    private $retourchangementnb;

    /**
     * @var string
     *
     * @ORM\Column(name="retourGareArrivee", type="string", length=255, nullable=true)
     */
    private $retourgarearrivee;

    /**
     * @var string
     *
     * @ORM\Column(name="multiDates", type="string", length=255, nullable=true)
     */
    private $multidates;

    /**
     * @var string
     *
     * @ORM\Column(name="horairesVerification", type="string", length=255, nullable=true)
     */
    private $horairesverification;

    /**
     * @var string
     *
     * @ORM\Column(name="denivelees", type="string", length=1, nullable=false)
     */
    private $denivelees;

    /**
     * @var string
     *
     * @ORM\Column(name="description_denivelees", type="text", length=65535, nullable=false)
     */
    private $descriptionDenivelees;

    /**
     * @var string
     *
     * @ORM\Column(name="efface", type="string", length=1, nullable=true)
     */
    private $efface;

    /**
     * @var string
     *
     * @ORM\Column(name="syncLocal", type="string", length=1, nullable=true)
     */
    private $synclocal;

    /**
     * @var string
     *
     * @ORM\Column(name="syncDistant", type="string", length=1, nullable=true)
     */
    private $syncdistant;


    /**
     * @ORM\OneToMany(targetEntity="Commentaires", mappedBy="randonnee")
     * 
     */
    protected $commentaires;
    

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    } 
    
    
    /**
     * Get cle
     *
     * @return integer
     */
    public function getCle()
    {
        return $this->cle;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Randonnees
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set typerando
     *
     * @param string $typerando
     *
     * @return Randonnees
     */
    public function setTyperando($typerando)
    {
        $this->typerando = $typerando;

        return $this;
    }

    /**
     * Get typerando
     *
     * @return string
     */
    public function getTyperando()
    {
        return $this->typerando;
    }

    /**
     * Set nbparticipants
     *
     * @param integer $nbparticipants
     *
     * @return Randonnees
     */
    public function setNbparticipants($nbparticipants)
    {
        $this->nbparticipants = $nbparticipants;

        return $this;
    }

    /**
     * Get nbparticipants
     *
     * @return integer
     */
    public function getNbparticipants()
    {
        return $this->nbparticipants;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Randonnees
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set nomprogramme
     *
     * @param string $nomprogramme
     *
     * @return Randonnees
     */
    public function setNomprogramme($nomprogramme)
    {
        $this->nomprogramme = $nomprogramme;

        return $this;
    }

    /**
     * Get nomprogramme
     *
     * @return string
     */
    public function getNomprogramme()
    {
        return $this->nomprogramme;
    }

    /**
     * Set distanceinferieure
     *
     * @param float $distanceinferieure
     *
     * @return Randonnees
     */
    public function setDistanceinferieure($distanceinferieure)
    {
        $this->distanceinferieure = $distanceinferieure;

        return $this;
    }

    /**
     * Get distanceinferieure
     *
     * @return float
     */
    public function getDistanceinferieure()
    {
        return $this->distanceinferieure;
    }

    /**
     * Set distancecalculee
     *
     * @param float $distancecalculee
     *
     * @return Randonnees
     */
    public function setDistancecalculee($distancecalculee)
    {
        $this->distancecalculee = $distancecalculee;

        return $this;
    }

    /**
     * Get distancecalculee
     *
     * @return float
     */
    public function getDistancecalculee()
    {
        return $this->distancecalculee;
    }

    /**
     * Set distancesuperieure
     *
     * @param float $distancesuperieure
     *
     * @return Randonnees
     */
    public function setDistancesuperieure($distancesuperieure)
    {
        $this->distancesuperieure = $distancesuperieure;

        return $this;
    }

    /**
     * Get distancesuperieure
     *
     * @return float
     */
    public function getDistancesuperieure()
    {
        return $this->distancesuperieure;
    }

    /**
     * Set unite
     *
     * @param integer $unite
     *
     * @return Randonnees
     */
    public function setUnite($unite)
    {
        $this->unite = $unite;

        return $this;
    }

    /**
     * Get unite
     *
     * @return integer
     */
    public function getUnite()
    {
        return $this->unite;
    }

    /**
     * Set allure
     *
     * @param integer $allure
     *
     * @return Randonnees
     */
    public function setAllure($allure)
    {
        $this->allure = $allure;

        return $this;
    }

    /**
     * Get allure
     *
     * @return integer
     */
    public function getAllure()
    {
        return $this->allure;
    }

    /**
     * Set heuredepartaller
     *
     * @param \DateTime $heuredepartaller
     *
     * @return Randonnees
     */
    public function setHeuredepartaller($heuredepartaller)
    {
        $this->heuredepartaller = $heuredepartaller;

        return $this;
    }

    /**
     * Get heuredepartaller
     *
     * @return \DateTime
     */
    public function getHeuredepartaller()
    {
        return $this->heuredepartaller;
    }

    /**
     * Set heurechgtarriveealler
     *
     * @param \DateTime $heurechgtarriveealler
     *
     * @return Randonnees
     */
    public function setHeurechgtarriveealler($heurechgtarriveealler)
    {
        $this->heurechgtarriveealler = $heurechgtarriveealler;

        return $this;
    }

    /**
     * Get heurechgtarriveealler
     *
     * @return \DateTime
     */
    public function getHeurechgtarriveealler()
    {
        return $this->heurechgtarriveealler;
    }

    /**
     * Set heurechgtdepartaller
     *
     * @param \DateTime $heurechgtdepartaller
     *
     * @return Randonnees
     */
    public function setHeurechgtdepartaller($heurechgtdepartaller)
    {
        $this->heurechgtdepartaller = $heurechgtdepartaller;

        return $this;
    }

    /**
     * Get heurechgtdepartaller
     *
     * @return \DateTime
     */
    public function getHeurechgtdepartaller()
    {
        return $this->heurechgtdepartaller;
    }

    /**
     * Set heurearriveealler
     *
     * @param \DateTime $heurearriveealler
     *
     * @return Randonnees
     */
    public function setHeurearriveealler($heurearriveealler)
    {
        $this->heurearriveealler = $heurearriveealler;

        return $this;
    }

    /**
     * Get heurearriveealler
     *
     * @return \DateTime
     */
    public function getHeurearriveealler()
    {
        return $this->heurearriveealler;
    }

    /**
     * Set heuredepartretour
     *
     * @param \DateTime $heuredepartretour
     *
     * @return Randonnees
     */
    public function setHeuredepartretour($heuredepartretour)
    {
        $this->heuredepartretour = $heuredepartretour;

        return $this;
    }

    /**
     * Get heuredepartretour
     *
     * @return \DateTime
     */
    public function getHeuredepartretour()
    {
        return $this->heuredepartretour;
    }

    /**
     * Set heurechgtarriveeretour
     *
     * @param \DateTime $heurechgtarriveeretour
     *
     * @return Randonnees
     */
    public function setHeurechgtarriveeretour($heurechgtarriveeretour)
    {
        $this->heurechgtarriveeretour = $heurechgtarriveeretour;

        return $this;
    }

    /**
     * Get heurechgtarriveeretour
     *
     * @return \DateTime
     */
    public function getHeurechgtarriveeretour()
    {
        return $this->heurechgtarriveeretour;
    }

    /**
     * Set heurechgtdepartretour
     *
     * @param \DateTime $heurechgtdepartretour
     *
     * @return Randonnees
     */
    public function setHeurechgtdepartretour($heurechgtdepartretour)
    {
        $this->heurechgtdepartretour = $heurechgtdepartretour;

        return $this;
    }

    /**
     * Get heurechgtdepartretour
     *
     * @return \DateTime
     */
    public function getHeurechgtdepartretour()
    {
        return $this->heurechgtdepartretour;
    }

    /**
     * Set heurearriveeretour
     *
     * @param \DateTime $heurearriveeretour
     *
     * @return Randonnees
     */
    public function setHeurearriveeretour($heurearriveeretour)
    {
        $this->heurearriveeretour = $heurearriveeretour;

        return $this;
    }

    /**
     * Get heurearriveeretour
     *
     * @return \DateTime
     */
    public function getHeurearriveeretour()
    {
        return $this->heurearriveeretour;
    }

    /**
     * Set allergaredepart
     *
     * @param string $allergaredepart
     *
     * @return Randonnees
     */
    public function setAllergaredepart($allergaredepart)
    {
        $this->allergaredepart = $allergaredepart;

        return $this;
    }

    /**
     * Get allergaredepart
     *
     * @return string
     */
    public function getAllergaredepart()
    {
        return $this->allergaredepart;
    }

    /**
     * Set allerchangementnb
     *
     * @param string $allerchangementnb
     *
     * @return Randonnees
     */
    public function setAllerchangementnb($allerchangementnb)
    {
        $this->allerchangementnb = $allerchangementnb;

        return $this;
    }

    /**
     * Get allerchangementnb
     *
     * @return string
     */
    public function getAllerchangementnb()
    {
        return $this->allerchangementnb;
    }

    /**
     * Set allergarearrivee
     *
     * @param string $allergarearrivee
     *
     * @return Randonnees
     */
    public function setAllergarearrivee($allergarearrivee)
    {
        $this->allergarearrivee = $allergarearrivee;

        return $this;
    }

    /**
     * Get allergarearrivee
     *
     * @return string
     */
    public function getAllergarearrivee()
    {
        return $this->allergarearrivee;
    }

    /**
     * Set itineraire
     *
     * @param string $itineraire
     *
     * @return Randonnees
     */
    public function setItineraire($itineraire)
    {
        $this->itineraire = $itineraire;

        return $this;
    }

    /**
     * Get itineraire
     *
     * @return string
     */
    public function getItineraire()
    {
        return $this->itineraire;
    }

    /**
     * Set retourgaredepart
     *
     * @param string $retourgaredepart
     *
     * @return Randonnees
     */
    public function setRetourgaredepart($retourgaredepart)
    {
        $this->retourgaredepart = $retourgaredepart;

        return $this;
    }

    /**
     * Get retourgaredepart
     *
     * @return string
     */
    public function getRetourgaredepart()
    {
        return $this->retourgaredepart;
    }

    /**
     * Set retourchangementnb
     *
     * @param string $retourchangementnb
     *
     * @return Randonnees
     */
    public function setRetourchangementnb($retourchangementnb)
    {
        $this->retourchangementnb = $retourchangementnb;

        return $this;
    }

    /**
     * Get retourchangementnb
     *
     * @return string
     */
    public function getRetourchangementnb()
    {
        return $this->retourchangementnb;
    }

    /**
     * Set retourgarearrivee
     *
     * @param string $retourgarearrivee
     *
     * @return Randonnees
     */
    public function setRetourgarearrivee($retourgarearrivee)
    {
        $this->retourgarearrivee = $retourgarearrivee;

        return $this;
    }

    /**
     * Get retourgarearrivee
     *
     * @return string
     */
    public function getRetourgarearrivee()
    {
        return $this->retourgarearrivee;
    }

    /**
     * Set multidates
     *
     * @param string $multidates
     *
     * @return Randonnees
     */
    public function setMultidates($multidates)
    {
        $this->multidates = $multidates;

        return $this;
    }

    /**
     * Get multidates
     *
     * @return string
     */
    public function getMultidates()
    {
        return $this->multidates;
    }

    /**
     * Set horairesverification
     *
     * @param string $horairesverification
     *
     * @return Randonnees
     */
    public function setHorairesverification($horairesverification)
    {
        $this->horairesverification = $horairesverification;

        return $this;
    }

    /**
     * Get horairesverification
     *
     * @return string
     */
    public function getHorairesverification()
    {
        return $this->horairesverification;
    }

    /**
     * Set commentaires
     *
     * @param ArrayCollection $commentaires
     *
     * @return Randonnees
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires = $commentaires;

        return $this;
    }

    /**
     * Get commentaires
     *
     * @return ArrayCollection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Set denivelees
     *
     * @param string $denivelees
     *
     * @return Randonnees
     */
    public function setDenivelees($denivelees)
    {
        $this->denivelees = $denivelees;

        return $this;
    }

    /**
     * Get denivelees
     *
     * @return string
     */
    public function getDenivelees()
    {
        return $this->denivelees;
    }

    /**
     * Set descriptionDenivelees
     *
     * @param string $descriptionDenivelees
     *
     * @return Randonnees
     */
    public function setDescriptionDenivelees($descriptionDenivelees)
    {
        $this->descriptionDenivelees = $descriptionDenivelees;

        return $this;
    }

    /**
     * Get descriptionDenivelees
     *
     * @return string
     */
    public function getDescriptionDenivelees()
    {
        return $this->descriptionDenivelees;
    }

    /**
     * Set efface
     *
     * @param string $efface
     *
     * @return Randonnees
     */
    public function setEfface($efface)
    {
        $this->efface = $efface;

        return $this;
    }

    /**
     * Get efface
     *
     * @return string
     */
    public function getEfface()
    {
        return $this->efface;
    }

    /**
     * Set synclocal
     *
     * @param string $synclocal
     *
     * @return Randonnees
     */
    public function setSynclocal($synclocal)
    {
        $this->synclocal = $synclocal;

        return $this;
    }

    /**
     * Get synclocal
     *
     * @return string
     */
    public function getSynclocal()
    {
        return $this->synclocal;
    }

    /**
     * Set syncdistant
     *
     * @param string $syncdistant
     *
     * @return Randonnees
     */
    public function setSyncdistant($syncdistant)
    {
        $this->syncdistant = $syncdistant;

        return $this;
    }

    /**
     * Get syncdistant
     *
     * @return string
     */
    public function getSyncdistant()
    {
        return $this->syncdistant;
    }

    /**
     * Add commentaire
     *
     * @param \AppBundle\Entity\Commentaires $commentaire
     *
     * @return Randonnees
     */
    public function addCommentaire(\AppBundle\Entity\Commentaires $commentaire)
    {
        $this->commentaires->add($commentaire);

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \AppBundle\Entity\Commentaires $commentaire
     */
    public function removeCommentaire(\AppBundle\Entity\Commentaires $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /*
     * Utility function to get the actual number 
     * of 
     */
    public function getNbCommentaires(){
        return $this->commentaires->count();
    }

}
