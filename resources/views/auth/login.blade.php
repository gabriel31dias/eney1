@extends('layouts.app')
@section('content')
<body class="login-page">
   <div class="login-box">
      <div class="logo">
         <a href="javascript:void(0);">Versátle<b>ERP</b></a>
         <small>Admin login</small>
      </div>
      <div class="card">
         <div class="body">
            <form method="POST" action="{{ route('login') }}">
               @csrf
               <div class="msg">Entre no sistema</div>
               <div class="input-group">
                  <span class="input-group-addon">
                  <i class="material-icons">call_to_action</i>
                  </span>
                  <div class="form-line">
                     <input  type="text" placeholder="Cnpj" class="form-control "  value="" required="" autocomplete="email" autofocus="">
                  </div>
               </div>
               <div class="input-group">
                  <span class="input-group-addon">
                  <i class="material-icons">person</i>
                  </span>
                  <div class="form-line">
                     <input id="email" type="text" placeholder="Login" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  </div>
               </div>
               <div class="input-group">
                  <span class="input-group-addon">
                  <i class="material-icons">lock</i>
                  </span>
                  <div class="form-line">
                     <input id="password"  placeholder="Senha" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-8 p-t-5">
                     <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                     <label for="rememberme">Lembrar senha</label>
                  </div>
                  <div class="col-xs-4">
                     <button class="btn btn-block bg-pink waves-effect" type="submit"> {{ __('Login') }}</button>
                  </div>
               </div>
               <div class="row m-t-15 m-b--20">
                  <div class="col-xs-6">
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
                  <div class="col-xs-6 align-right">
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   @endsection