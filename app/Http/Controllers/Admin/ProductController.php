<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_status;
use App\Services\ProductService;
class ProductController extends Controller
{
    public function __construct(ProductService $productService)
    {
        $this->middleware('admin');
        $this->productService = $productService;
    }
    
    public function index(Request $request)
    {
        $this->viewData['products'] = $this->productService->listProduct($request->search);

        return view('admin.products.index', $this->viewData);
    }

    public function create()
    {
        $this->viewData['brands'] = Brand::orderBy('created_at', 'DESC')->get();
        $this->viewData['categories'] = Category::orderBy('created_at', 'DESC')->get();
        $this->viewData['product_statuses'] = Product_status::orderBy('created_at', 'DESC')->get();

        return view('admin.products.create', $this->viewData);
    }

    public function store(ProductRequest $request)
    {
        if ($this->productService->create($request->all())) {
            return back()->with('success', 'Successfully added');
        }

        return redirect()->back()->with('failed', 'Add new failure');
      
    }

    public function edit(Product $product)
    {
        $this->viewData['brands'] = Brand::orderBy('created_at', 'DESC')->get();
        $this->viewData['categories'] = Category::orderBy('created_at', 'DESC')->get();
        $this->viewData['product_statuses'] = Product_status::orderBy('created_at', 'DESC')->get();
        $this->viewData['product'] = $product;

        return view('admin.products.edit', $this->viewData);
    }

    public function update(Request $request, Product $product)
    {
        if ($this->productService->update($product, $request->all())) {
            return back()->with('success', 'Successfully update');
        }

        return redirect()->back()->with('failed', 'Update failure');
    }

    public function destroy(Product $product)
    {
        if ($this->productService->delete($product)) {

            return redirect()->back()->with('success', 'Delete Successfully');
        }

        return redirect()->back()->with('failed', 'Delete failed');
    }
}
