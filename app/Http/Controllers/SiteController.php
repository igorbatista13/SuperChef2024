<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Documentos;
use App\Models\Escola;
use App\Models\Recibo;
use App\Models\Cidade;
use App\Models\Produto;
use App\Models\Dre;
use App\Models\Like;
use App\Models\Popup;
use Intervention\Image\ImageManager;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReciboCriado; // Importe a classe do e-mail que você criará


use Illuminate\Support\Facades\Session;


class SiteController extends Controller
{

    public function documentos(Request $request)
    {

        $documentos = Documentos::get();

        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->paginate('12');
        }

        return view('Site.documentos.index', [
            'search' => $search,
            'documentos' => $documentos

        ]);
    }

    public function buscarProdutos(Request $request)
    {
        $termoAluno = $request->termoAluno;
        $alunos = Produto::whereRaw('LOWER(Nome) LIKE ?', ['%' . strtolower($termoAluno) . '%'])->get();
        return response()->json($alunos);
    }


    public function vote(Request $request, Recibo $recibo)
    {
        // Define a data limite para votação (Verificar a data)
        $limitDate = '2024-09-18 23:59:59';

        // Obtém a data e hora atual
        $currentDateTime = now();

        // Converte a data limite para um objeto DateTime
        $limitDateTime = new \DateTime($limitDate);

        // Verifica se a data atual é menor ou igual à data limite
        if ($currentDateTime <= $limitDateTime) {
            // Ainda é permitido votar

            $sessionId = Session::getId();

            // Hash MD5 do CPF
            $hashedCpf = md5($request->cpf);

            // Verifica se o CPF já foi utilizado para votar nesta receita
            $cpfExists = Like::where('recibo_id', $recibo->id)
                ->where('cpf', $hashedCpf)
                ->exists();

            if ($cpfExists) {
                return redirect()->back()->with('error', 'Este CPF já foi utilizado para votar nesta receita!');
            }

            if ($recibo->hasLiked($sessionId)) {
                return redirect()->back()->with('error', 'Você já votou nesta receita!');
            }

            $recibo->likes()->create([
                'sessao' => $sessionId,
                'nome' => $request->nome,
                'cpf' => $hashedCpf, // Salva o CPF criptografado com MD5
                'Autorizacao_cpf' => $request->Autorizacao_cpf,
            ]);

            return redirect()->back()->with('success', 'Voto registrado com sucesso.');
        } else {
            // Já passou da data limite, não é permitido votar
            return redirect()->back()->with('error', 'A votação foi encerrada. Obrigado!');
        }
    }



    public function index(Request $request)
    {

        $popup = Popup::get();
        $recibos = Recibo::all();

        $id_recibo = Recibo::get('id');



        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->paginate('12');
        }



        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'popup' => $popup,

        ]);
    }

    public function formulario()
    {

        $ingredientes = Produto::all();
        $escola = escola::all();
        $dre = Dre::all();
        $cidade = Cidade::all();
        // $dre_cidade = Dre::with('escola')->get();


        return view('Site.formulario', compact('ingredientes', 'escola', 'dre', 'cidade'));
    }

    public function getEscolasByDre($dreId)
    {
        // Obter as escolas relacionadas à DRE selecionada
        $escolas = Escola::where('dre_id', $dreId)->get();

        // Retornar as escolas em formato JSON
        return response()->json($escolas);
    }


    public function store_formulario(Request $request)
    {
        //  dd($request->all());
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

        foreach ($products as $key => $productId) {
            if (!empty($productId)) {
                // Verificar se a quantidade e a unidade correspondentes existem
                $quantity = $quantities[$key] ?? null;
                $unit = $units[$key] ?? null;

                // Verificar se a quantidade e a unidade não estão vazias
                if ($quantity !== null && $unit !== null) {
                    // Anexar o produto ao recibo com quantidade e unidade
                    $recibo->produto()->attach($productId, [
                        'Quantidade' => $quantity,
                        'unidade' => $unit
                    ]);
                }
            }
        }
        $recibo->save();


        try {
            Mail::to($request->Email)->send(new ReciboCriado($recibo, $request->all()));
            // Se o e-mail for enviado com sucesso, redirecione de volta com uma mensagem de sucesso
            return back()->with('success', 'A sua inscrição foi realizada com sucesso! Um e-mail de confirmação foi enviado para você! ' . $request->email);
        } catch (\Exception $e) {
            // Se ocorrer um erro ao enviar o e-mail, redirecione de volta com uma mensagem de erro
            return back()->with('error', 'Ocorreu um erro ao enviar o e-mail de confirmação. Por favor, tente novamente.');
        }

        
        
      //  return back()->with('success', ' A sua inscrição foi realizada com sucesso!!');
    }

    public function store(Request $request, $reciboId)
    {

        //  $session_id = $request->session()->getId();

        $curtida = Like::where('recibo_id', $reciboId)
            //        ->where('sessao', $session_id)
            ->first();

        if ($curtida) {
            //            // O usuário já curtiu este recibo, então vamos descurtir
            $curtida->delete();
            return redirect()->back()->with('success', 'Curtida removida com sucesso!');
        } else {
            // O usuário ainda não curtiu este recibo, vamos curtir
            Like::create([
                'recibo_id' => $reciboId,
                'sessao' => $session_id,
                'nome' => $nome,
                'cpf' => $cpf,
            ]);

            return redirect()->back()->with('success', 'Recibo curtido com sucesso!');
        }
    }

    public function search(Request $request)
    {

        $search = $request->input('search');
        $response = Recibo::query()
            ->where('Nome_Prato', 'LIKE', "%{$search}%")
            ->get();

        return view('Site.index',         [
            'search'      => $search,
            'response' => $response
        ]);
    }



    public function create()
    {

        return view('produtos.create');
    }



    public function edit($id)
    {

        $editar_produto = Product::findOrFail($id);

        return view('produtos.edit', ['editar_produto' => $editar_produto]);
    }

    public function update(Request $request)
    {

        $data = $request->all();


        // Imagem do produto upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path('img/produtos'), $imageName);

            $data['image'] = $imageName;
        }
        toast('Produto editado com sucesso!', 'success');

        Product::findOrFail($request->id)->update($data);
        return redirect('/produtos/produtos');
    }


    //1 - Alta floresta
    public function drealtafloresta(Request $request)
    {
        $nomeDRE = 'ALTA FLORESTA';

        $recibos = Recibo::get();
        //   $recibos = Recibo::where('dre_id', '=', 1)->orderBy('created_at', 'desc')->get();

        $id_recibo = Recibo::get('id');



        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->where('dre_id', '=', 1)->paginate('12');
        }



        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'nomeDRE' => $nomeDRE,

        ]);
    }


    //2 - Barra do Garças
    public function drebarradogarcas(Request $request)
    {
        $nomeDRE = 'BARRA DO GARÇAS';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id');



        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->where('dre_id', '=', 2)->paginate('12');
        }

        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'nomeDRE' => $nomeDRE,

        ]);
    }
    //3 - Cáceres
    public function drecaceres(Request $request)
    {
        $nomeDRE = 'CÁCERES';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id');



        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->where('dre_id', '=', 3)->paginate('12');
        }

        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'nomeDRE' => $nomeDRE,

        ]);
    }
    //4 - Confresa
    public function dreconfresa(Request $request)
    {
        $nomeDRE = 'CÁCERES';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id');



        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->where('dre_id', '=', 4)->paginate('12');
        }

        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'nomeDRE' => $nomeDRE,

        ]);
    }
    //5 - Cuiabá
    public function drecuiaba(Request $request)
    {
        $nomeDRE = 'CUIABÁ';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id');



        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->where('dre_id', '=', 5)->paginate('12');
        }

        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'nomeDRE' => $nomeDRE,

        ]);
    }

    //6 - Varzea Grande
    public function drevarzeagrande(Request $request)
    {
        $nomeDRE = 'VÁRZEA GRANDE';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id');



        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->where('dre_id', '=', 6)->paginate('12');
        }

        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'nomeDRE' => $nomeDRE,

        ]);
    }

    //7 - Diamantino
    public function drediamantino(Request $request)
    {
        $nomeDRE = 'DIAMANTINO';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id');



        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->where('dre_id', '=', 7)->paginate('12');
        }

        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'nomeDRE' => $nomeDRE,

        ]);
    }
    //8 - Juina
    public function drejuina(Request $request)
    {
        $nomeDRE = 'JUÍNA';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id');



        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->where('dre_id', '=', 8)->paginate('12');
        }

        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'nomeDRE' => $nomeDRE,

        ]);
    }
    //9 - Matupá
    public function drematupa(Request $request)
    {
        $nomeDRE = 'MATUPÁ';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id');



        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->where('dre_id', '=', 9)->paginate('12');
        }

        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'nomeDRE' => $nomeDRE,

        ]);
    }
    //10 - Matupá
    public function dreponteselacerda(Request $request)
    {
        $nomeDRE = 'PONTES E LACERDA';
        $recibos = Recibo::get();
        $id_recibo = Recibo::get('id');

        $search = $request->input('search');

        if ($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%' . $search . '%']])->where('disp_site', '=', 0)->paginate('12');
        } else {
            $recibo = Recibo::with('dre', 'likes')->where('disp_site', '=', 0)->where('dre_id', '=', 10)->paginate('12');
        }

        return view('Site.index', [
            'recibo' => $recibo,
            'search' => $search,
            'id_recibo' => $id_recibo,
            'recibos' => $recibos,
            'nomeDRE' => $nomeDRE,

        ]);
    }
    //11 - Prm.do leste
    public function dreprimaveradoleste(Request $request)
    {
        $nomeDRE = 'PRIMAVERA DO LESTE';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id');

        
        
        $search = $request->input('search');
        
        if($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%'.$search. '%' ]])->where('disp_site','=',0)->paginate('12');
            
        } else {
            $recibo = Recibo::with('dre','likes')->where('disp_site','=',0)->where('dre_id', '=', 11)->paginate('12');  
        }

        return view('Site.index', [
        'recibo'=> $recibo,
        'search' => $search,
        'id_recibo' => $id_recibo,
        'recibos' => $recibos,
        'nomeDRE' => $nomeDRE,

    ]);
    }
    //12 - Rondonópolis
    public function drerondonopolis(Request $request)
    {
        $nomeDRE = 'RONDONÓPOLIS';
        $recibos = Recibo::get();
        $id_recibo = Recibo::get('id');

        $search = $request->input('search');
        
        if($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%'.$search. '%' ]])->where('disp_site','=',0)->paginate('12');
            
        } else {
            $recibo = Recibo::with('dre','likes')->where('disp_site','=',0)->where('dre_id', '=', 12)->paginate('12');  
        }

        return view('Site.index', [
        'recibo'=> $recibo,
        'search' => $search,
        'id_recibo' => $id_recibo,
        'recibos' => $recibos,
        'nomeDRE' => $nomeDRE,

    ]);
    }
    //13 - Sinop
    public function dresinop(Request $request)
    {
        $nomeDRE = 'SINOP';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id'); 
        $search = $request->input('search');
        
        if($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%'.$search. '%' ]])->where('disp_site','=',0)->paginate('12');
            
        } else {
            $recibo = Recibo::with('dre','likes')->where('disp_site','=',0)->where('dre_id', '=', 13)->paginate('12');  
        }

        return view('Site.index', [
        'recibo'=> $recibo,
        'search' => $search,
        'id_recibo' => $id_recibo,
        'recibos' => $recibos,
        'nomeDRE' => $nomeDRE,

    ]);
    }
    //14 - Sinop
    public function dretangaradaserra(Request $request)
    {
        $nomeDRE = 'TANGARÁ DA SERRA';
        $recibos = Recibo::get();

        $id_recibo = Recibo::get('id');       
        
        $search = $request->input('search');
        
        if($search) {
            $recibo = Recibo::where([['Nome_Prato', 'like', '%'.$search. '%' ]])->where('disp_site','=',0)->paginate('12');
            
        } else {
            $recibo = Recibo::with('dre','likes')->where('disp_site','=',0)->where('dre_id', '=', 14)->paginate('12');  
        }

        return view('Site.index', [
        'recibo'=> $recibo,
        'search' => $search,
        'id_recibo' => $id_recibo,
        'recibos' => $recibos,
        'nomeDRE' => $nomeDRE,

    ]);
    }
}
