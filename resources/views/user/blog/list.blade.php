{{-- Blog List --}}
@extends('user.main')

@section('header')
  @include('user.partials._header')
@endsection

@section('title', ' | blog')

@section('css')
{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <style>
    
    .fa-heart:hover {
      color: #00d1b2;
    }
    .fa-heart {
      color: black;
    }

  </style>
@endsection



@section('content')
    
    <div id="app">

      @if ($posts->count() > 0)

          <posts v-for='value in blog' 
          :title=value.title
          :created_at=value.created_at
          :key=value.index
          :post-id=value.id
          login = "{{ Auth::check() }}"
          :likes = value.likes.length
          :slug = value.slug
          ></posts>

      <br>
<!-- paginate -->
          {{ $posts->links() }}
<!-- endpaginate -->
      @else
        <h1> {{ $zero }} </h1>
      @endif

    </div> <!-- endApp -->
@endsection


@section('js')

<script src="{{ asset('js/app.js') }}"></script>
 
@endsection