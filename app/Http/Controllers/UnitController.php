<?php

namespace App\Http\Controllers;

use App\DataTables\UnitsDataTable;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UnitsDataTable $unitsDataTable)
    {
        return $unitsDataTable->render('units.index', [
            'title' => 'Satuan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('units.add', [
            'title' => 'Tambahkan Satuan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'unit_name' => 'required'
        ]);

        $validateddata['user_id'] = auth()->user()->id;
        Unit::create($validatedData);

        return redirect()->intended('/manage-satuan')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $manage_satuan)
    {
        return view('units.edit', [
            'title' => 'Edit Satuan',
            'unit' => $manage_satuan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $manage_satuan)
    {
        $validatedData = $request->validate([
            'unit_name' => 'required'
        ]);
        $validateddata['user_id'] = auth()->user()->id;


        Unit::where('id', $manage_satuan->id)->update($validatedData);
        return redirect()->intended('/manage-satuan')->with('success', 'Data Berhasil Diubah ! ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $manage_satuan)
    {
        Unit::destroy($manage_satuan->id);
        return redirect()->intended('/manage-satuan')->with('success', 'Data Berhasil Dihapus ! ');
    }
}
