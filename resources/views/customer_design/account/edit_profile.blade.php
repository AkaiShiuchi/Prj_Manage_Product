@extends('customer_design.dashboard.layout_custom')

@section('title', 'Thông tin cá nhân')

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

                                <li>
                                    <a aria-label="user" href="/profile"><span class="iconTop icon-4-top"></span>
                                        <span class="title-info-top">{{ session('user_name') }}</span>
                                    </a><a aria-label="user" class="signout" href="/user/signout"><i class="fa fa-sign-in"
                                            aria-hidden="true"></i>
                                        <span class="title-info-top">Đăng xuất</span>
                                    </a>
                                </li>
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
                                    <span><a aria-label="user" href="/profile"><i class="fa fa-user"
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
        <link rel="stylesheet" href="https://web.nvnstatic.net/css/JqueryUi.css?v=2" type="text/css">
        <link rel="stylesheet" href="https://web.nvnstatic.net/css/validationEngine.jquery.css?v=2" type="text/css">
        <script defer="" type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.validationEngine.js?v=2">
        </script>
        <script defer="" type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.validationEngine-vi.js?v=2">
        </script>
        <script defer="" type="text/javascript" src="https://web.nvnstatic.net/tp/T0298/js/user.js?v=3"></script>
        <main class="main-content main-pdd" role="main">
            <section id="page-wrapper">
                <div class="container fadeIn animated">
                    <div class="row">
                        <div class="section-content col-md-12">
                            <h1 class="text-center col-md-12">
                                Thông tin cá nhân </h1>
                            <div class="clearfix"></div>

                            <div class="col-sm-2"></div>
                            <form id="formAcount" action="{{ route('handle_edit', ['id' => $user->id]) }}" method="POST"
                                class="formAcount validate col-sm-8 col-xs-12 clearfix">
                                @csrf
                                <div class="form-group clearfix">
                                    <label class="col-sm-3 control-label"> Họ tên: </label>
                                    <div class="col-lg-9">
                                        <input type="text" id="name" name="name" value="{{ $user->name }}"
                                            placeholder="Họ tên"
                                            class="validate[required,minSize[4],maxSize[32]] form-control input-sm">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-sm-3 control-label">
                                        Ngày sinh: </label>
                                    <div class="col-lg-9">
                                        <input type="text" id="birthday" name="birthday"
                                            value="{{ $user->birthday }}" placeholder="Ngày sinh" autocomplete="off"
                                            class="form-control input-sm  hasDatepicker">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-sm-3 control-label">Điện thoại:</label>
                                    <div class="col-lg-9">
                                        <input type="text" id="phone_number" name="phone_number"
                                            value="{{ $user->phone_number }}" placeholder="Điện thoại"
                                            class="validate[required,custom[phone]] form-control input-sm">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-sm-3 control-label">Email:</label>
                                    <div class="col-lg-9">
                                        <input type="text" id="email" name="email" value="{{ $user->email }}"
                                            placeholder="Email"
                                            class="validate[required,custom[email]] form-control input-sm">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <label class="col-sm-3 control-label">Tỉnh/Thành phố :</label>
                                    <div class="col-lg-9">
                                        <select id="cityId" name="cityId"
                                            class="validate[required] form-control minimal">
                                            <option value="{{ $user->city }}">Chọn Tỉnh/ thành phố</option>
                                            <option value="289">Nghệ An</option>
                                            <option value="256">An Giang</option>
                                            <option value="308">Vĩnh Phúc</option>
                                            <option value="292">Phú Thọ</option>
                                            <option value="257">Bà Rịa - Vũng Tàu</option>
                                            <option value="283">Kiên Giang</option>
                                            <option value="309">Yên Bái</option>
                                            <option value="263">Bình Thuận</option>
                                            <option value="255">Hồ Chí Minh</option>
                                            <option value="269">Lào Cai</option>
                                            <option value="294">Quảng Bình</option>
                                            <option value="259">Bắc Giang</option>
                                            <option value="274">Cao Bằng</option>
                                            <option value="286">Lâm Đồng</option>
                                            <option value="307">Vĩnh Long</option>
                                            <option value="279">Hải Dương</option>
                                            <option value="314">Hậu Giang</option>
                                            <option value="291">Ninh Thuận</option>
                                            <option value="293">Phú Yên</option>
                                            <option value="270">Quảng Ninh</option>
                                            <option value="296">Quảng Ngãi</option>
                                            <option value="301">Thái Bình</option>
                                            <option value="262">Bình Phước</option>
                                            <option value="313">Đắc Nông</option>
                                            <option value="312">Đà Nẵng</option>
                                            <option value="277">Hà Nam</option>
                                            <option value="273">Cà Mau</option>
                                            <option value="297">Quảng Trị</option>
                                            <option value="316">Điện Biên</option>
                                            <option value="261">Bình Định</option>
                                            <option value="258">Bắc Ninh</option>
                                            <option value="275">Gia Lai</option>
                                            <option value="276">Hà Giang</option>
                                            <option value="282">Hưng Yên</option>
                                            <option value="271">Đồng Nai</option>
                                            <option value="306">Tuyên Quang</option>
                                            <option value="295">Quảng Nam</option>
                                            <option value="288">Long An</option>
                                            <option value="264">Bến Tre</option>
                                            <option value="287">Lạng Sơn</option>
                                            <option value="299">Sơn La</option>
                                            <option value="315">Bạc Liêu</option>
                                            <option value="310">Đắk Lắk</option>
                                            <option value="254">Hà Nội</option>
                                            <option value="281">Hòa Bình</option>
                                            <option value="266">Cần Thơ</option>
                                            <option value="268">Thừa Thiên Huế</option>
                                            <option value="285">Lai Châu</option>
                                            <option value="311">Đồng Tháp</option>
                                            <option value="267">Khánh Hòa</option>
                                            <option value="278">Hà Tĩnh</option>
                                            <option value="290">Ninh Bình</option>
                                            <option value="298">Sóc Trăng</option>
                                            <option value="305">Trà Vinh</option>
                                            <option value="260">Bình Dương</option>
                                            <option value="280">Hải Phòng</option>
                                            <option value="272">Nam Định</option>
                                            <option value="300">Tây Ninh</option>
                                            <option value="265">Bắc Cạn</option>
                                            <option value="284">Kon Tum</option>
                                            <option value="302">Thái Nguyên</option>
                                            <option value="304">Tiền Giang</option>
                                            <option value="303">Thanh Hóa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label for="districtId" class="col-sm-3 control-label">
                                        Quận/Huyện: </label>
                                    <div class="col-lg-9">
                                        <select id="districtId" name="districtId"
                                            class="validate[required] form-control minimal">
                                            <option value="">Chọn Quận/ Huyện</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <label class="col-sm-3 control-label">Địa chỉ chi tiết: </label>
                                    <div class="col-lg-9">
                                        <input type="text" id="address" name="address"
                                            value="{{ $user->address }}" placeholder="Địa chỉ chi tiết"
                                            class="validate[required] form-control input-sm">
                                    </div>
                                </div>
                                <div class="form-group clearfix text-center">
                                    <button type="submit" class="btn btn-green"> Cập
                                        nhật</button>
                                    <a href="/profile" class="btn btn-green">Quay lại</a>
                                </div>
                            </form>
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

            <div id="site-search" class="site-nav-container" tabindex="-1">
                <div class="site-nav-container-last">
                    <p class="title">Tìm kiếm</p>
                    <div class="search-box wpo-wrapper-search">
                        <meta itemprop="url" content="https://giadungnhanh.com/profile/edit">
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


        <div id="bttop">
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
    </div>
@endsection
