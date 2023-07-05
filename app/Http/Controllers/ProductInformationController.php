<?php

namespace App\Http\Controllers;

use App\DataTables\ProductInformationsDataTable;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ProductInformationController extends Controller
{
    function index(ProductInformationsDataTable $dataTable)
    {
        return $dataTable->render('product-informations.index', [
            'title' => 'Informasi Produk'
        ]);
    }

    function print()
    {
        $data = Product::with('Multiprice')->get();

        $pdf = Pdf::loadView('product-informations.print', [
            'title' => 'Data Informasi Produk',
            'data' => $data
        ]);

        return $pdf->stream('informasi-produk.pdf');
    }
}
