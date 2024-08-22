@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Tambah Customer Baru') }}
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Kembali</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('customers.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nama_customer">Nama Customer</label>
                            <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="Masukkan nama customer" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_paket">Nama Paket</label>
                            <select class="form-control" id="nama_paket" name="nama_paket" required>
                                <option value="">Pilih Jenis Paket</option>
                                @foreach ($paketLayanan as $paket)
                                <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="tgl_gabung">Tanggal Bergabung</label>
                            <input type="date" class="form-control" id="tgl_gabung" name="tgl_gabung" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection