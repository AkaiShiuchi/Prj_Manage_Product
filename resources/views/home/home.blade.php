@extends('home.layouts')

@section('title', 'DashBoard')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-jvectormap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jqvmap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fonts/Material-Design-Iconic-Font.ttf') }}">
    <link rel="stylesheet" href="{{ asset('fonts/Material-Design-Iconic-Font.woff') }}">
    <link rel="stylesheet" href="{{ asset('fonts/Material-Design-Iconic-Font.woff2') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endsection

@section('content')
    <div class="be-wrapper be-fixed-sidebar">
        <nav class="navbar navbar-expand fixed-top be-top-header">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="img nav-link" href="/home"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/home">DashBoard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product-manage">Product Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/purchase-manage">Purchases Manage</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/register"><span class="fas fa-user"></span> Sign Up</a></li>
                    <li><a href="/"><span class="fas fa-sign-in-alt"></span> Login</a></li>
                    <li><a href="/logout"><span class="fas fa-sign-out-alt"></span> Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="be-content">
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile">
                            <div class="chart sparkline" id="spark1"></div>
                            <div class="data-info">
                                <div class="desc">New Users</div>
                                <div class="value">
                                    <span class="indicator indicator-equal mdi mdi-chevron-right"></span>
                                    <span class="number" data-toggle="counter" data-end="{{ $user_count }}">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile">
                            <div class="chart sparkline" id="spark2"></div>
                            <div class="data-info">
                                <div class="desc">Monthly Sales</div>
                                <div class="value">
                                    <span class="indicator indicator-positive mdi mdi-chevron-up"></span>
                                    <span class="number" data-toggle="counter" data-end="" data-suffix="%">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile">
                            <div class="chart sparkline" id="spark3"></div>
                            <div class="data-info">
                                <div class="desc">Orders Sold</div>
                                <div class="value">
                                    <span class="indicator indicator-positive mdi mdi-chevron-up"></span>
                                    <span class="number" data-toggle="counter" data-end="{{ $purchase_count }}">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile">
                            <div class="chart sparkline" id="spark4"></div>
                            <div class="data-info">
                                <div class="desc">Downloads</div>
                                <div class="value">
                                    <span class="indicator indicator-negative mdi mdi-chevron-down"></span>
                                    <span class="number" data-toggle="counter" data-end="">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget widget-fullwidth be-loading">
                            <div class="widget-head">
                                <div class="tools">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown">
                                            <span class="icon mdi mdi-more-vert d-inline-block d-md-none"></span>
                                        </a>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="#">Week</a>
                                            <a class="dropdown-item" href="#">Month</a>
                                            <a class="dropdown-item" href="#">Year</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Today</a>
                                        </div>
                                    </div>
                                    <span class="icon mdi mdi-chevron-down"></span>
                                    <span class="icon toggle-loading mdi mdi-sync"></span>
                                    <span class="icon mdi mdi-close"></span>
                                </div>
                                <div class="button-toolbar d-none d-md-block">
                                    <div class="btn-group">
                                        <button class="btn btn-secondary" type="button">Week</button>
                                        <button class="btn btn-secondary active" type="button">Month</button>
                                        <button class="btn btn-secondary" type="button">Year</button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-secondary" type="button">Today</button>
                                    </div>
                                </div><span class="title">Recent Movement</span>
                            </div>
                            <div class="widget-chart-container">
                                <div class="widget-chart-info">
                                    <ul class="chart-legend-horizontal">
                                        <li><span data-color="main-chart-color1"></span> Purchases</li>
                                        <li><span data-color="main-chart-color2"></span> Plans</li>
                                        <li><span data-color="main-chart-color3"></span> Services</li>
                                    </ul>
                                </div>
                                <div class="widget-counter-group widget-counter-group-right">
                                    <div class="counter counter-big">
                                        <div class="value">25%</div>
                                        <div class="desc">Purchase</div>
                                    </div>
                                    <div class="counter counter-big">
                                        <div class="value">5%</div>
                                        <div class="desc">Plans</div>
                                    </div>
                                    <div class="counter counter-big">
                                        <div class="value">5%</div>
                                        <div class="desc">Services</div>
                                    </div>
                                </div>
                                <div id="main-chart" style="height: 260px;"></div>
                            </div>
                            <div class="be-spinner">
                                <svg width="40px" height="40px" viewbox="0 0 66 66"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle class="circle" fill="none" stroke-width="4" stroke-linecap="round"
                                        cx="33" cy="33" r="30">
                                    </circle>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="card card-table">
                            <div class="card-header">
                                <div class="tools dropdown"> <span class="icon mdi mdi-download"></span>
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <span class="icon mdi mdi-dots-vertical"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" role="menu"
                                        x-placement="bottom-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                    </div>
                                </div>
                                <div class="title">Purchases</div>
                            </div>
                            <div class="card-body table-responsive" style="height: 301px;">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">STT</th>
                                            <th style="width: 35%;">Name Product</th>
                                            <th style="width: 15%;">Customer</th>
                                            <th style="width: 15%;">Quantity</th>
                                            <th style="width: 15%;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchases as $pur)
                                            <?php $sum_quantity = 0; ?>
                                            @foreach ($pur->products as $prod)
                                                <?php $sum_quantity += $prod->pivot->quantity; ?>
                                            @endforeach

                                            <tr class="odd" id="tr">
                                                <td><span class="fw-medium"></span></td>
                                                <td class="sorting_1">
                                                    @foreach ($pur->products as $key => $product)
                                                        {{ $product->name }}
                                                        @if ($key < count($pur->products) - 1)
                                                            ,
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div
                                                        class="d-flex justify-content-start align-items-center order-name text-nowrap">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="m-0">
                                                                {{ $pur->user->name }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $sum_quantity }}
                                                </td>
                                                <td>
                                                    <h6
                                                        class="mb-0 w-px-100 {{ $pur->status === 'pending' ? 'text-warning' : 'text-success' }}">
                                                        <i class="bx bxs-circle fs-tiny me-2"></i>{{ $pur->status }}
                                                    </h6>
                                                </td>
                                                {{-- <td>
                                                    <div class="d-flex justify-content-sm-center align-items-sm-center">
                                                        <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end m-0" style="">
                                                            <a href="{{ route('detail_purchase', ['id' => $pur->id]) }}"
                                                                class="dropdown-item">View</a>
                                                            <button type="button" data-toggle="modal"
                                                                data-target="#deletePurchase"
                                                                data-delete-id="{{ $pur->id }}"
                                                                class="dropdown-item delete-record">Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-header card-header-divider pb-3">Current Progress</div>
                            <div class="card-body pt-5">
                                <div class="row user-progress user-progress-small">
                                    <div class="col-lg-5"><span class="title">Bootstrap Admin</span></div>
                                    <div class="col-lg-7">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width: 40%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row user-progress user-progress-small">
                                    <div class="col-lg-5"><span class="title">Custom Work</span></div>
                                    <div class="col-lg-7">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width: 65%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row user-progress user-progress-small">
                                    <div class="col-lg-5"><span class="title">Clients Module</span></div>
                                    <div class="col-lg-7">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width: 30%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row user-progress user-progress-small">
                                    <div class="col-lg-5"><span class="title">Email Templates</span></div>
                                    <div class="col-lg-7">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width: 80%;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row user-progress user-progress-small">
                                    <div class="col-lg-5"><span class="title">Plans Module</span></div>
                                    <div class="col-lg-7">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" style="width: 45%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="widget be-loading">
                            <div class="widget-head">
                                <div class="tools">
                                    <span class="icon mdi mdi-chevron-down"></span>
                                    <span class="icon mdi mdi-sync toggle-loading"></span>
                                    <span class="icon mdi mdi-close"></span>
                                </div>
                                <div class="title">Top Products</div>
                            </div>
                            <div class="card-body table-responsive" style="height: 270px;">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th style="width:5;">STT</th>
                                            <th style="width:20%;">Name</th>
                                            <th style="width:30%;">Describe</th>
                                            <th style="width:20%;">Quantity Sold</th>
                                            <th style="width:20%;">Category</th>
                                        </tr>
                                    </thead>
                                    <tbody class="no-border-x" style="overflow-y: auto;">
                                        @foreach ($top_products as $top)
                                            <tr id="tr2">
                                                <td><span class="fw-medium"></span></td>
                                                <td>{{ $top->name }}</td>
                                                <td class="number">{{ $top->describe }}</td>
                                                <td>{{ $top->total }}</td>
                                                <td class="text-success">{{ $top->category->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="be-spinner">
                                <svg width="40px" height="40px" viewbox="0 0 66 66"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle class="circle" fill="none" stroke-width="4" stroke-linecap="round"
                                        cx="33" cy="33" r="30">
                                    </circle>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="widget widget-calendar">
                            <div id="calendar-widget"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">Latest Activity</div>
                            <div class="card-body">
                                <ul class="user-timeline user-timeline-compact">
                                    <li class="latest">
                                        <div class="user-timeline-date">Just Now</div>
                                        <div class="user-timeline-title">Create New Page</div>
                                        <div class="user-timeline-description">Vestibulum lectus nulla, maximus in eros
                                            non, tristique.
                                        </div>
                                    </li>
                                    <li>
                                        <div class="user-timeline-date">Today - 15:35</div>
                                        <div class="user-timeline-title">Back Up Theme</div>
                                        <div class="user-timeline-description">Vestibulum lectus nulla, maximus in eros
                                            non, tristique.
                                        </div>
                                    </li>
                                    <li>
                                        <div class="user-timeline-date">Yesterday - 10:41</div>
                                        <div class="user-timeline-title">Changes In The Structure</div>
                                        <div class="user-timeline-description">Vestibulum lectus nulla, maximus in eros
                                            non, tristique.
                                        </div>
                                    </li>
                                    <li>
                                        <div class="user-timeline-date">Yesterday - 3:02</div>
                                        <div class="user-timeline-title">Fix the Sidebar</div>
                                        <div class="user-timeline-description">Vestibulum lectus nulla, maximus in eros
                                            non, tristique.
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="widget be-loading">
                            <div class="widget-head">
                                <div class="tools">
                                    <span class="icon mdi mdi-chevron-down"></span>
                                    <span class="icon mdi mdi-sync toggle-loading"></span>
                                    <span class="icon mdi mdi-close"></span>
                                </div>
                                <div class="title">Conversions</div>
                            </div>
                            <div class="widget-chart-container">
                                <div class="widget-chart-info mb-4">
                                    <div class="indicator indicator-positive float-right">
                                        <span class="icon mdi mdi-chevron-up"></span>
                                        <span class="number">15%</span>
                                    </div>
                                    <div class="counter counter-inline">
                                        <div class="value">156k</div>
                                        <div class="desc">Impressions</div>
                                    </div>
                                </div>
                                <div id="map-widget" style="height: 265px;"></div>
                            </div>
                            <div class="be-spinner">
                                <svg width="40px" height="40px" viewbox="0 0 66 66"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle class="circle" fill="none" stroke-width="4" stroke-linecap="round"
                                        cx="33" cy="33" r="30">
                                    </circle>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.flot.pie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.flot.time.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.flot.orderBars.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/curvedLines.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.flot.tooltip.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/countUp.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.vmap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.vmap.world.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
            App.dashboard();

        });
    </script>
@endsection
