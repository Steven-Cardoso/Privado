@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            {{-- <p>{{$resto}}</p> --}}
            <h2>Home delivery order for</h2>
            <hr>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
    <order-group></order-group>
        </div>
    </div>
</div>
@endsection
 