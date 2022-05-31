<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateSessionController extends Controller
{
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;        
    }

    public function create()
    {
        return view('admin.auth.login');
    }

    public function store(AdminLoginRequest $request)
    {
        
        if ($this->adminService->checkAccountAdmin($request)) 
        {
            $request->authenticate();
            $request->session()->regenerate();
    
            return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
        }

        return redirect()->back()->with('failed', 'Account password is not correct or Account not active');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
