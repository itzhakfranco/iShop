@extends('master') @section('main_content')
    <div class="container-fluid">
        <section class="section-pagetop bg shadow-sm">
            <div class="container">
                <h2 class="title-page">{{ $title }}</h2>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="row mt-4">
            <aside class="col-md-3">
                <div class="card">
                    <article class="filter-group">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                                <i class="icon-control fa fa-chevron-down"></i>
                                <h6 class="title">Categories</h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_1" style="">
                            <div class="card-body">
                                <ul class="list-menu">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ url('') . '/shop/' . $category['url'] }}">{{ $category['cat_name'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </article>
                </div>
            </aside>
            <main class="col-md-9">
                @if ($product_counts > 0)
                    <header class="border-bottom mb-4 pb-3">
                        <div class="form-inline">
                            <span class="mr-md-auto">{{ $product_counts }} Items found </span>
                            @if ($product_counts !== 1)
                                <div class="btn-group" role="group">
                                    <a href="http://localhost:8888/iShop/public/shop/fashion?sort=high_low"
                                        class="btn btn-sm btn-outline-primary">High To Low</a>
                                    <a href="http://localhost:8888/iShop/public/shop/fashion?sort=low_high"
                                        class="btn btn-sm btn-outline-primary active">Low To High</a>
                                </div>
                            @endif
                        </div>
                    </header>
                @else
                    <h1>No products Found</h1>
                @endif

                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <figure class="card card-product-grid">
                                <div class="img-wrap">
                                    <img src="{{ asset('images') . '/' . $product->image }}" />
                                    <a class="btn-overlay"
                                        href="{{ url('shop' . '/' . $product->cat_url . '/' . $product->url) }}"><i
                                            class="fa fa-search-plus"></i> Quick view</a>
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
                                                class="btn btn-outline-primary add-to-cart-btn">
                                                <span class="text">Add to cart</span>
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-primary disabled" disabled="disabled">In Cart</a>

                                            <a href="{{ url('shop/checkout') }}" class="btn btn-outline-primary">
                                                <span class="text">Checkout</span>
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>

                                        @endif
                                        <a href="{{ url('shop' . '/' . $product->cat_url . '/' . $product->url) }}"
                                            class="btn btn-outline-primary">
                                            Details
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>

@endsection
