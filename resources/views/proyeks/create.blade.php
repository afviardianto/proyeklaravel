@extends('layouts')

@section('content')

<div class="container-fluid">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                    <form method="post" class="needs-validation" enctype="multipart/form-data" 
                        action="{{ route('proyeks.store') }}">
                    @csrf
                        <div class="card-header">
                            <h6>Tambah Proyek</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nama_proyek">Nama Proyek <strong>*</strong></label>
                                    <input type="text" name="nama_proyek" id="nama_proyek" class="form-control" value="{{old('nama_proyek')}}">
                                    @error('nama_proyek')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="keterangan_proyek">Keterangan Proyek <strong>*</strong></label>
                                    <input type="text" name="keterangan_proyek" id="keterangan_proyek" class="form-control" value="{{old('keterangan_proyek')}}">
                                    @error('keterangan_proyek')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection