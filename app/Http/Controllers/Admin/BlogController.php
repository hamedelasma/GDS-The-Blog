<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required'],
            'img' => ['required'],
            'published_at' => ['required', 'date'],
        ]);

        auth('admin')->user()->blog()->create($inputs);

        return response()->json([
            'message' => 'Blog Created'
        ]);
    }

    public function index()
    {

        $blogs = auth('admin')->user()->blog()->get();
        return response()->json([
            'data' => $blogs
        ]);
    }
}
