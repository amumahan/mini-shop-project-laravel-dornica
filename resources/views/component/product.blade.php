<div class="swiper-slide product-card group">
    <!-- product header -->
    <div class="product-card_header">
        <div class="flex items-center gap-x-2">
            <form action="{{route('product.cart.add')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}"/>
                <input type="hidden" name="qty" value="{{$product->qty}}"/>

                <div class="tooltip">
                    <button
                        type="submit"
                        class="rounded-full p-1.5 app-border app-hover"
                    >
                        <svg class="size-4">
                            <use href="#shopping-cart"></use>
                        </svg>
                    </button>
                    <div class="tooltiptext">
                        سبد خرید
                    </div>
                </div>
            </form>
        </div>
        <!-- badge offer -->
        @if($product->discount >0)
            <span class="product-card_badge">
                {{$product->discount}}
                %
                تخفیف‌
            </span>
        @endif
    </div>
    <!-- product img -->
    <a href="{{route('product.show')}}">
        <img
            class="product-card_img group-hover:opacity-0 absolute"
            src="{{asset('assets/images/products/1.png')}}"
            alt=""
        >
        <img class="product-card_img opacity-0 group-hover:opacity-100"
             src="{{asset('assets/images/products/1.png')}}" alt="">
    </a>
    <!--  product footer -->
    <div class="space-y-2">
        <a href="{{route('product.show')}}" class="product-card_link">
           {{$product->name}}
            |
            {{$product->en_name}}
        </a>
        <!-- Rate and Price -->
        <div class="product-card_price-wrapper">
            <!-- Price -->
            @if($product->discount > 0)
                <div class="product-card_price">
                    <del>{{number_format($product->price)}} <h6>تومان</h6></del>
                    <p>
                        {{number_format(amountNumber($product->price,$product->discount))}}
                    </p>
                    <span>تومان</span>
                </div>
            @else()
                <div class="product-card_price">
                    <p>
                        {{$product->price}}
                    </p>
                    <span>تومان</span>
                </div>
            @endif
        </div>
    </div>
</div>
