<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    private $id;
    private $name;
    private $email;
    private $delegacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return (string) $this->name;
    }

    public function getEmail(): string
    {
        return (string) $this->email;
    }

    public function getDelegacion(): string
    {
        return (string) $this->delegacion;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setDelegacion(string $delegacion): self
    {
        $this->delegacion = $delegacion;

        return $this;
    }
}
