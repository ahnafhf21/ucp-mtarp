@extends('layouts.app')

@section('content')

  <div class="container">
    <br><br>
    <h3>Ganti Email</h3>
    
    <hr>
    <div class="row">
      <div class="col-md-4">
        <ul>
          <li><a href="{{route('account.edit', $user->username)}}">Edit Profil</a></li>
          <li><a href="{{route('password.edit', $user->username)}}">Ganti Password</a></li>
          <li><a href="{{route('email.edit', $user->username)}}">Ganti Email</a></li>
        </ul>
      </div>
      <div class="col-md-8">
        <div class="card card-outline-secondary">
            <div class="card-block">
              <form class="form-horizontal" role="form" method="POST" action="{{route('email.update', $user->username)}}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email">New Email</label>
                  <input id="email" type="email" class="form-control" name="email" required autofocus>
                  <small id="emailHelp" class="form-text text-muted">After submitted, we will send to your new email to confirm.</small>
                  @if ($errors->has('email'))
                    <span class="help-block">
                     <strong>{{ $errors->first('email') }}</strong>
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
