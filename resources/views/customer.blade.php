@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Data Customer') }}
                    <a href="{{ route('customer.create') }}" class="btn btn-primary">Tambah Customer</a>
                </div>


                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tanggal Bergabung</th>
                                <th scope="col">Jenis Paket</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $cust)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $customer->nama_customer }}</td>
                                <td>{{ $customer->tgl_gabung }}</td>
                                <td>{{ $customer->nama_paket }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection