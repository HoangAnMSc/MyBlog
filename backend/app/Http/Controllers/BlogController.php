<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return Blog::latest()->get();
    }

    public function show($id) {
        return Blog::findOrFail($id);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'excerpt' => 'nullable',
            'content' => 'required',
        ]);

        return Blog::create($data + ['user_id'=>auth()->id()]);
    }

    public function update($id, Request $request) {
        $blog = Blog::findOrFail($id);
        $blog->update($request->all());
        return $blog;
    }

    public function delete($id) {
        Blog::findOrFail($id)->delete();
        return ['msg'=>'deleted'];
    }
}