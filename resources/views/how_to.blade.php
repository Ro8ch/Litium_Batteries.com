@extends('layouts.app')
@section('title', 'Welcome')
@section('content')

<!-- start page content -->
<div class="container">
    <h2 class="header">How to:</h2>
    <!-- start guide row -->
    <div class="row">
        @foreach ($products as $product)
            <!-- start single guide -->
            <div class="header">
                <h3>
                    <a href="{{ route('Guide.show', $Guide->how_to) }}">

                    </a>
                <h3>
            </div>
            <!-- end single guide -->
        @endforeach
    </div>
</div>
<!-- end page content -->

@endsection
