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

                    {{ Auth::user()->name }}{{ __('! You are logged in.') }}
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-header">Inventory {{ Auth::user()->name }}</div>
                <form action="{{route('inventori.search')}}" method="GET">
                    <div class="input-group mt-2 p-2">
                        <input type="text" class="form-control" name="keyword" placeholder="Search by Inventory Name">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Search</button>
                            <a href="{{route('home')}}" button class="btn btn-primary" type="submit">Refresh</button></a>
                        </div>
                    </div>
                </form>

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
                                <td>
                                    <a href="{{route('inventori.edit', $inventory)}}" button type="button" class="btn btn-info">Edit</button></a>
                                    <a href="{{route('inventori.delete', $inventory)}}" button type="button" class="btn btn-warning">Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>

                      {{ $inventories->links()}}

                    <a href="{{route('inventori.create')}}" button type="button" class="btn btn-primary">Tambah lain</button></a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
