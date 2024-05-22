@extends('customer_design.dashboard.layout_custom')

@section('title', 'LAVASHOP')

@section('style')
    <script src="{{ asset('js/customer/dashboard.js') }}"></script>
@endsection

@section('content')
    <input type="hidden" value="" id="storeId">
    <style>
        .box-pro-prices {
            display: none;
        }

        p.pro-price span.pro-price-del {
            display: none;
        }
    </style>
    <div id="root"><!--<body id="Nhanh-template" class="index">-->
        <!--display in product/view page-->
        <div class="fixed_scroll">
            <div id="topbar" class="clearfix hidden-xs tp_header">
                <div class="container-fluid  clearfix topbar-top">
                    <div class="no-padding col-xs-12 col-sm-8 col-md-6 hidden-xs top_bar_left">
                        <div class="innerTopLeft">
                            <ul>
                                <li>
                                    <a aria-label="hotline" class="btnHL" href="tel:0912241237">
                                        <span class="iconTop icon-1-top"></span>
                                        <span class="title-info-top"><b>0123456789</b></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="no-padding col-xs-12 col-sm-4 col-md-6 top_bar_right">
                        <div class="innerTopRight">
                            <ul>
                                <li id="cart_header_top">
                                    <span id="site-cart-handle" class="icon-cart" aria-label="Open cart" title="Giỏ hàng">
                                        <a aria-label="cart" href="/cart" class="count-holder">
                                            <span class="iconTop icon-5-top"></span>
                                            <span class="title-info-top">
                                                <span class="gh">Giỏ hàng</span>
                                                <span>(<span
                                                        class="count">{{ session('cart') ? session('cart')->products->sum('quantity') : 0 }}</span>)</span>
                                            </span>
                                        </a>
                                    </span>
                                </li>

                                @if (!session('user_id'))
                                    <li>
                                        <a href="/user/signin">
                                            <span class="iconTop icon-4-top"></span>
                                            <span class="title-info-top user_tk">Tài khoản</span>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a aria-label="user" href="/profile"><span class="iconTop icon-4-top"></span>
                                            <span class="title-info-top">{{ session('user_name') }}</span>
                                        </a><a aria-label="user" class="signout" href="/user/signout"><i
                                                class="fa fa-sign-in" aria-hidden="true"></i>
                                            <span class="title-info-top">Đăng xuất</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="outerHeightHeader" style="min-height: 80px;">
                <div class=" ">
                    <header id="site-header" class="main-header clearfix tp_header">
                        <div class="no-padding hidden-xs col-sm-12 col-md-2">
                            <div class="header-mid wrap-flex-align">
                                <div class="wrap-logo">
                                    <a aria-label="logo" href="/home-customer">
                                        <img width="225" height="45" src="../img/lava-logo-web.jpg"
                                            data-src="../img/lava-logo-web.jpg" alt="lavashop.com"
                                            class="img-responsive logoimg ls-is-cached lazyloaded">
                                    </a>
                                </div>
                                <div class="header-wrap-icon visible-sm">
                                    <span id="site-search-handle" class="icon-search" aria-label="Tìm kiếm"
                                        title="Tìm kiếm">
                                        <a aria-label="search" href="/search">
                                            <span class="search-menu" aria-hidden="true">
                                                <svg version="1.1" class="svg-search" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;"
                                                    xml:space="preserve">
                                                    <path
                                                        d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
                                                    </path>
                                                    <rect x="17" y="17"
                                                        transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
                                                        width="4" height="8"></rect>
                                                </svg>
                                            </span>
                                        </a>
                                    </span>
                                    <span class="icon-cart" title="Giỏ hàng">
                                        <a aria-label="cart" href="/cart">
                                            <span class="cart-menu" aria-hidden="true">
                                                <svg version="1.1" class="svg-cart" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path d="M0,6v21h24V6H0z M22,25H2V8h20V25z"></path>
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="M12,2c3,0,3,2.3,3,4h2c0-2.8-1-6-5-6S7,3.2,7,6h2C9,4.3,9,2,12,2z">
                                                        </path>
                                                    </g>
                                                </svg>
                                                <span class="count-holder">
                                                    <span class="count">0</span>
                                                </span>
                                            </span>
                                        </a>
                                    </span>
                                    <span class="hamburger-menu hidden-xs">
                                        <a aria-label="menu" href="#menu-mobile">
                                            <span class="bar"></span>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="no-padding col-xs-12 hidden-sm hidden-xs col-md-8 menu-pc">
                            <div class="menu-desktop hidden-sm hidden-xs">
                                <div class="wrap-logo wrap-logp-mb">
                                    <a aria-label="logo" href="/">
                                        <img height="23" width="150" src="../img/lava-logo-web.jpg"
                                            alt="lavashop.com" class="img-responsive logoimg">
                                    </a>
                                </div>
                                <div id="nav">
                                    <nav class="main-nav tp_menu text-center">
                                        <ul class="clearfix">
                                            <li class="categoryId_48165 li-menu menu-cate-item "><a class="tp_menu_item"
                                                    href="/home-customer" target="_self">TRANG CHỦ</a>
                                            </li>
                                            <li class="categoryId_48006 li-menu menu-cate-item "><a class="tp_menu_item"
                                                    href="/product-all" target="_self">TẤT CẢ SẢN PHẨM</a>
                                                <ul class="sub_menu megaMenu menu-cate">
                                                    {{-- <div class="col-xs-12">
                                                        <li><a href="{{route('')}}" class="tp_menu_item">ĐỒ
                                                                CÔNG NGHỆ</a>
                                                            <ul class="sub_menu megaMenu-level3">
                                                                <div class="col-xs-12 col-sm-12">
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/den-ngu-den-trang-tri-pc565758.html">Đèn
                                                                            ngủ, đèn trang trí</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/phu-kien-di-dong-pc565759.html">Phụ kiện
                                                                            di động</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/may-xong-quat-mini-pc565760.html">Máy
                                                                            xông, quạt mini</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/do-choi-cong-nghe-pc565761.html">Đồ chơi
                                                                            công nghệ</a></li>
                                                                </div>
                                                            </ul>
                                                        </li>
                                                        <li><a href="/do-dien-may-pc565767.html" class="tp_menu_item">ĐỒ
                                                                ĐIỆN MÁY</a>
                                                            <ul class="sub_menu megaMenu-level3">
                                                                <div class="col-xs-12 col-sm-12">
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/may-xay-vat-ep-pc565768.html">Máy xay,
                                                                            vắt, ép</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/may-say-duoi-bam-toc-pc565769.html">Máy
                                                                            sấy, duỗi, bấm tóc</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/bep-noi-am-dien-pc565770.html">Bếp, nồi,
                                                                            ấm điện</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/ban-ui-may-may-pc565771.html">Bản ủi,
                                                                            máy may</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/do-dien-may-khac-pc565772.html">Đồ điện
                                                                            máy khác</a></li>
                                                                </div>
                                                            </ul>
                                                        </li>
                                                        <li><a href="/dung-cu-an-uong-pc565777.html"
                                                                class="tp_menu_item">DỤNG CỤ ĂN UỐNG</a>
                                                            <ul class="sub_menu megaMenu-level3">
                                                                <div class="col-xs-12 col-sm-12">
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/binh-xach-tay-binh-giu-nhiet-pc565778.html">Bình
                                                                            xách tay, Bình giữ nhiệt</a>
                                                                        <ul class="sub_menu megaMenu-level4">
                                                                            <div class="col-xs-12 col-sm-12">
                                                                                <li><a class="menu-level4 tp_menu_item"
                                                                                        href="/am-binh-ly-coc-pc565780.html">Ấm,
                                                                                        bình, ly, cốc</a></li>
                                                                            </div>
                                                                        </ul>
                                                                    </li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/hop-com-van-phong-pc565779.html">Hộp cơm
                                                                            văn phòng</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/dua-muong-nia-pc565781.html">Đũa, muỗng,
                                                                            nĩa</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/bat-dia-to-pc565782.html">Bát, đĩa,
                                                                            tô</a></li>
                                                                </div>
                                                            </ul>
                                                        </li>
                                                        <li><a href="/do-dung-nha-bep-pc565784.html"
                                                                class="tp_menu_item">ĐỒ DÙNG NHÀ BẾP</a>
                                                            <ul class="sub_menu megaMenu-level3">
                                                                <div class="col-xs-12 col-sm-12">
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/dung-chua-thuc-pham-pc565786.html">Đựng
                                                                            chứa thực phẩm</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/thau-ro-cac-loai-pc565785.html">Thau rổ
                                                                            các loại</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/do-dung-nha-bep-khac-pc565787.html">Đồ
                                                                            dùng nhà bếp khác</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/dung-cu-nau-an-pc565788.html">Dụng cụ
                                                                            nấu ăn</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/noi-xoong-chao-bep-pc565789.html">Nồi,
                                                                            xoong, chảo, bếp</a></li>
                                                                </div>
                                                            </ul>
                                                        </li>
                                                        <li><a href="/do-noi-that-pc565796.html" class="tp_menu_item">ĐỒ
                                                                NỘI THẤT</a>
                                                            <ul class="sub_menu megaMenu-level3">
                                                                <div class="col-xs-12 col-sm-12">
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/tu-pc565797.html">Tủ</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/ke-pc565798.html">Kệ</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/ban-pc565799.html">Bàn</a></li>
                                                                    <li><a class="menu-level3 tp_menu_item"
                                                                            href="/guong-pc565800.html">Gương</a></li>
                                                                </div>
                                                            </ul>
                                                        </li>
                                                    </div> --}}
                                                    <div class="col-xs-12">
                                                        @foreach ($categories as $category)
                                                            <li>
                                                                <a href="{{ route('search_category', ['id' => $category->id]) }}"
                                                                    class="tp_menu_item"
                                                                    style="text-transform: uppercase;">{{ $category->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </div>
                                                </ul>
                                            </li>
                                            <li class="categoryId_48023 li-menu menu-cate-item "><a class="tp_menu_item"
                                                    href="/news" target="_self">Tin tức</a></li>
                                            <li class="categoryId_48600 li-menu menu-cate-item "><a class="tp_menu_item"
                                                    href="/lien-he" target="_self">Liên hệ</a> </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>

                        <div class="no-padding col-xs-12 hidden-sm hidden-xs col-md-2">
                            <div class="searchFormHeader" itemscope="" itemtype="https://schema.org/WebSite">

                                <form class="searchHeader searchDesktop" action="/search" method="get"
                                    itemprop="potentialAction" itemscope="" itemtype="https://schema.org/SearchAction">
                                    <input itemprop="query-input" type="text" name="search" class="searchInput"
                                        placeholder="Tìm kiếm..." autocomplete="off">
                                    <input type="submit" class="btnSearch">
                                </form>

                                <div id="resultSearchDesktop" class="resultDesktop">
                                    <div class="innerResultDesktop"></div>
                                </div>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
        </div>


        <!--</body>-->
        {{-- <script defer="" type="text/javascript" src="https://web.nvnstatic.net/tp/T0298/js/slick.js?v=8"></script>
        <script defer="" type="text/javascript" src="https://web.nvnstatic.net/tp/T0298/js/flipclock.js?v=8"></script>
        <script defer="" type="text/javascript" src="https://web.nvnstatic.net/tp/T0298/js/promotion.js?v=8"></script>
        <script defer="" type="text/javascript" src="https://web.nvnstatic.net/tp/T0298/js/index.js?v=8"></script> --}}
        <link rel="stylesheet" href="https://web.nvnstatic.net/tp/T0298/css/flipclock.css?v=2" type="text/css">
        <main class="main-index">
            <div class="styleArrowOwl ">
                <div class="trackingBannerHome1 slider-banner-main owl-carousel owl-theme tp_banner_main owl-loaded">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-4557px, 0px, 0px); transition: all 0.25s ease 0s; width: 9114px;">
                            <div class="owl-item cloned" style="width: 1519px; margin-right: 0px;"><a
                                    href="javascript:void(0);" target="_self">
                                    <img class="owl-lazy" data-sizes="auto" width="1520" height="340"
                                        src="../img/thiet_bi_dien_tu.jpg" alt="XA KHO" style="opacity: 1;"></a></div>
                            <div class="owl-item cloned" style="width: 1519px; margin-right: 0px;"><a
                                    href="javascript:void(0);" target="_self">
                                    <img class="owl-lazy" data-sizes="auto" width="1520" height="340"
                                        src="../img/thiet_bi_dien_tu.jpg" alt="KM" style="opacity: 1;"></a></div>
                            <div class="owl-item" style="width: 1519px; margin-right: 0px;"><a href="javascript:void(0);"
                                    target="_self">
                                    <img class="owl-lazy" data-sizes="auto" width="1520" height="340"
                                        src="../img/thiet_bi_dien_tu.jpg" alt="XA KHO" style="opacity: 1;"></a></div>
                            <div class="owl-item active" style="width: 1519px; margin-right: 0px;"><a
                                    href="javascript:void(0);" target="_self">
                                    <img class="owl-lazy" data-sizes="auto" width="1520" height="340"
                                        src="../img/thiet_bi_dien_tu.jpg" alt="KM" style="opacity: 1;"></a></div>
                            <div class="owl-item cloned" style="width: 1519px; margin-right: 0px;"><a
                                    href="javascript:void(0);" target="_self">
                                    <img class="owl-lazy" data-sizes="auto" width="1520" height="340"
                                        src="../img/thiet_bi_dien_tu.jpg" alt="XA KHO" style="opacity: 1;"></a></div>
                            <div class="owl-item cloned" style="width: 1519px; margin-right: 0px;"><a
                                    href="javascript:void(0);" target="_self">
                                    <img class="owl-lazy" data-sizes="auto" width="1520" height="340"
                                        src="../img/thiet_bi_dien_tu.jpg" alt="KM" style="opacity: 1;"></a></div>
                        </div>
                    </div>
                    <div class="owl-controls">
                        <div class="owl-nav">
                            <div class="owl-prev" style="display: none;">prev</div>
                            <div class="owl-next" style="display: none;">next</div>
                        </div>
                        <div class="owl-dots" style="">
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot active"><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <section id="" class="clearfix section section-collection product_new tp_product_hot">
                <div class="container-fluid">
                    <div class="sectionTitleTab clearfix">
                        <h2>
                            <a href="/san-pham?show=hot" class="tp_title">Sản phẩm hot</a>
                        </h2>
                    </div>

                    <div class="sectionContentTab styleArrowSlick">
                        <div class="product-lists-home" style="min-height: 0px;">
                            @foreach ($top_products as $top)
                                <div class="product-resize col-xs-6 col-sm-3 pro-loop" data-id="{{ $top->id }}">
                                    <div class="product-block">
                                        <div class="product-img image-resize">
                                            <a href="{{ asset('storage/uploads/' . $top->image) }}"
                                                class="p-img-box added" data-fancybox="gallery">
                                                {{-- <picture> --}}
                                                <img class="img-loop lazyautosizes lazyloaded" data-sizes="auto"
                                                    src="{{ asset('storage/uploads/' . $top->image) }}"
                                                    data-src="{{ asset('storage/uploads/' . $top->image) }}"
                                                    alt="{{ $top->name }}" sizes="280px">
                                                {{-- </picture> --}}
                                                {{-- <picture><img
                                                        class="img-loop img-hover lazyautosizes ls-is-cached lazyloaded"
                                                        data-sizes="auto"
                                                        src="{{ asset('storage/uploads/' . $top->image) }}"
                                                        data-id="38929952"
                                                        data-src="{{ asset('storage/uploads/' . $top->image) }}"
                                                        alt="{{ asset('storage/uploads/' . $top->image) }}"
                                                        sizes="300px"></picture> --}}
                                            </a>
                                        </div>
                                        <div class="product-detail clearfix">
                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="{{ asset('storage/uploads/' . $top->image) }}"
                                                        class="tp_product_name" data-fancybox="gallery">
                                                        {{ $top->name }} </a>
                                                </h3>
                                                <div class="box-pro-prices-seccond">
                                                    <p class="pro-price highlight tp_product_price">
                                                        {{ $top->price }}₫
                                                    </p>
                                                </div>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price highlight tp_product_price">
                                                        {{ $top->price }}₫
                                                        <span class="pro-price-del">
                                                            <del class="compare-price">{{ $top->price }}₫</del>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="frameSale">
                                        </div>
                                        <div class="actionLoop visible-lg">
                                            <a class="quickView styleBtnBuy notClick" data-id="{{ $top->id }}"
                                                data-toggle="modal" data-target="#quickview-cart">
                                                <i class="fa fa-shopping-cart"></i> Mua nhanh </a>
                                            <a class="styleBtnBuy"
                                                href="{{ route('product_detail', ['id' => $top->id]) }}">
                                                <i class="fa fa-eye"></i> Xem chi tiết </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            <section id="" class="clearfix section section-collection product_new tp_product_new"
                style="display: none">
                <div class="container-fluid">
                    <div class="sectionTitleTab clearfix">
                        <h2>
                            <a href="/san-pham?show=new" class="tp_title">SẢN PHẨM MỚI</a>
                        </h2>
                    </div>

                    <div class="sectionContentTab styleArrowSlick">
                        <div class="product-lists-home" style="min-height: 0px;">
                            @foreach ($new_products as $new)
                                <div class="product-resize col-xs-6 col-sm-3 pro-loop" data-id="{{ $new->id }}">
                                    <div class="product-block" data-anmation="1">
                                        <div class="product-img image-resize">
                                            <a href="{{ asset('storage/uploads/' . $new->image) }}" target=""
                                                class="p-img-box added" data-fancybox="gallery">
                                                {{-- <picture> --}}
                                                <img class="img-loop lazyload" data-sizes="auto"
                                                    src="{{ asset('storage/uploads/' . $new->image) }}"
                                                    data-src="{{ asset('storage/uploads/' . $new->image) }}"
                                                    alt="{{ $new->name }}">
                                                {{-- </picture> --}}
                                                {{-- <picture><img class="img-loop img-hover lazyload" data-sizes="auto"
                                                        src="/img/lazyLoading.gif" data-id="38929976"
                                                        data-src="https://pos.nvncdn.com/e8033b-157317/ps/20240511_VSGu5fUuMa.jpeg"
                                                        alt="https://pos.nvncdn.com/e8033b-157317/ps/20240511_VSGu5fUuMa.jpeg">
                                                </picture> --}}
                                            </a>
                                        </div>

                                        <div class="product-detail clearfix">

                                            <div class="box-pro-detail">
                                                <h3 class="pro-name">
                                                    <a href="{{ asset('storage/uploads/' . $new->image) }}"
                                                        class="tp_product_name" data-fancybox="gallery">
                                                        {{ $new->name }} </a>
                                                </h3>
                                                <div class="box-pro-prices-seccond">
                                                    <p class="pro-price highlight tp_product_price">
                                                        {{ $new->price }}₫
                                                    </p>
                                                </div>
                                                <div class="box-pro-prices">
                                                    <p class="pro-price highlight tp_product_price">
                                                        <span class="pro-price-current">{{ $new->price }}₫</span>
                                                        <span class="pro-price-del">
                                                            <span
                                                                class="compare-price WholesalePrice">{{ $new->price }}₫</span>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="frameSale">
                                        </div>

                                        <div class="actionLoop visible-lg">
                                            <a class="quickView styleBtnBuy notClick" data-id="{{ $new->id }}"
                                                data-toggle="modal" data-target="#quickview-cart">
                                                <i class="fa fa-shopping-cart"></i> Mua nhanh </a>
                                            <a class="styleBtnBuy"
                                                href="{{ route('product_detail', ['id' => $new->id]) }}"><i
                                                    class="fa fa-eye"></i> Xem chi tiết </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <div id="site-nav--mobile" class="site-nav style--sidebar">
            <!-- use ajaxLoadview fill cart content -->
            <div id="site-cart" class="site-nav-container" tabindex="-1">
                <div class="site-nav-container-last">
                    <input type="hidden" id="totalCartItems_hidden" value="0">

                    <p class="title">Giỏ hàng</p>
                    <span class="textCartSide">Bạn đang có <b>0</b> sản phẩm trong giỏ hàng.</span>
                    <div class="cart-view clearfix">
                        <table id="clone-item-cart" class="table-clone-cart">
                            <tbody>
                                <tr class="item_2 hidden">
                                    <td class="img"><a href="" title=""><img src=""
                                                alt="cart"></a></td>
                                    <td>
                                        <a class="pro-title-view" href="" title=""></a>
                                        <span class="pro-price-view"></span>
                                        <span class="variant"></span>
                                        <span class="pro-quantity-view"></span>
                                        <span class="remove_link remove-cart"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table id="cart-view">
                            <tbody>
                                <tr>
                                    <td>Hiện chưa có sản phẩm</td>
                                </tr>
                            </tbody>
                        </table>
                        <span class="line"></span>
                        <table class="table-total">
                            <tbody>
                                <tr>
                                </tr>
                                <tr>
                                    <td class="text-left"><b>TỔNG TIỀN TẠM TÍNH:</b></td>
                                    <td class="text-right" id="total-view-cart">
                                        0₫
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><a href="/cart/checkout"
                                            class="checkLimitCart linktocheckout button dark">Tiến hành đặt
                                            hàng</a></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <a href="/cart" class="linktocart button dark">Xem chi tiết giỏ hàng <i
                                                class="fa fa-arrow-right"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button aria-label="close" id="site-close-handle" class="site-close-handle" title="Đóng">
                <img width="20" height="20" src="https://web.nvnstatic.net/tp/T0298/img/tmp/iconclose.png?v=3"
                    alt="Đóng">
            </button>
        </div>

        <div id="site-overlay" class="site-overlay"></div>


        <div id="bttop" style="display: none;">
            <span class="text-bttop">Về đầu trang</span>
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                viewBox="0 0 32.635 32.635" style="enable-background:new 0 0 32.635 32.635;" xml:space="preserve">
                <g>
                    <path
                        d="M32.135,16.817H0.5c-0.276,0-0.5-0.224-0.5-0.5s0.224-0.5,0.5-0.5h31.635c0.276,0,0.5,0.224,0.5,0.5
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             S32.411,16.817,32.135,16.817z">
                    </path>
                    <path
                        d="M19.598,29.353c-0.128,0-0.256-0.049-0.354-0.146c-0.195-0.195-0.195-0.512,0-0.707l12.184-12.184L19.244,4.136
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             c-0.195-0.195-0.195-0.512,0-0.707s0.512-0.195,0.707,0l12.537,12.533c0.094,0.094,0.146,0.221,0.146,0.354
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             s-0.053,0.26-0.146,0.354L19.951,29.206C19.854,29.304,19.726,29.353,19.598,29.353z">
                    </path>
                </g>
            </svg>
        </div>


        <!--    SP đã xem    -->


        <div id="modalShow" class="modal fade" role="dialog">
            <div class="modal-dialog ">
                <div class="modal-content"></div>
            </div>
        </div>
        <span class="loadings"><img src="https://web.nvnstatic.net/img/lazyLoading.gif?v=3" alt="loading"></span>

        <div id="alertFixed">
            <i class="fa fa-check"></i>
            <p>Sản phẩm đã được thêm vào giỏ hàng !</p>
        </div>

        <div style="display: none;">
            <div id="dialogMessage"></div>
        </div>
    </div>
    <script>
        const loadScriptsTimer = setTimeout(loadScripts, 5000);
        const userInteractionEvents = ['mouseover', 'keydown', 'touchmove', 'touchstart'];
        userInteractionEvents.forEach(function(event) {
            window.addEventListener(event, triggerScriptLoader, {
                passive: true
            });
        });

        function triggerScriptLoader() {
            loadScripts();
            clearTimeout(loadScriptsTimer);
            userInteractionEvents.forEach(function(event) {
                window.removeEventListener(event, triggerScriptLoader, {
                    passive: true
                });
            });
        }

        function loadScripts() {
            document.querySelectorAll('script[data-type=lazy]').forEach(function(elem) {
                elem.setAttribute('src', elem.getAttribute('data-src'));
            });
            document.querySelectorAll('iframe[data-type=lazy]').forEach(function(elem) {
                elem.setAttribute('src', elem.getAttribute('data-src'));
            });
        }
    </script>

    @include('customer_design.product.modal.detail_modal_product')
@endsection
