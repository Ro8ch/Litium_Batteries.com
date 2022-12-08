@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- start page content -->
<div class="container">
    <h2 class="header">Order has been placed. Please choose your payment method.</h2>

    <h5>You are about to pay:       {{ format($total) }}</h5>
    <form action="{{ route('eft.index') }}" method="post">
    @csrf()
        <button type="submit" class="btn btn-success custom-border-success btn-block">Pay here with EFT</button>
    </form>
    <!--<form action="{{'checkout.payfast'}}" method="post">
    <form action="https://www.payfast.co.za/eng/process" method="post">-->
    <form action="https://sandbox.payfast.co.za​/eng/process" method="post">
    @csrf()
        <input type="hidden" name="merchant_id" value="{{ config('services.payfast.PF_MERCHANT_ID') }}">
        <input type="hidden" name="merchant_key" value="{{ config('services.payfast.PF_MERCHANT_KEY') }}">
        <input type="hidden" name="return_url" value="{{ config('services.payfast.PF_RETURN_URL') }}">
        <input type="hidden" name="cancel_url" value="{{ config('services.payfast.PF_CANCEL_URL') }}">
        <input type="hidden" name="email_confirmation" value="1">
        <input type="hidden" name="amount" value="{{ format($total) }}">
        <input type="hidden" name="item_name" value="{{ session()->get('orderNumber')}}">
        <button type="submit" class="btn btn-success custom-border-success btn-block">Pay here with PayFast</button>
    /form>
</div>
<!-- end page content -->

@endsection