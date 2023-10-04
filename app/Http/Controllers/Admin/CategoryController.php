<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Dashboard | Category';
        $category = Kategori::latest()->paginate(10);

        return view('admin.category.index', compact('category', 'title'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create | Category';
        return view('admin.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nm_kategori' => ['required', 'max:255'],
            'deskripsi' => ['required', 'max:225'],
        ];

        $validatedData = $request->validate($rules);

        Kategori::create($validatedData);

        return redirect('/dashboard/category')->with('success', 'New Cateory has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $category)
    {
        $title = 'Edit | Category';
        return view('admin.category.edit', compact('category', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $category)
    {
        $rules = [
            'nm_kategori' => ['required', 'max:255'],
            'deskripsi' => ['required', 'max:255'],
        ];

        $validatedData = $request->validate($rules);

        Kategori::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/category')->with('success', 'New Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $category)
    {
        Kategori::destroy($category->id);

        return redirect('/dashboard/category')->with('success', 'Category has been deleted');
    }
}
