<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

use App\Models\Categorias;
use App\Models\Visitas;
use App\Models\Noticias;
use App\Models\Portadas;

class IndexController extends Controller
{

    protected $noticiaService;
    protected $visitasService;
    protected $categoriaService;
    protected $portadasService;

    public function __construct()
    {
        $this->middleware('guest');

        $this->noticiaService = new Noticias();
        $this->visitasService = new Visitas();
        $this->categoriaService = new Categorias();
        $this->portadasService = new Portadas();
    }

    public function index(Request $request)
    {
        $noticias = $this->noticiaService->getLastNews($request->search, $request->categoria);
        $videos = $this->noticiaService->getLastVideos($request->search, $request->categoria);
        $visitas = $this->visitasService->store($request);
        $categorias = $this->categoriaService->list();
        $portadas = $this->portadasService->list();

        $isSearch = false;

        return view('welcome', compact('noticias', 'visitas', 'videos', 'isSearch', 'categorias', 'portadas'));
    }

    public function search(Request $request)
    {
        $file = fopen("debug.txt", "w");
        fwrite($file,$request->search ." ". $request->categoria);
        
        $noticias = $this->noticiaService->getLastNews($request->search, $request->categoria);
        $videos = $this->noticiaService->getLastVideos($request->search, $request->categoria);
        $visitas = $this->visitasService->store($request);
        $categorias = $this->categoriaService->list();
        $portadas = $this->portadasService->list();
        $isSearch = true;

        return view('welcome', compact('noticias', 'visitas', 'videos', 'isSearch', 'categorias', 'portadas'));
    }


    public function perfil()
    {
        return view('public.perfil');
    }

    public function parseDate($date)
    {
        return Carbon::parse($date)->toFormattedDateString();
    }
}