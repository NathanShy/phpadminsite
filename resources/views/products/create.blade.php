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