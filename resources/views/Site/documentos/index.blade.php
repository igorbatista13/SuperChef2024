@extends('base.base2')

@section('content')
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">

    <section class="app-main">
        <div class="app-main-left cards-area">


            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"></h5>

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                            

                                    <thead>
                                        <tr>
                                            <th>Nome do Documento</th>
                                            <th>Anexo</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($documentos as $documento)
                                            <tr>

                                                <td>
                                                    {{ $documento->Nome_doc1 }}
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('images/documentos/' . $documento->Anexo1) }}"
                                                        target="_blank">
                                                        <i class="bi bi-file-earmark-pdf-fill"></i>
                                                        Ver arquivo
                                                    </a>
                                                </td>
  
                                        

                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
            </section>
            @endsection