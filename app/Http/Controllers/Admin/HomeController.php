<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Visitor;
use App\Page;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

   // public function __invoke()
    //{
      //  return view('welcome');
   // }

    public function index(Request $request){

        $visitsCount = 0;
        $onlineCount = 0;
        $pageCount = 0;
        $userCount = 0;


        $opcao = intval($request->input('opcao', 30));
        if($opcao > 120){
            $opcao = 120;
        }
        //Contagem de Acessos
        // $visitsCount = Visitor::count();

        $dateOpcao  = date('Y-m-d H:i:s', strtotime('-' .$opcao. ' days'));
        $visitsCount = Visitor::where('date_access', '>=', $dateOpcao)->count();


        //GRÁFICO - MANUAL
      //  $pagePier = [
          //  'teste1' => 200,
       //     'teste2' => 300,
       //     'teste3' => 400
     //   ];


        //GRÁFICO DO BANCO
        $pagePier = [];
        $visitAll = Visitor::selectRaw('page, count(page) as c')
            ->where('date_access', '>=', $dateOpcao)
            ->groupBy('page')
            ->get();
        foreach($visitAll as $visit){
            $pagePier[$visit['page']] = intval($visit['c']);
        }


        $pageLabels = json_encode( array_keys($pagePier) );
        $pageValues = json_encode( array_values($pagePier) );


        //online
        $datelimite = date('Y-m-d H:i:s', strtotime('-5 minutes'));
      //  echo $datelimite;
      //  exit;
       // 5 minutos até a data atual
        $onlineList = Visitor::select('ip')->where('date_access', '>=', $datelimite)->groupBy('ip')->get();

        $onlineCount = count($onlineList);
       // echo $onlineCount;
      //  exit;

        //páginas
        $pageCount = Page::count();

        //usuários
        $userCount = User::count();

        return view('admin.home', [
            'visitsCount' => $visitsCount,
        'onlineCount' => $onlineCount,
        'pageCount' => $pageCount,
        'userCount' => $userCount,
            'pageLabels' => $pageLabels,
            'pageValues' => $pageValues,
            'dateopcao' => $opcao
        ]);
    }
}
