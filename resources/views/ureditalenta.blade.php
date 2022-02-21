@extends('layouts.app')

@section('third_party_stylesheets')
    
<link rel="stylesheet" href="{{ asset('../vendor/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{ asset('../vendor/plugins/jquery-ui/jquery-ui.css')}}">

<link rel="stylesheet" href="{{ asset('../vendor/dist/css/adminlte.min.css') }}">

@endsection

@section('content')

<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Uredi talenta</h3>
    </div>

      <div class="container-fluid">
        <form method="post" action="/admin/talenti/update/{{ $talent->id}}">
         <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="card-body">
            <div class="col-md-12">
             <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Lične informacije talenta</h3>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="prezime">Prezime*</label>
                    <input type="text" class="form-control" id="prezime" name="prezime"  value="{{ $talent->prezime }}">
                  </div>
                  <div class="form-group">
                    <label for="ime">Ime*</label>
                    <input type="text" class="form-control" id="ime" name="ime" value="{{ $talent->ime }}">
                  </div>
                  <div class="form-group">
                  <label>Datum rodjenja:*</label>
                    <div class="input-group date" id="datepickerdiv" data-target-input="nearest">
                        <input type="text" class="form-control" id="datum_rodjenja" name="datum_rodjenja" data-target="#reservationdate" value="{{ $talent->datum_rodjenja }}"/>
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                  </div>
                  <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" style="width: 100%;" id="status" name="status">
                    @if($talent->status == "Aktivan")
                    <option selected="selected">Aktivan</option>
                    <option>Deaktiviran</option>
                    <option>Izbrisan</option>
                    @elseif(($talent->status == "Deaktiviran"))
                    <option>Aktivan</option>
                    <option selected="selected">Deaktiviran</option>
                    <option>Izbrisan</option>
                    @else
                    <option>Aktivan</option>
                    <option>Deaktiviran</option>
                    <option selected="selected">Izbrisan</option>
                    @endif
                  </select>
                </div>
                <div class="form-group">
                    <label>Start treniranja</label>
                    <div class="input-group date" id="datepickerdiv" data-target-input="nearest">
                        <input type="text" class="form-control" id="start_treniranja" name="start_treniranja" data-target="#reservationdate" value="{{ $talent->start_treniranja }}"/>
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                  </div>
                  
                  </div>              
            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
             <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Informacije o roditelju/staratelju</h3>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="ime_roditelja">Ime roditelja/staratelja*</label>
                    <input type="text" class="form-control" id="ime_roditelja" name="ime_roditelja" value="{{ $talent->ime_roditelja }}">
                  </div>
                  <div class="form-group">
                    <label for="telefon">Telefon</label>
                    <input type="text" class="form-control" id="telefon" name="telefon" value="{{ $talent->telefon }}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $talent->email }}">
                  </div>

                  </div>   

            </div>
            <small>Polja označena sa * je obavezno popuniti!</small>
           @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
        </div>

        
      </div>
      <div class="row">
          <div class="card-body">
            <div class="col-md-12">
             <div class="">
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Spremi</button>
                  <button type="button" onclick="window.location.href='/admin/talenti'" class="btn btn-secondary">Nazad</button>
                </div>
             </div> 
            </div> 
          </div> 
        </div> 
    </div>
  </form>
  </div>
</div>


@endsection

@section('third_party_scripts')

<script src="{{ asset('../vendor/dist/css/adminlte.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/jquery-ui/jquery-ui.js') }}"></script>

<script type="text/javascript">
  $( function() {
    $( "#datum_rodjenja" ).datepicker({
        dateFormat: "yy-mm-dd",
        changeYear: true
    });
    $( "#start_treniranja" ).datepicker({
        dateFormat: "yy-mm-dd",
        startDate: "today",
        changeYear: true
    });
  } );
 </script>

@endsection
