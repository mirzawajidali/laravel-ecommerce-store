@extends('admin.auth.auth-layout')
@section('auth-content')
{{-- Main Section Start --}}
<!-- start: page -->
<!-- Begin page -->
<div class="accountbg"></div>
<div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-white"><i class="fas fa-home h2"></i></a>
    </div>
<div class="wrapper-page">
        <div class="card card-pages shadow-none">
            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="{{ asset('public/admin/assets/images/logo-dark.png')}}" alt="" height="24"></a>
                </div>
                <h5 class="font-18 text-center">Sign in to continue to Dashboard.</h5>
                <div id="alert"></div>
                <form id="login_form">
                    @csrf
                    <div class="form-group">
                        <div class="col-12">
                                <label>Username</label>
                            <input class="form-control" id="username" type="text" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                                <label>Password</label>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                    <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"> Remember me</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary btn-block btn-lg waves-effect waves-light" id="login_btn" value="Login">
                        </div>
                    </div>
                    <div class="form-group row m-t-30 m-b-0">
                        <div class="col-sm-7">
                            <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 text-right">
                            <a href="pages-register.html" class="text-muted">Create an account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- END wrapper -->
@endsection
@section('script')
<script>
    $(function(){
        $('#login_form').submit(function(e){
            e.preventDefault();
            $("#login_btn").val('Wait...');
            //Ajax
            $.ajax({
                url: '{{ route('user_login') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(res){
                    if(res.status === '404'){
                        showError('username', res.message.username);
                        showError('password', res.message.password);
                        $("#login_form")[0].reset();
                        $("#login_btn").val('Login');
                    }else if(res.status === '500'){
                        $("#alert").html(showMessage('danger', res.message));
                        $("#login_btn").val('Login');
                        $("#login_form")[0].reset();
                    }else if(res.status === '200'){
                        $('#login_form')[0].reset();
                        $('#login_btn').val('Login');
                        window.location = '{{ route('dashboard') }}';
                    }
                }
            });
        });
    });
</script>
@endsection
