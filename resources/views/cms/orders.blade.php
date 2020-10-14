@extends('cms.cms_master') @section('cms_content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h3><i class="far fa-file-alt"></i> Orders</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th class="text-center">Order Details</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>
                                            <ul>
                                                @foreach (unserialize($order->data) as $item)
                                                    <li>
                                                        {{ $item['name'] }}, Price: {{ $item['price'] }},
                                                        Quantity:{{ $item['quantity'] }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>${{ $order->total }}</td>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
