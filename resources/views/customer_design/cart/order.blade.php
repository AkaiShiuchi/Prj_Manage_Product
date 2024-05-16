@extends('customer_design.cart.layout_order')

@section('title', 'Thanh toán')

@section('style')
@endsection

@section('content')
    <input type="hidden" value="157317" id="storeId">
    <div class="wrapper">
        <script defer="" type="text/javascript" src="https://web.nvnstatic.net/tp/T0298/js/order.js?v=3"></script>
        <div class="content">

            <div class="wrap content-checkout">
                <form action="" method="post" id="formCheckOut" class="clearfix" data-gtm-form-interact-id="0">
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
                                                <p class="section-content-text">
                                                    <span id="submitCart"><i class="fa fa-user-circle"></i> Đăng nhập</span>
                                                </p>
                                                <span class="note_login">Để quản lý và theo dõi đơn hàng tốt hơn</span>
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
                                                                name="customerName" value="">
                                                        </div>

                                                    </div>

                                                    <div class="field  field-two-thirds  ">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label"
                                                                for="checkout_user_email">Email</label>
                                                            <input placeholder="Email" class="field-input " size="30"
                                                                type="email" id="checkout_user_email" name="customerEmail"
                                                                value="">
                                                        </div>
                                                    </div>

                                                    <div class="field field-required field-third ">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_phone">Số điện
                                                                thoại </label>
                                                            <input placeholder="Số điện thoại"
                                                                class="field-input validate[required, custom[phone]]"
                                                                size="30" maxlength="10" type="tel"
                                                                id="billing_address_phone" name="customerMobile"
                                                                value="">
                                                        </div>

                                                    </div>

                                                    <div class="field field-required  ">
                                                        <div class="field-input-wrapper">
                                                            <label class="field-label" for="billing_address_address1">Địa
                                                                chỉ </label>
                                                            <input placeholder="Địa chỉ"
                                                                class="field-input validate[required]" size="30"
                                                                type="text" id="billing_address_address1"
                                                                name="customerAddress" value="">
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
                                                            name="desMethod" type="radio"
                                                            value="Gửi tin nhắn SMS/Zalo">
                                                    </div>
                                                    <span class="radio-label-primary">Gửi tin nhắn SMS/Zalo</span>
                                                    <span class="content-box__emphasis">*</span>
                                                </label>
                                            </div>
                                            <div class="radio-wrapper content-box-row">
                                                <label class="radio-label">
                                                    <div class="radio-input">
                                                        <input class="input-radio validate[required] cod" name="desMethod"
                                                            type="radio" value="Gọi điện thoại trực tiếp">
                                                    </div>
                                                    <span class="radio-label-primary">Gọi điện thoại trực tiếp</span>
                                                    <span class="content-box__emphasis">*</span>
                                                </label>
                                            </div>
                                            <div class="radio-wrapper content-box-row">
                                                <label class="radio-label">
                                                    <div class="radio-input">
                                                        <input class="input-radio validate[required]" name="desMethod"
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
                                                            name="shippingMethod" type="radio"
                                                            value="muốn giao tận nơi" data-gtm-form-interact-field-id="1">
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
                                                        <input class="input-radio validate[required]"
                                                            name="shippingMethod" type="radio" value="sẽ qua shop lấy"
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
                                                <tr class="product">
                                                    <td class="product-image">
                                                        <div class="product-thumbnail">
                                                            <div class="product-thumbnail-wrapper">
                                                                <img class="product-thumbnail-image"
                                                                    alt="[1] Nồi Chiên Không Dầu Air Fryer Màn hình cảm ứng 15L  "
                                                                    (bh="" do="" lỗi=""
                                                                    nsx)""=""
                                                                    src="https://pos.nvncdn.com/e8033b-157317/ps/20240405_EeerfbJm9M.jpeg">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-description">
                                                        <span class="product-description-name order-summary-emphasis">[1]
                                                            Nồi Chiên Không Dầu Air Fryer Màn hình cảm ứng 15L "(BH do lỗi
                                                            NSX)"</span>
                                                        <a data-id="36537835" class="deleteItem cart_remove">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="qtt_checkout qty quantity-partent qty-click clearfix">
                                                            <span class="add-down add-action">-</span>
                                                            <input type="text" size="4" min="1"
                                                                max="4" data-id="36537835" value="1"
                                                                class="tc line-item-qty item-quantity" readonly="">
                                                            <span class="add-up add-action">+</span>
                                                        </div>
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="order-summary-emphasis">
                                                            714,900 ₫</span>
                                                    </td>

                                                </tr>
                                                <tr class="product">
                                                    <td class="product-image">
                                                        <div class="product-thumbnail">
                                                            <div class="product-thumbnail-wrapper">
                                                                <img class="product-thumbnail-image"
                                                                    alt="Nồi Chiên Không Dầu CAMEL 12L nắp ngang "
                                                                    (bh="" do="" lỗi=""
                                                                    nsx)""=""
                                                                    src="https://pos.nvncdn.com/e8033b-157317/ps/20240426_g0YavLclq4.jpeg">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-description">
                                                        <span class="product-description-name order-summary-emphasis">Nồi
                                                            Chiên Không Dầu CAMEL 12L nắp ngang "(BH do lỗi NSX)"</span>
                                                        <a data-id="38529606" class="deleteItem cart_remove">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="qtt_checkout qty quantity-partent qty-click clearfix">
                                                            <span class="add-down add-action">-</span>
                                                            <input type="text" size="4" min="1"
                                                                max="179" data-id="38529606" value="1"
                                                                class="tc line-item-qty item-quantity" readonly="">
                                                            <span class="add-up add-action">+</span>
                                                        </div>
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="order-summary-emphasis">
                                                            431,000 ₫</span>
                                                    </td>

                                                </tr>
                                                <tr class="product">
                                                    <td class="product-image">
                                                        <div class="product-thumbnail">
                                                            <div class="product-thumbnail-wrapper">
                                                                <img class="product-thumbnail-image"
                                                                    alt="Nồi chiên không dầu MALATA 10L chính hãng, an toàn cho sức khỏe"
                                                                    src="https://pos.nvncdn.com/e8033b-157317/ps/20240401_pKxNSNLl5c.jpeg">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="product-description">
                                                        <span class="product-description-name order-summary-emphasis">Nồi
                                                            chiên không dầu MALATA 10L chính hãng, an toàn cho sức
                                                            khỏe</span>
                                                        <a data-id="38929932" class="deleteItem cart_remove">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                        <div class="qtt_checkout qty quantity-partent qty-click clearfix">
                                                            <span class="add-down add-action">-</span>
                                                            <input type="text" size="4" min="1"
                                                                max="112" data-id="38929932" value="1"
                                                                class="tc line-item-qty item-quantity" readonly="">
                                                            <span class="add-up add-action">+</span>
                                                        </div>
                                                    </td>
                                                    <td class="product-price">
                                                        <span class="order-summary-emphasis">
                                                            418,100 ₫</span>
                                                    </td>

                                                </tr>
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
                                                            value="1564000">
                                                            1,564,000₫
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

    <input type="hidden" class="fanpageId" value="">
    <script type="application/ld+json">{
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Gia Dụng Nhanh",
      "url": "https://giadungnhanh.com/",
      "logo": "https://pos.nvncdn.com/e8033b-157317/store/20230831_PuNqWysm.png",
      "sameAs": [
        "https://www.facebook.com/fanpage.giadungnhanh",
        "https://twitter.com/giadungnhanh",
        "https://www.instagram.com/giadungnhanh/",
        "https://www.youtube.com/@giadungnhanh8686/",
        "https://www.linkedin.com/in/giadungnhanh/",
        "https://giadungnhanhcom.tumblr.com/",
        "https://giadungnhanh.wordpress.com/",
        "https://www.webwiki.com/https://giadungnhanh.com/",
        "https://giadungnhanh.com/",
        "https://www.pinterest.com/giadungnhanh/"
      ]
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "CÔNG TY TNHH GIA DỤNG NHANH",
      "image": "https://pos.nvncdn.com/e8033b-157317/store/20230831_PuNqWysm.png",
      "@id": "https://giadungnhanh.com/",
      "url": "https://giadungnhanh.com/",
      "telephone": "0912241237",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "343E/17 - 18, Lạc Long Quân, P5, Q.11",
        "addressLocality": "Ho Chi Minh City",
        "postalCode": "743100",
        "addressCountry": "VN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 106.642723,
        "longitude": 10.769058
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday",
          "Sunday"
        ],
        "opens": "08:00",
        "closes": "17:30"
      },
      "sameAs": [
        "https://www.facebook.com/page.giadungnhanh",
        "https://twitter.com/giadungnhanh",
        "https://www.instagram.com/giadungnhanh/",
        "https://www.youtube.com/@giadungnhanh8686",
        "https://www.linkedin.com/in/giadungnhanhcom/",
        "https://www.pinterest.com/giadungnhanhcom/",
        "https://giadungnhanh.com/",
        "https://giadungnhanhcom.tumblr.com/"
      ] 
    }
    </script>
    <style>
        figure.image {
            max-width: 600px;
        }
    </style>
    <style>
        h3.pro-name a {
            color: #288e14;
        }
    </style>
    <style>
        .pro-loop .product-detail h3 a {
            font-size: 16px;
        }
    </style>
    <style>
        button#add-to-cart,
        .wrap-addcart button {
            font-weight: 600;
        }
    </style><!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NX2TCN7L" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) --><input type="hidden" id="bussinessId" value="157317"><input
        type="hidden"
        value="tOVtfIjnWr1Bkf5I10hqGIbx34jAQHVeFXNUdrbC3QN6P4XmuLtyTrIW2wQB85WD3Q9PBm4Q5fRGg5LgoWDlC3u5SQCpS0d5cv0A4rJvUP9Yi4qHFqe4NrOVujYqkjgUG4oywLquWBqfP5WRRve29GLH2FJoAne"
        id="uctk" name="uctk"><input type="hidden" id="clienIp" value="118.70.168.233">
    <script id="gg_rmkCheckout">
        gtag('event', 'begin_checkout', {
            'value': 1564000.0000,
            'currency': 'VND',
            'items': [{
                "id": 36537835,
                "name": "[1] N\u1ed3i Chi\u00ean Kh\u00f4ng D\u1ea7u Air Fryer M\u00e0n h\u00ecnh c\u1ea3m \u1ee9ng 15L  \"(BH do l\u1ed7i NSX)\"",
                "brand": null,
                "category": "565770",
                "list_name": "Search Results",
                "list_position": 1,
                "price": 714900,
                "quantity": 1,
                "variant": ""
            }, {
                "id": 38529606,
                "name": "N\u1ed3i Chi\u00ean Kh\u00f4ng D\u1ea7u CAMEL 12L n\u1eafp ngang \"(BH do l\u1ed7i NSX)\"",
                "brand": null,
                "category": "565770",
                "list_name": "Search Results",
                "list_position": 1,
                "price": 431000,
                "quantity": 1,
                "variant": ""
            }, {
                "id": 38929932,
                "name": "N\u1ed3i chi\u00ean kh\u00f4ng d\u1ea7u MALATA 10L ch\u00ednh h\u00e3ng, an to\u00e0n cho s\u1ee9c kh\u1ecfe",
                "brand": null,
                "category": "565770",
                "list_name": "Search Results",
                "list_position": 1,
                "price": 418100,
                "quantity": 1,
                "variant": ""
            }],
        });
    </script><iframe allow="join-ad-interest-group" data-tagging-id="AW-16481193416"
        data-load-time="1715648345193" height="0" width="0"
        src="https://td.doubleclick.net/td/rul/16481193416?random=1715648345181&amp;cv=11&amp;fst=1715648345181&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45je45d0v9184619481za200&amp;gcd=13l3l3l3l1&amp;dma=0&amp;u_w=1536&amp;u_h=864&amp;url=https%3A%2F%2Fgiadungnhanh.com%2Fcart%2Fcheckout&amp;ref=https%3A%2F%2Fgiadungnhanh.com%2Fcart&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Thanh%20to%C3%A1n&amp;npa=0&amp;pscdl=noapi&amp;auid=1946933850.1715436260&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B124.0.6367.158%7CGoogle%2520Chrome%3B124.0.6367.158%7CNot-A.Brand%3B99.0.0.0&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=15.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dgtag.config"
        style="display: none; visibility: hidden;"></iframe><iframe allow="join-ad-interest-group"
        data-tagging-id="AW-16481193416" data-load-time="1715648345207" height="0" width="0"
        src="https://td.doubleclick.net/td/rul/16481193416?random=1715648345201&amp;cv=11&amp;fst=1715648345201&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45je45d0v9184619481za200&amp;gcd=13l3l3l3l1&amp;dma=0&amp;u_w=1536&amp;u_h=864&amp;url=https%3A%2F%2Fgiadungnhanh.com%2Fcart%2Fcheckout&amp;ref=https%3A%2F%2Fgiadungnhanh.com%2Fcart&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Thanh%20to%C3%A1n&amp;value=1564000&amp;currency_code=VND&amp;npa=0&amp;pscdl=noapi&amp;auid=1946933850.1715436260&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B124.0.6367.158%7CGoogle%2520Chrome%3B124.0.6367.158%7CNot-A.Brand%3B99.0.0.0&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=15.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dbegin_checkout%3Bid%3D36537835%2C38529606%2C38929932"
        style="display: none; visibility: hidden;"></iframe><iframe allow="join-ad-interest-group"
        data-tagging-id="AW-16481193416" data-load-time="1715648345250" height="0" width="0"
        src="https://td.doubleclick.net/td/rul/16481193416?random=1715648345248&amp;cv=11&amp;fst=1715648345248&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45be45d0v9184619481z89180051082za201&amp;gcd=13l3l3l3l1&amp;dma=0&amp;u_w=1536&amp;u_h=864&amp;url=https%3A%2F%2Fgiadungnhanh.com%2Fcart%2Fcheckout&amp;ref=https%3A%2F%2Fgiadungnhanh.com%2Fcart&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Thanh%20to%C3%A1n&amp;npa=0&amp;pscdl=noapi&amp;auid=1946933850.1715436260&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B124.0.6367.158%7CGoogle%2520Chrome%3B124.0.6367.158%7CNot-A.Brand%3B99.0.0.0&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=15.0.0&amp;uaw=0&amp;fledge=1"
        style="display: none; visibility: hidden;"></iframe><iframe allow="join-ad-interest-group"
        data-tagging-id="AW-16481193416" data-load-time="1715648367414" height="0" width="0"
        src="https://td.doubleclick.net/td/rul/16481193416?random=1715648367405&amp;cv=11&amp;fst=1715648367405&amp;fmt=3&amp;bg=ffffff&amp;guid=ON&amp;async=1&amp;gtm=45je45d0v9184619481za200&amp;gcd=13l3l3l3l1&amp;dma=0&amp;u_w=1536&amp;u_h=864&amp;url=https%3A%2F%2Fgiadungnhanh.com%2Fcart%2Fcheckout&amp;ref=https%3A%2F%2Fgiadungnhanh.com%2Fcart&amp;hn=www.googleadservices.com&amp;frm=0&amp;tiba=Thanh%20to%C3%A1n&amp;npa=0&amp;pscdl=noapi&amp;auid=1946933850.1715436260&amp;uaa=x86&amp;uab=64&amp;uafvl=Chromium%3B124.0.6367.158%7CGoogle%2520Chrome%3B124.0.6367.158%7CNot-A.Brand%3B99.0.0.0&amp;uamb=0&amp;uam=&amp;uap=Windows&amp;uapv=15.0.0&amp;uaw=0&amp;fledge=1&amp;data=event%3Dform_start"
        style="display: none; visibility: hidden;"></iframe>
@endsection
