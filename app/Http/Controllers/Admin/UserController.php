<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->middleware('admin');
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $this->viewData['users'] = $this->userService->listUser($request->search);
        return view('admin.user_account.index', $this->viewData);
    }

    public function create()
    {
        return view('admin.user_account.create');
    }

    public function store(UserRequest $request)
    {
        if ($this->userService->create($request->all())) {
            return back()->with('success', 'Successfully added');
        }

        return redirect()->back()->with('failed', 'Add new failure');
      
    }

    public function edit(User $user_account)
    {
        $this->viewData['user'] = $user_account;

        return view('admin.user_account.edit', $this->viewData);
    }

    public function update(UserRequest $request, User $user_account)
    {
        if ($this->userService->update($user_account, $request->all())) {
            return redirect()->back()->with('success', 'Update successfully');
        }

        return redirect()->back()->with('failed', 'Update failed');
    }

    public function destroy(User $user_account)
    {
        if ($this->userService->delete($user_account)) {
            return redirect()->back()->with('success', 'Delete Successfully');
        }

        return redirect()->back()->with('failed', 'Delete failed');
    }

    public function block(Request $request, User $user_account)
    {
        if ($this->userService->block($user_account, $request->all())) {
            return redirect()->back()->with('success', 'Lock up Successfully');
        }

        return redirect()->back()->with('failed', 'Lock up failed');
    }

    public function show($user)
    {
        $users = User::find($user);
        
        return view('user_account.show')->with(compact('users'));
    }
}
