<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:categories|max:255',
            'description' => 'required|max:255',
            'image' => 'required',
            'status' => 'required',
        ],[
            'title.require' => 'Yêu cầu nhập tiêu đề',
            'title.unique' => 'Tiêu đề đã có vui lòng không nhập trùng',
            'description.require' => 'Yêu cầu nhập mô tả',
            'image.require' => 'Yêu cầu nhập ảnh',
            'status.require' => 'Yêu cầu check status',
        ]);
        $data = $request->except('image');
        $data['status'] = isset($data['status']) ? 1 : 0;
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('categories', $request->file('image'));
        } else {
            $data['image'] = '';
        }
        Category::query()->create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
