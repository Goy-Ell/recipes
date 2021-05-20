<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=IngredientUnit::class, inversedBy="ingredients")
     */
    private $IngredientUnit;

    /**
     * @ORM\ManyToMany(targetEntity=Allergen::class, inversedBy="ingredients")
     */
    private $allergen;

    /**
     * @ORM\OneToOne (targetEntity=IngredientInfo::class, inversedBy="ingredient")
     */
    private $ingredientInfo;

    /**
     * @ORM\ManyToOne(targetEntity=IngredientType::class, inversedBy="ingredients")
     */
    private $ingredientType;

    /**
     * @ORM\ManyToOne(targetEntity=Recipe::class, inversedBy="ingredient")
     */
    private $recipe;

    public function __construct()
    {
        $this->allergen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getIngredientUnit(): ?IngredientUnit
    {
        return $this->IngredientUnit;
    }

    public function setIngredientUnit(?IngredientUnit $IngredientUnit): self
    {
        $this->IngredientUnit = $IngredientUnit;

        return $this;
    }

    /**
     * @return Collection|Allergen[]
     */
    public function getAllergen(): Collection
    {
        return $this->allergen;
    }

    public function addAllergen(Allergen $allergen): self
    {
        if (!$this->allergen->contains($allergen)) {
            $this->allergen[] = $allergen;
        }

        return $this;
    }

    public function removeAllergen(Allergen $allergen): self
    {
        $this->allergen->removeElement($allergen);

        return $this;
    }

    public function getIngredientInfo(): ?IngredientInfo
    {
        return $this->ingredientInfo;
    }

    public function setIngredientInfo(?IngredientInfo $ingredientInfo): self
    {
        $this->ingredientInfo = $ingredientInfo;

        return $this;
    }

    public function getIngredientType(): ?IngredientType
    {
        return $this->ingredientType;
    }

    public function setIngredientType(?IngredientType $ingredientType): self
    {
        $this->ingredientType = $ingredientType;

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
