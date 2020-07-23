<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Artist::class, mappedBy="category_id")
     */
    private $artists_category;

    /**
     * @ORM\OneToMany(targetEntity=Performance::class, mappedBy="category_id")
     */
    private $performances_category;

    public function __construct()
    {
        $this->artists_category = new ArrayCollection();
        $this->performances_category = new ArrayCollection();
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

    /**
     * @return Collection|Artist[]
     */
    public function getArtistsCategory(): Collection
    {
        return $this->artists_category;
    }

    public function addArtistsCategory(Artist $artistsCategory): self
    {
        if (!$this->artists_category->contains($artistsCategory)) {
            $this->artists_category[] = $artistsCategory;
            $artistsCategory->setCategoryId($this);
        }

        return $this;
    }

    public function removeArtistsCategory(Artist $artistsCategory): self
    {
        if ($this->artists_category->contains($artistsCategory)) {
            $this->artists_category->removeElement($artistsCategory);
            // set the owning side to null (unless already changed)
            if ($artistsCategory->getCategoryId() === $this) {
                $artistsCategory->setCategoryId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Performance[]
     */
    public function getPerformancesCategory(): Collection
    {
        return $this->performances_category;
    }

    public function addPerformancesCategory(Performance $performancesCategory): self
    {
        if (!$this->performances_category->contains($performancesCategory)) {
            $this->performances_category[] = $performancesCategory;
            $performancesCategory->setCategoryId($this);
        }

        return $this;
    }

    public function removePerformancesCategory(Performance $performancesCategory): self
    {
        if ($this->performances_category->contains($performancesCategory)) {
            $this->performances_category->removeElement($performancesCategory);
            // set the owning side to null (unless already changed)
            if ($performancesCategory->getCategoryId() === $this) {
                $performancesCategory->setCategoryId(null);
            }
        }

        return $this;
    }
}
