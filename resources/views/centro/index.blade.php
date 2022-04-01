@extends('layouts.layout')
@section('2')
active bg-gradient-warning
@endsection

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">



        <body>
            <div class="container mt-8 min-vh-100 py-4">
                <div class="row">
                   <div class="container mt-2 text-center ">
                        <h2 class="mb-4">
                           Centro
                        </h2>
                        {{-- <form action="{{ route('file-import-centro') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                <div class="custom-file text-center">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Seleccionar documento</label>
                                </div>
                            </div>
                            <button class="btn btn-warning">Importar archivo</button>
                            <a class="btn btn-success" href="{{ route('file-export-centro') }}">Exportar archivo</a>
                        </form> --}}

                    </div>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card my-4">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                            <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                                <h6 class="text-white text-capitalize ps-3">Centros</h6>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Centro</th>
                                                            <th>Nombre</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($centros as $centro)
                                                            <tr>
                                                                <td>{{ $centro->id }}</td>
                                                                <td>{{ $centro->nom_centro }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </body>
        <footer class="footer py-4  ">
            <div class="container-fluid">
              <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                  <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                      document.write(new Date().getFullYear())
                    </script>,
                    Derechos Reservados Fábrica de Software
                  </div>
                </div>

              </div>
            </div>
          </footer>
    </main>
@endsection
