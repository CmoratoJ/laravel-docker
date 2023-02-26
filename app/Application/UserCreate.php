<?php
namespace App\Application;

use App\Application\Interfaces\IPersistUserRepository;
use App\Models\User;
use App\Http\Interfaces\IUserCreate;
use App\Http\Requests\CreateOrUpdateUserRequest;

class UserCreate implements IUserCreate
{
    private $repository;

    public function __construct(IPersistUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CreateOrUpdateUserRequest $request): User
    {
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        return $this->repository->persist($user);
    }
}
