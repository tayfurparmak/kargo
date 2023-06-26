<?php

namespace App\Entity;

use App\Repository\SettingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SettingRepository::class)]
class Setting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $keywords = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $company = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $fax = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $smtpserver = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $smtpemail = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $smtppassword = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $smtpport = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $aboutus = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contact = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $reference = null;

    #[ORM\Column(length: 6, nullable: true)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(?string $keywords): static
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): static
    {
        $this->company = $company;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): static
    {
        $this->fax = $fax;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getSmtpserver(): ?string
    {
        return $this->smtpserver;
    }

    public function setSmtpserver(?string $smtpserver): static
    {
        $this->smtpserver = $smtpserver;

        return $this;
    }

    public function getSmtpemail(): ?string
    {
        return $this->smtpemail;
    }

    public function setSmtpemail(?string $smtpemail): static
    {
        $this->smtpemail = $smtpemail;

        return $this;
    }

    public function getSmtppassword(): ?string
    {
        return $this->smtppassword;
    }

    public function setSmtppassword(?string $smtppassword): static
    {
        $this->smtppassword = $smtppassword;

        return $this;
    }

    public function getSmtpport(): ?string
    {
        return $this->smtpport;
    }

    public function setSmtpport(?string $smtpport): static
    {
        $this->smtpport = $smtpport;

        return $this;
    }

    public function getAboutus(): ?string
    {
        return $this->aboutus;
    }

    public function setAboutus(?string $aboutus): static
    {
        $this->aboutus = $aboutus;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): static
    {
        $this->contact = $contact;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
