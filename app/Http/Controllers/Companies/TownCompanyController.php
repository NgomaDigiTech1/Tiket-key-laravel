<?php
declare(strict_types=1);

namespace App\Http\Controllers\Companies;

use App\Forms\TownForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\TownRequest;
use App\Repository\Company\TownCompanyRepository;
use App\Repository\TownRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class TownCompanyController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public TownCompanyRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('companies.pages.towns.index', [
            'towns' => $this->repository->getContents()
        ]);
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(TownForm::class, [
            'method' => 'POST',
            'url' => route('company.towns.store')
        ]);
        return view('companies.pages.towns.create', compact('form'));
    }

    public function store(TownRequest $attributes): RedirectResponse
    {
        $this->repository->create($attributes);
        return redirect()->route('company.towns.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $town = $this->repository->show($key);
        $form = $this->builder->create(TownForm::class, [
            'method' => 'PUT',
            'url' => route('company.towns.update', $town->key),
            'model' => $town
        ]);
        return view('companies.pages.towns.create', compact('form', 'town'));
    }

    public function update(string $key, TownRequest $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('company.towns.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('company.towns.index');
    }
}
