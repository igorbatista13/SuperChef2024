<button type="button" class="btn btn-danger" data-toggle="modal"
data-target="#Delete{{$popup->id}}">
Deletar
<i class="bi bi-x-square"></i>

</button>


<div class="modal fade" id="Delete{{$popup->id}}" tabindex="-1" role="dialog" aria-labelledby="Delete{{$popup->id}}"
    aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirma a exclusão de Documento?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


      

                <div class="card">
                    <div class="card-header">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">

<h5>Nome do Documento: <b> {{$popup->Nome_popup}} </b> </h5> 

                                    </div>

                   

        
                                </div>
                            </div>
                        

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                          
                {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['popup.destroy', $popup->id],
                    'style' => 'display:inline',
                ]) !!}
                {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}

                {!! Form::close() !!}

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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
