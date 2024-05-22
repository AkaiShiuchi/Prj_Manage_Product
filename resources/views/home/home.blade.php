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
                            @if (auth()->user()->role_id === 1)
                                <li class="menu-item">
                                    <a href="/user-manage" class="menu-link">
                                        <div class="text-truncate" data-i18n="User Manage">User Manage</div>
                                    </a>
                                </li>
                            @endif
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
                                        <img src="https://thumbs.dreamstime.com/b/cute-cat-avatar-vector-illustration-solid-icon-style-152373470.jpg"
                                            alt="Image User" class="w-px-40 h-auto rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="https://thumbs.dreamstime.com/b/cute-cat-avatar-vector-illustration-solid-icon-style-152373470.jpg"
                                                            alt="" class="w-px-40 h-auto rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-medium d-block">{{ session('user_name') }}</span>
                                                    @if (auth()->user()->role_id === 1)
                                                        <small class="text-muted">Admin</small>
                                                    @else
                                                        <small class="text-muted">User</small>
                                                    @endif
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
                                                <h3 class="card-title text-nowrap mb-1">0₫</h3>
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
                                                <h3 class="card-title text-nowrap mb-2">{{ $sum_purchas }}₫</h3>
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
                            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                                <div class="card">
                                    <div class="row row-bordered g-0">
                                        <div class="col-md-8">
                                            <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                                            <div id="totalRevenueChart" class="px-2" style="min-height: 315px;">
                                                <div id="apexcharts3rmhht5d"
                                                    class="apexcharts-canvas apexcharts3rmhht5d apexcharts-theme-light"
                                                    style="width: 515px; height: 300px;"><svg id="SvgjsSvg4859"
                                                        width="515" height="300" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <foreignObject x="0" y="0" width="515" height="300">
                                                            <div class="apexcharts-legend apexcharts-align-left apx-legend-position-top"
                                                                xmlns="http://www.w3.org/1999/xhtml"
                                                                style="right: 0px; position: absolute; left: 0px; top: 4px; max-height: 150px;">
                                                                <div class="apexcharts-legend-series" rel="1"
                                                                    seriesname="2021" data:collapsed="false"
                                                                    style="margin: 2px 10px;"><span
                                                                        class="apexcharts-legend-marker" rel="1"
                                                                        data:collapsed="false"
                                                                        style="background: rgb(105, 108, 255) !important; color: rgb(105, 108, 255); height: 8px; width: 8px; left: -3px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                                        class="apexcharts-legend-text" rel="1"
                                                                        i="0" data:default-text="2021"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(105, 122, 141); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">2021</span>
                                                                </div>
                                                                <div class="apexcharts-legend-series" rel="2"
                                                                    seriesname="2020" data:collapsed="false"
                                                                    style="margin: 2px 10px;"><span
                                                                        class="apexcharts-legend-marker" rel="2"
                                                                        data:collapsed="false"
                                                                        style="background: rgb(3, 195, 236) !important; color: rgb(3, 195, 236); height: 8px; width: 8px; left: -3px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span
                                                                        class="apexcharts-legend-text" rel="2"
                                                                        i="1" data:default-text="2020"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(105, 122, 141); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">2020</span>
                                                                </div>
                                                            </div>
                                                            <style type="text/css">
                                                                .apexcharts-legend {
                                                                    display: flex;
                                                                    overflow: auto;
                                                                    padding: 0 10px;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom,
                                                                .apexcharts-legend.apx-legend-position-top {
                                                                    flex-wrap: wrap
                                                                }

                                                                .apexcharts-legend.apx-legend-position-right,
                                                                .apexcharts-legend.apx-legend-position-left {
                                                                    flex-direction: column;
                                                                    bottom: 0;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                                .apexcharts-legend.apx-legend-position-right,
                                                                .apexcharts-legend.apx-legend-position-left {
                                                                    justify-content: flex-start;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                    justify-content: center;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                                .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                    justify-content: flex-end;
                                                                }

                                                                .apexcharts-legend-series {
                                                                    cursor: pointer;
                                                                    line-height: normal;
                                                                }

                                                                .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                                                .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                                    display: flex;
                                                                    align-items: center;
                                                                }

                                                                .apexcharts-legend-text {
                                                                    position: relative;
                                                                    font-size: 14px;
                                                                }

                                                                .apexcharts-legend-text *,
                                                                .apexcharts-legend-marker * {
                                                                    pointer-events: none;
                                                                }

                                                                .apexcharts-legend-marker {
                                                                    position: relative;
                                                                    display: inline-block;
                                                                    cursor: pointer;
                                                                    margin-right: 3px;
                                                                    border-style: solid;
                                                                }

                                                                .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                                                .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                                    display: inline-block;
                                                                }

                                                                .apexcharts-legend-series.apexcharts-no-click {
                                                                    cursor: auto;
                                                                }

                                                                .apexcharts-legend .apexcharts-hidden-zero-series,
                                                                .apexcharts-legend .apexcharts-hidden-null-series {
                                                                    display: none !important;
                                                                }

                                                                .apexcharts-inactive-legend {
                                                                    opacity: 0.45;
                                                                }
                                                            </style>
                                                        </foreignObject>
                                                        <g id="SvgjsG4861" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(53.80000114440918, 52)">
                                                            <defs id="SvgjsDefs4860">
                                                                <linearGradient id="SvgjsLinearGradient4865"
                                                                    x1="0" y1="0" x2="0"
                                                                    y2="1">
                                                                    <stop id="SvgjsStop4866" stop-opacity="0.4"
                                                                        stop-color="rgba(216,227,240,0.4)"
                                                                        offset="0"></stop>
                                                                    <stop id="SvgjsStop4867" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)"
                                                                        offset="1"></stop>
                                                                    <stop id="SvgjsStop4868" stop-opacity="0.5"
                                                                        stop-color="rgba(190,209,230,0.5)"
                                                                        offset="1"></stop>
                                                                </linearGradient>
                                                                <clipPath id="gridRectMask3rmhht5d">
                                                                    <rect id="SvgjsRect4870" width="451.1999988555908"
                                                                        height="223.70079907417298" x="-5" y="-3"
                                                                        rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMask3rmhht5d"></clipPath>
                                                                <clipPath id="nonForecastMask3rmhht5d"></clipPath>
                                                                <clipPath id="gridRectMarkerMask3rmhht5d">
                                                                    <rect id="SvgjsRect4871" width="445.1999988555908"
                                                                        height="221.70079907417298" x="-2" y="-2"
                                                                        rx="0" ry="0" opacity="1"
                                                                        stroke-width="0" stroke="none"
                                                                        stroke-dasharray="0" fill="#fff"></rect>
                                                                </clipPath>
                                                            </defs>
                                                            <rect id="SvgjsRect4869" width="22.05999994277954"
                                                                height="217.70079907417298" x="139.97143421854292" y="0"
                                                                rx="0" ry="0" opacity="1"
                                                                stroke-width="0" stroke-dasharray="3"
                                                                fill="url(#SvgjsLinearGradient4865)"
                                                                class="apexcharts-xcrosshairs" y2="217.70079907417298"
                                                                filter="none" fill-opacity="0.9"
                                                                x1="139.97143421854292" x2="139.97143421854292"></rect>
                                                            <g id="SvgjsG4891" class="apexcharts-xaxis"
                                                                transform="translate(0, 0)">
                                                                <g id="SvgjsG4892" class="apexcharts-xaxis-texts-g"
                                                                    transform="translate(0, -4)"><text
                                                                        id="SvgjsText4894"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="31.5142856325422" y="246.70079907417298"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="13px" font-weight="400"
                                                                        fill="#a1acb8"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan4895">Jan</tspan>
                                                                        <title>Jan</title>
                                                                    </text><text id="SvgjsText4897"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="94.5428568976266" y="246.70079907417298"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="13px" font-weight="400"
                                                                        fill="#a1acb8"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan4898">Feb</tspan>
                                                                        <title>Feb</title>
                                                                    </text><text id="SvgjsText4900"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="157.57142816271102" y="246.70079907417298"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="13px" font-weight="400"
                                                                        fill="#a1acb8"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan4901">Mar</tspan>
                                                                        <title>Mar</title>
                                                                    </text><text id="SvgjsText4903"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="220.5999994277954" y="246.70079907417298"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="13px" font-weight="400"
                                                                        fill="#a1acb8"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan4904">Apr</tspan>
                                                                        <title>Apr</title>
                                                                    </text><text id="SvgjsText4906"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="283.6285706928798" y="246.70079907417298"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="13px" font-weight="400"
                                                                        fill="#a1acb8"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan4907">May</tspan>
                                                                        <title>May</title>
                                                                    </text><text id="SvgjsText4909"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="346.6571419579642" y="246.70079907417298"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="13px" font-weight="400"
                                                                        fill="#a1acb8"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan4910">Jun</tspan>
                                                                        <title>Jun</title>
                                                                    </text><text id="SvgjsText4912"
                                                                        font-family="Helvetica, Arial, sans-serif"
                                                                        x="409.6857132230486" y="246.70079907417298"
                                                                        text-anchor="middle" dominant-baseline="auto"
                                                                        font-size="13px" font-weight="400"
                                                                        fill="#a1acb8"
                                                                        class="apexcharts-text apexcharts-xaxis-label "
                                                                        style="font-family: Helvetica, Arial, sans-serif;">
                                                                        <tspan id="SvgjsTspan4913">Jul</tspan>
                                                                        <title>Jul</title>
                                                                    </text></g>
                                                            </g>
                                                            <g id="SvgjsG4928" class="apexcharts-grid">
                                                                <g id="SvgjsG4929"
                                                                    class="apexcharts-gridlines-horizontal">
                                                                    <line id="SvgjsLine4931" x1="0"
                                                                        y1="0" x2="441.1999988555908"
                                                                        y2="0" stroke="#eceef1"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4932" x1="0"
                                                                        y1="43.540159814834595" x2="441.1999988555908"
                                                                        y2="43.540159814834595" stroke="#eceef1"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4933" x1="0"
                                                                        y1="87.08031962966919" x2="441.1999988555908"
                                                                        y2="87.08031962966919" stroke="#eceef1"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4934" x1="0"
                                                                        y1="130.6204794445038" x2="441.1999988555908"
                                                                        y2="130.6204794445038" stroke="#eceef1"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4935" x1="0"
                                                                        y1="174.16063925933838" x2="441.1999988555908"
                                                                        y2="174.16063925933838" stroke="#eceef1"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                    <line id="SvgjsLine4936" x1="0"
                                                                        y1="217.70079907417298" x2="441.1999988555908"
                                                                        y2="217.70079907417298" stroke="#eceef1"
                                                                        stroke-dasharray="0" stroke-linecap="butt"
                                                                        class="apexcharts-gridline"></line>
                                                                </g>
                                                                <g id="SvgjsG4930"
                                                                    class="apexcharts-gridlines-vertical"></g>
                                                                <line id="SvgjsLine4938" x1="0"
                                                                    y1="217.70079907417298" x2="441.1999988555908"
                                                                    y2="217.70079907417298" stroke="transparent"
                                                                    stroke-dasharray="0" stroke-linecap="butt"></line>
                                                                <line id="SvgjsLine4937" x1="0" y1="1"
                                                                    x2="0" y2="217.70079907417298"
                                                                    stroke="transparent" stroke-dasharray="0"
                                                                    stroke-linecap="butt"></line>
                                                            </g>
                                                            <g id="SvgjsG4872"
                                                                class="apexcharts-bar-series apexcharts-plot-series">
                                                                <g id="SvgjsG4873" class="apexcharts-series"
                                                                    seriesName="2021" rel="1"
                                                                    data:realIndex="0">
                                                                    <path id="SvgjsPath4875"
                                                                        d="M 20.48428566115243 120.62047944450379L 20.48428566115243 62.24819177780151Q 20.48428566115243 52.24819177780151 30.48428566115243 52.24819177780151L 26.544285603931968 52.24819177780151Q 36.54428560393197 52.24819177780151 36.54428560393197 62.24819177780151L 36.54428560393197 62.24819177780151L 36.54428560393197 120.62047944450379Q 36.54428560393197 130.6204794445038 26.544285603931968 130.6204794445038L 30.48428566115243 130.6204794445038Q 20.48428566115243 130.6204794445038 20.48428566115243 120.62047944450379z"
                                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="0"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 20.48428566115243 120.62047944450379L 20.48428566115243 62.24819177780151Q 20.48428566115243 52.24819177780151 30.48428566115243 52.24819177780151L 26.544285603931968 52.24819177780151Q 36.54428560393197 52.24819177780151 36.54428560393197 62.24819177780151L 36.54428560393197 62.24819177780151L 36.54428560393197 120.62047944450379Q 36.54428560393197 130.6204794445038 26.544285603931968 130.6204794445038L 30.48428566115243 130.6204794445038Q 20.48428566115243 130.6204794445038 20.48428566115243 120.62047944450379z"
                                                                        pathFrom="M 20.48428566115243 0L 20.48428566115243 0Q 20.48428566115243 0 20.48428566115243 0L 20.48428566115243 0Q 20.48428566115243 0 20.48428566115243 0L 20.48428566115243 0L 20.48428566115243 0Q 20.48428566115243 0 20.48428566115243 0L 20.48428566115243 0Q 20.48428566115243 0 20.48428566115243 0zL 20.48428566115243 120.62047944450379L 36.54428560393197 120.62047944450379L 36.54428560393197 120.62047944450379L 36.54428560393197 120.62047944450379L 36.54428560393197 120.62047944450379L 36.54428560393197 120.62047944450379L 20.48428566115243 120.62047944450379"
                                                                        cy="52.24819177780151" cx="80.51285692623684"
                                                                        j="0" val="18"
                                                                        barHeight="78.37228766670228"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4876"
                                                                        d="M 83.51285692623684 120.62047944450379L 83.51285692623684 110.14236757411956Q 83.51285692623684 100.14236757411956 93.51285692623684 100.14236757411956L 89.57285686901638 100.14236757411956Q 99.57285686901638 100.14236757411956 99.57285686901638 110.14236757411956L 99.57285686901638 110.14236757411956L 99.57285686901638 120.62047944450379Q 99.57285686901638 130.6204794445038 89.57285686901638 130.6204794445038L 93.51285692623684 130.6204794445038Q 83.51285692623684 130.6204794445038 83.51285692623684 120.62047944450379z"
                                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="0"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 83.51285692623684 120.62047944450379L 83.51285692623684 110.14236757411956Q 83.51285692623684 100.14236757411956 93.51285692623684 100.14236757411956L 89.57285686901638 100.14236757411956Q 99.57285686901638 100.14236757411956 99.57285686901638 110.14236757411956L 99.57285686901638 110.14236757411956L 99.57285686901638 120.62047944450379Q 99.57285686901638 130.6204794445038 89.57285686901638 130.6204794445038L 93.51285692623684 130.6204794445038Q 83.51285692623684 130.6204794445038 83.51285692623684 120.62047944450379z"
                                                                        pathFrom="M 83.51285692623684 0L 83.51285692623684 0Q 83.51285692623684 0 83.51285692623684 0L 83.51285692623684 0Q 83.51285692623684 0 83.51285692623684 0L 83.51285692623684 0L 83.51285692623684 0Q 83.51285692623684 0 83.51285692623684 0L 83.51285692623684 0Q 83.51285692623684 0 83.51285692623684 0zL 83.51285692623684 120.62047944450379L 99.57285686901638 120.62047944450379L 99.57285686901638 120.62047944450379L 99.57285686901638 120.62047944450379L 99.57285686901638 120.62047944450379L 99.57285686901638 120.62047944450379L 83.51285692623684 120.62047944450379"
                                                                        cy="100.14236757411956" cx="143.54142819132124"
                                                                        j="1" val="7"
                                                                        barHeight="30.478111870384218"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4877"
                                                                        d="M 146.54142819132124 120.62047944450379L 146.54142819132124 75.3102397222519Q 146.54142819132124 65.3102397222519 156.54142819132124 65.3102397222519L 152.6014281341008 65.3102397222519Q 162.6014281341008 65.3102397222519 162.6014281341008 75.3102397222519L 162.6014281341008 75.3102397222519L 162.6014281341008 120.62047944450379Q 162.6014281341008 130.6204794445038 152.6014281341008 130.6204794445038L 156.54142819132124 130.6204794445038Q 146.54142819132124 130.6204794445038 146.54142819132124 120.62047944450379z"
                                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="0"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 146.54142819132124 120.62047944450379L 146.54142819132124 75.3102397222519Q 146.54142819132124 65.3102397222519 156.54142819132124 65.3102397222519L 152.6014281341008 65.3102397222519Q 162.6014281341008 65.3102397222519 162.6014281341008 75.3102397222519L 162.6014281341008 75.3102397222519L 162.6014281341008 120.62047944450379Q 162.6014281341008 130.6204794445038 152.6014281341008 130.6204794445038L 156.54142819132124 130.6204794445038Q 146.54142819132124 130.6204794445038 146.54142819132124 120.62047944450379z"
                                                                        pathFrom="M 146.54142819132124 0L 146.54142819132124 0Q 146.54142819132124 0 146.54142819132124 0L 146.54142819132124 0Q 146.54142819132124 0 146.54142819132124 0L 146.54142819132124 0L 146.54142819132124 0Q 146.54142819132124 0 146.54142819132124 0L 146.54142819132124 0Q 146.54142819132124 0 146.54142819132124 0zL 146.54142819132124 120.62047944450379L 162.6014281341008 120.62047944450379L 162.6014281341008 120.62047944450379L 162.6014281341008 120.62047944450379L 162.6014281341008 120.62047944450379L 162.6014281341008 120.62047944450379L 146.54142819132124 120.62047944450379"
                                                                        cy="65.3102397222519" cx="206.56999945640564"
                                                                        j="2" val="15"
                                                                        barHeight="65.3102397222519"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4878"
                                                                        d="M 209.56999945640564 120.62047944450379L 209.56999945640564 14.354015981483457Q 209.56999945640564 4.354015981483457 219.56999945640564 4.354015981483457L 215.62999939918518 4.354015981483457Q 225.62999939918518 4.354015981483457 225.62999939918518 14.354015981483457L 225.62999939918518 14.354015981483457L 225.62999939918518 120.62047944450379Q 225.62999939918518 130.6204794445038 215.62999939918518 130.6204794445038L 219.56999945640564 130.6204794445038Q 209.56999945640564 130.6204794445038 209.56999945640564 120.62047944450379z"
                                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="0"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 209.56999945640564 120.62047944450379L 209.56999945640564 14.354015981483457Q 209.56999945640564 4.354015981483457 219.56999945640564 4.354015981483457L 215.62999939918518 4.354015981483457Q 225.62999939918518 4.354015981483457 225.62999939918518 14.354015981483457L 225.62999939918518 14.354015981483457L 225.62999939918518 120.62047944450379Q 225.62999939918518 130.6204794445038 215.62999939918518 130.6204794445038L 219.56999945640564 130.6204794445038Q 209.56999945640564 130.6204794445038 209.56999945640564 120.62047944450379z"
                                                                        pathFrom="M 209.56999945640564 0L 209.56999945640564 0Q 209.56999945640564 0 209.56999945640564 0L 209.56999945640564 0Q 209.56999945640564 0 209.56999945640564 0L 209.56999945640564 0L 209.56999945640564 0Q 209.56999945640564 0 209.56999945640564 0L 209.56999945640564 0Q 209.56999945640564 0 209.56999945640564 0zL 209.56999945640564 120.62047944450379L 225.62999939918518 120.62047944450379L 225.62999939918518 120.62047944450379L 225.62999939918518 120.62047944450379L 225.62999939918518 120.62047944450379L 225.62999939918518 120.62047944450379L 209.56999945640564 120.62047944450379"
                                                                        cy="4.354015981483457" cx="269.59857072149003"
                                                                        j="3" val="29"
                                                                        barHeight="126.26646346302033"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4879"
                                                                        d="M 272.59857072149003 120.62047944450379L 272.59857072149003 62.24819177780151Q 272.59857072149003 52.24819177780151 282.59857072149003 52.24819177780151L 278.6585706642696 52.24819177780151Q 288.6585706642696 52.24819177780151 288.6585706642696 62.24819177780151L 288.6585706642696 62.24819177780151L 288.6585706642696 120.62047944450379Q 288.6585706642696 130.6204794445038 278.6585706642696 130.6204794445038L 282.59857072149003 130.6204794445038Q 272.59857072149003 130.6204794445038 272.59857072149003 120.62047944450379z"
                                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="0"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 272.59857072149003 120.62047944450379L 272.59857072149003 62.24819177780151Q 272.59857072149003 52.24819177780151 282.59857072149003 52.24819177780151L 278.6585706642696 52.24819177780151Q 288.6585706642696 52.24819177780151 288.6585706642696 62.24819177780151L 288.6585706642696 62.24819177780151L 288.6585706642696 120.62047944450379Q 288.6585706642696 130.6204794445038 278.6585706642696 130.6204794445038L 282.59857072149003 130.6204794445038Q 272.59857072149003 130.6204794445038 272.59857072149003 120.62047944450379z"
                                                                        pathFrom="M 272.59857072149003 0L 272.59857072149003 0Q 272.59857072149003 0 272.59857072149003 0L 272.59857072149003 0Q 272.59857072149003 0 272.59857072149003 0L 272.59857072149003 0L 272.59857072149003 0Q 272.59857072149003 0 272.59857072149003 0L 272.59857072149003 0Q 272.59857072149003 0 272.59857072149003 0zL 272.59857072149003 120.62047944450379L 288.6585706642696 120.62047944450379L 288.6585706642696 120.62047944450379L 288.6585706642696 120.62047944450379L 288.6585706642696 120.62047944450379L 288.6585706642696 120.62047944450379L 272.59857072149003 120.62047944450379"
                                                                        cy="52.24819177780151" cx="332.62714198657443"
                                                                        j="4" val="18"
                                                                        barHeight="78.37228766670228"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4880"
                                                                        d="M 335.62714198657443 120.62047944450379L 335.62714198657443 88.37228766670228Q 335.62714198657443 78.37228766670228 345.62714198657443 78.37228766670228L 341.68714192935397 78.37228766670228Q 351.68714192935397 78.37228766670228 351.68714192935397 88.37228766670228L 351.68714192935397 88.37228766670228L 351.68714192935397 120.62047944450379Q 351.68714192935397 130.6204794445038 341.68714192935397 130.6204794445038L 345.62714198657443 130.6204794445038Q 335.62714198657443 130.6204794445038 335.62714198657443 120.62047944450379z"
                                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="0"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 335.62714198657443 120.62047944450379L 335.62714198657443 88.37228766670228Q 335.62714198657443 78.37228766670228 345.62714198657443 78.37228766670228L 341.68714192935397 78.37228766670228Q 351.68714192935397 78.37228766670228 351.68714192935397 88.37228766670228L 351.68714192935397 88.37228766670228L 351.68714192935397 120.62047944450379Q 351.68714192935397 130.6204794445038 341.68714192935397 130.6204794445038L 345.62714198657443 130.6204794445038Q 335.62714198657443 130.6204794445038 335.62714198657443 120.62047944450379z"
                                                                        pathFrom="M 335.62714198657443 0L 335.62714198657443 0Q 335.62714198657443 0 335.62714198657443 0L 335.62714198657443 0Q 335.62714198657443 0 335.62714198657443 0L 335.62714198657443 0L 335.62714198657443 0Q 335.62714198657443 0 335.62714198657443 0L 335.62714198657443 0Q 335.62714198657443 0 335.62714198657443 0zL 335.62714198657443 120.62047944450379L 351.68714192935397 120.62047944450379L 351.68714192935397 120.62047944450379L 351.68714192935397 120.62047944450379L 351.68714192935397 120.62047944450379L 351.68714192935397 120.62047944450379L 335.62714198657443 120.62047944450379"
                                                                        cy="78.37228766670228" cx="395.6557132516588"
                                                                        j="5" val="12"
                                                                        barHeight="52.248191777801516"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4881"
                                                                        d="M 398.6557132516588 120.62047944450379L 398.6557132516588 101.43433561115265Q 398.6557132516588 91.43433561115265 408.6557132516588 91.43433561115265L 404.71571319443837 91.43433561115265Q 414.71571319443837 91.43433561115265 414.71571319443837 101.43433561115265L 414.71571319443837 101.43433561115265L 414.71571319443837 120.62047944450379Q 414.71571319443837 130.6204794445038 404.71571319443837 130.6204794445038L 408.6557132516588 130.6204794445038Q 398.6557132516588 130.6204794445038 398.6557132516588 120.62047944450379z"
                                                                        fill="rgba(105,108,255,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="0"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 398.6557132516588 120.62047944450379L 398.6557132516588 101.43433561115265Q 398.6557132516588 91.43433561115265 408.6557132516588 91.43433561115265L 404.71571319443837 91.43433561115265Q 414.71571319443837 91.43433561115265 414.71571319443837 101.43433561115265L 414.71571319443837 101.43433561115265L 414.71571319443837 120.62047944450379Q 414.71571319443837 130.6204794445038 404.71571319443837 130.6204794445038L 408.6557132516588 130.6204794445038Q 398.6557132516588 130.6204794445038 398.6557132516588 120.62047944450379z"
                                                                        pathFrom="M 398.6557132516588 0L 398.6557132516588 0Q 398.6557132516588 0 398.6557132516588 0L 398.6557132516588 0Q 398.6557132516588 0 398.6557132516588 0L 398.6557132516588 0L 398.6557132516588 0Q 398.6557132516588 0 398.6557132516588 0L 398.6557132516588 0Q 398.6557132516588 0 398.6557132516588 0zL 398.6557132516588 120.62047944450379L 414.71571319443837 120.62047944450379L 414.71571319443837 120.62047944450379L 414.71571319443837 120.62047944450379L 414.71571319443837 120.62047944450379L 414.71571319443837 120.62047944450379L 398.6557132516588 120.62047944450379"
                                                                        cy="91.43433561115265" cx="458.6842845167432"
                                                                        j="6" val="9"
                                                                        barHeight="39.18614383335114"
                                                                        barWidth="22.05999994277954"></path>
                                                                </g>
                                                                <g id="SvgjsG4882" class="apexcharts-series"
                                                                    seriesName="2020" rel="2"
                                                                    data:realIndex="1">
                                                                    <path id="SvgjsPath4884"
                                                                        d="M 20.48428566115243 150.6204794445038L 20.48428566115243 187.22268720378878Q 20.48428566115243 197.22268720378878 30.48428566115243 197.22268720378878L 26.544285603931968 197.22268720378878Q 36.54428560393197 197.22268720378878 36.54428560393197 187.22268720378878L 36.54428560393197 187.22268720378878L 36.54428560393197 150.6204794445038Q 36.54428560393197 140.6204794445038 26.544285603931968 140.6204794445038L 30.48428566115243 140.6204794445038Q 20.48428566115243 140.6204794445038 20.48428566115243 150.6204794445038z"
                                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="1"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 20.48428566115243 150.6204794445038L 20.48428566115243 187.22268720378878Q 20.48428566115243 197.22268720378878 30.48428566115243 197.22268720378878L 26.544285603931968 197.22268720378878Q 36.54428560393197 197.22268720378878 36.54428560393197 187.22268720378878L 36.54428560393197 187.22268720378878L 36.54428560393197 150.6204794445038Q 36.54428560393197 140.6204794445038 26.544285603931968 140.6204794445038L 30.48428566115243 140.6204794445038Q 20.48428566115243 140.6204794445038 20.48428566115243 150.6204794445038z"
                                                                        pathFrom="M 20.48428566115243 20L 20.48428566115243 141.5055193982124Q 20.48428566115243 151.5055193982124 30.48428566115243 151.5055193982124L 26.544285603931968 151.5055193982124Q 36.54428560393197 151.5055193982124 36.54428560393197 141.5055193982124L 36.54428560393197 141.5055193982124L 36.54428560393197 20Q 36.54428560393197 10 26.544285603931968 10L 30.48428566115243 10Q 20.48428566115243 10 20.48428566115243 20zL 20.48428566115243 150.6204794445038L 36.54428560393197 150.6204794445038L 36.54428560393197 150.6204794445038L 36.54428560393197 150.6204794445038L 36.54428560393197 150.6204794445038L 36.54428560393197 150.6204794445038L 20.48428566115243 150.6204794445038"
                                                                        cy="177.22268720378878" cx="80.51285692623684"
                                                                        j="0" val="-13"
                                                                        barHeight="-56.60220775928498"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4885"
                                                                        d="M 83.51285692623684 150.6204794445038L 83.51285692623684 208.99276711120606Q 83.51285692623684 218.99276711120606 93.51285692623684 218.99276711120606L 89.57285686901638 218.99276711120606Q 99.57285686901638 218.99276711120606 99.57285686901638 208.99276711120606L 99.57285686901638 208.99276711120606L 99.57285686901638 150.6204794445038Q 99.57285686901638 140.6204794445038 89.57285686901638 140.6204794445038L 93.51285692623684 140.6204794445038Q 83.51285692623684 140.6204794445038 83.51285692623684 150.6204794445038z"
                                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="1"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 83.51285692623684 150.6204794445038L 83.51285692623684 208.99276711120606Q 83.51285692623684 218.99276711120606 93.51285692623684 218.99276711120606L 89.57285686901638 218.99276711120606Q 99.57285686901638 218.99276711120606 99.57285686901638 208.99276711120606L 99.57285686901638 208.99276711120606L 99.57285686901638 150.6204794445038Q 99.57285686901638 140.6204794445038 89.57285686901638 140.6204794445038L 93.51285692623684 140.6204794445038Q 83.51285692623684 140.6204794445038 83.51285692623684 150.6204794445038z"
                                                                        pathFrom="M 83.51285692623684 20L 83.51285692623684 195.93071916675567Q 83.51285692623684 205.93071916675567 93.51285692623684 205.93071916675567L 89.57285686901638 205.93071916675567Q 99.57285686901638 205.93071916675567 99.57285686901638 195.93071916675567L 99.57285686901638 195.93071916675567L 99.57285686901638 20Q 99.57285686901638 10 89.57285686901638 10L 93.51285692623684 10Q 83.51285692623684 10 83.51285692623684 20zL 83.51285692623684 150.6204794445038L 99.57285686901638 150.6204794445038L 99.57285686901638 150.6204794445038L 99.57285686901638 150.6204794445038L 99.57285686901638 150.6204794445038L 99.57285686901638 150.6204794445038L 83.51285692623684 150.6204794445038"
                                                                        cy="198.99276711120606" cx="143.54142819132124"
                                                                        j="1" val="-18"
                                                                        barHeight="-78.37228766670228"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4886"
                                                                        d="M 146.54142819132124 150.6204794445038L 146.54142819132124 169.80662327785492Q 146.54142819132124 179.80662327785492 156.54142819132124 179.80662327785492L 152.6014281341008 179.80662327785492Q 162.6014281341008 179.80662327785492 162.6014281341008 169.80662327785492L 162.6014281341008 169.80662327785492L 162.6014281341008 150.6204794445038Q 162.6014281341008 140.6204794445038 152.6014281341008 140.6204794445038L 156.54142819132124 140.6204794445038Q 146.54142819132124 140.6204794445038 146.54142819132124 150.6204794445038z"
                                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="1"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 146.54142819132124 150.6204794445038L 146.54142819132124 169.80662327785492Q 146.54142819132124 179.80662327785492 156.54142819132124 179.80662327785492L 152.6014281341008 179.80662327785492Q 162.6014281341008 179.80662327785492 162.6014281341008 169.80662327785492L 162.6014281341008 169.80662327785492L 162.6014281341008 150.6204794445038Q 162.6014281341008 140.6204794445038 152.6014281341008 140.6204794445038L 156.54142819132124 140.6204794445038Q 146.54142819132124 140.6204794445038 146.54142819132124 150.6204794445038z"
                                                                        pathFrom="M 146.54142819132124 20L 146.54142819132124 97.96535958337783Q 146.54142819132124 107.96535958337783 156.54142819132124 107.96535958337783L 152.6014281341008 107.96535958337783Q 162.6014281341008 107.96535958337783 162.6014281341008 97.96535958337783L 162.6014281341008 97.96535958337783L 162.6014281341008 20Q 162.6014281341008 10 152.6014281341008 10L 156.54142819132124 10Q 146.54142819132124 10 146.54142819132124 20zL 146.54142819132124 150.6204794445038L 162.6014281341008 150.6204794445038L 162.6014281341008 150.6204794445038L 162.6014281341008 150.6204794445038L 162.6014281341008 150.6204794445038L 162.6014281341008 150.6204794445038L 146.54142819132124 150.6204794445038"
                                                                        cy="159.80662327785492" cx="206.56999945640564"
                                                                        j="2" val="-9"
                                                                        barHeight="-39.18614383335114"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4887"
                                                                        d="M 209.56999945640564 150.6204794445038L 209.56999945640564 191.5767031852722Q 209.56999945640564 201.5767031852722 219.56999945640564 201.5767031852722L 215.62999939918518 201.5767031852722Q 225.62999939918518 201.5767031852722 225.62999939918518 191.5767031852722L 225.62999939918518 191.5767031852722L 225.62999939918518 150.6204794445038Q 225.62999939918518 140.6204794445038 215.62999939918518 140.6204794445038L 219.56999945640564 140.6204794445038Q 209.56999945640564 140.6204794445038 209.56999945640564 150.6204794445038z"
                                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="1"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 209.56999945640564 150.6204794445038L 209.56999945640564 191.5767031852722Q 209.56999945640564 201.5767031852722 219.56999945640564 201.5767031852722L 215.62999939918518 201.5767031852722Q 225.62999939918518 201.5767031852722 225.62999939918518 191.5767031852722L 225.62999939918518 191.5767031852722L 225.62999939918518 150.6204794445038Q 225.62999939918518 140.6204794445038 215.62999939918518 140.6204794445038L 219.56999945640564 140.6204794445038Q 209.56999945640564 140.6204794445038 209.56999945640564 150.6204794445038z"
                                                                        pathFrom="M 209.56999945640564 20L 209.56999945640564 152.39055935192107Q 209.56999945640564 162.39055935192107 219.56999945640564 162.39055935192107L 215.62999939918518 162.39055935192107Q 225.62999939918518 162.39055935192107 225.62999939918518 152.39055935192107L 225.62999939918518 152.39055935192107L 225.62999939918518 20Q 225.62999939918518 10 215.62999939918518 10L 219.56999945640564 10Q 209.56999945640564 10 209.56999945640564 20zL 209.56999945640564 150.6204794445038L 225.62999939918518 150.6204794445038L 225.62999939918518 150.6204794445038L 225.62999939918518 150.6204794445038L 225.62999939918518 150.6204794445038L 225.62999939918518 150.6204794445038L 209.56999945640564 150.6204794445038"
                                                                        cy="181.5767031852722" cx="269.59857072149003"
                                                                        j="3" val="-14"
                                                                        barHeight="-60.956223740768436"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4888"
                                                                        d="M 272.59857072149003 150.6204794445038L 272.59857072149003 152.39055935192107Q 272.59857072149003 162.39055935192107 282.59857072149003 162.39055935192107L 278.6585706642696 162.39055935192107Q 288.6585706642696 162.39055935192107 288.6585706642696 152.39055935192107L 288.6585706642696 152.39055935192107L 288.6585706642696 150.6204794445038Q 288.6585706642696 140.6204794445038 278.6585706642696 140.6204794445038L 282.59857072149003 140.6204794445038Q 272.59857072149003 140.6204794445038 272.59857072149003 150.6204794445038z"
                                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="1"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 272.59857072149003 150.6204794445038L 272.59857072149003 152.39055935192107Q 272.59857072149003 162.39055935192107 282.59857072149003 162.39055935192107L 278.6585706642696 162.39055935192107Q 288.6585706642696 162.39055935192107 288.6585706642696 152.39055935192107L 288.6585706642696 152.39055935192107L 288.6585706642696 150.6204794445038Q 288.6585706642696 140.6204794445038 278.6585706642696 140.6204794445038L 282.59857072149003 140.6204794445038Q 272.59857072149003 140.6204794445038 272.59857072149003 150.6204794445038z"
                                                                        pathFrom="M 272.59857072149003 20L 272.59857072149003 54.425199768543244Q 272.59857072149003 64.42519976854325 282.59857072149003 64.42519976854325L 278.6585706642696 64.42519976854325Q 288.6585706642696 64.42519976854325 288.6585706642696 54.425199768543244L 288.6585706642696 54.425199768543244L 288.6585706642696 20Q 288.6585706642696 10 278.6585706642696 10L 282.59857072149003 10Q 272.59857072149003 10 272.59857072149003 20zL 272.59857072149003 150.6204794445038L 288.6585706642696 150.6204794445038L 288.6585706642696 150.6204794445038L 288.6585706642696 150.6204794445038L 288.6585706642696 150.6204794445038L 288.6585706642696 150.6204794445038L 272.59857072149003 150.6204794445038"
                                                                        cy="142.39055935192107" cx="332.62714198657443"
                                                                        j="4" val="-5"
                                                                        barHeight="-21.770079907417298"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4889"
                                                                        d="M 335.62714198657443 150.6204794445038L 335.62714198657443 204.6387511297226Q 335.62714198657443 214.6387511297226 345.62714198657443 214.6387511297226L 341.68714192935397 214.6387511297226Q 351.68714192935397 214.6387511297226 351.68714192935397 204.6387511297226L 351.68714192935397 204.6387511297226L 351.68714192935397 150.6204794445038Q 351.68714192935397 140.6204794445038 341.68714192935397 140.6204794445038L 345.62714198657443 140.6204794445038Q 335.62714198657443 140.6204794445038 335.62714198657443 150.6204794445038z"
                                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="1"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 335.62714198657443 150.6204794445038L 335.62714198657443 204.6387511297226Q 335.62714198657443 214.6387511297226 345.62714198657443 214.6387511297226L 341.68714192935397 214.6387511297226Q 351.68714192935397 214.6387511297226 351.68714192935397 204.6387511297226L 351.68714192935397 204.6387511297226L 351.68714192935397 150.6204794445038Q 351.68714192935397 140.6204794445038 341.68714192935397 140.6204794445038L 345.62714198657443 140.6204794445038Q 335.62714198657443 140.6204794445038 335.62714198657443 150.6204794445038z"
                                                                        pathFrom="M 335.62714198657443 20L 335.62714198657443 185.045679213047Q 335.62714198657443 195.045679213047 345.62714198657443 195.045679213047L 341.68714192935397 195.045679213047Q 351.68714192935397 195.045679213047 351.68714192935397 185.045679213047L 351.68714192935397 185.045679213047L 351.68714192935397 20Q 351.68714192935397 10 341.68714192935397 10L 345.62714198657443 10Q 335.62714198657443 10 335.62714198657443 20zL 335.62714198657443 150.6204794445038L 351.68714192935397 150.6204794445038L 351.68714192935397 150.6204794445038L 351.68714192935397 150.6204794445038L 351.68714192935397 150.6204794445038L 351.68714192935397 150.6204794445038L 335.62714198657443 150.6204794445038"
                                                                        cy="194.6387511297226" cx="395.6557132516588"
                                                                        j="5" val="-17"
                                                                        barHeight="-74.01827168521882"
                                                                        barWidth="22.05999994277954"></path>
                                                                    <path id="SvgjsPath4890"
                                                                        d="M 398.6557132516588 150.6204794445038L 398.6557132516588 195.9307191667557Q 398.6557132516588 205.9307191667557 408.6557132516588 205.9307191667557L 404.71571319443837 205.9307191667557Q 414.71571319443837 205.9307191667557 414.71571319443837 195.9307191667557L 414.71571319443837 195.9307191667557L 414.71571319443837 150.6204794445038Q 414.71571319443837 140.6204794445038 404.71571319443837 140.6204794445038L 408.6557132516588 140.6204794445038Q 398.6557132516588 140.6204794445038 398.6557132516588 150.6204794445038z"
                                                                        fill="rgba(3,195,236,0.85)" fill-opacity="1"
                                                                        stroke="#ffffff" stroke-opacity="1"
                                                                        stroke-linecap="round" stroke-width="6"
                                                                        stroke-dasharray="0" class="apexcharts-bar-area"
                                                                        index="1"
                                                                        clip-path="url(#gridRectMask3rmhht5d)"
                                                                        pathTo="M 398.6557132516588 150.6204794445038L 398.6557132516588 195.9307191667557Q 398.6557132516588 205.9307191667557 408.6557132516588 205.9307191667557L 404.71571319443837 205.9307191667557Q 414.71571319443837 205.9307191667557 414.71571319443837 195.9307191667557L 414.71571319443837 195.9307191667557L 414.71571319443837 150.6204794445038Q 414.71571319443837 140.6204794445038 404.71571319443837 140.6204794445038L 408.6557132516588 140.6204794445038Q 398.6557132516588 140.6204794445038 398.6557132516588 150.6204794445038z"
                                                                        pathFrom="M 398.6557132516588 20L 398.6557132516588 163.27559930562973Q 398.6557132516588 173.27559930562973 408.6557132516588 173.27559930562973L 404.71571319443837 173.27559930562973Q 414.71571319443837 173.27559930562973 414.71571319443837 163.27559930562973L 414.71571319443837 163.27559930562973L 414.71571319443837 20Q 414.71571319443837 10 404.71571319443837 10L 408.6557132516588 10Q 398.6557132516588 10 398.6557132516588 20zL 398.6557132516588 150.6204794445038L 414.71571319443837 150.6204794445038L 414.71571319443837 150.6204794445038L 414.71571319443837 150.6204794445038L 414.71571319443837 150.6204794445038L 414.71571319443837 150.6204794445038L 398.6557132516588 150.6204794445038"
                                                                        cy="185.9307191667557" cx="458.6842845167432"
                                                                        j="6" val="-15"
                                                                        barHeight="-65.3102397222519"
                                                                        barWidth="22.05999994277954"></path>
                                                                </g>
                                                                <g id="SvgjsG4874" class="apexcharts-datalabels"
                                                                    data:realIndex="0"></g>
                                                                <g id="SvgjsG4883" class="apexcharts-datalabels"
                                                                    data:realIndex="1"></g>
                                                            </g>
                                                            <line id="SvgjsLine4939" x1="0" y1="0"
                                                                x2="441.1999988555908" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine4940" x1="0" y1="0"
                                                                x2="441.1999988555908" y2="0"
                                                                stroke-dasharray="0" stroke-width="0"
                                                                stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                            <g id="SvgjsG4941" class="apexcharts-yaxis-annotations"></g>
                                                            <g id="SvgjsG4942" class="apexcharts-xaxis-annotations"></g>
                                                            <g id="SvgjsG4943" class="apexcharts-point-annotations"></g>
                                                        </g>
                                                        <g id="SvgjsG4914" class="apexcharts-yaxis" rel="0"
                                                            transform="translate(15.80000114440918, 0)">
                                                            <g id="SvgjsG4915" class="apexcharts-yaxis-texts-g"><text
                                                                    id="SvgjsText4916"
                                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                                    y="53.5" text-anchor="end" dominant-baseline="auto"
                                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan4917">30</tspan>
                                                                    <title>30</title>
                                                                </text><text id="SvgjsText4918"
                                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                                    y="97.0401598148346" text-anchor="end"
                                                                    dominant-baseline="auto" font-size="13px"
                                                                    font-weight="400" fill="#a1acb8"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan4919">20</tspan>
                                                                    <title>20</title>
                                                                </text><text id="SvgjsText4920"
                                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                                    y="140.5803196296692" text-anchor="end"
                                                                    dominant-baseline="auto" font-size="13px"
                                                                    font-weight="400" fill="#a1acb8"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan4921">10</tspan>
                                                                    <title>10</title>
                                                                </text><text id="SvgjsText4922"
                                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                                    y="184.1204794445038" text-anchor="end"
                                                                    dominant-baseline="auto" font-size="13px"
                                                                    font-weight="400" fill="#a1acb8"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan4923">0</tspan>
                                                                    <title>0</title>
                                                                </text><text id="SvgjsText4924"
                                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                                    y="227.66063925933838" text-anchor="end"
                                                                    dominant-baseline="auto" font-size="13px"
                                                                    font-weight="400" fill="#a1acb8"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan4925">-10</tspan>
                                                                    <title>-10</title>
                                                                </text><text id="SvgjsText4926"
                                                                    font-family="Helvetica, Arial, sans-serif" x="20"
                                                                    y="271.200799074173" text-anchor="end"
                                                                    dominant-baseline="auto" font-size="13px"
                                                                    font-weight="400" fill="#a1acb8"
                                                                    class="apexcharts-text apexcharts-yaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                                    <tspan id="SvgjsTspan4927">-20</tspan>
                                                                    <title>-20</title>
                                                                </text></g>
                                                        </g>
                                                        <g id="SvgjsG4862" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-tooltip apexcharts-theme-light"
                                                        style="left: 204.801px; top: 81.95px;">
                                                        <div class="apexcharts-tooltip-title"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            Mar</div>
                                                        <div class="apexcharts-tooltip-series-group apexcharts-active"
                                                            style="order: 1; display: flex;"><span
                                                                class="apexcharts-tooltip-marker"
                                                                style="background-color: rgba(105, 108, 255, 0.85);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label">2021:
                                                                    </span><span
                                                                        class="apexcharts-tooltip-text-y-value">15</span>
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
                                                        <div class="apexcharts-tooltip-series-group"
                                                            style="order: 2; display: none;"><span
                                                                class="apexcharts-tooltip-marker"
                                                                style="background-color: rgba(105, 108, 255, 0.85);"></span>
                                                            <div class="apexcharts-tooltip-text"
                                                                style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                                <div class="apexcharts-tooltip-y-group"><span
                                                                        class="apexcharts-tooltip-text-y-label">2021:
                                                                    </span><span
                                                                        class="apexcharts-tooltip-text-y-value">15</span>
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
                                                    <div style="width: 532px; height: 377px;"></div>
                                                </div>
                                                <div class="contract-trigger"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-label-primary dropdown-toggle"
                                                            type="button" id="growthReportId"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" fdprocessedid="igmtkc">
                                                            2022
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="growthReportId" style="">
                                                            <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="growthChart" style="min-height: 154.875px;">
                                                <div id="apexchartslzt8ydp"
                                                    class="apexcharts-canvas apexchartslzt8ydp apexcharts-theme-light"
                                                    style="width: 265px; height: 154.875px;"><svg id="SvgjsSvg4944"
                                                        width="265" height="154.875"
                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                        xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                                        style="background: transparent;">
                                                        <g id="SvgjsG4946" class="apexcharts-inner apexcharts-graphical"
                                                            transform="translate(25.5, -25)">
                                                            <defs id="SvgjsDefs4945">
                                                                <clipPath id="gridRectMasklzt8ydp">
                                                                    <rect id="SvgjsRect4948" width="222"
                                                                        height="285" x="-3" y="-1" rx="0"
                                                                        ry="0" opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0"
                                                                        fill="#fff"></rect>
                                                                </clipPath>
                                                                <clipPath id="forecastMasklzt8ydp"></clipPath>
                                                                <clipPath id="nonForecastMasklzt8ydp"></clipPath>
                                                                <clipPath id="gridRectMarkerMasklzt8ydp">
                                                                    <rect id="SvgjsRect4949" width="220"
                                                                        height="287" x="-2" y="-2" rx="0"
                                                                        ry="0" opacity="1" stroke-width="0"
                                                                        stroke="none" stroke-dasharray="0"
                                                                        fill="#fff"></rect>
                                                                </clipPath>
                                                                <linearGradient id="SvgjsLinearGradient4954"
                                                                    x1="1" y1="0" x2="0"
                                                                    y2="1">
                                                                    <stop id="SvgjsStop4955" stop-opacity="1"
                                                                        stop-color="rgba(105,108,255,1)" offset="0.3">
                                                                    </stop>
                                                                    <stop id="SvgjsStop4956" stop-opacity="0.6"
                                                                        stop-color="rgba(255,255,255,0.6)"
                                                                        offset="0.7"></stop>
                                                                    <stop id="SvgjsStop4957" stop-opacity="0.6"
                                                                        stop-color="rgba(255,255,255,0.6)"
                                                                        offset="1"></stop>
                                                                </linearGradient>
                                                                <linearGradient id="SvgjsLinearGradient4965"
                                                                    x1="1" y1="0" x2="0"
                                                                    y2="1">
                                                                    <stop id="SvgjsStop4966" stop-opacity="1"
                                                                        stop-color="rgba(105,108,255,1)" offset="0.3">
                                                                    </stop>
                                                                    <stop id="SvgjsStop4967" stop-opacity="0.6"
                                                                        stop-color="rgba(105,108,255,0.6)"
                                                                        offset="0.7"></stop>
                                                                    <stop id="SvgjsStop4968" stop-opacity="0.6"
                                                                        stop-color="rgba(105,108,255,0.6)"
                                                                        offset="1"></stop>
                                                                </linearGradient>
                                                            </defs>
                                                            <g id="SvgjsG4950" class="apexcharts-radialbar">
                                                                <g id="SvgjsG4951">
                                                                    <g id="SvgjsG4952" class="apexcharts-tracks">
                                                                        <g id="SvgjsG4953"
                                                                            class="apexcharts-radialbar-track apexcharts-track"
                                                                            rel="1">
                                                                            <path id="apexcharts-radialbarTrack-0"
                                                                                d="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 142.16493902439026 167.17541022773656"
                                                                                fill="none" fill-opacity="1"
                                                                                stroke="rgba(255,255,255,0.85)"
                                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                                stroke-width="17.357317073170734"
                                                                                stroke-dasharray="0"
                                                                                class="apexcharts-radialbar-area"
                                                                                data:pathOrig="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 142.16493902439026 167.17541022773656">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                    <g id="SvgjsG4959">
                                                                        <g id="SvgjsG4964"
                                                                            class="apexcharts-series apexcharts-radial-series"
                                                                            seriesName="Growth" rel="1"
                                                                            data:realIndex="0">
                                                                            <path id="SvgjsPath4969"
                                                                                d="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 175.95555982735613 100.85758285229481"
                                                                                fill="none" fill-opacity="0.85"
                                                                                stroke="url(#SvgjsLinearGradient4965)"
                                                                                stroke-opacity="1" stroke-linecap="butt"
                                                                                stroke-width="17.357317073170734"
                                                                                stroke-dasharray="5"
                                                                                class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                                data:angle="234" data:value="78"
                                                                                selected="true" index="0" j="0"
                                                                                data:pathOrig="M 73.83506097560974 167.17541022773656 A 68.32987804878049 68.32987804878049 0 1 1 175.95555982735613 100.85758285229481">
                                                                            </path>
                                                                        </g>
                                                                        <circle id="SvgjsCircle4960" r="54.65121951219512"
                                                                            cx="108" cy="108"
                                                                            class="apexcharts-radialbar-hollow"
                                                                            fill="transparent"></circle>
                                                                        <g id="SvgjsG4961"
                                                                            class="apexcharts-datalabels-group"
                                                                            transform="translate(0, 0) scale(1)"
                                                                            style="opacity: 1;"><text id="SvgjsText4962"
                                                                                font-family="Public Sans" x="108" y="123"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="15px" font-weight="500"
                                                                                fill="#697a8d"
                                                                                class="apexcharts-text apexcharts-datalabel-label"
                                                                                style="font-family: &quot;Public Sans&quot;;">Growth</text><text
                                                                                id="SvgjsText4963"
                                                                                font-family="Public Sans" x="108" y="99"
                                                                                text-anchor="middle"
                                                                                dominant-baseline="auto"
                                                                                font-size="22px" font-weight="500"
                                                                                fill="#566a7f"
                                                                                class="apexcharts-text apexcharts-datalabel-value"
                                                                                style="font-family: &quot;Public Sans&quot;;">78%</text>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <line id="SvgjsLine4970" x1="0" y1="0"
                                                                x2="216" y2="0" stroke="#b6b6b6"
                                                                stroke-dasharray="0" stroke-width="1"
                                                                stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                            </line>
                                                            <line id="SvgjsLine4971" x1="0" y1="0"
                                                                x2="216" y2="0" stroke-dasharray="0"
                                                                stroke-width="0" stroke-linecap="butt"
                                                                class="apexcharts-ycrosshairs-hidden"></line>
                                                        </g>
                                                        <g id="SvgjsG4947" class="apexcharts-annotations"></g>
                                                    </svg>
                                                    <div class="apexcharts-legend"></div>
                                                </div>
                                            </div>
                                            <div class="text-center fw-medium pt-3 mb-2">62% Company Growth</div>

                                            <div
                                                class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <span class="badge bg-label-primary p-2"><i
                                                                class="bx bx-dollar text-primary"></i></span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <small>2022</small>
                                                        <h6 class="mb-0">$32.5k</h6>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <span class="badge bg-label-info p-2"><i
                                                                class="bx bx-wallet text-info"></i></span>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <small>2021</small>
                                                        <h6 class="mb-0">$41.2k</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="resize-triggers">
                                                <div class="expand-trigger">
                                                    <div style="width: 266px; height: 377px;"></div>
                                                </div>
                                                <div class="contract-trigger"></div>
                                            </div>
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
                                                                class="mb-0 w-px-105 {{ $pur->status === 'pending' ? 'text-warning' : 'text-success' }}">
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
