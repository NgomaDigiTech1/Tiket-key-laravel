@extends('layouts.company')

@section('title')
    {{ auth()->user()->company->name_company }}
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Configuration de l'application</h3>
                    </div>
                </div>
                <div class="justify-content text-center p-2">
                    <img
                        src="{{ asset('storage/'.auth()->user()->company->picture) }}"
                        alt="{{ auth()->user()->company->name_company }}"
                        class="img-fluid img-thumbnail rounded"
                        height="20%"
                        width="20%"
                    >
                </div>
            </div>
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered">
                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#site">
                                <em class="icon ni ni-laptop"></em>
                                <span>Configuration Agence</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#admin">
                                <em class="icon ni ni-user-alt"></em>
                                <span>Configuration administrateur</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="site">
                            <div class="card-inner pt-0">
                                <form action="#" class="gy-3 form-settings">
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="comp-name">Company Name</label>
                                                <span class="form-note">Specify the name of your Company.</span></div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="comp-name" value="Company Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-lg-7">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane" id="admin">
                            <div class="card-inner pt-0">
                                <form action="#" class="mt-2">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-gs">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Nom</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="name"
                                                        name="name"
                                                        value="{{ auth()->user()->name }}"
                                                        placeholder="Nom administrateur"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="first_name">Prenom</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="first_name"
                                                        name="first_name"
                                                        value="{{ auth()->user()->first_name }}"
                                                        placeholder="Prenom"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="email">Addresse email</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="email"
                                                        class="form-control"
                                                        id="email"
                                                        name="email"
                                                        value="{{ auth()->user()->email }}"
                                                        placeholder="Prenom"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="phone_number">Numero telephone</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="date"
                                                        class="form-control"
                                                        id="phone_number"
                                                        name="phone_number"
                                                        value="{{ auth()->user()->phone_number }}"
                                                        placeholder="Numero telephone"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="picture">Numero telephone</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="file"
                                                        class="form-control"
                                                        id="picture"
                                                        name="picture"
                                                        value="{{ auth()->user()->picture }}"
                                                        placeholder="picture"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="password">Mot de passe</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="password"
                                                        class="form-control"
                                                        id="password"
                                                        name="password"
                                                        placeholder="Mot de passe"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Enregistrer</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
