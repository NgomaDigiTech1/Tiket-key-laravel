@extends('layouts.other')

@section('content')
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>{{ $trajet->company->name_company }}</h2>
                <h4 class="white">{{ $trajet->company->email }}</h4>
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
            <div class="row">
                <div id="content" class="col-lg-8">
                    <div class="detail-content">
                        <div class="description detail-box car-book">
                            <div class="detail-title">
                                <h3>INFORMATIONS SUR LA RÉSERVATION</h3>
                            </div>
                            <div class="description-content">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>company name:</label>
                                        <input
                                            type="text"
                                            readonly
                                            class="form-control"
                                            value="{{ $trajet->company->name_company }}">
                                    </div>
                                    <div class="form-group col-lg-6 col-left-padding">
                                        <label>Ville de depart:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            readonly
                                            value="{{ $trajet->starting_city ?? "" }}"
                                        >
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Ville d'arriver:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            readonly
                                            value="{{  $trajet->arrival_city ?? ""  }}"
                                        >
                                    </div>
                                    <div class="form-group col-lg-6 col-left-padding">
                                        <label>Heure de depart:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            readonly
                                            value="{{ $trajet->start_time ?? "" }}"
                                        >
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Prix:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            readonly
                                            value="{{  $trajet->getPrices() ?? ""  }}"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="description detail-box car-book">
                            <div class="detail-title">
                                <h3>IDENTITE DU VOYAGEUR</h3>
                            </div>
                            <div class="description-content">
                                <form method="POST" action="{{ route('booking.company') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label>Votre nom:</label>
                                            <input
                                                type="text"
                                                class="form-control @error('first_name') is-invalid @enderror"
                                                id="first_name"
                                                name="first_name"
                                                value="{{ old('first_name') }}"
                                                placeholder="votre nom">
                                        </div>
                                        <div class="form-group col-lg-6 col-left-padding">
                                            <label>Votre Prenom:</label>
                                            <input
                                                type="text"
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="name"
                                                name="name"
                                                value="{{ old('name') }}"
                                                placeholder="votre prenom">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Votre email:</label>
                                            <input
                                                type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                                placeholder="votre email">
                                        </div>
                                        <div class="form-group col-lg-6 col-left-padding">
                                            <label>Votre numero telephone:</label>
                                            <input
                                                type="tel"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                id="phone_number"
                                                name="phone_number"
                                                value="{{ old('phone_number') }}"
                                                placeholder="votre numero de telephone">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label>Num Piece d'identiter:</label>
                                            <input
                                                type="number"
                                                class="form-control @error('id_number') is-invalid @enderror"
                                                id="id_number"
                                                name="id_number"
                                                value="{{ old('id_number') }}"
                                                placeholder="numero piece d'identiter">
                                        </div>
                                        <input type="hidden" name="trajet_key"  value="{{ $trajet->key }}">
                                    </div>
                                    <div class="comment-btn">
                                        <button type="submit" class="btn-blue btn-red">
                                            Reserver
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sidebar" class="col-lg-4">
                    <aside class="detail-sidebar sidebar-wrapper">
                        <div class="sidebar-item sidebar-helpline">
                            <div class="sidebar-helpline-content">
                                <h3>{{ $trajet->company->name_company }}</h3>
                                <p>
                                    {{ $trajet->company->description }}
                                </p>
                                <p><i class="flaticon-phone-call"></i> {{ $trajet->company->phone_number }}</p>
                                <p>
                                    <i class="flaticon-mail"></i>
                                    <span class="__cf_email__" >
                                        {{ $trajet->company->email }}
                                    </span>
                                </p>
                                <div>
                                    {!! $social !!}
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        div#social-links {
            max-width: 500px;
        }
        div#social-links ul li {
            display: inline-block;
        }
        div#social-links ul li a {
            color: #ffffff;
        }
    </style>
@endsection
