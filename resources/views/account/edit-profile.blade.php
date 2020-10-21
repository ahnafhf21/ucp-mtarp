@extends('layouts.app')

@section('content')

  <div class="container">
    <br><br>
    <h3>Edit Profil</h3>
    <hr>
    <div class="row">
      <div class="col-md-4">
        <ul>
          <li><a href="{{route('account.edit', $account->username)}}">Edit Profil</a></li>
          <li><a href="{{route('password.edit', $account->username)}}">Ganti Password</a></li>
         <!-- <li><a href="{{route('email.edit', $account->username)}}">Ganti Email</a></li>-->
        </ul>
      </div>
      <div class="col-md-8">
        <div class="card card-outline-secondary">
            <div class="card-block">
              <form class="form-horizontal" role="form" method="POST" action="{{route('account.update', $account->username)}}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                  <label  for="username">Username</label>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">@</div>
                    <input type="text" class="form-control" id="username" name="username" value="{{$account->username}}" disabled>
                  </div>
                  @if ($errors->has('username'))
                    <span class="help-block">
                     <strong>{{ $errors->first('username') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <label for="name">Nama</label>
                  <input id="name" type="text" class="form-control" name="name" value="{{ $account->name }}" required autofocus>
                  @if ($errors->has('name'))
                    <span class="help-block">
                     <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
                  <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                  <label for="description">Deskripsi</label>
                  <textarea name="description" class="form-control" id="description" style="resize: none;" rows="3">{{$account->description}}</textarea>
                  @if ($errors->has('description'))
                    <span class="help-block">
                     <strong>{{ $errors->first('description') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
                  <label for="facebook">Facebook Link</label>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">https://facebook.com/</div>
                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{$account->facebook}}">
                  </div>
                  @if ($errors->has('facebook'))
                    <span class="help-block">
                     <strong>{{ $errors->first('facebook') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
                  <label for="twitter">Twitter Link</label>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">https://twitter.com/</div>
                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{$account->twitter}}">
                  </div>
                  @if ($errors->has('twitter'))
                    <span class="help-block">
                     <strong>{{ $errors->first('twitter') }}</strong>
                    </span>
                  @endif
                </div>
                <div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
                  <label for="instagram">Instagram Link</label>
                  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon">https://instagram.com/</div>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{$account->instagram}}">
                  </div>
                  @if ($errors->has('instagram'))
                    <span class="help-block">
                     <strong>{{ $errors->first('instagram') }}</strong>
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
