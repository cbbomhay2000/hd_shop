<?php

namespace App\Services;

use App\Enums\UserStatus;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function listUser($keyword)
    {
        return $this->model->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function update($user, $request)
    {
        $request['password'] = Hash::make($request['password']);
        
        return $user->update($request);
    }

    public function create($request)
    {
        $request['password'] = Hash::make($request['password']);

        return $this->model->create($request);
    }

    public function delete($post)
    {
        return $post->delete($post);
    }

    public function checkAccountAdmin($request)
    {
        $accountUser = $this->model->where('email', $request->email)->first();
        if (!$accountUser) {
            return false;
        }
        if ($accountUser->status != UserStatus::ACTIVE){
            return false;
        }
        
        return true;
    }
}
