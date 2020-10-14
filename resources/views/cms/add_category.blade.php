@extends('cms.cms_master') @section('cms_content')

    <div class="row">
        <div class="col-md-10 m-auto">
            <section class="section-content padding-y">
                <div class="card mx-auto">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Add new Category</h4>
                        <form action="{{ url('cms/categories') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" id="title" class="form-control origin-text" placeholder="Title"
                                    type="text" value="{{ old('title') }}" />
                            </div>

                            <div class="form-group">
                                <label for="url">URL</label>
                                <input name="url" id="url" class="form-control target-text target-text" placeholder="URL"
                                    type="text" value="{{ old('url') }}" />
                            </div>
                            <div class="form-group">
                                <label for="article">Description</label>
                                <textarea name="description" id="article" class="form-control" placeholder="Article"
                                    type="text">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <a href="{{ url('cms/categories') }}" class="btn btn-primary btn-block">
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
