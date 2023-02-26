<?php
namespace App\Application;

use App\Application\Interfaces\IFindUserById;
use App\Models\User;
use App\Http\Interfaces\IUserFindById;

class UserFindById implements IUserFindById
{
    private $finder;

    public function __construct(IFindUserById $finder)
    {
        $this->finder = $finder;
    }

    public function execute(int $id): User
    {
        $user = $this->finder->findById($id);
        return $user;
    }
}
