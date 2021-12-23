<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Trajet;
use App\Repository\App\BookingRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct(public BookingRepository $bookingRepository){}

    public function search(Request $request): JsonResponse
    {
        $trajet = $this->bookingRepository->getBookings($request);
        if (count($trajet)){
            return response()->json([
                'trajets' => $trajet
            ], 200);
        }
        return response()->json([
            'message' => "Aucune information existance pour cette recherche"
        ]);
    }
}
