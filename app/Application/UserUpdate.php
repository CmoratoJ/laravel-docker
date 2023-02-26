<?php
namespace App\Application;

use App\Models\User;
use App\Http\Interfaces\IUserUpdate;
use App\Application\Interfaces\IFindUserById;
use App\Http\Requests\CreateOrUpdateUserRequest;
use App\Application\Interfaces\IPersistUserRepository;

class UserUpdate implements IUserUpdate
{
    private $finder;
    private $repository;

    public function __construct(IFindUserById $finder, IPersistUserRepository $repository)
    {
        $this->finder = $finder;
        $this->repository = $repository;
    }

    public function execute(CreateOrUpdateUserRequest $request, int $id): User
    {
        $user = $this->finder->findById($id);
        
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        return $this->repository->persist($user);
    }
}
