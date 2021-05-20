<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionRepository::class)
 */
class Section
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Step::class, mappedBy="section")
     */
    private $Steps;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="section")
     */
    private $recipe;

    public function __construct()
    {
        $this->Steps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Step[]
     */
    public function getSteps(): Collection
    {
        return $this->Steps;
    }

    public function addStep(Step $step): self
    {
        if (!$this->Steps->contains($step)) {
            $this->Steps[] = $step;
            $step->setSection($this);
        }

        return $this;
    }

    public function removeStep(Step $step): self
    {
        if ($this->Steps->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getSection() === $this) {
                $step->setSection(null);
            }
        }

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }
}
