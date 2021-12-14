<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admins;

use App\Forms\DriverForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Repository\DriverRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

class DriverDashboardController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public DriverRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('admins.pages.drivers.index', [
            'drivers' => $this->repository->getContents()
        ]);
    }

    public function show(string $key): Factory|View|Application
    {
        return view('admins.pages.drivers.show', [
            'driver' => $this->repository->show($key)
        ]);
    }

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(DriverForm::class, [
            'method' => 'POST',
            'url' => route('admin.drivers.store')
        ]);
        return view('admins.pages.drivers.create', compact('form'));
    }

    public function store(DriverRequest $attributes): RedirectResponse
    {
        $this->repository->create($attributes);
        return redirect()->route('admin.drivers.index');
    }

    public function edit(string $key): Factory|View|Application
    {
        $driver = $this->repository->show($key);
        $form = $this->builder->create(DriverForm::class, [
            'method' => 'PUT',
            'url' => route('admin.drivers.update', $driver->key),
            'model' => $driver
        ]);
        return view('admins.pages.drivers.create', compact('form', 'driver'));
    }

    public function update(string $key, DriverRequest $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('admin.drivers.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('admin.drivers.index');
    }
}
