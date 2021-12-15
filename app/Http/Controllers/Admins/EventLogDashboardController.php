<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class EventLogDashboardController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('admins.pages.events.index', [
            'events' => Event::query()
                ->with('user')
                ->latest()
                ->get()
        ]);
    }
}
