<?php

namespace App\Services;

use App\Models\Product_status;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class ProductStatusService extends BaseService
{
    public function __construct(Product_status $model)
    {
        $this->model = $model;
    }

    public function listProduct_status($keyword)
    {
        return $this->model->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function update($Product_status, $request)
    {
        return $Product_status->update($request);
    }

    public function create($Request)
    {
        return $this->model->create($Request);
    }

    public function delete($Product_status)
    {
        return $Product_status->delete($Product_status);
    }
}
