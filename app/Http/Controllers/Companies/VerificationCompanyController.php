<?php
declare(strict_types=1);

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Repository\Company\VerificationRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class VerificationCompanyController extends Controller
{
    public function __construct(public VerificationRepository $repository){}

    public function verification(): Factory|View|Application
    {
        return view('companies.pages.verifications.index', [
            'transactions' => $this->repository->getBookingCode()
        ]);
    }
}
