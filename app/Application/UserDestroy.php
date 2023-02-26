<?php
namespace App\Application;

use App\Http\Interfaces\IUserDestroy;
use App\Application\Interfaces\IFindUserById;
use App\Application\Interfaces\IDeleteUserRepository;

class UserDestroy implements IUserDestroy
{
    private $finder;
    private $repository;

    public function __construct(IFindUserById $finder, IDeleteUserRepository $repository)
    {
        $this->finder = $finder;
        $this->repository = $repository;
    }
    
    public function execute(int $id)
    {
        $user = $this->finder->findById($id);
        $this->repository->delete($user);
    }
}
