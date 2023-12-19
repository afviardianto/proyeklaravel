@extends('layouts')

@section('content')

<div class="container-fluid">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                    <form method="post" class="needs-validation" action="{{ route('kliens.update', $klien->id) }}">
                    @csrf
                    @method('put')
                        <div class="card-header">
                            <h6>Edit Klien</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="nama">Nama <strong>*</strong></label>
                                    <input type="text" name="nama" id="nama" class="form-control" 
                                        value="{{old('nama',$klien->nama)}}" >
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="email">Email <strong>*</strong></label>
                                    <input type="email" name="email" id="email" class="form-control" 
                                        value="{{old('email',$klien->email)}}">
                                    @error('email')
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