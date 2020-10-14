@extends('master')
@section('main_content')

    <section class="section-content">
        <div class="container">

            <header class="section-heading">
                <h3 class="section-title">Popular products</h3>
            </header>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 col-sm-6">
                        <a href="{{ url('/shop/' . strtolower($product->cat_name) . '/' . $product->url) }}">

                            <figure class="card card-product-grid">

                                <div class="img-wrap"> <img src="{{ asset('images/' . $product->image) }}"> </div>
                                <figcaption class="info-wrap border-top">
                                    <a href="#" class="title">{{ $product->product_name }}</a>
                                    <div class="price mt-2">${{ $product->price }}</div>
                                    <div class="fit-height mt-3">
                                        @if (!Cart::get($product->id))

                                            <a data-id="{{ $product->id }}" href="#"
                                                class="btn  btn-outline-primary add-to-cart-btn">
                                                <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-primary disabled" disabled='disabled'>In Cart</a>
                        </a>
                        <a href="{{ url('shop/checkout') }}" class="btn  btn-outline-primary"> <span
                                class="text">Checkout</span> <i class="fas fa-shopping-cart"></i>
                        </a>

                @endif
                <a href="{{ url('shop' . '/' . strtolower($product->cat_name) . '/' . $product->url) }}"
                    class="btn btn-outline-primary mt-3">
                    Details </a>
                </p>
            </div>
            </figcaption>
            </figure>
            </a>
        </div>
        @endforeach
        </div>

        </div>
    </section>


@endsection
