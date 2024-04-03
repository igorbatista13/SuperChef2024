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

                                                                        {{-- <a class="list-group-item list-group-item-action"
                                                                            id="list-settings-seduc2" data-bs-toggle="list"
                                                                            href="#list-seduc2" role="tab"> 5. Avaliação
                                                                            SEDUC - <b> Etapa 2 </b></a>

                                                                        <a class="list-group-item list-group-item-action"
                                                                            id="list-settings-dre1" data-bs-toggle="list"
                                                                            href="#list-dre1" role="tab"> 6. Avaliação
                                                                            DRE - <b> Etapa 2 </b></a> --}}


                                                                    </div>
                                                                </div>








                                                                @include('/inscricao/1_ingredientes')

                                                                @include('/inscricao/2_modo_de_preparo')



                                                                @include('/inscricao/3_imagem_do_prato')


                                                                @include('/inscricao/4_avaliacao')



                                                                {{-- <div class="tab-pane" id="list-seduc2"
                                                                            role="tabpanel"
                                                                            aria-labelledby="list-settings-seduc2">
                                                                            <div class="row">
                                                                                <div class="col-xl-12 col-sm-12 col-12">
                                                                                    <div
                                                                                        class="card text-center bg-lighten-2">
                                                                                        <div class="card-content d-flex">
                                                                                            <div class="card-body">
                                                                                                <img src="https://www.onlyoffice.com/blog/wp-content/uploads/2022/09/Blog_fillable_form_in_PDF.jpg"
                                                                                                    alt=""
                                                                                                    height="100"
                                                                                                    class="mb-1">
                                                                                                <div class="alert alert-primary"
                                                                                                    role="alert">
                                                                                                    <h4
                                                                                                        class="alert-heading">
                                                                                                        Avaliação
                                                                                                        SEDUC - <b>
                                                                                                            ETAPA
                                                                                                            2</b>
                                                                                                    </h4>
                                                                                                    <p> Os campos de
                                                                                                        notas
                                                                                                        abaixo são
                                                                                                        para o
                                                                                                        uso
                                                                                                        exclusivo da
                                                                                                        SEDUC
                                                                                                    </p>
                                                                                                    <hr>
                                                                                                    <p class="mb-0">
                                                                                                    </p>
                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div
                                                                                                        class="col-md-6 col-8">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <label
                                                                                                                for="email-id-column"><strong>
                                                                                                                    Viabilidade
                                                                                                                    no
                                                                                                                    PNAE
                                                                                                                </strong>
                                                                                                                <br><small
                                                                                                                    class="text-danger">
                                                                                                                    Pontuação
                                                                                                                    máxima
                                                                                                                    3
                                                                                                                    Pontos
                                                                                                                </small>
                                                                                                            </label>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                {!! Form::number('nota_drenutricao1', null, [
                                                                                                                    'placeholder' => 'Insira a nota',
                                                                                                                    'class' => 'form-control',
                                                                                                                    'max="3"',
                                                                                                                ]) !!}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-md-6 col-6">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <label
                                                                                                                for="email-id-column"><strong>Valorização
                                                                                                                    dos
                                                                                                                    hábitos
                                                                                                                    alimentares
                                                                                                                    locais
                                                                                                                </strong>
                                                                                                                <br><small
                                                                                                                    class="text-danger">
                                                                                                                    Pontuação
                                                                                                                    máxima:
                                                                                                                    4
                                                                                                                    Pontos
                                                                                                                </small></label>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                {!! Form::number('nota_drenutricao2', null, [
                                                                                                                    'placeholder' => 'Insira a nota',
                                                                                                                    'class' => 'form-control',
                                                                                                                    'max="4"',
                                                                                                                ]) !!}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-md-6 col-6">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <label
                                                                                                                for="email-id-column"><strong>
                                                                                                                    Alimentos
                                                                                                                    da
                                                                                                                    Agricultura
                                                                                                                    Familiar
                                                                                                                </strong>
                                                                                                                <br><small
                                                                                                                    class="text-danger">(Até
                                                                                                                    3
                                                                                                                    itens)
                                                                                                                    -
                                                                                                                    Pontuação:
                                                                                                                    3
                                                                                                                    Pontos
                                                                                                                </small></label>
                                                                                                            </label>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                {!! Form::number('nota_drenutricao3', null, [
                                                                                                                    'placeholder' => 'Insira a nota',
                                                                                                                    'class' => 'form-control',
                                                                                                                    'max="3"',
                                                                                                                ]) !!}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-md-6 col-6">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <label
                                                                                                                for="email-id-column"><strong>
                                                                                                                    Alimentos
                                                                                                                    da
                                                                                                                    Agricultura
                                                                                                                    Familiar
                                                                                                                </strong>
                                                                                                                <br><small
                                                                                                                    class="text-danger">(Acima
                                                                                                                    de
                                                                                                                    3
                                                                                                                    itens)
                                                                                                                    -
                                                                                                                    Pontuação:
                                                                                                                    5
                                                                                                                    Pontos
                                                                                                                </small></label>
                                                                                                            </label>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                {!! Form::number('nota_drenutricao4', null, [
                                                                                                                    'placeholder' => 'Insira a nota',
                                                                                                                    'class' => 'form-control',
                                                                                                                    'max="5"',
                                                                                                                ]) !!}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-md-6 col-6">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <label
                                                                                                                for="email-id-column"><strong>
                                                                                                                    Criatividade
                                                                                                                    (inovação
                                                                                                                    e
                                                                                                                    originalidade)
                                                                                                                </strong>
                                                                                                                <br>
                                                                                                                <small
                                                                                                                    class="text-danger">Pontuação
                                                                                                                    máxima:
                                                                                                                    5
                                                                                                                    Pontos
                                                                                                                </small></label>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                {!! Form::number('nota_drenutricao5', null, [
                                                                                                                    'placeholder' => 'Insira a nota',
                                                                                                                    'class' => 'form-control',
                                                                                                                    'max="5"',
                                                                                                                ]) !!}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-md-12 col-12">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <br>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                <button
                                                                                                                    type="submit"
                                                                                                                    class="btn btn-primary white">
                                                                                                                    Salvar</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane" id="list-dre1"
                                                                            role="tabpanel"
                                                                            aria-labelledby="list-settings-dre1">
                                                                            <div class="row">
                                                                                <div class="col-xl-12 col-sm-12 col-12">
                                                                                    <div
                                                                                        class="card text-center bg-lighten-2">
                                                                                        <div class="card-content d-flex">
                                                                                            <div class="card-body">
                                                                                                <img src="https://www.onlyoffice.com/blog/wp-content/uploads/2022/09/Blog_fillable_form_in_PDF.jpg"
                                                                                                    alt=""
                                                                                                    height="100"
                                                                                                    class="mb-1">
                                                                                                <div class="alert alert-primary"
                                                                                                    role="alert">
                                                                                                    <h4
                                                                                                        class="alert-heading">
                                                                                                        Avaliação
                                                                                                        DRE
                                                                                                    </h4>
                                                                                                    <p> Os campos de
                                                                                                        notas
                                                                                                        abaixo são
                                                                                                        para o
                                                                                                        uso
                                                                                                        exclusivo da
                                                                                                        DRE
                                                                                                    </p>
                                                                                                    <hr>
                                                                                                    <p class="mb-0">
                                                                                                    </p>
                                                                                                </div>

                                                                                                <div class="row">
                                                                                                    <div
                                                                                                        class="col-md-6 col-8">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <label
                                                                                                                for="email-id-column"><strong>
                                                                                                                    Viabilidade
                                                                                                                    no
                                                                                                                    PNAE
                                                                                                                </strong>
                                                                                                                <br><small
                                                                                                                    class="text-danger">
                                                                                                                    Pontuação
                                                                                                                    máxima
                                                                                                                    3
                                                                                                                    Pontos
                                                                                                                </small>
                                                                                                            </label>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                {!! Form::number('nota_dre1', null, ['placeholder' => 'Insira a nota', 'class' => 'form-control', 'max="3"']) !!}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-md-6 col-6">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <label
                                                                                                                for="email-id-column"><strong>Valorização
                                                                                                                    dos
                                                                                                                    hábitos
                                                                                                                    alimentares
                                                                                                                    locais
                                                                                                                </strong>
                                                                                                                <br><small
                                                                                                                    class="text-danger">
                                                                                                                    Pontuação
                                                                                                                    máxima:
                                                                                                                    4
                                                                                                                    Pontos
                                                                                                                </small></label>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                {!! Form::number('nota_dre2', null, ['placeholder' => 'Insira a nota', 'class' => 'form-control', 'max="4"']) !!}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-md-6 col-6">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <label
                                                                                                                for="email-id-column"><strong>
                                                                                                                    Alimentos
                                                                                                                    da
                                                                                                                    Agricultura
                                                                                                                    Familiar
                                                                                                                </strong>
                                                                                                                <br><small
                                                                                                                    class="text-danger">(Até
                                                                                                                    3
                                                                                                                    itens)
                                                                                                                    -
                                                                                                                    Pontuação
                                                                                                                    :
                                                                                                                    3
                                                                                                                    Pontos
                                                                                                                </small></label>
                                                                                                            </label>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                {!! Form::number('nota_dre3', null, ['placeholder' => 'Insira a nota', 'class' => 'form-control', 'max="3"']) !!}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-md-6 col-6">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <label
                                                                                                                for="email-id-column"><strong>
                                                                                                                    Alimentos
                                                                                                                    da
                                                                                                                    Agricultura
                                                                                                                    Familiar
                                                                                                                </strong>
                                                                                                                <br><small
                                                                                                                    class="text-danger">(Acima
                                                                                                                    de
                                                                                                                    3
                                                                                                                    itens)
                                                                                                                    -
                                                                                                                    Pontuação
                                                                                                                    :
                                                                                                                    5
                                                                                                                    Pontos
                                                                                                                </small></label>
                                                                                                            </label>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                {!! Form::number('nota_dre4', null, ['placeholder' => 'Insira a nota', 'class' => 'form-control', 'max="5"']) !!}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div
                                                                                                        class="col-md-6 col-6">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <label
                                                                                                                for="email-id-column"><strong>
                                                                                                                    Criatividades
                                                                                                                    (inovação
                                                                                                                    e
                                                                                                                    originalidade)
                                                                                                                </strong>
                                                                                                                <br>
                                                                                                                <small
                                                                                                                    class="text-danger">Pontuação
                                                                                                                    máxima:
                                                                                                                    5
                                                                                                                    Pontos
                                                                                                                </small></label>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                {!! Form::number('nota_dre5', null, ['placeholder' => 'Insira a nota', 'class' => 'form-control', 'max="5"']) !!}
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-md-12 col-12">
                                                                                                        <div
                                                                                                            class="form-group has-icon-left">
                                                                                                            <br>
                                                                                                            <div
                                                                                                                class="position-relative">
                                                                                                                <button
                                                                                                                    type="submit"
                                                                                                                    class="btn btn-primary white">
                                                                                                                    Salvar</button>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
 --}}


                                                                {{-- 
                    <div class="tab-pane" id="list-dre2" role="tabpanel"
                    aria-labelledby="list-settings-dre2">
                    <div class="row">
                    <div class="col-xl-12 col-sm-12 col-12">
                        <div class="card text-center bg-lighten-2">
                            <div class="card-content d-flex">
                                <div class="card-body">
                                    <img src="https://www.onlyoffice.com/blog/wp-content/uploads/2022/09/Blog_fillable_form_in_PDF.jpg" alt="" height="100"
                                        class="mb-1">
                                        <div class="alert alert-primary" role="alert">
                                          <h4 class="alert-heading">Avaliação Diretor - DRE </h4>
                                          <p> Os campos de notas abaixo são para o uso exclusivo da  Nutricionista DRE </p>                                                                                  <hr>
                                          <p class="mb-0"></p>
                                        </div>
                               
                                    <div class="row">
                                    <div class="col-md-6 col-8">
                                      <div class="form-group has-icon-left">
                                          <label for="email-id-column"><strong> Viabilidade no PNAE </strong>
                                             <br><small class="text-danger"> Pontuação máxima de 3 Pontos </small> </label>
                                          <div class="position-relative">
                                            {!! Form::number('nota_dre1', null, array('placeholder' => 'Insira a nota','class' => 'form-control', 'max="3"' )) !!}            
                                      </div>
                                  </div>
                                  </div>
                                    <div class="col-md-6 col-6">
                                      <div class="form-group has-icon-left">
                                          <label for="email-id-column"><strong>Valorização dos hábitos alimentares locais </strong>
                                              <br><small class="text-danger"> Pontuação máxima: 4 Pontos </small></label>
                                          <div class="position-relative">
                                            {!! Form::number('nota_dre2', null, array('placeholder' => 'Insira a nota','class' => 'form-control','max="4"')) !!}            
                                      </div>
                                  </div>
                                  </div>
                                    <div class="col-md-6 col-6">
                                      <div class="form-group has-icon-left">
                                          <label for="email-id-column"><strong> Alimentos da Agricultura Familiar </strong>
                                            <br><small class="text-danger">(Até 3 itens) - Pontuação: 3 Pontos </small></label>
                                          </label>
                                          <div class="position-relative">
                                            {!! Form::number('nota_dre3', null, array('placeholder' => 'Insira a nota','class' => 'form-control','max="3"')) !!}            
                                      </div>
                                  </div>
                                  </div>
                                    <div class="col-md-6 col-6">
                                      <div class="form-group has-icon-left">
                                          <label for="email-id-column"><strong> Alimentos da Agricultura Familiar </strong>
                                          <br><small class="text-danger">(Acima de 3 itens) - Pontuação máxima: 5 Pontos </small></label>
                                        </label>
                                          <div class="position-relative">
                                            {!! Form::number('nota_dre4', null, array('placeholder' => 'Insira a nota','class' => 'form-control', 'max="5"')) !!}            
                                      </div>
                                  </div>
                                  </div>
                                          <div class="col-md-6 col-6">
                                      <div class="form-group has-icon-left">
                                          <label for="email-id-column"><strong> Criatividade (inovação e originalidade) </strong>
                                            <br> <small class="text-danger">Pontuação máxima: 5 Pontos </small></label>
                                          <div class="position-relative">
                                            {!! Form::number('nota_dre5', null, array('placeholder' => 'Insira a nota','class' => 'form-control', 'max="5"')) !!}            
                                      </div>
                                  </div>
                                  </div>
                                          <div class="col-md-12 col-12">
                                      <div class="form-group has-icon-left">
                                         <br>
                                          <div class="position-relative">
                                            <button type="submit" class="btn btn-primary white"> Salvar</button>
                                          </div>
                                  </div>
                                  </div>
                                    </div> --}}


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
