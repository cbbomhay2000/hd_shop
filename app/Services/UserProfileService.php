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

    // public function listBrand($keyword)
    // {
    //     return $this->model->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'DESC')->paginate(10);
    // }

    // public function create($Request)
    // {
    //     return $this->model->create($Request);
    // }

    // public function delete($brand)
    // {
    //     return $brand->delete($brand);
    // }
}
