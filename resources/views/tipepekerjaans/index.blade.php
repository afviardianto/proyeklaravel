@extends('layouts')

@section('content')
<div class="container-fluid">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="px-2 py-2 text-sm bg-blue-600 rounded"
                                    href="{{ route('tipepekerjaans.create') }}">{{ __('Tambah Tipe Pekerjaans') }}</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Tipe Pekerjaan</th>
                                            <th>Keterangan Tipe Pekerjaan</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        @foreach ($tipepekerjaans as $tipepekerjaan)
                                            <tr>
                                                <td>{{ $tipepekerjaan->id }}</td>
                                                <td>{{ $tipepekerjaan->nama_tipe_pekerjaan }}</td>
                                                <td>{{ $tipepekerjaan->keterangan_tipe_pekerjaan }}</td>
                                                <td> 
                                                    <a href="{{ route('tipepekerjaans.edit',$tipepekerjaan->id) }}" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('tipepekerjaans.destroy',$tipepekerjaan->id) }}" method="post"
                                                        class="d-inline" onsubmit="return confirm('{{__('Anda Yakin Akan Menghapus')}}?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection