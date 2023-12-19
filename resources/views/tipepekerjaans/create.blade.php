@extends('layouts')

@section('content')


<div class="container-fluid">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                    <form method="post" class="needs-validation" enctype="multipart/form-data" action="{{ route('tipepekerjaans.store') }}">
                    @csrf
                        <div class="card-header">
                            <h6>Tambah Tipe Pekerjaan</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nama_tipe_pekerjaan">Nama Tipe Pekerjaan <strong>*</strong></label>
                                    <input type="text" name="nama_tipe_pekerjaan" id="nama_tipe_pekerjaan" class="form-control" value="{{old('nama_tipe_pekerjaan')}}">
                                    @error('nama_tipe_pekerjaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="keterangan_tipe_pekerjaan">Keterangan Tipe Pekerjaan <strong>*</strong></label>
                                    <input type="text" name="keterangan_tipe_pekerjaan" id="keterangan_tipe_pekerjaan" class="form-control" value="{{old('keterangan_tipe_pekerjaan')}}">
                                    @error('keterangan_tipe_pekerjaan')
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