@extends('layouts.user')

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
<div class="container-fluid">
  <h3 class="text-black-50">Nogometna škola Talent Cazin!</h3>  
  <div class="row">
  <div class="col-12">
      
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pregled članarina</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    
                    <th data-priority="1">Talent</th>
                    @php
                    use Carbon\Carbon;
                    Carbon::setlocale('bs');

                   
                    @endphp
                    <th >{{ Carbon::now()->subMonth(3)->translatedFormat('m/Y') }}</th>
                    <th >{{ Carbon::now()->subMonth(2)->translatedFormat('m/Y') }}</th>
                    <th data-priority="2ca">{{ Carbon::now()->subMonth(1)->translatedFormat('m/Y') }}</th>
                    <th data-priority="1">{{ Carbon::now()->translatedFormat('m/Y') }}</th>
                    <th >{{ Carbon::now()->addMonth(1)->translatedFormat('m/Y') }}</th>
                    <th >{{ Carbon::now()->addMonth(2)->translatedFormat('m/Y') }}</th>
                    <th >{{ Carbon::now()->addMonth(3)->translatedFormat('m/Y') }}</th>
                    <th >{{ Carbon::now()->addMonth(4)->translatedFormat('m/Y') }}</th>
                    <th >{{ Carbon::now()->addMonth(5)->translatedFormat('m/Y') }}</th>
                    <th >{{ Carbon::now()->addMonth(6)->translatedFormat('m/Y') }}</th>
                    <th >{{ Carbon::now()->addMonth(7)->translatedFormat('m/Y') }}</th>
                    <th >{{ Carbon::now()->addMonth(8)->translatedFormat('m/Y') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse(json_decode($clanarine) as $clanarina)
                  <tr>
                   
                    <td>{{ $clanarina->name }}</td> 
                      @foreach($clanarina->clanarina as $key => $value)
                        @foreach($value as $item)
                          @if($item == "Paid")
                            <td align="center"><span class="badge bg-success">Plaćeno</span></td>
                          @else
                            <td align="center"><span class="badge bg-danger">Nije plaćeno</span></td>
                          @endif
                        @endforeach   
                      @endforeach         
                    
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
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "responsive": true
  });
  </script>

@endsection