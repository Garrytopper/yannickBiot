<?php

namespace YB\IxinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestation
 *
 * @ORM\Table(name="prestation")
 * @ORM\Entity(repositoryClass="YB\IxinaBundle\Repository\PrestationRepository")
 */
class Prestation
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
    * @ORM\ManyToOne(targetEntity="YB\IxinaBundle\Entity\Customer")
    */
    private $client;

    /**
     * @var string
     *
     * @ORM\Column(name="fournisseur", type="string", length=255, nullable=true)
     */
    private $fournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="produit", type="string", length=255, nullable=true)
     */
    private $produit;

    /**
     * @var string
     *
     * @ORM\Column(name="finitions", type="string", length=500, nullable=true)
     */
    private $finitions;

    /**
     * @ORM\OneToOne(targetEntity="YB\IxinaBundle\Entity\PlanPrestation", cascade={"persist", "remove"})
     */
    private $plan;

    /**
     * @var bool
     *
     * @ORM\Column(name="devisSigne", type="boolean", nullable=true)
     */
    private $devisSigne;

    /**
     * @var bool
     *
     * @ORM\Column(name="validation", type="boolean", nullable=true)
     */
    private $validation;

    /**
     * @var bool
     *
     * @ORM\Column(name="rappel", type="boolean", nullable=true)
     */
    private $rappel;

    /**
     * @var bool
     *
     * @ORM\Column(name="planif", type="boolean", nullable=true)
     */
    private $planif;

    /**
    *   @ORM\Column(name="timeDateLiv", type="integer", nullable=true)
    */
    private $timeDateLiv;



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
     * Set fournisseur
     *
     * @param string $fournisseur
     *
     * @return Prestation
     */
    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get fournisseur
     *
     * @return string
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * Set produit
     *
     * @param string $produit
     *
     * @return Prestation
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return string
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set finitions
     *
     * @param string $finitions
     *
     * @return Prestation
     */
    public function setFinitions($finitions)
    {
        $this->finitions = $finitions;

        return $this;
    }

    /**
     * Get finitions
     *
     * @return string
     */
    public function getFinitions()
    {
        return $this->finitions;
    }

    /**
     * Set plan
     *
     * @param string $plan
     *
     * @return Prestation
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
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
     * Set devisSigne
     *
     * @param boolean $devisSigne
     *
     * @return Prestation
     */
    public function setDevisSigne($devisSigne)
    {
        $this->devisSigne = $devisSigne;

        return $this;
    }

    /**
     * Get devisSigne
     *
     * @return bool
     */
    public function getDevisSigne()
    {
        return $this->devisSigne;
    }

    /**
     * Set validation
     *
     * @param boolean $validation
     *
     * @return Prestation
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Get validation
     *
     * @return bool
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set rappel
     *
     * @param boolean $rappel
     *
     * @return Prestation
     */
    public function setRappel($rappel)
    {
        $this->rappel = $rappel;

        return $this;
    }

    /**
     * Get rappel
     *
     * @return bool
     */
    public function getRappel()
    {
        return $this->rappel;
    }

    /**
     * Set planif
     *
     * @param boolean $planif
     *
     * @return Prestation
     */
    public function setPlanif($planif)
    {
        $this->planif = $planif;

        return $this;
    }

    /**
     * Get planif
     *
     * @return bool
     */
    public function getPlanif()
    {
        return $this->planif;
    }

    /**
     * Set client
     *
     * @param \YB\IxinaBundle\Entity\Customer $client
     *
     * @return Prestation
     */
    public function setClient(\YB\IxinaBundle\Entity\Customer $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \YB\IxinaBundle\Entity\Customer
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set timeDateLiv
     *
     * @param integer $timeDateLiv
     *
     * @return Prestation
     */
    public function setTimeDateLiv($timeDateLiv)
    {
        $this->timeDateLiv = $timeDateLiv;

        return $this;
    }

    /**
     * Get timeDateLiv
     *
     * @return integer
     */
    public function getTimeDateLiv()
    {
        return $this->timeDateLiv;
    }
}
