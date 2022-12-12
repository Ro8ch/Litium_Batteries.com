@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- start page content -->
<div class="container">
    <h2 class="header">Order has been placed. Please use your online banking to pay the order.</h2>
    <div class = "cart-font-color">
        <H5><strong>Bank details:</H5></strong>
        <p></p>
        <p>Bank:                    </p>
        <p>Account type:            </p>
        <p>Branch Code:             </p>
        <p>Account holder:          </p>
        <p>Account number:          </p>
        <p>Reference:               {{ format($OrderNumber) }}</p>
        <p>Amount:                  R{{ format($total) }}</p>
        <p></p>
    </div>
</div>
<!-- end page content -->

@endsection