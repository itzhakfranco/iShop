@extends('cms.cms_master') @section('cms_content')

    <div class="row">
        <div class="col-md-10 m-auto">
            <section class="section-content padding-y">
                <div class="card mx-auto">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Add new Product</h4>
                        <form action="{{ url('cms/products') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="categorie-id">Category</label>
                                <select name="categorie_id" id="categorie_id" class="form-control">
                                    <option value="">Choose Category...</option>
                                    @foreach ($categories as $category)
                                        <option @if (old('categorie_id') == $category['id'])
                                            selected="selected"
                                    @endif value="{{ $category['id'] }}">{{ $category['cat_name'] }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
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
                                <label for="price">Price</label>
                                <input name="price" id="price" class="form-control" placeholder="Price" type="text"
                                    value="{{ old('price') }}" />
                            </div>
                            <div class="form-group">
                                <label for="article">Description</label>
                                <textarea name="article" id="description" class="form-control" placeholder="Description"
                                    type="text">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Image</label>
                                <input name="image" id="image" class="form-control" placeholder="Image" type="file" />
                            </div>
                            <div class="form-group">
                                <a href="{{ url('cms/products') }}" class="btn btn-primary btn-block">
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
