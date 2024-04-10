@extends('base.novabase')
@section('content')
    <main id="main" class="main">

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">

                    <div class="card-content">
                        <div class="card-body">
                            <div class="container">

                                <section class="section">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="container">
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-sm">
                                                            </div>
                                                            <div class="d-flex justify-content-center">
                                                                <B>
                                                                    <h2> Inscrição SuperChef da Educação de MT </h2>
                                                                </B>

                                                            </div>
                                                            <div class="col-sm">
                                                            </div>
                                                        </div>
                                                        <br>

                                                        <div class="row justify-content-md-center">
                                                            <div class="col-sm">
                                                            </div>
                                                            <div class="col-md-auto ">
                                                                <big> <code> Inscrição N°: {{ $recibo->id }}</code> </big>
                                                            </div>
                                                            <div class="col-sm">
                                                            </div>
                                                        </div>

                                                        <br>



                                                        <h5 class="card-title justify-content-md-center">DADOS DO
                                                            PARTICIPANTE</h5>
                                                        <div class="card-body">

                                                            <code> Inscrição N°: {{ $recibo->id }}</code> <br>
                                                            <code> Data da Inscrição: </code>
                                                            {{ $recibo->created_at->format('m/d/Y') ?? 'Não informado' }}<br>
                                                            <code> Nome: </code> {{ $recibo->Nome ?? 'Sem registros' }}<br>
                                                            <code> CPF: </code> {{ $recibo->cpf ?? 'Sem registros' }}<br>
                                                            <code> Telefone: </code>
                                                            {{ $recibo->Telefone ?? 'Sem registros' }}<br>
                                                            <code> Munícipio: </code>
                                                            {{ $recibo->cidade->Nome ?? 'Sem registros' }}<br>
                                                            <code> Email: </code>
                                                            {{ $recibo->Email ?? 'Sem registros' }}<br>
                                                            <code> DRE: </code> {{ $recibo->dre->Nome }}<br>
                                                            <code> Escola: </code>
                                                            {{ $recibo->escola->EscolaNome ?? 'Sem registros' }}<br>

                                                            <br>

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="alert alert-danger" role="alert">
                                                            <center>
                                                                <h4 class="alert-heading"><b> NOME DA RECEITA </B> </h4>
                                                            </center>
                                                            <p class="text-center"> <b> {{ $recibo->Nome_Prato }} </b></p>

                                                            <p class="text-center"> <b> {{ $recibo->motivo }} </b></p>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="row">

                                                                <div class="col-12 col-sm-12 col-md-4 ">
                                                                    <div class="list-group" role="tablist">
                                                                        <a class="list-group-item list-group-item-action active"
                                                                            id="list-home-list" data-bs-toggle="list"
                                                                            href="#list-home" role="tab"><b> 1.
                                                                                Ingredientes </b> </a>

                                                                        <a class="list-group-item list-group-item-action"
                                                                            id="list-profile-list" data-bs-toggle="list"
                                                                            href="#list-profile" role="tab"><b> 2. Modo
                                                                                de
                                                                                Preparo </b> </a>

                                                                        <a class="list-group-item list-group-item-action"
                                                                            id="list-settings-tramitar"
                                                                            data-bs-toggle="list" href="#list-tramitar"
                                                                            role="tab"><b> 3. Imagem do prato </b> </a>

                                                                        <a class="list-group-item list-group-item-action"
                                                                            id="list-settings-seduc" data-bs-toggle="list"
                                                                            href="#list-seduc" role="tab"><b> 4.
                                                                                Avaliação
                                                                                SEDUC </b> </a>


                                                                    </div>
                                                                </div>








                                                                @include('/inscricao/1_ingredientes')

                                                                @include('/inscricao/2_modo_de_preparo')

                                                                @include('/inscricao/3_imagem_do_prato')

                                                                @include('/inscricao/4_avaliacao')




                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>









                                    </div>








                            </div>
                        </div>
        </section>
    </main>










    <!-- List group navigation ends -->


    <script src="{{ asset('/js/pages/form-editor.js') }}"></script>
@endsection
