@extends('layouts.admin')

@section('title')
    Verification ticker de voyage
@endsection

@section('content')
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Liste des clients</h3>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="nk-block nk-block-lg">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                <tr class="nk-tb-item nk-tb-head text-center">
                                    <th class="nk-tb-col tb-col-mb">
                                        <span class="sub-text">Code</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Nom client</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Prenon client</span>
                                    </th>
                                    <th class="nk-tb-col tb-col-md">
                                        <span class="sub-text">Destination</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $traveller)
                                    <tr class="nk-tb-item text-center" id="lists-tickets">
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $traveller->transaction_code ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $traveller->traveller->name ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md">
                                            <span>{{ $traveller->traveller->first_name ?? "" }}</span>
                                        </td>
                                        <td class="nk-tb-col tb-col-md text-center">
                                            <span>{{ $traveller->trajet->starting_city ?? "" }}-{{ $traveller->trajet->arrival_city ?? "" }}</span>
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

@section('scripts')
    <script>
        $(document).ready(function(){
            let content = $('#lists-tickets').html('');
        });
    </script>
@endsection
