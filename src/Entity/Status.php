<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass=StatusRepository::class)
 */
class Status
{
    /**
     * @var UuidInterface
     *
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true, name="id")
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private UuidInterface $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $mailSubject;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $mailBody;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $isDefault;

    public function getId(): ?UuidInterface
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

    public function getMailSubject(): ?string
    {
        return $this->mailSubject;
    }

    public function setMailSubject(string $mailSubject): self
    {
        $this->mailSubject = $mailSubject;

        return $this;
    }

    public function getMailBody(): ?string
    {
        return $this->mailBody;
    }

    public function setMailBody(string $mailBody): self
    {
        $this->mailBody = $mailBody;

        return $this;
    }

    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): self
    {
        $this->isDefault = $isDefault;

        return $this;
    }
}
