<?php
declare(strict_types=1);

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Repository\Company\TravellerCompanyRepository;
use App\Repository\TravellerRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TravellerCompanyController extends Controller
{
    public function __construct(public  TravellerCompanyRepository $repository){}

    public function index(): Factory|View|Application
    {
        return view('companies.pages.travellers.index', [
            'travellers' => $this->repository->getContents()
        ]);
    }

    public function show(string $key): Factory|View|Application
    {
        return view('companies.pages.travellers.show', [
            'traveller' => $this->repository->show($key)
        ]);
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('company.clients.index');
    }
}
