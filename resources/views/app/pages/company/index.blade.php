@extends('layouts.other')

@section('content')
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Nos companies</h2>
                <h4 class="white">Decouvrez la list des companie</h4>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nos companies</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>

    <section class="cars-destinations">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-wrapper">
                        @foreach($companies as $company)
                            <div class="blog-item grid-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="blog-image">
                                            <img src="{{ asset('storage/'. $company->picture) }}" alt="{{ $company->name_company ?? "" }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="destination-content">
                                            <h5><strong class="color-red-3">Tel: </strong> / {{ $company->phone_number ?? "" }}</h5>
                                            <h6>{{ $company->address ?? "" }}</h6>
                                            <h3>
                                                <a href="{{ route('company.detail', $company->name_company) }}">{{ $company->name_company ?? "" }}</a>
                                            </h3>
                                            <ul class="list">
                                                <li>{{ $company->email ?? "" }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div id="sidebar" class="col-lg-4">
                    <aside class="detail-sidebar sidebar-wrapper">
                        <div class="sidebar-item sidebar-item-dark">
                            <div class="detail-title">
                                <h3>Destination</h3>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="depart"
                                            placeholder="Flying from">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="return"
                                            placeholder="Flying To">
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="comment-btn">
                                            <a href="#" class="btn-blue btn-red">Search Now</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
