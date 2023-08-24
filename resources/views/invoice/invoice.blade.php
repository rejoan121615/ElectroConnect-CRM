<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container-fluid {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        header {
            border-bottom: 1px solid #ccc;
            margin-bottom: 20px;
            padding-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header img {
            max-width: 150px;
        }

        main {
            /* border-bottom: 1px solid #ccc; */
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
        }

        address {
            font-style: normal;
        }

        .card {
            border: none;
            border-radius: 0;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f8f8f8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-end {
            text-align: right;
        }

        .card-footer {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        footer {
            border-top: 1px solid #ccc;
            padding-top: 10px;
            font-size: 14px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .text-right {
            text-align: right;
        }


    </style>
</head>

<body>
    <div class="container-fluid invoice-container">
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
            
            <table>
                <tr>
                    <td>
                        <strong>Pay To:</strong>
                    <address>
                        ElectroConnects Shop<br>
                        info@electro-connect.com<br>
                        +8801648957868 <br>
                        Road-5, BLock-C, Section-6<br>
                        Mirpur-1216, Dhaka<br>
                    </address>
                    </td>
                    <td class=" text-right">
                        <strong>Invoiced To:</strong>
                        <address>
                            {{ $sale->customer->name }}<br>
                            {{ $sale->customer->phone }}<br>
                            {{ $sale->customer->email }}<br>
                            {{ $sale->customer->address }}<br>
                        </address>
                    </td>
                </tr>
            </table>
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="card-header">
                                <tr>
                                    <th colspan="3">Item No</th>
                                    <th class="col-4">Description</th>
                                    <th class="col-2 text-center">Rate</th>
                                    <th class="col-1 text-center">QTY</th>
                                    <th class="col-2 text-end">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale->sale_details as $serial=>$item )
                                    <tr>
                                        <td colspan="3">{{ $serial + 1 }}</td>
                                        <td class="col-5 text-1">{{ $item->products->name }}</td>
                                        <td class="col-2 text-center">{{ $item->price }}</td>
                                        <td class="col-1 text-center">{{ $item->quantity }}</td>
                                        <td class="col-2 text-end">{{ $item->quantity * $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="card-footer">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="4" class="text-end"><strong>Sub Total:</strong></td>
                                    <td class="text-end">{{ $sale->paid_amount }} Tk</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="4" class="text-end"><strong>Tax (0%):</strong></td>
                                    <td class="text-end">0.00 Tk</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
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
            <p class="text-start"><strong>Note :</strong> This is computer generated receipt and does not require
                physical signature.</p>
        </footer>
    </div>
</body>
</html>
