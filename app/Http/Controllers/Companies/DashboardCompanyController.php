<?php
declare(strict_types=1);

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardCompanyController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('companies.company');
    }
}
