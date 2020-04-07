@extends('layouts.app')

@section('content')
<div class="container">
   <resto-group :restos="{{json_encode($restos)}}"></resto-group>
   <menu-container :items="{{json_encode($menus)}}" :resto-id={{$restoId}}></menu-container>
</div>
@endsection
 