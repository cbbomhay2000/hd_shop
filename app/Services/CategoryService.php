<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Services\BaseService;

class CategoryService extends BaseService
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function listCategory($keyword)
    {
        return $this->model->where('name', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function update($category, $request)
    {
        return $category->update($request);
    }

    public function create($Request)
    {
        return $this->model->create($Request);
    }

    public function delete($category)
    {
        return $category->delete($category);
    }
}
