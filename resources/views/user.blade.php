@extends('layouts.user')

@section('content')
<div class="container-fluid">
  <h3 class="text-black-50">Nogometna škola Talent Cazin!</h3>  
  <div class="row">
    @foreach($grupe as $item)
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h5>Generacija <b>{{$item->year}}</b></h5>Broj talenata: <p>{{$item->total}}</p>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
          <a href="/user/generation/{{$item->year}}" class="small-box-footer">Vidi više</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection