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

        $validatedData['selling_price'] = $request->selling_price;
        $validatedData['capital_price'] = $request->capital_price;
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
    public function edit(MultiPrice $multiPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMultiPriceRequest $request, MultiPrice $multiPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MultiPrice $multiPrice)
    {
        //
    }
}
