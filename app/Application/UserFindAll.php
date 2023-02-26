<?php
namespace App\Application;

use App\Models\User;
use App\Http\Interfaces\IUserFindAll;
use App\Application\Interfaces\IFindUsers;

class UserFindAll implements IUserFindAll
{
    private $finder;

    public function __construct(IFindUsers $finder)
    {
        $this->finder = $finder;
    }

    public function execute(): object
    {
        $users = $this->finder->findAll();
        return $users;
    }
}
