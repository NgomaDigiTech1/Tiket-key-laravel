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
                                <form method="POST" action="{{ route('company.company.update', auth()->user()->company->key) }}" class="mt-2" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-gs">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="name_company">Nom Company</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="name_company"
                                                        name="name_company"
                                                        value="{{ auth()->user()->company->name_company }}"
                                                        placeholder="Nom administrateur"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="picture">Votre logo</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="file"
                                                        class="form-control"
                                                        id="picture"
                                                        name="picture"
                                                        value="{{ auth()->user()->company->picture }}"
                                                        placeholder="Prenom"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label" for="address">Addresse</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="address"
                                                        name="address"
                                                        value="{{ auth()->user()->company->address }}"
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
                                                        type="tel"
                                                        class="form-control"
                                                        id="phone_number"
                                                        name="phone_number"
                                                        value="{{ auth()->user()->company->phone_number }}"
                                                        placeholder="Numero telephone"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="email">Addresse email</label>
                                                <div class="form-control-wrap">
                                                    <input
                                                        type="email"
                                                        class="form-control"
                                                        id="email"
                                                        name="email"
                                                        value="{{ auth()->user()->company->email }}"
                                                        placeholder="picture"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="description">Description de votre entreprise</label>
                                                <div class="form-control-wrap">
                                                <textarea
                                                    class="form-control form-control-sm"
                                                    id="description"
                                                    name="description"
                                                    placeholder="Une breve description de votre entreprise">{{ auth()->user()->company->description }}</textarea>
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
                        <div class="tab-pane" id="admin">
                            <div class="card-inner pt-0">
                                <form method="POST" action="{{ route('company.admin.update', auth()->user()->key) }}" class="mt-2" enctype="multipart/form-data">
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
                                                        type="tel"
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
