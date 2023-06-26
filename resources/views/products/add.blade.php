@extends('layouts.admin')

@section('konten')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('manage-produk') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="img_path" class="form-label">Foto Produk</label>
                    <input type="file" class="form-control" name="img_path" id="img_path" placeholder=""
                        aria-describedby="fileHelpId">
                    <div id="fileHelpId" class="form-text">Masukkan Foto Produk</div>
                </div>
                <div class="mb-3">
                    <label for="product_name" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="product_name" id="product_name"
                        aria-describedby="helpId" placeholder="Nama Produk">
                    <small id="helpId" class="form-text text-muted">Masukkan Nama Produk</small>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select form-select-md" name="category_id" id="category_id">
                        <option selected>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date_modified" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="date_modified" id="date_modified"
                        aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Masukkan Tanggal</small>
                </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="amount" class="form-label">Jumlah</label>
                <input type="number" class="form-control" name="amount" id="amount" aria-describedby="helpId"
                    placeholder="0">
                <small id="helpId" class="form-text text-muted">Masukkan Jumlah</small>
            </div>
            <div class="mb-3">
                <label for="unit_id" class="form-label">Satuan</label>
                <select class="form-select form-select-md" name="unit_id" id="unit_id">
                    <option selected>Pilih Satuan</option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}"> {{ $unit->unit_name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="capital_price" class="form-label">Harga Modal</label>
                <input type="number" class="form-control" name="capital_price" id="capital_price" aria-describedby="helpId"
                    placeholder="0">
                <small id="helpId" class="form-text text-muted">Masukkan Harga Modal</small>
            </div>
            <div class="mb-3">
                <label for="selling_price" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" name="selling_price" id="selling_price" aria-describedby="helpId"
                    placeholder="0">
                <small id="helpId" class="form-text text-muted">Masukkan Harga Jual</small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-10 ms-auto me-2">Submit</button>
        </form>
    </div>
@endsection
