@extends('cms.cms_master') @section('cms_content')

    <div class="row">
        <div class="col-md-8">
            <section class="section-content padding-y">
                <div class="card mx-auto">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title d-flex mb-4">Edit Product</h4>
                            </div>
                            <div class="col-md-6">

                                <a class="btn btn-dark btn-sm float-right"
                                    href="{{ url('/shop/' . $product->cat_url . '/' . $product->url) }}" target="_blank">
                                    <i class="fas fa-binoculars mr-1"></i> View Product
                                </a>
                            </div>
                        </div>
                        <form action="{{ url('cms/products/' . $product->id) }}" method="POST"
                            enctype="multipart/form-data">

                            {{ csrf_field() }} {{ method_field('PUT') }}

                            <input type="hidden" name="item_id" value="{{ $product->id }}" />

                            <div class="form-group">
                                <label for="categorie-id">Category</label>

                                <select name="categorie_id" id="categorie_id" class="form-control">

                                    @foreach ($categories as $category)
                                        <option @if ($product->categorie_id == $category['id'])
                                            selected="selected"
                                    @endif value="{{ $category['id'] }}" >{{ $category['cat_name'] }}
                                    </option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" id="title" class="form-control origin-text" placeholder="Title"
                                    type="text" value="{{ $product->product_name }}" />
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input name="url" id="url" class="form-control target-text" placeholder="URL" type="text"
                                    value="{{ $product->url }}" />
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input name="price" id="price" class="form-control" placeholder="Price" type="text"
                                    value="{{ $product->price }}" />
                            </div>
                            <div class="form-group">
                                <label for="article">Description</label>
                                <textarea name="article" id="article" class="article form-control" placeholder="Article"
                                    type="text">
                                {{ $product->article }}</textarea>
                            </div>


                            <div class="form-group">
                                <a href="{{ url('cms/products') }}" class="btn btn-primary btn-block">
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
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
            <div class="card mb-3 mt-4">
                <div class="card-header">
                    <h3><i class="far fa-file-image"></i> Avatar</h3>
                </div>

                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <img width="300" id="previewImg" alt="avatar" class="img-fluid"
                                src="{{ asset('images/' . $product->image) }}" />
                        </div>
                    </div>
                    <form action="{{ url('cms/product/' . $product->id . '/update/image') }}" method="POST"
                        enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <label for="image" class="btn btn-dark btn-block mt-2">Upload
                                    Image</label>
                                <input accept="image/jpeg,image/gif,image/pjpeg,image/png,image/bmp" hidden type="file"
                                    name="image" id="image" class="form-control-file" onchange="previewFile()" />
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-block save-image" disabled="disabled">Save
                                    Image</button>
                            </div>
                    </form>
                    <div class="col-lg-12">
                        <form action="">
                            <button type="button" data-toggle="modal"
                                data-target="{{ '#delete_confirmation_' . $product->id }}"
                                class="btn btn-danger btn-block mt-2">
                                Delete Image
                            </button>

                    </div>
                    </form>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="{{ 'delete_confirmation_' . $product->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Profile Avatar
                                Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ 'Are you sure you want your Avatar?' }}
                            <p></p>
                        </div>
                        <form action="{{ url('user/profile/' . $product->id . '/update/image') }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div class="modal-footer">
                                <a href="{{ url('user/profile') }}" class="btn btn-secondary"
                                    data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    @endsection
