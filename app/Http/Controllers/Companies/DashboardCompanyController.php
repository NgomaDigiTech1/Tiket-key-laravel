<?php
declare(strict_types=1);

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\AdminCompanyRequest;
use App\Http\Requests\Company\CompanyRequest;
use App\Repository\Company\ConfigRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardCompanyController extends Controller
{
    public function __construct(public ConfigRepository $repository){}

    public function index(): Factory|View|Application
    {
        return view('companies.company');
    }

    public function voir(): Factory|View|Application
    {
        return view('companies.edit');
    }

    public function updateUser(string $key, AdminCompanyRequest $attributes): RedirectResponse
    {
        $this->repository->updateUser($key, $attributes);
        return redirect()->back();
    }

    public function updateCompany(string $key, CompanyRequest $attributes): RedirectResponse
    {
        $this->repository->updateCompany($key, $attributes);
        return redirect()->back();
    }
}
