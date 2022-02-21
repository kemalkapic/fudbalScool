@extends('layouts.app')

@section('third_party_stylesheets')
    
  <link href="{{ asset('../vendor/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('../vendor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../vendor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../vendor/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('../vendor/plugins/sweetalert2/sweetalert2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('../vendor/dist/css/adminlte.min.css') }}">

@endsection

@section('content')

<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista svih uplata i isplata</h3>
              </div>
              <div class="card-header">
                <a class="btn btn-success" href="/admin/kasauplata">Dodaj uplatu/isplatu</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>R.br.</th>
                    <th>Uplatitelj/Isplatitelj</th>
                    <th class="min-phone-l">Opis</th>
                    <th class="min-phone-l">Datum</th>
                    <th class="min-phone-l">Iznos</th>
                    <th class="min-phone-l">Status</th>
                    <th>Akcije</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($kasa as $i=>$uplata)

                  <tr>
                    <td>{{ $i+1 }}.</td>
                    
                    @if($uplata->talent_id == NULL)
                            <td>{{ $uplata->uplatitelj }}</td>
                    @else       
                            @foreach($talents as $talent)
                                  @if($talent->id == $uplata->talent_id)
                                        <td><b>{{ $talent->prezime }}</b> ({{ $talent->ime_roditelja }}) <b>{{ $talent->ime }}</b> </td>
                                  @endif
                            @endforeach  
                    @endif
                    <td>{{ $uplata->opis}}</td>
                    <td>{{ $uplata->datum}}</td>
                    <td>{{ $uplata->iznos}}</td>
                    <td>{{ $uplata->status }}</td>
                    <td style="width: 100px;">
                      <div class="btn-group">
                      <a class="btn btn-inline btn-warning" title="Uredi" href="/admin/kasa/edit/{{ $uplata->id }}">Uredi</a>
                      <a class="btn btn-inline btn-danger" title="Obriši" onclick="deleteItem({{ $uplata->id }})">Briši</a>
                      </div>
                    </td>
                  </tr>
                  @empty
                    <tr>Nema unosa</tr>
                  @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>
</div>
@endsection

@section('third_party_scripts')

<script src="{{ asset('../vendor/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('../vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('../vendor/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('../vendor/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script> 
 $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "oLanguage": {
          "sSearch": "Pretraga:",
          "sLengthMenu": "Prikaz _MENU_ unosa",
          "sInfo": "Prikaz _START_ do _END_ od _TOTAL_ unosa",
          "oPaginate": {
              'sPrevious': 'Prethodna',
              'sNext': 'Sljedeća'
          }
      }
    });
 function deleteItem(id){
  Swal.fire({
  title: 'Da li ste sigurni?',
  text: "Nećete moći vratiti ove podatke!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Da, želim brisati!',
  cancelButtonText: 'Odustani'
}).then((result) => {
  if (result.value) {
    Swal.fire(
      'Obrisano!',
      'Džematlija je uspješno obrisan.',
      'success'
    )
    window.location.href='/admin/kasa/destroy/'+id;
  }
})
}
  </script>

@endsection
