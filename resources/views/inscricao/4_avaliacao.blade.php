<div class="tab-pane" id="list-seduc" role="tabpanel" aria-labelledby="list-settings-list">
    <div class="row">
        <div class="col-xl-12 col-sm-12 col-12">
            <div class="card text-center bg-lighten-2">
                <div class="card-content d-flex">
                    <div class="card-body">
                        <img src="https://www.onlyoffice.com/blog/wp-content/uploads/2022/09/Blog_fillable_form_in_PDF.jpg"
                            alt="" height="100" class="mb-1">
                        <div class="alert alert-primary" role="alert">
                            <h4 class="alert-heading">
                                <b> AVALIAÇÃO
                                </b>
                            </h4>
                            <p> Os campos de
                                notas
                                abaixo são
                                para o
                                uso
                                exclusivo da
                                Seduc - MT
                            </p>
                            <hr>
                            <p class="mb-0">


                                <button type="button" class="btn btn-success btn-sm mb-2">
                                    ALIMENTOS
                                    IN
                                    NATURA E
                                    MINIMAMENTE
                                    PROCESSADOS
                                    <span
                                        class="badge bg-white text-success">{{ $recibo->produto->where('categoria.Nome', 'ALIMENTOS IN NATURA E MINIMAMENTE PROCESSADOS')->count() }}

                                    </span>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm mb-2">
                                    INGREDIENTES
                                    CULINÁRIOS
                                    <span
                                        class="badge bg-white text-primary">{{ $recibo->produto->where('categoria.Nome', 'INGREDIENTES CULINÁRIOS')->count() }}
                                    </span>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm mb-2">
                                    ALIMENTOS
                                    PROCESSADOS
                                    <span class="badge bg-white text-warning">
                                        {{ $recibo->produto->where('categoria.Nome', 'ALIMENTOS PROCESSADOS')->count() }}
                                    </span>
                                </button>
                                <button type="button" class="btn btn-secondary btn-sm mb-2">
                                    ALIMENTOS
                                    ULTRAPROCESSADOS
                                    <span class="badge bg-white text-secondary">
                                        {{ $recibo->produto->where('categoria.Nome', 'ALIMENTOS ULTRAPROCESSADOS')->count() }}

                                    </span>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm mb-2">
                                    ALIMENTOS
                                    PROIBIDOS
                                    <span
                                        class="badge bg-white text-danger">{{ $recibo->produto->where('categoria.Nome', 'ALIMENTOS PROIBIDOS')->count() }}
                                    </span>
                                </button>

                            </p>
                        </div>

                        {!! Form::model($recibo, ['method' => 'PATCH', 'route' => ['inscricao_update', $recibo->id]]) !!}

                        <div class="row">
                            <!-- INICIO 1 -->
                            <div class="col-xxl-6 col-xl-6">
                                <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alimentos
                                            in
                                            natura
                                            e
                                            minimamente
                                            processado
                                            <i class="text-danger"> Até 5 itens
                                        </h5>
                                        </i>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="text-danger bi bi-file-text"> Pontuação
                                                    máxima:
                                                    1
                                                    Ponto
                                                </i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 class="text-danger"></h6>
                                                <span class=" small pt-1 fw-bold">
                                                    {!! Form::number('nota_seduc1', null, ['placeholder' => 'Insira a nota', 'class' => 'form-control', 'max="1"']) !!}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM 1 -->

                            <!-- INICIO 2 -->
                            <div class="col-xxl-6 col-xl-6">
                                <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Alimentos
                                            in
                                            natura
                                            e
                                            minimamente
                                            processado
                                            <i class="text-danger"> Acima de 5 itens

                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="text-danger bi bi-file-text"> Pontuação
                                                    máxima:
                                                    2
                                                    Ponto
                                                </i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 class="text-danger"></h6>
                                                <span class=" small pt-1 fw-bold">
                                                    {!! Form::number('nota_seduc2', null, ['placeholder' => 'Insira a nota', 'class' => 'form-control', 'max="2"']) !!}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM 2 -->
                        </div>

                        <div class="row">
                            <!-- INICIO 2 -->
                            <div class="col-xxl-6 col-xl-6">
                                <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Não
                                            utilizar
                                            alimentos
                                            <b> processados </b>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="text-danger bi bi-file-text"> Pontuação
                                                    máxima:
                                                    2
                                                    Ponto
                                                </i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 class="text-danger"></h6>
                                                <span class=" small pt-1 fw-bold">
                                                    {!! Form::number('nota_seduc3', null, ['placeholder' => 'Insira a nota', 'class' => 'form-control', 'max="2"']) !!}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM 3 -->

                            <!-- INICIO 4 -->
                            <div class="col-xxl-6 col-xl-6">
                                <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Não
                                            utilizar
                                            alimentos
                                            <b> ultraprocessados </b>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="text-danger bi bi-file-text"> Pontuação
                                                    máxima:
                                                    3
                                                    Ponto
                                                </i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 class="text-danger"></h6>
                                                <span class=" small pt-1 fw-bold">
                                                    {!! Form::number('nota_seduc4', null, ['placeholder' => 'Insira a nota', 'class' => 'form-control', 'max="3"']) !!}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM 4 -->
                        </div>
                        <hr>

                        <div class="row">
                            <!-- INICIO 5 -->
                            <div class="col-xxl-6 col-xl-6">
                                <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Alimentos da Agricultura Familiar
                                            <i class="text-danger"> Até 3 itens </i>

                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="text-danger bi bi-file-text"> Pontuação máxima: 3 Pontos
                                                </i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 class="text-danger"></h6>
                                                <span class=" small pt-1 fw-bold">
                                                    {!! Form::number('nota_seduc5', null, ['placeholder' => 'Insira a nota', 'class' => 'form-control', 'max="3"']) !!}

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM 5 -->

                            <!-- INICIO 6 -->
                            <div class="col-xxl-6 col-xl-6">
                                <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Alimentos da Agricultura Familiar
                                            <i class="text-danger"> Acima de 3 itens

                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="text-danger bi bi-file-text"> Pontuação: 5 Pontos
                                                </i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 class="text-danger"></h6>
                                                <span class=" small pt-1 fw-bold">
                                                    {!! Form::number('nota_drenutricao1', null, [
                                                        'placeholder' => 'Insira a nota',
                                                        'class' => 'form-control',
                                                        'max="5"',
                                                    ]) !!}

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIM 6 -->

                        <hr>
                        <div class="row">
                            <!-- INICIO 7 -->
                            <div class="col-xxl-6 col-xl-6">
                                <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Criatividade (inovação e originalidade)
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="text-danger bi bi-file-text">
                                                    máxima:
                                                    2
                                                    Pontos
                                                </i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 class="text-danger"></h6>
                                                <span class=" small pt-1 fw-bold">
                                                    {!! Form::number('nota_drenutricao2', null, [
                                                        'placeholder' => 'Insira a nota',
                                                        'class' => 'form-control',
                                                        'max="2"',
                                                    ]) !!}

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM 7 -->


                            <!-- INICIO 7 -->
                            <div class="col-xxl-6 col-xl-6">
                                <div class="card info-card customers-card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Viabilidade no PNAE
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="text-danger bi bi-file-text">
                                                    Pontuação:
                                                    Até 5
                                                    pontos
                                                </i>
                                            </div>
                                            <div class="ps-3">
                                                <h6 class="text-danger"></h6>
                                                <span class=" small pt-1 fw-bold">
                                                    {!! Form::number('nota_drenutricao3', null, [
                                                        'placeholder' => 'Insira a nota',
                                                        'class' => 'form-control',
                                                        'max="5"',
                                                    ]) !!}

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM 7 -->

                        </div>


                        <!-- INICIO 7 -->
                        <div class="col-xxl-12 col-xl-12">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Apresentação do prato finalizado (foto)
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="text-danger bi bi-file-text">
                                                Pontuação:
                                                Até 5
                                                pontos
                                            </i>
                                        </div>
                                        <div class="ps-3">
                                            <h6 class="text-danger"></h6>
                                            <span class=" small pt-1 fw-bold">
                                                {!! Form::number('nota_drenutricao4', null, [
                                                    'placeholder' => 'Insira a nota',
                                                    'class' => 'form-control',
                                                    'max="5"',
                                                ]) !!}

                                            </span>
                                        </div>
                                    </div>
                                    <br>
                                    <img src="{{ asset('/images/inscricao/' . $recibo->image) ?? 'Sem registros' }}"
                                        width="400px">
                                </div>
                            </div>
                        </div>
                        <!-- FIM 7 -->


                        <div class="col-md-12 col-12">
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <BR>
                                    <button type="submit" class="btn btn-primary white">
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
