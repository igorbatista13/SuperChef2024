@extends('base.novabase')
@section('content')

<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>


<main id="main" class="main">

  <div class="pagetitle">
    <h1><b>{{$titulo}} </b> </h1>

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
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Localidade</th>
                  <th>Escola</th>
                  <th>Data da insc.</th>
                  <th>Avaliar</th>         
                  <th>Total</th>
                  <th scope="col">Status</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <div class="container">
              
              </div>

                @foreach ($recibo as $key => $recibos)
                


                <tr>
                  <th scope="row">
                    <a href="{{ route('inscricao.edit',$recibos->id) }}"> {{$recibos->id }}
                      <img src="{{ asset('/images/inscricao/' . $recibos->image) ?? 'Sem registros' }}"
                      width="100px">
                    

                    </a>
                  </th>

                  <td>
                  <b> {{$recibos->Nome ?? 'Não informado'}} </b></td>
                  <td> <b>  {{$recibos->cpf ?? 'Não informado'}} </b> </td>
                  <td> {{$recibos->cidade->Nome ?? 'Não informado'}} - {{$recibos->dre->Nome ?? 'Não informado'}} </a></small></td>
                  <td> {{$recibos->escola->EscolaNome ?? 'Não informado'}}  </small></td>

                  <td> {{$recibos->created_at->format("m/d/Y") ?? 'Não informado'}}</td>
                <td> <a button type="button" class="btn btn-outline-success" href="{{ route('inscricao.edit',$recibos->id) }}">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16"> <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/> </svg>
                 Avaliar</a> </td>
        
<?php $totalnotasseduc = $recibos->nota_seduc1 + $recibos->nota_seduc2 + $recibos->nota_seduc3 + $recibos->nota_seduc4 + $recibos->nota_seduc5; ?>
<?php $totalnotasseduc2 = $recibos->nota_drenutricao1 + $recibos->nota_drenutricao2 + $recibos->nota_drenutricao3 + $recibos->nota_drenutricao4 + $recibos->nota_drenutricao5; ?>
{{-- TOTAL --}}

   <?php $total = $totalnotasseduc + $totalnotasseduc2 ?> 

@if ($total  >= 10)
<td>  <center> <h2><span class="badge bg-success">  {{$total ?? 'Nota não informada'}}</span></h2></td>
  @elseif ( $total  < 10)
  <td>  <center> <h2><span class="badge bg-danger">  {{$total ?? 'Nota não informada'}}</span></h2></td>
  @endif
<td>

  @switch($recibos)

  @case($recibos->disp_site == '')
  <div class="dropdown">
   <center>  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
      Qualificar
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <center>   <a class="dropdown-item bg-success " href="{{asset('/inscricao/invoice/disp_site_sim/')}}/{{$recibos->id}}"> <i class="fas fa-check"></i> Sim</a>
    <center>   <a class="dropdown-item bg-danger "  href="{{asset('inscricao/invoice/disp_site_nao')}}/{{$recibos->id}}"> <i class="fa-solid fa-xmark"></i> Não</a> 
    </ul>
  </div>


@break

@case($recibos->disp_site == True)
{{-- <center><h4><span class="badge bg-success"> SIM</span></h4> --}}
  <div class="dropdown">
    <center>  <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-xmark text-light"></i> <small> Desclassificado </small>     </a>
     <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
       <center>   <a class="dropdown-item bg-success text-light" href="{{asset('/inscricao/invoice/disp_site_sim/')}}/{{$recibos->id}}"> <i class="fas fa-check text-light"></i> Qualificado</a>
        <center>   <a class="dropdown-item bg-danger text-light"  href="{{asset('inscricao/invoice/disp_site_nao')}}/{{$recibos->id}}"> <i class="fa-solid fa-xmark text-light"></i> Desclassificar</a> 
     </ul>
   </div>
@break

@case ($recibos->disp_site == False)
{{-- <center><h4><span class="badge bg-danger"> NÃO </span></h4>  --}}
  <div class="dropdown">
    <center>  <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-check text-light"></i> <big>  Qualificado </big>
     </a>
     <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
     <center>   <a class="dropdown-item bg-success text-light" href="{{asset('/inscricao/invoice/disp_site_sim/')}}/{{$recibos->id}}"> <i class="fas fa-check text-light"></i> Qualificado</a>
     <center>   <a class="dropdown-item bg-danger text-light"  href="{{asset('inscricao/invoice/disp_site_nao')}}/{{$recibos->id}}"> <i class="fa-solid fa-xmark text-light"></i> Desclassificar</a> 
     </ul>
   </div>
@endswitch            
</td>

  </td>
<td>
  <a href="{{asset('/inscricao/invoice/')}}/{{$recibos->id}}" button type="button" class="btn btn-outline-secondary" >
   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
     <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
     <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
   </svg>
  
  </button> </a> 
 </td>

</tr>

@endforeach
</tbody>
</table>
            <!-- End Table with stripped rows -->
  </section>
</main>

@endsection