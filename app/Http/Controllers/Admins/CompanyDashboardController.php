<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admins;

use App\Forms\CompanyForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Repository\CompanyRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class CompanyDashboardController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public CompanyRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('admins.pages.companies.index', [
            'companies' => $this->repository->getContents()
        ]);
    }

    public function show(string $key): Factory|View|Application
    {
        return view('admins.pages.companies.show', [
            'company' => $this->repository->show($key)
        ]);
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(CompanyForm::class, [
            'method' => 'POST',
            'url' => route('admin.company.store')
        ]);
        return view('admins.pages.companies.create', compact('form'));
    }

    public function store(CompanyRequest $attributes): RedirectResponse
    {
        $this->repository->create($attributes);
        return redirect()->route('admin.company.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $company = $this->repository->show($key);
        $form = $this->builder->create(CompanyForm::class, [
            'method' => 'PUT',
            'url' => route('admin.company.update', $company->key),
            'model' => $company
        ]);
        return view('admins.pages.companies.create', compact('form', 'company'));
    }

    public function update(string $key, CompanyRequest $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('admin.company.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('admin.company.index');
    }
}
