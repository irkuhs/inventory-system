@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Inventory</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('inventori.update',$inventory, $inventoryTypes) }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Inventory</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{ $inventory->name}}" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="besar, panjang dan lebar" name="description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1">Jenis Inventori</label>
                            <select class="form-control" name="inventory_type_id">
                                @foreach ( $inventoryTypes as $Type )
                                    <option value="{{ $Type->id }}">{{ $Type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Berjaya</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
