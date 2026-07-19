@extends('product.layouts.app')

@section('product-content')
    <div
        class="grid grid-cols-1 xxs:grid-cols-2 xs:grid-cols-2 sm:grid-cols-2 xl:grid-cols-3 gap-3 xs:gap-2 sm:gap-4"
    >



        <!-- PRODUCT ITEM -->
        @foreach($products as $product)
            @include('component.product')
        @endforeach

    </div>
@endsection
