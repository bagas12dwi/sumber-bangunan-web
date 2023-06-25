@extends('layouts.admin')

@section('konten')
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('/manage-user') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                        placeholder="Nama Lengkap">
                    <small id="helpId" class="form-text text-muted">Masukkan Nama Lengkap</small>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId"
                        placeholder="Username">
                    <small id="helpId" class="form-text text-muted">Masukkan Username</small>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="*******">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
