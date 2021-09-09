<?php

namespace App\Entity;

use App\Repository\SalutationRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass=SalutationRepository::class)
 */
class Salutation
{
    /**
     * @var UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true, name="id")
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $title;

    public function getId(): UuidInterface
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
}
