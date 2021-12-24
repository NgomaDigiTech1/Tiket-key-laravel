@extends('layouts.other')

@section('content')
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Booking Confirmed</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Destinations</a></li>
                        <li class="breadcrumb-item"><a href="#">Bahamas Cruises</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Booking</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>

    <section class="booking">
        <div class="container">
            <div class="row" style="position: relative;">
                <div class="col-lg-12">
                    <div class="booking-confirmed booking-outer">
                        <div class="confirmation-title text-center">
                            <div class="form-title form-title-1 text-center">
                                <h2>Félicitations, votre réservation a été recu avec success</h2>
                            </div>
                            <p  class="text-center">Un courriel a été envoyé à l'adresse électronique que vous avez fournie. contenant les informations sur le paiement </p>
                        </div>
                    </div>
                    <div class="text-center justify-content-center">
                        <a href="{{ route('company.index') }}" class="btn-blue btn-red">Reserver encore</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
