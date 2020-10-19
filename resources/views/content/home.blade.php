@extends('master') @section('main_content')
    <section class="section-content">
        <div class="container">
            <header class="section-heading">
                <h3 class="section-title">Popular products</h3>
            </header>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4">
                    <figure class="card card-product-grid">
                        <div class="img-wrap">
                            <img src="{{ asset('images/' . $product->image) }}" alt="'" />
                            <a class="btn-overlay"
                                href="{{ url('shop' . '/' . $product->cat_url . '/' . $product->url) }}">Quick view</a>
                        </div>
                        <figcaption class="info-wrap">
                            <div class="fix-height">
                                <a href="#" class="title">{{ $product->product_name }}</a>
                                <div class="price-wrap mt-2">
                                    <span class="price">${{ $product->price }}</span>
                                </div>
                            </div>
                            <div class="fit-height">
                                @if (!Cart::get($product->id))
                                    <a data-id="{{ $product->id }}" href="#"
                                        class="btn btn-outline-primary add-to-cart-btn"><span class="text">Add
                                            to cart</span></a>
                                @else
                                    <a class="btn btn-primary disabled" disabled="disabled">In Cart</a>
                                    <a href="{{ url('shop/checkout') }}" class="btn btn-outline-primary"><span
                                            class="text">Checkout</span></a>
                                @endif
                                <a href="{{ url('shop' . '/' . $product->cat_url . '/' . $product->url) }}"
                                    class="btn btn-outline-primary">Details</a>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
            </div>
        </div>
    </section>
@endsection
