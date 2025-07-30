<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog()
    {
        $blogs = Blog::orderBy('published_at', 'desc')->paginate(6);
        return view('blog', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blogshow', compact('blog'));
    }

    
public function index()
{
    $blogs = Blog::latest()->get();
    return view('adminpages.blog_index', compact('blogs'));
}

public function edit($id)
{
    $blog = Blog::findOrFail($id);
    return view('adminpages.blog_edit', compact('blog'));
}

public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'slug' => 'required|unique:blogs,slug,' . $blog->id,
        'category' => 'required',
        'short_description' => 'required',
        
        'author_name' => 'required',
    ]);

    $blog->fill($request->except('image'));

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/blogs'), $imageName);
        $blog->image = $imageName;
    }

    $blog->save();

    return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully!');
}

public function destroy($id)
{
    $blog = Blog::findOrFail($id);
    if (file_exists(public_path('uploads/blogs/' . $blog->image))) {
        unlink(public_path('uploads/blogs/' . $blog->image));
    }
    $blog->delete();
    return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully!');
}

// Show create blog form
public function create()
{
    return view('adminpages.blog_create');
}

// Handle blog submission
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'slug' => 'required|unique:blogs',
        'category' => 'required',
        'short_description' => 'required',
        'content' => 'required',
        'author_name' => 'required',
        'image' => 'required|image',
    ]);

    $blog = new Blog();
    $blog->fill($request->except('image'));

    // Image upload
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/blogs'), $imageName);
        $blog->image = $imageName;
    }

    $blog->published_at = $request->published_at;
    $blog->save();

    return redirect()->route('admin.blogs')->with('success', 'Blog created successfully!');
}


}
