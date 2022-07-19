@extends('layouts.app')

@section('content')

<div class="container">
<add-menu-stock :items="{{json_encode($menus)}}" :resto-id={{$restoId}}></add-menu-stock>
</div>
@endsection