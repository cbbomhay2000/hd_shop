<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Services\AdminService;

class AdminController extends Controller
{
    public function __construct(AdminService $adminService)
    {
        $this->middleware('admin');
        $this->adminService = $adminService;
    }

    public function index(Request $request)
    {
        $this->viewData['admins'] = $this->adminService->listAdmin($request->search);

        return view('admin.admin_account.index', $this->viewData);
    }
    
    public function create()
    {
        return view('admin.admin_account.create');
    }

    public function store(AdminRequest $request)
    {
        if ($this->adminService->create($request->all())) {
            return back()->with('success', 'Successfully added');
        }

        return redirect()->back()->with('failed', 'Add new failure');
      
    }

    public function edit(Admin $admin_account)
    {
        // $this->viewData['admins'] = Admin::orderBy('created_at', 'DESC')->get();
        $this->viewData['admin'] = $admin_account;

        return view('admin.admin_account.edit', $this->viewData);
    }

    public function update(AdminRequest $request, Admin $admin_account)
    {
        if ($this->adminService->update($admin_account, $request->all())) {
            return redirect()->back()->with('success', 'Update successfully');
        }

        return redirect()->back()->with('failed', 'Update failed');
    }

    public function destroy(Admin $admin_account)
    {
        if ($this->adminService->delete($admin_account)) {
            return redirect()->back()->with('success', 'Delete Successfully');
        }

        return redirect()->back()->with('failed', 'Delete failed');
    }

    public function block(Request $request, Admin $admin_account)
    {
        if ($this->adminService->block($admin_account, $request->all())) {
            return redirect()->back()->with('success', 'Lock up Successfully');
        }

        return redirect()->back()->with('failed', 'Lock up failed');
    }
}
