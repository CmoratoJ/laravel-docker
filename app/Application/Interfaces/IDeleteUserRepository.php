<?php
namespace App\Application\Interfaces;

use App\Models\User;

interface IDeleteUserRepository
{
    function delete(User $user);
}