<?php

namespace App\Http\Controllers;

use App\DataTables\ProductInformationsDataTable;
use Illuminate\Http\Request;

class ProductInformationController extends Controller
{
    function index(ProductInformationsDataTable $dataTable)
    {
        return $dataTable->render('product-information', [
            'title' => 'Informasi Produk'
        ]);
    }
}
