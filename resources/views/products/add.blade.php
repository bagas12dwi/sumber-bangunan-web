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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
