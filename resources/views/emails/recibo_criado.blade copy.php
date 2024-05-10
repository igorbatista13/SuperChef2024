<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CodePen - Template Email Galo ADS</title>


</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="container"
    style="margin: 0; padding: 15px; font-size: 14px; font-family: system-ui, Arial, sans-serif; color: #444; background-color: #eee">
    <div class="email-wrapper" style="max-width: 600px; margin: 15px auto; background-color: #fff">
      <div class="header" style="width: 100%; background-color: #111">
        <div class="container" style="background-color: #fff; text-align: center">

          <img src="http://superchef.seduc.mt.gov.br/images/Superchef_b.png" style="max-height: 250px;" />

        </div> <!-- container -->
      </div><!-- header -->

      <div class="body" style="padding: 40px">
        <h1 style="color: #333; width: 100%; font-size: 40px; letter-spacing: -1px; margin: 0; text-align:center">
          Inscrição realizada com sucesso!
        </h1>
        <hr style="border:none;border-bottom:1px solid #EAB903;margin: 40px auto;">
        <h2 style="font-size: 24px; font-weight: normal; margin-bottom: 16px">
          Olá <b>{{
            $recibo->Nome ??
            'Sem registros' }}</b>.
        </h2>
        <p style="line-height: 28px;">
          Sua inscrição foi realizada com sucesso! Confira as informações que você preencheu no formulário e caso ocorra divergências,
          refaça a sua inscrição no endereço: <a
            href="http://superchef.seduc.mt.gov.br/site/formulario">http://superchef.seduc.mt.gov.br/site/formulario</a>

        </p>

        <!-- <a href="#LINK-DE-PAGAMENTO" style="font-size:16px;font-weight:bold;color:black;background-color:#FFD500;text-align:center;padding:20px 30px;border-radius:100px;margin:40px auto;text-decoration:none; display:block">REALIZAR PAGAMENTO</a> -->

        <table border="1"
          style="width: 100%; border-collapse: collapse; border-color: #eee; margin-bottom: 30px; border-radius: 8px">
          <thead style="border-color:#EEE; text-align: left; border-radius: 8px 8px 0 0">
            <tr>
              <th
                style="background-color: #EEE; color: #A0A1A2; padding: 16px; font-size: 12px; border-radius:8px 8px 0 0"
                colspan="2">DETALHES</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="padding: 16px 8px 16px 16px; border-right: none;max-width: 140px">
                <img
                  src="https://cdn-icons-png.flaticon.com/512/2620/2620163.png"
                  width="100" style="width: 100px; height; auto;" />
              </td>
              <td style="padding: 16px 16px 16px 8px; border-left:none; width:100%;vertical-align:top">
                <p>
                  <b>N° da Inscrição:</b> 
                    <big>{{ $recibo->id }} </big>
                  
                </p>
                <b>Data da inscrição:</b> {{ $recibo->created_at->format('m/d/Y') ?? 'Não informado' }}<br>
                <!-- <b>Período de veiculação:</b> 01/11/2021 - 01/12/2021 <br>
              <b>Orçamento:</b> R$ 1.000.00 -->
              </td>

            </tr>
            <tr>
              <th style="padding:16px;text-align:right;border-right:none;">Nome:</th>
              <td style="padding:16px;border-left:none">{{ $recibo->Nome ?? 'Sem registros' }}</td>
            </tr>
            <tr>
              <th style="padding:16px;text-align:right;border-right:none">CPF:</th>
              <td style="padding:16px;border-left:none;">{{ $recibo->cpf ?? 'Sem registros' }}
              </td>
            </tr>
            <tr>
              <th style="padding:16px;text-align:right;border-right:none">Telefone:</th>
              <td style="padding:16px;border-left:none;">{{ $recibo->Telefone ?? 'Sem registros' }}
              </td>
            </tr>
            <tr>
              <th style="padding:16px;text-align:right;border-right:none">Munícipio:</th>
              <td style="padding:16px;border-left:none;">{{ $recibo->cidade->Nome ?? 'Sem registros' }}
              </td>
            </tr>
            <tr>
              <th style="padding:16px;text-align:right;border-right:none">DRE:</th>
              <td style="padding:16px;border-left:none;">{{ $recibo->dre->Nome ?? 'Sem registros' }}
              </td>
            </tr>
            <tr>
              <th style="padding:16px;text-align:right;border-right:none">Email:</th>
              <td style="padding:16px;border-left:none;">{{ $recibo->Email ?? 'Sem registros' }}
              </td>
            </tr>
          </tbody>
        </table>

        <h4>
          <b> OUTROS INGREDIENTES: </b>  <br>
        <i>  {{ $recibo->Outros_ingredientes }} </i>
      </h4>
      <hr>

        <h4>
          <b> MODO DE PREPARO: </b>  <br>
        <i>     {!! nl2br(e($recibo->Preparo)) !!} </i>
      </h4>

      <hr>

     
      <h4  style="background-color: #EEE; color: #161718; padding: 16px; font-size: 12px; border-radius:8px 8px 0 0"
      colspan="2">
        <b> INGREDIENTES: </b>  </h4>
      <table>
         <thead>
            <!-- <tr>
               
                <th>Ingredientes </th>
                <th>Unidade </th>
                <th>Quantidade </th>
               
            </tr> -->
        </thead> 

        <tbody>
            <tr>
                @foreach ($recibo->produto as $item)
                  
              
                <b> {{ $item->Nome }} </b>
                {{ $item->pivot['unidade'] }}
                <b> Qtd.:</b> {{ $item->pivot['Quantidade'] }} <hr>
              
                  
                
            
            </tr>
            @endforeach

        </tbody>
    </table>

       
      </div>





      <div class="footer" style="background-color: #02129c; padding: 20px 40px 40px">

        <table style="border:none; width: 100%; font-size:12px; color: #eee">
          <tr>
            <td>
              <img style="width:auto;height:50px" src="https://atletico.com.br/static/media/logo.56f16ab1.svg" alt="">
            </td>
            <td style="text-align:right">
              <img style="width:64px; height:auto"
                src="https://lh6.googleusercontent.com/62CtBY3bGUwacfE4mv9NrrkpP_ixYBhv2rIg2Rx5NEa5ohjv8wVrwpbyAHN1PeZ0KUy7JxokZNP3qI05y5QXObU=w16383"
                alt="">
            </td>
          </tr>
          <tr>
            <td>
             <b>SEDUCMT</b> 2024
            </td>
            <td style="text-align: right">
              Desenvolvido pela equipe de TI <b> SUTI</b>
            </td>
          </tr>
        </table>

        <span>
      </div>
    </div>
  </div>
  <!-- partial -->

</body>

</html>