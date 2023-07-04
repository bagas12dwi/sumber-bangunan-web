<?php

namespace App\Http\Controllers;

use App\DataTables\HomepageDataTable;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(HomepageDataTable $homepageDataTable)
    {
        return $homepageDataTable->render('homepage.index', [
            'title' => 'Daftar Harga Produk'
        ]);
    }
}
