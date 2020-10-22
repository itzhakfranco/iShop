@extends('master') @section('main_content')
    <section class="section-pagetop bg shadow-sm">
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
                    @if ($view == 'grid')
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4">
                                    <figure class="card card-product-grid">
                                        <div class="img-wrap">
                                            <img src="{{ asset('images/' . $product['image']) }}" alt="'" />
                                            <a class="btn-overlay"
                                                href="{{ url('shop' . '/' . $cat_url . '/' . $product['url']) }}">Quick
                                                view</a>
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
                                                        class="btn btn-outline-primary add-to-cart-btn"><span
                                                            class="text">Add
                                                            to cart</span></a>
                                                @else
                                                    <a class="btn btn-primary disabled mr-2" disabled="disabled">In
                                                        Cart</a>
                                                    <a href="{{ url('shop/checkout') }}"
                                                        class="btn btn-outline-primary"><span
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
                    @elseif($view == 'list')
                        @foreach ($products as $product)
                            <article class="card card-product-list">
                                <div class="row no-gutters">
                                    <aside class="col-md-3">
                                        <img style="width: 225px" src="{{ asset('images/' . $product['image']) }}"
                                            alt="'" />
                                    </aside>
                                    <div class="col-md-6">
                                        <div class="info-main">
                                            <a href="#" class="h5 title">{{ $product['product_name'] }}</a>
                                            <p>{!! $product['article'] !!}</p>
                                        </div>
                                    </div>
                                    <aside class="col-sm-3">
                                        <div class="info-aside">
                                            <div class="price-wrap mb-3">
                                                <span class="price h5"> ${{ $product['price'] }} </span>
                                            </div>
                                            <p>
                                                <a href="{{ url('shop' . '/' . $cat_url . '/' . $product['url']) }}"
                                                    class="btn btn-primary btn-block mb-3"> Details </a>

                                                @if (!Cart::get($product['id']))
                                                    <a data-id="{{ $product['id'] }}" href="#"
                                                        class="btn btn-light btn-block add-to-cart-btn"><i
                                                            class="fas fa-shopping-cart"></i>
                                                        <span class="text">Add to Cart</span></a>
                                                @else
                                                    <a class="btn btn-dark btn-block disabled" disabled="disabled">In
                                                        Cart</a>
                                                    <a href="{{ url('shop/checkout') }}"
                                                        class="btn btn-success btn-block"><i
                                                            class="fas fa-shopping-cart"></i><span
                                                            class="text">Checkout</span></a>
                                                @endif
                                            </p>
                                        </div>
                                    </aside>
                                </div>
                            </article>
                        @endforeach
                    @endif
                </main>
            </div>
        </div>
    </section>
@endsection
