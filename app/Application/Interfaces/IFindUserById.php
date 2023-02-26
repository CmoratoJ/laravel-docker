<?php
namespace App\Application\Interfaces;

use App\Models\User;

interface IFindUserById
{
    public function findById(int $id): User;
}