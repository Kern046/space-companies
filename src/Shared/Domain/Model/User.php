<?php

namespace App\Shared\Domain\Model;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    public function getUserIdentifier(): string
    {
        // TODO: Implement getUserIdentifier() method.
    }

    public function getRoles(): array
    {
        // TODO: Implement getRoles() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}