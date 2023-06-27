<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('categories.index', [
            'title' => 'Kategori'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.add', [
            'title' => 'Tambah Kategori'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateddata = $request->validate([
            'category_name' => 'required'
        ]);
        $validateddata['user_id'] = auth()->user()->id;

        Category::create($validateddata);
        return redirect()->intended('/manage-kategori')->with('success', 'Data Berhasil Ditambahkan ! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $manage_kategori)
    {
        // dd($manage_kategori);
        return view('categories.edit', [
            'title' => 'Edit Kategori',
            'category' => $manage_kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $manage_kategori)
    {
        $validatedData = $request->validate([
            'category_name' => 'required'
        ]);
        $validateddata['user_id'] = auth()->user()->id;


        Category::where('id', $manage_kategori->id)->update($validatedData);
        return redirect()->intended('/manage-kategori')->with('success', 'Data Berhasil Diubah ! ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $manage_kategori)
    {
        Category::destroy($manage_kategori->id);
        return redirect()->intended('/manage-kategori')->with('success', 'Data Berhasil Dihapus ! ');
    }
}
