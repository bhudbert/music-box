<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="instruments")
 * @ORM\Entity(repositoryClass="App\Repository\InstrumentRepository")
 */
class Instrument
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="instruments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="smallint",options={"default":0})
     */
    private $stock;

    /**
     * @ORM\Column(type="boolean",options={"default":false})
     */
    private $promoted;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $illustration;

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPropoted(): ?bool
    {
        return $this->propoted;
    }

    public function setPropoted(bool $propoted): self
    {
        $this->propoted = $propoted;

        return $this;
    }

    public function getIllustration(): ?string
    {
        return $this->illustration;
    }

    public function setIllustration(?string $illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    public function getSlug(): string
    {
        return str_replace(' ','-',$this->name);
    }

}
