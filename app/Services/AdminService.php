<?php

namespace App\Services;

use App\Enums\AdminStatus;
use App\Models\Admin;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class AdminService extends BaseService
{
    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    public function listAdmin($keyword)
    {
        return $this->model->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function update($admin, $request)
    {
        return $admin->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'status' => $request['status'],
            'password' => Hash::make($request['password']),
        ]);
    }

    public function create($Request)
    {
        $Request['password'] = Hash::make($Request['password']);

        return $this->model->create($Request);
    }

    public function delete($admin)
    {
        return $admin->delete($admin);
    }

    public function checkAccountAdmin($request)
    {
        $accountAdmin = $this->model->where('email', $request->email)->first();
        if (!$accountAdmin) {
            return false;
        }

        if ($accountAdmin->status != AdminStatus::ACTIVE){
            return false;
        }
        
        return true;
    }
    
    public function block($admin)
    {
        if ($admin['status'] == AdminStatus::ACTIVE)
        {
            return $admin->update(['status' => AdminStatus::BLOCK]);
        }
        elseif ($admin['status'] == AdminStatus::BLOCK) 
        {
            return $admin->update(['status' => AdminStatus::ACTIVE]);
        }
    }
}
