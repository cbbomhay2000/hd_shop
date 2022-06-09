<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Shop_item;
use App\Services\ShopItemService;

class ShopItemController extends Controller
{
    public function __construct(ShopItemService $shopItemService)
    {
        $this->middleware('admin');
        $this->shopItemService = $shopItemService;
    }
    
    public function index(Request $request)
    {
        $this->viewData['shop_items'] = $this->shopItemService->listShopItem($request->search);
        $this->viewData['products'] = Product::orderBy('created_at', 'DESC')->get();

        return view('admin.shop_item.index', $this->viewData);
    }

    public function create()
    {
        $this->viewData['products'] = Product::orderBy('created_at', 'DESC')->get();

        return view('admin.shop_item.create', $this->viewData);
    }

    public function store(Request $request,Shop_item $model)
    {
        if ($this->shopItemService->create($request->all())) {
            return back()->with('success', 'Successfully added');
        }

        return redirect()->back()->with('failed', 'Add new failure');
    }

    public function edit(Shop_item $shop_item)
    {
        $this->viewData['products'] = Product::orderBy('created_at', 'DESC')->get();
        $this->viewData['shop_item'] = $shop_item;

        return view('admin.shop_item.edit', $this->viewData);
    }

    public function update(Request $request, Shop_item $shop_item)
    {
        if ($this->shopItemService->update($shop_item, $request->all())) {
            return back()->with('success', 'Successfully update');
        }

        return redirect()->back()->with('failed', 'Update failure');
    }

    public function destroy(Shop_item $shop_item)
    {
        if ($this->shopItemService->delete($shop_item)) {

            return redirect()->back()->with('success', 'Delete Successfully');
        }

        return redirect()->back()->with('failed', 'Delete failed');
    }
}
