<?php

namespace App\Entity;

use App\Repository\KartaProduktuRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KartaProduktuRepository::class)
 */
class KartaProduktu
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nazwaProduktu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazwaProduktu(): ?string
    {
        return $this->nazwaProduktu;
    }

    public function setNazwaProduktu(string $nazwaProduktu): self
    {
        $this->nazwaProduktu = $nazwaProduktu;

        return $this;
    }
}
