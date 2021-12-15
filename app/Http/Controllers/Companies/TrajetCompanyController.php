<?php
declare(strict_types=1);

namespace App\Http\Controllers\Companies;

use App\Forms\Company\TrajetCompanyForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\TrajetCompanyRequest;
use App\Repository\Company\TrajetCompanyRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class TrajetCompanyController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public TrajetCompanyRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('companies.pages.trajets.index', [
            'trajets' => $this->repository->getContents()
        ]);
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(TrajetCompanyForm::class, [
            'method' => 'POST',
            'url' => route('company.trajets.store')
        ]);
        return view('companies.pages.trajets.create', compact('form'));
    }

    public function store(TrajetCompanyRequest $attributes): RedirectResponse
    {
        $this->repository->create($attributes);
        return redirect()->route('company.trajets.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $trajet = $this->repository->show($key);
        $form = $this->builder->create(TrajetCompanyForm::class, [
            'method' => 'PUT',
            'url' => route('company.trajets.update', $trajet->key),
            'model' => $trajet
        ]);
        return view('companies.pages.trajets.create', compact('form', 'trajet'));
    }

    public function update(string $key, TrajetCompanyRequest $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('company.trajets.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('company.trajets.index');
    }
}
