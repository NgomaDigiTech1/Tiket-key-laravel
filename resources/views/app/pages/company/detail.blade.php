@extends('layouts.other')

@section('content')
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ $company->name_company }}</h2>
                <h4 class="white">{{ $company->email }}</h4>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('company.index') }}">Companies</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail page</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>

    <section class="car-destinations">
        <div class="container">
            <div class="detail-content content-wrapper">
                <div class="align-items-center">
                    <div class="shadow-md rounded py-4">
                        <div class="mx-3 mb-3 text-center">
                            <h2 class="text-6 mb-4">
                                Ville de depart <small class="mx-2">to</small>Ville d'arriver
                            </h2>
                        </div>
                        <div class="text-1 bg-light-3 border border-right-0 border-left-0 py-2 px-3">
                            <div class="row">
                                <div class="col col-sm-3"><span class="d-none d-sm-block">Trajet</span></div>
                                <div class="col col-sm-2 text-center">Heure de depart</div>
                                <div class="col col-sm-3 text-center d-none d-sm-block">Price</div>
                            </div>
                        </div>
                        <div class="bus-list">
                            @foreach($company->trajets as $trajet)
                                <div class="bus-item">
                                    <div class="row align-items-sm-center flex-row py-4 px-3">
                                        <div class="col col-sm-3">
                                            <span class="text-3 text-dark operator-name">{{ $trajet->starting_city ?? "" }}</span>
                                            <span class="text-1 text-muted d-block">{{ $trajet->arrival_city ?? "" }}</span>
                                        </div>
                                        <div class="col col-sm-2 text-center time-info">
                                            <span class="text-4 text-dark">{{ $trajet->start_time ?? "" }}</span>
                                            <small class="text-muted d-block">{{ $trajet->starting_city ?? "" }}</small>
                                        </div>
                                        <div class="col-12 col-sm-3 align-self-center text-right text-sm-center mt-2 mt-sm-0">
                                            <div class="d-inline-block d-sm-block text-dark text-5 price mb-sm-1">{{ $trajet->getPrices() }}</div>
                                            <a href="{{ route('company.booking', $trajet->key) }}" class="btn btn-sm btn-outline-primary shadow-none" >
                                                <i class="fas fa-ellipsis-h d-none d-sm-block d-lg-none"></i>
                                                <span class="d-block d-sm-none d-lg-block">Book</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
