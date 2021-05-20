<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecipeRepository::class)
 */
class Recipe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nname;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $sweet;

    /**
     * @ORM\Column(type="integer")
     */
    private $partNb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="integer")
     */
    private $prepaTime;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bakingTime;

    /**
     * @ORM\Column(type="date")
     */
    private $creaDate;

    /**
     * @ORM\OneToMany(targetEntity=Ingredient::class, mappedBy="recipe")
     */
    private $ingredient;

    /**
     * @ORM\ManyToOne(targetEntity=RecipeUnit::class, inversedBy="recipes")
     */
    private $recipeUnit;

    /**
     * @ORM\OneToMany(targetEntity=Section::class, mappedBy="recipe")
     */
    private $section;

    /**
     * @ORM\ManyToOne(targetEntity=DishType::class, inversedBy="recipes")
     */
    private $dishType;

    /**
     * @ORM\ManyToMany(targetEntity=MealType::class, inversedBy="recipes")
     */
    private $mealType;

    /**
     * @ORM\ManyToMany(targetEntity=BakingType::class, inversedBy="recipes")
     */
    private $bakingType;

    /**
     * @ORM\ManyToOne(targetEntity=Confidentiality::class, inversedBy="recipe")
     */
    private $confidentiality;

    /**
     * @ORM\ManyToMany(targetEntity=Book::class, mappedBy="recipe")
     */
    private $books;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="recipe")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=Chef::class, inversedBy="recipe")
     */
    private $chef;

    public function __construct()
    {
        $this->ingredient = new ArrayCollection();
        $this->section = new ArrayCollection();
        $this->mealType = new ArrayCollection();
        $this->bakingType = new ArrayCollection();
        $this->books = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNname(): ?string
    {
        return $this->nname;
    }

    public function setNname(string $nname): self
    {
        $this->nname = $nname;

        return $this;
    }

    public function getSweet(): ?string
    {
        return $this->sweet;
    }

    public function setSweet(string $sweet): self
    {
        $this->sweet = $sweet;

        return $this;
    }

    public function getPartNb(): ?int
    {
        return $this->partNb;
    }

    public function setPartNb(int $partNb): self
    {
        $this->partNb = $partNb;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getPrepaTime(): ?int
    {
        return $this->prepaTime;
    }

    public function setPrepaTime(int $prepaTime): self
    {
        $this->prepaTime = $prepaTime;

        return $this;
    }

    public function getBakingTime(): ?int
    {
        return $this->bakingTime;
    }

    public function setBakingTime(?int $bakingTime): self
    {
        $this->bakingTime = $bakingTime;

        return $this;
    }

    public function getCreaDate(): ?\DateTimeInterface
    {
        return $this->creaDate;
    }

    public function setCreaDate(\DateTimeInterface $creaDate): self
    {
        $this->creaDate = $creaDate;

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredient(): Collection
    {
        return $this->ingredient;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredient->contains($ingredient)) {
            $this->ingredient[] = $ingredient;
            $ingredient->setRecipe($this);
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        if ($this->ingredient->removeElement($ingredient)) {
            // set the owning side to null (unless already changed)
            if ($ingredient->getRecipe() === $this) {
                $ingredient->setRecipe(null);
            }
        }

        return $this;
    }

    public function getRecipeUnit(): ?RecipeUnit
    {
        return $this->recipeUnit;
    }

    public function setRecipeUnit(?RecipeUnit $recipeUnit): self
    {
        $this->recipeUnit = $recipeUnit;

        return $this;
    }

    /**
     * @return Collection|Section[]
     */
    public function getSection(): Collection
    {
        return $this->section;
    }

    public function addSection(Section $section): self
    {
        if (!$this->section->contains($section)) {
            $this->section[] = $section;
            $section->setRecipe($this);
        }

        return $this;
    }

    public function removeSection(Section $section): self
    {
        if ($this->section->removeElement($section)) {
            // set the owning side to null (unless already changed)
            if ($section->getRecipe() === $this) {
                $section->setRecipe(null);
            }
        }

        return $this;
    }

    public function getDishType(): ?DishType
    {
        return $this->dishType;
    }

    public function setDishType(?DishType $dishType): self
    {
        $this->dishType = $dishType;

        return $this;
    }

    /**
     * @return Collection|MealType[]
     */
    public function getMealType(): Collection
    {
        return $this->mealType;
    }

    public function addMealType(MealType $mealType): self
    {
        if (!$this->mealType->contains($mealType)) {
            $this->mealType[] = $mealType;
        }

        return $this;
    }

    public function removeMealType(MealType $mealType): self
    {
        $this->mealType->removeElement($mealType);

        return $this;
    }

    /**
     * @return Collection|BakingType[]
     */
    public function getBakingType(): Collection
    {
        return $this->bakingType;
    }

    public function addBakingType(BakingType $bakingType): self
    {
        if (!$this->bakingType->contains($bakingType)) {
            $this->bakingType[] = $bakingType;
        }

        return $this;
    }

    public function removeBakingType(BakingType $bakingType): self
    {
        $this->bakingType->removeElement($bakingType);

        return $this;
    }

    public function getConfidentiality(): ?Confidentiality
    {
        return $this->confidentiality;
    }

    public function setConfidentiality(?Confidentiality $confidentiality): self
    {
        $this->confidentiality = $confidentiality;

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->addRecipe($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            $book->removeRecipe($this);
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setRecipe($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getRecipe() === $this) {
                $comment->setRecipe(null);
            }
        }

        return $this;
    }

    public function getChef(): ?Chef
    {
        return $this->chef;
    }

    public function setChef(?Chef $chef): self
    {
        $this->chef = $chef;

        return $this;
    }
}
