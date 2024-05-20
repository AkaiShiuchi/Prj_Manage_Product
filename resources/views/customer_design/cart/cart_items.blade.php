<table id="cart-view">
    <tbody>
        @if (isset($products))
            @foreach ($products as $item)
                <tr>
                    <td class="img">
                        <a href="/product-detail/{{ $item->product_id }}">
                            <img src="/storage/uploads/{{ $item->product->image }}" alt="{{ $item->product->name }}">
                        </a>
                    </td>
                    <td>
                        <a class="pro-title-view"
                            href="/product-detail/{{ $item->product_id }}">{{ $item->product->name }}</a>
                        <span class="pro-price-view">{{ $item->price }} ₫ x {{ $item->quantity }}</span>
                        <span class="pro-quantity-view">{{ $item->quantity }}</span>
                        <span class="remove_link remove-cart removePro">
                            <a href="javascript:void(0);" class="cart_remove" data-id="{{ $item->product->id }}">Xóa</a>
                        </span>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2">Hiện chưa có sản phẩm trong giỏ hàng.</td>
            </tr>
        @endif
    </tbody>
</table>
