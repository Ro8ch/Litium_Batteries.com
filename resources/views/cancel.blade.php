@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- start page content -->
<div class="container">
    <h2 class="header">Order has NOT been paid.</h2>
    <form action="{{ route('shop.index') }}" method="post">
    @csrf()
        <button type="submit" class="btn btn-success custom-border-success btn-block">Continue Shopping</button>
    </form>
    <form action="{{ route('payment.index') }}" method="post">
    @csrf()
        <button type="submit" class="btn btn-success custom-border-success btn-block">Try Again</button>
    </form>

</div>
<!-- end page content -->

@endsection