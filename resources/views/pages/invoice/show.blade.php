@extends('layouts.dashboard')

@section('css')
    <style>
        #invoice-wrap {
            background-color: white;
            padding: 60px 40px;
            margin-bottom: 80px;
        }

        #invoice-wrap body {
            font-family: Arial, sans-serif;
        }

        #invoice-wrap .container-fluid {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        #invoice-wrap header {
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #invoice-wrap header img {
            max-width: 150px;
        }

        #invoice-wrap main {
            /* border-bottom: 1px solid #ccc; */
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        #invoice-wrap .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        #invoice-wrap strong {
            font-weight: bold;
        }

        #invoice-wrap address {
            font-style: normal;
        }

        #invoice-wrap .card {
            border: none;
            border-radius: 0;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        #invoice-wrap .card-header {
            background-color: #f8f8f8;
        }

        #invoice-wrap table {
            width: 100%;
            border-collapse: collapse;
        }

        #invoice-wrap th,
        #invoice-wrap td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        #invoice-wrap th {
            font-weight: bold;
        }

        #invoice-wrap .text-center {
            text-align: center;
        }

        #invoice-wrap .text-end {
            text-align: right;
        }

        #invoice-wrap .card-footer {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        #invoice-wrap footer {
            border-top: 1px solid #ccc;
            padding-top: 10px;
            font-size: 14px;
        }

        #invoice-wrap .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #invoice-wrap .invoice-to {
            text-align: right;
        }

        #invoice-wrap .my-2 {
            margin-top: 25px;
            margin-bottom: 40px;
        }
    </style>
@endsection

@section('content')
    {{-- buttons  --}}
    <div class="row mb-3 ">
        <div class="col-6">
            <a href="{{ route('invoice.index') }}" class=" btn btn-danger"><i class="bi bi-chevron-left me-2 "></i> Back</a>
        </div>
        <div class="col-6 text-end ">
            <a href="" class=" btn btn-primary me-4 ">Print <i class="bi bi-printer ms-2 "></i></a>
            <a href="{{ route('invoice.download', $sale->id) }}" class=" btn btn-success ">Download <i
                    class="bi bi-download ms-2 "></i></a>
        </div>
    </div>
    <div class="container-fluid invoice-container" id="invoice-wrap">
        <header>
            <div>
                {{-- <img id="logo" src="{{ asset('assets/static/images/logo/computer.jpg') }}" title="Koice" alt="Koice" /> --}}
            </div>
            <div>
                <h2 class="text-7 mb-0">Invoice</h2>
            </div>
        </header>
        <main>
            <div class="row">
                @php
                    $dateTime = new DateTime($sale->created_at);
                    $formattedDate = $dateTime->format('d/m/Y');
                @endphp
                <div class=" col-6 "><strong>Date:</strong> {{ $formattedDate }} </div>
                <div class="col-6 text-end">
                    <div>
                        <strong>Invoice No:</strong> {{ $sale->id }}
                    </div>
                </div>
            </div>
            <div class="row my-2 ">
                <div class="col-sm-6">
                    <strong>Pay To:</strong>
                    <address>
                        ElectroConnects Shop<br>
                        info@electro-connect.com<br>
                        +8801648957868 <br>
                        Road-5, BLock-C, Section-6<br>
                        Mirpur-1216, Dhaka<br>
                    </address>
                </div>
                <div class="col-sm-6 invoice-to">
                    <strong>Invoiced To:</strong>
                    <address>
                        {{ $sale->customer->name }}<br>
                        {{ $sale->customer->phone }}<br>
                        {{ $sale->customer->email }}<br>
                        {{ $sale->customer->address }}<br>
                    </address>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="card-header">
                                <tr>
                                    <th>Item No</th>
                                    <th class="col-4">Product Name</th>
                                    <th class="col-2 text-center">Rate Per Piece</th>
                                    <th class="col-1 text-center">QTY</th>
                                    <th class="col-2 text-end">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale->sale_details as $serial=>$item )
                                    <tr>
                                        <td>{{ $serial + 1 }}</td>
                                        <td class="col-5 text-1">{{ $item->products->name }}</td>
                                        <td class="col-2 text-center">{{ $item->price }}</td>
                                        <td class="col-1 text-center">{{ $item->quantity }}</td>
                                        <td class="col-2 text-end">{{ $item->quantity * $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="card-footer">
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Sub Total:</strong></td>
                                    <td class="text-end">{{ $sale->paid_amount }} Tk</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Tax (0%):</strong></td>
                                    <td class="text-end">0.00 Tk</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end border-bottom-0"><strong>Total:</strong></td>
                                    <td class="text-end border-bottom-0">{{ $sale->paid_amount }} Tk</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="text-center mt-4">
            <p class="text-start mb-1"><strong>Description :</strong> This is computer generated receipt and does not
                require physical signature.</p>
            <p class="text-start"><strong>Note :</strong> This is computer generated receipt and does not require physical
                signature.</p>
        </footer>
    </div>
@endsection
