<?php
namespace App\Http\Interfaces;

use App\Http\Requests\CreateOrUpdateUserRequest;
use App\Models\User;

interface IUserUpdate
{
    public function execute(CreateOrUpdateUserRequest $request, int $id): User;
}
