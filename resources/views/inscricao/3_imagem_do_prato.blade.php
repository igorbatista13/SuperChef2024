        <div class="tab-pane" id="list-tramitar"
                                                                            role="tabpanel"
                                                                            aria-labelledby="list-settings-list">
                                                                            <div class="row">

                                                                                <div class="col-xl-12 col-sm-12 colF-12">
                                                                                    <div
                                                                                        class="card text-center bg-lighten-2">
                                                                                        <div class="card-content d-flex">
                                                                                            <div class="card-body">
                                                                                                <div class="alert alert-primary"
                                                                                                    role="alert">
                                                                                                    <h4
                                                                                                        class="alert-heading">
                                                                                                        <B> IMAGEM
                                                                                                            DO PRATO
                                                                                                        </B>
                                                                                                    </h4>

                                                                                                    <hr>
                                                                                                    <p class="mb-0">
                                                                                                    </p>
                                                                                                    <img src="{{ asset('/images/inscricao/' . $recibo->image) ?? 'Sem registros' }}"
                                                                                                        width="600px">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="col-md-12 col-12">
                                                                                                    <div
                                                                                                        class="form-group has-icon-left">
                                                                                                        <label
                                                                                                            for="email-id-column"><strong>Atualizar
                                                                                                                imagem

                                                                                                            </strong>
                                                                                                        </label>

                                                                                                        {!! Form::model($recibo, [
                                                                                                            'method' => 'PATCH',
                                                                                                            'route' => ['inscricao_update', $recibo->id],
                                                                                                            'enctype' => 'multipart/form-data',
                                                                                                        ]) !!}

                                                                                                        <div
                                                                                                            class="position-relative">
                                                                                                            {!! Form::file('image', ['class' => 'form-control', 'id' => 'formFile']) !!}
                                                                                                            <button
                                                                                                                type="submit"
                                                                                                                class="btn btn-primary white">
                                                                                                                Salvar</button>
                                                                                                        </div>
                                                                                                        {!! Form::close() !!}

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>