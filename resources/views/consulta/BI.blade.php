@extends('layouts.layout')
@section('6')
active bg-gradient-warning
@endsection

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">



        <body>
            <div class="container mt-5 min-vh-100 py-4">
                <div class="row">
                   <div class="container mt-2 text-center ">
                        <h2 class="mb-4">
                            Power BI
                        </h2>
                     

                    </div>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card my-4">
                                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                            <div class="bg-gradient-warning shadow-primary border-radius-lg pt-4 pb-3">
                                                <h6 class="text-white text-capitalize ps-3">    Power BI</h6>
                                            </div>
                                        </div>
                                        <div class="card-body px-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <iframe title="SISE" width="1024" height="804" src="https://app.powerbi.com/view?r=eyJrIjoiMGJlYTc0NzMtNmRhNC00NDYxLWIxNGItOGRiMjgxOWQ2YmFmIiwidCI6ImNiYzJjMzgxLTJmMmUtNGQ5My05MWQxLTUwNmM5MzE2YWNlNyIsImMiOjR9&pageName=ReportSection" frameborder="0" allowFullScreen="true"></iframe>
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
