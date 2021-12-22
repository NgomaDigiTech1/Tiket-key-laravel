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
                <div class="col-lg-8">
                    <div class="booking-confirmed booking-outer">
                        <div class="confirmation-title">
                            <div class="form-title form-title-1">
                                <h2>Congratulations your booking has been confirmed</h2>
                            </div>
                            <p>A confirmation email has been sent to your provided email address.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
