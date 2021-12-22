<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Trajet;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $trajet = Trajet::query()
            ->where('starting_city', '=', $request['data']['depart'])
            ->where('arrival_city', '=', $request['data']['arriver'])
            ->get();
        $trajet->load('company');
        return response()->json([
            'trajets' => $trajet,
            'message' => "Donner trouver"
        ], 200);
    }
}
