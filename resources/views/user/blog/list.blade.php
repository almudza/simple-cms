{{-- Blog List --}}
@extends('user.main')

@section('header')
@include('user.partials._header')
@endsection



@section('content')
          @foreach ($posts as $post)

            <div id="post-list">
                <h3><a href="{{ route('post',$post->slug) }}"> {{ $post->title }}</a> </h3>
                {{-- <p class="lead">A sort of importand subheading can go here.</p> --}}
                <p>  </p>
                <small class="pul-left"><span class="badge badge-success"> {{ $post->category->name }}</span> </small> <br>
                  <small> {{ $post->created_at->diffForHumans() }} </small>
                  <small class="pull-right"><i class="fa fa-heart"></i> mudza</small>
            </div>
          @endforeach

      <br>
<!-- paginate -->
          {{ $posts->links() }}
<!-- endpaginate -->

@endsection


@section('js')
 
@endsection