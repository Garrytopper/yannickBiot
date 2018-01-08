<?php

namespace YB\IxinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelCheque
 *
 * @ORM\Table(name="rel_cheque")
 * @ORM\Entity(repositoryClass="YB\IxinaBundle\Repository\RelChequeRepository")
 */
class RelCheque
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
     * @ORM\Column(name="tel", type="string", length=10)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCheque", type="string", length=255, nullable=true)
     */
    private $nomCheque;

    /**
     * @var string
     *
     * @ORM\Column(name="origine", type="string", length=255)
     */
    private $origine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRelance", type="datetime")
     */
    private $dateRelance;


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
     * @return RelCheque
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
     * Set tel
     *
     * @param string $tel
     *
     * @return RelCheque
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return RelCheque
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
     * Set montant
     *
     * @param integer $montant
     *
     * @return RelCheque
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set nomCheque
     *
     * @param string $nomCheque
     *
     * @return RelCheque
     */
    public function setNomCheque($nomCheque)
    {
        $this->nomCheque = $nomCheque;

        return $this;
    }

    /**
     * Get nomCheque
     *
     * @return string
     */
    public function getNomCheque()
    {
        return $this->nomCheque;
    }

    /**
     * Set origine
     *
     * @param string $origine
     *
     * @return RelCheque
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine
     *
     * @return string
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set dateRelance
     *
     * @param \DateTime $dateRelance
     *
     * @return RelCheque
     */
    public function setDateRelance($dateRelance)
    {
        $this->dateRelance = $dateRelance;

        return $this;
    }

    /**
     * Get dateRelance
     *
     * @return \DateTime
     */
    public function getDateRelance()
    {
        return $this->dateRelance;
    }
}

