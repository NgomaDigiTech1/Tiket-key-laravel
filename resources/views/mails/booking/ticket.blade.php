<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <link rel="shortcut icon" href="{{ asset('assets/admins/images/favicon ticket key.png') }}">
    <title>Invoice Print | DashLite Admin Template</title>
    <link rel="stylesheet" href="{{ asset('assets/admins/css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/admins/css/theme.css') }}">
</head>
<body class="bg-white" onload="printPromot()">
<div class="nk-block">
    <div class="invoice invoice-print">
        <div class="invoice-wrap">
            <div class="invoice-brand text-center">
                <img
                    src="{{ asset('storage/'.$booking->company->picture) }}"
                    srcset="{{ asset('storage/'.$booking->company->picture) }} }}2x"
                    alt="{{ $booking->code }}"
                >
            </div>
            <div class="invoice-head">
                <div class="invoice-contact">
                    <span class="overline-title">Invoice To</span>
                    <div class="invoice-contact-info">
                        <h4 class="title">{{ $booking->company->name_company ?? "" }}</h4>
                        <ul class="list-plain">
                            <li>
                                <em class="icon ni ni-map-pin-fill fs-18px"></em>
                                <span>{{ $booking->company->address ?? "" }}<br></span>
                            </li>
                            <li>
                                <em class="icon ni ni-call-fill fs-14px"></em>
                                <span>{{ $booking->company->phone_number }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="invoice-desc">
                    <h3 class="title">Invoice</h3>
                    <ul class="list-plain">
                        <li class="invoice-id">
                            <span>Invoice ID</span>:
                            <span>{{ $booking->transaction_code }}</span>
                        </li>

                        <li class="invoice-date">
                            <span>Date</span>:
                            <span>{{ $booking->created_at->format('Y-m-d') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="invoice-bills">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="w-150px">Code transaction</th>
                            <th class="w-60">Nom du client</th>
                            <th>Destination</th>
                            <th>Prix</th>
                            <th>Company</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $booking->transaction_code ?? "" }}</td>
                            <td>{{ $traveller->first_name ?? "" }}</td>
                            <td>{{ $booking->trajet->starting_city }}- {{ $booking->trajet->arrival_city }}</td>
                            <td>{{ $booking->prices ?? "" }}</td>
                            <td>{{ $booking->company->name_company ?? "" }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printPromot() {window.print();}</script>
</body>
</html>
