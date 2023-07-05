<?php

namespace App\Entity\Admin;

use App\Repository\Admin\CargoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CargoRepository::class)]
class Cargo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $KargoId = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $alici_adi = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $alici_adresi = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $gönderici_adi = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $gönderici_adresi = null;

    #[ORM\Column(nullable: true)]
    private ?int $agirlik = null;

    #[ORM\Column(nullable: true)]
    private ?int $boyutlar = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $gönderim_tarihi = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $teslimat_durumu = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $odeme_durumu = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $update_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKargoId(): ?int
    {
        return $this->KargoId;
    }

    public function setKargoId(?int $KargoId): static
    {
        $this->KargoId = $KargoId;

        return $this;
    }

    public function getAliciAdi(): ?string
    {
        return $this->alici_adi;
    }

    public function setAliciAdi(?string $alici_adi): static
    {
        $this->alici_adi = $alici_adi;

        return $this;
    }

    public function getAliciAdresi(): ?string
    {
        return $this->alici_adresi;
    }

    public function setAliciAdresi(?string $alici_adresi): static
    {
        $this->alici_adresi = $alici_adresi;

        return $this;
    }

    public function getGöndericiAdi(): ?string
    {
        return $this->gönderici_adi;
    }

    public function setGöndericiAdi(?string $gönderici_adi): static
    {
        $this->gönderici_adi = $gönderici_adi;

        return $this;
    }

    public function getGöndericiAdresi(): ?string
    {
        return $this->gönderici_adresi;
    }

    public function setGöndericiAdresi(?string $gönderici_adresi): static
    {
        $this->gönderici_adresi = $gönderici_adresi;

        return $this;
    }

    public function getAgirlik(): ?int
    {
        return $this->agirlik;
    }

    public function setAgirlik(?int $agirlik): static
    {
        $this->agirlik = $agirlik;

        return $this;
    }

    public function getBoyutlar(): ?int
    {
        return $this->boyutlar;
    }

    public function setBoyutlar(?int $boyutlar): static
    {
        $this->boyutlar = $boyutlar;

        return $this;
    }

    public function getGönderimTarihi(): ?\DateTimeInterface
    {
        return $this->gönderim_tarihi;
    }

    public function setGönderimTarihi(?\DateTimeInterface $gönderim_tarihi): static
    {
        $this->gönderim_tarihi = $gönderim_tarihi;

        return $this;
    }

    public function getTeslimatDurumu(): ?string
    {
        return $this->teslimat_durumu;
    }

    public function setTeslimatDurumu(?string $teslimat_durumu): static
    {
        $this->teslimat_durumu = $teslimat_durumu;

        return $this;
    }

    public function getOdemeDurumu(): ?string
    {
        return $this->odeme_durumu;
    }

    public function setOdemeDurumu(?string $odeme_durumu): static
    {
        $this->odeme_durumu = $odeme_durumu;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->update_at;
    }

    public function setUpdateAt(?\DateTimeImmutable $update_at): static
    {
        $this->update_at = $update_at;

        return $this;
    }
}
