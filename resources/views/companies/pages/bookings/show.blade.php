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
                        <h3 class="nk-block-title page-title">Chauffeur / {{ $driver->name ?? "" }}</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <a href="{{ route('admin.drivers.index') }}" class="btn btn-outline-light btn-sm bg-white d-none d-sm-inline-flex">
                            <em class="icon ni ni-arrow-left"></em>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="nk-block nk-block-lg">
                    <div class="justify-content text-center p-2">
                        <img
                            src="{{ asset('storage/'.$driver->picture) }}"
                            alt="{{ $driver->name_company }}"
                            class="img-fluid img-thumbnail rounded"
                            height="20%"
                            width="20%"
                        >
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personal-info">
                                    <div class="nk-block">
                                        <div class="profile-ud-list">
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Non chauffeur</span>
                                                    <span class="profile-ud-value">{{ $driver->first_name ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Prenom chauffeur</span>
                                                    <span class="profile-ud-value">{{ $driver->name ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Age chauffeur</span>
                                                    <span class="profile-ud-value">{{ $driver->age ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Telephone</span>
                                                    <span class="profile-ud-value">{{ $driver->phone_number ?? "" }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-ud-item">
                                                <div class="profile-ud wider">
                                                    <span class="profile-ud-label">Travail chez</span>
                                                    <span class="profile-ud-value">{{ $driver->company->name_company }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-3 text-center">
                                            @if($driver->deleted_at)
                                                <form action="{{ route('admin.driver.restore', $driver->key) }}" method="POST" class="d-inline">
                                                    @method('PUT')
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-sm btn-outline-warning">
                                                        <em class="icon ni ni-undo"></em>
                                                        <span>Restaurer</span>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.driver.force', $driver->key) }}" method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <em class="icon ni ni-cross-circle"></em> Supprimer
                                                    </button>
                                                </form>
                                            @endif
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
