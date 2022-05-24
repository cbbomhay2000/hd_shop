<?php

namespace App\Services;

use App\Models\Brand;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class BrandService extends BaseService
{
    public function __construct(Brand $model)
    {
        $this->model = $model;
    }

    public function listBrand($keyword)
    {
        return $this->model->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function update($brand, $request)
    {
        return $brand->update($request);
    }

    public function create($Request)
    {
        return $this->model->create($Request);
    }

    public function delete($brand)
    {
        return $brand->delete($brand);
    }
}
