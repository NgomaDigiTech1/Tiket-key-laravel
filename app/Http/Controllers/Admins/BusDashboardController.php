<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admins;

use App\Forms\BusForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\BusRequest;
use App\Repository\BusRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class BusDashboardController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public BusRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('admins.pages.bus.index', [
            'buses' => $this->repository->getContents()
        ]);
    }

    public function show(string $key): Factory|View|Application
    {
        return view('admins.pages.bus.show', [
            'bus' => $this->repository->show($key)
        ]);
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(BusForm::class, [
            'method' => 'POST',
            'url' => route('admin.bus.store')
        ]);
        return view('admins.pages.bus.create', compact('form'));
    }

    public function store(BusRequest $attributes): RedirectResponse
    {
        $this->repository->create($attributes);
        return redirect()->route('admin.bus.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $bus = $this->repository->show($key);
        $form = $this->builder->create(BusForm::class, [
            'method' => 'PUT',
            'url' => route('admin.bus.update', $bus->key),
            'model' => $bus
        ]);
        return view('admins.pages.bus.create', compact('form', 'bus'));
    }

    public function update(string $key, BusRequest $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('admin.bus.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('admin.bus.index');
    }
}
