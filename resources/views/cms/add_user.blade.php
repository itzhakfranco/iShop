@extends('cms.cms_master') @section('cms_content')

    <div class="container">
        <form action="{{ url('cms/users') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group my-3">
                        <h5>Add new user</h5>
                    </div>
                    <div class="form-group">
                        <label>Full name (required)</label>
                        <input value="{{ old('name') }}" class="form-control" name="name" type="text" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Valid Email (required)</label>
                        <input value="{{ old('email') }}" class="form-control" name="email" type="email" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Password (required)</label>
                        <input class="form-control" name="password" type="password" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role_id" class="form-control">
                            <option value="">Select...</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group float-right mt-2">
                        <a href="{{ url('cms/users') }}" class="btn btn-dark mr-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Add user</button>
                    </div>
                </div>
            </div>


        </form>
    </div>

@endsection
