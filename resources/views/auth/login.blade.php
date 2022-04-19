@extends('layouts.app_login')

@section('content')
<div class="container-fluid">
    <div class="row no-gutter">


        <div class="col-md-12 col-lg-12">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-lg-4 mx-auto">
                            <h3 class="login-heading mb-4">Bienvenido! por favor ingresa tus credenciales de acceso</h3>
                            <form autocomplete="off"  method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-label-group">
                                    <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="inputEmail">Correo electrónico</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-label-group">

                                    <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="current-password">
                                    <label for="inputPassword">Contraseña</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Ingresar</button>
                                <div class="text-center">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection