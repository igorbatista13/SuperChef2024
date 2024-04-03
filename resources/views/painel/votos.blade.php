@extends('base.novabase')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Início</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-4 lg-2 col-xl-4">

                          <div class="card info-card customers-card">


                              <div class="card-body">
                                  <h5 class="card-title"> Total de Votos <span></span></h5>

                                  <div class="d-flex align-items-center">
                                      <div
                                          class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="bi bi-hand-thumbs-up"> </i>

                                      </div>

                         

                                      <div class="ps-3">
                                        <h6>{{ $totalVotos }}</h6>
                                        <span class="text-success small pt-1 fw-bold">Contabilizados</span>

                                    </div>
                                  </div>

                              </div>
                          </div>

                      </div><!-- End Customers Card -->


                        <div class="col-xxl-4 col-xl-4">

                          <div class="card info-card customers-card">


                              <div class="card-body">
                                  <h5 class="card-title"> N° da Inscrição Vencedora <span></span></h5>

                                  <div class="d-flex align-items-center">
                                      <div
                                          class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                          <i class="bx bxs-trophy"> </i>

                                      </div>
                                      <div class="ps-3">
                                        @foreach ($result as $item)
                                        <h6>Recibo ID: {{ $item->recibo_id }}</h6>
                                    @endforeach
                                    <hr>
                                    <span class="text-success small pt-1 fw-bold">
                                        <h6>Votos: {{ $vencedor }}<span>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div><!-- End Customers Card -->

                        <!-- Reports -->
                        <!-- End Reports -->

                        <!-- Recent Sales -->

                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">


                                <div class="card-body ">
                                    <h5 class="card-title">Lista de Votos<span></span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Nome</th>
                                                <th scope="col">DRE</th>
                                                <th scope="col">Escola</th>
                                                <th scope="col">Votos</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($recibos as $recibo)
                                                <tr>

                                                    <th scope="row"><a href="{{asset('/inscricao/'.$recibo->id)}}">{{ $recibo->id }}</a></th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{asset('/inscricao/'.$recibo->id)}}" class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{asset('/inscricao/'.$recibo->id)}}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a></td>

                                                    <td> <button type="button" class="btn btn-success mb-2">
                                                            {{ $recibo->likes->count() }}
                                                        </button> </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->


                    </div>
                </div><!-- End Left side columns -->


            </div><!-- End Right side columns -->

            </div>
        </section>
    </main>
@endsection
