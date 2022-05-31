<?php

namespace App\Services;

use App\Models\Product;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class ProductService extends BaseService
{
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function listProduct($keyword)
    {
        return $this->model->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function update($product, $request)
    {
        $request['image'] = $this->createImage($request['image']);

        return $product->update($request);
    }

    public function create($request)
    {
        $request['image'] = $this->createImage($request['image']);

        return $this->model->create($request);
    }

    public function delete($product)
    {
        return $product->delete($product);
    }
}
