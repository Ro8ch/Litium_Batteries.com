@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- start page content -->
<div class="container">
    <h2 class="header">Order has been placed. Please use your online banking to pay the order.</h2>
    <div class = "cart-font-color">
        <H5><strong>Bank details:</H5></strong>
        <p></p>
        <p>Bank:                    Nedbank</p>
        <p>Account type:            Current account</p>
        <p>Branch Code:             198765</p>
        <p>Account holder:          Chanro du Toit</p>
        <p>Account number:          1233400142</p>
        <p>Reference:               {{ format($OrderNumber) }}</p>
        <p>Amount:                  R{{ format($total) }}</p>
        <p></p>
    </div>
</div>
<!-- end page content -->

@endsection