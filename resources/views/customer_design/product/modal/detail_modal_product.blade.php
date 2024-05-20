<div id="quickview-cart" class="modal fade" role="dialog">
    <div id="quickview-cart-desktop" class="clearfix modal-dialog modal-lg modal-dialog-centered">

        <button type="button" class="close" data-dismiss="modal" fdprocessedid="lu4dbc">
            <img src="https://web.nvnstatic.net/tp/T0298/img/tmp/iconclose.png?v=3" alt="Đóng">
        </button>

        <div class="col-md-8 col-sm-7 col-xs-12">
            <div class="clearfix hidden-xs col-sm-1 thumbnails small-img">
                <div class="row">
                    <div class="thumbnail thumdelete clickItem" data-index="0" data-option="do" data-zoom="">
                        <img class="img-fluid img-thumbnail" src="" id="productImage">
                    </div>
                </div>
            </div>

            <div class="clearfix col-sm-11">
                <div id="slide-image" class="owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 4815px;">
                            <div class="owl-item active" style="width: 535px; margin-right: 0px;">
                                <div class="item itemdelete" data-original="" data-option="do" data-variant="SD05041">
                                    <a href="" title="Click để xem" data-image="" data-fancybox="gallery"
                                        id="productImageLink">
                                        <img class="img-fluid img-responsive" src="" id="productImageCarousel">
                                        <p class="click-p" data-zoom-image="" rel="lightbox-do">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                            Click xem hình lớn hơn
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hinh360" style="display:none">
                    <div id="mySpriteSpin"></div>
                </div>
                <div class="videoProduct" style="display:none">
                    <iframe src="" width="100%" height="470" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-5 col-xs-12" id="detail-product">
            <div class="product-title">
                <h1 id="productName"></h1>
                <span class="pro-soldold">Tình trạng:
                    <span class="statusProduct" id="productStatus"></span>
                </span>
            </div>
            <div class="product-price sale-undo" id="price-preview">

                <p class="pro-price highlight tp_product_price" id="productPrice"></p>
            </div>

            <form id="add-item-form" action="" method="post" class="variants clearfix">
                @csrf
                <div class="selector-actions">
                    <div class="quantity-area clearfix hide">
                        <input type="button" value="-" onclick="minusQuantity()" class="qty-btn">
                        <input type="text" id="quantity" name="quantity" value="1" min="1"
                            class="quantity-selector">
                        <input type="button" value="+" onclick="plusQuantity()" class="qty-btn">
                        <input type="hidden" id="product_id" value="">
                    </div>

                    <div class="wrap-addcart clearfix">
                        <button type="button" id="add-to-cart" class="btnAddToCart">SỞ HỮU NGAY</button>
                    </div>
                </div>
            </form>

            <div class="product-description">
                <div class="title-bl">
                    <h2>
                        Mô tả sản phẩm <span class="icon-open" id="iconOpen"></span>
                    </h2>
                </div>
                <div class="description-content" id="descriptionContent" style="display: none;">
                    <div class="description-productdetail">
                        <p style="line-height:1.38;margin-bottom:0pt;margin-top:0pt;" dir="ltr"
                            id="productDescription">
                            Đây là mô tả sản phẩm.
                        </p>
                    </div>
                </div>
            </div>
            <center class="centerDetial">
                <a id="productDetailLink" href="">Xem chi tiết sản phẩm
                    &gt;&gt;</a>
            </center>
        </div>
    </div>
</div>
