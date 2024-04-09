<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>SEDUC MT - Formulário - MasterChef </title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/0.6.0/modern-normalize.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css'>
    <link rel="stylesheet" href="{{ asset('/css/upload_image/style.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/formulario/style-formulario.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/formulario/style-checkbox.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- Inclua os arquivos JavaScript e CSS do SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
</head>
</head>

<style>
    .showcase-area {
        height: 45vh;
        background: linear-gradient(rgba(240, 240, 240, 0),
                rgba(255, 255, 255, 0.055)),
            url("{{ asset('/images/logo_seduc_chef_grande.jpg') }}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin-top: 5px;
        border-radius: 20px
    }

    .showcase-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        font-size: 1.6rem;
    }
</style>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">

        @if (session('success'))
            <script>
                swal({
                    title: "Obrigado!",
                    text: "{{ session('success') }}",
                    icon: "success",
                });
            </script>
        @endif

        <section class="showcase-area" id="showcase">
            <div class="showcase-container">

               
            </div>
        </section>
        <div class="login-container">
            <center>
                <div class=" alert-primary">
                    <h2 class="alert-heading"><br> Formulário Competição <b> SuperChef da Educação</b> SEDUC - MT </h2>
                    <br>
                    <h3>
                    </h3>

                    <div class="alert alert-primary" role="alert">
                        <h3 class="alert-heading"> DADOS PESSOAIS
                            {!! Form::open([
                                'route' => 'Site.store_formulario',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                                'id' => 'myForm',
                            ]) !!}
                            </h4> <BR>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="input-field b-cat b-cat-img" id="Nome"
                                        name="Nome" placeholder="Digite o seu Nome Completo" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="tel" class="input-field b-cat b-cat-img" id="telefone"
                                        name="Telefone" placeholder="Insira o seu telefone com o DDD" required>

                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="input-field b-cat b-cat-img" id="cpf"
                                        name="cpf" placeholder="Digite o seu CPF" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="email" class="input-field b-cat b-cat-img" id="Email"
                                        name="Email" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="cidade_id" id="cidade_id" class="input-field b-cat b-cat-img"
                                        required>
                                        <option value="" enable> Selecione a sua Cidade</option>
                                        @foreach ($cidade as $cidades)
                                            <option value="{{ $cidades->id }}">{{ $cidades->Nome }} </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <hr>
                            <h3 class="alert-heading">SELECIONE A SUA <B>DRE </B> E <B> ESCOLA </B></h2>

                                <div class="form-group col-md-6">
                                    <select name="dre_id" id="dre_id" class="input-field b-cat b-cat-img" required>
                                        <option value="" enable> Selecione a sua DRE</option>
                                        @foreach ($dre as $dres)
                                            <option value="{{ $dres->id }}">{{ $dres->Nome }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <select name="escola_id" id="escola_id" class="input-field b-cat b-cat-img"
                                        required>
                                        <option value="" enable> Selecione a sua Escola</option>
                                        @foreach ($escola as $escolas)
                                            <option value="{{ $escolas->id }}">{{ $escolas->EscolaNome }} </option>
                                        @endforeach
                                    </select>

                                </div>
                    </div>
                </div>

                <div class="alert alert-warning" role="alert">
                    <h3 class="alert-heading">Qual o nome da sua receita?</h3>
                    <div class="form-group">
                        <input type="text" class="input-field b-cat b-cat-js" id="Nome_Prato" name="Nome_Prato"
                            placeholder="Nome da Receita" required>
                    </div>
                </div>


                <div class="alert alert-warning" role="alert">
                    <h3 class="alert-heading">Adicione os ingredientes da sua receita</h4>
                        <hr>
                        <div class="form-group">

                            <div class="col-lg-9 mt-lg-0 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="font-weight-bolder">Digite o nome do ingrediente</h3>
                                        <div class="row">
                                            <div class="card-body">
                                                <input type="hidden" id="alunoId" name="products[]" value="">
                                                <input type="hidden" id="quantidade" name="quantities[]"
                                                    value="">
                                                <input type="hidden" id="unidade" name="units[]" value="">

                                                <input type="text" id="termoAluno" class="form-control"
                                                    placeholder="Digite o nome">
                                                <div id="resultado"></div>

                                                <div id="lista-produtos">
                                                    <br>
                                                    <h5> Itens adicionadas a sua Cesta: </h5>
                                                    <!-- Itens adicionados dinamicamente aparecerão aqui -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                </div>

                <div class="alert alert-success" role="alert">
                    <h3 class="alert-heading">Não encontrou o seu ingrediente?</h4>
                        <p class="mb-0"> <b> Caso não ecnontre o ingrediente na lista acima, registre o aqui. </b>
                        </p>
                        <div class="form-group">
                            <input type="text" class="input-field" id="Outros_ingredientes"
                                name="Outros_ingredientes" placeholder="Outros Ingredientes">
                        </div>
                        <hr>
                        <p class="mb-0">
                        <div class="form-group">
                            <h4 class="alert-heading">Escreva a forma de preparo da sua receita</h4>
                            <b> Seja detalhista na forma de preparo. Não esqueça de informar todos os procedimentos e
                                passo a passo. </b></p>

                            <textarea class="input-field" id="Preparo" name="Preparo" rows="10" cols="30"
                                placeholder="Descreva a forma de preparo" required> </textarea>
                            <input type="hidden" name="voto" id="voto" value="0" required />
                        </div>
                </div>

                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Envie a Foto do seu prato</h4>
                    <div class="upload">
                        <input type="file" title="" id="image" name="image" class="drop-here"
                            accept="image/jpeg,image/png,image/gif" required>
                        <div class="text text-drop">Imagem</div>
                        <div class="text text-upload">Enviando</div>
                        <svg class="progress-wrapper" width="300" height="300">
                            <circle class="progress" r="115" cx="150" cy="150"></circle>
                        </svg>
                        <svg class="check-wrapper" width="130" height="130">
                            <polyline class="check" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                        </svg>
                        <div class="shadow"></div>
                    </div>
                    <hr>
                    <p class="mb-0"></p>
                </div>




                <center>
                    <div class="checkbox-group">
                        <div>
                            <input
                              class="form"
                              type="checkbox"
                              id=""
                              name="checkbox"
                              value="1" required />
                            <label for="subscribeNews"> <strong> Autorizo o uso dos meus dados para a efetuar a inscrição </strong> </label>
                          </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                        </div>
                    </div>


                    <center>
                        <p>Desenvolvido pela <span class='text-danger'><i data-feather="heart"></i></span> <a
                                href="https://www3.seduc.mt.gov.br" target="_blank"> <b> SEDUC - TI </b> </a></p>
                        <script>
                            $(document).ready(function() {
                                $('.input-field2').on('input change', function() {
                                    const checkbox = $(this).closest('.checkbox').find('.checkbox-input');

                                    if ($(this).attr('id') === 'quantidade') {
                                        checkbox.prop('checked', $(this).val() > 0);
                                    } else if ($(this).attr('id') === 'units') {
                                        checkbox.prop('checked', $(this).val() !== 'Unidade');
                                    }
                                });
                            });
                        </script>
                        {{-- <script>
                                    document.addEventListener("DOMContentLoaded", function () {
                                        const inputElement = document.getElementById("image");
                                        inputElement.addEventListener("change", function () {
                                            const file = inputElement.files[0];
                                            const validMimeTypes = ["image/jpeg", "image/png", "image/gif"];
                                
                                            if (!file || !validMimeTypes.includes(file.type)) {
                                                alert("Apenas imagens nos formatos JPG, PNG, GIF são aceitas.");
                                                inputElement.value = ""; // Limpar o campo do arquivo para evitar envios inválidos
                                            }
                                        });
                                    });
                                </script> --}}

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const inputElement = document.getElementById("image");
                                inputElement.addEventListener("change", function() {
                                    const file = inputElement.files[0];
                                    const validMimeTypes = ["image/jpeg", "image/png", "image/gif"];

                                    if (!file || !validMimeTypes.includes(file.type)) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Erro!',
                                            text: 'O arquivo selecionado por você não é uma imagem. Tente novamente!',
                                            confirmButtonColor: '#d33',
                                        });
                                        inputElement.value = ""; // Limpar o campo do arquivo para evitar envios inválidos
                                    }
                                });
                            });
                        </script>

                        <script>
                            $("#telefone").mask("(99) 99999-9999");

                            $("#cep").mask("99999-999");

                            $("#cpf").mask("999.999.999-99");

                            $("#cnpj").mask("99.999.999/9999-99");

                            $("#data").mask("99/99/9999");
                        </script>
                        {{-- <script>
                            // Aguarde o carregamento do documento
                            document.addEventListener('DOMContentLoaded', function() {
                                // Obtenha o formulário pelo ID ou por um seletor
                                const form = document.getElementById('myForm'); // Substitua "myForm" pelo ID do seu formulário

                                // Adicione um listener para o evento de envio do formulário
                                form.addEventListener('submit', function(event) {
                                    event.preventDefault(); // Impede o envio normal do formulário

                                    // Exiba o SweetAlert
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Obrigado!',
                                        text: 'Mensagem de agradecimento',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        // Redirecione ou execute outras ações após o usuário clicar em OK
                                        // Por exemplo, redirecionar para uma página de agradecimento
                                        if (result.isConfirmed) {
                                            window.location.href = 'pagina-de-agradecimento.html';
                                        }
                                    });
                                });
                            });
                        </script> --}}

                        <!-- partial -->



                        <script src="{{ asset('/js/upload_image/script.js') }}"></script>



                        <script>
                            $(document).ready(function() {
                                $('#termoAluno').on('input', function() {
                                    var termoAluno = $(this).val();
                                    if (termoAluno.length >= 3) {
                                        buscarAlunos(termoAluno);
                                    } else {
                                        $('#resultado').empty();
                                    }
                                });

                                $(document).on('click', '.adicionar-aluno', function() {
                                    var alunoId = $(this).data('id');
                                    var alunoNome = $(this).data('Nome');
                                    var alunoImage = $(this).data('image');
                                    var quantidade = $(this).closest('.card').find('.quantidadeInput').val();
                                    var unidade = $(this).closest('.card').find('.input-field2').val();

                                    // Obter a quantidade do produto do campo de entrada
                                    var quantidade = parseInt($('#quantidadeInput').val());

                                    // Obter a unidade selecionada
                                    var unidade = $('#units').val();

                                    var aluno = {
                                        id: alunoId,
                                        nome: alunoNome,
                                        image: alunoImage,
                                        unidade: unidade // Adicionado para capturar a unidade

                                    };

                                    adicionarAoCarrinhoAluno(aluno, quantidade, unidade);
                                });

                                function adicionarProdutoLista(alunoId, nomeCompleto, quantidade, unidade, imagem) {
                                    var itemHtml = '<tr class="produto-item">';
                                    itemHtml +=
                                        '<td style="border: 1px solid #ccc; padding: 10px;"><img class="border-radius-lg" width="50px" alt="Image placeholder" src="/images/ingredientes/' +
                                        imagem + '"></td>';
                                    itemHtml += '<td style="border: 1px solid #ccc; padding: 10px;"><b>' + nomeCompleto + ' </b></td>';
                                    itemHtml += '<td style="border: 1px solid #ccc; padding: 10px;"><b> Quantidade: </b> ' +
                                        quantidade +
                                        '</td>';
                                    itemHtml += '<td style="border: 1px solid #ccc; padding: 10px;"><b> Unidade de medida: </b> ' +
                                        unidade + '</td>';
                                    itemHtml +=
                                        '<td style="border: 1px solid #ccc; padding: 10px;"><button class="btn btn-danger btn-remover" data-id="' +
                                        alunoId + '">Remover</button></td>';
                                    itemHtml += '</tr>';

                                    $('#lista-produtos').append(itemHtml);
                                }

                                // Evento para adicionar produtos ao clicar no botão "Adicionar"
                                $(document).on('click', '.adicionar-aluno', function() {
                                    var alunoId = $(this).data('id');
                                    var nomeCompleto = $(this).data('nome_completo');
                                    var imagem = $(this).data('image');
                                    var quantidade = $('#quantidadeInput_' + alunoId).val();
                                    var unidade = $('#units_' + alunoId).val();

                                    adicionarProdutoLista(alunoId, nomeCompleto, quantidade, unidade, imagem);

                                    // Evento para remover produtos da lista
                                    $(document).on('click', '.btn-remover', function() {
                                        $(this).closest('.produto-item').remove();
                                    });

                                });

                                function buscarAlunos(termoAluno) {
                                    $.ajax({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        url: '/buscar-produtos',
                                        type: 'GET',
                                        data: {
                                            termoAluno: termoAluno
                                        },
                                        success: function(alunos) {
                                            $('#resultado').empty();
                                            alunos.forEach(function(aluno) {
                                                var resultadoHtml = '';
                                                resultadoHtml += '<div class="row mt-2">';
                                                resultadoHtml += '<div class="col-lg-12 col-md-6 mb-4 mb-lg-0">';
                                                resultadoHtml += '<div class="card h-100 ">';
                                                resultadoHtml += '<div class="card-header">';
                                                resultadoHtml +=
                                                    '<h5 class="mb-0 ">Produtos encontrado:</h5>';
                                                resultadoHtml += '</div>';
                                                resultadoHtml += '<div class="card-body pt-2">';
                                                resultadoHtml += '<ul class="list-group list-group-flush">';
                                                resultadoHtml += '<li class="list-group-item px-5">';
                                                resultadoHtml += '<div class="row align-items-center">';
                                                resultadoHtml += '<div class="col-auto d-flex align-items-center">';
                                                resultadoHtml +=
                                                    '<img class="border-radius-lg" width="70px" alt="Image placeholder" src="{{ asset('images/ingredientes//') }}/' +
                                                    aluno.image + ' "">';
                                                resultadoHtml += '<h4 class="mb-0">' + aluno.Nome + '<h4>';
                                                resultadoHtml += '</div>';
                                                resultadoHtml += '<div class="col ml-2">';
                                                resultadoHtml += '<div class="col-auto">';
                                                resultadoHtml += '<h6 class="mb-0"> Digite a Quantidade: <h6>';

                                                resultadoHtml +=
                                                    '<input type="number" class="form-control quantidadeInput" id="quantidadeInput_' +
                                                    aluno.id + '" name="quantidade_' + aluno.id +
                                                    '" placeholder="Quantidade" min="1">';


                                                resultadoHtml +=
                                                    '<h6 class="mb-0"> Selecione a Unidade de medida: <h6>';

                                                resultadoHtml += '<select name="units[' + aluno.id +
                                                    ']" class="input-field2 form-control text-dark" id="units_' +
                                                    aluno.id +
                                                    '">';
                                                resultadoHtml += '<option value="Unidade">Unidade</option>';
                                                resultadoHtml += '<option value="Litro">Litro</option>';
                                                resultadoHtml += '<option value="Mililitro">Mililitro</option>';
                                                resultadoHtml +=
                                                    '<option value="Quilo Grama - Kg">Quilo Grama - Kg</option>';
                                                resultadoHtml += '<option value="Grama">Grama</option>';
                                                resultadoHtml +=
                                                    '<option value="Xícara de Chá">Xícara de Chá</option>';
                                                resultadoHtml +=
                                                    '<option value="Copo Americano">Copo Americano</option>';
                                                resultadoHtml +=
                                                    '<option value="Colher de café">Colher de café</option>';
                                                resultadoHtml +=
                                                    '<option value="Colher de chá">Colher de chá</option>';
                                                resultadoHtml +=
                                                    '<option value="Colher de sopa">Colher de sopa</option>';
                                                resultadoHtml += '</select>';
                                                resultadoHtml += '</div>';
                                                resultadoHtml += '</div>';

                                                resultadoHtml +=
                                                    '<button type="button" id="adicionarProduto" class="btn btn-outline-success btn-xs mb-0 adicionar-aluno" data-id="' +
                                                    aluno.id + '" data-nome_completo="' + aluno.Nome +
                                                    '" data-image="' + aluno.image + '">Adicionar</button>';
                                                resultadoHtml += '</div>';
                                                resultadoHtml += '</div>';
                                                resultadoHtml += '</li>';
                                                resultadoHtml += '</ul>';
                                                resultadoHtml += '</div>';
                                                resultadoHtml += '</div>';
                                                resultadoHtml += '</div>';
                                                resultadoHtml += '</div>';

                                                $('#resultado').append(resultadoHtml);
                                            });
                                        },
                                        error: function(xhr, status, error) {
                                            console.error('Erro ao buscar produtos:', error);
                                        }
                                    });
                                }

                                $(document).on('click', '.adicionar-aluno', function() {
                                    var alunoId = $(this).data('id');
                                    var alunoNome = $(this).data('nome_completo');
                                    var alunoImage = $(this).data('image');
                                    var quantidade = $('#quantidadeInput_' + alunoId).val();
                                    var unidade = $('#units_' + alunoId).val();

                                    var aluno = {
                                        id: alunoId,
                                        nome: alunoNome,
                                        image: alunoImage,
                                        unidade: unidade
                                    };

                                    adicionarAoCarrinhoAluno(aluno, quantidade, unidade, image);
                                });

                                function adicionarAoCarrinhoAluno(aluno, quantidade, unidade) {
                                    var alunoJson = JSON.stringify(aluno);
                                    //       console.log(alunoJson);

                                    $('#alunoId').val(aluno.id);
                                    $('#quantidade').val(quantidade);
                                    $('#unidade').val(unidade);

                                    console.log(aluno.id);
                                    console.log(quantidade);
                                    console.log(unidade);
                                }

                                // Adicionar evento ao botão "Adicionar Produto"
                                $(document).on('click', '.adicionar-aluno', function() {

                                    //   $('#adicionarProduto').click(function() {
                                    var produtoId = $('#alunoId').val();
                                    var quantidade = $('#quantidade').val();
                                    var unidade = $('#unidade').val();

                                    // Verificar se o produto selecionado possui ID
                                    if (produtoId) {
                                        // Adicionar os dados do produto ao formulário
                                        $('<input>').attr({
                                            type: 'hidden',
                                            name: 'products[]',
                                            value: produtoId
                                        }).appendTo('form');

                                        $('<input>').attr({
                                            type: 'hidden',
                                            name: 'quantities[]',
                                            value: quantidade
                                        }).appendTo('form');

                                        $('<input>').attr({
                                            type: 'hidden',
                                            name: 'units[]',
                                            value: unidade
                                        }).appendTo('form');

                                        // Limpar os campos após adicionar o produto
                                        $('#alunoId').val('');
                                        $('#quantidade').val('');
                                        $('#unidade').val('');

                                        // Limpar o resultado da busca
                                        $('#resultado').empty();
                                    } else {
                                        alert('Por favor, selecione um produto antes de adicionar.');
                                    }
                                });



                            });
                        </script>

                        
<script>
    function validarCPF(cpf) {
        cpf = cpf.replace(/[^\d]+/g, '');
        if (cpf == '' || cpf.length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;
        var soma = 0;
        for (var i = 0; i < 9; i++) soma += parseInt(cpf.charAt(i)) * (10 - i);
        var resto = 11 - (soma % 11);
        if (resto == 10 || resto == 11) resto = 0;
        if (resto != parseInt(cpf.charAt(9))) return false;
        soma = 0;
        for (var i = 0; i < 10; i++) soma += parseInt(cpf.charAt(i)) * (11 - i);
        resto = 11 - (soma % 11);
        if (resto == 10 || resto == 11) resto = 0;
        if (resto != parseInt(cpf.charAt(10))) return false;
        return true;
    }

    $(document).ready(function() {
        $('#cpf').on('blur', function() {
            var cpf = $(this).val();
            if (!validarCPF(cpf)) {
                alert('Favor corrigir o seu CPF.');
                $(this).val('');
                $(this).focus();
            }
        });
    });
</script>

</body>

</html>
