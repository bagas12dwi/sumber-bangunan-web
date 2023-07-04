@extends('layouts.user')

@section('konten')
    <div class="container-fluid p-4" style="background-color: #1363DF; height: 20%;">
        <h5 class="fw-bold text-light">Daftar Harga Produk</h5>
    </div>
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-body">
                {{ $dataTable->table(['class' => 'table table-striped']) }}
            </div>
        </div>
    </div>
@endsection

@push('script')
    {{ $dataTable->scripts() }}
@endpush
