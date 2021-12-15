<?php
declare(strict_types=1);

namespace App\Http\Controllers\Companies;

use App\Forms\Company\DriverCompanyForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\DriverCompanyRequest;
use App\Repository\Company\DriverCompanyRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class DriverCompanyController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public DriverCompanyRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('companies.pages.drivers.index', [
            'drivers' => $this->repository->getContents()
        ]);
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(DriverCompanyForm::class, [
            'method' => 'POST',
            'url' => route('company.chauffeur.store')
        ]);
        return view('companies.pages.drivers.create', compact('form'));
    }

    public function store(DriverCompanyRequest $attributes): RedirectResponse
    {
        $this->repository->create($attributes);
        return redirect()->route('company.chauffeur.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $driver = $this->repository->show($key);
        $form = $this->builder->create(DriverCompanyForm::class, [
            'method' => 'PUT',
            'url' => route('company.chauffeur.update', $driver->key),
            'model' => $driver
        ]);
        return view('companies.pages.drivers.create', compact('form', 'driver'));
    }

    public function update(string $key, DriverCompanyRequest $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('company.chauffeur.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('company.chauffeur.index');
    }
}
