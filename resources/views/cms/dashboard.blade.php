@extends('cms.cms_master') @section('cms_content')

    <div class="row">
        <div class="col-lg-12">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-danger">
                <i class="far fa-user float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Users</h6>
                <h1 class="m-b-20 text-white counter">{{ $users }}</h1>
                <a href="{{ url('cms/users') }}"><span class="text-white">View Users</span></a>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-warning">
                <i class="fas fa-shopping-cart float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Orders</h6>
                <h1 class="m-b-20 text-white counter">{{ $orders }}</h1>
                <a href="{{ url('cms/orders') }}"><span class="text-white">View Orders</span></a>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-info">
                <i class="far fa-envelope float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Products</h6>
                <h1 class="m-b-20 text-white counter">{{ $products }}</h1>
                <a href="{{ url('cms/products') }}"><span class="text-white">View Products</span></a>
            </div>
        </div>
    </div>
@endsection
