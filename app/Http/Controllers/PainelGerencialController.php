<?php

namespace App\Http\Controllers;

use App\Models\ESCOLA;
use App\Models\Produto;
use App\Models\Recibo;
use App\Models\Dre;
use App\Models\User;
use App\Models\Like;



use Illuminate\Http\Request;

class PainelGerencialController extends Controller
{



    public function dashboard()
    {
        $escolas = ESCOLA::count();
        $recibo = Recibo::count();
        $produtos = Produto::count();
        $escolas = ESCOLA::count();
        $dre = DRE::count();
        $insc_desclassificados = Recibo::where('disp_site', '1')->count();
        $insc_classificados = Recibo::where('disp_site', '0')->count();
        $insc_nao_avaliados = Recibo::where('disp_site', NULL)->count();

        $votos  = Like::all();
        $totalVotos = $votos->count(); // Conta o total de votos

        $votosPorCandidato = $votos->groupBy('recibo_id')->map(function ($grupo) {
            return $grupo->count();
        });
        Like::where('recibo_id')->count();
        $query = Like::select('recibo_id', Like::raw('COUNT(*) as Qtde'))
            ->groupBy('recibo_id')
            ->orderByDesc('Qtde')
            ->limit(5);
        $result = $query->get();

        //    dd($result);
        //         select top 1 * 
        // from (
        //     select a.CeeTipoAtoRegulatorioFlg , COUNT(*) Qtde
        //     from CEE.TBCEETIPOATOREGULATORIO a
        //     group by a.CeeTipoAtoRegulatorioFlg
        // ) a
        // order by a.Qtde desc

        // Obtém o candidato com o maior número de votos
        //$vencedor = $votosPorCandidato->max();
        $vencedor = $votosPorCandidato->max(); // conta a quantidade de votos que o vencedor obteve
        $recibos = Recibo::all();

        $likedre1 = Recibo::with('likes', 'dre')->where('dre_id', '=', '1')->count(); // Alta floresta
        $likedre2 = Recibo::with('likes', 'dre')->where('dre_id', '=', '2')->count(); //,'=', '2')->count();
        $likedre3 = Recibo::with('likes', 'dre')->where('dre_id', '=', '3')->count(); // Caceres
        $likedre4 = Recibo::with('likes', 'dre')->where('dre_id', '=', '4')->count();
        $likedre5 = Recibo::with('likes', 'dre')->where('dre_id', '=', '5')->count();
        $likedre6 = Recibo::with('likes', 'dre')->where('dre_id', '=', '6')->count();
        $likedre7 = Recibo::with('likes', 'dre')->where('dre_id', '=', '7')->count();
        $likedre8 = Recibo::with('likes', 'dre')->where('dre_id', '=', '8')->count();
        $likedre9 = Recibo::with('likes', 'dre')->where('dre_id', '=', '9')->count();
        $likedre10 = Recibo::with('likes', 'dre')->where('dre_id', '=', '10')->count();
        $likedre11 = Recibo::with('likes', 'dre')->where('dre_id', '=', '11')->count();
        $likedre12 = Recibo::with('likes', 'dre')->where('dre_id', '=', '12')->count();
        $likedre13 = Recibo::with('likes', 'dre')->where('dre_id', '=', '13')->count();
        $likedre14 = Recibo::with('likes', 'dre')->where('dre_id', '=', '14')->count();


        $produto = Produto::all();
        $search = request('search');
        if ($search) {
            $produto = Produto::where([['Nome', 'like', '%' . $search . '%']])->get();
        } else {
            $produto = Produto::all();
        }
        // $totalfichas = FICHA::count();
        // $fichasNAOtramitadas = FICHA::where('status_id', '=', NULL)->count();
        // $fichasTramitadas = FICHA::where('status_id', '!=', NULL)->count();

        return view('painel.painel-dashboard', compact(

            'recibo',
            'escolas',
            'produtos',
            'dre',
            'produto',
            'search',
            'likedre1',
            'likedre2',
            'likedre3',
            'likedre4',
            'likedre5',
            'likedre6',
            'likedre7',
            'likedre8',
            'likedre9',
            'likedre10',
            'likedre11',
            'likedre12',
            'likedre13',
            'likedre14',
            'votos',
            'vencedor',
            'votosPorCandidato',
            'totalVotos',
            'recibos',
            'result',
            'insc_desclassificados',
            'insc_classificados',
            'insc_nao_avaliados'
        ));
    }

