<?php
declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Repository\App\HomeRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{

    public function __construct(public HomeRepository $repository){}

    public function index(): Factory|View|Application
    {
        return view('app.welcome', [
            'towns' => $this->repository->getTowns(),
            'companies' => $this->repository->getCompanies()
        ]);
    }
}
