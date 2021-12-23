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
                    <form id="submit">
                        @include('app.components._form')
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
            <div id="errors"></div>
            <div class="row slide-button">
                <table class="table" id="dynamic-row"></table>
            </div>
            <div class="row slider-button">
                @foreach($companies as $company)
                    @include('app.components.card')
                @endforeach
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
                                    <tbody >
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
