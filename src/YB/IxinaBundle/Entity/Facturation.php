<?php

namespace YB\IxinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facturation
 *
 * @ORM\Table(name="facturation")
 * @ORM\Entity(repositoryClass="YB\IxinaBundle\Repository\FacturationRepository")
 */
class Facturation
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="ad1", type="string", length=255, nullable=true)
     */
    private $ad1;

    /**
     * @var string
     *
     * @ORM\Column(name="ad2", type="string", length=255, nullable=true)
     */
    private $ad2;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=20, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5, nullable=true)
     */
    private $cp;

    /**
     * @var int
     *
     * @ORM\Column(name="montantVente", type="integer", nullable=true)
     */
    private $montantVente;

    /**
     * @var decimal
     *
     * @ORM\Column(name="tva", type="decimal", precision=2, scale=1, nullable=true)
     */
    private $tva;

    /**
     * @var int
     *
     * @ORM\Column(name="montantAcompte", type="integer", nullable=true)
     */
    private $montantAcompte;

    /**
     * @var string
     *
     * @ORM\Column(name="typeFacture", type="string", length=255)
     */
    private $typeFacture;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Facturation
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
     * Set ad1
     *
     * @param string $ad1
     *
     * @return Facturation
     */
    public function setAd1($ad1)
    {
        $this->ad1 = $ad1;

        return $this;
    }

    /**
     * Get ad1
     *
     * @return string
     */
    public function getAd1()
    {
        return $this->ad1;
    }

    /**
     * Set ad2
     *
     * @param string $ad2
     *
     * @return Facturation
     */
    public function setAd2($ad2)
    {
        $this->ad2 = $ad2;

        return $this;
    }

    /**
     * Get ad2
     *
     * @return string
     */
    public function getAd2()
    {
        return $this->ad2;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Facturation
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set cp
     *
     * @param string $cp
     *
     * @return Facturation
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set montantVente
     *
     * @param integer $montantVente
     *
     * @return Facturation
     */
    public function setMontantVente($montantVente)
    {
        $this->montantVente = $montantVente;

        return $this;
    }

    /**
     * Get montantVente
     *
     * @return int
     */
    public function getMontantVente()
    {
        return $this->montantVente;
    }

    /**
     * Set tva
     *
     * @param integer $tva
     *
     * @return Facturation
     */
    public function setTva($tva)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return int
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set montantAcompte
     *
     * @param integer $montantAcompte
     *
     * @return Facturation
     */
    public function setMontantAcompte($montantAcompte)
    {
        $this->montantAcompte = $montantAcompte;

        return $this;
    }

    /**
     * Get montantAcompte
     *
     * @return int
     */
    public function getMontantAcompte()
    {
        return $this->montantAcompte;
    }

    /**
     * Set typeFacture
     *
     * @param string $typeFacture
     *
     * @return Facturation
     */
    public function setTypeFacture($typeFacture)
    {
        $this->typeFacture = $typeFacture;

        return $this;
    }

    /**
     * Get typeFacture
     *
     * @return string
     */
    public function getTypeFacture()
    {
        return $this->typeFacture;
    }
}

