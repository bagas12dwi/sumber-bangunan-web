@extends('layouts.admin')

@section('konten')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('manage-satuan/' . $unit->id) }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="unit_name" class="form-label">Nama Satuan</label>
                    <input type="text" class="form-control" name="unit_name" id="unit_name" aria-describedby="helpId"
                        value="{{ $unit->unit_name }}" placeholder="Nama Satuan (Kg, g, bks)">
                    <small id="helpId" class="form-text text-muted">Masukkan Nama Satuan</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
