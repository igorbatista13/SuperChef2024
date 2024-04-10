<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Documentos;

class DocumentosController extends Controller
{
    public function index(request $request)
    {

        $documentos = Documentos::all();

        return view('documentos.index', compact('documentos'));
    }

    public function store(request $request)
    {

        //Documentos::create($request->all());
        $documentos =  new Documentos();

        $documentos->Nome_doc1 = $request->Nome_doc1;
        // $documentos -> Anexo1    = $request->Anexo1;

        // Imagem do produto upload
        if ($request->hasFile('Anexo1') && $request->file('Anexo1')->isValid()) {

            $requestImage = $request->Anexo1;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->Anexo1->move(public_path('/images/documentos'), $imageName);

            $documentos->Anexo1 = $imageName;
        }
        $documentos->save();

        return redirect()->route('documentos.index')
            ->with('success', 'Documento inserido com sucesso!');
    }

    public function update(Request $request, Documentos $documento)
    {

        $documento->Nome_doc1 = $request->Nome_doc1;

        if ($request->hasFile('Anexo1')) {

            $requestImage = $request->Anexo1;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->Anexo1->move(public_path('/images/documentos'), $imageName);

            $documento->Anexo1 = $imageName;
        }
   //     dd($documento);

   
        $documento->update();

        return redirect('/documentos')->with('edit', 'Documento editado com sucesso!');
    }
    public function edit(Documentos $documentos, $id)
    {

        $documentos::get($id);
    }

    public function destroy(Documentos $documento)
    {

        $documento->delete();

        return redirect()->route('documentos.index')
            ->with('delete', 'Produto deletado com sucesso!');
    }
}
