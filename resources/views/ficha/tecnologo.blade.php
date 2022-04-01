@extends('layouts.layout')
@section('4')
    active bg-gradient-warning
@endsection

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <body>
            <div class="container mt-8 min-vh-100 py-4">
                <div class="row">







                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Tecnólogo</h6>

                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">

                                    <table class="table align-items-center mb-0">
                                        <div class="col-xl-12">
                                            <a class="btn btn-warning" href="{{ route('file-export-fichaTec') }}">Exportar documento</a>
                                            </div>
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

                                            @foreach ($tecnologos as $tecnolog)
                                                <tr>

                                                    <td class="align-middle text-center"> {{ $tecnolog->id }} </td>
                                                    <td class="align-middle text-center"> {{ $tecnolog->estado }}
                                                    </td>
                                                    <td class="align-middle text-center">{{ $tecnolog->total_apre }}
                                                    </td>
                                                    <td class="align-middle text-center">{{ $tecnolog->total_act }}
                                                    </td>
                                                    <td class="align-middle text-center">{{ $tecnolog->nivel }}</td>
                                                    <td class="align-middle text-center">{{ $tecnolog->fecha_in }}
                                                    </td>
                                                    <td class="align-middle text-center">{{ $tecnolog->fecha_fin }}
                                                    </td>
                                                    <td class="align-middle text-center">
                                                    {{ $tecnolog->Coordinacion->nom_coor }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>


                                    <div class="d-flex justify-content-left">
                                        {!! $tecnologos->links() !!}
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
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                Derechos Reservados Fábrica de Software
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
        </body>
    </main>
@endsection
