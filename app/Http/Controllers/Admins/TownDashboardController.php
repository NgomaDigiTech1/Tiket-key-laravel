<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admins;

use App\Forms\TownForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\TownRequest;
use App\Repository\TownRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class TownDashboardController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public TownRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('admins.pages.towns.index', [
            'towns' => $this->repository->getContents()
        ]);
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(TownForm::class, [
            'method' => 'POST',
            'url' => route('admin.towns.store')
        ]);
        return view('admins.pages.towns.create', compact('form'));
    }

    public function store(TownRequest $attributes): RedirectResponse
    {
        $this->repository->create($attributes);
        return redirect()->route('admin.towns.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $town = $this->repository->show($key);
        $form = $this->builder->create(TownForm::class, [
            'method' => 'PUT',
            'url' => route('admin.towns.update', $town->key),
            'model' => $town
        ]);
        return view('admins.pages.towns.create', compact('form', 'town'));
    }

    public function update(string $key, TownRequest $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('admin.towns.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('admin.towns.index');
    }
}
