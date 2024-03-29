<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

final class DashboardController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('admins.admin');
    }
}
