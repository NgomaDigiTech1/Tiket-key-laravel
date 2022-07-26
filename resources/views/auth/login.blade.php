@extends('layouts.auth')

@section('title')
    Authentication
@endsection

@section('content')
    <div class="nk-wrap nk-wrap-nosidebar">
        <div class="nk-content ">
            <div class="nk-split nk-split-page nk-split-md">
                <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
                    <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                        <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                    </div>
                    <div class="nk-block nk-block-middle nk-auth-body">
                        <div class="brand-logo pb-5 pt-4">
                            <a href="{{ route('home.index') }}" class="logo-link">
                                <img
                                    src="{{ asset('assets/admins/images/logo.png') }}"
                                    alt="ticket key"
                                    height="70%"
                                    width="70%"
                                >
                            </a>
                        </div>
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title">Connexion</h5>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="email">Email</label>
                                </div>
                                <input
                                    type="text"
                                    class="form-control form-control-lg @error('email') error @enderror"
                                    id="email"
                                    placeholder="Enter your email address or username"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    autofocus
                                >
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="password">Mot de passe</label>
                                </div>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                    </a>
                                    <input
                                        type="password"
                                        class="form-control form-control-lg @error('email') error @enderror"
                                        id="password"
                                        placeholder="Enter your passcode"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg btn-primary btn-block">Connexion</button>
                            </div>
                            <div class="form-group">
                                Vous n'avez pas de compte?
                                <a href="{{route('register')}}">
                                    Inscrivez-vous.
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="nk-block nk-auth-footer">
                        <div class="mt-3">
                            <p>&copy; {{ now('Y')->format('Y') }} Ngoma digitech. Tout droit reserver.</p>
                        </div>
                    </div>
                </div>
                <div class="nk-split-content nk-split-stretch" style="background-image: url('{{ asset('assets/admins/images/login.jpg') }}');background-repeat: no-repeat; background-attachment: fixed; background-position: center"></div>
            </div>
        </div>
    </div>
@endsection
