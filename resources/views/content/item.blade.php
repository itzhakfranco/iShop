@extends('master') @section('main_content')
    <div class="card">
        <div class="row no-gutters">
            <aside class="col-md-6">
                <article class="gallery-wrap">
                    <div class="img-big-wrap">
                        <div>
                            <a href="#"><img src="{{ asset('images/' . '/' . $product['image']) }}" alt="" /></a>
                        </div>
                    </div>
                </article>
            </aside>
            <main class="col-md-6 border-left">
                <article class="content-body">
                    <h2 class="title">{{ $product['product_name'] }}</h2>
                    <div class="my-4">
                        <var class="price h4">${{ $product['price'] }}</var>
                    </div>
                    <p>{!! $product['article'] !!}</p>
                    <hr />
                    <p>
                        @if (!Cart::get($product['id']))
                            <a data-id="{{ $product['id'] }}" href="#" class="btn btn-outline-primary add-to-cart-btn"><span
                                    class="text">Add to cart</span></a>
                        @else
                            <a class="btn btn-primary disabled" disabled="disabled">In Cart</a>
                            <a href="{{ url('shop/checkout') }}" class="btn btn-outline-primary"><span
                                    class="text">Checkout</span></a>
                        @endif
                    </p>
                </article>
            </main>
        </div>
    </div>
@endsection
