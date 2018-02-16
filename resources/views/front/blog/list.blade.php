{{-- Blog List --}}
@extends('front.main')

@section('header')
  @include('front.partials._header')
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

       @foreach ($posts as $post)

            <div id="post-list">
                <h3><a href="{{ route('post',$post->slug) }}"> {{ $post->title }}</a> </h3>
                {{-- <p class="lead">A sort of importand subheading can go here.</p> --}}
                <p>  </p>
                <small class="pul-left"><span class="badge badge-success"> {{ $post->category->name }}</span> </small> <br>
                  <small> {{ $post->created_at }} </small>
                  <small class="pull-right"><i class="fa fa-heart"></i> {{ $post->admin->name }}</small>
            </div>
        @endforeach


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