@extends('layout.layout')
@section('content')
    <div class="flex flex-col items-center w-[500px] mx-auto">
        <h3 class="mb-5 text-3xl font-bold underline text-center">{{ $product->name }}</h3>
        <div class="mb-4">
            <img src="{{ $product->getImageURL() }}" alt="{{ $product->name }}" class="w-full h-auto">
            <p class="mt-2 text-center">{{ $product->description }}</p>
            <p class="mt-2 text-center">Giá: {{ $product->price }}</p>
            <p class="mt-2 text-center">Số lượng trong kho: {{ $product->quantity }}</p>
        </div>
    </div>
@endsection
