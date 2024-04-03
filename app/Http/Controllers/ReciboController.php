<?php

namespace App\Http\Controllers;

use App\Models\Dre;
use App\Models\Recibo;
use App\Models\Ingredientes;
use App\Models\Escola;
use App\Models\Produto;
use App\Models\Cat_ingredientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


use App\Exports\ReciboExport;


class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:recibo-list|recibo-create|recibo-edit|recibo-delete|recibo-invoice', ['only' => ['index', 'show']]);
        $this->middleware('permission:recibo-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:recibo-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:recibo-delete', ['only' => ['destroy']]);
        $this->middleware('permission:recibo-invoice', ['only' => ['invoice']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dre = Dre::all();
        $titulo = 'TODAS INSCRIÇÕES';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::orderBy('cpf')->orderBy('created_at', 'desc')->get();

            return view('inscricao.index', ['recibo' => $recibo, 'dre' => $dre, 'titulo'=> $titulo]);
        } else {

            return view('errors.403');
        }
    }
    public function semnotas()
    {
        $dre = Dre::all();

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('disp_site','=', NULL)
                ->where('nota_seduc1','=', NULL )
                ->where('nota_seduc2','=', NULL )
                ->where('nota_seduc3','=', NULL )
                ->where('nota_seduc4','=', NULL )
                ->where('nota_seduc5','=', NULL )
                
                ->orderBy('created_at', 'desc')->get();

            return view('inscricao.semnotas', ['recibo' => $recibo, 'dre' => $dre,]);
        } else {

            return view('errors.403');
        }
    }
    public function semnotas_etapa2()
    {
        $dre = Dre::all();

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('disp_site','=', NULL)
                ->where('nota_drenutricao2','=', NULL )
                ->where('nota_drenutricao3','=', NULL )
                ->where('nota_drenutricao4','=', NULL )
                ->where('nota_drenutricao5','=', NULL )
                ->orderBy('created_at', 'desc')->get();

            return view('inscricao.semnotas_etapa2', ['recibo' => $recibo, 'dre' => $dre,]);
        } else {

            return view('errors.403');
        }
    }
    public function desclassificados()
    {
        $dre = Dre::all();
        $titulo ='DESCLASSIFICADOS';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('disp_site', '=', '1' )
                ->orderBy('created_at', 'desc')->get();

                return view('inscricao.index', ['recibo' => $recibo, 'dre' => $dre, 'titulo'=> $titulo]);
            } else {

            return view('errors.403');
        }
    }
    public function classificados()
    {
        $dre = Dre::all();
        $titulo = 'CLASSIFICADOS';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('disp_site', '=', '0' )
                ->orderBy('created_at', 'desc')->get();

                return view('inscricao.index', ['recibo' => $recibo, 'dre' => $dre, 'titulo'=> $titulo]);
            } else {

            return view('errors.403');
        }
    }


    //1 - Alta floresta
    public function drealtafloresta()
    {
        $dre = Dre::all();
        $nomeDRE = 'DRE ALTA FLORESTA';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 1)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //2 - Barra do Garças
    public function drebarradogarcas()
    {
        $dre = Dre::all();
        $nomeDRE = 'BARRA DO GARÇAS';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 2)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //3 - Cáceres
    public function drecaceres()
    {
        $dre = Dre::all();
        $nomeDRE = 'CÁCERES';


        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 3)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //4 - Confresa
    public function dreconfresa()
    {
        $dre = Dre::all();
        $nomeDRE = 'CÁCERES';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 4)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //5 - Cuiabá
    public function drecuiaba()
    {
        $dre = Dre::all();
        $nomeDRE = 'CUIABÁ';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 5)->orderBy('created_at', 'desc')->get();
            $dre = Dre::all();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }

    //6 - Varzea Grande
    public function drevarzeagrande()
    {
        $dre = Dre::all();
        $nomeDRE = 'VÁRZEA GRANDE';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 6)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }

    //7 - Diamantino
    public function drediamantino()
    {
        $dre = Dre::all();
        $nomeDRE = 'DIAMANTINO';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 7)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //8 - Juina
    public function drejuina()
    {
        $dre = Dre::all();
        $nomeDRE = 'JUÍNA';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 8)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //9 - Matupá
    public function drematupa()
    {
        $dre = Dre::all();
        $nomeDRE = 'MATUPÁ';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 9)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //10 - Matupá
    public function dreponteselacerda()
    {
        $dre = Dre::all();
        $nomeDRE = 'PONTES E LACERDA';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 10)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //11 - Prm.do leste
    public function dreprimaveradoleste()
    {
        $dre = Dre::all();
        $nomeDRE = 'PRIMAVERA DO LESTE';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 11)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //12 - Rondonópolis
    public function drerondonopolis()
    {
        $dre = Dre::all();
        $nomeDRE = 'RONDONÓPOLIS';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 12)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //13 - Sinop
    public function dresinop()
    {
        $dre = Dre::all();
        $nomeDRE = 'SINOP';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 13)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }
    //14 - Sinop
    public function dretangaradaserra()
    {
        $dre = Dre::all();
        $nomeDRE = 'TANGARÁ DA SERRA';

        if (Auth::check() && Auth::user()->hasRole('seduc')) {
            // Se o usuário possui o perfil, realizar a consulta
            $recibo = Recibo::where('dre_id', '=', 14)->orderBy('created_at', 'desc')->get();

            return view('inscricao.dre.dre', ['recibo' => $recibo, 'dre' => $dre, 'nomeDRE' =>  $nomeDRE]);
        } else {

            return view('errors.403');
        }
    }


    public function create()
    {
        $dre = Dre::all();
        $ingredientes = Ingredientes::get();
        $escola = Escola::all();
        $produto = Produto::orderBy('id', 'asc')->get();
        return view('inscricao.create', compact('dre', 'ingredientes', 'escola'));

        //    return view('recibo.create', compact('produto'));
    }


    public function store(Request $request)
    {
        // Defina as regras de validação para a imagem
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimetypes:image/jpeg,image/png,image/gif|max:2048',
            // Adicione aqui outras regras de validação para os demais campos, se necessário.
        ], [
            'image.mimetypes' => 'Apenas imagens nos formatos JPG, PNG, GIF são aceitas.',
        ]);
    
        // Verifique se a validação falhou
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        // Criar o registro do recibo
        $recibo = Recibo::create($request->all());
    
        // Imagem do produto upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $imagePath = public_path('images/inscricao') . '/' . $imageName;
    
            // Crie uma instância da classe Intervention ImageManager
            $imageManager = new ImageManager();
    
            // Abra a imagem usando o ImageManager
            $image = $imageManager->make($requestImage->path());
    
            // Redimensione a imagem para as dimensões desejadas
            $largura = 900;
            $altura = 500;
            $image->resize($largura, $altura, function ($constraint) {
                $constraint->aspectRatio(); // Mantém a proporção da imagem
                $constraint->upsize(); // Evita que a imagem seja dimensionada para cima
            });
    
            // Salve a imagem redimensionada
            $image->save($imagePath);
    
            $recibo->image = $imageName;
        }
    
        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        $units = $request->input('units', []);
    
        foreach ($products as $product) {
            if ($product != '') {
                $recibo->produto()->attach($product, [
                    'Quantidade' => $quantities[$product],
                    'unidade' => $units[$product]
                ]);
            }
        }
    
        $recibo->save();
    
        return back()->with('success', 'A sua inscrição foi realizada com sucesso!!');
    }

    public function show(Recibo $recibo, $id)
    {

        $recibo        = Recibo::find($id);
        $dre           = Dre::all();

        return view('inscricao.show', [
            'recibo'        => $recibo,
            'dre'           => $dre,

        ]);
    }


    public function invoice($id)
    {
        $recibo        = Recibo::find($id);
        $dre           = Dre::all();

        return view('inscricao.invoice', [
            'recibo'        => $recibo,
            'dre'           => $dre,

        ]);
    }

    public function edit(Recibo $recibo, $id)
    {

        $produtocont1 = Recibo::with('categoria')->where('Nome', '=', 'ALIMENTOS PROIBIDOS')->count();
        $produtocont2 = Recibo::with('produto')->where('Nome', '=', 'ALIMENTOS PROIBIDOS')->count();
        // dd($produtocont1);
        $produto = Produto::get();
        $categoria = Cat_ingredientes::all();

        //    $recibo->load('produto');
        $recibo = Recibo::get();
        //   $empresa_cliente = Empresa_Cliente::get();
        $recibo = Recibo::find($id);
        $dre = Dre::all();

        return view('inscricao.edit', compact('recibo', 'produto', 'recibo', 'dre', 'categoria', 'produtocont1', 'produtocont2'))->with('delete', 'Recibo deletado com sucesso!');
    }

    public function dreedit(Recibo $recibo, $id)
    {

        $produtocont1 = Recibo::with('categoria')->where('Nome', '=', 'ALIMENTOS PROIBIDOS')->count();
        $produtocont2 = Recibo::with('produto')->where('Nome', '=', 'ALIMENTOS PROIBIDOS')->count();
        // dd($produtocont1);
        $produto = Produto::get();
        $categoria = Cat_ingredientes::all();

        //    $recibo->load('produto');
        $recibo = Recibo::get();
        //   $empresa_cliente = Empresa_Cliente::get();
        $recibo = Recibo::find($id);
        $dre = Dre::all();

        return view('inscricao.dre.edit', compact('recibo', 'produto', 'recibo', 'dre', 'categoria', 'produtocont1', 'produtocont2'))->with('delete', 'Recibo deletado com sucesso!');
    }


    public function update(Request $request, Recibo $recibo)
    {
        //  $recibo -> Nota1       = $request->Nota1;

        $recibo->update();

        //dd($recibo);
        // $recibo->update($request->all());
        
        return redirect('/inscricao')->with('edit', 'Inscrição avaliada com sucesso!');
    }




    public function destroy(Recibo $recibo)
    {
        $recibo->delete();
        return redirect()->route('inscricao.index')
            ->with('delete', 'Recibo deletado com sucesso!');
    }



    public function export()
    {


        return Excel::download(new InscricaoExport, 'Lista_Inscritos.xlsx');
    }



    public function formulario()
    {

        $ingredientes = Produto::all();
        $escola = escola::all();
        $dre = Dre::all();

        return view('inscricao.formulario', compact('ingredientes', 'escola', 'dre'));
    }
    public function obrigado()
    {

        return view('inscricao.obrigado');
    }

        public function inscricao_update(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')&& $request->file('image')->isValid()){
            
            $requestImage = $request -> image;
            
            $extension = $requestImage-> extension();
            
            $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $request -> image->move(public_path('images/inscricao'), $imageName);
            
            $data['image'] = $imageName;
            
        }
        toast('Produto editado com sucesso!','success');
        Recibo::findOrFail($request->id) -> update ($data);
      //  dd($data);
    
        return redirect()->back()->with('success', 'Recibo atualizado com sucesso!');
    }


    public function disp_site_sim(Request $request, $id)
    {

        $recibo = Recibo::find($id);
        $venda = 0;
        $recibo->disp_site = $venda;
        $recibo->save();
        //   dd($recibo);
        toast('Status do Orçamento alterado para <b> Venda Realizada! </b> ', 'success');

        return back();
    }

    public function disp_site_nao(Request $request, $id)
    {

        $recibo = Recibo::find($id);
        $venda = 1;
        $recibo->disp_site = $venda;
        $recibo->save();

        toast('Status do Orçamento alterado para <b> Venda Realizada! </b> ', 'success');

        return back();
    }
    public function desclassificar_sim(Request $request, $id)
    {

        $recibo = Recibo::find($id);
        $venda = 0;
        $recibo->desclassificar = $venda;
        $recibo->save();
        //   dd($recibo);
        toast('Status do Orçamento alterado para <b> Venda Realizada! </b> ', 'success');

        return back();
    }

    public function desclassificar_nao(Request $request, $id)
    {

        $recibo = Recibo::find($id);
        $venda = 1;
        $recibo->desclassificar = $venda;
        $recibo->save();

        toast('Status do Orçamento alterado para <b> Venda Realizada! </b> ', 'success');

        return back();
    }
}
