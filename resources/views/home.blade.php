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

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">Inventory</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $inventories as $key => $inventory)
                            <tr>
                                <th scope="row">{{ $key+1}}</th>
                                <td>{{ $inventory->name}}</td>
                                <td>{{ $inventory->description}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>

                    <a href="{{route('inventori.create')}}" button type="button" class="btn btn-primary">Tambah lain</button></a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
