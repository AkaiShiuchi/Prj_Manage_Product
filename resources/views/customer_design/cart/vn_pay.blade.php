@extends('customer_design.cart.vnpay_layout')

@section('title', 'VNPAY')

@section('style')
@endsection

@section('content')
    <div class="loading" style="display: none;">
        <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="main main-layout-lg layout-bills">
        <!-- _custom.header -->
        <div class="header-desktop show-desktop">
            <div class="row row-16 align-items-center justify-content-between">
                <div class="col-auto">
                    <!-- button.button -->
                    <!-- end button.button -->
                </div>
                <div class="col-auto block-right">
                    <div class="title h4">
                        <!-- button.button -->
                        {{-- <a class="ubg-ghost ubox-size-button-sm ubg-hover ubg-active ubtn"
                            href="/paymentv2/VnPayQR/Transaction/Index.html?token=a05973fdc55e40af90c6d39a53b5455d&amp;vnp_Locale=en-US">
                            <div class="ubtn-inner">
                                <span class="ubtn-ic ubtn-ic-left">
                                    <img src="/paymentv2/images/img/flags/en.svg" alt="" class="ic-xl">
                                </span>
                                <span class="ubtn-text">En</span>
                            </div>
                        </a> --}}
                        <!-- end button.button -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end _custom.header -->

        <div class="main-wrap">
            <div class="main-inner main-inner-page">
                <div class="box box-main">
                    <!-- _custom.headerMobile -->

                    <div class="box__header header-box header-box-simple">
                        <div class="box__header-inner">
                            <div class="section">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-md-auto header-box-top">
                                        <div class="row align-items-center justify-content-md-center">
                                            <div class="col-auto show-mobile">
                                                <!-- button.button -->
                                                <!-- end button.button -->
                                            </div>
                                            <div class="col-md-auto col logo-group-wrap w-100">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-md-auto col">
                                                        <div class="logo d-block">
                                                            <img src="https://sandbox.vnpayment.vn/paymentv2/Images/brands/logo.svg"
                                                                alt="VNPAY">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-auto col">
                                                        <div class="logo d-block text-right">
                                                            <img src="https://sandbox.vnpayment.vn/paymentv2/images/merchant/vban.png"
                                                                alt="Merchant Logo">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md timer">
                                        <div class="timmer-inner">
                                            <div
                                                class="row row-12 align-items-center justify-content-md-end justify-content-between list-mb12 list-crop">
                                                <div class="col-md-auto col color-sub-default">
                                                    Giao dịch hết hạn sau
                                                </div>
                                                <div class="col-auto color-sub-default">
                                                    <div class="timer-clock fz-h3 weight5">
                                                        <div class="row row-4 align-items-center">
                                                            <div class="col-auto">
                                                                <div class="ubg-default ubox-size-ic-xs ubox-square ubox ubox-ic"
                                                                    id="minute">14</div>
                                                            </div>
                                                            <div class="col-auto">:</div>
                                                            <div class="col-auto">
                                                                <div class="ubg-default ubox-size-ic-xs ubox-square ubox ubox-ic"
                                                                    id="second">21</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end _custom.headerMobile -->
                    <div class="box__body ubg-white">
                        <div class="list-mb24">
                            <div class="layout-bills-inner box-section">
                                <div class="row list-mb24 list-crop">
                                    <div class="col-12 main-title-mobile show-mobile h3 text-center">
                                        Thanh toán qua ứng dụng Ngân hàng/ Ví điện tử
                                    </div>
                                    <div class="col-12 show-desktop">
                                        <div class="alert-box alert-box-warning ubg-sub-warning list-crop">
                                            <div class="alert-box-title">
                                                <div class="row row-8">
                                                    <div class="col-auto ic">
                                                        <img src="https://sandbox.vnpayment.vn/paymentv2/images/icons-color/warning/default/24x24-alert.svg"
                                                            alt="" class="ic-default">
                                                    </div>
                                                    <div class="col title weight5">
                                                        Quý khách vui lòng không tắt trình duyệt cho đến khi nhận được
                                                        kết quả giao dịch trên website. Trường hợp đã thanh toán nhưng
                                                        chưa nhận kết quả giao dịch, vui lòng bấm <a href="#"
                                                            id="qrBack">"Tại đây"</a> để nhận kết quả. Xin cảm ơn!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 bills-col">
                                        <div class="bills">
                                            <div class="bills-header h2 show-desktop">
                                                Thông tin đơn hàng (Test)
                                            </div>
                                            <div class="bills-header-mobile show-mobile list-mb12 list-last-mb"
                                                data-bs-toggle="collapse" data-bs-target="#accordionBill"
                                                aria-expanded="true" aria-controls="accordionBill">
                                                <div class="title weight5">
                                                    Thanh toán đơn hàng (Test) 188137
                                                </div>
                                                <div class="row color-primary align-items-center">
                                                    <div class="col h2">
                                                        <span id="totalAmountMb">10.000</span><sup>VND</sup>
                                                    </div>
                                                    <div class="col-auto">
                                                        <!-- button.button -->
                                                        <div
                                                            class="ubg-transparent ubox-size-button-xs ubg-hover ubg-active ubtn">
                                                            <div class="ubtn-inner">
                                                                <span class="ubtn-text color-primary">
                                                                    Xem chi tiết
                                                                </span>
                                                                <span class="ubtn-ic ubtn-ic-right">
                                                                    <img src="/paymentv2/Images/icons-color/primary/default/24x24-chevrondown.svg"
                                                                        alt="" class="ic-default">
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- end button.button -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bills-body accordion-collapse collapse" id="accordionBill">
                                                <div>
                                                    <div class="bills-list list-mb24 list-last-mb">
                                                        <div class="bills-list-item show-desktop">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        Số tiền thanh toán
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right color-primary h2">
                                                                        <span id="totalAmountDt">10.000</span><sup>VND</sup>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bills-list-item">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        Giá trị đơn hàng
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right h3">
                                                                        10.000<sup>VND</sup>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bills-list-item">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        Phí giao dịch
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right h3">
                                                                        0<sup>VND</sup>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bills-list-item" id="discountAmountItem"
                                                            style="display: none">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        Số tiền khuyến mại
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right h3">
                                                                        <span id="discountAmount">0</span><sup>VND</sup>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bills-list-item show-desktop">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        Mã đơn hàng
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right h3">
                                                                        188137
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bills-list-item">
                                                            <div class="row">
                                                                <div class="col-md-12 col-5 mb4">
                                                                    <div class="sub-title color-sub-default">
                                                                        Nhà cung cấp
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 col">
                                                                    <div class="title text-left-md-right h3">
                                                                        MC CTT VNPAY (Test)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md right-bill-col">
                                        <div class="right-bill-col-inner">
                                            <div class="main-title h2 text-center show-desktop mb24">
                                                Quét mã qua ứng dụng Ngân hàng/ Ví điện tử
                                            </div>
                                            <div class="qr-section">
                                                <div class="qr-section-inner list-mb24 list-last-mb">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#modalHuongDan"
                                                        class="link weight5 link-style-default show-desktop">
                                                        <img src="https://sandbox.vnpayment.vn/paymentv2/images/icons-color/info/default/24x24-information-circle.svg"
                                                            alt="" class="ic-default">
                                                        Hướng dẫn thanh toán
                                                    </a>
                                                    <div class="qr qr-size-default" data-bs-toggle="modal"
                                                        data-bs-target="#modalQR">
                                                        <div class="qr-inner"
                                                            style="background-image: url('../../../../images/img/mics/qr-frame.svg')">
                                                            <img class="qrcodeimg-modal"
                                                                src="data:image/png;base64,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"
                                                                alt="QR CODE">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="section d-flex justify-content-center align-items-center w-100 show-mobile">
                                                        <a href="/paymentv2/Transaction/DownloadQR.html"
                                                            class="link weight5 link-style-default">
                                                            <img src="/paymentv2/images/icons-color/info/default/24x24-download.svg"
                                                                alt="" class="ic-default">

                                                            Tải mã
                                                        </a>
                                                        <a data-bs-toggle="modal" data-bs-target="#modalHuongDanMobile"
                                                            class="link link-underline weight5" style="margin-left:15px;">
                                                            <img src="/paymentv2/images/icons-color/info/default/24x24-question-circle.svg"
                                                                alt="" class="ic-md">
                                                            Hướng dẫn
                                                        </a>
                                                    </div>
                                                    <div class="list-bank-mobile w-100 show-mobile">
                                                        <div class="list-mb16 list-last-mb">
                                                            <div class="p weight5">
                                                                Sử dụng
                                                                <a data-bs-toggle="modal"
                                                                    data-bs-target="#modalDanhSachUngDung"
                                                                    class="link link-underline weight5"> Ứng dụng hỗ
                                                                    trợ
                                                                </a>
                                                                để quét mã hoặc
                                                                <b> nhấn vào logo
                                                                </b>
                                                                để thanh toán trực tiếp trên ứng dụng
                                                            </div>
                                                            <div class="list-bank list-bank-grid-4">
                                                                <div class="list-mb24 list-last-mb">
                                                                    <div class="list-bank-main">
                                                                        <div class="row row-8 list-mb8 list-crop">


                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vietcombank.svg)"
                                                                                        onclick="return open_vnpayqr('VIETCOMBANK', 'https://itunes.apple.com/vn/app/vietcombank/id561433133?mt=8', 'VCB Digibank');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/agribank.svg)"
                                                                                        onclick="return open_vnpayqr('AGRIBANK', 'https://itunes.apple.com/vn/app/agribank-e-mobile-banking/id935944952?mt=8', 'Agribank E-Mobile Banking');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/bidv.svg)"
                                                                                        onclick="return open_vnpayqr('BIDV', 'https://itunes.apple.com/vn/app/bidv-smart-banking/id1061867449?mt=8', 'BIDV Smart Banking');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vietinbank.svg)"
                                                                                        onclick="return open_vnpayqr('VIETINBANK', 'https://itunes.apple.com/vn/app/vietinbank-ipay/id689963454?mt=8', 'VietinBank iPay');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vnpayewallet.svg)"
                                                                                        onclick="return open_vnpayqr('VNPAYEWALLET', 'https://apps.apple.com/us/app/v%C3%AD-vnpay/id1470378562', 'Ví VNPAY – Ví của Gia đình');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/viettelpay.svg)"
                                                                                        onclick="return open_vnpayqr('VIETTELPAY', 'https://itunes.apple.com/vn/app/viettel-money/id1344204781?mt=8', 'Viettel Pay');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vcbpay.svg)"
                                                                                        onclick="return open_vnpayqr('VCBPAY', 'https://itunes.apple.com/vn/app/vcbpay/id1408592505?mt=8', 'VietcomBank Pay');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/scb.svg)"
                                                                                        onclick="return open_vnpayqr('SCB', 'https://itunes.apple.com/vn/app/scb-mobile-banking/id954973621?mt=8', 'SCB Mobile Banking');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/abbank.svg)"
                                                                                        onclick="return open_vnpayqr('ABBANK', 'https://itunes.apple.com/vn/app/abbankmobile/id1137160023?mt=8', 'AB Ditizen');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/ncb.svg)"
                                                                                        onclick="return open_vnpayqr('NCB', 'https://itunes.apple.com/vn/app/ncb-smart/id1111830467?mt=8', 'NCB iziMobile');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/ivb.svg)"
                                                                                        onclick="return open_vnpayqr('IVB', 'https://itunes.apple.com/vn/app/ivb-mobile/id1096963960?mt=8', 'IVB Mobile Banking');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/eximbankomni.svg)"
                                                                                        onclick="return open_vnpayqr('EXIMBANKOMNI', '#', 'Eximbank EDigi');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/ojb.svg)"
                                                                                        onclick="return open_vnpayqr('OJB', 'https://apps.apple.com/vn/app/oceanbank/id1469028843', 'Easy OceanBank Mobile');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/namabank.svg)"
                                                                                        onclick="return open_vnpayqr('NAMABANK', 'https://itunes.apple.com/vn/app/nam-a-mobile-banking/id1227187853?mt=8', 'NamABank Mobile Banking');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/baovietbank.svg)"
                                                                                        onclick="return open_vnpayqr('BAOVIETBANK', 'https://apps.apple.com/tt/app/baoviet-smart/id1504422967?ign-mpt=uo%3D2', 'BAOVIET Smart');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/hdbank.svg)"
                                                                                        onclick="return open_vnpayqr('HDBANK', 'https://itunes.apple.com/vn/app/hdbank-mobile-banking/id510956975?mt=8', 'HDBank');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/saigonbank.svg)"
                                                                                        onclick="return open_vnpayqr('SAIGONBANK', '#', 'SAIGONBANK SmartBanking');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/kienlongbank.svg)"
                                                                                        onclick="return open_vnpayqr('KIENLONGBANK', 'https://apps.apple.com/vn/app/kienlongbank-mobile-banking/id1492432328', 'KienlongBank Plus');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/bidc.svg)"
                                                                                        onclick="return open_vnpayqr('BIDC', 'https://apps.apple.com/vn/app/bidc-mobile-banking-viet-nam/id1043501726?l=vi', 'BIDC Mobile Banking Vietnam');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vietabank.svg)"
                                                                                        onclick="return open_vnpayqr('VIETABANK', 'https://apps.apple.com/us/app/vietabank/id910897337?l=vi&amp;ls=1', 'VietABank EzMobile');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/msbank.svg)"
                                                                                        onclick="return open_vnpayqr('MSBANK', 'https://itunes.apple.com/vn/app/msb-mbank/id436134873?mt=8', 'MSB mBanking');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/shb.svg)"
                                                                                        onclick="return open_vnpayqr('SHB', 'https://itunes.apple.com/vn/app/shb-mobile/id538278798?mt=8', 'SHB Mobile');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vib.svg)"
                                                                                        onclick="return open_vnpayqr('VIB', 'https://itunes.apple.com/vn/app/myvib/id949371011?mt=8', 'MyVIB 2.0');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/tpbank.svg)"
                                                                                        onclick="return open_vnpayqr('TPBANK', 'https://itunes.apple.com/vn/app/tpbank-quickpay/id1292194225?mt=8', 'TPBANK Mobile');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/techcombank.svg)"
                                                                                        onclick="return open_vnpayqr('TECHCOMBANK', 'https://itunes.apple.com/vn/app/tpbank-quickpay/id1292194225?mt=8', 'TECHCOMBANK Mobile');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/acb.svg)"
                                                                                        onclick="return open_vnpayqr('ACB', 'https://apps.apple.com/app/acb/id950141024', 'ACB ONE');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/pgbank.svg)"
                                                                                        onclick="return open_vnpayqr('PGBANK', 'https://apps.apple.com/th/app/pg-bank-flexi-app/id1537765475', 'PGB Bank App');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/coopbank.svg)"
                                                                                        onclick="return open_vnpayqr('COOPBANK', '#', 'CoopBank');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vbsp.svg)"
                                                                                        onclick="return open_vnpayqr('VBSP', '#', 'VBSP SmartBanking');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vnptpay.svg)"
                                                                                        onclick="return open_vnpayqr('VNPTPAY', 'https://itunes.apple.com/vn/app/vnpt-pay/id1294940479?mt=8', 'VNPT Money');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vinid.svg)"
                                                                                        onclick="return open_vnpayqr('VINID', 'https://apps.apple.com/vn/app/vinid/id1215495998', 'VinID – Tiêu dùng thông minh');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/galaxypay.svg)"
                                                                                        onclick="return open_vnpayqr('GALAXYPAY', '#', 'Galaxy Pay');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/viting.svg)"
                                                                                        onclick="return open_vnpayqr('VITING', 'https://apps.apple.com/us/app/v%C3%AD-ting-qu%E1%BA%A3n-l%C3%BD-ti%E1%BB%81n-hi%E1%BB%87u-qu%E1%BA%A', 'Ví Ting: Quản lý tiền hiệu quả');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/appotapay.svg)"
                                                                                        onclick="return open_vnpayqr('APPOTAPAY', 'https://apps.apple.com/vn/app/v%C3%AD-appota-gi%E1%BA%A3i-tr%C3%AD-t%C3%ADch-%C4%91i%E1%BB%83m/id1198481412', 'Ví Appota – Giải trí tích điểm');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/9pay.svg)"
                                                                                        onclick="return open_vnpayqr('9PAY', 'https://ninepay.page.link', 'Ví điện tử 9Pay');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vtcpay.svg)"
                                                                                        onclick="return open_vnpayqr('VTCPAY', 'https://apps.apple.com/vn/app/vtc365/id404108605?l=vi', 'Ví VTC Pay');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/mobifonepay.svg)"
                                                                                        onclick="return open_vnpayqr('MOBIFONEPAY', 'https://itunes.apple.com/vn/app/msb-mbank/id436134873?mt=8', 'MobiFone Money');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/cbbank.svg)"
                                                                                        onclick="return open_vnpayqr('CBBANK', 'https://apps.apple.com/vn/app/cbway/id1531443181', 'CBBank');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-item col-sm-3 col-4">
                                                                                <div class="list-bank-item">
                                                                                    <div class="list-bank-item-inner"
                                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vietcredit.svg)"
                                                                                        onclick="return open_vnpayqr('VIETCREDIT', 'https://apps.apple.com/vn/app/id6446801016', 'TIN Card');">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <script src="/paymentv2/Scripts/ua-parser.min.js" type="text/javascript"></script>
                                                                            <script type="text/javascript">
                                                                                function open_vnpayqr(bank_code, appLink, appName) {
                                                                                    //Display Errror
                                                                                    $("#messageNotify").html(
                                                                                        "Quý khách vui lòng tải/ chụp ảnh mã QR và quét mã QR để thanh toán tại ứng dụng Mobile Banking/ Ví điện tử"
                                                                                    );
                                                                                    $('#modalNotifySupportQR').modal("show");
                                                                                    return false;
                                                                                }
                                                                            </script>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="qr-cancel-btn-wrap">
                                                        <!-- button.button -->
                                                        <a data-bs-toggle="modal" data-bs-target="#modalCancelPayment"
                                                            class="ubg-secondary ubox-size-button-default ubg-hover ubg-active ubtn">
                                                            <div class="ubtn-inner">
                                                                <span class="ubtn-text">
                                                                    Hủy thanh toán

                                                                </span>
                                                            </div>
                                                        </a>
                                                        <!-- end button.button -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="box-section show-desktop">
                                <div class="list-bank-promo">
                                    <div class="list-mb24 list-last-mb">
                                        <div class="list-bank-promo-section list-mb16">
                                            <div class="weight5">
                                                Danh sách Ngân hàng/ Ví điện tử có áp dụng khuyến mãi


                                            </div>
                                            <div class="list-bank list-bank-grid-8">
                                                <div class="list-mb24 list-last-mb">
                                                    <div class="list-bank-main list-bank-main-unclickable">
                                                        <div class="row row-8 list-mb8 list-crop">
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vietcombank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/bidv.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vietinbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/agribank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vnpayewallet.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/abbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/baovietbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/hdbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/ojb.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/scb.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/bidc.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vietabank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/eximbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/coopbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vietbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/publicbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/saigonbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vbsp.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/viettelmoney.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-bank-promo-section list-mb16">
                                            <div class="row row-16 align-items-center">
                                                <div class="col">
                                                    <div class="weight5">

                                                        Danh sách Ngân hàng/ Ví điện tử khác hỗ trợ thanh toán
                                                        <span class="vnpay-logo b">
                                                            <span class="vnpay-red">VN</span><span
                                                                class="vnpay-blue">PAY</span>
                                                            <sup class="vnpay-red">QR</sup>
                                                        </span>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-bank list-bank-grid-8">
                                                <div class="list-mb24 list-last-mb">
                                                    <div class="list-bank-main list-bank-main-unclickable">
                                                        <div class="row row-8 list-mb8 list-crop">
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/techcombank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/mbbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vpbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vib.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/sacombank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/tpbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/msbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/acb.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/shb.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/ocb.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/ncb.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vietcapitalbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/bacabank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/kienlongbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/pvcombank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/wooribank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/lienvietbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/ivb.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/cbbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/pgbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/seabank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/shinhanbank.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/cakepay.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/timobvb.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vinid.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/truemoney.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/foxpay.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vimass.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vtcpay.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/baokim.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/payme.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/viting.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/vnptpay.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/galaxypay.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/appotapay.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/9pay.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-item col-4 col-md-auto">
                                                                <div class="list-bank-item">
                                                                    <div class="list-bank-item-inner"
                                                                        style="background-image: url(/paymentv2/images/img/logos/bank/big/mobifonepay.svg)">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- _custom.footerBox -->
                    <div class="box__footer footer-box">
                        <div class="box__footer-inner">
                            <div class="section">
                                <div class="row row-32 list-mb24 list-crop align-items-center justify-content-center">
                                    <div class="col fz-h5 show-mobile">
                                        Phát triển bởi VNPAY © 2023
                                    </div>
                                    <div class="col-sm show-desktop">
                                        <div class="row row-32 align-items-center">
                                            <div class="col-auto">
                                                <!-- button.button -->
                                                <a href="tel:1900555577"
                                                    class="ubg-ghost ubox-size-button-default ubg-hover ubg-active ubtn">
                                                    <div class="ubtn-inner">
                                                        <div
                                                            class="ubg-line-porcelain-dark ubox-size-ic-md ubox-square ubox ubox-ic">
                                                            <img src="https://sandbox.vnpayment.vn/paymentv2/images/icons-color/default2/default/24x24-phone.svg"
                                                                alt="" class="ic-default">
                                                        </div>
                                                        <span class="ubtn-text h3 color-info u pl12">1900.5555.77</span>
                                                    </div>
                                                </a>
                                                <!-- end button.button -->
                                            </div>
                                            <div class="col-auto">
                                                <!-- button.button -->
                                                <a href="mailto:hotrovnpay@vnpay.vn"
                                                    class="ubg-ghost ubox-size-button-default ubg-hover ubg-active ubtn">
                                                    <div class="ubtn-inner">
                                                        <div
                                                            class="ubg-line-porcelain-dark ubox-size-ic-md ubox-square ubox ubox-ic">
                                                            <img src="https://sandbox.vnpayment.vn/paymentv2/images/icons-color/default2/default/24x24-email.svg"
                                                                alt="" class="ic-default">
                                                        </div>
                                                        <span
                                                            class="ubtn-text h3 color-info u pl12">hotrovnpay@vnpay.vn</span>
                                                    </div>
                                                </a>
                                                <!-- end button.button -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="row row-8 justify-content-center">
                                            <div class="col-auto">
                                                <a href="https://profile.globalsign.com/SiteSeal/siteSeal/profile/profile.do?p1=e797f6ab&amp;p2=a06dada7520ada559537452c666a510c95706240fc2dfde64d4c864bf735462b7a370908847a6060a26daeac4f549d0bc8&amp;p3=7b58e9c169b0b0ff3eb932a37330cc91d466b871"
                                                    target="_blank" class="footer-logos">
                                                    <img src="https://sandbox.vnpayment.vn/paymentv2/images/img/logos/global-sign.svg"
                                                        height="40">
                                                </a>
                                            </div>
                                            <div class="col-auto">
                                                <a href="https://seal.controlcase.com/index.php?page=showCert&amp;cId=3865876849"
                                                    target="_blank" class="footer-logos">
                                                    <img src="https://sandbox.vnpayment.vn/paymentv2/images/img/logos/pcidss.svg"
                                                        height="40">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end _custom.footerBox -->
                </div>
            </div>
        </div>

        <!-- modal.modal -->
        <div class="modal fade" id="modalQR" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-size-default modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-wrap">
                            <div class="row row-16 modal-title-wrap">
                                <div class="col-12 text-center">
                                    <h2 class="modal-title h2">
                                        Quét mã thanh toán

                                    </h2>
                                </div>
                            </div>
                            <!-- button.button -->
                            <a data-bs-dismiss="modal"
                                class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn modal-close-btn">
                                <div class="ubtn-inner">
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="list-mb24 list-crop text-center row justify-content-center">
                            <div class="col-12">
                                <div class="qr qr-size-lg">
                                    <div class="qr-inner"
                                        style="background-image: url('../../../../images/img/mics/qr-frame.svg')">
                                        <img class="qrcodeimg-modal"
                                            src="data:image/png;base64,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"
                                            alt="QR CODE">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="bills bills-simple">
                                    <div class="text-center">
                                        <div class="sub-title weight5 mb4">
                                            Số tiền thanh toán
                                        </div>
                                        <div class="title color-primary h2">
                                            10.000<sup>VND</sup>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto show-desktop">
                                <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal"
                                    data-bs-target="#modalHuongDan" class="link weight5 link-style-default">
                                    <img src="/paymentv2/images/icons-color/info/default/24x24-information-circle.svg"
                                        alt="" class="ic-default">
                                    Hướng dẫn thanh toán
                                </a>
                            </div>
                            <div class="col-12 show-mobile">
                                <!-- button.button -->
                                <a href="/paymentv2/Transaction/DownloadQR.html"
                                    class="ubg-sub-primary ubox-size-button-default ubg-hover ubg-active ubtn">
                                    <div class="ubtn-inner">
                                        <span class="ubtn-ic ubtn-ic-left">
                                            <img src="/paymentv2/images/icons-color/primary/default/24x24-download.svg"
                                                alt="" class="ic-default">
                                        </span>
                                        <span class="ubtn-text">Tải mã</span>
                                    </div>
                                </a>
                                <!-- end button.button -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal.modal -->
        <!-- modal.modal -->

        <div class="modal fade" id="modalHuongDan" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-size-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-wrap">
                            <div class="row row-16 modal-title-wrap show-mobile">
                                <div class="col-12 text-center">
                                    <h2 class="modal-title h2">
                                        Danh sách ứng dụng hỗ trợ

                                    </h2>
                                </div>
                            </div>
                            <!-- button.button -->
                            <a data-bs-dismiss="modal"
                                class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn modal-close-btn">
                                <div class="ubtn-inner">
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="modal-section show-desktop">
                            <div class="guide">
                                <div class="guide-inner">
                                    <div class="row row-52">
                                        <div class="col-auto">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active tabGuide1">
                                                    <div class="guide-image">
                                                        <img src="/paymentv2/images/img/guide/hd-1.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade tabGuide2">
                                                    <div class="guide-image">
                                                        <img src="/paymentv2/images/img/guide/hd-2.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade tabGuide3">
                                                    <div class="guide-image">
                                                        <img src="/paymentv2/images/img/guide/hd-3.png" alt="">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="h2 mb32">Hướng dẫn thanh toán</div>
                                            <!-- tab.tab -->
                                            <div class="nav-wrap">
                                                <nav class="nav nav-style-guide tabs-vertical tabs-progress nav-full">
                                                    <a class="nav-link active" data-bs-toggle="tab"
                                                        data-bs-target=".tabGuide1">
                                                        <div class="guide-content color-default">
                                                            <div class="row row-16">
                                                                <div class="col-auto">
                                                                    <div class="guide-title-number">
                                                                        <div class="guide-title-number-inner h3">1
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="guide-title h3 mb2">
                                                                        <div class="guide-title-inner">
                                                                            Quét mã QR

                                                                        </div>
                                                                    </div>
                                                                    <div class="guide-sub-title">
                                                                        Đăng nhập ứng dụng thanh toán, chọn chức năng
                                                                        QRPay và quét mã QR
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target=".tabGuide2">
                                                        <div class="guide-content color-default">
                                                            <div class="row row-16">
                                                                <div class="col-auto">
                                                                    <div class="guide-title-number">
                                                                        <div class="guide-title-number-inner h3">2
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="guide-title h3 mb2">
                                                                        <div class="guide-title-inner">
                                                                            Kiểm tra đơn hàng

                                                                        </div>
                                                                    </div>
                                                                    <div class="guide-sub-title">
                                                                        Kiểm tra thông tin đơn hàng và lựa chọn tài
                                                                        khoản thanh toán để tiếp tục
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target=".tabGuide3">
                                                        <div class="guide-content color-default">
                                                            <div class="row row-16">
                                                                <div class="col-auto">
                                                                    <div class="guide-title-number">
                                                                        <div class="guide-title-number-inner h3">3
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="guide-title h3 mb2">
                                                                        <div class="guide-title-inner">
                                                                            Xác nhận giao dịch

                                                                        </div>
                                                                    </div>
                                                                    <div class="guide-sub-title">
                                                                        Xác nhận thanh toán và hoàn tất giao dịch
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </nav>
                                            </div>
                                            <!-- end tab.tab -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-section">
                            <div class="list-mb24 list-last-mb">
                                <div class="row">
                                    <div class="col-md-8 show-desktop">
                                        <div class="h2">
                                            Danh sách ứng dụng hỗ trợ

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- form.input -->
                                        <div class="form-group">
                                            <div
                                                class="input-group-wrap input-default input-size-default input-group-vertical">
                                                <label class="input-inner-wrap">
                                                    <input type="text" class="input input-label-change input-has-clear"
                                                        placeholder="Tìm kiếm..." autocorrect="off"
                                                        id="searchAppSupportQR">
                                                    <div class="input-extend input-extend-left">
                                                        <div class="input-box input-ic">
                                                            <img src="/paymentv2/images/icons-color/default2/default/24x24-search.svg"
                                                                alt="" class="ic-default">
                                                        </div>
                                                    </div>
                                                    <div class="input-extend input-extend-right">
                                                        <div class="input-box input-ic-clear"></div>
                                                    </div>
                                                    <div class="input-frame"></div>
                                                </label>
                                            </div>
                                            <div class="errorBlock"></div>
                                        </div>
                                        <!-- end form.input -->
                                    </div>
                                </div>
                                <div class="app-list">
                                    <div class="row list-mb16 list-crop row-16">
                                        <div class="col-md-6 list-app-qr" search-value="vcb digibank">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIETCOMBANK.png"
                                                                    alt="VCB Digibank">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    VCB Digibank
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 3.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android: 3.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="agribank e-mobile banking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/AGRIBANK.png"
                                                                    alt="Agribank E-Mobile Banking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Agribank E-Mobile Banking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.2.12
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.12</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="bidv smart banking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/BIDV.png"
                                                                    alt="BIDV Smart Banking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    BIDV Smart Banking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.1.5
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.5.2</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="vietinbank ipay">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIETINBANK.png"
                                                                    alt="VietinBank iPay">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    VietinBank iPay
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 4.0.4
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    4.0.4</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="ví vnpay – ví của gia đình">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VNPAYEWALLET.png"
                                                                    alt="Ví VNPAY – Ví của Gia đình">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Ví VNPAY – Ví của Gia đình
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.1
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.1</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="viettel pay">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIETTELPAY.png"
                                                                    alt="Viettel Pay">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Viettel Pay
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.1
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.1</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="vietcombank pay">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VCBPAY.png"
                                                                    alt="VietcomBank Pay">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    VietcomBank Pay
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="scb mobile banking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/SCB.png"
                                                                    alt="SCB Mobile Banking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    SCB Mobile Banking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 3.0.1
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    3.0.1</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="ab ditizen">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/ABBANK.png"
                                                                    alt="AB Ditizen">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    AB Ditizen
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.0.2
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="seabank smartbanking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/SEABANK.png"
                                                                    alt="Seabank SmartBanking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Seabank SmartBanking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.3
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.7</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="ncb izimobile">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/NCB.png"
                                                                    alt="NCB iziMobile">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    NCB iziMobile
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 4.0.1
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    4.1.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="ivb mobile banking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/IVB.png"
                                                                    alt="IVB Mobile Banking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    IVB Mobile Banking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.0.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="vietbank digital">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIETBANK.png"
                                                                    alt="Vietbank Digital">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Vietbank Digital
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.4
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.4</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="eximbank edigi">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/EXIMBANKOMNI.png"
                                                                    alt="Eximbank EDigi">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Eximbank EDigi
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: #</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android: #
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="easy oceanbank mobile">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/OJB.png"
                                                                    alt="Easy OceanBank Mobile">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Easy OceanBank Mobile
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.3
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android: 1.2
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="namabank mobile banking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/NAMABANK.png"
                                                                    alt="NamABank Mobile Banking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    NamABank Mobile Banking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.0.4
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    3.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="baoviet smart">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/BAOVIETBANK.png"
                                                                    alt="BAOVIET Smart">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    BAOVIET Smart
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.2
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.1</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="hdbank">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/HDBANK.png"
                                                                    alt="HDBank">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    HDBank
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.8
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android: 2.4
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="saigonbank smartbanking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/SAIGONBANK.png"
                                                                    alt="SAIGONBANK SmartBanking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    SAIGONBANK SmartBanking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="kienlongbank plus">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/KIENLONGBANK.png"
                                                                    alt="KienlongBank Plus">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    KienlongBank Plus
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="bidc mobile banking vietnam">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/BIDC.png"
                                                                    alt="BIDC Mobile Banking Vietnam">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    BIDC Mobile Banking Vietnam
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.1.1
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.7</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="vietabank ezmobile">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIETABANK.png"
                                                                    alt="VietABank EzMobile">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    VietABank EzMobile
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 3.0.9
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    3.0-11</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="msb mbanking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/MSBANK.png"
                                                                    alt="MSB mBanking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    MSB mBanking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 4.0.8
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    4.2.2</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="shb mobile">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/SHB.png"
                                                                    alt="SHB Mobile">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    SHB Mobile
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 3.0.7
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    3.0.7</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="myvib 2.0">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIB.png"
                                                                    alt="MyVIB 2.0">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    MyVIB 2.0
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 8.1.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    8.1.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="tpbank mobile">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/TPBANK.png"
                                                                    alt="TPBANK Mobile">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    TPBANK Mobile
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.7
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android: 1.7
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="techcombank mobile">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/TECHCOMBANK.png"
                                                                    alt="TECHCOMBANK Mobile">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    TECHCOMBANK Mobile
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.7
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android: #
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="mb bank">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/MBBANK.png"
                                                                    alt="MB Bank">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    MB Bank
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 3.6
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android: 1.6
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="bac a bank mobile banking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/BACABANK.png"
                                                                    alt="BAC A BANK Mobile Banking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    BAC A BANK Mobile Banking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.4
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.0.4</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="acb one">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/ACB.png"
                                                                    alt="ACB ONE">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    ACB ONE
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.4.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.4.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="ngân hàng số ocb omni">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/OCB.png"
                                                                    alt="Ngân hàng số OCB OMNI">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Ngân hàng số OCB OMNI
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS:
                                                                                    10.01.2019</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    10.01.2019</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="woori won vietnam">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/WOORIBANK.png"
                                                                    alt="Woori WON Vietnam">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Woori WON Vietnam
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.5.3
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.4.25</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="pv mobile banking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/PVCOMBANK.png"
                                                                    alt="PV Mobile Banking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    PV Mobile Banking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.5
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android: 2.5
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="pgb bank app">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/PGBANK.png"
                                                                    alt="PGB Bank App">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    PGB Bank App
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.8.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.8.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="digimi – ngân hàng số">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIETCAPITALBANK.png"
                                                                    alt="digimi – Ngân hàng số">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    digimi – Ngân hàng số
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.40
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.94</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="coopbank">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/COOPBANK.png"
                                                                    alt="CoopBank">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    CoopBank
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="shinhan sol vietnam">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/SHINHANBANK.png"
                                                                    alt="Shinhan SOL Vietnam">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Shinhan SOL Vietnam
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.1.8
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.2.2</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="vbsp smartbanking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VBSP.png"
                                                                    alt="VBSP SmartBanking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    VBSP SmartBanking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="public bank vietnam">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIDBANK.png"
                                                                    alt="Public Bank Vietnam">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Public Bank Vietnam
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.2
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.2</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="vnpt money">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VNPTPAY.png"
                                                                    alt="VNPT Money">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    VNPT Money
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.5.6
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="galaxy pay">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/GALAXYPAY.png"
                                                                    alt="Galaxy Pay">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Galaxy Pay
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="vinid – tiêu dùng thông minh">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VINID.png"
                                                                    alt="VinID – Tiêu dùng thông minh">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    VinID – Tiêu dùng thông minh
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 3.4.2
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    3.4.2</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="ví vimass">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIMASS.png"
                                                                    alt="Ví Vimass">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Ví Vimass
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 4.0.5
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.0.14</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="ví ting: quản lý tiền hiệu quả">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VITING.png"
                                                                    alt="Ví Ting: Quản lý tiền hiệu quả">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Ví Ting: Quản lý tiền hiệu quả
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 0.0.68
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    0.0.68</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="ví điện tử 9pay">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/9PAY.png"
                                                                    alt="Ví điện tử 9Pay">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Ví điện tử 9Pay
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS:
                                                                                    3.5.0+368</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    3.5.0+368</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="ví appota – giải trí tích điểm">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/APPOTAPAY.png"
                                                                    alt="Ví Appota – Giải trí tích điểm">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Ví Appota – Giải trí tích điểm
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 4.9.13
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    4.9.13</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="truemoney ">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/1PAY.png"
                                                                    alt="TrueMoney ">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    TrueMoney
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 3.4.2
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    3.4.2</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="liên việt 24h ">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIVIET.png"
                                                                    alt="Liên Việt 24h ">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Liên Việt 24h
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.7.7
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.7.7</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="vi dien tu yolo">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/YOLO.png"
                                                                    alt="Vi dien tu YOLO">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Vi dien tu YOLO
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.5.6
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="ví vtc pay">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VTCPAY.png"
                                                                    alt="Ví VTC Pay">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Ví VTC Pay
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 9.22.29
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    4.3.56</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="mobifone money">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/MOBIFONEPAY.png"
                                                                    alt="MobiFone Money">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    MobiFone Money
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 4.0.8
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    4.2.2</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="cbbank">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/CBBANK.png"
                                                                    alt="CBBank">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    CBBank
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 2.0.0
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    2.0.0</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="timo digital bank">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/TIMOBVB.png"
                                                                    alt="Timo Digital Bank">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Timo Digital Bank
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: #</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android: #
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="sacombank mbanking">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/SACOMBANK.png"
                                                                    alt="Sacombank mBanking">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    Sacombank mBanking
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: #</div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android: #
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 list-app-qr" search-value="tin card">
                                            <div class="app-list-item">
                                                <div class="app-list-item-inner">
                                                    <div class="row row-12">
                                                        <div class="col-auto">
                                                            <div class="icon">
                                                                <img src="/paymentv2/images/img/logos/app/VIETCREDIT.png"
                                                                    alt="TIN Card">
                                                            </div>
                                                        </div>
                                                        <div class="col content">
                                                            <div class="list-mb8 list-last-mb">
                                                                <div class="title weight5">
                                                                    TIN Card
                                                                </div>
                                                                <div class="app-os fz-h5">
                                                                    <div class="row row-16">
                                                                        <div class="col">
                                                                            <div class="app-os-item ios">
                                                                                <div class="app-os-title">iOS: 1.0.3
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="app-os-item android">
                                                                                <div class="app-os-title">Android:
                                                                                    1.0.3</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal.modal -->
        <div class="modal fade modal-full-height" id="modalHuongDanMobile" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-size-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-wrap">
                            <div class="row row-16 modal-title-wrap">
                                <div class="col-12 text-center">
                                    <h2 class="modal-title h2">
                                        Hướng dẫn thanh toán

                                    </h2>
                                </div>
                            </div>
                            <!-- button.button -->
                            <a data-bs-dismiss="modal"
                                class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn modal-close-btn">
                                <div class="ubtn-inner">
                                </div>
                            </a>
                            <!-- end button.button -->
                            <div class="mt16">
                                <!-- tab.tab -->
                                <div class="nav-wrap">
                                    <nav class="nav nav-style-pills nav-fill">
                                        <a class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target=".tabGuideMobile1">
                                            Qua quét mã VNPAY<sup>QR</sup>
                                        </a>
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target=".tabGuideMobile2">
                                            Qua ứng dụng hỗ trợ VNPAY
                                        </a>
                                    </nav>
                                </div>
                                <!-- end tab.tab -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active tabGuideMobile1">
                                <div class="list-mb24 list-last-mb">
                                    <ul class="ul weight5 list-mb12 list-last-mb">
                                        <li>
                                            <span class="color-primary">Bước 1</span>: Tải mã / chụp lại mã thanh toán
                                        </li>
                                        <li>
                                            <span class="color-primary">Bước 2</span>: Đăng nhập ứng dụng hỗ trợ thanh
                                            toán, chọn chức năng QRPay
                                        </li>
                                        <li>
                                            <span class="color-primary">Bước 3</span>: Tại màn hình quét QR, chọn chức
                                            năng "Thư viện ảnh"
                                        </li>
                                        <li>
                                            <span class="color-primary">Bước 4</span>:Chọn ảnh QR đã tải về trong thư
                                            viện
                                        </li>
                                        <li>
                                            <span class="color-primary">Bước 5</span>: Kiểm tra thông tin đơn hàng và
                                            lựa chọn tài khoản thanh toán
                                        </li>
                                        <li>
                                            <span class="color-primary">Bước 6</span>: Xác nhận thanh toán và hoàn tất
                                            giao dịch
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade tabGuideMobile2">
                                <div class="list-mb24 list-last-mb">
                                    <ul class="ul weight5 list-mb12 list-last-mb">
                                        <li>
                                            <span class="color-primary">Bước 1</span>:
                                            Nhấn vào logo của ứng dụng hỗ trợ thanh toán QR trong danh sách
                                        </li>
                                        <li>
                                            <span class="color-primary">Bước 2</span>:
                                            Đồng ý mở ứng dụng hỗ trợ thanh toán QR theo yêu câu thông báo trên màn hình
                                            và Đăng nhập
                                        </li>
                                        <li>
                                            <span class="color-primary">Bước 3</span>:
                                            Xác nhận giao dịch và hoàn tất thanh toán
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal.modal -->
        <!-- modal.modal -->
        <div class="modal fade" id="modalDanhSachUngDung" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-size-md modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-wrap">
                            <div class="row row-16 modal-title-wrap">
                                <div class="col-12 text-center">
                                    <h2 class="modal-title h2">
                                        Danh sách Ngân hàng hỗ trợ

                                    </h2>
                                </div>
                            </div>
                            <!-- button.button -->
                            <a data-bs-dismiss="modal"
                                class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn modal-close-btn">
                                <div class="ubtn-inner">
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="list-bank list-bank-grid-4">
                            <div class="list-mb24 list-last-mb">
                                <div class="list-bank-main list-bank-main-unclickable">
                                    <div class="row row-8 list-mb8 list-crop">
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIETCOMBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/AGRIBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/BIDV.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIETINBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VNPAYEWALLET.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIETTELPAY.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VCBPAY.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/SCB.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/ABBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/SEABANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/NCB.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/IVB.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIETBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/EXIMBANKOMNI.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/OJB.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/NAMABANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/BAOVIETBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/HDBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/SAIGONBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/KIENLONGBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/BIDC.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIETABANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/MSBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/SHB.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIB.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/TPBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/TECHCOMBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/MBBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/BACABANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/ACB.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/OCB.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/WOORIBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/PVCOMBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/PGBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIETCAPITALBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/COOPBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/SHINHANBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VBSP.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIDBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VNPTPAY.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/GALAXYPAY.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VINID.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIMASS.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VITING.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/9PAY.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/APPOTAPAY.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/1PAY.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIVIET.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/YOLO.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VTCPAY.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/MOBIFONEPAY.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/CBBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/TIMOBVB.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/SACOMBANK.svg)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-item col-4 col-md-auto">
                                            <div class="list-bank-item">
                                                <div class="list-bank-item-inner"
                                                    style="background-image: url(/paymentv2/images/img/logos/bank/big/VIETCREDIT.svg)">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal.modal -->
        <!-- end modal.modal -->


        <footer class="footer main-footer show-desktop">
            <div class="footer-inner text-center">
                Phát triển bởi VNPAY © 2023
            </div>
        </footer>
    </div>
    <div class="chat-box show-desktop">
        <div class="chat-box-icon">
            <a href="https://zalo.me/4134983655549474109" target="_blank">
                <img src="/paymentv2/images/img/logos/zalo.svg" alt="">
            </a>
        </div>
    </div>
    <!-- _custom.footerMobile -->
    <div class="footer_mobile show-mobile">
        <div class="footer_mobile-inner">
            <div class="row row-32 align-items-center">
                <div class="col">
                    <div class="inline-block">
                        <!-- button.button -->
                        <a class="ubg-ghost ubox-size-button-sm ubg-hover ubg-active ubtn"
                            href="/paymentv2/VnPayQR/Transaction/Index.html?token=a05973fdc55e40af90c6d39a53b5455d&amp;vnp_Locale=en-US">
                            <div class="ubtn-inner">
                                <span class="ubtn-ic ubtn-ic-left">
                                    <img src="/paymentv2/images/img/flags/en.svg" alt="" class="ic-xl">
                                </span>
                                <span class="ubtn-text">En</span>
                            </div>
                        </a>
                        <!-- end button.button -->
                    </div>
                </div>
                <div class="col-auto">
                    <div class="row row-0">
                        <div class="col-auto">
                            <!-- button.button -->
                            <a href="https://zalo.me/4134983655549474109"
                                class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-ic ubtn-ic-left">
                                        <img src="/paymentv2/images/img/logos/zalo.svg" alt=""
                                            class="ic-default">
                                    </span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                        <div class="col-auto">
                            <!-- button.button -->
                            <a href="tel:1900555577"
                                class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-ic ubtn-ic-left">
                                        <img src="/paymentv2/images/icons-color/default/default/24x24-phone.svg"
                                            alt="" class="ic-default">
                                    </span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                        <div class="col-auto">
                            <!-- button.button -->
                            <a href="mailto:hotrovnpay@vnpay.vn"
                                class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-ic ubtn-ic-left">
                                        <img src="/paymentv2/images/icons-color/default/default/24x24-email.svg"
                                            alt="" class="ic-default">
                                    </span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end _custom.footerMobile -->
    <!-- modal.modalAlert -->
    <!-- modal.modal -->
    <div class="modal fade text-center" id="modalCancelPayment" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-size-alert-default modal-dialog-scrollable modal-alert"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-wrap">
                        <div class="row row-16 modal-title-wrap">
                            <div class="col-12 text-center">
                                <h2 class="modal-title h2">
                                    Hủy thanh toán
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body color-sub-default fz-h3">
                    Quý khách có chắc chắn muốn hủy thanh toán giao dịch này?
                </div>
                <div class="modal-footer justify-content-center">
                    <!-- button.btnGroup -->
                    <div
                        class="ubtn-group list-mb16 list-crop row row-16 justify-content-center group-col-md-3 group-col-fill">
                        <div class="group-col-item">
                            <!-- button.button -->
                            <a data-bs-dismiss="modal"
                                class="ubg-secondary ubox-size-button-default ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-text">Đóng</span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                        <div class="group-col-item">
                            <!-- button.button -->
                            <a href="/home-customer"
                                class="ubg-danger ubox-size-button-default ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-text">Xác nhận hủy</span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                    <!-- end button.btnGroup -->
                </div>
            </div>
        </div>
    </div>
    <!-- end modal.modal -->
    <!-- end modal.modalAlert -->
    <!-- modal.modalAlert -->
    <!-- modal.modal -->
    <div class="modal fade text-center" id="modalNotifySupportQR" role="dialog"
        aria-labelledby="modalNotifySupportQR" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-size-alert-default modal-dialog-scrollable modal-alert"
            role="document">
            <div class="modal-content">
                <div class="modal-body color-sub-default fz-h3" id="messageNotify">
                    Quý khách có chắc chắn muốn hủy thanh toán giao dịch này?
                </div>
                <div class="modal-footer justify-content-center">
                    <!-- button.btnGroup -->
                    <div
                        class="ubtn-group list-mb16 list-crop row row-16 justify-content-center group-col-md-3 group-col-fill">
                        <div class="group-col-item">
                            <!-- button.button -->
                            <a data-bs-dismiss="modal"
                                class="ubg-secondary ubox-size-button-default ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-text">Đóng</span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                    <!-- end button.btnGroup -->
                </div>
            </div>
        </div>
    </div>
    <!-- end modal.modal -->
    <!-- end modal.modalAlert -->
    <!-- modal.modalAlert -->
    <!-- modal.modal -->
    <div class="modal fade text-center" id="modalNotifyOpenNewTab" role="dialog"
        aria-labelledby="modalNotifyOpenNewTab" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-size-alert-default modal-dialog-scrollable modal-alert"
            role="document">
            <div class="modal-content">
                <div class="modal-body color-sub-default fz-h3">
                    Quý khách đang thực hiện giao dịch ở 1 màn hình khác. Quý khách vui lòng chỉ thực hiện giao dịch
                    trên 1 màn hình. Trân trọng cảm ơn Quý khách và xin lỗi vì sự bất tiện này.
                </div>
                <div class="modal-footer justify-content-center">
                    <!-- button.btnGroup -->
                    <div
                        class="ubtn-group list-mb16 list-crop row row-16 justify-content-center group-col-md-3 group-col-fill">
                        <div class="group-col-item">
                            <!-- button.button -->
                            <a href="#" class="ubg-secondary ubox-size-button-default ubg-hover ubg-active ubtn"
                                onclick="cancelConfirm()">
                                <div class="ubtn-inner">
                                    <span class="ubtn-text">Đóng</span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                    <!-- end button.btnGroup -->
                </div>
            </div>
        </div>
    </div>
    <!-- end modal.modal -->
    <!-- end modal.modalAlert -->
    <!-- modal.modal -->
    <div class="modal fade" id="modalDKSD" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-size-sm modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-wrap">
                        <div class="row row-16 modal-title-wrap">
                            <div class="col-12 text-center">
                                <h2 class="modal-title h2">
                                    <div class="h3">Điều khoản sử dụng</div>
                                </h2>
                            </div>
                        </div>
                        <!-- button.button -->
                        <a data-bs-dismiss="modal"
                            class="ubg-transparent ubox-size-button-default ubox-square ubg-hover ubg-active ubtn modal-close-btn">
                            <div class="ubtn-inner">
                            </div>
                        </a>
                        <!-- end button.button -->
                    </div>
                </div>
                <div class="modal-body">
                    <div class="list-mb12">
                        <p><em>(Người dùng đang thực hiện giao dịch trên môi trường kiểm thử của VNPAY, vui lòng không
                                sử dụng ngoài mục đích kiểm thử và tự chịu trách nhiệm trong trường hợp Nhà cung cấp
                                không giao hàng hóa, dịch vụ khi thanh toán thành công).</em></p>
                        <p> Quý khách hàng đang sử dụng Dịch vụ Cổng thanh toán VNPAY được cung cấp bởi <strong>Công ty
                                Cổ phần Giải pháp Thanh toán Việt Nam (VNPAY).</strong></p>
                        <p>Các dữ liệu cá nhân liên quan tới dịch vụ gồm: <em>thông tin thẻ/tài khoản(*) và các dữ liệu
                                cá nhân khác</em> mà Quý khách hàng cung cấp sẽ được <strong>VNPAY</strong> chuyển tới
                            <strong>Ngân hàng phát hành/ Tổ chức chuyển mạch</strong> và <strong>Đơn vị bán hàng tương
                                ứng</strong> cho mục đích cung cấp dịch vụ Cổng thanh toán VNPAY, bao gồm: Xử lý giao
                            dịch thanh toán và cung ứng hàng hóa, dịch vụ; Quản lý rủi ro; Tra soát khiếu nại; Triển
                            khai các chương trình ưu đãi; Giới thiệu dịch vụ và chăm sóc khách hàng.
                        </p>
                        <p>Quý Khách hàng vui lòng đọc các quyền, nghĩa vụ của chủ thể dữ liệu và các nội dung khác liên
                            quan đến bảo vệ dữ liệu cá nhân của Quý Khách hàng tại “Chính sách bảo vệ dữ liệu cá nhân”
                            được nêu chi tiết <a href="https://vnpay.vn/chinh-sach-bao-ve-du-lieu-ca-nhan"
                                target="_blank" rel="noopener noreferrer"><span class="color-info u">tại
                                    đây</span></a>.</p> <em>(*): Thông tin thẻ/tài khoản được quy định là dữ liệu cá
                            nhân nhạy cảm (theo Nghị định số 13/2023/NĐ-CP được Chính phủ ban hành ngày 17/4/2023 về bảo
                            vệ dữ liệu cá nhân. </em>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <!-- button.btnGroup -->
                    <div
                        class="ubtn-group list-mb16 list-crop row row-16 justify-content-center group-col-md-3 group-col-fill">
                        <div class="group-col-item">
                            <!-- button.button -->
                            <a data-bs-dismiss="modal"
                                class="ubg-secondary ubox-size-button-default ubg-hover ubg-active ubtn">
                                <div class="ubtn-inner">
                                    <span class="ubtn-text">Không đồng ý</span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                        <div class="group-col-item">
                            <!-- button.button -->
                            <a data-bs-dismiss="modal"
                                class="ubg-primary ubox-size-button-default ubg-hover ubg-active ubtn" id="btnAgree">
                                <div class="ubtn-inner">
                                    <span class="ubtn-text">Đồng ý &amp; Tiếp tục</span>
                                </div>
                            </a>
                            <!-- end button.button -->
                        </div>
                    </div>
                    <!-- end button.btnGroup -->
                </div>
            </div>
        </div>
    </div>
    <!-- end modal.modal -->


    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/jquery/jquery.bundles.js"></script>
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/jquery/jquery.init.js"></script>
    <!-- jquery -->
    <!-- bootstrap -->
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/bootstrap/bootstrap.bundles.js"></script>
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/bootstrap/bootstrap.init.js"></script>
    <!-- bootstrap -->
    <!-- select2 -->
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/select2/select2.bundles.js"></script>
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/select2/select2.init.js"></script>
    <!-- select2 -->
    <!-- parsley -->
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/parsley/parsley.bundles.js"></script>
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/parsley/parsley.init.js"></script>
    <!-- parsley -->
    <!-- cleave -->
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/cleave/cleave.bundles.js"></script>
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/cleave/cleave.init.js"></script>
    <!-- cleave -->
    <!-- autosize -->
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/autosize/autosize.bundles.js"></script>
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/autosize/autosize.init.js"></script>
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/datetimepicker/moment.js"></script>
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/vendors/datetimepicker/bootstrap-datetimepicker.min.js">
    </script>
    <!-- autosize -->
    <!-- script use for this page only -->
    <!-- end script for this page only -->
    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/custom.min.js?rnd=1809623947"></script>
    <!-- script use for this page only -->
    <!-- end script for this page only -->

    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/ua-parser.min.js" type="text/javascript"></script>

    <script>
        var errorUrl = '/paymentv2/Payment/Error.html?code=15';

        function cancelConfirm() {
            var x = this;
            var postData = {
                "btnCancel": "confirm"
            };
            var submitUrl = $(x).closest('form').attr("action");
            $(".loading").show();
            $.ajax({
                type: "POST",
                url: submitUrl,
                data: postData,
                dataType: 'JSON',
                success: function(data) {
                    if (data.code === '00') {
                        //Check ifram container
                        if (self === top) {
                            //  location.href = data.url;
                            setTimeout(function() {
                                location.href = data.url;
                            }, 200);
                        } else {
                            //  window.top.location.href = data.url;
                            setTimeout(function() {
                                window.top.location.href = data.url;
                            }, 200);
                        }
                        return false;
                    } else {
                        if (data.code === '100') {
                            alert(
                                'Quý khách không thể thực hiện hủy do giao dịch đã được thanh toán thành công. Quý khách sẽ được chuyển hướng về trang mua hàng ngay sau đây.'
                            )
                            //Check ifram container
                            if (self === top) {
                                //  location.href = data.url;
                                setTimeout(function() {
                                    location.href = data.url;
                                }, 2000);
                            } else {
                                //  window.top.location.href = data.url;
                                setTimeout(function() {
                                    window.top.location.href = data.url;
                                }, 2000);
                            }
                        } else {
                            alert(data.message);
                        }
                        return false;
                    }
                }
            });
            $(".loading").hide();
            return false;
        }
    </script>

    <script src="https://sandbox.vnpayment.vn/paymentv2/Scripts/jquery.signalR-2.4.3.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var notify = $.connection('/paymentv2/notify');
            notify.qs = {
                token: "a05973fdc55e40af90c6d39a53b5455d",
                xid: "3032700"
            };
            notify.received(function(data) {
                try {
                    var msg = JSON.parse(data);
                    switch (msg.msgtype) {
                        case "displayqr":
                            $("#qrCode").attr("src", msg.data);
                            $("#qrCode").show();
                            break;
                        case "confirm":
                            $(".loading").show();
                            notify.stop();
                            top.location.href = msg.data;
                            break;
                    }
                } catch (e) {
                    if (window.console) {
                        window.console.log(e);
                    }
                }
            });
            notify.reconnected(function() {
                try {
                    notify.start();
                    if (window.console) {
                        window.console.log("Reconnect to server");
                    }
                } catch (e) {
                    window.console.log("Reconnect to server exception: " + e);
                }
            });
            notify.disconnected(function() {
                window.console.log("Disconnected to server");
                setTimeout(function() {
                    notify.start();
                }, 5000); // Restart connection after 5 seconds.
            });
            notify.start();

            notify.connectionSlow(function() {
                window.console.log("UserOfConnectionProblem");
            });
        });
    </script>

    <script type="text/javascript">
        var timer = 896;
        $('.nav-link').click(function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });
        $("#searchAppSupportQR").keypress(function(e) {
            if (e.shiftKey && (e.which === 37 || e.which === 39)) {
                return true;
            }
            //Arrow key
            if (e.keyCode === 37 || e.keyCode === 39) {
                return true;
            }
            if (e.ctrlKey && (e.which === 67 || e.which === 86)) {
                return true;
            }
            if (e.keyCode === 8 || e.keyCode === 46) {
                return true;
            }
            var inputVal = String.fromCharCode(e.which).toLowerCase();
            var characterReg = /^\s*[a-zA-Z,\s]+\s*$/;
            if (!characterReg.test(inputVal)) {
                return false;
            }
            return true;
        });
        $("#searchAppSupportQR").keyup(function(e) {
            let valueSearch = $('#searchAppSupportQR').val().toLowerCase();
            $(".list-app-qr").each(function(index) {
                if ($(this).attr('search-value').indexOf(valueSearch) === -1) {
                    $(this).addClass('hidden');
                } else {
                    $(this).removeClass('hidden');
                }
            });
        });
        $("#qrBack").click(function() {
            var x = this;
            var submitUrl = '/paymentv2/Transaction/CheckTransactionQr.html';
            $(".loading").show();
            $.ajax({
                type: "POST",
                url: submitUrl,
                dataType: 'JSON',
                success: function(data) {
                    if (data.code === '00') {
                        //Check ifram container
                        if (self === top) {
                            //  location.href = data.url;
                            setTimeout(function() {
                                location.href = data.url;
                            }, 200);
                        } else {
                            //  window.top.location.href = data.url;
                            setTimeout(function() {
                                window.top.location.href = data.url;
                            }, 200);
                        }
                        return false;
                    }
                }
            });
            $(".loading").hide();
            return false;
        });
    </script>
@endsection
