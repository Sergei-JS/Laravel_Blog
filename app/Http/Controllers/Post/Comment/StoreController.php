<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {



        return redirect()->route('personal.comment.index');
    }
}
