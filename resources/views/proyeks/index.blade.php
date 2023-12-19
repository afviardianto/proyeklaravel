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
                                    href="{{ route('proyeks.create') }}">Tambah Proyek</a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive table-invoice">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Proyek</th>
                                            <th>Keterangan Proyek</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        @foreach ($proyeks as $proyek)
                                            <tr>
                                                <td>{{ $proyek->id }}</td>
                                                <td>{{ $proyek->nama_proyek }}</td>
                                                <td>{{ $proyek->keterangan_proyek }}</td>
                                                <td> 
                                                <a href="{{ route('proyeks.edit',$proyek->id) }}" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('proyeks.destroy',$proyek->id) }}" method="post"
                                                        class="d-inline" onsubmit="return confirm('{{__('Are You Sure')}}?')">
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