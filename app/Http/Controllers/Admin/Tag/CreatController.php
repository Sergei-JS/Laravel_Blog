<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;

class CreatController extends Controller
{
    public function __invoke()
    {
        return view('admin.tag.creat');
    }
}
