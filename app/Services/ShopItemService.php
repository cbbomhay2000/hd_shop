<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Shop_item;
use App\Services\BaseService;

class ShopItemService extends BaseService
{
    public function __construct(Shop_item $model)
    {
        $this->model = $model;
    }

    public function listShopItem($keyword)
    {
        return $this->model->where('title', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function update($shop_item, $request)
    {
        $path = 'images/';
        $file = $request['image'];
        $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
        $upload = $file->move(public_path($path), $new_image_name);
        return $shop_item->update([
            'title' => $request['title'], 
            'des' => $request['des'], 
            'price' => $request['price'], 
            'quantity' => $request['quantity'], 
            'shop_id' => $request['shop_id'], 
            'image' => $new_image_name
        ]);
    }

    public function create($request)
    {
        $path = 'images/';
        $file = $request['image'];
        $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
        $upload = $file->move(public_path($path), $new_image_name);
        return $this->model->create([
            'title' => $request['title'], 
            'des' => $request['des'], 
            'price' => $request['price'], 
            'quantity' => $request['quantity'], 
            'shop_id' => $request['shop_id'], 
            'image' => $new_image_name
        ]);
    }

    public function delete($product)
    {
        $path = 'images/';
        $image = $product;
        $userPhoto = $image->image;
        if ($userPhoto != '') {
            unlink($path . $userPhoto);
        }
        return $product->delete($product);
    }
}
