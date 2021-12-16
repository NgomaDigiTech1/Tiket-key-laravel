@extends('layouts.company')

@section('title')
    Ngoma Digitech
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row g-gs">
                    @include('companies.components._stat', [
                        'username' => "Chauffeurs",
                        'amount' => \App\Models\Driver::where('company_id', auth()->user()->company->id)->count()
                    ])
                    @include('companies.components._stat', [
                        'username' => "Nombre bus",
                        'amount' => \App\Models\Bus::where('company_id', auth()->user()->company->id)->count()
                    ])
                    @include('companies.components._stat', [
                        'username' => "Ville",
                        'amount' => \App\Models\Town::where('company_id', auth()->user()->company->id)->count()
                    ])
                    @include('companies.components._stat', [
                        'username' => "Reservation",
                        'amount' => \App\Models\Booking::where('company_id', auth()->user()->company->id)->count()
                    ])
                </div>

                <div class="row  g-gs">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-inner">
                                <div>
                                    <canvas
                                        class="sales-overview-chart chartjs-render-monitor"
                                        id="salesOverview"
                                    ></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(function(){
            let cData = JSON.parse(`<?php echo $data['chart_data'] ?>`);
            let ctx = $("#salesOverview");

            let data = {
                labels: cData.label,
                datasets: [
                    {
                        label: "Reservations",
                        data: cData.data,
                        backgroundColor: [
                            "#DEB887",
                            "#A9A9A9",
                            "#DC143C",
                            "#F4A460",
                            "#2E8B57",
                            "#1D7A46",
                            "#CDA776",
                        ],
                        borderColor: [
                            "#CDA776",
                            "#989898",
                            "#CB252B",
                            "#E39371",
                            "#1D7A46",
                            "#F4A460",
                            "#CDA776",
                        ],
                        borderWidth: [1, 1, 1, 1, 1,1,1]
                    }
                ]
            };

            var chart1 = new Chart(ctx, {
                type: "bar",
                data: data,
            });
        });
    </script>
@endsection
