<?php
declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Jobs\BookingJob;
use App\Models\Booking;
use App\Models\Trajet;
use App\Models\Traveller;
use App\Repository\App\HomeRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{

    public function __construct(public HomeRepository $repository){}

    public function index(): Factory|View|Application
    {
        return view('app.pages.company.index', [
            'companies' => $this->repository->getCompanies()
        ]);
    }

    public function showCompany(string $company): Factory|View|Application
    {
        return view('app.pages.company.detail', [
            'company' => $this->repository->showDetails($company)
        ]);
    }

    public function booking(string $key): Factory|View|Application
    {
        return view('app.pages.company.booking', [
            'trajet' => $this->repository->showBooking($key)
        ]);
    }

    public function book(Request $request): RedirectResponse
    {
        $data = validator(request()->all(), [
            "first_name" => ['required'],
            "name" => ['required'],
            "email" => ['required', 'email'],
            "phone_number" => ['required'],
            "trajet_key" => ['required'],
            'trajet_key.*' => ['string', Rule::exists('trajets', 'key')],
        ])->validate();

        $trajet = Trajet::query()
            ->where('key', '=', $data['trajet_key'])
            ->first();

        $this->StoreBooking($trajet, $data);

        toast("Votre reservation a ete envoyer avec succes", 'success');
        return redirect()->route('confirmation.index');
    }

    public function confirmation(): Factory|View|Application
    {
        return view('app.pages.company.confirmation');
    }

    private function StoreBooking($trajet, $data): Model|Builder
    {
        $traveller = Traveller::query()
            ->create([
                'name' => $data['name'],
                'first_name' => $data['first_name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'company_id' => $trajet->company->id
            ]);
        $booking = Booking::query()
            ->create([
                'trajet_id' => $trajet->id,
                'status' => Booking::PENDING_BOOKING,
                'traveller_id' => $traveller->id,
                'company_id' => $trajet->company->id
            ]);
        dispatch(new BookingJob($booking, $traveller))->delay(now()->addSecond(5));
        return $traveller;
    }
}
