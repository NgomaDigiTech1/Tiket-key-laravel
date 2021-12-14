<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admins;

use App\Forms\UserForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repository\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Kris\LaravelFormBuilder\FormBuilder;

final class UserDashboardController extends Controller
{
    public function __construct(
        public FormBuilder $builder,
        public UserRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('admins.pages.users.index', [
            'users' => $this->repository->getContents()
        ]);
    }

    public function show(string $key)
    {}

    public function create(): Factory|View|Application
    {
        $form = $this->builder->create(UserForm::class, [
            'method' => 'POST',
            'url' => route('admin.users.store')
        ]);
        return view('admins.pages.users.create', compact('form'));
    }

    public function store(UserRequest $attributes): RedirectResponse
    {
        $this->repository->create($attributes);
        return redirect()->route('admin.users.index');
    }

    public function edit(string $key)
    {}

    public function update()
    {}

    public function destroy(string $key)
    {}
}
