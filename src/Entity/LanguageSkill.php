<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LanguageSkillRepository")
 */
class LanguageSkill
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
    private $languageSpoken;

    /**
     * @ORM\Column(type="integer")
     */
    private $rating;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserInformations", inversedBy="languageSkills")
     */
    private $userInfo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguageSpoken(): ?string
    {
        return $this->languageSpoken;
    }

    public function setLanguageSpoken(string $languageSpoken): self
    {
        $this->languageSpoken = $languageSpoken;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;

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
