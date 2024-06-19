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
                                            @php
                                                $recibo = \App\Models\Recibo::find($item->recibo_id);
                                                $votosCount = $recibo ? $recibo->likes->count() : 0;
                                            @endphp
                                            <h6>Recibo ID: {{ $item->recibo_id }}
                                                - Votos: {{ $votosCount }}
                                                <a href="{{ asset('/inscricao/' . $item->recibo_id) }}">Ver </a>
                                            </h6>
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
                                    <h5 class="card-title">5 mais Votados - DRE - ALTA FLORESTA <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos1 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE BARRA DO GARÇAS <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos2 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE CÁCERES <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos3 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE CONFRESA <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos4 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE CUIABÁ <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos5 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a>
                                                    </td>

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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE VÁRZEA GRANDE <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos6 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a>
                                                    </td>

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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE DIAMANTINO <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos7 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a>
                                                    </td>

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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE JUÍNA <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos8 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a>
                                                    </td>

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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE MATUPÁ <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos9 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a>
                                                    </td>

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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE PONTES E LACERDA <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos10 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a>
                                                    </td>

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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE PRIMAVERA DO LESTE <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos11 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a>
                                                    </td>

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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE RONDONÓPOLIS <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos12 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a>
                                                    </td>

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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE SINOP <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos13 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a>
                                                    </td>

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
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body ">
                                    <h5 class="card-title">5 mais Votados - DRE TANGARÁ DA SERRA <span></span></h5>
                                    <table class="table table-borderless datastable">
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
                                            @foreach ($recibos14 as $recibo)
                                                <tr>
                                                    <th scope="row"><a
                                                            href="{{ asset('/inscricao/' . $recibo->id) }}">{{ $recibo->id }}</a>
                                                    </th>
                                                    <td>{{ $recibo->Nome }}</td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->dre->Nome }}</a>
                                                    </td>
                                                    <td><a href="{{ asset('/inscricao/' . $recibo->id) }}"
                                                            class="text-primary">{{ $recibo->escola->EscolaNome }}</a>
                                                    </td>

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
