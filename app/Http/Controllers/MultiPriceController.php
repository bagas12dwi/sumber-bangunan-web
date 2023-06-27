<?php

namespace App\Http\Controllers;

use App\DataTables\MultiPricesDataTable;
use App\Http\Requests\StoreMultiPriceRequest;
use App\Http\Requests\UpdateMultiPriceRequest;
use App\Models\MultiPrice;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

use function Termwind\render;

class MultiPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MultiPricesDataTable $multiPricesDataTable)
    {
        return $multiPricesDataTable->render('multiprices.index', [
            'title' => 'Multi Harga'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $units = Unit::all();

        return view('multiprices.add', [
            'title' => 'Tambah Multi Harga',
            'products' => $products,
            'units' => $units
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'amount' => 'required',
            'unit_id' => 'required',
            'date_modified' => 'required'
        ]);

        if ($request->selling_price != null) {
            $validatedData['selling_price'] = substr($request->selling_price, 0, strpos($request->selling_price, ","));
        }

        if ($request->capital_price != null) {
            $validatedData['capital_price'] = substr($request->capital_price, 0, strpos($request->capital_price, ","));
        }

        $validatedData['user_id'] = auth()->user()->id;

        MultiPrice::create($validatedData);
        return redirect()->intended('manage-multiharga')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MultiPrice $multiPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MultiPrice $manage_multiharga)
    {
        $products = Product::all();
        $units = Unit::all();

        return view('multiprices.edit', [
            'title' => 'Edit Multi Harga',
            'products' => $products,
            'units' => $units,
            'multiprice' => $manage_multiharga
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MultiPrice $manage_multiharga)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'amount' => 'required',
            'unit_id' => 'required',
            'date_modified' => 'required'
        ]);

        if ($request->selling_price != null) {
            $validatedData['selling_price'] = substr($request->selling_price, 0, strpos($request->selling_price, ","));
        }

        if ($request->capital_price != null) {
            $validatedData['capital_price'] = substr($request->capital_price, 0, strpos($request->capital_price, ","));
        }

        $validatedData['user_id'] = auth()->user()->id;

        MultiPrice::where('id', $manage_multiharga->id)->update($validatedData);
        return redirect()->intended('manage-multiharga')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MultiPrice $manage_multiharga)
    {
        MultiPrice::destroy($manage_multiharga->id);
        return redirect()->intended('manage-multiharga')->with('success', 'Data Berhasil Dihapus!');
    }
}
