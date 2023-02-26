<?php
namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\IUserCreate;
use App\Http\Interfaces\IUserDestroy;
use App\Http\Interfaces\IUserFindAll;
use App\Http\Interfaces\IUserFindById;
use App\Http\Interfaces\IUserUpdate;
use App\Http\Requests\CreateOrUpdateUserRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private IUserCreate $userCreate;
    private IUserUpdate $userUpdate;
    private IUserFindAll $userFindAll;
    private IUserFindById $userFindById;
    private IUserDestroy $userDestroy;

    public function __construct(
        IUserCreate $userCreate,
        IUserUpdate $userUpdate,
        IUserFindAll $userFindAll,
        IUserFindById $userFindById,
        IUserDestroy $userDestroy
    ) {
        $this->userCreate = $userCreate;
        $this->userUpdate = $userUpdate;
        $this->userFindAll = $userFindAll;
        $this->userFindById = $userFindById;
        $this->userDestroy = $userDestroy;
    }

    public function findAll(): JsonResponse
    {
        try {
            $users = $this->userFindAll->execute();
            return response()
            ->json(
                ['status' => true, 'users' => $users], 
                200
            );
        } catch (Exception $e) {
            return response()
            ->json(
                ['status' => false, 'message' => $e->getMessage()], 
                500
            );
        }
    }

    public function store(CreateOrUpdateUserRequest $request): JsonResponse
    {
        try {
            $user = $this->userCreate->execute($request);
            return response()
            ->json(
                ['status' => true, 'user' => $user], 
                200
            );
        } catch (Exception $e) {
            return response()
            ->json(
                ['status' => false, 'message' => $e->getMessage()], 
                500
            );
        }
    }

    public function findById(int $id): JsonResponse
    {
        try {
            $user = $this->userFindById->execute($id);
            return response()
            ->json(
                ['status' => true, 'user' => $user], 
                200
            );
        } catch (Exception $e) {
            return response()
            ->json(
                ['status' => false, 'message' => $e->getMessage()], 
                500
            );
        }
    }

    public function update(CreateOrUpdateUserRequest $request, int $id): JsonResponse
    {
        try {
            $user = $this->userUpdate->execute($request, $id);
            return response()
            ->json(
                ['status' => true, 'user' => $user], 
                200
            );
        } catch (Exception $e) {
            return response()
            ->json(
                ['status' => false, 'message' => $e->getMessage()], 
                500
            );
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->userDestroy->execute($id);
            return response()
            ->json(
                ['status' => true], 
                200
            );
        } catch (Exception $e) {
            return response()
            ->json(
                ['status' => false, 'message' => $e->getMessage()], 
                500
            );
        }
    }
}
