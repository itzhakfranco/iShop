@extends('cms.cms_master') @section('cms_content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
            <div class="card mb-3">
                <div class="card-header">
                    <span class="float-right"><a href="{{ url('cms/users/create') }}" class="btn btn-primary btn-sm"><i
                                class="fas fa-plus"></i> Add New User</a></span>
                    <h3><i class="far fa-file-alt"></i> Users</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th class="text-center"> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->role_name }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('cms/users/' . $user->id . '/edit') }}"
                                                class="btn btn-primary mx-2"><i class="far fa-edit"></i> Edit</a>
                                            <button type="button" data-toggle="modal"
                                                data-target="{{ '#delete_confirmation_' . $user->id }}"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ 'delete_confirmation_' . $user->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Delete User Confirmation
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ 'Are you sure you want to delete ' . $user->name . ' ?' }}
                                                    <p></p>
                                                </div>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}

                                                    <div class="modal-footer">
                                                        <a href="{{ url('cms/users') }}" class="btn btn-secondary"
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
            </div>
        </div>
    </div>

@endsection
