@extends('layouts.app')

@section('title')
    Travelling safely
@endsection

@section('content')
    <section id="home_banner" class="banner-style-1 banner-with-form">
        <div id="js_frm_040" class="carousel slide ps_control_hrbrarrow swipe_x ps_easeOutQuint" data-ride="carousel" data-pause="hover" data-interval="4000" data-duration="2000">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/admins/images/3.jpg') }}" alt="js_frm_040_01" />
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/admins/images/3.jpg') }}" alt="js_frm_040_02" />
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/admins/images/3.jpg') }}" alt="js_frm_040_03" />
                </div>
            </div>
            <div class="js_frm_subscribe">
                <div class="kenburns_061_slide slider-content">
                    <h1>Travelling safely</h1>
                    <h2>Where would you like to go?</h2>
                </div>
                <div class="search-content-slider">
                    <form>
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="table_item">
                                    <div class="form-group">
                                        <select name="depart" class="form-control">
                                            <option value="0">Depart</option>
                                            @foreach($towns as $town)
                                                <option value="{{ $town->name_town }}">{{ $town->name_town ?? "" }}</option>
                                            @endforeach
                                        </select>
                                        <i class="flaticon-maps-and-flags"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="table_item">
                                    <div class="form-group">
                                        <select name="arriver" class="form-control">
                                            <option value="0">Arriver</option>
                                            @foreach($towns as $town)
                                                <option value="{{ $town->name_town }}">{{ $town->name_town ?? "" }}</option>
                                            @endforeach
                                        </select>
                                        <i class="flaticon-maps-and-flags"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="table_item">
                                    <div class="search">
                                        <button type="submit" class="btn-blue btn-red btn-style-1">SEARCH</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a class="left carousel-control" href="#js_frm_040" role="button" data-slide="prev">
                <span class="fa fa-arrow-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#js_frm_040" role="button" data-slide="next">
                <span class="fa fa-arrow-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section class="popular-packages">
        <div class="container">
            <div class="section-title text-center">
                <h2>Our Companies</h2>
                <div class="section-icon">
                    <i class="flaticon-diamond"></i>
                </div>
                <p>Select the company of your choice and travel safely..</p>
            </div>
            <div class="row slider-button">
                @foreach($companies as $company)
                    <div class="col-lg-6">
                        <div class="package-item box-item">
                            <div class="package-image">
                                <img src="{{ asset('storage/'.$company->picture) }}" alt="Image">
                            </div>
                            <div class="package-content">
                                <h4>{{ $company->name_company ?? "" }}</h4>
                                <div class="package-price">
                                    <p><span>Tel</span> / {{ $company->phone_number ?? "" }} </p>
                                </div>
                                <p>{{ $company->description ?? "Une breve description de cette company" }}</p>
                                <div class="package-info">
                                    <a
                                        href="{{ route('company.detail',$company->name_company) }}"
                                        class="btn-blue btn-red btn-style-1"
                                    >View more details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
