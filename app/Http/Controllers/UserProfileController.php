<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Services\UserProfileService;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __construct(UserProfileService $userProfileService)
    {
        $this->middleware('auth');
        $this->userProfileService = $userProfileService;
    }

    public function edit()
    {
        return view('user_profile.profile');
    }

    public function update(Request $request)
    {

        if ($this->userProfileService->update($request->all())) {
            return redirect()->back()->with('success', 'Update successfully');
        }

        return redirect()->back()->with('failed', 'Update failed');
    }
}
