@extends('layouts.admin')

@section('konten')
    <div class="row">
        <div class="col-md-6">
            <div class="row g-1">
                <div class="col-md-6">
                    <form action="">
                        @csrf
                        <input type="text" class="form-control" placeholder="Search ... " aria-describedby="button-addon2">
                    </form>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" type="button" id="button-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search me-1" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                        Cari
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="#" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-download me-1" viewBox="0 0 16 16">
                    <path
                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                    <path
                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                </svg>
                Unduh Data
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Data {{ $title }} </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection
