@extends('layouts.admin')

@section('konten')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('manage-multiharga/' . $multiprice->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="product_id" class="form-label">Nama Produk</label>
                    <select class="form-select form-select-md" name="product_id" id="product_id">
                        <option selected>Pilih Produk</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"
                                {{ $multiprice->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->product_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="amount" id="amount" aria-describedby="helpId"
                        placeholder="0" value="{{ $multiprice->amount }}">
                    <small id="helpId" class="form-text text-muted">Masukkan Jumlah</small>
                </div>
                <div class="mb-3">
                    <label for="unit_id" class="form-label">Satuan</label>
                    <select class="form-select form-select-md" name="unit_id" id="unit_id">
                        <option selected>Pilih Satuan</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}" {{ $multiprice->unit_id == $unit->id ? 'selected' : '' }}>
                                {{ $unit->unit_name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="capital_price" class="form-label">Harga Modal</label>
                    <input type="text" class="form-control rupiah-input" name="capital_price" id="capital_price"
                        aria-describedby="helpId" placeholder="0" value="{{ $multiprice->capital_price }}">
                    <small id="helpId" class="form-text text-muted">Masukkan Harga Modal</small>
                </div>
                <div class="mb-3">
                    <label for="selling_price" class="form-label">Harga Jual</label>
                    <input type="text" class="form-control rupiah-input" name="selling_price" id="selling_price"
                        aria-describedby="helpId" placeholder="0" value="{{ $multiprice->selling_price }}">
                    <small id="helpId" class="form-text text-muted">Masukkan Harga Jual</small>
                </div>
                <div class="mb-3">
                    <label for="date_modified" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" name="date_modified" id="date_modified"
                        aria-describedby="helpId" placeholder="" value="{{ $multiprice->date_modified }}">
                    <small id="helpId" class="form-text text-muted">Masukkan Tanggal</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            // Initialize inputmask on the input field
            $('#capital_price').inputmask({
                alias: 'numeric',
                radixPoint: ',',
                groupSeparator: '.',
                autoGroup: true,
                digits: 2,
                digitsOptional: false,
                prefix: 'Rp ',
                placeholder: '0',
                removeMaskOnSubmit: true
            });
            $('#selling_price').inputmask({
                alias: 'numeric',
                radixPoint: ',',
                groupSeparator: '.',
                autoGroup: true,
                digits: 2,
                digitsOptional: false,
                prefix: 'Rp ',
                placeholder: '0',
                removeMaskOnSubmit: true
            });
        });
    </script>
@endpush
