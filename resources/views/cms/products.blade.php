@extends('cms.cms_master') @section('cms_content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
            <div class="card mb-3">
                <div class="card-header">
                    <span class="float-right"><a href="{{ url('cms/products/create') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-plus"></i> Add New Product</a></span>

                    <h3><i class="far fa-file-alt"></i> Products</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="">Image</th>
                                    <th style="">Name <div class="float-right">

                                            @if (Request::query('sortBy') && Request::query('orderBy') && Request::query('sortBy') == 'product_name' && Request::query('orderBy') == 'asc')
                                                <a href="{{ Request::url() . '?sortBy=product_name&orderBy=desc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>

                                            @elseif (Request::query('sortBy') && Request::query('orderBy') &&
                                                Request::query('sortBy') == 'product_name' && Request::query('orderBy') ==
                                                'desc')

                                                <a href="{{ Request::url() . '?sortBy=product_name&orderBy=asc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>

                                            @else
                                                <a href="{{ Request::url() . '?sortBy=product_name&orderBy=asc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>
                                            @endif

                                        </div>
                                    </th>
                                    <th style="">Posted By
                                        <div class="float-right">

                                            @if (Request::query('sortBy') && Request::query('orderBy') && Request::query('sortBy') == 'posted_by' && Request::query('orderBy') == 'asc')
                                                <a href="{{ Request::url() . '?sortBy=posted_by&orderBy=desc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>

                                            @elseif (Request::query('sortBy') && Request::query('orderBy') &&
                                                Request::query('sortBy') == 'posted_by' && Request::query('orderBy') ==
                                                'desc')

                                                <a href="{{ Request::url() . '?sortBy=posted_by&orderBy=asc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>

                                            @else
                                                <a href="{{ Request::url() . '?sortBy=posted_by&orderBy=asc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>
                                            @endif

                                        </div>


                                    </th>
                                    <th style="">Category

                                        <div class="float-right">

                                            @if (Request::query('sortBy') && Request::query('orderBy') && Request::query('sortBy') == 'cat_name' && Request::query('orderBy') == 'asc')
                                                <a href="{{ Request::url() . '?sortBy=cat_name&orderBy=desc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>

                                            @elseif (Request::query('sortBy') && Request::query('orderBy') &&
                                                Request::query('sortBy') == 'cat_name' && Request::query('orderBy') ==
                                                'desc')

                                                <a href="{{ Request::url() . '?sortBy=cat_name&orderBy=asc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>

                                            @else
                                                <a href="{{ Request::url() . '?sortBy=cat_name&orderBy=asc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>
                                            @endif

                                        </div>

                                    </th>
                                    <th style="width: 110px">
                                        Price
                                        <div class="float-right">

                                            @if (Request::query('sortBy') && Request::query('orderBy') && Request::query('sortBy') == 'price' && Request::query('orderBy') == 'asc')
                                                <a href="{{ Request::url() . '?sortBy=price&orderBy=desc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>

                                            @elseif (Request::query('sortBy') && Request::query('orderBy') &&
                                                Request::query('sortBy') == 'price' && Request::query('orderBy') ==
                                                'desc')

                                                <a href="{{ Request::url() . '?sortBy=price&orderBy=asc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>

                                            @else
                                                <a href="{{ Request::url() . '?sortBy=price&orderBy=asc' }}"
                                                    class="btn btn-sm btn-outline-primary"><i
                                                        class="fas fa-sort float-right"></i></a>
                                            @endif

                                        </div>
                                    </th>

                                    <th class="text-center" style="width: 110px">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <img width="200" class="img-fluid d-none d-lg-block" alt="image"
                                                src="{{ asset('images/' . $product->image) }}" />
                                        </td>
                                        <td>
                                            {{ $product->product_name }}
                                        </td>

                                        <td>
                                            {{ $product->posted_by }}
                                        </td>
                                        <td>{{ $product->cat_name }}</td>
                                        <td class="text-center">
                                            ${{ $product->price }}
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ url('cms/products/' . $product->id . '/edit') }}"
                                                class="btn btn-primary btn-block btn-sm"><i class="far fa-edit"></i>
                                                Edit</a>
                                            <button type="button" data-toggle="modal"
                                                data-target="{{ '#delete_confirmation_' . $product->id }}"
                                                class="btn btn-danger btn-block btn-sm mb-3">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>

                                            <input class="toggle-featured" type="checkbox" data-toggle="toggle"
                                                data-on="Featured" data-id="{{ $product->id }}" data-off="Not Featured"
                                                data-style="slow" data-onstyle="success" data-offstyle="secondary"
                                                {{ $product->featured == 1 ? 'checked' : '' }} />

                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ 'delete_confirmation_' . $product->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Delete Product Confirmation
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ 'Are you sure you want to delete' . $product->product_name . ' ?' }}
                                                    <p></p>
                                                </div>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}

                                                    <div class="modal-footer">
                                                        <a href="{{ url('cms/products') }}" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</a>
                                                        <button type="submit" class="btn btn-primary">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

@endsection
