<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\ILogin;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private ILogin $loginService;

    public function __construct(ILogin $loginService)
    {
        $this->loginService = $loginService;
    }
    public function login(Request $request): JsonResponse
    {
        try {
            $credentials = $request->only('email', 'password');
            $auth = $this->loginService->execute($credentials);

            return response()->json($auth, 200);
        }catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        }
    }

    public function me(): JsonResponse
    {
        try {
            return response()->json(auth()->user(), 200);
        }catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        }
    }

    public function logout()
    {
        try {
            auth()->logout(true);
        }catch (Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], $e->getCode());
        }
    }
}
