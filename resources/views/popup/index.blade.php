@extends('base.novabase')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1><b> Pop UP - Site </b> </h1>

        </div><!-- End Page Title -->
        <div class="card">

            <div class="card-body">


                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>

                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                            Novo Pop UP
                                        </button>

                                        <thead>
                                            <tr>
                                                <th>Nome do Documento</th>
                                                <th>Anexo</th>
                                                <th scope="col">Editar</th>
                                                <th scope="col">Deletar</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($popups as $popup)
                                                <tr>

                                                    <td>
                                                        {{ $popup->Nome_popup }}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="{{ asset('images/documentos/' . $popup->Anexo1) }}"
                                                            target="_blank">
                                                            <i class="bi bi-file-earmark-pdf-fill"></i>
                                                            Ver arquivo
                                                        </a>
                                                    </td>
                                                    <td>

                                                        @include('popup/modal/edit')


                                                    </td>
                                                    <td>

                                                        @include('popup/modal/delete')

                                                    <td>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- End Table with stripped rows -->
                </section>
    </main>

    @include('popup/modal/create')
@endsection
