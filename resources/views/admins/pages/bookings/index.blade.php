@extends('layouts.admin')

@section('title')
    Reservations
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Nos reservations</h3>
                    </div>
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li class="preview-item">
                                        <a href="#" class="btn btn-dim btn-secondary btn-sm">
                                            <em class="icon ni ni-histroy mr-1"></em> Historique
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                <tr class="nk-tb-item nk-tb-head">
                                    <th class="nk-tb-col tb-col-mb">
                                        <span class="sub-text">Ville de depart</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Ville d'arriver</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Prix</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Nom du client</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Status</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">companie</span>
                                    </th>
                                    <th class="nk-tb-col nk-tb-col-tools text-right">
                                        <span class="sub-text">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookings as $booking)
                                    <tr class="nk-tb-item">
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $booking->trajet->starting_city ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $booking->trajet->arrival_city ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $booking->trajet->getPrices() ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ strtoupper($booking->traveller->name) ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            @if($booking->status)
                                                <span class="badge badge-dot badge-dot-xs badge-success">Active</span>
                                            @else
                                                <span class="badge badge-dot badge-dot-xs badge-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ strtoupper($booking->company->name_company) ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown">
                                                            <em class="icon ni ni-more-h"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                @if(auth()->user()->role_id == 2)
                                                                    <li>
                                                                        <a href="{{ route('admin.booking.show', $booking->key) }}">
                                                                            <em class="icon ni ni-edit"></em>
                                                                            <span>Voir</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <form action="{{ route('admin.booking.destroy', $booking->key) }}" method="POST" onsubmit="return confirm('Voulez vous supprimer');">
                                                                            @method('DELETE')
                                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                            <button type="submit" class="btn btn-dim">
                                                                                <em class="icon ni ni-lock-alt"></em>
                                                                                <span>Supprimer</span>
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
