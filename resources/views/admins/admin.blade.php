@extends('layouts.admin')

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
                    @include('admins.components._stat', [
                        'username' => "Utilisateurs",
                        'amount' => \App\Models\User::count()
                    ])
                    @include('admins.components._stat', [
                        'username' => "Companie",
                        'amount' => \App\Models\Company::count()
                    ])
                    @include('admins.components._stat', [
                        'username' => "Bus",
                        'amount' => \App\Models\Bus::count()
                    ])
                    @include('admins.components._stat', [
                        'username' => "Reservation",
                        'amount' => \App\Models\Booking::count()
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
