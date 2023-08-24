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
        th, td {
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

        .invoice-to {
            /* text-align: right; */
            /* float: right; */
        }
        /* .my-2 {
            margin-top: 25px;
            margin-bottom: 40px;
        } */
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
                <div class="col-sm-6"><strong>Date:</strong> 05/12/2020</div>
                <div class="col-sm-6 text-end"><strong>Invoice No:</strong> 16835</div>
            </div>
            <div class="row my-2 " style=" display: flex">
                <div class="col-sm-6">
                    <strong>Pay To:</strong>
                    <address>
                        Koice Inc<br>
                        2705 N. Enterprise St<br>
                        Orange, CA 92865<br>
                        contact@koiceinc.com
                    </address>
                </div>
                <div class="col-sm-6 invoice-to">
                    <strong>Invoiced To:</strong>
                    <address>
                        Smith Rhodes<br>
                        15 Hodges Mews, High Wycombe<br>
                        HP12 3JL<br>
                        United Kingdom
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
                                    <th class="col-4">Description</th>
                                    <th class="col-2 text-center">Rate</th>
                                    <th class="col-1 text-center">QTY</th>
                                    <th class="col-2 text-end">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="col-5 text-1">Creating a website design</td>
                                    <td class="col-2 text-center">$50.00</td>
                                    <td class="col-1 text-center">10</td>
                                    <td class="col-2 text-end">$500.00</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="text-1">Website Development</td>
                                    <td class="text-center">$120.00</td>
                                    <td class="text-center">10</td>
                                    <td class="text-end">$1200.00</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="text-1">Optimize the site for search engines (SEO)</td>
                                    <td class="text-center">$450.00</td>
                                    <td class="text-center">1</td>
                                    <td class="text-end">$450.00</td>
                                </tr>
                            </tbody>
                            <tfoot class="card-footer">
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Sub Total:</strong></td>
                                    <td class="text-end">$2150.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end"><strong>Tax:</strong></td>
                                    <td class="text-end">$215.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-end border-bottom-0"><strong>Total:</strong></td>
                                    <td class="text-end border-bottom-0">$2365.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="text-center mt-4">
            <p class="text-start mb-1"><strong>Description :</strong> This is computer generated receipt and does not require physical signature.</p>
            <p class="text-start"><strong>Note :</strong> This is computer generated receipt and does not require physical signature.</p>
        </footer>
    </div>
</body>
</html>
