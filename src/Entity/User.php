<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column]
    private int $black_win = 0;

    #[ORM\Column]
    private int $white_win = 0;

    #[ORM\Column]
    private int $black_lose = 0;

    #[ORM\Column]
    private int $white_lose = 0;

    #[ORM\Column(nullable: true)]
    private ?int $best_game = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getBlackWin(): ?int
    {
        return $this->black_win;
    }

    public function setBlackWin(int $black_win): static
    {
        $this->black_win = $black_win;

        return $this;
    }

    public function getWhiteWin(): ?int
    {
        return $this->white_win;
    }

    public function setWhiteWin(int $white_win): static
    {
        $this->white_win = $white_win;

        return $this;
    }

    public function getBlackLose(): ?int
    {
        return $this->black_lose;
    }

    public function setBlackLose(int $black_lose): static
    {
        $this->black_lose = $black_lose;

        return $this;
    }

    public function getWhiteLose(): ?int
    {
        return $this->white_lose;
    }

    public function setWhiteLose(int $white_lose): static
    {
        $this->white_lose = $white_lose;

        return $this;
    }

    public function getBestGame(): ?int
    {
        return $this->best_game;
    }

    public function setBestGame(int $best_game): static
    {
        $this->best_game = $best_game;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }
}
