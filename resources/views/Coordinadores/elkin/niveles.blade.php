@extends('layouts.coor_elkin')
@section('5')
    active bg-gradient-warning
@endsection

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <body>
            <div class="container mt-8 min-vh-100 py-4">

                <div class="container mt-2 text-center ">
                    <h2 class="mb-4">
                        Reporte por niveles específicos
                    </h2>
                </div>
                <div class="row">


                    <br>
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Niveles</h6>

                            </div>
                            <br>


                        </div>
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                            <div class="card-body px-0 pb-2">
                                                <div class="table-responsive p-0">
                                                    <table class="table  align-items-center mb-0">
                                                        <thead>
                                                            <tr>

                                                                <th
                                                                    class="text-uppercase text-center text-primary text-xxs font-weight-bolder opacity-7">
                                                                    nivel</th>
                                                                <th
                                                                    class="text-uppercase text-center text-primary text-xxs font-weight-bolder opacity-7">
                                                                    Total matriculados</th>
                                                                    <th
                                                                    class="text-uppercase text-center text-primary text-xxs font-weight-bolder opacity-7">
                                                                    Total activos</th>
                                                                    <th
                                                                    class="text-uppercase text-center text-primary text-xxs font-weight-bolder opacity-7">
                                                                    Total desertados</th>
                                                                    <th
                                                                    class="text-uppercase text-center text-primary text-xxs font-weight-bolder opacity-7">
                                                                    Total retencion</th>
                                                                    <th
                                                                    class="text-uppercase text-center text-primary text-xxs font-weight-bolder opacity-7">
                                                                    Total desercion</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($niveles as $nivel)
                                                                <tr>
                                                                    <td class="align-middle text-center">
                                                                        {{ $nivel->nivel }}
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        {{ $nivel->total_matriculados }}
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        {{ $nivel->total_activos }}
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        {{ $nivel->total_desertados }}
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        {{ $nivel->total_retencion }}%
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        {{ $nivel->total_desercion }}%
                                                                    </td>

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


                        <footer class="footer ">
                            <div class="container-fluid">
                                <div class="row align-items-center justify-content-lg-between">
                                    <div class="col-lg-12 mb-lg-0 mb-4">
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
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
    </main>
@endsection
