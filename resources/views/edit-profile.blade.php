@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Edit Data Sales') }}
                    <a href="{{ route('profiles') }}" class="btn btn-secondary">Kembali</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('profiles.update', $sales->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $sales->username) }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_sales">Nama Sales</label>
                            <input type="text" class="form-control" id="nama_sales" name="nama_sales" value="{{ old('nama_sales', $sales->nama_sales) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection