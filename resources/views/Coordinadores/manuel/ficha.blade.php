@extends('layouts.coor_manuel')
@section('2')
    active bg-gradient-warning
@endsection



@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container mt-8 min-vh-100 py-4">

        <div class="container mt-2 text-center ">
            <h2 class="mb-4">
                Coordinador MANUEL GREGORIO HORMECHEA LANCE
            </h2>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Fichas general </h6>

                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">

                                    <table class="table align-items-center mb-0">

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

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($datosManuel as $ficha)
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
    </div>
</main>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
@endsection
