<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->only(['title', 'content', 'status']);
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        return response()->json(['message' => 'Blog created successfully.']);
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return response()->json($blog);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|unique:blogs,title,' . $id,
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->only(['title', 'content', 'status']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return response()->json(['message' => 'Blog updated successfully.']);
    }

   
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->status = 'deleted';
        $blog->save();
        $blog->delete(); // this will soft delete
        return response()->json(['message' => 'Blog deleted successfully.']);
    }

    public function getBlogs()
    {
        $blogs = Blog::select('id', 'title', 'status')->get();
        return response()->json(['data' => $blogs]);
    }
}

