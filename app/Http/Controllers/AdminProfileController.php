<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAdminRequest;
use App\Services\AdminProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function __construct(AdminProfileService $adminProfileService)
    {
        $this->middleware('admin');
        $this->adminProfileService = $adminProfileService;
    }

    public function edit()
    {
        return view('admin.admin_profile.profile');
    }

    public function update(UpdateAdminRequest $request)
    {
        if ($this->adminProfileService->update($request->all())) {
            return redirect()->back()->with('success', 'Update successfully');
        }

        return redirect()->back()->with('failed', 'Update failed');
    }
}
