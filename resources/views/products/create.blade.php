@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
      <div id="app">
        <div class="container">
          <create-items></create-items>
        </div>
      </div>
    </div>
  </div>
@endsection 

      <!-- <form action="{{ route('createProducts') }}" method="post">

      <form action="{{route ('register') }}" method="post">
        @csrf

        <div class="mb-4">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" placeholder="Product Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}">

          @error('name')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror

          <label for="category">Category</label>
          <input type="text" name="category" id="category" placeholder="Product Category" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('category') border-red-500 @enderror" value="{{old('category')}}">

          @error('category')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror

          <label for="date">Date</label>
          <input type="date" name="date" id="date" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('date') border-red-500 @enderror" value="{{old('date')}}">


          @error('date')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror

          <label for="description">Description</label>
          <textarea name="description" id="description" cols="30" rows="4" placeholder="Product Description" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" value="{{old('description')}}"></textarea>


          @error('description')
            <div class="text-red-500 mt-2 text-sm">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Submit</button>
        </div>

      </form> -->