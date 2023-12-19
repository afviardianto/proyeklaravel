@extends('layouts')

@section('content')
<nav class="navbar navbar-expand-sm bg-light">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" href="/kliens">Klien</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/tipepekerjaans">Tipe Pekerjaan</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/pekerjaans">Pekerjaan</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/proyeks">proyek</a>
        </li>
    </ul>
    </nav>
<div class="row justify-content-center mt-5">
    <br/>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        Kamu sudah masuk!
                    </div>       
                @endif                
            </div>
        </div>
    </div>    
</div>
    
@endsection