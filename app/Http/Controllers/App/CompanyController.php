<?php
declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Repository\App\HomeRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        $trajet = $this->repository->showBooking($key);
        $socialShare = \Share::page(
            $trajet->company->phone_number,
            'Whatsapp'
        )->whatsapp();

        return view('app.pages.company.booking', [
            'trajet' => $trajet,
            'social' => $socialShare
        ]);
    }

    public function book(Request $request): RedirectResponse
    {
        $this->repository->book($request);
        return redirect()->route('confirmation.index');
    }

    public function confirmation(): Factory|View|Application
    {
        return view('app.pages.company.confirmation');
    }
}
