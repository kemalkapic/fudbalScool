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
      <h3 class="card-title">Dodavanje nove uplate/isplate</h3>
    </div>

      <div class="container-fluid">
        <form method="post" action="/admin/kasa/add">
         <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="card-body">
            <div class="col-md-12">
             <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Informacije o uplatitelju ili isplatitlju</h3>
              </div>
                <div class="card-body">
                <div class="form-group">
                  <label>Tip prometa</label>
                  <select class="form-control select2" style="width: 100%;" id="tip" name="tip">
                    <option selected="selected">Uplata članarine</option>
                    <option disabled>Uplata</option>
                    <option disabled>Isplata</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Talent</label>
                  <select class="form-control select2" style="width: 100%;" id="talent" name="talent">
                  @foreach($talenti as $talent)
                    <option id="{{ $talent->id}}">{{ $talent->prezime }} ({{ $talent->ime_roditelja }}) {{ $talent->ime }}</option>
                  @endforeach
                  </select>
                </div>
                  <div class="form-group">
                  <label>Datum:*</label>
                    <div class="input-group date" id="datepickerdiv" data-target-input="nearest">
                        <input type="text" class="form-control" id="datum" name="datum" data-target="#reservationdate"/>
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                  </div>
                  <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2" style="width: 100%;" id="status" name="status">
                    <option selected="selected">Aktivan</option>
                    <option>Izbrisan</option>
                  </select>
                </div>
               
                  
                  </div>              
            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
             <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Informacije o uplati/isplati</h3>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="iznos">Iznos*</label>
                    <input type="text" class="form-control float" id="iznos" name="iznos" placeholder="00.00" step="0.01">
                  </div>
                  <div class="form-group">
                    <label for="opis">Opis*</label>
                    <input type="text" class="form-control" id="opis" name="opis" placeholder="Unesi telefon" value="Uplata članarine">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Unesi email">
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
    $( "#datum" ).datepicker({
        dateFormat: "yy-mm-dd",
        startDate: "today",
        changeYear: true
    });
    $('input.float').on('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
    });
  } );
 </script>

@endsection
