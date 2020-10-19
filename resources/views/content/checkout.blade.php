@extends('master') @section('main_content')

    <section class="section-pagetop bg">
        <div class="container">
            <h2 class="title-page">Shopping cart</h2>
        </div>
    </section>

    @if ($cart)
        <div class="container">
            <div class="row" style="height: 850px">
                <main class="col-md-12 mt-2">
                    <div class="card">
                        <table class="table table-borderless table-shopping-cart">
                            <thead class="text-muted">
                                <tr class="small text-uppercase">
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right" width="200"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td>
                                            <figure class="itemside">
                                                <div class="aside">
                                                    <img src="{{ asset('images/' . $item['attributes']['image']) }}"
                                                        class="img-md" />
                                                </div>
                                                <figcaption class="info">
                                                    <a href="#" class="title text-dark">{{ $item['name'] }}</a>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <div class="input-group mb-3 input-spinner">
                                                <div class="input-group-prepend">
                                                    <input data-id="{{ $item['id'] }}" class="btn btn-light update-cart"
                                                        type="button" value="-" />
                                                </div>
                                                <input type=" text" class="form-control" value="{{ $item['quantity'] }}" />
                                                <div class="input-group-append">
                                                    <input data-id="{{ $item['id'] }}" class="btn btn-light update-cart"
                                                        type="button" value="+" />
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <div class="price">${{ $item['price'] * $item['quantity'] }}</div>
                                                <small class="text-muted"> ${{ $item['price'] }} each </small>
                                            </div>
                                        </td>

                                        <td class="text-right">
                                            <a href="{{ url('shop/remove-item/' . $item['id']) }}" class="btn btn-light">
                                                Remove</a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>

                        <div class="card-body border-top">
                            <a href="{{ url('shop/order') }}" class="btn btn-primary float-md-right">
                                Make Purchase <i class="fa fa-chevron-right"></i>
                            </a>

                            <a href="{{ url('') }}" class="btn btn-secondary">
                                <i class="fa fa-chevron-left"></i> Continue shopping
                            </a>
                            <a href="{{ url('shop/clear-cart') }}" class="btn btn-dark">
                                Clear Cart
                            </a>
                        </div>
                    </div>

                </main>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <article class="border-top border-bottom">
                                        <dl class="row mt-2">
                                            <dt class="col-sm-10 mt-2">Total:</dt>
                                            <dd class="col-sm-2 text-right mt-2"><strong
                                                    class="h5 text-dark">${{ Cart::getTotal() }}</strong></dd>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-12">
                    <p class="h5">No Products Found in Cart</p>
                </div>
            </div>
        </div>

    @endif
@endsection
