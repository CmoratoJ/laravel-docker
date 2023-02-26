<?php
namespace App\Application\Interfaces;

use App\Models\User;

interface IPersistUserRepository
{
    public function persist(User $user): User;
}
