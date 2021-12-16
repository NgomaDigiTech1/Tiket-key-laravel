<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Repository\TravellerRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TravellerDashboardController extends Controller
{
    public function __construct(public  TravellerRepository $repository){}

    public function index(): Factory|View|Application
    {
        return view('admins.pages.travellers.index', [
            'travellers' => $this->repository->getContents()
        ]);
    }

    public function show(string $key): Factory|View|Application
    {
        return view('admins.pages.travellers.show', [
            'traveller' => $this->repository->show($key)
        ]);
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('admin.travellers.index');
    }
}
