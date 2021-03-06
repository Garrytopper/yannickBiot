<?php

namespace YB\IxinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use YB\UserBundle\Entity\User; 

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="YB\IxinaBundle\Repository\CustomerRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="YB\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
    * @ORM\OneToOne(targetEntity="YB\IxinaBundle\Entity\Plan", cascade={"persist", "remove"})
    */
    private $plan;

    /**
     * @var string
     *
     * @ORM\Column(name="etatDossier", type="string", length=255)
     */
    private $etatDossier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \string
     *
     * @ORM\Column(name="dateDecision", type="string", length=255, nullable = true)
     */
    private $dateDecision;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="numTel", type="string", length=10, nullable=true)
     */
    private $numTel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true, unique=true)
     */
    private $email;

    /**
    * @var string
    * 
    * @ORM\Column(name="autreNum", type="string", length=10, nullable=true)
    */
    private $autreNum;

    /**
     * @var string
     *
     * @ORM\Column(name="livAd1", type="string", length=255, nullable=true)
     */
    private $livAd1;

    /**
     * @var string
     *
     * @ORM\Column(name="livAd2", type="string", length=255, nullable=true)
     */
    private $livAd2;

    /**
     * @var string
     *
     * @ORM\Column(name="livVille", type="string", length=20, nullable=true)
     */
    private $livVille;

    /**
     * @var string
     *
     * @ORM\Column(name="livCp", type="string", length=5, nullable=true)
     */
    private $livCp;

    /**
     * @var bool
     *
     * @ORM\Column(name="renovation", type="boolean", nullable=true)
     */
    private $renovation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLivSouhaite", type="datetime", nullable=true)
     */
    private $dateLivSouhaite;

    /**
     * @var int
     *
     * @ORM\Column(name="budgetClient", type="integer", nullable=true)
     */
    private $budgetClient;

    /**
     * @var string
     *
     * @ORM\Column(name="motifDecision", type="string", length=255, nullable=true)
     */
    private $motifDecision;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionFinition", type="string", length=255, nullable=true)
     */
    private $descriptionFinition;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionElectro", type="string", length=255, nullable=true)
     */
    private $descriptionElectro;

    /**
     * @var bool
     *
     * @ORM\Column(name="evier", type="boolean", nullable=true)
     */
    private $evier;

    /**
     * @var bool
     *
     * @ORM\Column(name="mitigeur", type="boolean", nullable=true)
     */
    private $mitigeur;

    /**
     * @var bool
     *
     * @ORM\Column(name="four", type="boolean", nullable=true)
     */
    private $four;

    /**
     * @var bool
     *
     * @ORM\Column(name="microOnde", type="boolean", nullable=true)
     */
    private $microOnde;

    /**
     * @var bool
     *
     * @ORM\Column(name="plaqueCuisson", type="boolean", nullable=true)
     */
    private $plaqueCuisson;

    /**
     * @var bool
     *
     * @ORM\Column(name="hotte", type="boolean", nullable=true)
     */
    private $hotte;

    /**
     * @var bool
     *
     * @ORM\Column(name="frigo", type="boolean", nullable=true)
     */
    private $frigo;

    /**
     * @var bool
     *
     * @ORM\Column(name="laveVaisselle", type="boolean", nullable=true)
     */
    private $laveVaisselle;

    /**
     * @var bool
     *
     * @ORM\Column(name="laveLinge", type="boolean", nullable=true)
     */
    private $laveLinge;

    /**
     * @var bool
     *
     * @ORM\Column(name="caveVin", type="boolean", nullable=true)
     */
    private $caveVin;

    /**
     * @var bool
     *
     * @ORM\Column(name="liv", type="boolean", nullable=true)
     */
    private $liv;

    /**
     * @var string
     *
     * @ORM\Column(name="pose", type="string", length=12, nullable=true)
     */
    private $pose;

    /**
     * @var bool
     *
     * @ORM\Column(name="autre", type="boolean", nullable=true)
     */
    private $autre;

    /**
     * @var bool
     *
     * @ORM\Column(name="dessin", type="boolean", nullable=true)
     */
    private $dessin;

    /**
     * @var bool
     *
     * @ORM\Column(name="preparation", type="boolean", nullable=true)
     */
    private $preparation;

    /**
     * @var bool
     *
     * @ORM\Column(name="prestation", type="boolean", nullable=true)
     */
    private $prestation;

     /**
     * @var string
     *
     * @ORM\Column(name="descriptionTravaux", type="string", length=255, nullable=true)
     */
    private $descriptionTravaux;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionProfil", type="string", length=255, nullable=true)
     */
    private $descriptionProfil;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=255, nullable=true)
     */
    private $modele;

    /**
     * @var string
     *
     * @ORM\Column(name="planW", type="string", length=255, nullable=true)
     */
    private $planW;

    /**
     * @var string
     *
     * @ORM\Column(name="poignee", type="string", length=255, nullable=true)
     */
    private $poignee;

    /**
     * @var string
     *
     * @ORM\Column(name="decBestNeed", type="string", length=255, nullable=true)
     */
    private $decBestNeed;

    /**
     * @var string
     *
     * @ORM\Column(name="decToday", type="string", length=255, nullable=true)
     */
    private $decToday;

    /**
     * @var string
     *
     * @ORM\Column(name="decTodayLike", type="string", length=255, nullable=true)
     */
    private $decTodayLike;

    /**
     * @var string
     *
     * @ORM\Column(name="decTodayNoLike", type="string", length=255, nullable=true)
     */
    private $decTodayNoLike;

    /**
     * @var string
     *
     * @ORM\Column(name="decReasons", type="string", length=255, nullable=true)
     */
    private $decReasons;

    /**
     * @var bool
     *
     * @ORM\Column(name="profSecurite", type="boolean", nullable=true)
     */
    private $profSecurite;

    /**
     * @var bool
     *
     * @ORM\Column(name="profOrgueil", type="boolean", nullable=true)
     */
    private $profOrgueil;

    /**
     * @var bool
     *
     * @ORM\Column(name="profNouveau", type="boolean", nullable=true)
     */
    private $profNouveau;

    /**
     * @var bool
     *
     * @ORM\Column(name="profConfort", type="boolean", nullable=true)
     */
    private $profConfort;

    /**
     * @var bool
     *
     * @ORM\Column(name="profArgent", type="boolean", nullable=true)
     */
    private $profArgent;

    /**
     * @var bool
     *
     * @ORM\Column(name="profSympa", type="boolean", nullable=true)
     */
    private $profSympa;

    /**
     * @var int
     *
     * @ORM\Column(name="budgetAnnonce", type="integer", nullable=true)
     */
    private $budgetAnnonce;

    /**
     * @var string
     *
     * @ORM\Column(name="concurrence", type="string", length=255, nullable=true)
     */
    private $concurrence;

    /**
     * @var string
     *
     * @ORM\Column(name="diffConcurrence", type="string", length=255, nullable=true)
     */
    private $diffConcurrence;

    /**
     * @var string
     *
     * @ORM\Column(name="cabMeuble", type="string", length=255, nullable=true)
     */
    private $cabMeuble;

    /**
     * @var string
     *
     * @ORM\Column(name="cabStyle", type="string", length=255, nullable=true)
     */
    private $cabStyle;

    /**
     * @var string
     *
     * @ORM\Column(name="cabElectro", type="string", length=255, nullable=true)
     */
    private $cabElectro;

    /**
     * @var string
     *
     * @ORM\Column(name="cabSanitaire", type="string", length=255, nullable=true)
     */
    private $cabSanitaire;

    /**
     * @var string
     *
     * @ORM\Column(name="cabService", type="string", length=255, nullable=true)
     */
    private $cabService;

    /**
     * @var string
     *
     * @ORM\Column(name="cabVendeur", type="string", length=255, nullable=true)
     */
    private $cabVendeur;

    /**
     * @var string
     *
     * @ORM\Column(name="beneficeIxina", type="string", length=255, nullable=true)
     */
    private $beneficeIxina;

    /**
     * @var \string
     *
     * @ORM\Column(name="dramaDate", type="string", length=255, nullable=true)
     */
    private $dramaDate;

    /**
     * @var string
     *
     * @ORM\Column(name="conclusion", type="string", length=255, nullable=true)
     */
    private $conclusion;

    /**
     * @var string
     *
     * @ORM\Column(name="objections", type="string", length=255, nullable=true)
     */
    private $objections;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateProchaineAction", type="datetime", nullable=true)
     */
    private $dateProchaineAction;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=true)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(name="actionRemarque", type="string", length=1000, nullable=true)
     */
    private $actionRemarque;

    /**
     * @var integer
     *
     * @ORM\Column(name="montantVenteTTC", type="integer", nullable=true)
     */
    private $montantVenteTTC;

    /**
     * @var integer
     *
     * @ORM\Column(name="montantAcompte", type="integer", nullable=true)
     */
    private $montantAcompte;

    /**
     * @var bool
     *
     * @ORM\Column(name="fairePlanTech", type="boolean", nullable=true)
     */
    private $fairePlanTech;

    /**
     * @var bool
     *
     * @ORM\Column(name="faireFactureAcompte", type="boolean", nullable=true)
     */
    private $faireFactureAcompte;

    /**
     * @var bool
     *
     * @ORM\Column(name="faireRelanceCheque", type="boolean", nullable=true)
     */
    private $faireRelanceCheque;

    public function __construct()
    {
        $this->etatDossier = 'Prospect';
        $this->dateCreation = new \DateTime('now');
        $this->dateLivSouhaite = new \DateTime('now + 2 month');
        $this->dateProchaineAction = new \DateTime('now');
        $this->action = 'Decouverte';
        $this->dessin = false;
        $this->preparation = false;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param integer $user
     *
     * @return Customer
     */
    public function setUser(USER $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set etatDossier
     *
     * @param string $etatDossier
     *
     * @return Customer
     */
    public function setEtatDossier($etatDossier)
    {
        $this->etatDossier = $etatDossier;

        return $this;
    }

    /**
     * Get etatDossier
     *
     * @return string
     */
    public function getEtatDossier()
    {
        return $this->etatDossier;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Customer
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Customer
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
     * Set numTel
     *
     * @param string $numTel
     *
     * @return Customer
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;

        return $this;
    }

    /**
     * Get numTel
     *
     * @return string
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Customer
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
     * Set livAd1
     *
     * @param string $livAd1
     *
     * @return Customer
     */
    public function setLivAd1($livAd1)
    {
        $this->livAd1 = $livAd1;

        return $this;
    }

    /**
     * Get livAd1
     *
     * @return string
     */
    public function getLivAd1()
    {
        return $this->livAd1;
    }

    /**
     * Set livAd2
     *
     * @param string $livAd2
     *
     * @return Customer
     */
    public function setLivAd2($livAd2)
    {
        $this->livAd2 = $livAd2;

        return $this;
    }

    /**
     * Get livAd2
     *
     * @return string
     */
    public function getLivAd2()
    {
        return $this->livAd2;
    }

    /**
     * Set livVille
     *
     * @param string $livVille
     *
     * @return Customer
     */
    public function setLivVille($livVille)
    {
        $this->livVille = $livVille;

        return $this;
    }

    /**
     * Get livVille
     *
     * @return string
     */
    public function getLivVille()
    {
        return $this->livVille;
    }

    /**
     * Set livCp
     *
     * @param string $livCp
     *
     * @return Customer
     */
    public function setLivCp($livCp)
    {
        $this->livCp = $livCp;

        return $this;
    }

    /**
     * Get livCp
     *
     * @return string
     */
    public function getLivCp()
    {
        return $this->livCp;
    }

    /**
     * Set renovation
     *
     * @param boolean $renovation
     *
     * @return Customer
     */
    public function setRenovation($renovation)
    {
        $this->renovation = $renovation;

        return $this;
    }

    /**
     * Get renovation
     *
     * @return bool
     */
    public function getRenovation()
    {
        return $this->renovation;
    }

    /**
     * Set plan
     *
     * @param string $plan
     *
     * @return Customer
     */
    public function setPlan(PLAN $plan = null)
    {
        $this->plan = $plan;
    }

    /**
     * Get plan
     *
     * @return string
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set dateLivSouhaite
     *
     * @param \DateTime $dateLivSouhaite
     *
     * @return Customer
     */
    public function setDateLivSouhaite($dateLivSouhaite)
    {
        $this->dateLivSouhaite = $dateLivSouhaite;

        return $this;
    }

    /**
     * Get dateLivSouhaite
     *
     * @return \DateTime
     */
    public function getDateLivSouhaite()
    {
        return $this->dateLivSouhaite;
    }

    /**
     * Set budgetClient
     *
     * @param integer $budgetClient
     *
     * @return Customer
     */
    public function setBudgetClient($budgetClient)
    {
        $this->budgetClient = $budgetClient;

        return $this;
    }

    /**
     * Get budgetClient
     *
     * @return int
     */
    public function getBudgetClient()
    {
        return $this->budgetClient;
    }
     
    /**
     * Set liv
     *
     * @param boolean $liv
     *
     * @return Customer
     */
    public function setLiv($liv)
    {
        $this->liv = $liv;

        return $this;
    }

    /**
     * Get liv
     *
     * @return bool
     */
    public function getLiv()
    {
        return $this->liv;
    }

    /**
     * Set pose
     *
     * @param boolean $pose
     *
     * @return Customer
     */
    public function setPose($pose)
    {
        $this->pose = $pose;

        return $this;
    }

    /**
     * Get pose
     *
     * @return bool
     */
    public function getPose()
    {
        return $this->pose;
    }

    /**
     * Set autre
     *
     * @param boolean $autre
     *
     * @return Customer
     */
    public function setAutre($autre)
    {
        $this->autre = $autre;

        return $this;
    }

    /**
     * Get autre
     *
     * @return bool
     */
    public function getAutre()
    {
        return $this->autre;
    }

    /**
     * Set decBestNeed
     *
     * @param string $decBestNeed
     *
     * @return Customer
     */
    public function setDecBestNeed($decBestNeed)
    {
        $this->decBestNeed = $decBestNeed;

        return $this;
    }

    /**
     * Get decBestNeed
     *
     * @return string
     */
    public function getDecBestNeed()
    {
        return $this->decBestNeed;
    }

    /**
     * Set dectoday
     *
     * @param string $dectoday
     *
     * @return Customer
     */
    public function setDecToday($decToday)
    {
        $this->decToday = $decToday;

        return $this;
    }

    /**
     * Get dectoday
     *
     * @return string
     */
    public function getDecToday()
    {
        return $this->decToday;
    }

    /**
     * Set decTodayLike
     *
     * @param string $decTodayLike
     *
     * @return Customer
     */
    public function setDecTodayLike($decTodayLike)
    {
        $this->decTodayLike = $decTodayLike;

        return $this;
    }

    /**
     * Get decTodayLike
     *
     * @return string
     */
    public function getDecTodayLike()
    {
        return $this->decTodayLike;
    }

    /**
     * Set decTodayNoLike
     *
     * @param string $decTodayNoLike
     *
     * @return Customer
     */
    public function setDecTodayNoLike($decTodayNoLike)
    {
        $this->decTodayNoLike = $decTodayNoLike;

        return $this;
    }

    /**
     * Get decTodayNoLike
     *
     * @return string
     */
    public function getDecTodayNoLike()
    {
        return $this->decTodayNoLike;
    }

    /**
     * Set decReasons
     *
     * @param string $decReasons
     *
     * @return Customer
     */
    public function setDecReasons($decReasons)
    {
        $this->decReasons = $decReasons;

        return $this;
    }

    /**
     * Get decReasons
     *
     * @return string
     */
    public function getDecReasons()
    {
        return $this->decReasons;
    }

    /**
     * Set profilClient
     *
     * @param integer $profilClient
     *
     * @return Customer
     */
    public function setProfilClient($profilClient)
    {
        $this->profilClient = $profilClient;

        return $this;
    }

    /**
     * Get profilClient
     *
     * @return int
     */
    public function getProfilClient()
    {
        return $this->profilClient;
    }

    /**
     * Set budgetAnnonce
     *
     * @param integer $budgetAnnonce
     *
     * @return Customer
     */
    public function setBudgetAnnonce($budgetAnnonce)
    {
        $this->budgetAnnonce = $budgetAnnonce;

        return $this;
    }

    /**
     * Get budgetAnnonce
     *
     * @return int
     */
    public function getBudgetAnnonce()
    {
        return $this->budgetAnnonce;
    }

    /**
     * Set beneficeIxina
     *
     * @param string $beneficeIxina
     *
     * @return Customer
     */
    public function setBeneficeIxina($beneficeIxina)
    {
        $this->beneficeIxina = $beneficeIxina;

        return $this;
    }

    /**
     * Get beneficeIxina
     *
     * @return string
     */
    public function getBeneficeIxina()
    {
        return $this->beneficeIxina;
    }

    /**
     * Set dramaDate
     *
     * @param \DateTime $dramaDate
     *
     * @return Customer
     */
    public function setDramaDate($dramaDate)
    {
        $this->dramaDate = $dramaDate;

        return $this;
    }

    /**
     * Get dramaDate
     *
     * @return \DateTime
     */
    public function getDramaDate()
    {
        return $this->dramaDate;
    }

    /**
     * Set conclusion
     *
     * @param string $conclusion
     *
     * @return Customer
     */
    public function setConclusion($conclusion)
    {
        $this->conclusion = $conclusion;

        return $this;
    }

    /**
     * Get conclusion
     *
     * @return string
     */
    public function getConclusion()
    {
        return $this->conclusion;
    }

    /**
     * Set objections
     *
     * @param string $objections
     *
     * @return Customer
     */
    public function setObjections($objections)
    {
        $this->objections = $objections;

        return $this;
    }

    /**
     * Get objections
     *
     * @return string
     */
    public function getObjections()
    {
        return $this->objections;
    }

    /**
     * Set dateProchaineAction
     *
     * @param \DateTime $dateProchaineAction
     *
     * @return Customer
     */
    public function setDateProchaineAction($dateProchaineAction)
    {
        $this->dateProchaineAction = $dateProchaineAction;

        return $this;
    }

    /**
     * Get dateProchaineAction
     *
     * @return \DateTime
     */
    public function getDateProchaineAction()
    {
        return $this->dateProchaineAction;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return Customer
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set actionRemarque
     *
     * @param string $actionRemarque
     *
     * @return Customer
     */
    public function setActionRemarque($actionRemarque)
    {
        $this->actionRemarque = $actionRemarque;

        return $this;
    }

    /**
     * Get actionRemarque
     *
     * @return string
     */
    public function getActionRemarque()
    {
        return $this->actionRemarque;
    } 

    /**
     * Set profSecurite
     *
     * @param boolean $profSecurite
     *
     * @return Customer
     */
    public function setProfSecurite($profSecurite)
    {
        $this->profSecurite = $profSecurite;

        return $this;
    }

    /**
     * Get profSecurite
     *
     * @return boolean
     */
    public function getProfSecurite()
    {
        return $this->profSecurite;
    }

    /**
     * Set profOrgueil
     *
     * @param boolean $profOrgueil
     *
     * @return Customer
     */
    public function setProfOrgueil($profOrgueil)
    {
        $this->profOrgueil = $profOrgueil;

        return $this;
    }

    /**
     * Get profOrgueil
     *
     * @return boolean
     */
    public function getProfOrgueil()
    {
        return $this->profOrgueil;
    }

    /**
     * Set profNouveau
     *
     * @param boolean $profNouveau
     *
     * @return Customer
     */
    public function setProfNouveau($profNouveau)
    {
        $this->profNouveau = $profNouveau;

        return $this;
    }

    /**
     * Get profNouveau
     *
     * @return boolean
     */
    public function getProfNouveau()
    {
        return $this->profNouveau;
    }

    /**
     * Set profConfort
     *
     * @param boolean $profConfort
     *
     * @return Customer
     */
    public function setProfConfort($profConfort)
    {
        $this->profConfort = $profConfort;

        return $this;
    }

    /**
     * Get profConfort
     *
     * @return boolean
     */
    public function getProfConfort()
    {
        return $this->profConfort;
    }

    /**
     * Set profArgent
     *
     * @param boolean $profArgent
     *
     * @return Customer
     */
    public function setProfArgent($profArgent)
    {
        $this->profArgent = $profArgent;

        return $this;
    }

    /**
     * Get profArgent
     *
     * @return boolean
     */
    public function getProfArgent()
    {
        return $this->profArgent;
    }

    /**
     * Set profSympa
     *
     * @param boolean $profSympa
     *
     * @return Customer
     */
    public function setProfSympa($profSympa)
    {
        $this->profSympa = $profSympa;

        return $this;
    }

    /**
     * Get profSympa
     *
     * @return boolean
     */
    public function getProfSympa()
    {
        return $this->profSympa;
    }

    /**
     * Set cab
     *
     * @param string $cab
     *
     * @return Customer
     */
    public function setCab($cab)
    {
        $this->cab = $cab;

        return $this;
    }

    /**
     * Get cab
     *
     * @return string
     */
    public function getCab()
    {
        return $this->cab;
    }

    /**
     * Set cabMeuble
     *
     * @param string $cabMeuble
     *
     * @return Customer
     */
    public function setCabMeuble($cabMeuble)
    {
        $this->cabMeuble = $cabMeuble;

        return $this;
    }

    /**
     * Get cabMeuble
     *
     * @return string
     */
    public function getCabMeuble()
    {
        return $this->cabMeuble;
    }

    /**
     * Set cabElectro
     *
     * @param string $cabElectro
     *
     * @return Customer
     */
    public function setCabElectro($cabElectro)
    {
        $this->cabElectro = $cabElectro;

        return $this;
    }

    /**
     * Get cabElectro
     *
     * @return string
     */
    public function getCabElectro()
    {
        return $this->cabElectro;
    }

    /**
     * Set cabSanitaire
     *
     * @param string $cabSanitaire
     *
     * @return Customer
     */
    public function setCabSanitaire($cabSanitaire)
    {
        $this->cabSanitaire = $cabSanitaire;

        return $this;
    }

    /**
     * Get cabSanitaire
     *
     * @return string
     */
    public function getCabSanitaire()
    {
        return $this->cabSanitaire;
    }

    /**
     * Set cabService
     *
     * @param string $cabService
     *
     * @return Customer
     */
    public function setCabService($cabService)
    {
        $this->cabService = $cabService;

        return $this;
    }

    /**
     * Get cabService
     *
     * @return string
     */
    public function getCabService()
    {
        return $this->cabService;
    }

    /**
     * Set cabVendeur
     *
     * @param string $cabVendeur
     *
     * @return Customer
     */
    public function setCabVendeur($cabVendeur)
    {
        $this->cabVendeur = $cabVendeur;

        return $this;
    }

    /**
     * Get cabVendeur
     *
     * @return string
     */
    public function getCabVendeur()
    {
        return $this->cabVendeur;
    }

    /**
     * Set descriptionFinition
     *
     * @param string $descriptionFinition
     *
     * @return Customer
     */
    public function setDescriptionFinition($descriptionFinition)
    {
        $this->descriptionFinition = $descriptionFinition;

        return $this;
    }

    /**
     * Get descriptionFinition
     *
     * @return string
     */
    public function getDescriptionFinition()
    {
        return $this->descriptionFinition;
    }

    /**
     * Set four
     *
     * @param boolean $four
     *
     * @return Customer
     */
    public function setFour($four)
    {
        $this->four = $four;

        return $this;
    }

    /**
     * Get four
     *
     * @return boolean
     */
    public function getFour()
    {
        return $this->four;
    }

    /**
     * Set microOnde
     *
     * @param boolean $microOnde
     *
     * @return Customer
     */
    public function setMicroOnde($microOnde)
    {
        $this->microOnde = $microOnde;

        return $this;
    }

    /**
     * Get microOnde
     *
     * @return boolean
     */
    public function getMicroOnde()
    {
        return $this->microOnde;
    }

    /**
     * Set plaqueCuisson
     *
     * @param boolean $plaqueCuisson
     *
     * @return Customer
     */
    public function setPlaqueCuisson($plaqueCuisson)
    {
        $this->plaqueCuisson = $plaqueCuisson;

        return $this;
    }

    /**
     * Get plaqueCuisson
     *
     * @return boolean
     */
    public function getPlaqueCuisson()
    {
        return $this->plaqueCuisson;
    }

    /**
     * Set hotte
     *
     * @param boolean $hotte
     *
     * @return Customer
     */
    public function setHotte($hotte)
    {
        $this->hotte = $hotte;

        return $this;
    }

    /**
     * Get hotte
     *
     * @return boolean
     */
    public function getHotte()
    {
        return $this->hotte;
    }

    /**
     * Set frigo
     *
     * @param boolean $frigo
     *
     * @return Customer
     */
    public function setFrigo($frigo)
    {
        $this->frigo = $frigo;

        return $this;
    }

    /**
     * Get frigo
     *
     * @return boolean
     */
    public function getFrigo()
    {
        return $this->frigo;
    }

    /**
     * Set laveVaisselle
     *
     * @param boolean $laveVaisselle
     *
     * @return Customer
     */
    public function setLaveVaisselle($laveVaisselle)
    {
        $this->laveVaisselle = $laveVaisselle;

        return $this;
    }

    /**
     * Get laveVaisselle
     *
     * @return boolean
     */
    public function getLaveVaisselle()
    {
        return $this->laveVaisselle;
    }

    /**
     * Set laveLinge
     *
     * @param boolean $laveLinge
     *
     * @return Customer
     */
    public function setLaveLinge($laveLinge)
    {
        $this->laveLinge = $laveLinge;

        return $this;
    }

    /**
     * Get laveLinge
     *
     * @return boolean
     */
    public function getLaveLinge()
    {
        return $this->laveLinge;
    }

    /**
     * Set caveVin
     *
     * @param boolean $caveVin
     *
     * @return Customer
     */
    public function setCaveVin($caveVin)
    {
        $this->caveVin = $caveVin;

        return $this;
    }

    /**
     * Get caveVin
     *
     * @return boolean
     */
    public function getCaveVin()
    {
        return $this->caveVin;
    }

    /**
     * Set prestation
     *
     * @param boolean $prestation
     *
     * @return Customer
     */
    public function setPrestation($prestation)
    {
        $this->prestation = $prestation;

        return $this;
    }

    /**
     * Get prestation
     *
     * @return boolean
     */
    public function getPrestation()
    {
        return $this->prestation;
    }

    /**
     * Set dessin
     *
     * @param boolean $dessin
     *
     * @return Customer
     */
    public function setDessin($dessin)
    {
        $this->dessin = $dessin;

        return $this;
    }

    /**
     * Get dessin
     *
     * @return boolean
     */
    public function getDessin()
    {
        return $this->dessin;
    }

    /**
     * Set preparation
     *
     * @param boolean $preparation
     *
     * @return Customer
     */
    public function setPreparation($preparation)
    {
        $this->preparation = $preparation;

        return $this;
    }

    /**
     * Get preparation
     *
     * @return boolean
     */
    public function getPreparation()
    {
        return $this->preparation;
    }

    /**
     * Set dateDecision
     *
     * @param \DateTime $dateDecision
     *
     * @return Customer
     */
    public function setDateDecision($dateDecision)
    {
        $this->dateDecision = $dateDecision;

        return $this;
    }

    /**
     * Get dateDecision
     *
     * @return \DateTime
     */
    public function getDateDecision()
    {
        return $this->dateDecision;
    }

    /**
     * Set montantVenteTTC
     *
     * @param integer $montantVenteTTC
     *
     * @return Customer
     */
    public function setMontantVenteTTC($montantVenteTTC)
    {
        $this->montantVenteTTC = $montantVenteTTC;

        return $this;
    }

    /**
     * Get montantVenteTTC
     *
     * @return integer
     */
    public function getMontantVenteTTC()
    {
        return $this->montantVenteTTC;
    }

    /**
     * Set montantAcompte
     *
     * @param integer $montantAcompte
     *
     * @return Customer
     */
    public function setMontantAcompte($montantAcompte)
    {
        $this->montantAcompte = $montantAcompte;

        return $this;
    }

    /**
     * Get montantAcompte
     *
     * @return integer
     */
    public function getMontantAcompte()
    {
        return $this->montantAcompte;
    }

    /**
     * Set fairePlanTech
     *
     * @param boolean $fairePlanTech
     *
     * @return Customer
     */
    public function setFairePlanTech($fairePlanTech)
    {
        $this->fairePlanTech = $fairePlanTech;

        return $this;
    }

    /**
     * Get fairePlanTech
     *
     * @return boolean
     */
    public function getFairePlanTech()
    {
        return $this->fairePlanTech;
    }

    /**
     * Set faireFactureAcompte
     *
     * @param boolean $faireFactureAcompte
     *
     * @return Customer
     */
    public function setFaireFactureAcompte($faireFactureAcompte)
    {
        $this->faireFactureAcompte = $faireFactureAcompte;

        return $this;
    }

    /**
     * Get faireFactureAcompte
     *
     * @return boolean
     */
    public function getFaireFactureAcompte()
    {
        return $this->faireFactureAcompte;
    }

    /**
     * Set faireRelanceCheque
     *
     * @param boolean $faireRelanceCheque
     *
     * @return Customer
     */
    public function setFaireRelanceCheque($faireRelanceCheque)
    {
        $this->faireRelanceCheque = $faireRelanceCheque;

        return $this;
    }

    /**
     * Get faireRelanceCheque
     *
     * @return boolean
     */
    public function getFaireRelanceCheque()
    {
        return $this->faireRelanceCheque;
    }

    /**
     * Set autreNum
     *
     * @param string $autreNum
     *
     * @return Customer
     */
    public function setAutreNum($autreNum)
    {
        $this->autreNum = $autreNum;

        return $this;
    }

    /**
     * Get autreNum
     *
     * @return string
     */
    public function getAutreNum()
    {
        return $this->autreNum;
    }

    /**
     * Set motifDecision
     *
     * @param string $motifDecision
     *
     * @return Customer
     */
    public function setMotifDecision($motifDecision)
    {
        $this->motifDecision = $motifDecision;

        return $this;
    }

    /**
     * Get motifDecision
     *
     * @return string
     */
    public function getMotifDecision()
    {
        return $this->motifDecision;
    }

    /**
     * Set modele
     *
     * @param string $modele
     *
     * @return Customer
     */
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return string
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set planW
     *
     * @param string $planW
     *
     * @return Customer
     */
    public function setPlanW($planW)
    {
        $this->planW = $planW;

        return $this;
    }

    /**
     * Get planW
     *
     * @return string
     */
    public function getPlanW()
    {
        return $this->planW;
    }

    /**
     * Set poignee
     *
     * @param string $poignee
     *
     * @return Customer
     */
    public function setPoignee($poignee)
    {
        $this->poignee = $poignee;

        return $this;
    }

    /**
     * Get poignee
     *
     * @return string
     */
    public function getPoignee()
    {
        return $this->poignee;
    }

    /**
     * Set evier
     *
     * @param boolean $evier
     *
     * @return Customer
     */
    public function setEvier($evier)
    {
        $this->evier = $evier;

        return $this;
    }

    /**
     * Get evier
     *
     * @return boolean
     */
    public function getEvier()
    {
        return $this->evier;
    }

    /**
     * Set mitigeur
     *
     * @param boolean $mitigeur
     *
     * @return Customer
     */
    public function setMitigeur($mitigeur)
    {
        $this->mitigeur = $mitigeur;

        return $this;
    }

    /**
     * Get mitigeur
     *
     * @return boolean
     */
    public function getMitigeur()
    {
        return $this->mitigeur;
    }

    /**
     * Set descriptionElectro
     *
     * @param string $descriptionElectro
     *
     * @return Customer
     */
    public function setDescriptionElectro($descriptionElectro)
    {
        $this->descriptionElectro = $descriptionElectro;

        return $this;
    }

    /**
     * Get descriptionElectro
     *
     * @return string
     */
    public function getDescriptionElectro()
    {
        return $this->descriptionElectro;
    }

    /**
     * Set descriptionTravaux
     *
     * @param string $descriptionTravaux
     *
     * @return Customer
     */
    public function setDescriptionTravaux($descriptionTravaux)
    {
        $this->descriptionTravaux = $descriptionTravaux;

        return $this;
    }

    /**
     * Get descriptionTravaux
     *
     * @return string
     */
    public function getDescriptionTravaux()
    {
        return $this->descriptionTravaux;
    }

    /**
     * Set descriptionProfil
     *
     * @param string $descriptionProfil
     *
     * @return Customer
     */
    public function setDescriptionProfil($descriptionProfil)
    {
        $this->descriptionProfil = $descriptionProfil;

        return $this;
    }

    /**
     * Get descriptionProfil
     *
     * @return string
     */
    public function getDescriptionProfil()
    {
        return $this->descriptionProfil;
    }

    /**
     * Set cabStyle
     *
     * @param string $cabStyle
     *
     * @return Customer
     */
    public function setCabStyle($cabStyle)
    {
        $this->cabStyle = $cabStyle;

        return $this;
    }

    /**
     * Get cabStyle
     *
     * @return string
     */
    public function getCabStyle()
    {
        return $this->cabStyle;
    }

    /**
     * Set concurrence
     *
     * @param string $concurrence
     *
     * @return Customer
     */
    public function setConcurrence($concurrence)
    {
        $this->concurrence = $concurrence;

        return $this;
    }

    /**
     * Get concurrence
     *
     * @return string
     */
    public function getConcurrence()
    {
        return $this->concurrence;
    }

    /**
     * Set diffConcurrence
     *
     * @param string $diffConcurrence
     *
     * @return Customer
     */
    public function setDiffConcurrence($diffConcurrence)
    {
        $this->diffConcurrence = $diffConcurrence;

        return $this;
    }

    /**
     * Get diffConcurrence
     *
     * @return string
     */
    public function getDiffConcurrence()
    {
        return $this->diffConcurrence;
    }
}