    public function index()
    {

        return view('painel.index');
    }

    public function votos()
{
    $escolas = ESCOLA::count();
    $recibo = Recibo::count();
    $produtos = Produto::count();
    $dre = DRE::count();

    // Obtém o total de votos
    $totalVotos = Like::count();

    // Agrupa os votos por recibo_id e conta a quantidade de votos para cada recibo
    $votosPorCandidato = Like::select('recibo_id', Like::raw('COUNT(*) as Qtde'))
        ->groupBy('recibo_id')
        ->orderByDesc('Qtde')
        ->get();
        
        $result = Like::select('recibo_id', Like::raw('COUNT(*) as Qtde'))
        ->groupBy('recibo_id')
        ->orderByDesc('Qtde')
        ->limit(5)
        ->get();
    // Extrai os ids dos recibos que têm os maiores votos
    $reciboIds = $votosPorCandidato->pluck('recibo_id');

    // Obtém os recibos correspondentes aos ids
  //  $recibos = Recibo::whereIn('id', $reciboIds)->paginate(5);
    $recibos1 = Recibo::where('dre_id', '=', '1')->wherein('id', $reciboIds)->get();
    $recibos2 = Recibo::where('dre_id', '=', '2')->wherein('id', $reciboIds)->paginate(5);
    $recibos3 = Recibo::where('dre_id', '=', '3')->wherein('id', $reciboIds)->paginate(5);
    $recibos4 = Recibo::where('dre_id', '=', '4')->wherein('id', $reciboIds)->paginate(5);
    $recibos5 = Recibo::where('dre_id', '=', '5')->wherein('id', $reciboIds)->paginate(5);
    $recibos6 = Recibo::where('dre_id', '=', '6')->wherein('id', $reciboIds)->paginate(5);
    $recibos7 = Recibo::where('dre_id', '=', '7')->wherein('id', $reciboIds)->paginate(5);
    $recibos8 = Recibo::where('dre_id', '=', '8')->wherein('id', $reciboIds)->paginate(5);
    $recibos9 = Recibo::where('dre_id', '=', '9')->wherein('id', $reciboIds)->paginate(5);
    $recibos10 = Recibo::where('dre_id', '=', '10')->wherein('id', $reciboIds)->paginate(5);
    $recibos11 = Recibo::where('dre_id', '=', '11')->wherein('id', $reciboIds)->paginate(5);
    $recibos12 = Recibo::where('dre_id', '=', '12')->wherein('id', $reciboIds)->paginate(5);
    $recibos13 = Recibo::where('dre_id', '=', '13')->wherein('id', $reciboIds)->paginate(5);
    $recibos14 = Recibo::where('dre_id', '=', '14')->wherein('id', $reciboIds)->paginate(5);
    // Obtém o candidato com o maior número de votos
    $vencedor = $votosPorCandidato->max('Qtde');


    return view('painel.votos', compact(
        'recibo',
        'escolas',
        'produtos',
        'dre',
        'totalVotos',
        'votosPorCandidato',
        'vencedor',
        'result',
        'recibos1',
        'recibos2',
        'recibos3',
        'recibos4',
        'recibos5',
        'recibos6',
        'recibos7',
        'recibos8',
        'recibos9',
        'recibos10',
        'recibos11',
        'recibos12',
        'recibos13',
        'recibos14',

    ));
}

    public function consulta_aluno()
    {

        return view('painel.consulta_aluno');
    }

    public function consulta_ficha()
    {
        // $userCount  =          $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ::where('status_id', '=', auth()->id())
        // ->count();
        return view('painel.consulta_ficha', compact('userCount'));
    }

    //// Cadastro
    public function cadastro_menu()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.index');
    }

    public function cadastro_aluno()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_aluno', compact('userCount'));
    }
    public function cadastro_categoria()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_categoria', compact('userCount'));
    }
    public function cadastro_conselho()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_conselho', compact('userCount'));
    }

    public function cadastro_escola()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_escola', compact('userCount'));
    }

    public function cadastro_ministerio()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_ministerio', compact('userCount'));
    }

    public function cadastro_polo()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_polo', compact('userCount'));
    }

    public function cadastro_prazo()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_prazo', compact('userCount'));
    }

    public function cadastro_serie()
    {
        // $userCount  =  ALUNO::where('AlunoNome', '=', auth()->id())
        // ->count();
        return view('painel.cadastro.cadastro_serie', compact('userCount'));
    }
}
