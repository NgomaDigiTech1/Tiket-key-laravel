<?php
declare(strict_types=1);

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Repository\Company\BookingCompanyRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingCompanyController extends Controller
{
    public function __construct(
        public BookingCompanyRepository $repository
    ){}

    public function index(): Factory|View|Application
    {
        return view('companies.pages.bookings.index', [
            'bookings' => $this->repository->getContents()
        ]);
    }

    public function show(string $key): Factory|View|Application
    {
        return view('companies.pages.bookings.show', [
            'booking' => $this->repository->show($key)
        ]);
    }

    public function update(string $key, Request $attributes): RedirectResponse
    {
        $this->repository->update($key, $attributes);
        return redirect()->route('company.book.index');
    }

    public function destroy(string $key): RedirectResponse
    {
        $this->repository->delete($key);
        return redirect()->back();
    }

    public function active(string $key): RedirectResponse
    {
        $this->repository->confirmedBooking($key);
        return back();
    }

    public function inactive(string $key): RedirectResponse
    {
        $this->repository->invalidateRoom($key);
        return back();
    }
}
