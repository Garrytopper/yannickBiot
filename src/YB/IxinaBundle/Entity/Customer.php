<?php

namespace YB\IxinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use YB\UserBundle\Entity\User; 

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="YB\IxinaBundle\Repository\CustomerRepository")
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=true)
     */
    private $prenom;

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
     * @ORM\Column(name="postalAd1", type="string", length=255, nullable=true)
     */
    private $postalAd1;

    /**
     * @var string
     *
     * @ORM\Column(name="postalAd2", type="string", length=255, nullable=true)
     */
    private $postalAd2;

    /**
     * @var string
     *
     * @ORM\Column(name="postalVille", type="string", length=20, nullable=true)
     */
    private $postalVille;

    /**
     * @var string
     *
     * @ORM\Column(name="postalCp", type="string", length=5, nullable=true)
     */
    private $postalCp;

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
     * @ORM\Column(name="descriptionFinition", type="string", length=255, nullable=true)
     */
    private $descriptionFinition;

    /**
     * @var bool
     *
     * @ORM\Column(name="electro", type="boolean", nullable=true)
     */
    private $electro;

    /**
     * @var bool
     *
     * @ORM\Column(name="liv", type="boolean", nullable=true)
     */
    private $liv;

    /**
     * @var bool
     *
     * @ORM\Column(name="pose", type="boolean", nullable=true)
     */
    private $pose;

    /**
     * @var bool
     *
     * @ORM\Column(name="autre", type="boolean", nullable=true)
     */
    private $autre;

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
     * @ORM\Column(name="cabMeuble", type="string", length=255, nullable=true)
     */
    private $cabMeuble;

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
     * @ORM\Column(name="actionRemarque", type="string", length=255, nullable=true)
     */
    private $actionRemarque;

    public function __construct()
    {
        $this->etatDossier = 'Prospect';
        $this->dateCreation = new \DateTime('now');
        $this->dateLivSouhaite = new \DateTime('now + 2 month');
        $this->dateProchaineAction = new \DateTime('now');
        $this->action = 'Decouverte';
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Customer
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
     * Set postalAd1
     *
     * @param string $postalAd1
     *
     * @return Customer
     */
    public function setPostalAd1($postalAd1)
    {
        $this->postalAd1 = $postalAd1;

        return $this;
    }

    /**
     * Get postalAd1
     *
     * @return string
     */
    public function getPostalAd1()
    {
        return $this->postalAd1;
    }

    /**
     * Set postalAd2
     *
     * @param string $postalAd2
     *
     * @return Customer
     */
    public function setPostalAd2($postalAd2)
    {
        $this->postalAd2 = $postalAd2;

        return $this;
    }

    /**
     * Get postalAd2
     *
     * @return string
     */
    public function getPostalAd2()
    {
        return $this->postalAd2;
    }

    /**
     * Set postalVille
     *
     * @param string $postalVille
     *
     * @return Customer
     */
    public function setPostalVille($postalVille)
    {
        $this->postalVille = $postalVille;

        return $this;
    }

    /**
     * Get postalVille
     *
     * @return string
     */
    public function getPostalVille()
    {
        return $this->postalVille;
    }

    /**
     * Set postalCp
     *
     * @param string $postalCp
     *
     * @return Customer
     */
    public function setPostalCp($postalCp)
    {
        $this->postalCp = $postalCp;

        return $this;
    }

    /**
     * Get postalCp
     *
     * @return string
     */
    public function getPostalCp()
    {
        return $this->postalCp;
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
     * Set electro
     *
     * @param boolean $electro
     *
     * @return Customer
     */
    public function setElectro($electro)
    {
        $this->electro = $electro;

        return $this;
    }

    /**
     * Get electro
     *
     * @return bool
     */
    public function getElectro()
    {
        return $this->electro;
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
}
