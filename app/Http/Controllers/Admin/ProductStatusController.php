<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStatusRequest;
use App\Models\Product_status;
use App\Services\ProductStatusService;
use Illuminate\Http\Request;

class ProductStatusController extends Controller
{
    public function __construct(ProductStatusService $productStatusService)
    {
        $this->middleware('admin');
        $this->productStatusService = $productStatusService;
    }

    //index
    public function index(Request $request)
    {
        $this->viewData['product_statuses'] = $this->productStatusService->listProduct_status($request->search);
        return view('admin.product_status.index', $this->viewData);
    }

    //create
    public function create()
    {
        return view('admin.product_status.create');
    }

    //store
    public function store(ProductStatusRequest $request)
    {
        if ($this->productStatusService->create($request->all())) {
            return back()->with('success', 'Successfully added');
        }

        return redirect()->back()->with('failed', 'Add new failure');
    }

    public function show($id)
    {
        //
    }

    //edit
    public function edit(Product_status $product_status)
    {
        $this->viewData['product_status'] = $product_status;
        return view('admin.product_status.edit', $this->viewData);
    }

    //update
    public function update(ProductStatusRequest $request,Product_status $product_status)
    {
        if ($this->productStatusService->update($product_status, $request->all())) {

            return redirect()->back()->with('success', 'Update successfully');
        }

        return redirect()->back()->with('failed', 'Update failed');
    }

    //destroy
    public function destroy(Product_status $product_status)
    {
        if ($this->productStatusService->delete($product_status)) {

            return redirect()->back()->with('success', 'Delete Successfully');
        }

        return redirect()->back()->with('failed', 'Delete failed');
    }
}
