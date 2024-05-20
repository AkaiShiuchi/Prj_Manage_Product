@extends('customer_design.dashboard.layout_custom')

@section('title', 'Giỏ hàng')

@section('style')
    <script src="{{ asset('js/customer/dashboard.js') }}"></script>
    <script src="{{ asset('js/customer/cart.js') }}"></script>
@endsection

@section('content')
    <input type="hidden" value="157317" id="storeId">
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
                                            class="img-responsive logoimg lazyloaded">
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
                                        <img width="160" height="32" src="../img/lava-logo-web.jpg"
                                            alt="lavashop.com" class="img-responsive logoimg">
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
                                                            d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3
                                                                                                                                                                                                                                                                         s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4
                                                                                                                                                                                                                                                                         C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3
                                                                                                                                                                                                                                                                         s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z">
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
                                                                d="M447.988,139.696c-0.156-2.084-1.9-3.696-3.988-3.696h-72v-20C372,52.036,319.96,0,256,0S140,52.036,140,116v20H68
                                                                                                                                                                                                                                                                                 c-2.088,0-3.832,1.612-3.988,3.696l-28,368c-0.084,1.108,0.296,2.204,1.056,3.02C37.824,511.536,38.888,512,40,512h432
                                                                                                                                                                                                                                                                                 c1.112,0,2.176-0.464,2.932-1.28c0.756-0.816,1.14-1.912,1.056-3.02L447.988,139.696z M172,116c0-46.316,37.68-84,84-84
                                                                                                                                                                                                                                                                                 s84,37.684,84,84v20H172V116z M156,248c-22.06,0-40-17.944-40-40c0-15.964,8-30.348,24-36.66V208c0,8.824,7.18,16,16,16
                                                                                                                                                                                                                                                                                 s16-7.176,16-16v-36.636c16,6.312,24,20.804,24,36.636C196,230.056,178.06,248,156,248z M356,248c-22.06,0-40-17.944-40-40
                                                                                                                                                                                                                                                                                 c0-15.964,8-30.348,24-36.66V208c0,8.824,7.18,16,16,16s16-7.176,16-16v-36.636c16,6.312,24,20.804,24,36.636
                                                                                                                                                                                                                                                                                 C396,230.056,378.06,248,356,248z">
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
                                            <i class="fa fa-phone" style="font-size: 27px;padding: 0 0 0 5px;"> </i>
                                            <span class="hotline-txt">0123456789</span>
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
        <script defer="" type="text/javascript" src="https://web.nvnstatic.net/tp/T0298/js/cart.js?v=2"></script>
        <main class="">
            <div id="layout-cart">
                <div class="breadcrumb-shop">
                    <div class="padding-lf-40 clearfix">
                        <div class=" ">
                            <ol class="breadcrumb breadcrumb-arrows clearfix">
                                <li><a href="/home-customer" target="_self"><i class="fa fa-home"></i> Trang chủ</a></li>
                                <li class="active"><span>Giỏ hàng</span></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="pd-page">
                        <div class="container">
                            <div class="heading-pageNew">
                                <div class="header-pageCart">
                                    <h1>Giỏ hàng của bạn</h1>
                                    @if ($item_sum_quantity)
                                        <span class="count-cart">(Có <b>{{ $item_sum_quantity }}</b> sản phẩm trong giỏ
                                            hàng)</span>
                                    @else
                                        <span class="count-cart">(Có <b>0</b> sản phẩm trong giỏ
                                            hàng)</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <form action="/cart" method="post" id="cartformpage">
                                    @if (!$item_cart || $item_cart->count() === 0)
                                        <div class="col-xs-12 col-sm-8">
                                            <div class="span12 expanded-message text-center">Giỏ hàng của bạn trống.</div>
                                        </div>
                                    @else
                                        <div class="col-xs-12 col-sm-8">
                                            <div class="cart-container">
                                                <div class="cart-col-left">
                                                    <div class="main-content-cart">
                                                        <table class="table-cart">
                                                            <thead>
                                                                <tr>
                                                                    <th width="20%" class="image">&nbsp;</th>
                                                                    <th width="40%" class="item">Tên sản phẩm
                                                                    </th>
                                                                    <th width="20%" class="quantity">Số lượng</th>
                                                                    <th width="20%" class="remove">&nbsp;</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="updateItem">
                                                                @foreach ($item_cart as $item)
                                                                    <tr class="clearfix line-item-container">
                                                                        <td class="image imageVariantCart">
                                                                            <div class="product_image">
                                                                                <a
                                                                                    href="{{ route('product_detail', $item->product_id) }}">
                                                                                    <img src="{{ asset('storage/uploads/' . $item->product->image) }}"
                                                                                        alt="{{ $item->product->name }}">
                                                                                </a>
                                                                            </div>
                                                                        </td>
                                                                        <td class="item itemVariantCart">
                                                                            <p>
                                                                                <a
                                                                                    href="{{ route('product_detail', $item->product_id) }}">
                                                                                </a>
                                                                            </p>
                                                                            <h3><a
                                                                                    href="{{ route('product_detail', ['id' => $item->product_id]) }}">
                                                                                    {{ $item->product->name }}</a>
                                                                            </h3>
                                                                            <p></p>
                                                                            <div
                                                                                class="visible-xs showInMobileCart clearfix">
                                                                                {{-- <div
                                                                                    class="qty quantity-partent qty-click clearfix">
                                                                                    <span
                                                                                        class="add-down add-action">-</span>
                                                                                    <input type="text" size="4"
                                                                                        min="1" id=""
                                                                                        max="{{ $item->product->total }}"
                                                                                        value="{{ $item->quantity }}"
                                                                                        data-id="{{ $item->product_id }}"
                                                                                        class="tc line-item-qty item-quantity">
                                                                                    <span
                                                                                        class="add-up add-action">+</span>
                                                                                </div> --}}
                                                                                <span class="line-item-total">
                                                                                    {{ $item->price }}₫ </span>

                                                                            </div>
                                                                            <a data-id="{{ $item->product_id }}"
                                                                                href="javascript:void(0);"
                                                                                class="deleteItem cart_remove cart_remove_index">
                                                                                Xóa </a>
                                                                        </td>

                                                                        <td class="hidden-xs quantity quantityVariantCart">
                                                                            <div
                                                                                class="qty quantity-partent qty-click clearfix">
                                                                                <span class="add-down add-action"
                                                                                    data-id="{{ $item->product_id }}">-</span>
                                                                                <input type="text" size="4"
                                                                                    min="1"
                                                                                    max="{{ $item->product->total }}"
                                                                                    data-id="{{ $item->product_id }}"
                                                                                    value="{{ $item->quantity }}"
                                                                                    class="tc line-item-qty item-quantity">
                                                                                <span class="add-up add-action"
                                                                                    data-id="{{ $item->product_id }}">+</span>
                                                                            </div>

                                                                        </td>
                                                                        <td class="hidden-xs totalLinePriceVariantCart">
                                                                            <p class="price price-flex">
                                                                                <span class="line-item-total">
                                                                                    {{ $item->price }}₫ </span>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="boxRightCart clearfix">
                                            <div class="titleInfoCart">
                                                TÓM TẮT ĐƠN HÀNG </div>
                                            <div class="summary-subtotal clearfix">
                                                <p class="order-infor">
                                                    <span class="titleOrder">Chưa bao gồm phí vận chuyển:</span>
                                                </p>
                                                <p class="order-infor boldPrice">
                                                    <span class="titleOrder"><b>Tổng tiền:</b></span>
                                                    <span class="valOrder total_price">
                                                        <b>
                                                            {{ $item_sum_total }}₫ </b>
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="note-subtotal clearfix">
                                                <i>Bạn có thể nhập mã giảm giá ở trang thanh toán</i>
                                            </div>

                                            <div class="cart-buttons">
                                                <button type="button" onclick="location.href = '/cart/checkout'"
                                                    id="checkout" name="checkout" class="checkLimitCart"
                                                    fdprocessedid="plqw2">Tiến hành đặt hàng</button>
                                                <a class="link-continue" href="/product-all"
                                                    title="Tiếp tục mua hàng">Mua thêm sản phẩm</a>
                                            </div>
                                        </div>
                                        <ul class="policyProduct policyCart clearfix">
                                        </ul>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <meta itemprop="url" content="https://giadungnhanh.com/cart">
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
                                <a href="/1-noi-chien-khong-dau-air-fryer-man-hinh-cam-ung-15l-bh-do-loi-nsx-p36537835.html"
                                    title="[1] Nồi Chiên Không Dầu Air Fryer Màn hình cảm ứng 15L  " (bh=""
                                    do="" lỗi="" nsx)""=""><img
                                        src="https://pos.nvncdn.com/e8033b-157317/ps/20240405_EeerfbJm9M.jpeg"
                                        alt="[1] Nồi Chiên Không Dầu Air Fryer Màn hình cảm ứng 15L  " (bh=""
                                        do="" lỗi="" nsx)""=""></a>
                            </div>
                        </div>
                    </div>

                    <div class="phistor-v-nav">
                        <div class="prevSlideZ hidden" style="display: none;"><i class="fa fa-chevron-up"></i></div>
                        <div class="nextSlideZ hidden" style="display: none;"><i class="fa fa-chevron-down"></i>
                        </div>
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
@endsection
