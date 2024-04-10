<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Popup;

class PopupController extends Controller
{
    public function index(request $request)
    {

        $popups = Popup::all();

        return view('popup.index', compact('popups'));
    }

    public function store(request $request)
    {

        //Documentos::create($request->all());
        $popups =  new Popup();

        $popups->Nome_popup = $request->Nome_popup;
        // $documentos -> Anexo1    = $request->Anexo1;

        // Imagem do produto upload
        if ($request->hasFile('Anexo1') && $request->file('Anexo1')->isValid()) {

            $requestImage = $request->Anexo1;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->Anexo1->move(public_path('/images/documentos'), $imageName);

            $popups->Anexo1 = $imageName;
        }
        $popups->save();

        return redirect()->route('popup.index')
            ->with('success', 'Documento inserido com sucesso!');
    }

    public function update(Request $request, Popup $popup)
    {

        $popup->Nome_popup = $request->Nome_popup;

        if ($request->hasFile('Anexo1')) {

            $requestImage = $request->Anexo1;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->Anexo1->move(public_path('/images/documentos'), $imageName);

            $popup->Anexo1 = $imageName;
        }
   //     dd($documento);

   
        $popup->update();

        return back()->with('edit', 'PopUp editado com sucesso!');
    }


    public function destroy(Popup $popup)
    {

        $popup->delete();

        return redirect()->route('popup.index')
            ->with('delete', 'Produto deletado com sucesso!');
    }
}
