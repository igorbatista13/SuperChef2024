<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;
    protected $table = 'documentos';
    protected $fillable = [
        'Nome_doc1',  'Anexo1',
        'Nome_doc2',  'Anexo2',
        'Nome_doc3',  'Anexo3',
        'Nome_doc4',  'Anexo4',
        'Nome_doc5',  'Anexo5',
        'Nome_doc6',  'Anexo6',
        'Nome_doc7',  'Anexo7',
        'Nome_doc8',  'Anexo8',
        'Nome_doc9',  'Anexo9',
        'Nome_doc10', 'Anexo10',
        'PopUp',
        
     ];
}

