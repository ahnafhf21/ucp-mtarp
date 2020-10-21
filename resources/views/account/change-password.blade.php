@extends('layouts.app')

@section('content')

  <div class="container">
    <br><br>
    <h3>Ganti Password</h3
    <hr>
    <div class="row">
      <div class="col-md-4">
        <ul>
          <li><a href="{{route('account.edit', $user->username)}}">Edit Profil</a></li>
          <li><a href="{{route('password.edit', $user->username)}}">Ganti Password</a></li>
        </ul>
      </div>
      <div class="col-md-8">
        <div class="card card-outline-secondary">
            <div class="card-block">
              <form class="form-horizontal" role="form" method="POST" action="{{route('password.update', $user->username)}}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                  <label for="current_password">Password</label>
                  <input id="current_password" type="password" class="form-control" name="current_password" required autofocus>
                  @if ($errors->has('current_password'))
                    <span class="help-block">
                     <strong>{{ $errors->first('current_password') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password">Password Baru</label>
                  <input id="password" type="password" class="form-control" name="password" required autofocus>
                  @if ($errors->has('password'))
                    <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  <label for="password_confirmation">Ulangi Password Baru</label>
                  <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autofocus>
                  @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                     <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                  @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection
