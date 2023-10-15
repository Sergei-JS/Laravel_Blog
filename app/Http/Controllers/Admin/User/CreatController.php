<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;


class CreatController extends Controller
{
    public function __invoke()
    {
        $roles=User::getRoles();
        return view('admin.user.creat', compact('roles'));
    }
}
