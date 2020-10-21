@extends('layouts.app')

@section('content')
<div class="container">

      <h1 class="mt-5 text-center">Server Statistics</h1>
      <hr>
      <div class="row">
      <div class="col-sm-6">
      <table class="table table-hover">
        <h2>General Statistics</h2>
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Value</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Total Accounts</th>
            <td>{!!$accounts->count()!!}</td>
          </tr>
          <tr>
            <th scope="row">Total Characters</th>
            <td>{!! $characters->count() !!}</td>
          </tr>
          <tr>
            <th scope="row">Total Factions</th>
            <td>{!! $factions->count() !!}</td>
          </tr>
          <tr>
            <th scope="row">Total Interiors</th>
            <td>{!! $interiors->count()!!}</td>
          </tr>
          <tr>
            <th scope="row">Total Vehicles</th>
            <td>{!! $vehicles->count() !!}</td>
          </tr>
          <tr>
            <th scope="row">Total NPC</th>
            <td>{!! $shops->count() !!}</td>
          </tr>
        </tbody>
      </table>
      </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-6">
    <table class="table table-hover">
      <h2>Top 10 Playhours</h2>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Character Name</th>
          <th scope="col">Value</th>
        </tr>
      </thead>
      <tbody>
        @php $i=0; @endphp
        @foreach ($playhours as $ph)
        @php $i=$i+1; @endphp
        <tr>
          <th scope="row">{!! $i !!}</th>
          <th scope="row">{!! $ph->charactername !!}</th>
          <td>{!! $ph->hoursplayed !!}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>

    <div class="col-sm-6">
    <table class="table table-hover">
      <h2>Top 10 Donates</h2>
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Username</th>
          <th scope="col">Value</th>
        </tr>
      </thead>
      <tbody>
        @php $i=0; @endphp
        @foreach ($topdonates as $donate)
        @php $i=$i+1; @endphp
        <tr>
          <th scope="row">{!! $i !!}</th>
          <th scope="row">{!! $donate->username !!}</th>
          <td>{!! number_format($donate->totalcredits) !!} Coin(s)</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>
@endsection
