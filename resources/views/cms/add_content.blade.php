@extends('cms.cms_master') @section('cms_content')

    <div class="row">
        <div class="col-md-12 m-auto">
            <section class="section-content padding-y">
                <div class="card mx-auto">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Add new content</h4>
                        <form action="{{ url('cms/content') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="menu-link">Menu Link:</label>
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value="">Choose menu link...</option>
                                    @foreach ($menu as $item)
                                        <option @if (old('menu_id') == $item['id'])
                                            selected='selected'
                                    @endif value="{{ $item['id'] }}">{{ $item['link'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" id="title" class="form-control" placeholder="Title" type="text"
                                    value="{{ old('title') }}" />
                            </div>
                            <div class="form-group">
                                <label for="article">Article</label>
                                <textarea name="article" id="article" class="form-control" placeholder="Article"
                                    type="text">{{ old('article') }}</textarea>
                            </div>
                            <div class="form-group">
                                <a href="{{ url('cms/content') }}" class="btn btn-primary btn-block">
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
