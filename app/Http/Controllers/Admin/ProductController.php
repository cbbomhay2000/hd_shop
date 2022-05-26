<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product_status;
use App\Services\ProductService;
use Illuminate\Http\Request;

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

    //create
    public function create()
    {
        $this->viewData['brands'] = Brand::orderBy('created_at', 'DESC')->get();
        $this->viewData1['categories'] = Category::orderBy('created_at', 'DESC')->get();
        $this->viewData2['product_statuses'] = Product_status::orderBy('created_at', 'DESC')->get();

        return view('admin.products.create')->with($this->viewData)->with($this->viewData1)->with($this->viewData2);
    }

    // store
    public function store(ProductRequest $request)
    {
        if ($this->productService->create($request->all())) {
            return back()->with('success', 'Successfully added');
        }

        return redirect()->back()->with('failed', 'Add new failure');
      
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
