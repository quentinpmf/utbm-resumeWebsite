<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SkillCategoryRepository")
 */
class SkillCategory
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
     * @ORM\OneToMany(targetEntity="App\Entity\ProfessionalSkill", mappedBy="skillCategory")
     */
    private $professionalSkills;

    public function __construct()
    {
        $this->professionalSkills = new ArrayCollection();
    }

    public function getId(): ?int
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

    /**
     * @return Collection|ProfessionalSkill[]
     */
    public function getProfessionalSkills(): Collection
    {
        return $this->professionalSkills;
    }

    public function addProfessionalSkill(ProfessionalSkill $professionalSkill): self
    {
        if (!$this->professionalSkills->contains($professionalSkill)) {
            $this->professionalSkills[] = $professionalSkill;
            $professionalSkill->setSkillCategory($this);
        }

        return $this;
    }

    public function removeProfessionalSkill(ProfessionalSkill $professionalSkill): self
    {
        if ($this->professionalSkills->contains($professionalSkill)) {
            $this->professionalSkills->removeElement($professionalSkill);
            // set the owning side to null (unless already changed)
            if ($professionalSkill->getSkillCategory() === $this) {
                $professionalSkill->setSkillCategory(null);
            }
        }

        return $this;
    }
}
