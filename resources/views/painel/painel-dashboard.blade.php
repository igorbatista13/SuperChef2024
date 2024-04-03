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

                        <!-- Sales Card -->
                        <div class="col-xxl-3 col-md-3">
                            <div class="card info-card sales-card">



                                <div class="card-body">
                                    <h5 class="card-title">Inscrições <span></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-text"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $recibo }} </h6>
                                            <span class="text-success small pt-1 fw-bold">Recebidas</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-3 col-md-3">
                            <div class="card info-card revenue-card">



                                <div class="card-body">
                                    <h5 class="card-title">Ingredientes <span></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-basket"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $produtos }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Cadastradas</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-3">

                            <div class="card info-card customers-card">


                                <div class="card-body">
                                    <h5 class="card-title">Escolas <span></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bxs-school"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $escolas }} </h6>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->
                        <div class="col-xxl-3 col-xl-3">

                            <div class="card info-card customers-card">


                                <div class="card-body">
                                    <h5 class="card-title">DRES <span></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $dre }}</h6>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->
                        <div class="col-xxl-3 col-xl-3">

                            <div class="card info-card customers-card">


                                <div class="card-body">
                                    <h5 class="card-title">Inscrições  <span></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="text-warning bi bi-file-text"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="text-warning">{{$insc_nao_avaliados }}</h6>
                                            <span class="text-warning small pt-1 fw-bold">Não Avaliadas</span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->
                        <div class="col-xxl-3 col-xl-3">

                            <div class="card info-card customers-card">


                                <div class="card-body">
                                    <h5 class="card-title">Inscrições  <span></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="text-danger bi bi-file-text"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="text-danger">{{$insc_desclassificados }}</h6>
                                            <span class="text-danger small pt-1 fw-bold">Desclassificadas</span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <div class="col-xxl-3 col-md-3">
                            <div class="card info-card revenue-card">



                                <div class="card-body">
                                    <h5 class="card-title">Inscrições <span></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="text-success bi bi-file-text"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="text-success">{{ $insc_classificados }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Qualificadas</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->
                        {{-- <div class="col-xxl-3 col-md-3">
                            <div class="card info-card revenue-card">



                                <div class="card-body">
                                    <h5 class="card-title">Usuários <span></span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class=" text-success bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $produtos }}</h6>
                                            <span class="text-success small pt-1 fw-bold"></span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> --}}
                        <!-- End Revenue Card -->

                        

            </div>
        </section>
    </main>
@endsection
