<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfessionalSkillRepository")
 */
class ProfessionalSkill
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
     * @ORM\ManyToOne(targetEntity="App\Entity\SkillCategory", inversedBy="professionalSkills")
     */
    private $skillCategory;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserInformations", inversedBy="professionalSkills")
     */
    private $userInfo;

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

    public function getSkillCategory(): ?SkillCategory
    {
        return $this->skillCategory;
    }

    public function setSkillCategory(?SkillCategory $skillCategory): self
    {
        $this->skillCategory = $skillCategory;

        return $this;
    }

    public function getUserInfo(): ?UserInformations
    {
        return $this->userInfo;
    }

    public function setUserInfo(?UserInformations $userInfo): self
    {
        $this->userInfo = $userInfo;

        return $this;
    }
}
