<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SongRepository")
 */
class Song
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type")
     */
    private $idgenre;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $coverpicture;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $iduser;
    /**
     * @ORM\Column(type="boolean")
     */
    private $downloadable;
    /**
     * @ORM\Column(type="boolean")
     */
    private $explicit;
    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $dateupload;
    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $datecreation;
    /**
     * @ORM\Column(type="integer")
     */
    private $duration;
    /**
     * @ORM\Column(type="boolean")
     */
    private $enable;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nblike;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbplayed;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbdownloaded;
    public function getId()
    {
        return $this->id;
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }
    public function getIdgenre(): ?Type
    {
        return $this->idgenre;
    }
    public function setIdgenre(?Type $idgenre): self
    {
        $this->idgenre = $idgenre;
        return $this;
    }
    public function getCoverpicture(): ?string
    {
        return $this->coverpicture;
    }
    public function setCoverpicture(string $coverpicture): self
    {
        $this->coverpicture = $coverpicture;
        return $this;
    }
    public function getIduser(): ?User
    {
        return $this->iduser;
    }
    public function setIduser(?User $iduser): self
    {
        $this->iduser = $iduser;
        return $this;
    }
    public function getDownloadable(): ?bool
    {
        return $this->downloadable;
    }
    public function setDownloadable(bool $downloadable): self
    {
        $this->downloadable = $downloadable;
        return $this;
    }
    public function getExplicit(): ?bool
    {
        return $this->explicit;
    }
    public function setExplicit(bool $explicit): self
    {
        $this->explicit = $explicit;
        return $this;
    }
    public function getDateupload(): ?\DateTimeInterface
    {
        return $this->dateupload;
    }
    public function setDateupload($dateupload): self
    {
        $this->dateupload = $dateupload;
        return $this;
    }
    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }
    public function setDatecreation($datecreation): self
    {
        $this->datecreation = $datecreation;
        return $this;
    }
    public function getDuration(): ?int
    {
        return $this->duration;
    }
    public function setDuration(int $duration): self
    {
        $this->duration = $duration;
        return $this;
    }
    public function getEnable(): ?bool
    {
        return $this->enable;
    }
    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;
        return $this;
    }
    public function getNblike(): ?int
    {
        return $this->nblike;
    }
    public function setNblike(?int $nblike): self
    {
        $this->nblike = $nblike;
        return $this;
    }
    public function getNbplayed(): ?int
    {
        return $this->nbplayed;
    }
    public function setNbplayed(?int $nbplayed): self
    {
        $this->nbplayed = $nbplayed;
        return $this;
    }
    public function getNbdownloaded(): ?int
    {
        return $this->nbdownloaded;
    }
    public function setNbdownloaded(?int $nbdownloaded): self
    {
        $this->nbdownloaded = $nbdownloaded;
        return $this;
    }
}
