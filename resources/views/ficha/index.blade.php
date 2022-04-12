@extends('layouts.layout')
@section('4')
    active bg-gradient-warning
@endsection



@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container mt-8 min-vh-100 py-4">


            <div class="container mt-2 text-center ">
                <h2 class="mb-4">
                    Agregar Documento
                </h2>
                <form action="{{ route('file-import-ficha') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-center">
                            <input type="file" name="file" class="custom-file-input" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Seleccionar documento</label>
                        </div>
                    </div>
                    <button class="btn btn-warning">Importar documento</button>

                    {{-- <a class="btn btn-success" href="{{ route('file-export-ficha') }}">Exportar documento</a> --}}
                </form>
            </div>


            <div class="container">
                <div class="row justify-content-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="card my-4">
                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                    <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                        <h6 class="text-white text-capitalize ps-3">Fichas</h6>

                                    </div>
                                </div>
                                <div class="card-body px-0 pb-2">
                                    <div class="table-responsive p-0">

                                        <table class="table align-items-center mb-0">
                                            <form class="form-inline my-2 my-lg-0 float-right">
                                                <div class="col-xl-12">

                                                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                                        <div class="input-group input-group-outline">
                                                            <label class="form-label"></label>
                                                            <input name="buscarpor" type="search"
                                                                class="form-control mr-sm-8">
                                                            <button class="btn btn-warning my-2 my-sm-0"
                                                                type="submit">search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">
                                                        Identificador Ficha</th>
                                                    <th
                                                        class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">
                                                        Estado</th>
                                                    <th
                                                        class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">
                                                        Total Aprendices</th>
                                                    <th
                                                        class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">
                                                        Total Activos</th>
                                                    <th
                                                        class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">
                                                        Nivel</th>
                                                    <th
                                                        class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">
                                                        Fecha Inicio</th>
                                                    <th
                                                        class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">
                                                        Fecha Fin</th>
                                                    <th
                                                        class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">
                                                        Nombre del coordinador</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($fichas as $ficha)
                                                    <tr>
                                                        <td class="align-middle text-center"> {{ $ficha->id }} </td>
                                                        <td class="align-middle text-center"> {{ $ficha->estado }}
                                                        </td>
                                                        <td class="align-middle text-center">{{ $ficha->total_apre }}
                                                        </td>
                                                        <td class="align-middle text-center">{{ $ficha->total_act }}
                                                        </td>
                                                        <td class="align-middle text-center">{{ $ficha->nivel }}</td>
                                                        <td class="align-middle text-center">{{ $ficha->fecha_in }}
                                                        </td>
                                                        <td class="align-middle text-center">{{ $ficha->fecha_fin }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $ficha->Coordinacion->nom_coor }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>

                                        <div class="d-flex justify-content-left">
                                            {!! $fichas->links() !!}
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@endsection
