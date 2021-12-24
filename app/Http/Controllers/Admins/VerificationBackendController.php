<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Repository\Company\VerificationRepository;
use App\Repository\VerificationBackendRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class VerificationBackendController extends Controller
{
    public function __construct(public VerificationBackendRepository $repository){}

    public function verification(): Factory|View|Application
    {
        return view('admins.pages.verifications.index', [
            'transactions' => $this->repository->getBookingCode()
        ]);
    }
}
