@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-xl-7 order-1"><img class="bg-img-cover bg-center" src="https://www.femina.co.id/images/images/water%20dalam.jpg" alt="looginpage"></div>
      <div class="col-xl-5 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo text-start" href=""><img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="looginpage"></a></div>
               <div class="login-main">
                  <form class="theme-form needs-validation" novalidate="" method="POST" action="{{ route('login') }}">
                    @csrf
                     <h4>Selamat Datang!</h4>
                     <p>Silakan masukkan username dan password Anda!</p>
                     <div class="form-group">
                        <label class="col-form-label">Username</label>
                        {{-- <input class="form-control" id="username" type="text" @error('username') is-invalid @enderror name="username" value="{{ old('username') }}" required autofocus> --}}
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required="" autofocus placeholder="Username">
                        @error('username')
                        <div class="invalid-feedback">
                            <strong>{{$message ?: 'Masukkan username anda'}}</strong>
                        </div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                        <div class="invalid-feedback">
                            <strong>Masukkan password anda.</strong>
                        </div>
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox">
                           <label class="text-muted" name="remember" id="remember_me" >Remember me</label>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                     </div>
                
                     <script>
                        (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                        }, false);
                        });
                        }, false);
                        })();
                        
                     </script>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')
@endsection