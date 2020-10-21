@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="mt-5 text-center">Server Information</h1>
          <hr>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Server Status</th>
                <td>{!!$status!!}</td>
              </tr>
              <tr>
                <th scope="row">IP Server</th>
                <td>192.168.1.1</td>
              </tr>
              <tr>
                <th scope="row">MTA Server IP</th>
                <td>mtasa.liongaming.net:22003</td>
              </tr>
              <tr>
                <th scope="row">Discord</th>
                <td>linkdiscord</td>
              </tr>
              <tr>
                <th scope="row">Forum</th>
                <td>mtasa.liongaming.net:22003</td>
              </tr>
              <tr>
                <th scope="row">Facebook Fanpage</th>
                <td>mtasa.liongaming.net:22003</td>
              </tr>
              <tr>
                <th scope="row">Facebook Group</th>
                <td>mtasa.liongaming.net:22003</td>
              </tr>
              <tr>
                <th scope="row">Website</th>
                <td>mtasa.liongaming.net:22003</td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td>mtasa.liongaming.net:22003</td>
              </tr>
              <tr>
                <th scope="row">Server Location</th>
                <td>mtasa.liongaming.net:22003</td>
              </tr>
            </tbody>
          </table>
      </div>
  </div>
</div>
@endsection
