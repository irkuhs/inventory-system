@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Auth::user()->name }}{{ __('! You are at Type Inventori.') }}
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">Inventory Type {{ Auth::user()->name }}</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $inventoryTypes as $key => $type)
                            <tr>
                                <th scope="row">{{ $key+1}}</th>
                                <td>{{ $type->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>

                    <a href="{{route('type.create')}}" button type="button" class="btn btn-primary">Tambah lain</button></a>
                    <a href="{{route('home')}}" button type="button" class="btn btn-danger">Kembali</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
