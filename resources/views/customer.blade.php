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
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $cust)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $cust->nama_customer }}</td>
                                <td>{{ $cust->tgl_gabung }}</td>
                                <td>{{ $cust->paketLayanan->nama_paket }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('customer.edit', $cust->id) }}" class="btn btn-warning me-2">Edit</a>

                                        <form action="{{ route('customer.destroy', $cust->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>


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