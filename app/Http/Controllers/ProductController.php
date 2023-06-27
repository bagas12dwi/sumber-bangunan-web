<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\MultiPrice;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductsDataTable $productsDataTable)
    {
        return $productsDataTable->render('products.index', [
            'title' => 'Produk'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('products.add', [
            'title' => 'Tambah Produk',
            'categories' => $categories,
            'units' => $units
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'img_path' => 'required | image',
            'product_name' => 'required',
            'category_id' => 'required'
        ]);

        $validatedData['img_path'] = $request->file('img_path')->store('produk');
        $validatedData['user_id'] = auth()->user()->id;

        Product::create($validatedData);

        $product = Product::where('product_name', '=', $validatedData['product_name'])->firstOrFail();

        $multiPrice = new MultiPrice();
        $multiPrice->product_id = $product->id;
        $multiPrice->amount = $request->amount;
        $multiPrice->unit_id = $request->unit_id;
        $multiPrice->selling_price = $request->selling_price;
        $multiPrice->capital_price = $request->capital_price;
        $multiPrice->date_modified = $request->date_modified;
        $multiPrice->user_id = auth()->user()->id;
        $multiPrice->save();

        return redirect()->intended('manage-produk')->with('success', 'Data Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $manage_produk)
    {
        $categories = Category::all();
        return view('products.edit', [
            'title' => 'Edit Produk',
            'product' => $manage_produk,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $manage_produk)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'category_id' => 'required',
            'img_path' => 'image'
        ]);

        if ($request->file('img_path')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }
            $validatedData['img_path'] = $request->file('img_path')->store('produk');
        }
        Product::where('id', $manage_produk->id)->update($validatedData);
        return redirect()->intended('manage-produk')->with('success', 'Data Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $manage_produk)
    {
        Product::destroy($manage_produk->id);
        return redirect()->intended('manage-produk')->with('success', 'Data Berhasil Dihapus !');
    }
}
