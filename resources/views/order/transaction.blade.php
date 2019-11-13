@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Transaction History</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Customer</th>
          <th>Email</th>
          <th>Order Number</th>
          <th>Transaction Id</th>
          <th>Total Price</th>
          <th>Subtotal</th>
          <th>Discount</th>
          <th>Tax</th>
          <th>Currency</th>
        </tr>
      </thead>
      <tbody>
        @if(count($transactions))
          @foreach($transactions as $transaction)
          <tr>
            <td>{{$transaction->first_name.' '.$transaction->last_name}} </td>
            <td>{{$transaction->email}}</td>
            <td>{{$transaction->order_number}}</td>
            <td>{{$transaction->transaction_id}}</td>
            <td>{{$transaction->total_price}}</td>
            <td>{{$transaction->subtotal_price}}</td>
            <td>{{$transaction->total_discounts}}</td>
            <td>{{$transaction->total_tax}}</td>
            <td>{{$transaction->currency}}</td>
          </tr>
          @endforeach
        @else
        <tr>
          <td colspan="8" class="text-center">No data found</td>
        </tr>
        @endif
      </tbody>
    </table>
</div>

@endsection
