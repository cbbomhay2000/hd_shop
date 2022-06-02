<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class UserProfileService extends BaseService
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function update($request)
    {
        $user = auth()->user();
        return $user->update($request);
    }
}
