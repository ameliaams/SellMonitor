@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Profil') }}
                    <a href="{{ route('profiles.edit', $sales->id) }}" class="btn btn-primary">Edit</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p><strong>Username :</strong> {{ $sales->username }}</p>
                    <p><strong>Nama :</strong> {{ $sales->nama_sales }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection