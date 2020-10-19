@extends('cms.cms_master') @section('cms_content')

    <div class="row">
        <div class="col-md-4 m-auto">
            <section class="section-content padding-y">
                <div class="card mx-auto">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit menu </h4>
                        <form action="{{ url('cms/menu/' . $menu['id']) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="hidden" name="item_id" value="{{ $menu['id'] }}">
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input name="link" id="link" class="form-control origin-text" placeholder="Link" type="text"
                                    value="{{ $menu['link'] }}" />
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="mtitle" id="title" class="form-control" placeholder="Title" type="text"
                                    value="{{ $menu['mtitle'] }}" />
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input name="url" id="url" class="form-control target-text" placeholder="URL" type="text"
                                    value="{{ $menu['url'] }}" />
                            </div>
                            <div class="form-group">
                                <a href="{{ url('cms/menu') }}" class="btn btn-primary btn-block">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
