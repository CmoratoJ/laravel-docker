<?php
namespace App\Http\Interfaces;

use App\Http\Requests\CreateOrUpdateUserRequest;
use App\Models\User;

interface IUserCreate
{
    public function execute(CreateOrUpdateUserRequest $request): User;
}
