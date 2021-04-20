@extends('layouts.app')

@section('content')
<div class="container">
   @can('cozinheiro-user')
   <div class="container">
      <div class="row mb-3">
          <div class="col-md-12">
              <h2>Pedidos feitos</h2>
          </div>
      </div>
  <div class="row">
      <div class="col-md-12">       
      @if($orders->count()>0)
        
      <manage-orders :orders="{{ json_encode($orders) }}"></manage-orders>
              {{$orders->render()}}
              @else
              <p>You don't have any orders yet.</p>
              @endif
          </div>
      </div>
  </div>
   @endcan
   @can('manage-users')
   <resto-group></resto-group>
   <menu-container :items="{{json_encode($menus)}}" :resto-id={{$restoId}}></menu-container>
   @endcan
</div>
@endsection
 