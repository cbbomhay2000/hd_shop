<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Shop_item;
use App\Services\BaseService;

class ViewUserService extends BaseService
{
    public function __construct(Shop_item $model)
    {
        $this->model = $model;
    }

    public function listShopItem()
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate(6);
    }
    
    public function recommendedItems()
    {
        return $this->model->orderBy('created_at', 'DESC')->paginate(3);
    }

    public function productItems($product)
    {
        $products = $product->id;
        return $this->model->where('shop_id', 1)->orderBy('price', 'ASC')->paginate(4);
    }

}
