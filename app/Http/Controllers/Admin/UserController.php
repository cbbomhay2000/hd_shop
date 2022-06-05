<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Admin;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->middleware('admin');
        $this->userService = $userService;
    }

    public function index(Request $request)
    { 
        $this->viewData['adminAccount'] = Auth::guard('admin')->user();
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

    public function show($user)
    {
        $user = User::find($user);

        return view('admin.user_account.show')->with(compact('user'));
    }

    public function update(Request $request, User $user_account)
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

        return redirect()->back()->with('failed', 'Lock  up failed');
    }

    function image(Request $request,User $user_account)
    {
        $path = 'images/';
        $file = $request->file('images');
        $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
        $upload = $file->move(public_path($path), $new_image_name);
        if ($upload) {
            $userphoto = $user_account->image;
            if ($userphoto != '') {
                unlink($path.$userphoto);
            }
            $user_account->update(['image' => $new_image_name]);
            return response()->json(['status' => 1, 'msg' => 'Image has been cropped successfully.', 'name' => $new_image_name]);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong, try again later']);
        }
    }
}
