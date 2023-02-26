<?php
namespace App\Application;

use App\Http\Interfaces\ILogin;
use Exception;

class LoginService implements ILogin
{
    /**
     * @throws Exception
     */
    public function execute(array $credentials): array
    {
        if (!$token = auth()->setTTL(6 * 60)->attempt($credentials)) {
            throw new Exception('Not authorized', 401);
        }

        return [
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL(),
            'user' => auth()->user(),
        ];
    }
}
