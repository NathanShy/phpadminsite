@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">

      @if ($products->count())
        @foreach ($products as $products)
          <div class="mb-4">
            <h3>{{ $products->name }}</h3>
            <p>Image</p>
            <p><strong> {{ $products->category }}</strong></p>
            <p>{{ $products->description }}</p>
            <p><small>{{ $products->date }}</small></p>
          </div>
        @endforeach
      @else 
        <p>There are no products</p>
      @endif

    </div>
  </div>
@endsection 