@extends('client.layouts.app')


@section('main')

<div class="register-area" style="background-color: rgb(249, 249, 249);">
    <div class="container">

        <div class="col-md-6">
            <div class="box-for overflow">
                <div class="col-md-12 col-xs-12 register-blocks">
                    <h2>New account : </h2> 
                     @include('component.alertnotification')
                    <form action="{{ route('client.register') }}" method="post" enctype="multipart/form-data">
                          @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email"  class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" >
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-default">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box-for overflow">                         
                <div class="col-md-12 col-xs-12 login-blocks">
                    <h2>Login : </h2> 
                     @include('component.alertnotification')
                    <form method="POST" action="{{ route('client.submit') }}" enctype="multipart/form-data">
                          @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-default"> Log in</button>
                        </div>
                    </form>
                    <br>
                    
                    <h2>Social login :  </h2> 
                    
                    <p>
                    {{-- <a class="login-social" href="#"><i class="fa fa-facebook"></i>&nbsp;Facebook</a>  --}}
                    {{-- <a class="login-social" href="#"><i class="fa fa-google-plus"></i>&nbsp;Gmail</a>  --}}
                    <a class="login-social" href="#"><i class="fa fa-windows"></i>&nbsp;Microsoft</a>  
                    </p> 
                </div>
                
            </div>
        </div>

    </div>
</div>      




@endsection