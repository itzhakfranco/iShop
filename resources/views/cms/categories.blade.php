@extends('cms.cms_master')
@section('cms_content')
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">

            <div class="card mb-3">

                <div class="card-header">
                    <span class="float-right"><a href="{{ url('cms/categories/create') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-plus"></i> Add New Category</a></span>
                    <h3><i class="far fa-file-alt"></i> Categories</h3>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">URL</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category['cat_name'] }}</td>
                                        <td class="text-center">{!! $category['description'] !!}</td>
                                        <td class="text-center">{{ $category['url'] }}</td>

                                        <td class="text-center">
                                            <a href="{{ url('cms/categories/' . $category['id'] . '/edit') }}"
                                                class="btn btn-primary btn-block btn-sm"><i class="far fa-edit"></i>
                                                Edit</a>
                                            <button type="button" data-toggle="modal"
                                                data-target="{{ '#delete_confirmation_' . $category['id'] }}"
                                                class="btn btn-danger btn-block btn-sm"><i class="fas fa-trash"></i>
                                                Delete</button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ 'delete_confirmation_' . $category['id'] }}"
                                        tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Product
                                                        Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ 'Are you sure you want to delete ' . $category['cat_name'] . ' ?' }}
                                                    <p></p>
                                                </div>
                                                <form action="{{ route('categories.destroy', $category['id']) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <div class="modal-footer">
                                                        <a href="{{ url('cms/categories') }}" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</a>
                                                        <button type="submit" class="btn btn-primary">Delete</button>
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
