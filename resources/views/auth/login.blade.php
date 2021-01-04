@extends('layouts.login')
@section('content')

<form class="pt-3" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
      <label for="email">Correo electrónico</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="fa fa-user text-primary"></i>
          </span>
        </div>
        <input id="email" type="email" name="email" class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror" id="email" placeholder="Username" required>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>
    <div class="form-group">
      <label for="password">Contraseña</label>
      <div class="input-group">
        <div class="input-group-prepend bg-transparent">
          <span class="input-group-text bg-transparent border-right-0">
            <i class="fa fa-lock text-primary"></i>
          </span>
        </div>
        <input id="password" type="password" name="password" class="form-control form-control-lg border-left-0 @error('password') is-invalid @enderror" id="password" placeholder="Password" required>   
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror                  
      </div>
    </div>
    <div class="my-2 d-flex justify-content-between align-items-center">
      <div class="form-check">
        <label class="form-check-label text-muted">
          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input">
          Mantenerme registrado
        </label>
      </div>
      {{--  <a href="#" class="auth-link text-black">Forgot password?</a>  --}}
    </div>
    <div class="my-3">
      <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"type="submit">INICIAR SESIÓN</button>
    </div>
    
    {{--  <div class="text-center mt-4 font-weight-light">
      Dont have an account? <a href="register-2.html" class="text-primary">Create</a>
    </div>  --}}
  </form>
@endsection
