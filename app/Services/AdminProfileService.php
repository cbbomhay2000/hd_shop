<?php

namespace App\Services;

use App\Models\Admin;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileService extends BaseService
{
    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    public function update($request)
    {
        $admin = Auth::guard('admin')->user();
        return $admin->update($request);
    }
}
