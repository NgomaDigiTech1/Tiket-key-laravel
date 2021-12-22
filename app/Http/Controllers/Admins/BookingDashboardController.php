<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Repository\BookingRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingDashboardController extends Controller
{
    public function __construct(
        public BookingRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('admins.pages.bookings.index', [
            'bookings' => $this->repository->getContents()
        ]);
    }

    public function show(string $key): Factory|View|Application
    {
        return view('admins.pages.bookings.show', [
            'booking' => $this->repository->show($key)
        ]);
    }

    public function update(string $key, Request $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('admin.bookings.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->route('admin.bookings.index');
    }

    public function active(string $key): RedirectResponse
    {
        $this->repository->confirmedRoom($key);
        return back();
    }

    public function inactive(string $key): RedirectResponse
    {
        $this->repository->invalidateRoom($key);
        return back();
    }
}
