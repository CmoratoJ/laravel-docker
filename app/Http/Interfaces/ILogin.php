<?php
namespace App\Http\Interfaces;

interface ILogin
{
    public function execute(array $credentials): array;
}
