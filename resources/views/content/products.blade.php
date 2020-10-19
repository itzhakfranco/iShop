@extends('master') @section('main_content')
    <section class="section-pagetop bg">
        <div class="container">
            <h2 class="title-page">{{ $title }}</h2>
        </div>
    </section>
    <section class="section-content padding-y">
        <div class="container">
            <div class="row">
                <aside class="col-md-3">
                    <div class="card">
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                                    <h6 class="title">Categories</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_1" style="">
                                <div class="card-body">
                                    <ul class="list-menu">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a
                                                    href="{{ url('') . '/shop/' . $category['url'] }}">{{ $category['cat_name'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                </aside>
                <main class="col-md-9">
                    @if (count($products) > 1)
                        <header class="border-bottom mb-4 pb-3">
                            <div class="form-inline">
                                <div class="btn-group" role="group">
                                    <a href="{{ Request::url() . '?sort=high_low' }}"
                                        class="btn btn-sm btn-outline-primary {{ $sort_by == 'high_low' ? ' active' : '' }}">High
                                        To Low</a>
                                    <a href="{{ Request::url() . '?sort=low_high' }}"
                                        class="btn btn-sm btn-outline-primary {{ $sort_by == 'low_high' ? ' active' : '' }}">Low
                                        To High</a>
                                </div>
                            </div>
                        </header>
                    @elseif(count($products) == 0)
                        <h1>No products Found</h1>
                    @endif
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4">
                                <figure class="card card-product-grid">
                                    <div class="img-wrap">
                                        <img src="{{ asset('images/' . $product['image']) }}" alt="'" />
                                        <a class="btn-overlay"
                                            href="{{ url('shop' . '/' . $cat_url . '/' . $product['url']) }}">Quick view</a>
                                    </div>
                                    <figcaption class="info-wrap">
                                        <div class="fix-height">
                                            <a href="#" class="title">{{ $product['product_name'] }}</a>
                                            <div class="price-wrap mt-2">
                                                <span class="price">${{ $product['price'] }}</span>
                                            </div>
                                        </div>
                                        <div class="fit-height">
                                            @if (!Cart::get($product['id']))
                                                <a data-id="{{ $product['id'] }}" href="#"
                                                    class="btn btn-outline-primary add-to-cart-btn"><span class="text">Add
                                                        to cart</span></a>
                                            @else
                                                <a class="btn btn-primary disabled" disabled="disabled">In Cart</a>
                                                <a href="{{ url('shop/checkout') }}" class="btn btn-outline-primary"><span
                                                        class="text">Checkout</span></a>
                                            @endif
                                            <a href="{{ url('shop' . '/' . $cat_url . '/' . $product['url']) }}"
                                                class="btn btn-outline-primary">Details</a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection
