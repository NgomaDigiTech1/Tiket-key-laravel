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
            </div>
        </div>
    </div>
@endsection
