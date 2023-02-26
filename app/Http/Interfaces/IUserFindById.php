<?php
namespace App\Http\Interfaces;

use App\Models\User;

interface IUserFindById
{
    public function execute(int $id): User;
}
