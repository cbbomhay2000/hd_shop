<?php

namespace App\Services;

abstract class BaseService
{
    public function createImage($img)
    {
        $imgSetName = time() . '_' . $img->getClientOriginalName();
        $img->move(public_path('images'), $imgSetName);

        return $imgSetName;
    }
}
