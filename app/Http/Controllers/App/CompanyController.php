<?php
declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Repository\App\HomeRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CompanyController extends Controller
{

    public function __construct(public HomeRepository $repository){}

    public function index(): Factory|View|Application
    {
        return view('app.pages.company.index', [
            'companies' => $this->repository->getCompanies()
        ]);
    }

    public function showCompany(string $company): Factory|View|Application
    {
        return view('app.pages.company.detail', [
            'company' => $this->repository->showDetails($company)
        ]);
    }

    public function booking(string $key): Factory|View|Application
    {
        return view('app.pages.company.booking', [
            'trajet' => $this->repository->showBooking($key)
        ]);
    }
}
