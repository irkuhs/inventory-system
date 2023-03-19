@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Inventory</div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('inventori.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Inventory</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="kerusi urut" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="besar, panjang dan lebar" name="description"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Berjaya</button></a>
                        <a href="{{route('home')}}" button type="button" class="btn btn-danger">Kembali</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
