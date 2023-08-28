@extends('layouts.dashboard', ['pageTitle' => 'Home'])


@section('css')
    <link rel="stylesheet" href="./assets/compiled/css/app.css" />
    <link rel="stylesheet" href="./assets/compiled/css/app-dark.css" />
    <link rel="stylesheet" href="./assets/compiled/css/iconly.css" />
@endsection

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12 ">
                <h5 class=" mb-3 ">Overview of this year</h5>
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon green mb-2">
                                            <i class="bi bi-box"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Sold Quantity</h6>
                                        <h6 class="font-extrabold mb-0">{{ $soldAmount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon purple mb-2">
                                            <i class="bi bi-basket" style=" margin-top: -15px; margin-left: -5px;"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">
                                            Sold Amount
                                        </h6>
                                        <h6 class="font-extrabold mb-0">{{ $totalSell }}Tk</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon blue mb-2">
                                            <i class="bi bi-bar-chart-line"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Profit</h6>
                                        <h6 class="font-extrabold mb-0">{{ $profit }} Tk</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Total Customer</h6>
                                        <h6 class="font-extrabold mb-0">{{ $customer }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-6 col-lg-3 col-md-6">
                  <a href="" class=" btn btn-outline-danger ">Generate more report <i class="bi bi-arrow-up-right-square ms-2" ></i></a>
                </div> --}}
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Sale Tracker</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Meeting List</h4>
                                
                            </div>
                            <div class="card-body"></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>





    </div>
    </div>
    </div>
    </section>
@endsection


@section('scripts')
    <script src="{{ asset('assets/extensions/apexcharts.min.js') }}"></script>
    <script>
    var options = {
          series: [{{ $totalSell }}, {{ $profit }}],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Sold Amount', 'Total Profit'],
        };

        var chart = new ApexCharts(document.querySelector("#chart-profile-visit"), options);
        chart.render();
    </script>
@endsection
