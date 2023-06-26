@extends('layouts.admin')

@section('konten')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('manage-multiharga') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="product_id" class="form-label">Nama Produk</label>
                    <select class="form-select form-select-md" name="product_id" id="product_id">
                        <option selected>Pilih Produk</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </div>
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
                    <input type="number" class="form-control" name="capital_price" id="capital_price"
                        aria-describedby="helpId" placeholder="0">
                    <small id="helpId" class="form-text text-muted">Masukkan Harga Modal</small>
                </div>
                <div class="mb-3">
                    <label for="selling_price" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control" name="selling_price" id="selling_price"
                        aria-describedby="helpId" placeholder="0">
                    <small id="helpId" class="form-text text-muted">Masukkan Harga Jual</small>
                </div>
                <div class="mb-3">
                    <label for="date_modified" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="date_modified" id="date_modified"
                        aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Masukkan Tanggal</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
