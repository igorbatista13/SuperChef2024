<?php
use Illuminate\Support\Facades\Mail;
use App\Mail\ReciboCriado;


public function mail() {


    $recibo = null; // Aqui você pode passar um objeto recibo se desejar
    $dadosFormulario = [
        'campo1' => 'valor1',
        'campo2' => 'valor2',
        // Adicione outros campos do formulário aqui, se necessário
    ];

    try {
        Mail::to('seu_email_destinatario@example.com')->send(new ReciboCriado($recibo, $dadosFormulario));
        return 'E-mail de teste enviado com sucesso!';
    } catch (\Exception $e) {
        return 'Erro ao enviar o e-mail de teste: ' . $e->getMessage();
    }



}