@extends('layouts.app')

@section('content')
<div class="container">
   <add-menu-item :items="{{json_encode($menus)}}" :resto-id={{$restoId}}></add-menu-item>
</div>
@endsection
 