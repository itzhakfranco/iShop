@extends('cms.cms_master') @section('cms_content')

    <div class="row">
        <div class="col-md-12 m-auto">
            <section class="section-content padding-y">
                <div class="card mx-auto">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit content</h4>
                        <form action="{{ url('cms/content/' . $content['id']) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="menu-link">Menu Link:</label>
                                <select name="menu_id" id="menu_id" class="form-control">

                                    @foreach ($menu as $item)
                                        <option @if ($content['menu_id'] == $item['id'])
                                            selected='selected'
                                    @endif value="{{ $item['id'] }}">{{ $item['link'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" id="title" class="form-control" placeholder="Title" type="text"
                                    value="{{ $content['title'] }}" />
                            </div>
                            <div class="form-group">
                                <label for="article">Article</label>
                                <textarea name="article" id="article" class="form-control" placeholder="Article"
                                    type="text">{{ $content['article'] }}</textarea>
                            </div>


                            <div class="form-group">
                                <a href="{{ url('cms/content') }}" class="btn btn-primary btn-block">
                                    Cancel
                                </a>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


            </section>
        </div>
    </div>
@endsection
