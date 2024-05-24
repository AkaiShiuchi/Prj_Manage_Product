@extends('customer_design.cart.layout_order')

@section('title', 'Thanh toán')

@section('style')
    <script src="{{ asset('js/customer/order.js') }}"></script>
@endsection

@section('content')
    <input type="hidden" value="" id="storeId">
    <div class="wrapper">
        <script defer="" type="text/javascript" src="https://web.nvnstatic.net/tp/T0298/js/order.js?v=3"></script>
        <div class="content">

            <div class="wrap content-checkout">
                <form action="{{ route('pay_order', ['id' => $purchase_id]) }}" method="post" class="clearfix" id="order-form">
                    @csrf
                    <div class="main">
                        <div class="main-header">
                            <a href="/home-customer" class="logo">
                                <img src="../img/lava-logo-web.jpg" alt="Home">
                            </a>

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/cart">Giỏ hàng</a>
                                </li>
                                <li class="breadcrumb-item breadcrumb-item-current">Thanh toán</li>
                            </ul>

                        </div>
                        <div class="main__content">
                            <div class="main-content">


                                <div class="step">
                                    <div class="step-sections steps-onepage" step="1">
                                        <div class="section">
                                            <div class="section-header">
                                                <h2 class="section-title">Thông tin giao hàng</h2>
                                                @if (!session('user_id'))
                                                    <p class="section-content-text">
                                                        <span id="submitCart"><i class="fa fa-user-circle"></i> Đăng
                                                            nhập</span>
                                                    </p>
                                                @else
                                                    <p class="section-content-text">Xin chào, <a
                                                            href="/profile">{{ session('user_name') }}</a>
                                                    </p>
                                                    <span class="note_login">Để quản lý và theo dõi đơn hàng tốt hơn</span>
                                                @endif
                                            </div>
                                            <div class="section-content section-customer-information no-mb">
                                                <div class="fieldset">
                                                    <div class="field field-required  ">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_full_name">Họ và
                                                                tên </label>
                                                            <input placeholder="Họ và tên"
                                                                class="field-input validate[required]" size="30"
                                                                type="text" id="billing_address_full_name"
                                                                name="customerName" value="{{ session('user_name') }}">
                                                        </div>

                                                    </div>

                                                    <div class="field  field-two-thirds  ">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label"
                                                                for="checkout_user_email">Email</label>
                                                            <input placeholder="Email" class="field-input " size="30"
                                                                type="email" id="checkout_user_email" name="customerEmail"
                                                                value="{{ session('user_email') }}">
                                                        </div>
                                                    </div>

                                                    <div class="field field-required field-third ">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_phone">Số điện
                                                                thoại </label>
                                                            <input placeholder="Số điện thoại"
                                                                class="field-input validate[required, custom[phone]]"
                                                                size="30" maxlength="10" type="tel"
                                                                id="phone_number" name="phone_number" value="">
                                                        </div>
                                                    </div>

                                                    <div class="field field-required  ">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_address1">Địa
                                                                chỉ </label>
                                                            <input placeholder="Địa chỉ"
                                                                class="field-input validate[required]" size="30"
                                                                type="text" id="address" name="address" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="section-content">
                                                <div class="fieldset">
                                                    <div class="field field-show-floating-label field-required field-half ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="cityId">Tỉnh/ Thành phố
                                                            </label>
                                                            <select class="field-input validate[required]" id="cityId"
                                                                name="customerCityId">
                                                                <option value="">Chọn Tỉnh/ thành phố</option>
                                                                <option value="254">Hà Nội</option>
                                                                <option value="255">Hồ Chí Minh</option>
                                                                <option value="256">An Giang</option>
                                                                <option value="257">Bà Rịa - Vũng Tàu</option>
                                                                <option value="258">Bắc Ninh</option>
                                                                <option value="259">Bắc Giang</option>
                                                                <option value="260">Bình Dương</option>
                                                                <option value="261">Bình Định</option>
                                                                <option value="262">Bình Phước</option>
                                                                <option value="263">Bình Thuận</option>
                                                                <option value="264">Bến Tre</option>
                                                                <option value="265">Bắc Cạn</option>
                                                                <option value="266">Cần Thơ</option>
                                                                <option value="267">Khánh Hòa</option>
                                                                <option value="268">Thừa Thiên Huế</option>
                                                                <option value="269">Lào Cai</option>
                                                                <option value="270">Quảng Ninh</option>
                                                                <option value="271">Đồng Nai</option>
                                                                <option value="272">Nam Định</option>
                                                                <option value="273">Cà Mau</option>
                                                                <option value="274">Cao Bằng</option>
                                                                <option value="275">Gia Lai</option>
                                                                <option value="276">Hà Giang</option>
                                                                <option value="277">Hà Nam</option>
                                                                <option value="278">Hà Tĩnh</option>
                                                                <option value="279">Hải Dương</option>
                                                                <option value="280">Hải Phòng</option>
                                                                <option value="281">Hòa Bình</option>
                                                                <option value="282">Hưng Yên</option>
                                                                <option value="283">Kiên Giang</option>
                                                                <option value="284">Kon Tum</option>
                                                                <option value="285">Lai Châu</option>
                                                                <option value="286">Lâm Đồng</option>
                                                                <option value="287">Lạng Sơn</option>
                                                                <option value="288">Long An</option>
                                                                <option value="289">Nghệ An</option>
                                                                <option value="290">Ninh Bình</option>
                                                                <option value="291">Ninh Thuận</option>
                                                                <option value="292">Phú Thọ</option>
                                                                <option value="293">Phú Yên</option>
                                                                <option value="294">Quảng Bình</option>
                                                                <option value="295">Quảng Nam</option>
                                                                <option value="296">Quảng Ngãi</option>
                                                                <option value="297">Quảng Trị</option>
                                                                <option value="298">Sóc Trăng</option>
                                                                <option value="299">Sơn La</option>
                                                                <option value="300">Tây Ninh</option>
                                                                <option value="301">Thái Bình</option>
                                                                <option value="302">Thái Nguyên</option>
                                                                <option value="303">Thanh Hóa</option>
                                                                <option value="304">Tiền Giang</option>
                                                                <option value="305">Trà Vinh</option>
                                                                <option value="306">Tuyên Quang</option>
                                                                <option value="307">Vĩnh Long</option>
                                                                <option value="308">Vĩnh Phúc</option>
                                                                <option value="309">Yên Bái</option>
                                                                <option value="310">Đắk Lắk</option>
                                                                <option value="311">Đồng Tháp</option>
                                                                <option value="312">Đà Nẵng</option>
                                                                <option value="313">Đắc Nông</option>
                                                                <option value="314">Hậu Giang</option>
                                                                <option value="315">Bạc Liêu</option>
                                                                <option value="316">Điện Biên</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="field field-show-floating-label field-required field-half ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="districtId">Quận/ Huyện
                                                            </label>
                                                            <select class="field-input validate[required]" id="districtId"
                                                                name="customerDistrictId">
                                                                <option value="">Chọn Quận/ Huyện</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div
                                                        class="field field-show-floating-label field-required field-half ">
                                                        <div class="field-input-wrapper field-input-wrapper-select">
                                                            <label class="field-label" for="wardId">Phường/ xã </label>
                                                            <select class="field-input validate[required]" id="wardId"
                                                                name="customerWardId">
                                                                <option value="">Phường xã</option>
                                                            </select>
                                                            <input type="hidden" name="selectIdWard">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="section-content section-customer-information fieldset"
                                                    id="div_country_not_vietnam" style="display: none;">
                                                    <div class="field field-two-thirds">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_city">Thành
                                                                phố</label>
                                                            <input placeholder="Thành phố" class="field-input"
                                                                size="30" type="text" id="billing_address_city"
                                                                name="billing_address[city]" value="">
                                                        </div>
                                                    </div>
                                                    <div class="field field-third">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_zip">Mã bưu
                                                                chính</label>
                                                            <input placeholder="Mã bưu chính" class="field-input"
                                                                size="30" type="text" id="billing_address_zip"
                                                                name="billing_address[zip]" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field">
                                                <div class="field-input-wrapper">
                                                    <div class="descriptionCustomer">
                                                        <textarea name="description" class="input " placeholder="Ghi chú" rows="5"
                                                            style="width: 100%;padding: 5px;box-shadow: 0 0 0 1px #d9d9d9;border-radius: 4px;transition: all .2s ease-out;"></textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div id="change_pick_location_or_shipping" class="hidden">
                                                <div id="section-payment-method" class="section">
                                                    <div class="section-header">
                                                        <h2 class="section-title">Phương thức thanh toán</h2>
                                                    </div>
                                                    <div class="section-content">
                                                        <div class="content-box">
                                                            <div class="radio-wrapper content-box-row">
                                                                <label class="radio-label">
                                                                    <div class="radio-input">
                                                                        <input class="input-radio validate[required] cod"
                                                                            checked="" name="paymentMethod"
                                                                            type="radio" value="4">
                                                                    </div>
                                                                    <span class="radio-label-primary">
                                                                        <p>Thanh toán khi nhận hàng</p>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" id="baokimPmMethodId" name="baokimBankPaymentMethodId"
                                        value="Baokim">

                                    <div class="step-footer hidden-xs">
                                        <a class="step-footer-previous-link" href="/cart">
                                            <svg class="previous-link-icon icon-chevron icon"
                                                xmlns="http://www.w3.org/2000/svg" width="6.7" height="11.3"
                                                viewBox="0 0 6.7 11.3">
                                                <path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path>
                                            </svg>
                                            Giỏ hàng
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="description_checkout">
                                <section class="section">
                                    <div class="section-header">
                                        <h2> Hình thức chốt đơn:</h2>
                                    </div>
                                    <div class="section-content">
                                        <div class="content-box">
                                            <div class="radio-wrapper content-box-row">
                                                <label class="radio-label">
                                                    <div class="radio-input">
                                                        <input class="input-radio validate[required] cod" checked=""
                                                            name="note1" type="radio" value="Gửi tin nhắn SMS/Zalo">
                                                    </div>
                                                    <span class="radio-label-primary">Gửi tin nhắn SMS/Zalo</span>
                                                    <span class="content-box__emphasis">*</span>
                                                </label>
                                            </div>
                                            <div class="radio-wrapper content-box-row">
                                                <label class="radio-label">
                                                    <div class="radio-input">
                                                        <input class="input-radio validate[required] cod" name="note1"
                                                            type="radio" value="Gọi điện thoại trực tiếp">
                                                    </div>
                                                    <span class="radio-label-primary">Gọi điện thoại trực tiếp</span>
                                                    <span class="content-box__emphasis">*</span>
                                                </label>
                                            </div>
                                            <div class="radio-wrapper content-box-row">
                                                <label class="radio-label">
                                                    <div class="radio-input">
                                                        <input class="input-radio validate[required]" name="note1"
                                                            type="radio" value="Tin nhắn Email">
                                                    </div>
                                                    <span class="radio-label-primary">Tin nhắn Email</span>
                                                    <span class="content-box__emphasis">*</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <section class="section">
                                    <div class="section-header">
                                        <h2> Hình thức vận chuyển:</h2>
                                    </div>
                                    <div class="section-content">
                                        <div class="content-box">
                                            <div class="radio-wrapper content-box-row">
                                                <label class="radio-label">
                                                    <div class="radio-input">
                                                        <input class="input-radio validate[required] cod" checked=""
                                                            name="note2" type="radio" value="muốn giao tận nơi"
                                                            data-gtm-form-interact-field-id="1">
                                                    </div>
                                                    <span class="radio-label-primary">Tôi muốn giao tận nơi</span>
                                                    <span class="content-box__emphasis"><i class="fa fa-money"></i></span>
                                                </label>

                                            </div>
                                            <div class="note-shipping" style="display: block;">
                                                Shop giao hàng thu tiền tận nơi toàn quốc (có tính phí ship) - phí báo sau
                                                qua zalo khi shop đã chốt đơn hàng
                                            </div>
                                            <div class="radio-wrapper content-box-row">
                                                <label class="radio-label">
                                                    <div class="radio-input">
                                                        <input class="input-radio validate[required]" name="note2"
                                                            type="radio" value="sẽ qua shop lấy"
                                                            data-gtm-form-interact-field-id="0">
                                                    </div>
                                                    <span class="radio-label-primary">Tôi sẽ qua shop lấy</span>
                                                    <span class="content-box__emphasis"><i class="fa fa-money"></i></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar">
                        <div class="sidebar-content">
                            <div class="order-summary">
                                <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                                <div class="order-summary-sections">
                                    <div class="order-summary-section order-summary-section-product-list product-pc">
                                        <table class="product-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                                    <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                                    <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                                    <th scope="col"><span class="visually-hidden">Giá</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($item_cart as $item)
                                                    <tr class="product">
                                                        <td class="product-image">
                                                            <div class="product-thumbnail">
                                                                <div class="product-thumbnail-wrapper">
                                                                    <img class="product-thumbnail-image"
                                                                        alt="{{ $item->product->name }}"
                                                                        src="{{ asset('storage/uploads/' . $item->product->image) }}">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="product-description">
                                                            <span
                                                                class="product-description-name order-summary-emphasis">{{ $item->product->name }}</span>
                                                            <a data-id="{{ $item->product_id }}"
                                                                class="deleteItem cart_remove">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a>
                                                            <div
                                                                class="qtt_checkout qty quantity-partent qty-click clearfix">
                                                                <span class="add-down add-action"
                                                                    data-id="{{ $item->product_id }}">-</span>
                                                                <input type="text" size="4" min="1"
                                                                    max="{{ $item->product->total }}"
                                                                    data-id="{{ $item->product_id }}"
                                                                    value="{{ $item->quantity }}"
                                                                    class="tc line-item-qty item-quantity">
                                                                <span class="add-up add-action"
                                                                    data-id="{{ $item->product_id }}">+</span>
                                                            </div>
                                                        </td>
                                                        <td class="product-price">
                                                            <span class="order-summary-emphasis">
                                                                {{ number_format($item->price, 0, ',', '.') }} ₫</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="order-summary-section order-summary-section-discount"
                                        data-order-summary-section="discount">
                                        <div class="fieldset">
                                            <div style="color:#f77705;margin-left:9px;font-weight:bold;display:none;">Nhập
                                                mã
                                                giảm giá tại đây (nếu có)
                                            </div>
                                            <div class="field">
                                                <div class="field-input-btn-wrapper">
                                                    <div class="field-input-wrapper">
                                                        <label class="field-label" for="discount.code">Mã giảm giá</label>
                                                        <input placeholder="Mã giảm giá" class="field-input"
                                                            size="30" type="text" id="coupon"
                                                            name="couponCode" value="" data-value="0">
                                                    </div>
                                                    <button type="button" class="field-input-btn btn btn-default"
                                                        id="getCoupon">
                                                        <span class="btn-content">Sử dụng</span>
                                                        <i class="btn-spinner icon icon-button-spinner"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="order-summary-section order-summary-section-total-lines">
                                        <table class="total-line-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                                    <th scope="col"><span class="visually-hidden">Giá</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr class="total-line total-line-shipping shipFeeCheckHost">
                                                    <td class="total-line-name">Phí vận chuyển</td>
                                                    <td class="total-line-price">
                                                        <span class="order-summary-emphasis" value="0"
                                                            id="shipFee">
                                                            —
                                                        </span>
                                                        <span id="showCarrier"></span>
                                                        <style>
                                                            #showCarrier {
                                                                display: block;
                                                                text-align: right;
                                                                width: 100%;
                                                                font-size: 11px;
                                                            }

                                                            .changeOrtherShipFee:hover {
                                                                color: darkred;
                                                                text-decoration: underline;
                                                            }
                                                        </style>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <tfoot class="total-line-table-footer">
                                                <tr class="total-line">
                                                    <td class="total-line-name payment-due-label">
                                                        <span class="payment-due-label-total">Tổng cộng</span>
                                                    </td>
                                                    <td class="total-line-name payment-due">
                                                        <span class="payment-due-currency">VND</span>
                                                        <span class="payment-due-price" id="showTotalMoney"
                                                            value="{{ $item_sum_total }}">
                                                            {{ number_format($item_sum_total, 0, ',', '.') }}₫
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <h3 class="notice-checkout"
                                    style="font-weight: 400; padding: 10px; border: 1px solid #f77705; line-height: 18px; margin: 0;">
                                    Chúng tôi sẽ XÁC NHẬN đơn hàng bằng TIN NHẮN SMS hoặc GỌI ĐIỆN. Bạn vui lòng kiểm tra
                                    TIN NHẮN hoặc NGHE MÁY ngay khi đặt hàng thành công và CHỜ NHẬN HÀNG
                                </h3>
                            </div>
                        </div>

                        <div class="sidebar-footer">
                            <button type="submit" class="step-footer-continue-btn btn checkout-accept">
                                <span class="btn-content">Hoàn tất đơn hàng</span>
                                <i class="btn-spinner icon icon-button-spinner"></i>
                            </button>
                        </div>
                    </div>
                    <div id="tableShipFee"></div>
                    <style>
                        #tableShipFee {
                            display: none;
                            clear: both
                        }
                    </style>
                </form>
            </div>

        </div>


        <div style="display: none">
            <div id="progressbar" style="text-align: center;">
                <img src="https://web.nvnstatic.net/img/loading.gif?v=3">
                <p style="font-weight:bold;">Đang xử lý...</p>
            </div>
        </div>
        <style>
            .fb_iframe_widget iframe {
                z-index: 1 !important;
            }
        </style>
        <style>
            .shipFeeCheckHost {
                display: none;
            }
        </style>
    </div>
@endsection
