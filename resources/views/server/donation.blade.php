@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-12">
          <h1 class="mt-5 text-center">Donations</h1>
          <hr>
          <div class="col-sm-12">
          <table class="table table-hover">
            <h2>My Donation(s)</h2>
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Character</th>
                <th scope="col">Method</th>
                <th scope="col">Amount</th>
                <th scope="col">Type</th>
                <th scope="col">Evidence</th>
                <th scope="col">Date</th>
                <th scope="col">Notes</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            @php
              $id = 0;
            @endphp
            @foreach($donates as $donate)
            @php
              $id = $id +1;
            @endphp
              <tbody>
                <tr>

                  <th scope="row">{!!$id!!}</th>
                  <td>{!! $donate->character->charactername !!}</td>
                  <td>
                    @if($donate->payment_method == 1)
                      Bank Transfer
                    @else
                      GoPay
                    @endif
                  </td>
                  <td>{!! number_format($donate->payment_amount) !!}</td>
                  <td>{!! $donate->donate_type !!}</td>
                  <td>{!! $donate->evidence !!}</td>
                  <td>{!! $donate->payment_date !!}</td>
                  <td>{!! $donate->notes !!}</td>
                  <td>@if($donate->status == 0)
                    <span class="badge badge-warning">Pending</span>
                  @elseif($donate->status == 2)
                    <span class="badge badge-secondary">Waiting Confirmation</span>
                  @elseif($donate->status == 3)
                    <span class="badge badge-danger">Rejected</span>
                  @else
                    <span class="badge badge-success">Confirmed</span>
                  @endif</td>
                </tr>
              </tbody>
            @endforeach
          </table>
          </div>
      </div>
  </div>
</div>
@endsection
