@extends('master') @section('main_content')

    <section class="section-pagetop bg">
        <div class="container">
            <h2 class="title-page">Shopping cart</h2>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <main class="col-md-12 mt-2">
                <div class="card">
                    @if ($cart)
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
            @else
                <h1>no products</h1>
                @endif
            </main>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <dl class="dlist-align">
                                    <dt>Total:</dt>
                                    <dd class="text-right h5">
                                        <strong>${{ Cart::getTotal() }}</strong>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
