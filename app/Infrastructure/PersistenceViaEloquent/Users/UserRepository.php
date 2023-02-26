<?php
namespace App\Infrastructure\PersistenceViaEloquent\Users;

use App\Application\Interfaces\IDeleteUserRepository;
use App\Models\User;
use App\Application\Interfaces\IFindUserById;
use App\Application\Interfaces\IFindUsers;
use App\Application\Interfaces\IPersistUserRepository;

class UserRepository implements 
IPersistUserRepository, 
IFindUserById, 
IDeleteUserRepository, 
IFindUsers
{
    public function persist(User $user): User
    {
        $user->save();
        return $user;
    }

    function findById(int $id): User
    {
        return User::find($id);
    }

    function delete(User $user)
    {
        $user->delete();
    }

    function findAll(): object
    {
        return User::all();
    }
}
