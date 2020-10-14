@extends('master')
@section('main_content')
    <section class="section-content">

        <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
            <article class="card-body">
                <header class="mb-4">
                    <h4 class="card-title">Sign up</h4>
                </header>
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Name">
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" placeholder="">
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <input name="location" type="text" class="form-control" placeholder="">
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Create password</label>
                            <input name="password" class="form-control" type="password" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Repeat password</label>
                            <input name="password_confirmation" class="form-control" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Register </button>
                    </div>

                </form>
            </article>
        </div>
        <p class="text-center mt-4">Have an account? <a href="{{ asset('user/signin') }}">Log In</a></p>
        <br><br>
        <!-- ============================ COMPONENT REGISTER  END.// ================================= -->


    </section>
@endsection
