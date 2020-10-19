@extends('master') @section('main_content')
    <div class="row">
        <div class="col-md-4 m-auto">
            <section class="section-content padding-y">
                <div class="card mx-auto">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Sign in</h4>
                        <form action="" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input name="email" class="form-control" placeholder="Email" type="email"
                                    value="{{ old('email') }}" />
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control" placeholder="Password" type="password" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-4">
                    Don't have account? <a href="{{ asset('user/register') }}">Sign up</a>
                </p>
                <br /><br />
            </section>
        </div>
    </div>
@endsection
