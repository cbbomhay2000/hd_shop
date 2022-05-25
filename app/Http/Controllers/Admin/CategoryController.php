<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('admin');
        $this->categoryService = $categoryService;
    }

    //index
    public function index(Request $request)
    {
        $this->viewData['categories'] = $this->categoryService->listCategory($request->search);
        return view('admin.categories.index', $this->viewData);
    }

    //create
    public function create()
    {
        return view('admin.categories.create');
    }

    //store
    public function store(CategoryRequest $request)
    {
        if ($this->categoryService->create($request->all())) {
            return back()->with('success', 'Successfully added');
        }

        return redirect()->back()->with('failed', 'Add new failure');
    }

    public function show($id)
    {
        //
    }

    //edit
    public function edit(Category $category)
    {
        $this->viewData['category'] = $category;
        return view('admin.categories.edit', $this->viewData);
    }

    //update
    public function update(CategoryRequest $request,Category $category)
    {
        if ($this->categoryService->update($category, $request->all())) {

            return redirect()->back()->with('success', 'Update successfully');
        }

        return redirect()->back()->with('failed', 'Update failed');
    }

    //destroy
    public function destroy(Category $category)
    {
        if ($this->categoryService->delete($category)) {

            return redirect()->back()->with('success', 'Delete Successfully');
        }

        return redirect()->back()->with('failed', 'Delete failed');
    }
}
