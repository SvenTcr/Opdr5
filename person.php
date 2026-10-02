<?php

abstract class Person
{
    private string $name;
    private string $email;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    // Getter
    public function getName(): string
    {
        return $this->name;
    }

    // Setter
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    // Elke Person moet zijn/haar rol aangeven
    abstract public function getRole(): string;
}