@extends('home.layouts')

@section('title', 'DashBoard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="{{ asset('js/home.js') }}"></script>
@endsection

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme"
                style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                <div class="app-brand demo ">
                    <a href="/home" class="app-brand-link">
                        <span class="img nav-link">
                            <img src="../img/logo-chu-p-dep-01.jpg" class="imagess" alt="L" width="25"
                                height="42">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">lavashop</span>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1 ps ps--active-y">
                    <!-- Dashboards -->
                    <li class="menu-item open">
                        <ul class="menu-sub">
                            <li class="menu-item active">
                                <a href="/home" class="menu-link">
                                    <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/product-manage" class="menu-link">
                                    <div class="text-truncate" data-i18n="Product Manage">Product Manage</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/purchase-manage" class="menu-link">
                                    <div class="text-truncate" data-i18n="Purchase Manage">Purchase Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="" alt="Image User" class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="" alt=""
                                                            class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">{{ session('user_name') }}</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-lg-12 mb-4 order-0">
                                <div class="card">
                                    <div class="d-flex align-items-end row">
                                        <div class="col-sm-7">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">Congratulations
                                                    {{ session('user_name') }}! 🎉</h5>
                                                {{-- <p class="mb-4">You have done <span class="fw-medium">72%</span> more
                                                    sales today. Check your new badge in your profile.</p>
                                                <a href="javascript:;" class="btn btn-sm btn-label-primary">View
                                                    Badges</a> --}}
                                                <p class="mb-4">Webcome in the Lavashop.</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 text-center text-sm-left">
                                            <div class="card-body pb-0 px-0 px-md-4">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/illustrations/man-with-laptop-light.png"
                                                    height="140" alt="View Badge User"
                                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                    data-app-light-img="illustrations/man-with-laptop-light.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-4 order-1">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body pb-0">
                                                <span class="d-block fw-medium mb-1">Order</span>
                                                <h3 class="card-title mb-1">{{ $purchase_count }}</h3>
                                            </div>
                                            <div id="orderChart" class="mb-3" style="min-height: 84px;">
                                                <div id="apexchartsnjzlzxpz"
                                                    class="apexcharts-canvas apexchartsnjzlzxpz apexcharts-theme-light"
                                                    style="width: 180px; height: 80px;"><svg id="SvgjsSvg1894"
                                                        width="180" height="80" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG1896" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(0, 0)">
                                                            <defs id="SvgjsDefs1895">
                                                                <clipPath id="gridRectMasknjzlzxpz">
                                                                    <rect id="SvgjsRect1901" width="178"
                                                                        height="82" x="-3" y="-1" rx="0"
                                                                        ry="0" opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0"
                                                                        fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasknjzlzxpz"></clipPath>
                                                                <clipPath id="nonForecastMasknjzlzxpz"></clipPath>
                                                                <clipPath id="gridRectMarkerMasknjzlzxpz">
                                                                    <rect id="SvgjsRect1902" width="200"
                                                                        height="108" x="-14" y="-14" rx="0"
                                                                        ry="0" opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0"
                                                                        fill="#fff"></rect>
                                                                </clipPath>
                                                                <linearGradient id="SvgjsLinearGradient1920"
                                                                    x1="0" y1="0" x2="0"
                                                                    y2="1">
                                                                    <stop id="SvgjsStop1921" stop-opacity="0.8"
                                                                        stop-color="rgba(113,221,55,0.8)" offset="0">
                                                                    </stop>
                                                                    <stop id="SvgjsStop1922" stop-opacity="0.25"
                                                                        stop-color="rgba(227,248,215,0.25)"
                                                                        offset="0.85"></stop>
                                                                    <stop id="SvgjsStop1923" stop-opacity="0.25"
                                                                        stop-color="rgba(227,248,215,0.25)"
                                                                        offset="1"></stop>
                                                                </linearGradient>
                                                            </defs>
                                                            <line id="SvgjsLine1900" x1="0" y1="0"
                                                                x2="0" y2="80" stroke="#b6b6b6"
                                                                stroke-dasharray="3" stroke-linecap="butt"
                                                                class="apexcharts-xcrosshairs" x="0" y="0" width="1"
                                                                height="80" fill="#b1b9c4" filter="none"
                                                                fill-opacity="0.9" stroke-width="1">
                                                            </line>
                                                            <g id="SvgjsG1926" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG1927" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"></g>
                                                            </g>
                                                            <g id="SvgjsG1936" class="apexcharts-grid">
                                                                <g id="SvgjsG1937" class="apexcharts-gridlines-horizontal"
                                                                    style="display: none;">
                                                                    <line id="SvgjsLine1939" x1="0"
                                                                        y1="0" x2="172" y2="0"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine1940" x1="0"
                                                                        y1="16" x2="172" y2="16"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine1941" x1="0"
                                                                        y1="32" x2="172" y2="32"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine1942" x1="0"
                                                                        y1="48" x2="172" y2="48"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine1943" x1="0"
                                                                        y1="64" x2="172" y2="64"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                    <line id="SvgjsLine1944" x1="0"
                                                                        y1="80" x2="172" y2="80"
                                                                        stroke="#e0e0e0" stroke-dasharray="0"
                                                                        stroke-linecap="butt" class="apexcharts-gridline">
                                                                    </line>
                                                                </g>
                                                                <g id="SvgjsG1938" class="apexcharts-gridlines-vertical"
                                                                    style="display: none;"></g>
                                                                <line id="SvgjsLine1946" x1="0" y1="80"
                                                                    x2="172" y2="80" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine1945" x1="0" y1="1"
                                                                    x2="0" y2="80" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG1903"
                                                                class="apexcharts-area-series apexcharts-plot-series">
                                                                <g id="SvgjsG1904" class="apexcharts-series"
                                                                    seriesName="seriesx1" data:longestSeries="true"
                                                                    rel="1" data:realIndex="0">
                                                                    <path id="SvgjsPath1924"
                                                                        d="M 0 80L 0 56C 10.033333333333333 56 18.633333333333333 58 28.666666666666668 58C 38.7 58 47.300000000000004 18 57.333333333333336 18C 67.36666666666667 18 75.96666666666667 72 86 72C 96.03333333333333 72 104.63333333333334 46 114.66666666666667 46C 124.7 46 133.3 52 143.33333333333334 52C 153.36666666666667 52 161.96666666666667 10 172 10C 172 10 172 10 172 80M 172 10z"
                                                                        fill="url(#SvgjsLinearGradient1920)"
                                                                        fill-opacity="1" stroke-opacity="1"
                                                                        stroke-linecap="butt" stroke-width="0"
                                                                        stroke-dasharray="0" class="apexcharts-area"
                                                                        index="0"
                                                                        clip-path="url(#gridRectMasknjzlzxpz)"
                                                                        pathTo="M 0 80L 0 56C 10.033333333333333 56 18.633333333333333 58 28.666666666666668 58C 38.7 58 47.300000000000004 18 57.333333333333336 18C 67.36666666666667 18 75.96666666666667 72 86 72C 96.03333333333333 72 104.63333333333334 46 114.66666666666667 46C 124.7 46 133.3 52 143.33333333333334 52C 153.36666666666667 52 161.96666666666667 10 172 10C 172 10 172 10 172 80M 172 10z"
                                                                        pathFrom="M -1 128L -1 128L 28.666666666666668 128L 57.333333333333336 128L 86 128L 114.66666666666667 128L 143.33333333333334 128L 172 128">
                                                                    </path>
                                                                    <path id="SvgjsPath1925"
                                                                        d="M 0 56C 10.033333333333333 56 18.633333333333333 58 28.666666666666668 58C 38.7 58 47.300000000000004 18 57.333333333333336 18C 67.36666666666667 18 75.96666666666667 72 86 72C 96.03333333333333 72 104.63333333333334 46 114.66666666666667 46C 124.7 46 133.3 52 143.33333333333334 52C 153.36666666666667 52 161.96666666666667 10 172 10"
                                                                        fill="none" fill-opacity="1" stroke="#71dd37"
                                                                        stroke-opacity="1" stroke-linecap="butt"
                                                                        stroke-width="2" stroke-dasharray="0"
                                                                        class="apexcharts-area" index="0"
                                                                        clip-path="url(#gridRectMasknjzlzxpz)"
                                                                        pathTo="M 0 56C 10.033333333333333 56 18.633333333333333 58 28.666666666666668 58C 38.7 58 47.300000000000004 18 57.333333333333336 18C 67.36666666666667 18 75.96666666666667 72 86 72C 96.03333333333333 72 104.63333333333334 46 114.66666666666667 46C 124.7 46 133.3 52 143.33333333333334 52C 153.36666666666667 52 161.96666666666667 10 172 10"
                                                                        pathFrom="M -1 128L -1 128L 28.666666666666668 128L 57.333333333333336 128L 86 128L 114.66666666666667 128L 143.33333333333334 128L 172 128">
                                                                    </path>
                                                                    <g id="SvgjsG1905"
                                                                        class="apexcharts-series-markers-wrap"
                                                                        data:realIndex="0">
                                                                        <g id="SvgjsG1907"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasknjzlzxpz)">
                                                                            <circle id="SvgjsCircle1908" r="6"
                                                                                cx="0" cy="56"
                                                                                class="apexcharts-marker no-pointer-events wdxeu8f6g"
                                                                                stroke="transparent" fill="transparent"
                                                                                fill-opacity="1" stroke-width="4"
                                                                                stroke-opacity="0.9" rel="0" j="0"
                                                                                index="0" default-marker-size="6">
                                                                            </circle>
                                                                            <circle id="SvgjsCircle1909" r="6"
                                                                                cx="28.666666666666668" cy="58"
                                                                                class="apexcharts-marker no-pointer-events wti4j5q94"
                                                                                stroke="transparent" fill="transparent"
                                                                                fill-opacity="1" stroke-width="4"
                                                                                stroke-opacity="0.9" rel="1" j="1"
                                                                                index="0" default-marker-size="6">
                                                                            </circle>
                                                                        </g>
                                                                        <g id="SvgjsG1910"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasknjzlzxpz)">
                                                                            <circle id="SvgjsCircle1911" r="6"
                                                                                cx="57.333333333333336" cy="18"
                                                                                class="apexcharts-marker no-pointer-events wq1qht2d9"
                                                                                stroke="transparent" fill="transparent"
                                                                                fill-opacity="1" stroke-width="4"
                                                                                stroke-opacity="0.9" rel="2" j="2"
                                                                                index="0" default-marker-size="6">
                                                                            </circle>
                                                                        </g>
                                                                        <g id="SvgjsG1912"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasknjzlzxpz)">
                                                                            <circle id="SvgjsCircle1913" r="6"
                                                                                cx="86" cy="72"
                                                                                class="apexcharts-marker no-pointer-events w0mx1nnwe"
                                                                                stroke="transparent" fill="transparent"
                                                                                fill-opacity="1" stroke-width="4"
                                                                                stroke-opacity="0.9" rel="3" j="3"
                                                                                index="0" default-marker-size="6">
                                                                            </circle>
                                                                        </g>
                                                                        <g id="SvgjsG1914"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasknjzlzxpz)">
                                                                            <circle id="SvgjsCircle1915" r="6"
                                                                                cx="114.66666666666667" cy="46"
                                                                                class="apexcharts-marker no-pointer-events wsd0lmi1j"
                                                                                stroke="transparent" fill="transparent"
                                                                                fill-opacity="1" stroke-width="4"
                                                                                stroke-opacity="0.9" rel="4" j="4"
                                                                                index="0" default-marker-size="6">
                                                                            </circle>
                                                                        </g>
                                                                        <g id="SvgjsG1916"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasknjzlzxpz)">
                                                                            <circle id="SvgjsCircle1917" r="6"
                                                                                cx="143.33333333333334" cy="52"
                                                                                class="apexcharts-marker no-pointer-events wlukpr59a"
                                                                                stroke="transparent" fill="transparent"
                                                                                fill-opacity="1" stroke-width="4"
                                                                                stroke-opacity="0.9" rel="5" j="5"
                                                                                index="0" default-marker-size="6">
                                                                            </circle>
                                                                        </g>
                                                                        <g id="SvgjsG1918"
                                                                            class="apexcharts-series-markers"
                                                                            clip-path="url(#gridRectMarkerMasknjzlzxpz)">
                                                                            <circle id="SvgjsCircle1919" r="6"
                                                                                cx="172" cy="10"
                                                                                class="apexcharts-marker no-pointer-events wd4tphek6k"
                                                                                stroke="#71dd37" fill="#ffffff"
                                                                                fill-opacity="1" stroke-width="4"
                                                                                stroke-opacity="0.9" rel="6" j="6"
                                                                                index="0" default-marker-size="6">
                                                                            </circle>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG1906" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                            </g>
                                                            <line id="SvgjsLine1947" x1="0" y1="0"
                                                                x2="172" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine1948" x1="0" y1="0"
                                                                x2="172" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG1949" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG1950" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG1951" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <rect id="SvgjsRect1899" width="0" height="0" x="0"
                                                            y="0" rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke="none" stroke-dasharray="0"
                                                            fill="#fefefe"></rect>
                                                        <g id="SvgjsG1935" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(-18, 0)"></g>
                                                        <g id="SvgjsG1897" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend" style="max-height: 40px;"></div>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                        </div>
                                                        <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                            <span class="apexcharts-tooltip-marker"
                                                                style="background-color: rgb(113, 221, 55);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label"></span><span
                                                                        class="apexcharts-tooltip-text-y-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-goals-group"><span
                                                                        class="apexcharts-tooltip-text-goals-label"></span><span
                                                                        class="apexcharts-tooltip-text-goals-value"></span>
                                                                </div>
                                                                <div class="apexcharts-tooltip-z-group"><span
                                                                        class="apexcharts-tooltip-text-z-label"></span><span
                                                                        class="apexcharts-tooltip-text-z-value"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                        <div class="apexcharts-yaxistooltip-text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="resize-triggers">
                                                <div class="expand-trigger">
                                                    <div style="width: 181px; height: 181px;"></div>
                                                </div>
                                                <div class="contract-trigger"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                                        <div class="card">
                                            <div class="card2 card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <i class='bx bxs-wallet'></i>
                                                    </div>
                                                </div>
                                                <span>Sales</span>
                                                <h3 class="card-title text-nowrap mb-1">$0</h3>
                                                <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i>
                                                    +0%</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-8 col-lg-6 order-3 order-md-2">
                                <div class="row">
                                    <div class="col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title d-flex align-items-start justify-content-between">
                                                    <div class="avatar flex-shrink-0">
                                                        <i class='bx bxl-paypal'></i>
                                                    </div>
                                                </div>
                                                <span class="d-block mb-1">Payments</span>
                                                <h3 class="card-title text-nowrap mb-2">$0</h3>
                                                <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i>
                                                    0%</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="card">
                                            <div class="card-body pb-1" style="position: relative;">
                                                <span class="d-block fw-medium mb-1">User</span>
                                                <h3 class="card-title mb-1">{{ $user_count }}</h3>
                                                <div id="revenueChart" style="min-height: 95px;">
                                                    <div id="apexchartse22nwkkc"
                                                        class="apexcharts-canvas apexchartse22nwkkc apexcharts-theme-light"
                                                        style="width: 132px; height: 80px;"><svg id="SvgjsSvg2065"
                                                            width="132" height="80"
                                                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                            xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                            style="background: transparent;">
                                                            <g id="SvgjsG2067"
                                                                class="apexcharts-inner apexcharts-graphical"
                                                                transform="translate(0, 10)">
                                                                <defs id="SvgjsDefs2066">
                                                                    <linearGradient id="SvgjsLinearGradient2070"
                                                                        x1="0" y1="0" x2="0"
                                                                        y2="1">
                                                                        <stop id="SvgjsStop2071" stop-opacity="0.4"
                                                                            stop-color="rgba(216,227,240,0.4)"
                                                                            offset="0"></stop>
                                                                        <stop id="SvgjsStop2072" stop-opacity="0.5"
                                                                            stop-color="rgba(190,209,230,0.5)"
                                                                            offset="1"></stop>
                                                                        <stop id="SvgjsStop2073" stop-opacity="0.5"
                                                                            stop-color="rgba(190,209,230,0.5)"
                                                                            offset="1"></stop>
                                                                    </linearGradient>
                                                                    <clipPath id="gridRectMaske22nwkkc">
                                                                        <rect id="SvgjsRect2075" width="136"
                                                                            height="43.70079907417298" x="-2" y="0"
                                                                            rx="0" ry="0" opacity="1"
                                                                            stroke-width="0" stroke="none"
                                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                    <clipPath id="forecastMaske22nwkkc"></clipPath>
                                                                    <clipPath id="nonForecastMaske22nwkkc"></clipPath>
                                                                    <clipPath id="gridRectMarkerMaske22nwkkc">
                                                                        <rect id="SvgjsRect2076" width="136"
                                                                            height="47.70079907417298" x="-2" y="-2"
                                                                            rx="0" ry="0" opacity="1"
                                                                            stroke-width="0" stroke="none"
                                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                                <rect id="SvgjsRect2074" width="14.142857142857142"
                                                                    height="43.70079907417298" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke-dasharray="3"
                                                                    fill="url(#SvgjsLinearGradient2070)"
                                                                    class="apexcharts-xcrosshairs" y2="43.70079907417298"
                                                                    filter="none" fill-opacity="0.9"></rect>
                                                                <g id="SvgjsG2095" class="apexcharts-xaxis"
                                                                    transform="translate(0, 0)">
                                                                    <g id="SvgjsG2096" class="apexcharts-xaxis-texts-g"
                                                                        transform="translate(0, -4)"><text
                                                                            id="SvgjsText2098"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            x="9.428571428571429" y="72.70079907417298"
                                                                            text-anchor="middle" dominant-baseline="auto"
                                                                            font-size="13px" font-weight="400"
                                                                            fill="#a1acb8"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan id="SvgjsTspan2099">M</tspan>
                                                                            <title>M</title>
                                                                        </text><text id="SvgjsText2101"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            x="28.285714285714285" y="72.70079907417298"
                                                                            text-anchor="middle" dominant-baseline="auto"
                                                                            font-size="13px" font-weight="400"
                                                                            fill="#a1acb8"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan id="SvgjsTspan2102">T</tspan>
                                                                            <title>T</title>
                                                                        </text><text id="SvgjsText2104"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            x="47.14285714285714" y="72.70079907417298"
                                                                            text-anchor="middle" dominant-baseline="auto"
                                                                            font-size="13px" font-weight="400"
                                                                            fill="#a1acb8"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan id="SvgjsTspan2105">W</tspan>
                                                                            <title>W</title>
                                                                        </text><text id="SvgjsText2107"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            x="66" y="72.70079907417298"
                                                                            text-anchor="middle" dominant-baseline="auto"
                                                                            font-size="13px" font-weight="400"
                                                                            fill="#a1acb8"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan id="SvgjsTspan2108">T</tspan>
                                                                            <title>T</title>
                                                                        </text><text id="SvgjsText2110"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            x="84.85714285714286" y="72.70079907417298"
                                                                            text-anchor="middle" dominant-baseline="auto"
                                                                            font-size="13px" font-weight="400"
                                                                            fill="#a1acb8"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan id="SvgjsTspan2111">F</tspan>
                                                                            <title>F</title>
                                                                        </text><text id="SvgjsText2113"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            x="103.71428571428572" y="72.70079907417298"
                                                                            text-anchor="middle" dominant-baseline="auto"
                                                                            font-size="13px" font-weight="400"
                                                                            fill="#a1acb8"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan id="SvgjsTspan2114">S</tspan>
                                                                            <title>S</title>
                                                                        </text><text id="SvgjsText2116"
                                                                            font-family="Helvetica, Arial, sans-serif"
                                                                            x="122.57142857142857" y="72.70079907417298"
                                                                            text-anchor="middle" dominant-baseline="auto"
                                                                            font-size="13px" font-weight="400"
                                                                            fill="#a1acb8"
                                                                            class="apexcharts-text apexcharts-xaxis-label "
                                                                            style="font-family: Helvetica, Arial, sans-serif;">
                                                                            <tspan id="SvgjsTspan2117">S</tspan>
                                                                            <title>S</title>
                                                                        </text></g>
                                                                </g>
                                                                <g id="SvgjsG2120" class="apexcharts-grid">
                                                                    <g id="SvgjsG2121"
                                                                        class="apexcharts-gridlines-horizontal"
                                                                        style="display: none;">
                                                                        <line id="SvgjsLine2123" x1="0"
                                                                            y1="0" x2="132" y2="0"
                                                                            stroke="#e0e0e0" stroke-dasharray="0"
                                                                            stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line id="SvgjsLine2124" x1="0"
                                                                            y1="8.740159814834595" x2="132"
                                                                            y2="8.740159814834595" stroke="#e0e0e0"
                                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line id="SvgjsLine2125" x1="0"
                                                                            y1="17.48031962966919" x2="132"
                                                                            y2="17.48031962966919" stroke="#e0e0e0"
                                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line id="SvgjsLine2126" x1="0"
                                                                            y1="26.220479444503784" x2="132"
                                                                            y2="26.220479444503784" stroke="#e0e0e0"
                                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line id="SvgjsLine2127" x1="0"
                                                                            y1="34.96063925933838" x2="132"
                                                                            y2="34.96063925933838" stroke="#e0e0e0"
                                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                        <line id="SvgjsLine2128" x1="0"
                                                                            y1="43.70079907417298" x2="132"
                                                                            y2="43.70079907417298" stroke="#e0e0e0"
                                                                            stroke-dasharray="0" stroke-linecap="butt"
                                                                            class="apexcharts-gridline"></line>
                                                                    </g>
                                                                    <g id="SvgjsG2122"
                                                                        class="apexcharts-gridlines-vertical"
                                                                        style="display: none;"></g>
                                                                    <line id="SvgjsLine2130" x1="0"
                                                                        y1="43.70079907417298" x2="132"
                                                                        y2="43.70079907417298" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                    <line id="SvgjsLine2129" x1="0"
                                                                        y1="1" x2="0"
                                                                        y2="43.70079907417298" stroke="transparent"
                                                                        stroke-dasharray="0" stroke-linecap="butt">
                                                                    </line>
                                                                </g>
                                                                <g id="SvgjsG2077"
                                                                    class="apexcharts-bar-series apexcharts-plot-series">
                                                                    <g id="SvgjsG2078" class="apexcharts-series"
                                                                        rel="1" seriesName="seriesx1"
                                                                        data:realIndex="0">
                                                                        <path id="SvgjsPath2082"
                                                                            d="M 2.3571428571428577 41.70079907417298L 2.3571428571428577 28.220479444503788Q 2.3571428571428577 26.220479444503788 4.357142857142858 26.220479444503788L 14.5 26.220479444503788Q 16.5 26.220479444503788 16.5 28.220479444503788L 16.5 28.220479444503788L 16.5 41.70079907417298Q 16.5 43.70079907417298 14.5 43.70079907417298L 4.357142857142858 43.70079907417298Q 2.3571428571428577 43.70079907417298 2.3571428571428577 41.70079907417298z"
                                                                            fill="#666ee81a" fill-opacity="1"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area" index="0"
                                                                            clip-path="url(#gridRectMaske22nwkkc)"
                                                                            pathTo="M 2.3571428571428577 41.70079907417298L 2.3571428571428577 28.220479444503788Q 2.3571428571428577 26.220479444503788 4.357142857142858 26.220479444503788L 14.5 26.220479444503788Q 16.5 26.220479444503788 16.5 28.220479444503788L 16.5 28.220479444503788L 16.5 41.70079907417298Q 16.5 43.70079907417298 14.5 43.70079907417298L 4.357142857142858 43.70079907417298Q 2.3571428571428577 43.70079907417298 2.3571428571428577 41.70079907417298z"
                                                                            pathFrom="M 2.3571428571428577 41.70079907417298L 2.3571428571428577 41.70079907417298L 16.5 41.70079907417298L 16.5 41.70079907417298L 16.5 41.70079907417298L 16.5 41.70079907417298L 16.5 41.70079907417298L 2.3571428571428577 41.70079907417298"
                                                                            cy="26.220479444503788"
                                                                            cx="21.214285714285715" j="0" val="40"
                                                                            barHeight="17.48031962966919"
                                                                            barWidth="14.142857142857142"></path>
                                                                        <path id="SvgjsPath2084"
                                                                            d="M 21.214285714285715 41.70079907417298L 21.214285714285715 4.185039953708646Q 21.214285714285715 2.185039953708646 23.214285714285715 2.185039953708646L 33.35714285714286 2.185039953708646Q 35.35714285714286 2.185039953708646 35.35714285714286 4.185039953708646L 35.35714285714286 4.185039953708646L 35.35714285714286 41.70079907417298Q 35.35714285714286 43.70079907417298 33.35714285714286 43.70079907417298L 23.214285714285715 43.70079907417298Q 21.214285714285715 43.70079907417298 21.214285714285715 41.70079907417298z"
                                                                            fill="#666ee81a" fill-opacity="1"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area" index="0"
                                                                            clip-path="url(#gridRectMaske22nwkkc)"
                                                                            pathTo="M 21.214285714285715 41.70079907417298L 21.214285714285715 4.185039953708646Q 21.214285714285715 2.185039953708646 23.214285714285715 2.185039953708646L 33.35714285714286 2.185039953708646Q 35.35714285714286 2.185039953708646 35.35714285714286 4.185039953708646L 35.35714285714286 4.185039953708646L 35.35714285714286 41.70079907417298Q 35.35714285714286 43.70079907417298 33.35714285714286 43.70079907417298L 23.214285714285715 43.70079907417298Q 21.214285714285715 43.70079907417298 21.214285714285715 41.70079907417298z"
                                                                            pathFrom="M 21.214285714285715 41.70079907417298L 21.214285714285715 41.70079907417298L 35.35714285714286 41.70079907417298L 35.35714285714286 41.70079907417298L 35.35714285714286 41.70079907417298L 35.35714285714286 41.70079907417298L 35.35714285714286 41.70079907417298L 21.214285714285715 41.70079907417298"
                                                                            cy="2.185039953708646" cx="40.07142857142857"
                                                                            j="1" val="95"
                                                                            barHeight="41.51575912046433"
                                                                            barWidth="14.142857142857142"></path>
                                                                        <path id="SvgjsPath2086"
                                                                            d="M 40.07142857142857 41.70079907417298L 40.07142857142857 19.48031962966919Q 40.07142857142857 17.48031962966919 42.07142857142857 17.48031962966919L 52.21428571428571 17.48031962966919Q 54.21428571428571 17.48031962966919 54.21428571428571 19.48031962966919L 54.21428571428571 19.48031962966919L 54.21428571428571 41.70079907417298Q 54.21428571428571 43.70079907417298 52.21428571428571 43.70079907417298L 42.07142857142857 43.70079907417298Q 40.07142857142857 43.70079907417298 40.07142857142857 41.70079907417298z"
                                                                            fill="#666ee81a" fill-opacity="1"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area" index="0"
                                                                            clip-path="url(#gridRectMaske22nwkkc)"
                                                                            pathTo="M 40.07142857142857 41.70079907417298L 40.07142857142857 19.48031962966919Q 40.07142857142857 17.48031962966919 42.07142857142857 17.48031962966919L 52.21428571428571 17.48031962966919Q 54.21428571428571 17.48031962966919 54.21428571428571 19.48031962966919L 54.21428571428571 19.48031962966919L 54.21428571428571 41.70079907417298Q 54.21428571428571 43.70079907417298 52.21428571428571 43.70079907417298L 42.07142857142857 43.70079907417298Q 40.07142857142857 43.70079907417298 40.07142857142857 41.70079907417298z"
                                                                            pathFrom="M 40.07142857142857 41.70079907417298L 40.07142857142857 41.70079907417298L 54.21428571428571 41.70079907417298L 54.21428571428571 41.70079907417298L 54.21428571428571 41.70079907417298L 54.21428571428571 41.70079907417298L 54.21428571428571 41.70079907417298L 40.07142857142857 41.70079907417298"
                                                                            cy="17.48031962966919" cx="58.92857142857143"
                                                                            j="2" val="60"
                                                                            barHeight="26.220479444503788"
                                                                            barWidth="14.142857142857142"></path>
                                                                        <path id="SvgjsPath2088"
                                                                            d="M 58.92857142857143 41.70079907417298L 58.92857142857143 26.035439490795138Q 58.92857142857143 24.035439490795138 60.92857142857143 24.035439490795138L 71.07142857142857 24.035439490795138Q 73.07142857142857 24.035439490795138 73.07142857142857 26.035439490795138L 73.07142857142857 26.035439490795138L 73.07142857142857 41.70079907417298Q 73.07142857142857 43.70079907417298 71.07142857142857 43.70079907417298L 60.92857142857143 43.70079907417298Q 58.92857142857143 43.70079907417298 58.92857142857143 41.70079907417298z"
                                                                            fill="#666ee81a" fill-opacity="1"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area" index="0"
                                                                            clip-path="url(#gridRectMaske22nwkkc)"
                                                                            pathTo="M 58.92857142857143 41.70079907417298L 58.92857142857143 26.035439490795138Q 58.92857142857143 24.035439490795138 60.92857142857143 24.035439490795138L 71.07142857142857 24.035439490795138Q 73.07142857142857 24.035439490795138 73.07142857142857 26.035439490795138L 73.07142857142857 26.035439490795138L 73.07142857142857 41.70079907417298Q 73.07142857142857 43.70079907417298 71.07142857142857 43.70079907417298L 60.92857142857143 43.70079907417298Q 58.92857142857143 43.70079907417298 58.92857142857143 41.70079907417298z"
                                                                            pathFrom="M 58.92857142857143 41.70079907417298L 58.92857142857143 41.70079907417298L 73.07142857142857 41.70079907417298L 73.07142857142857 41.70079907417298L 73.07142857142857 41.70079907417298L 73.07142857142857 41.70079907417298L 73.07142857142857 41.70079907417298L 58.92857142857143 41.70079907417298"
                                                                            cy="24.035439490795138" cx="77.78571428571429"
                                                                            j="3" val="45"
                                                                            barHeight="19.66535958337784"
                                                                            barWidth="14.142857142857142"></path>
                                                                        <path id="SvgjsPath2090"
                                                                            d="M 77.78571428571429 41.70079907417298L 77.78571428571429 6.370079907417299Q 77.78571428571429 4.370079907417299 79.78571428571429 4.370079907417299L 89.92857142857143 4.370079907417299Q 91.92857142857143 4.370079907417299 91.92857142857143 6.370079907417299L 91.92857142857143 6.370079907417299L 91.92857142857143 41.70079907417298Q 91.92857142857143 43.70079907417298 89.92857142857143 43.70079907417298L 79.78571428571429 43.70079907417298Q 77.78571428571429 43.70079907417298 77.78571428571429 41.70079907417298z"
                                                                            fill="rgba(105,108,255,0.85)" fill-opacity="1"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area" index="0"
                                                                            clip-path="url(#gridRectMaske22nwkkc)"
                                                                            pathTo="M 77.78571428571429 41.70079907417298L 77.78571428571429 6.370079907417299Q 77.78571428571429 4.370079907417299 79.78571428571429 4.370079907417299L 89.92857142857143 4.370079907417299Q 91.92857142857143 4.370079907417299 91.92857142857143 6.370079907417299L 91.92857142857143 6.370079907417299L 91.92857142857143 41.70079907417298Q 91.92857142857143 43.70079907417298 89.92857142857143 43.70079907417298L 79.78571428571429 43.70079907417298Q 77.78571428571429 43.70079907417298 77.78571428571429 41.70079907417298z"
                                                                            pathFrom="M 77.78571428571429 41.70079907417298L 77.78571428571429 41.70079907417298L 91.92857142857143 41.70079907417298L 91.92857142857143 41.70079907417298L 91.92857142857143 41.70079907417298L 91.92857142857143 41.70079907417298L 91.92857142857143 41.70079907417298L 77.78571428571429 41.70079907417298"
                                                                            cy="4.370079907417299" cx="96.64285714285715"
                                                                            j="4" val="90"
                                                                            barHeight="39.33071916675568"
                                                                            barWidth="14.142857142857142"></path>
                                                                        <path id="SvgjsPath2092"
                                                                            d="M 96.64285714285715 41.70079907417298L 96.64285714285715 23.85039953708649Q 96.64285714285715 21.85039953708649 98.64285714285715 21.85039953708649L 108.78571428571429 21.85039953708649Q 110.78571428571429 21.85039953708649 110.78571428571429 23.85039953708649L 110.78571428571429 23.85039953708649L 110.78571428571429 41.70079907417298Q 110.78571428571429 43.70079907417298 108.78571428571429 43.70079907417298L 98.64285714285715 43.70079907417298Q 96.64285714285715 43.70079907417298 96.64285714285715 41.70079907417298z"
                                                                            fill="#666ee81a" fill-opacity="1"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area" index="0"
                                                                            clip-path="url(#gridRectMaske22nwkkc)"
                                                                            pathTo="M 96.64285714285715 41.70079907417298L 96.64285714285715 23.85039953708649Q 96.64285714285715 21.85039953708649 98.64285714285715 21.85039953708649L 108.78571428571429 21.85039953708649Q 110.78571428571429 21.85039953708649 110.78571428571429 23.85039953708649L 110.78571428571429 23.85039953708649L 110.78571428571429 41.70079907417298Q 110.78571428571429 43.70079907417298 108.78571428571429 43.70079907417298L 98.64285714285715 43.70079907417298Q 96.64285714285715 43.70079907417298 96.64285714285715 41.70079907417298z"
                                                                            pathFrom="M 96.64285714285715 41.70079907417298L 96.64285714285715 41.70079907417298L 110.78571428571429 41.70079907417298L 110.78571428571429 41.70079907417298L 110.78571428571429 41.70079907417298L 110.78571428571429 41.70079907417298L 110.78571428571429 41.70079907417298L 96.64285714285715 41.70079907417298"
                                                                            cy="21.85039953708649" cx="115.50000000000001"
                                                                            j="5" val="50"
                                                                            barHeight="21.85039953708649"
                                                                            barWidth="14.142857142857142"></path>
                                                                        <path id="SvgjsPath2094"
                                                                            d="M 115.50000000000001 41.70079907417298L 115.50000000000001 12.925199768543244Q 115.50000000000001 10.925199768543244 117.50000000000001 10.925199768543244L 127.64285714285717 10.925199768543244Q 129.64285714285717 10.925199768543244 129.64285714285717 12.925199768543244L 129.64285714285717 12.925199768543244L 129.64285714285717 41.70079907417298Q 129.64285714285717 43.70079907417298 127.64285714285717 43.70079907417298L 117.50000000000001 43.70079907417298Q 115.50000000000001 43.70079907417298 115.50000000000001 41.70079907417298z"
                                                                            fill="#666ee81a" fill-opacity="1"
                                                                            stroke-opacity="1" stroke-linecap="round"
                                                                            stroke-width="0" stroke-dasharray="0"
                                                                            class="apexcharts-bar-area" index="0"
                                                                            clip-path="url(#gridRectMaske22nwkkc)"
                                                                            pathTo="M 115.50000000000001 41.70079907417298L 115.50000000000001 12.925199768543244Q 115.50000000000001 10.925199768543244 117.50000000000001 10.925199768543244L 127.64285714285717 10.925199768543244Q 129.64285714285717 10.925199768543244 129.64285714285717 12.925199768543244L 129.64285714285717 12.925199768543244L 129.64285714285717 41.70079907417298Q 129.64285714285717 43.70079907417298 127.64285714285717 43.70079907417298L 117.50000000000001 43.70079907417298Q 115.50000000000001 43.70079907417298 115.50000000000001 41.70079907417298z"
                                                                            pathFrom="M 115.50000000000001 41.70079907417298L 115.50000000000001 41.70079907417298L 129.64285714285717 41.70079907417298L 129.64285714285717 41.70079907417298L 129.64285714285717 41.70079907417298L 129.64285714285717 41.70079907417298L 129.64285714285717 41.70079907417298L 115.50000000000001 41.70079907417298"
                                                                            cy="10.925199768543244"
                                                                            cx="134.35714285714286" j="6" val="75"
                                                                            barHeight="32.77559930562973"
                                                                            barWidth="14.142857142857142"></path>
                                                                        <g id="SvgjsG2080"
                                                                            class="apexcharts-bar-goals-markers"
                                                                            style="pointer-events: none">
                                                                            <g id="SvgjsG2081"
                                                                                className="apexcharts-bar-goals-groups">
                                                                            </g>
                                                                            <g id="SvgjsG2083"
                                                                                className="apexcharts-bar-goals-groups">
                                                                            </g>
                                                                            <g id="SvgjsG2085"
                                                                                className="apexcharts-bar-goals-groups">
                                                                            </g>
                                                                            <g id="SvgjsG2087"
                                                                                className="apexcharts-bar-goals-groups">
                                                                            </g>
                                                                            <g id="SvgjsG2089"
                                                                                className="apexcharts-bar-goals-groups">
                                                                            </g>
                                                                            <g id="SvgjsG2091"
                                                                                className="apexcharts-bar-goals-groups">
                                                                            </g>
                                                                            <g id="SvgjsG2093"
                                                                                className="apexcharts-bar-goals-groups">
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                    <g id="SvgjsG2079" class="apexcharts-datalabels"
                                                                        data:realIndex="0"></g>
                                                                </g>
                                                                <line id="SvgjsLine2131" x1="0" y1="0"
                                                                    x2="132" y2="0" stroke="#b6b6b6"
                                                                    stroke-dasharray="0" stroke-width="1"
                                                                    stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                                </line>
                                                                <line id="SvgjsLine2132" x1="0" y1="0"
                                                                    x2="132" y2="0" stroke-dasharray="0"
                                                                    stroke-width="0" stroke-linecap="butt"
                                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                                                <g id="SvgjsG2133" class="apexcharts-yaxis-annotations">
                                                                </g>
                                                                <g id="SvgjsG2134" class="apexcharts-xaxis-annotations">
                                                                </g>
                                                                <g id="SvgjsG2135" class="apexcharts-point-annotations">
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG2118" class="apexcharts-yaxis" rel="0"
                                                                transform="translate(-8, 0)">
                                                                <g id="SvgjsG2119" class="apexcharts-yaxis-texts-g"></g>
                                                            </g>
                                                            <g id="SvgjsG2068" class="apexcharts-annotations"></g>
                                                        </svg>
                                                        <div class="apexcharts-legend" style="max-height: 40px;"></div>
                                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                                            <div class="apexcharts-tooltip-title"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            </div>
                                                            <div class="apexcharts-tooltip-series-group"
                                                                style="order: 1;"><span class="apexcharts-tooltip-marker"
                                                                    style="background-color: rgba(102, 110, 232, 0.1);"></span>
                                                                <div class="apexcharts-tooltip-text"
                                                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                    <div class="apexcharts-tooltip-y-group"><span
                                                                            class="apexcharts-tooltip-text-y-label"></span><span
                                                                            class="apexcharts-tooltip-text-y-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-goals-group"><span
                                                                            class="apexcharts-tooltip-text-goals-label"></span><span
                                                                            class="apexcharts-tooltip-text-goals-value"></span>
                                                                    </div>
                                                                    <div class="apexcharts-tooltip-z-group"><span
                                                                            class="apexcharts-tooltip-text-z-label"></span><span
                                                                            class="apexcharts-tooltip-text-z-value"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                            <div class="apexcharts-yaxistooltip-text"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="resize-triggers">
                                                    <div class="expand-trigger">
                                                        <div style="width: 181px; height: 188px;"></div>
                                                    </div>
                                                    <div class="contract-trigger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                              <div class="row"> -->
                                    <div class="col-12 mb-4">
                                        <div class="card">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Total Revenue -->
                            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card card-table">
                                    <div class="card-header">
                                        <div class="title">Purchases</div>
                                    </div>
                                    <div class="card-body table-responsive" style="height: 310px;">
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

                                                    @php
                                                        $stt =
                                                            ($purchases->currentPage() - 1) * $purchases->perPage() +
                                                            $loop->index +
                                                            1;
                                                    @endphp
                                                    <tr class="odd" id="tr">
                                                        <td><span class="fw-medium">{{ $stt }}</span></td>
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
                                                                <i
                                                                    class="bx bxs-circle fs-tiny me-2"></i>{{ $pur->status }}
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pagi pn">
                                        <ul class="pagination justify-content-center">
                                            @if ($purchases->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">
                                                        Previous
                                                    </span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $purchases->previousPageUrl() }}">
                                                        Previous
                                                    </a>
                                                </li>
                                            @endif

                                            @for ($page = 1; $page <= $purchases->lastPage(); $page++)
                                                @if ($page > 0 && $page <= $purchases->lastPage())
                                                    <li
                                                        class="page-item {{ $purchases->currentPage() == $page ? 'active' : '' }}">
                                                        <a class="page-link"
                                                            href="{{ $purchases->url($page) }}">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endfor

                                            @if ($purchases->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $purchases->nextPageUrl() }}">
                                                        Next
                                                    </a>
                                                </li>
                                            @else
                                                <li class="page-item disabled">
                                                    <span class="page-link">
                                                        Next
                                                    </span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--/ Total Revenue -->
                            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card card-table">
                                    <div class="card-header">
                                        <div class="title">Top Products</div>
                                    </div>
                                    <div class="card-body table-responsive" style="height: 290px;">
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
                                            <tbody>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
@endsection
