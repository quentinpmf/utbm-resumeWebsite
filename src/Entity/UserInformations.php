<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserInformationsRepository")
 */
class UserInformations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $driverLicense;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $summary;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="userInformations", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EmploymentHistory", mappedBy="userInformations")
     */
    private $employmentHistories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EducationHistory", mappedBy="userInformations")
     */
    private $educationHistories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Hobby", mappedBy="userInfo")
     */
    private $hobbies;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LanguageSkill", mappedBy="userInfo")
     */
    private $languageSkills;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ProfessionalSkill", mappedBy="userInfo")
     */
    private $professionalSkills;

    public function __construct()
    {
        $this->employmentHistories = new ArrayCollection();
        $this->educationHistories = new ArrayCollection();
        $this->hobbies = new ArrayCollection();
        $this->languageSkills = new ArrayCollection();
        $this->professionalSkills = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDriverLicense(): ?string
    {
        return $this->driverLicense;
    }

    public function setDriverLicense(?string $driverLicense): self
    {
        $this->driverLicense = $driverLicense;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|EmploymentHistory[]
     */
    public function getEmploymentHistories(): Collection
    {
        return $this->employmentHistories;
    }

    public function addEmploymentHistory(EmploymentHistory $employmentHistory): self
    {
        if (!$this->employmentHistories->contains($employmentHistory)) {
            $this->employmentHistories[] = $employmentHistory;
            $employmentHistory->setUserInformations($this);
        }

        return $this;
    }

    public function removeEmploymentHistory(EmploymentHistory $employmentHistory): self
    {
        if ($this->employmentHistories->contains($employmentHistory)) {
            $this->employmentHistories->removeElement($employmentHistory);
            // set the owning side to null (unless already changed)
            if ($employmentHistory->getUserInformations() === $this) {
                $employmentHistory->setUserInformations(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EducationHistory[]
     */
    public function getEducationHistories(): Collection
    {
        return $this->educationHistories;
    }

    public function addEducationHistory(EducationHistory $educationHistory): self
    {
        if (!$this->educationHistories->contains($educationHistory)) {
            $this->educationHistories[] = $educationHistory;
            $educationHistory->setUserInformations($this);
        }

        return $this;
    }

    public function removeEducationHistory(EducationHistory $educationHistory): self
    {
        if ($this->educationHistories->contains($educationHistory)) {
            $this->educationHistories->removeElement($educationHistory);
            // set the owning side to null (unless already changed)
            if ($educationHistory->getUserInformations() === $this) {
                $educationHistory->setUserInformations(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Hobby[]
     */
    public function getHobbies(): Collection
    {
        return $this->hobbies;
    }

    public function addHobby(Hobby $hobby): self
    {
        if (!$this->hobbies->contains($hobby)) {
            $this->hobbies[] = $hobby;
            $hobby->setUserInfo($this);
        }

        return $this;
    }

    public function removeHobby(Hobby $hobby): self
    {
        if ($this->hobbies->contains($hobby)) {
            $this->hobbies->removeElement($hobby);
            // set the owning side to null (unless already changed)
            if ($hobby->getUserInfo() === $this) {
                $hobby->setUserInfo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LanguageSkill[]
     */
    public function getLanguageSkills(): Collection
    {
        return $this->languageSkills;
    }

    public function addLanguageSkill(LanguageSkill $languageSkill): self
    {
        if (!$this->languageSkills->contains($languageSkill)) {
            $this->languageSkills[] = $languageSkill;
            $languageSkill->setUserInfo($this);
        }

        return $this;
    }

    public function removeLanguageSkill(LanguageSkill $languageSkill): self
    {
        if ($this->languageSkills->contains($languageSkill)) {
            $this->languageSkills->removeElement($languageSkill);
            // set the owning side to null (unless already changed)
            if ($languageSkill->getUserInfo() === $this) {
                $languageSkill->setUserInfo(null);
            }
        }

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
            $professionalSkill->setUserInfo($this);
        }

        return $this;
    }

    public function removeProfessionalSkill(ProfessionalSkill $professionalSkill): self
    {
        if ($this->professionalSkills->contains($professionalSkill)) {
            $this->professionalSkills->removeElement($professionalSkill);
            // set the owning side to null (unless already changed)
            if ($professionalSkill->getUserInfo() === $this) {
                $professionalSkill->setUserInfo(null);
            }
        }

        return $this;
    }
}
