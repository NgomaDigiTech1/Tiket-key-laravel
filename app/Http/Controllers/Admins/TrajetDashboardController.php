<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admins;

use App\Forms\TrajetForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrajetRequest;
use App\Repository\TrajetRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class TrajetDashboardController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public TrajetRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('admins.pages.trajets.index', [
            'trajets' => $this->repository->getContents()
        ]);
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(TrajetForm::class, [
            'method' => 'POST',
            'url' => route('admin.trajets.store')
        ]);
        return view('admins.pages.trajets.create', compact('form'));
    }

    public function store(TrajetRequest $attributes): RedirectResponse
    {
        $this->repository->create($attributes);
        return redirect()->route('admin.trajets.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $trajet = $this->repository->show($key);
        $form = $this->builder->create(TrajetForm::class, [
            'method' => 'PUT',
            'url' => route('admin.trajets.update', $trajet->key),
            'model' => $trajet
        ]);
        return view('admins.pages.trajets.create', compact('form', 'trajet'));
    }

    public function update(string $key, TrajetRequest $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('admin.trajets.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('admin.trajets.index');
    }
}
