@extends('cms.cms_master') @section('cms_content')

    <div class="row">
        <div class="col-md-4 m-auto">
            <section class="section-content padding-y">
                <div class="card mx-auto">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Are you sure you want to delete this item</h4>
                        <form action="{{ url('cms/menu/' . $id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <div class="form-group">
                                <a href="{{ url('cms/menu') }}" class="btn btn-primary btn-block">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-danger btn-block">
                                    Delete
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </section>
        </div>
    </div>
@endsection
