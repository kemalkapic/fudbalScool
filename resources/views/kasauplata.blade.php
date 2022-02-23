@extends('layouts.app')

@section('third_party_stylesheets')
    
<link rel="stylesheet" href="{{ asset('../vendor/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="{{ asset('../vendor/plugins/jquery-ui/jquery-ui.css')}}">

<link rel="stylesheet" href="{{ asset('../vendor/dist/css/adminlte.min.css') }}">
<style>
.hide-month .ui-datepicker-month,
.hide-current .ui-datepicker-current,
.hide-calendar .ui-datepicker-calendar{
  display: none;
}
</style>
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
                    <label for="tipprometa">Tip prometa</label>
                    <select class="form-control select2" style="width: 100%;" id="tipprometa" name="tipprometa">
                      <option value="clanarina" selected="selected">Uplata članarine</option>
                      <option value="uplata">Druga uplata</option>
                      <option value="isplata">Isplata</option>
                    </select>
                  </div>
                  <div class="form-group" id="talentdiv">
                    <label>Talent*</label>
                    <select class="form-control select2" style="width: 100%;" id="talent" name="talent">
                    <option value=""></option>
                    @foreach($talenti as $talent)
                      <option value="{{ $talent->id }}">{{ $talent->prezime }} ({{ $talent->ime_roditelja }}) {{ $talent->ime }}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group" id="uplatiteljdiv">
                    <label for="uplatitelj">Naziv*</label>
                    <input type="text" class="form-control" id="uplatitelj" name="uplatitelj" placeholder="Upišite naziv lica">
                  </div>
                  <div class="form-group">
                    <label>Datum*</label>
                    <div class="input-group date" id="datepickerdiv" data-target-input="nearest">
                      <input type="text" required class="form-control" id="datum" name="datum" data-target="#reservationdate"/>
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
                    <div class="input-group">
                        <input type="text" class="form-control" required name="iznos" id="iznos" pattern="^\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" placeholder="0.00">
                        <div class="input-group-text">KM</div>
                    </div>
                    <p class="help-block"><small>Decimalno mjesto je potrebno odvojiti sa '.' (tačkom) npr. 25.50</small></p>
                  </div>
                  <div class="form-group">
                    <label for="opis">Opis*</label>
                    <input type="text" class="form-control" id="opis" name="opis" placeholder="Unesi opis uplate/isplate">
                  </div>
                  <div class="form-group" id="monthdiv">
                    <label>Za mjesec*</label>
                      <div class="input-group date2" id="datepickerdiv" data-target-input="nearest">
                          <input type="text" class="form-control" id="month" name="month" data-target="#reservationdate" onkeypress="return false;"/>
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                  </div>
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
        <div class="row">
          <div class="card-body">
            <div class="col-md-12">
              <div class="">
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Spremi</button>
                  <button type="button" onclick="window.location.href='/admin/kasa'" class="btn btn-secondary">Nazad</button>
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
        changeYear: true,
        beforeShow: function(input) {
          $(this).datepicker('widget').removeClass('hide-current hide-calendar');
        },
    });
    $( "#month" ).datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        closeText: "Odaberi",
        monthNames: ['Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni','Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'],
        beforeShow: function(input) {
          $(input).datepicker("widget").addClass('hide-current hide-calendar');
        },
        onClose: function(dateText, inst) {
          var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
          var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
          $(this).datepicker('setDate', new Date(year, month, 1));
        }
        
    });
    $('input.float').on('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
    });
    $(document).ready(function() {
        $("#talentdiv").show();
        $("#monthdiv").show();
        $("#month").prop('required',true);
        $("#uplatiteljdiv").hide(); 
        $("#uplatitelj").prop('required',false);
        $("#opis").val("Uplata članarine");
        $("#talent").prop('required',true);
    });
    $('#tipprometa').on('change', function() {
      if ( this.value == 'clanarina'){
        $("#talentdiv").show();
        $("#monthdiv").show();
        $("#month").prop('required',true);
        $("#uplatiteljdiv").hide(); 
        $("#uplatitelj").prop('required',false);
        $("#opis").val("Uplata članarine"); 
        $("#talent").prop('required',true);
      }
      else if( this.value == 'uplata' || this.value == 'isplata'){
        $("#talentdiv").hide();
        $("#monthdiv").hide();
        $("#month").prop('required',false);
        $("#uplatiteljdiv").show();
        $("#uplatitelj").prop('required',true);
        $("#opis").val("");
        $("#talent").val("");
        $("#talent").prop('required',false);
      }
    });
    
  } );

  // Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    input_val = left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}



 </script>

@endsection
