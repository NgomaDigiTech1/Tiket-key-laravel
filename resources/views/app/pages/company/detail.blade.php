@extends('layouts.app')

@section('content')
    <section class="mt-5 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 text-center">
                    <h1>Bus - List Page</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="col-md-9 mt-4 mt-md-0">
        <div class="bg-white shadow-md rounded py-4">
            <div class="mx-3 mb-3 text-center">
                <h2 class="text-6 mb-4">Mumbai <small class="mx-2">to</small>Surat</h2>
            </div>
            <div class="text-1 bg-light-3 border border-right-0 border-left-0 py-2 px-3">
                <div class="row">
                    <div class="col col-sm-3"><span class="d-none d-sm-block">Operators</span></div>
                    <div class="col col-sm-2 text-center">Departure</div>
                    <div class="col-sm-2 text-center d-none d-sm-block">Duration</div>
                    <div class="col col-sm-2 text-center">Arrival</div>
                    <div class="col col-sm-3 text-center d-none d-sm-block">Price</div>
                </div>
            </div>
            <div class="bus-list">
                <div class="bus-item">
                    <div class="row align-items-sm-center flex-row py-4 px-3">
                        <div class="col col-sm-3"> <span class="text-3 text-dark operator-name">AK Tour &amp; Travels</span> <span class="text-1 text-muted d-block">AC Sleeper</span> </div>
                        <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
                        <div class="col col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
                        <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
                        <div class="col-12 col-sm-3 align-self-center text-right text-sm-center mt-2 mt-sm-0">
                            <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">$250</div>
                            <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-toggle="modal" data-target="#select-busseats"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-toggle="tooltip" title="" data-original-title="Select Seats"></i> <span class="d-block d-sm-none d-lg-block">Select Seats</span></a> </div>
                    </div>
                </div>
                <div class="bus-item">
                    <div class="row align-items-sm-center flex-row py-4 px-3">
                        <div class="col col-sm-3"> <span class="text-3 text-dark operator-name">Gujarat Travels</span> <span class="text-1 text-muted d-block">AC Sleeper</span> </div>
                        <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
                        <div class="col col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
                        <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
                        <div class="col-12 col-sm-3 align-self-center text-right text-sm-center mt-2 mt-sm-0">
                            <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">$195</div>
                            <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-toggle="modal" data-target="#select-busseats"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-toggle="tooltip" title="" data-original-title="Select Seats"></i> <span class="d-block d-sm-none d-lg-block">Select Seats</span></a> </div>
                    </div>
                </div>
                <div class="bus-item">
                    <div class="row align-items-sm-center flex-row py-4 px-3">
                        <div class="col col-sm-3"> <span class="text-3 text-dark operator-name">Shrinath Travels</span> <span class="text-1 text-muted d-block">AC Sleeper</span> </div>
                        <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
                        <div class="col col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
                        <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
                        <div class="col-12 col-sm-3 align-self-center text-right text-sm-center mt-2 mt-sm-0">
                            <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">$221</div>
                            <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-toggle="modal" data-target="#select-busseats"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-toggle="tooltip" title="" data-original-title="Select Seats"></i> <span class="d-block d-sm-none d-lg-block">Select Seats</span></a> </div>
                    </div>
                </div>
                <div class="bus-item">
                    <div class="row align-items-sm-center flex-row py-4 px-3">
                        <div class="col col-sm-3"> <span class="text-3 text-dark operator-name">Vikas Travels</span> <span class="text-1 text-muted d-block">AC Sleeper</span> </div>
                        <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
                        <div class="col col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
                        <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
                        <div class="col-12 col-sm-3 align-self-center text-right text-sm-center mt-2 mt-sm-0">
                            <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">$245</div>
                            <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-toggle="modal" data-target="#select-busseats"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-toggle="tooltip" title="" data-original-title="Select Seats"></i> <span class="d-block d-sm-none d-lg-block">Select Seats</span></a> </div>
                    </div>
                </div>
                <div class="bus-item">
                    <div class="row align-items-sm-center flex-row py-4 px-3">
                        <div class="col col-sm-3"> <span class="text-3 text-dark operator-name">VTK Travels</span> <span class="text-1 text-muted d-block">AC Sleeper</span> </div>
                        <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">12:00</span> <small class="text-muted d-block">Mumbai</small> </div>
                        <div class="col col-sm-2 text-center d-none d-sm-block time-info"> <span class="text-3 duration">06h 32m</span> <small class="text-muted d-block">12 Stops</small> </div>
                        <div class="col col-sm-2 text-center time-info"> <span class="text-4 text-dark">05:15</span> <small class="text-muted d-block">Surat</small> </div>
                        <div class="col-12 col-sm-3 align-self-center text-right text-sm-center mt-2 mt-sm-0">
                            <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">$199</div>
                            <a href="#" class="btn btn-sm btn-outline-primary shadow-none" data-toggle="modal" data-target="#select-busseats"><i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none" data-toggle="tooltip" title="" data-original-title="Select Seats"></i> <span class="d-block d-sm-none d-lg-block">Select Seats</span></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
