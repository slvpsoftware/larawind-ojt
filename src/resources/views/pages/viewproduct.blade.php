@extends('layouts.app')
@section('content')

<main class="relative min-h-screen w-full bg-white">
    <img src="{{ url('storage/'.$new_product->prod_image) }}" alt="">
</main>

@endsection
