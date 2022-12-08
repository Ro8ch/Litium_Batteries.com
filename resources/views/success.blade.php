@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- start page content -->
<div class="container">
    <h2 class="header">Order has been paid.</h2>
    <form action="{{ route('shop.index') }}" method="post">
    @csrf()
        <button type="submit" class="btn btn-success custom-border-success btn-block">Continue Shopping</button>
    </form>

</div>
<!-- end page content -->

@endsection