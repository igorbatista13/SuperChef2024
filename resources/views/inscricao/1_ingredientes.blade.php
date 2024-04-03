<div class="col-12 col-sm-12 col-md-8 mt-1">
    <div class="tab-content text-justify" id="nav-tabContent">


        <div class="tab-pane show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">


            <div class="col-xl-12 col-sm-12 colF-12">
                <div class="card text-center bg-lighten-2">
                    <div class="card-content d-flex">
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert">
                                <h4 class="alert-heading">
                                    <B> INGREDIENTES
                                    </B>
                                </h4>

                                <hr>


                                <div class="card-body">
                                    <h5 class="card-title">
                                    </h5>

                                    <button type="button" class="btn btn-success btn-sm mb-2">
                                        ALIMENTOS IN NATURA
                                        E MINIMAMENTE
                                        PROCESSADOS
                                        <span
                                            class="badge bg-white text-success">{{ $recibo->produto->where('categoria.Nome', 'ALIMENTOS IN NATURA E MINIMAMENTE PROCESSADOS')->count() }}

                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm mb-2">
                                        INGREDIENTES
                                        CULINÁRIOS <span
                                            class="badge bg-white text-primary">{{ $recibo->produto->where('categoria.Nome', 'INGREDIENTES CULINÁRIOS')->count() }}
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm mb-2">
                                        ALIMENTOS
                                        PROCESSADOS <span class="badge bg-white text-warning">
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
                                        ALIMENTOS PROIBIDOS
                                        <span
                                            class="badge bg-white text-danger">{{ $recibo->produto->where('categoria.Nome', 'ALIMENTOS PROIBIDOS')->count() }}
                                        </span>
                                    </button>

                                </div>


                                <div class="form-group">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Imagem
                                                </th>
                                                <th>Ingredientes
                                                </th>
                                                <th>Quantidade
                                                </th>
                                                <th>
                                                    <center>
                                                        Unid.
                                                        de
                                                        medida
                                                </th>
                                                <th>
                                                    <center>
                                                        Categoria
                                                        do
                                                        Ingrediente
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                @foreach ($recibo->produto as $item)
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('/images/ingredientes/') }}/{{ $item->image }}"
                                                            width="60px">
                                                    </td>
                                                    <td>{{ $item->Nome }}
                                                    </td>

                                                    <td>{{ $item->pivot['Quantidade'] }}
                                                    </td>
                                                    <td> {{ $item->pivot['unidade'] }}
                                                    </td>
                                                    {{-- @if ($item->categoria->Nome == 'ALIMENTOS PROCESSADOS' or $item->categoria->Nome == 'ALIMENTOS ULTRAPROCESSADOS' or $item->categoria->Nome == 'INGREDIENTES CULINÁRIOS' or $item->categoria->Nome == 'ALIMENTOS PROIBIDOS') --}}

                                                    @if ($item->categoria->Nome == 'ALIMENTOS PROCESSADOS')
                                                        <td> <small class="text-warning">
                                                                <span
                                                                    class="badge bg-warning">{{ $item->categoria->Nome }}</span>
                                                        </td>
                                                    @endif
                                                    @if ($item->categoria->Nome == 'ALIMENTOS ULTRAPROCESSADOS')
                                                        <td> <small class="text-secondary">
                                                                <span
                                                                    class="badge bg-secondary">{{ $item->categoria->Nome }}</span>
                                                        </td>
                                                    @endif

                                                    @if ($item->categoria->Nome == 'INGREDIENTES CULINÁRIOS')
                                                        <td> <small class="text-primary">
                                                                <span
                                                                    class="badge bg-primary">{{ $item->categoria->Nome }}

                                                                </span>
                                                        </td>
                                                    @endif
                                                    @if ($item->categoria->Nome == 'ALIMENTOS PROIBIDOS')
                                                        <td> <small class="text-danger">
                                                                <span
                                                                    class="badge bg-danger">{{ $item->categoria->Nome }}</span>
                                                        </td>
                                                    @endif

                                                    @if ($item->categoria->Nome == 'ALIMENTOS IN NATURA E MINIMAMENTE PROCESSADOS')
                                                        <td> <small class="text-success">
                                                                <span
                                                                    class="badge bg-success">{{ $item->categoria->Nome }}</span>

                                                        </td>
                                                    @endif


                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div class="alert alert-primary" role="alert">
                                        <h4 class="alert-heading">
                                            Outros
                                            ingedientes da
                                            receita: </h4>
                                        <p class="mb-0">
                                            {{ $recibo->Outros_ingredientes }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
