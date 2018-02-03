<?php

namespace YB\IxinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * PlanPrestation
 *
 * @ORM\Table(name="plan_prestation")
 * @ORM\Entity(repositoryClass="YB\IxinaBundle\Repository\PlanPrestationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class PlanPrestation
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
     * @ORM\Column(name="extension", type="string", length=255)
     */
    private $extension;

    private $tempFilename;

    private $file;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;

        if (null !== $this->extension) {
            $this->tempFilename = $this->extension;
            $this->extension = null;
        }
    }

    /**
    * @ORM\PreUpdate()
    * @ORM\PrePersist()
    */
    public function preUpload()
    {
        if (null === $this->file) {
            return;
        }
        $this->extension = $this->file->guessExtension();
    }

    /**
    * @ORM\PostPersist()
    * @ORM\PostUpdate() 
    */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $this->file->move(
            $this->getUploadRootDir(),
            $this->id.'.'.$this->extension 
            );
    }

    /**
    * @ORM\PreRemove()
    */
    public function preRemoveUpload()
    {
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->extension;
    }

    /**
    * @ORM\PostRemove()
    */
    public function removeUpload()
    {
        if (file_exists($this->tempFilename)) {
            unlink($this->tempFilename);
        }
    }

    public function getUploadDir()
    {
        return 'uploads/planPrest';
    }

    public function getUploadRootDir()
    {
        return __DIR__ .'/../../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getExtension();
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
     * Set url
     *
     * @param string $extension
     *
     * @return PlanPrestation
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }
}
