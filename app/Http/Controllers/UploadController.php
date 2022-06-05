<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    function crop(Request $request)
    {
        $path = 'images/';
        $file = $request->file('image');
        $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
        $upload = $file->move(public_path($path), $new_image_name);
        if ($upload) {
            $user = auth()->user();
            $userphoto = $user->image;
            if ($userphoto != '') {
                unlink($path.$userphoto);
            }
            $user->update([
                'image' => $new_image_name,

            ]);
            return response()->json(['status' => 1, 'msg' => 'Image has been cropped successfully.', 'name' => $new_image_name]);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong, try again later']);
        }
    }

    // function crop(Request $request){
    //     $path = 'images/';
    //     $file = $request->file('file');
    //     $new_image_name = 'UIMG'.date('Ymd').uniqid().'.jpg';
    //     $upload = $file->move(public_path($path), $new_image_name);
    //     if(!$upload){
    //         return response()->json(['status'=>1, 'msg'=>'Something went wrong, try again later']);
    //     }else{
    //         $UserInfo = User::where('id', '=', session('LoggedUser'))->first();
    //         $userPhoto = $UserInfo->image;
    //         // if ($userPhoto != '') {
    //         //     unlink($path.$userPhoto);
    //         // }
    //         User::where('id', session('LoggedUser'))->update(['image'=>$new_image_name]);
    //         return response()->json(['status'=>1, 'msg'=>'Your profile image has been updated successfuly',
    //         'name'=>$new_image_name]);
    // }
    //   }
}
