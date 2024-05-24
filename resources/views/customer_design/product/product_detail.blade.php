@extends('customer_design.dashboard.layout_custom')

@section('title', 'Chi tiết sản phẩm')

@section('style')
    <script src="{{ asset('js/customer/dashboard.js') }}"></script>
    {{-- <script src="{{ asset('js/customer/detail_product.js') }}"></script> --}}
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
                                        <img height="23" width="150"
                                            src="https://pos.nvncdn.com/e8033b-157317/store/20230831_PuNqWysm.png"
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

                        <div class="removeDesktopOptimize visible-xs clearfix">
                            <div class="headerMobile">
                                <a aria-label="menu" href="#menu-mobile" class="hamburger-menu"><span
                                        class="bar"></span></a>
                                <div class="wrap-logo">
                                    <a aria-label="logo" href="/">
                                        <img width="160" height="32"
                                            src="https://pos.nvncdn.com/e8033b-157317/store/20230831_PuNqWysm.png"
                                            alt="giadungnhanh.com" class="img-responsive logoimg">
                                    </a>
                                </div>
                                <div class="header-wrap-icon">
                                    <span id="site-search-handle" class="icon-search" aria-label="Tìm kiếm"
                                        title="Tìm kiếm">
                                        <a aria-label="search" href="/search">
                                            <span class="search-menu" aria-hidden="true">
                                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 451 451" style="enable-background:new 0 0 451 451;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <path
                                                            d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3                                                                                                                                                     s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </a>
                                    </span>
                                    <span class="icon-cart" title="Giỏ hàng">
                                        <a aria-label="cart" href="/cart">
                                            <span class="cart-menu" aria-hidden="true">
                                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                                                    xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="M447.988,139.696c-0.156-2.084-1.9-3.696-3.988-3.696h-72v-20C372,52.036,319.96,0,256,0S140,52.036,140,116v20H68                                                                                                                                                              C396,230.056,378.06,248,356,248z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span class="count-holder"><span class="count">0</span></span>
                                            </span>
                                        </a>
                                    </span>
                                    <span><a aria-label="user" href="/user/signin"><i class="fa fa-user"
                                                style="font-size: 27px;padding: 0 0 0 5px;"></i></a></span> <span
                                        class="icon-mobile" title="Hotline">
                                        <a aria-label="hotline" href="tel:0912241237">
                                            <i class="fa fa-phone" style="font-size: 27px;padding: 0 0 0 5px;"> </i> <span
                                                class="hotline-txt">0123456789</span>
                                        </a>
                                    </span>


                                </div>
                            </div>
                        </div>
                    </header>
                </div>
            </div>
        </div>


        <!--</body>-->
        <script defer="" type="text/javascript" src="https://web.nvnstatic.net/tp/T0298/js/pview.js?v=33"></script><input type="hidden" id="hidden-p-name" value="{{ $product->name }}"><input
            type="hidden" id="js-category-name" value="">

        <div class="main-body">
            <main class="">
                <div id="product" class="productDetail-page tp_product_detail">
                    <div class="breadcrumb-shop clearfix">
                        <div class="padding-lf-40 clearfix">
                            <div class=" ">
                                <ol class="breadcrumb breadcrumb-arrows clearfix" itemscope=""
                                    itemtype="https://schema.org/BreadcrumbList">
                                    <meta itemprop="id"
                                        content="https://giadungnhanh.com/1-thung-32-goi-khan-uot-rosemary-hoat-hinh-p38929952.html">
                                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                        <a href="/home-customer" target="_self" itemprop="item">
                                            <i class="fa fa-home"></i>
                                            <span itemprop="name">Trang chủ</span>
                                        </a>
                                        <meta itemprop="position" content="1">
                                    </li>
                                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                                        <a href="/-pc.html" itemprop="item">
                                            <span itemprop="name"></span>
                                        </a>
                                        <meta itemprop="position" content="2">
                                    </li>
                                    <li class="active" itemprop="itemListElement" itemscope=""
                                        itemtype="https://schema.org/ListItem">
                                        <a href="" itemprop="item">
                                            <span itemprop="name">{{ $product->name }}</span>
                                        </a>
                                        <meta itemprop="position" content="3">
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="container">
                            <div class="row product-detail-wrapper">
                                <div class="clearfix product-detail-main pr_style_01">
                                    <div class="col-md-8 col-sm-7 col-xs-12">
                                        <div class="clearfix hidden-xs col-sm-1 thumbnails small-img">
                                        </div>
                                        <div class="clearfix col-sm-11 no_pd_mb">
                                            <div id="slide-image" class="owl-carousel owl-theme owl-loaded">
                                            </div>
                                            <div class="hinh360" style="display:none">
                                                <div id="mySpriteSpin"></div>
                                            </div>
                                        </div>

                                        <div class="clearfix removeMobile under-p-img product-content">
                                            <h3
                                                style="font-size:18px;margin-left:77px;margin-top:20px;font-family:Arial, sans-serif;">
                                                Mô tả sản phẩm</h3>
                                            <p style="line-height:1.38;margin-bottom:0pt;margin-top:0pt;" dir="ltr">
                                                <span style="background-color:#ffffff;color:#000000;">
                                                    <span style="font-size:12pt;margin-left:77px;">
                                                        {{ $product->describe }}
                                                    </span>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-5 col-xs-12 product-content-desc" id="detail-product"
                                        itemscope="" itemtype="https://schema.org/Product">
                                        <meta itemprop="name" content="{{ $product->name }}">
                                        <meta itemprop="image"
                                            content="https://pos.nvncdn.com/e8033b-157317/ps/20240415_YHGs3cATip.jpeg">
                                        <div class="product-title">
                                            <h1 class="tp_product_detail_name">{{ $product->name }}</h1>
                                            <div class="pview-code">
                                                Mã sản phẩm:
                                                <span> {{ $product->id }}</span>
                                            </div>
                                            <span class="pro-soldold">
                                                @if ($product->total > 0)
                                                    <span class="statusProduct">Còn hàng</span>
                                                @else
                                                    <span class="statusProduct">Hết hàng</span>
                                                @endif
                                            </span>
                                        </div>
                                        <div class="product-price main-price" id="price-preview" itemscope=""
                                            itemtype="http://schema.org/Offer">
                                            <span class="pro-price tp_product_detail_price"
                                                itemprop="lowPrice">{{ number_format($product->price, 0, ',', '.') }}₫
                                            </span>
                                            <meta itemprop="availability" content="http://schema.org/InStock">
                                            <meta itemprop="priceCurrency" content="VND">
                                            <meta itemprop="priceValidUntil" content="2020-11-16">
                                            <meta itemprop="price" content="218.300">
                                        </div>
                                        <div style="display: none">
                                            <span itemprop="aggregateRating" itemscope=""
                                                itemtype="http://schema.org/AggregateRating">
                                                <span itemprop="ratingValue">5.0</span> stars, based on <span
                                                    itemprop="reviewCount">189</span> reviews
                                            </span>
                                            <span itemprop="review" itemscope="" itemtype="http://schema.org/review">
                                                <meta itemprop="author" content="Người dùng">
                                            </span>
                                        </div>
                                        <span class="hidden" itemprop="brand">Đang cập nhật</span>
                                        <meta itemprop="sku" content="3KHANGIAY74-32GOI">
                                        <meta itemprop="name" content="{{ $product->name }}">
                                        <form id="add-item-form" class="variants clearfix"
                                            action="{{ route('buynow_order', ['id' => $product->id]) }}" method="POST">
                                            @csrf
                                            <div class="select-swatch clearfix ">
                                            </div>

                                            <div class="product-price main-price price-65700" id="price-preview">
                                                <span
                                                    class="pro-price tp_product_detail_price">{{ number_format($product->price, 0, ',', '.') }}₫
                                                </span>
                                            </div>

                                            <div class="selector-actions">
                                                <div class="quantity-area clearfix">
                                                    <div class="title-quantity">Số lượng</div>
                                                    <input type="button" value="-" onclick="minusQuantity()"
                                                        class="qty-btn tp_button">
                                                    <input type="text" id="quantity" name="quantity" value="1"
                                                        min="1" class="quantity-selector"
                                                        max="{{ $product->total }}">
                                                    <input type="button" value="+" onclick="plusQuantity()"
                                                        class="qty-btn tp_button">
                                                    <input type="hidden" id="product_id"
                                                        value="{{ number_format($product->price, 0, ',', '.') }}">
                                                    <span class="pro-soldold status-56700">
                                                        @if ($product->total > 0)
                                                            <span class="statusProduct">Còn hàng</span>
                                                        @else
                                                            <span class="statusProduct">Hết hàng</span>
                                                        @endif
                                                    </span>
                                                    <div class="pview-ivt79592">
                                                        <span class="ivt-label">Có thể bán : {{ $product->total }}</span>
                                                    </div>
                                                    <div class="wrap-addcart clearfix">
                                                        <button type="button" id="add-to-cart"
                                                            class="btnAddToCart tp_button">
                                                            <i class="fa fa-cart-plus cart_plus"></i>Thêm vào giỏ hàng
                                                        </button>
                                                        <button type="submit" id="addQuickCart"
                                                            class="btnAddToCart tp_button">
                                                            <i class="fa fa-cart-arrow-down cart_down"></i>
                                                            Mua ngay
                                                        </button>
                                                    </div>
                                                    <div class="pview-hightlight clearfix">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <ul class="policyProduct">
                                        </ul>
                                        <div
                                            class="box_product_firstView product-description hidden-sm hidden-md hidden-lg">
                                            <div class="title-bl">
                                                <h2>
                                                    Nội dung sản phẩm <span class="icon-open "></span>
                                                </h2>
                                            </div>
                                            <div class="description-content" style="display: none;">
                                                <div class="main_details">
                                                    <p style="line-height:1.38;margin-bottom:0pt;margin-top:0pt;"
                                                        dir="ltr">
                                                        <span style="background-color:#ffffff;color:#000000;">
                                                            <span
                                                                style="font-family:Arial, sans-serif;font-size:12pt;font-style:normal;font-variant:normal;font-weight:400;text-decoration:none;vertical-align:baseline;white-space:pre-wrap;">
                                                                {{ $product->describe }}.&nbsp;
                                                            </span>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-description title_none dnone-96772 ">
                                            <div class="title-bl">
                                                <h2>
                                                    Thông số sản phẩm <span class="icon-open"></span>
                                                </h2>
                                            </div>
                                            <div class="description-content">
                                                <div class="main_details">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-description title_none return-policy-area dnone-96772 ">
                                            <div class="title-bl">
                                                <h2>
                                                    Chính sách đổi trả <span class="icon-open"></span>
                                                </h2>
                                            </div>
                                            <div class="description-content">
                                                <div class="description-productdetail">
                                                    <div class="description-productdetail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-description title_none preservation-area dnone-96772 ">
                                            <div class="title-bl">
                                                <h2>
                                                    Hướng dẫn bảo quản <span class="icon-open"></span>
                                                </h2>
                                            </div>
                                            <div class="description-content">
                                                <div class="description-productdetail">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-description-infor">
                                            <ul class="policyProduct policyCart clearfix">
                                            </ul>
                                        </div>
                                        <div class="product-tags tp_product_detail_tag">
                                        </div>
                                    </div>
                                </div>
                                <div class="review-box">
                                    <div class="fb-comments"
                                        data-href="https://giadungnhanh.com/1-thung-32-goi-khan-uot-rosemary-hoat-hinh-p38929952.html"
                                        data-numposts="5" data-width="100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="hidden images">
                    <div class="item itemdelete" data-original="{{ asset('storage/uploads/' . $product->image) }}">
                        <a href="{{ asset('storage/uploads/' . $product->image) }}" title="Click để xem"
                            data-fancybox="gallery">
                            <img class="img-fluid img-responsive lazyload" data-sizes="auto"
                                src="{{ asset('storage/uploads/' . $product->image) }}"
                                data-src="{{ asset('storage/uploads/' . $product->image) }}" alt="{{ $product->name }}">
                            <p class="click-p" href="{{ asset('storage/uploads/' . $product->image) }}"
                                data-zoom-image="{{ asset('storage/uploads/' . $product->image) }}" rel="lightbox-do">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                Click xem hình lớn hơn
                            </p>
                        </a>
                    </div>
                </div>
                <div class="hidden thumbnails-hidden">
                    <div class="thumbnail thumdelete clickItem"
                        data-zoom="{{ asset('storage/uploads/' . $product->image) }}">
                        <img class="img-fluid img-thumbnail" src="{{ asset('storage/uploads/' . $product->image) }}"
                            alt="{{ $product->name }}">
                    </div>
                </div>
            </main>
        </div>
        <input type="hidden" class="checkCookies" value="">

        <!-- Đánh dấu JSON-LD được tạo bởi Trình trợ giúp đánh dấu dữ liệu có cấu trúc của Google. -->
        <script type="application/ld+json">
            {
                "@context" : "http://schema.org",
                "@type" : "Product",
                "name" : "{{ $product->name }}",
                "offers": {
                    "@type": "Offer",
                    "url": "/1-thung-32-goi-khan-uot-rosemary-hoat-hinh-p38929952.html",
                    "priceCurrency": "VND",
                    "priceValidUntil": "2024-12-30",
                    "price": "218300",
                    "itemCondition": "https://schema.org/UsedCondition",
                    "availability": "https://schema.org/InStock"
                },
    
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": "5",
                    "reviewCount": "20"
                },
                "review": {
                    "@type": "Review",
    
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "5",
                        "bestRating": "5"
                    },
                    "author": {
                        "@type": "Person",
                        "name": "Admin"
                    }
                },
                                            "sku" : "3KHANGIAY74-32GOI",
                                    "image": "https://pos.nvncdn.com/e8033b-157317/ps/20240415_YHGs3cATip.jpeg"
            }
        </script>

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


                    <script>
                        var $storeId = $('#storeId').val();
                        var totalCartItems_hidden = document.getElementById('totalCartItems_hidden').value;
                        $('.icon-cart .count').html(totalCartItems_hidden);

                        if (in_array($storeId, [100699, 3138])) {
                            $('.cart-header .count-cart').html(totalCartItems_hidden);
                        }
                    </script>
                </div>
            </div>

            <div id="site-search" class="site-nav-container" tabindex="-1">
                <div class="site-nav-container-last">
                    <p class="title">Tìm kiếm</p>
                    <div class="search-box wpo-wrapper-search">
                        <meta itemprop="url"
                            content="https://giadungnhanh.com/1-thung-32-goi-khan-uot-rosemary-hoat-hinh-p38929952.html">
                        <form action="/search" class="searchform searchform-categoris ultimate-search navbar-form">
                            <div class="wpo-search-inner">
                                <input id="inputSearchAuto" name="q" maxlength="40" autocomplete="off"
                                    class="searchinput input-search search-input" type="text" size="20"
                                    placeholder="Tìm kiếm...">
                            </div>
                            <button aria-label="submit" type="submit" class="btn-search btn" id="search-header-btn">
                                <svg version="1.1" class="svg search" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    viewBox="0 0 24 27" style="enable-background:new 0 0 24 27;" xml:space="preserve">
                                    <path
                                        d="M10,2C4.5,2,0,6.5,0,12s4.5,10,10,10s10-4.5,10-10S15.5,2,10,2z M10,19c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7S13.9,19,10,19z">
                                    </path>
                                    <rect x="17" y="17" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.2844 19.5856)"
                                        width="4" height="8"></rect>
                                </svg>
                            </button>
                        </form>
                        <div id="ajaxSearchResults" class="smart-search-wrapper ajaxSearchResults" style="display: none">
                            <div class="resultsContent"></div>
                        </div>
                    </div>
                </div>
            </div>
            <button aria-label="close" id="site-close-handle" class="site-close-handle" title="Đóng">
                <img width="20" height="20" src="https://web.nvnstatic.net/tp/T0298/img/tmp/iconclose.png?v=3"
                    alt="Đóng">
            </button>
        </div>

        <div id="site-overlay" class="site-overlay"></div>

        <div id="quickview-cart" class="modal fade" role="dialog">
            <div id="quickview-cart-desktop" class="clearfix"></div>
        </div>


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
        <div id="phistory-bar" class="hidden-xs hidden-sm tp_product_detail_history">
            <div class="phistor-icon"><i class="fa fa-angle-double-left"></i></div>
            <div class="phistory-title">Đã xem</div>
            <div class="phistory-content">
                <div class="phis-v-box">
                    <div class="caroufredsel_wrapper"
                        style="text-align: start; float: none; position: relative; inset: auto; z-index: auto; width: 0px; height: 0px; margin: 0px; overflow: hidden;">
                        <div class="phistor-v-slider"
                            style="text-align: left; float: none; position: absolute; inset: 0px auto auto 0px; margin: 0px; height: 0px; width: 0px;">

                            <div class="phistory-v-item">
                                <a href="/1-thung-32-goi-khan-uot-rosemary-hoat-hinh-p38929952.html"
                                    title="{{ $product->name }}"><img
                                        src="https://pos.nvncdn.com/e8033b-157317/ps/20240415_YHGs3cATip.jpeg"
                                        alt="{{ $product->name }}"></a>
                            </div>

                            <div class="phistory-v-item">
                                <a href="/50-ly-nhua-van-kim-cuong-p38929659.html"
                                    title="Ly nhựa uống nước vân kim cương cao cấp, ly nhựa có nắp giá rẻ"><img
                                        src="https://pos.nvncdn.com/e8033b-157317/ps/20240330_chxjXAPKd1.jpeg"
                                        alt="Ly nhựa uống nước vân kim cương cao cấp, ly nhựa có nắp giá rẻ"></a>
                            </div>

                            <div class="phistory-v-item">
                                <a href="/1-noi-chien-khong-dau-air-fryer-man-hinh-cam-ung-15l-bh-do-loi-nsx-p36537835.html"
                                    title="Nồi Chiên Không Dầu Air Fryer Màn hình cảm ứng 15L " (bh=""
                                    do="" lỗi="" nsx)""=""><img
                                        src="https://pos.nvncdn.com/e8033b-157317/ps/20240405_EeerfbJm9M.jpeg"
                                        alt="Nồi Chiên Không Dầu Air Fryer Màn hình cảm ứng 15L " (bh=""
                                        do="" lỗi="" nsx)""=""></a>
                            </div>

                            <div class="phistory-v-item">
                                <a href="/8-noi-com-dien-chigo-1.2l-p38929578.html"
                                    title="Nồi cơm điện mini Chigo cao cấp, nồi cơm điện đa năng giá tốt"><img
                                        class="lazyload" data-sizes="auto"
                                        src="https://web.nvnstatic.net/img/lazyLoading.gif?v=3"
                                        data-src="https://pos.nvncdn.com/e8033b-157317/ps/20231108_pBNpq6z8Kv.jpeg"
                                        alt="Nồi cơm điện mini Chigo cao cấp, nồi cơm điện đa năng giá tốt"></a>
                            </div>
                        </div>
                    </div>

                    <div class="phistor-v-nav">
                        <div class="prevSlideZ" style="display: block;"><i class="fa fa-chevron-up"></i></div>
                        <div class="nextSlideZ" style="display: block;"><i class="fa fa-chevron-down"></i></div>
                    </div>
                </div>
            </div>
            <script>
                var $storeId = $('#storeId').val();
                var pHisVer = $('.phistor-v-slider');
                if (pHisVer.length) {
                    pHisVer.carouFredSel({
                        items: 3,
                        direction: "up",
                        scroll: {
                            items: 1,
                            duration: 700
                        },
                        auto: false,
                        prev: ".phistor-v-nav .prevSlideZ",
                        next: ".phistor-v-nav .nextSlideZ"
                    });
                }

                $('.phistor-icon').click(function() {
                    var productHistory = $('#phistory-bar .phistory-content');
                    productHistory.empty();
                    if (!$(this).hasClass('is-open')) {
                        ajaxLoadView({
                            view: 'pHistorySidebar',
                            params: '&view=horizontal',
                            delay: 150,
                            onSuccess: function(rs) {
                                productHistory.html(rs)
                            }
                        });
                    } else {
                        ajaxLoadView({
                            view: 'pHistorySidebar',
                            params: '&view=vertical',
                            delay: 150,
                            onSuccess: function(rs) {
                                productHistory.html(rs)
                            }
                        });
                    }
                    $(this).toggleClass('is-open');
                    $('#phistory-bar').toggleClass('is-active')
                });

                if (in_array($storeId, [113339])) {
                    $('.closeBox').click(function() {
                        $('#phistory-bar').addClass('hidden');
                    });
                }
            </script>
        </div>


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

    <script>
        function plusQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);
            var maxQuantity = parseInt(quantityInput.getAttribute('max'));

            if (currentQuantity < maxQuantity) {
                quantityInput.value = currentQuantity + 1;
            }
        }

        function minusQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentQuantity = parseInt(quantityInput.value);

            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
            }
        }
    </script>
@endsection
