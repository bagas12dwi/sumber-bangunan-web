@extends('layouts.admin')

@section('konten')
    <div class="row g-0">
        <div class="col-md-6">
            <form action="{{ url('manage-kategori') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="category_name" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" name="category_name" id="category_name"
                        aria-describedby="helpId" placeholder="Nama Kategori">
                    <small id="helpId" class="form-text text-muted">Masukkan Nama Kategori</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
