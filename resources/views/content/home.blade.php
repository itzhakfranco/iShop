@extends('master') @section('main_content')
    <section class="section-content">
        <section class="section-pagetop bg shadow-sm">
            <div class="container">
                <h2 class="title-page">Featured Products</h2>
            </div>
        </section>
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    @if ($products_count >= 1)
                        <header class="border-bottom mb-4 pb-3">
                            <div class="form-inline">
                                <span class="mr-md-auto">{{ $products_count }} Items found </span>
                                <div class="btn-group mr-2" role="group">
                                    <a href="{{ Request::get('view') ? url()->full() . '&sort=high_low' : '?sort=high_low' }}"
                                        class="btn btn-sm btn-outline-primary {{ $sort_by == 'high_low' ? 'active' : '' }}">High
                                        To Low</a>
                                    <a href="{{ Request::get('view') ? url()->full() . '&sort=low_high' : '?sort=low_high' }}"
                                        class="btn btn-sm btn-outline-primary {{ $sort_by == 'low_high' ? 'active' : '' }}">Low
                                        To High</a>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ Request::get('sort') ? url()->full() . '&view=list' : '?view=list' }}"
                                        class="btn btn-sm btn-outline-primary {{ $view == 'list' ? 'active' : '' }}"
                                        data-toggle="tooltip" title="" data-original-title="List view">
                                        <i class="fa fa-bars"></i></a>
                                    <a href="{{ Request::get('sort') ? url()->full() . '&view=grid' : '?view=grid' }}"
                                        class="btn btn-sm btn-outline-primary {{ $view == 'grid' ? 'active' : '' }}"
                                        data-toggle="tooltip" title="" data-original-title="Grid view">
                                        <i class="fa fa-th"></i></a>
                                </div>

                            </div>
                        </header>
                    @elseif($products_count == 0)
                        <h1>No products Found</h1>
                    @endif
                </div>
            </div>

            @if ($view == 'grid')
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="'" />
                                    <a class="btn-overlay"
                                        href="{{ url('shop' . '/' . $product->cat_url . '/' . $product->url) }}">Quick
                                        view</a>
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

            @elseif($view == 'list')
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($products as $product)
                            <article class="card card-product-list">
                                <div class="row no-gutters">
                                    <aside class="col-md-3">
                                        <img style="width: 225px" src="{{ asset('images/' . $product->image) }}"
                                            alt="{{ $product->product_name }}" />
                                    </aside>
                                    <div class="col-md-6">
                                        <div class="info-main">
                                            <a href="#" class="h5 title">{{ $product->product_name }}</a>
                                            <p>{{ $product->article }}</p>
                                        </div>
                                    </div>
                                    <aside class="col-sm-3">
                                        <div class="info-aside">
                                            <div class="price-wrap mb-3">
                                                <span class="price h5"> ${{ $product->price }} </span>
                                            </div>
                                            <p>
                                                <a href="http://localhost:8888/iShop/public/shop/electronics/headphones"
                                                    class="btn btn-primary btn-block mb-3"> Details </a>

                                                <a class="btn btn-dark btn-block disabled" disabled="disabled">In
                                                    Cart</a>
                                                <a href="http://localhost:8888/iShop/public/shop/checkout"
                                                    class="btn btn-success btn-block"><i
                                                        class="fas fa-shopping-cart"></i><span
                                                        class="text">Checkout</span></a>
                                            </p>
                                        </div>
                                    </aside>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        </div>
    </section>
@endsection
