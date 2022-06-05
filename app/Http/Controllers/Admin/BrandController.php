<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Services\BrandService;

class BrandController extends Controller
{
    public function __construct(BrandService $brandService)
    {
        $this->middleware('admin');
        $this->brandService = $brandService;
    }

    public function index(Request $request)
    {
        $this->viewData['brands'] = $this->brandService->listBrand($request->search);

        return view('admin.brands.index', $this->viewData);
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(BrandRequest $request)
    {
        if ($this->brandService->create($request->all())) {
            return back()->with('success', 'Successfully added');
        }

        return redirect()->back()->with('failed', 'Add new failure');
    }

    public function edit(Brand $brand)
    {
        $this->viewData['brands'] = $brand;

        return view('admin.brands.edit', $this->viewData);
    }

    public function update(BrandRequest $request,Brand $brand)
    {
        if ($this->brandService->update($brand, $request->all())) {

            return redirect()->back()->with('success', 'Update successfully');
        }

        return redirect()->back()->with('failed', 'Update failed');
    }

    public function destroy(Brand $brand)
    {
        if ($this->brandService->delete($brand)) {

            return redirect()->back()->with('success', 'Delete Successfully');
        }

        return redirect()->back()->with('failed', 'Delete failed');
    }
}
