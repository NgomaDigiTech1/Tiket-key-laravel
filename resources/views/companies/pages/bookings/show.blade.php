@extends('layouts.company')

@section('title')
    Chauffeur
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between g-3">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">{{ $booking->trajet->starting_city  ?? "" }} / {{ $booking->trajet->arrival_city  ?? "" }}</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="preview-item">
                                        @if ($booking->confirmed == false)
                                            @include('admins.components.update', [
                                                'route' => 'company.book.confirmed',
                                                'callback' => $booking->key,
                                                'button' => 'btn-outline-success btn-sm',
                                                'icon' => 'ni-check-circle',
                                                'title' => 'Activer'
                                            ])
                                        @else
                                            @include('admins.components.update', [
                                                'route' => 'company.book.inactive',
                                                'callback' => $booking->key,
                                                'button' => 'btn-outline-danger btn-sm',
                                                'icon' => 'ni-check-circle',
                                                'title' => 'Désactiver'
                                            ])
                                        @endif
                                    </li>
                                    <li class="preview-item">
                                        <a href="{{ route('company.book.index') }}" class="btn btn-outline-secondary btn-sm d-none d-sm-inline-flex">
                                            <em class="icon ni ni-arrow-left"></em>
                                            <span>Back</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                @if($booking->status == false)
                    <div class="alert alert-danger alert-icon " role="alert">
                        <em class="icon ni ni-alert-circle"></em>
                        Cette reservation ne pas encore confirmer
                    </div>
                @endif
                <div class="nk-block nk-block-lg">
                    <div class="card">
                        <div class="card-inner">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal-info">
                                    <div class="nk-block">
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Prenom client</span>
                                                    <span class="profile-ud-value">{{ $booking->traveller->first_name ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Nom Client</span>
                                                    <span class="profile-ud-value">{{ $booking->traveller->name ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Telephone Client</span>
                                                    <span class="profile-ud-value">{{ $booking->traveller->phone_number ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Email Client</span>
                                                    <span class="profile-ud-value">{{ $booking->traveller->email ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Destination</span>
                                                    <span class="profile-ud-value">{{ $booking->trajet->arrival_city ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Provenance</span>
                                                    <span class="profile-ud-value">{{ $booking->trajet->starting_city ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Heure d'embarquement</span>
                                                    <span class="profile-ud-value">{{ $booking->trajet->start_time ?? "" }}</span>
                                                </div>
                                            </div>

                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Nom company</span>
                                                    <span class="profile-ud-value">{{ $booking->company->name_company ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Telephone company</span>
                                                    <span class="profile-ud-value">{{ $booking->company->phone_number ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Email company</span>
                                                    <span class="profile-ud-value">{{ $booking->company->email ?? "" }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
