<?php
declare(strict_types=1);

namespace App\Http\Controllers\Companies;

use App\Forms\BusForm;
use App\Forms\Company\BusCompanyForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusRequest;
use App\Http\Requests\Company\BusCompanyRequest;
use App\Repository\BusRepository;
use App\Repository\Company\BusCompanyRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class BusCompanyController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public BusCompanyRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('companies.pages.bus.index', [
            'buses' => $this->repository->getContents()
        ]);
    }

    public function show(string $key): Factory|View|Application
    {
        return view('companies.pages.bus.show', [
            'bus' => $this->repository->show($key)
        ]);
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(BusCompanyForm::class, [
            'method' => 'POST',
            'url' => route('company.bus.store')
        ]);
        return view('companies.pages.bus.create', compact('form'));
    }

    public function store(BusCompanyRequest $attributes): RedirectResponse
    {
        $this->repository->create($attributes);
        return redirect()->route('company.bus.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $bus = $this->repository->show($key);
        $form = $this->builder->create(BusCompanyForm::class, [
            'method' => 'PUT',
            'url' => route('company.bus.update', $bus->key),
            'model' => $bus
        ]);
        return view('companies.pages.bus.create', compact('form', 'bus'));
    }

    public function update(string $key, BusCompanyRequest $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('company.bus.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('company.bus.index');
    }
}
