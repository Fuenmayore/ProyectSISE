@extends('layouts.coor_hui')
@section('5')
active bg-gradient-warning
@endsection

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <body>
        <div class="container mt-8 min-vh-100 py-4">
            <div class="row">
                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">

                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            @foreach ($apre as $apres)
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"></p>
                                <h4 class="mb-0">{{ $apres->total }}</h4>
                            </div>
                            @endforeach

                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">
                                </span>Total aprendices </p>
                        </div>
                    </div>
                </div>

                @foreach ($act as $activo)
                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">

                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">add</i>
                            </div>

                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"></p>
                                <h4 class="mb-0">{{ $activo->total }}</h4>
                            </div>


                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">
                                </span>Total aprendices activos </p>
                        </div>
                    </div>
                </div>
                @endforeach


                @foreach ($retirados as $reti)
                <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">

                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-success shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">remove</i>
                            </div>

                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"></p>
                                <h4 class="mb-0">{{ $reti->retirado }}</h4>
                            </div>


                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">
                                </span>Total aprendices retirados </p>
                        </div>
                    </div>
                </div>
                @endforeach


                @foreach ($retencion as $reten)
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">peopleadd</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"></p>
                                <h4 class="mb-0">{{ $reten->total }}%</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">
                                </span>Total Aprendices <br>Indice Retencion </p>
                        </div>
                    </div>
                </div>
                @endforeach


                @foreach ($desercion as $deser)
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">peopleremove</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize"></p>
                                <h4 class="mb-0">{{ $deser->total }}% </h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">
                                </span>Total Aprendices <br> Indice Deserción </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <br>
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Reporte General</h6>


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


                                                        <th class="text-uppercase text-center text-primary text-xxs font-weight-bolder opacity-7">
                                                            Identificador Ficha</th>
                                                        <th class="text-uppercase text-center text-primary text-xxs font-weight-bolder opacity-7">
                                                            nivel</th>
                                                        <th class="text-uppercase  text-primary text-xxs font-weight-bolder opacity-7 ps-2">
                                                            Suma total aprendices Activos</th>
                                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">
                                                            Suma total aprendices Retirados</th>
                                                        <th class="text-center text-uppercase text-primary text-xxs font-weight-bolder opacity-7">
                                                            Porcentaje de retención</th>
                                                        <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">
                                                            Porcentaje de deserción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($reporteHui as $hui)
                                                    <tr>
                                                        <td class="align-middle text-center">
                                                            {{ $hui->id }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $hui->nivel }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $hui->suma_total_act }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $hui->registro_coordinacion }}
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $hui->totald }}%
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            {{ $hui->totalr }}%
                                                        </td>

                                                        <td class="align-middle text-center">
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
    </body>


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
