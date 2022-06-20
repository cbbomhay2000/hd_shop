<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ViewUserService;
use Illuminate\Http\Request;

class ViewUserController extends Controller
{
    public function __construct(ViewUserService $viewUserService)
    {
        $this->viewUserService = $viewUserService;
    }

    public function welcome(Product $product)
    {
        $this->viewData['shop_items'] = $this->viewUserService->listShopItem();
        $this->viewData['shop_items1'] = $this->viewUserService->recommendedItems();
        $this->viewData['shop_items2'] = $this->viewUserService->productItems($product);
        $this->viewData['products'] = Product::orderBy('created_at', 'DESC')->get();

        return view('welcome', $this->viewData);
    }
}
