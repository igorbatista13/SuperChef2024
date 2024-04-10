<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Novo Documento</h5>
      
            </div>
            <div class="modal-body">




                <div class="card">
                    <div class="card-header">
                        <div class="card-content">
                            <div class="card-body">
                                {!! Form::open(['route' => 'popup.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="row">
                                    <div class="col-md-4 col-12">

                                        <label for="first-name-column">Nome do PopUp</label>
                                        {!! Form::text('Nome_popup', null, ['placeholder' => 'Nome Documento', 'class' => 'form-control']) !!}

                                        <!-- <input type="text" id="first-name-column" name="name" class="form-control" placeholder="Nome completo"> -->
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="email-id-column">Anexo</label>
                                            <div class="position-relative">

                                                {!! Form::file('Anexo1', ['class' => 'form-control']) !!}



                                            </div>
                                        </div>

                                    </div>

                                    {{-- <div class="col-md-6 col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="email-id-column">Pop UP</label>
                                            <div class="position-relative">

                                                {!! Form::file('PopUp', ['class' => 'form-control']) !!}

                                                <div class="form-control-icon">
                                                    <i data-feather="mail"></i>
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

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary me-1 mb-1">Salvar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
