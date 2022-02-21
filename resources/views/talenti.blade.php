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
                <h3 class="card-title">Lista svih registriranih talenata nogometne škole</h3>
              </div>
              <div class="card-header">
                <a class="btn btn-success" href="/admin/novitalent">Dodaj talenta</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>R.br.</th>
                    <th>Prezime (ime roditelja) Ime</th>
                    <th class="min-phone-l">Datum rođenja</th>
                    <th class="min-phone-l">Kontakt telefon</th>
                    <th class="min-phone-l">Status</th>
                    <th>Akcije</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($talents as $i=>$talent)

                  <tr>
                    <td>{{ $i+1 }}.</td>
                    <td><b>{{ $talent->prezime }}</b> ({{ $talent->ime_roditelja }}) <b>{{ $talent->ime }}</b> </td>
                    <td>{{ $talent->datum_rodjenja }}</td>
                    <td>{{ $talent->telefon }}</td>
                    <td>{{ $talent->status }}</td>
                    <td style="width: 180px;">
                      <div class="btn-group">
                      <a class="btn btn-inline btn-warning" title="Uredi talenta" href="/admin/talenti/edit/{{ $talent->id }}">Uredi</a>
                      <a class="btn btn-inline btn-success" title="Uplati članarinu" href="/admin/talenti/uplata/{{ $talent->id }}">Uplati</a>
                      <a class="btn btn-inline btn-danger" title="Obriši talenta" onclick="deleteTalent({{ $talent->id }})">Briši</a>
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
 function deleteTalent(id){
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
    window.location.href='/admin/talenti/destroy/'+id;
  }
})
}
  </script>

@endsection
