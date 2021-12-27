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
            <div class="row slide-button">
                <table class="table" id="dynamic-row"></table>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-wrapper">
                        @foreach($companies as $company)
                            <div class="blog-item grid-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="blog-image">
                                            <img
                                                src="{{ asset('storage/'. $company->picture) }}"
                                                width="70"
                                                height="90"
                                                alt="{{ $company->name_company ?? "" }}"
                                            >
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
                            <form id="submit">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <select name="depart" id="depart" class="form-control">
                                            <option value="0">Depart</option>
                                            @foreach($towns as $town)
                                                <option value="{{ $town->name_town }}">{{ $town->name_town ?? "" }}</option>
                                            @endforeach
                                        </select>
                                        <i class="flaticon-maps-and-flags"></i>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <select name="depart" id="arriver" class="form-control">
                                            <option value="0">Arriver</option>
                                            @foreach($towns as $town)
                                                <option value="{{ $town->name_town }}">{{ $town->name_town ?? "" }}</option>
                                            @endforeach
                                        </select>
                                        <i class="flaticon-maps-and-flags"></i>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="comment-btn">
                                            <button type="submit" class="btn-blue btn-red">Search Now</button>
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


@section('scripts')
    <script>
        $(document).ready(function(){
            $('#submit').submit(function (e){
                e.preventDefault();
                let data = {
                    depart: $('#depart').val(),
                    arriver: $('#arriver').val()
                }
                if (data) {
                    $.ajax({
                        url: `searchBooking/${data}`,
                        type: "get",
                        data: {data},
                        dataType:"json",
                        delay: 220,
                        success: function (response) {
                            let tableRow = '';
                            $('#dynamic-row').html('');
                            $.each(response.trajets, function (index, values) {
                                tableRow = `
                                    <tbody class="text-center">
                                        <tr>
                                            <th scope="row">`+values.starting_city+` - `+ values.arrival_city+`</th>
                                                 <td>`+values.start_time+`</td>
                                                 <td>`+values.company.name_company+`</td>
                                                 <td>`+values.prices+`FC</td>
                                                 <td>
                                                     <a href="/booking/${values.key}" class="btn btn-outline-primary">Book</a>
                                                 </td>
                                            </tr>
                                    </tbody>`
                                $('#dynamic-row').append(tableRow);
                            })
                        },
                        error: function (err) {
                            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
                        }
                    });
                }
            })
        });
    </script>
@endsection
