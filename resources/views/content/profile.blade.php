@extends('master') @section('main_content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="far fa-user"></i> Profile details</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ url('user/profile/' . $user->id . '/edit') }}" method="POST">
                            {{ csrf_field() }} {{ method_field('PUT') }}
                            <input type="hidden" name="user_id" value="{{ $user->id }}" />

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Full name (required)</label>
                                        <input class="form-control" name="name" type="text" value="{{ $user->name }}" />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email (required)</label>
                                        <input class="form-control" name="email" type="email" value="{{ $user->email }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Location (required)</label>
                                        <input class="form-control" name="location" type="text"
                                            value="{{ $user->location }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-check-input password-checkbox" type="checkbox" id="gridCheck1" />
                                        <label class="form-check-label" for="gridCheck1">Change Password
                                        </label>

                                        <input class="form-control password-field mt-2" name="password" type="password"
                                            value="" disabled="disabled" />
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-lg-12">
                                    <hr />
                                    <button type="submit" class="btn btn-primary">
                                        Update profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="far fa-file-image"></i> Avatar</h3>
                    </div>

                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <img width="300" id="previewImg" alt="avatar" class="img-fluid"
                                    src="{{ asset('images/' . $user->avatar) }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <form action="{{ url('user/profile/' . $user->id . '/update/image') }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ method_field('POST') }} {{ csrf_field() }}
                                    <input type="hidden" name="user_id" value="{{ $user->id }}" />

                                    <div class="form-group">
                                        <label for="image" class="btn btn-dark btn-block update-image mt-2">Change
                                            avatar</label>
                                        <input accept="image/jpeg,image/gif,image/pjpeg,image/png,image/bmp" hidden
                                            type="file" name="image" id="image" class="form-control-file"
                                            onchange="previewFile()" />
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block" disabled="disabled">
                                            Update avatar
                                        </button>
                                    </div>
                                </form>
                                <div class="form-group">
                                    <button type="button" data-toggle="modal"
                                        data-target="{{ '#delete_confirmation_' . $user->id }}"
                                        class="btn btn-danger btn-block mt-2">
                                        Delete avatar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="{{ 'delete_confirmation_' . $user->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Delete Profile Avatar Confirmation
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ 'Are you sure you want your Avatar?' }}
                                        <p></p>
                                    </div>
                                    <form action="{{ url('user/profile/' . $user->id . '/update/image') }}" method="POST">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}

                                        <div class="modal-footer">
                                            <a href="{{ url('user/profile') }}" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</a>
                                            <button type="submit" class="btn btn-primary">
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fas fa-table"></i> Recent Orders</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>

                                        <th class="text-center">Order Details</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
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
</div>
