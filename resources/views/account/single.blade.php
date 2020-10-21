@extends('layouts.app')
@section('content')
  <div class="container">
    <br>
    <br>
    @if(Auth::user()->username == $account->username and $account->activated == 0)
    <form id="activation" method="POST" action="{{route('account.activation', $account->username)}}">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="alert alert-danger" style="margin-top:5px;" role="alert">
        Your account is <strong>not active</strong>, <a style="text-decoration: underline;" href="#" onclick="document.getElementById('activation').submit()">click here</a> to activate your account !!!
      </div>
    </form>
    @endif
    <div class="card">
      <div class="card-header">
        <h2>{{$account->username}}'s Profile</h2>
      </div>
      <div class="card-block">
        <div class="row">
          <div class="col-md-2">
            <img src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim( $account->email ) ) )}}?d={{urlencode( 'monsterid' )}}"  alt="Profile Photo" width="135px" height="135px" class="rounded-circle">
            <br>
            <p style="margin-left: 25px;">
              @if($account->facebook)
                <a href="https://facebook.com/{{$account->facebook}}" target="_blank"><img src="{{asset('/images/fb.png')}}" width="25px" alt="facebook"></a>
              @endif
              @if($account->twitter)
                <a href="https://twitter.com/{{$account->twitter}}" target="_blank"><img src="{{asset('/images/tw.png')}}" width="25px" alt="twitter"></a>
              @endif
              @if($account->instagram)
                <a href="https://instagram.com/{{$account->instagram}}" target="_blank"><img src="{{asset('/images/ig.png')}}" width="25px" alt="instagram"></a>
              @endif
            </p>
          </div>
          <div class="col-md-4 border-left"> 

            <a href="#"><h4>{{ '@' . $account->username}} @if($account->verification==1) <img src="/images/oce.png" width="20px" alt="verified"> @endif</h4></a>
            <h4>{{$account->name}}</h4>
            <h6>Joined about {!! $account->registerdate->diffForHumans() !!}.</h6>
			@if($account->lastlogin)
            <h6>Last login about {!! $account->lastlogin->diffForHumans() !!}.</h6>
			@endif
            @if ($account->activated == 1)
              <span class="badge badge-success">Account Verified</span>
            @else
              <span class="badge badge-danger">Not Activated</span>
            @endif
          </div>
          <div class="col-md-6">
            @if(!$account->description)
              <div class="card card-outline-info mb-3 text-center">
                <div class="card-block">
                  <blockquote class="card-blockquote">
                    <p>Nothing to share.</p>
                    <footer>Signed by <cite title="Source Title">{{$account->username}}</cite></footer>
                  </blockquote>
                </div>
              </div>
            @else
              <div class="card card-outline-info mb-3 text-center">
                <div class="card-block">
                  <blockquote class="card-blockquote">
                    <p>{{$account->description}}</p>
                    <footer>Signed by <cite title="Source Title">{{$account->username}}</cite></footer>
                  </blockquote>
                </div>
              </div>
            @endif
            <!--<a class="card card-danger col-md-4 mb-3 text-white text-center" href="#">Admin History</a> -->
          </div>
        </div>
      </div>
    </div>
    <br>
    <h2>Friends</h2>
    <hr>


    @foreach($account->friends as $f)
      <a href="/account/{!! $f->user->username !!}" alt="Test">
      <img src="https://www.gravatar.com/avatar/{{ md5( strtolower( trim( $f->user->email ) ) )}}?d={{urlencode( 'monsterid' )}}"  alt="{{$f->user->username}}" width="80px" height="80px" style="margin-left: 8px; margin-top:8px;" class="rounded-circle">
      </a>
    @endforeach

    <br>
    @if(Auth::user()->username == $account->username or Auth::user()->admin >= 6)
    <br>
    <h2>Character details</h2>
    <hr>
    <div class="card ">
     <div class="card-header">
       <ul class="nav nav-tabs card-header-tabs pull-right"  id="myTab" role="tablist">
         @foreach($characters as $character)
          @if ($loop->first)
            <li class="nav-item character-list">
             <a class="nav-link active" id="{!! $character->charactername !!}-tab" data-toggle="tab" href="#{!! $character->charactername !!}" role="tab" aria-controls="home" aria-selected="true">{!! $character->charactername !!}</a>
            </li>
          @else
          <li class="nav-item character-list">
            <a class="nav-link" id="{!! $character->charactername !!}-tab" data-toggle="tab" href="#{!! $character->charactername !!}" role="tab" aria-controls="contact" aria-selected="false">{!! $character->charactername !!}</a>
          </li>
          @endif
         @endforeach
       </ul>
     </div>
     <div class="card-body">
      <div class="tab-content" id="myTabContent">
        @foreach($characters as $character)
         @if ($loop->first)
          <div class="tab-pane fade show active" id="{!! $character->charactername !!}" role="tabpanel" aria-labelledby="{!! $character->charactername !!}-tab">
            <div class="row">
              <div class="col-md-2">
                <img src="{{ asset('images/chars/' . $character->skin . '.png')}}" width="200px" alt="">
              </div>
              <div class="col-md-4 border-left" style="margin-left: 15px;">
                <br>
                <h3>General info</h3>
                <hr>
                Character Name : <a href="#">{!! $character->charactername !!}</a><br>
                Status : <a href="#">
                  @if ($character->cked==1)
                    Mati
                  @else
                    Hidup
                  @endif
                </a><br>
                Gender : <a href="#">
                  @if ($character->gender==0)
                    Man
                  @else
                    Women
                  @endif
                </a><br>
                Age : <a href="#">{!! $character->age !!}</a><br>
                Health : <a href="#">{!! $character->health !!}</a><br>
                Armor : <a href="#">{!! $character->armor !!}</a><br>
                Hunger : <a href="#">{!! $character->hunger !!}</a><br>
                Thirst : <a href="#">{!! $character->thirst !!}</a><br>
                Fun : <a href="#">{!! $character->fun !!}</a><br>
                Pocket money : <a href="#">${!! number_format($character->money, 2, ',', '.') !!}</a> <br>
                Bank money : <a href="#">${!! number_format($character->bankmoney, 2, ',', '.') !!}</a> <br>
                Job : <a href="#">
                  @if ($character->job==0)
                    Unemployed
                  @elseif ($character->job==1)
                    Trucker
                  @elseif ($character->job==2)
                      Taxi Driver
                  @elseif ($character->job==3)
                      Bus Driver
                  @elseif ($character->job==4)
                      City Maintenence
                  @elseif ($character->job==5)
                      Mechanic
                  @else
                      Unknown
                  @endif
                </a>
                <br>
                <br>
                <h3>Licenses info</h3>
                <hr>
                Driving license :
                @if ($character->car_license==0)
                  <a href="#" style="color:red;">No</a>
                @else
                  <a href="#" style="color:green;">Yes</a>
                @endif
                 <br>
                Pilot license :
                @if ($character->pilot_license==0)
                  <a href="#" style="color:red;">No</a>
                @else
                  <a href="#" style="color:green;">Yes</a>
                @endif
                 <br>
                Bike license :
                @if ($character->bike_license==0)
                  <a href="#" style="color:red;">No</a>
                @else
                  <a href="#" style="color:green;">Yes</a>
                @endif
                 <br>
                Gun license :
                @if ($character->gun_license==0)
                  <a href="#" style="color:red;">No</a>
                @else
                  <a href="#" style="color:green;">Yes</a>
                @endif
                 <br>
                 <br>
              </div>

              <div class="col-md-4">
                <br>
                <h3>Interior info</h3>
                <hr>
                  Interior: ( {!! count($character->interiors->where('deleted', 0)) !!}/{!! $character->maxinteriors !!} )
                <ul>
                  @foreach ($character->interiors->where('deleted', 0) as $interior)
                  <li><a href="#">{{$interior->name}} ({{$interior->id}})</a></li>
                  @endforeach
                </ul>
                <br>
                <h3>Vehicle info</h3>
                <hr>
                Vehicle : ( {!! count($character->vehicles->where('deleted', 0)) !!}/{!! $character->maxvehicles !!} )
                <br>
                  <ul>
                    @foreach ($character->vehicles->where('deleted', 0) as $vehicle)
                      <li><a href="#">{{ $vehicle->shop->vehbrand or 'Unknown' }} - {{ $vehicle->shop->vehmodel or '' }} {{ $vehicle->shop->vehyear or '' }} ({{$vehicle->id}})</a></li>
                    @endforeach
                  </ul>
              </div>
            </div>
          </div>
         @else
          <div class="tab-pane fade " id="{!! $character->charactername !!}" role="tabpanel" aria-labelledby="{!! $character->charactername !!}-tab">
            <div class="row">
              <div class="col-md-2">
                <img src="{{ asset('images/chars/' . $character->skin . '.png')}}" width="200px" alt="">
              </div>
              <div class="col-md-4 border-left" style="margin-left: 15px;">
                <br>
                <h3>General info</h3>
                <hr>
                Character Name : <a href="#">{!! $character->charactername !!}</a><br>
                Status : <a href="#">
                  @if ($character->cked==1)
                    Mati
                  @else
                    Hidup
                  @endif
                </a><br>
                Gender : <a href="#">
                  @if ($character->gender==0)
                    Man
                  @else
                    Women
                  @endif
                </a><br>
                Age : <a href="#">{!! $character->age !!}</a><br>
                Health : <a href="#">{!! $character->health !!}</a><br>
                Armor : <a href="#">{!! $character->armor !!}</a><br>
                Hunger : <a href="#">{!! $character->hunger !!}</a><br>
                Thirst : <a href="#">{!! $character->thirst !!}</a><br>
                Fun : <a href="#">{!! $character->fun !!}</a><br>
                Pocket money : <a href="#">${!! number_format($character->money, 2, ',', '.') !!}</a> <br>
                Bank money : <a href="#">${!! number_format($character->bankmoney, 2, ',', '.') !!}</a> <br>
                Job : <a href="#">
                  @if ($character->job==0)
                    Unemployed
                  @elseif ($character->job==1)
                    Trucker
                  @elseif ($character->job==2)
                      Taxi Driver
                  @elseif ($character->job==3)
                      Bus Driver
                  @elseif ($character->job==4)
                      City Maintenence
                  @elseif ($character->job==5)
                      Mechanic
                  @else
                      Unknown
                  @endif
                </a>
                <br>
                <br>
                <h3>Licenses info</h3>
                <hr>
                Driving license :
                @if ($character->car_license==0)
                  <a href="#" style="color:red;">No</a>
                @else
                  <a href="#" style="color:green;">Yes</a>
                @endif
                 <br>
                Pilot license :
                @if ($character->pilot_license==0)
                  <a href="#" style="color:red;">No</a>
                @else
                  <a href="#" style="color:green;">Yes</a>
                @endif
                 <br>
                Bike license :
                @if ($character->bike_license==0)
                  <a href="#" style="color:red;">No</a>
                @else
                  <a href="#" style="color:green;">Yes</a>
                @endif
                 <br>
                Gun license :
                @if ($character->gun_license==0)
                  <a href="#" style="color:red;">No</a>
                @else
                  <a href="#" style="color:green;">Yes</a>
                @endif
                 <br>
                 <br>
              </div>

              <div class="col-md-4">
                <br>
                <h3>Interior info</h3>
                <hr>
                  Interior: ( {!! count($character->interiors->where('deleted', 0)) !!}/{!! $character->maxinteriors !!} )
                <ul>
                  @foreach ($character->interiors->where('deleted', 0) as $interior)
                  <li><a href="#">{{$interior->name}} ({{$interior->id}})</a></li>
                  @endforeach
                </ul>
                <br>
                <h3>Vehicle info</h3>
                <hr>
                Vehicle : ( {!! count($character->vehicles->where('deleted', 0)) !!}/{!! $character->maxvehicles !!} )
                <br>
                  <ul>
                    @foreach ($character->vehicles->where('deleted', 0) as $vehicle)
                      <li><a href="#">{{ $vehicle->shop->vehbrand or 'Unknown' }} - {{ $vehicle->shop->vehmodel or '' }} {{ $vehicle->shop->vehyear or '' }} ({{$vehicle->id}})</a></li>
                    @endforeach
                  </ul>
              </div>
            </div>
          </div>
         @endif
        @endforeach
      </div>
     </div>
    </div>
    @endif
@endsection
