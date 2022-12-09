@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- start page content -->
<div class="container">
    <h2 class="header">Order has been placed. Please choose your payment method.</h2>

    <h5 class="header">You are about to pay:       R{{ format($total) }}</h5>
    <form action="{{ route('eft.index') }}" method="post">
    @csrf()
        <button type="submit" class="btn btn-success custom-border-success btn-block">Pay here with EFT</button>
    </form>
    <!--<form action="{{'checkout.payfast'}}" method="post">
    <form action="https://www.payfast.co.za/eng/process" method="post">-->
    <form action="https://sandbox.payfast.co.za​/eng/process" method="post">
    @csrf()
        <input type="hidden" name="merchant_id" value="{{ $PF_MERCHANT_ID }}">
        <input type="hidden" name="merchant_key" value="{{ $PF_MERCHANT_KEY }}">
        <input type="hidden" name="return_url" value="{{ $PF_RETURN_URL }}">
        <input type="hidden" name="cancel_url" value="{{ $PF_CANCEL_URL }}">
        <input type="hidden" name="email_confirmation" value="1">
        <input type="hidden" name="amount" value="{{ format($total) }}">
        <input type="hidden" name="item_name" value="{{ format($OrderNumber) }}">
        <button type="submit" class="btn btn-success custom-border-success btn-block">Pay here with PayFast</button>
    /form>
</div>
<!-- end page content -->

@endsection