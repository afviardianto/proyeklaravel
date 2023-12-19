@extends('layouts')

@section('content')
<div class="container-fluid">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                    <form method="post" class="needs-validation" action="{{ route('pekerjaans.update', $pekerjaan->id) }}">
                    @csrf
                    @method('put')
                        <div class="card-header">
                            <h6>Edit Pekerjaan</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="tipe_pekerjaan_id">Tipe Pekerjaan <strong>*</strong></label>
                                    <select name="tipe_pekerjaan_id" class="form-control">
                                        @foreach($tipe_pekerjaan as $tipepekerjaan)
                                        <option value="{{$tipepekerjaan->id}}" {{ $pekerjaan->tipe_pekerjaan_id == $tipepekerjaan->id ? 'selected' : '' }}>{{$tipepekerjaan->nama_tipe_pekerjaan}}</option>
                                        @endforeach
                                    </select>
                                    @error('tipe_pekerjaan_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="nama_pekerjaan">Nama Pekerjaan <strong>*</strong></label>
                                    <input type="text" name="nama_pekerjaan" id="nama_pekerjaan" class="form-control" value="{{old('nama_pekerjaan',$pekerjaan->nama_pekerjaan)}}">
                                    @error('nama_pekerjaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="keterangan_pekerjaan">Keterangan Pekerjaan <strong>*</strong></label>
                                    <input type="text" name="keterangan_pekerjaan" id="keterangan_pekerjaan" class="form-control" value="{{old('keterangan_pekerjaan',$pekerjaan->keterangan_pekerjaan)}}">
                                    @error('keterangan_pekerjaan')
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