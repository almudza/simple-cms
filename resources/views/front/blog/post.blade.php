@extends('front.main')


@section('css')
    <link rel="stylesheet" href="{{ asset('user/css/prism.css') }}">
@endsection



@section('title', ' | '. $post->title)

@section('content')

            <div id="post-detail">
                <img src="{{ $post->getImage() }} " width="100%" alt="" class="card-img-top">
                <div class="card-body">
                    <h3 class="text-center" > {{ $post->title }} </h3>
                    <small>by <i class="fa fa-user"></i> <a href="#">{{ $post->admin->name }} </a> <b>{{ $post->created_at }}</b> </small>
                    <small class="pull-right"><i class="fa fa-heart"></i> 3 Likes</small>
                    {{-- <p class="lead">A sort of importand subheading can go here.</p> --}}
                    <p>  {!! htmlspecialchars_decode($post->body) !!} </p>
                    @foreach ($post->tags as $postTag)
                    <a id="tag" href="{{ route('tag',$postTag->slug) }}"><small class="pull-left badge badge-outline-primary"> 
                        #{{ $postTag->name }}
                     </small></a>
                    @endforeach
                    <a id="kategori" href="{{ route('category',$post->category->slug) }}"><small class="pull-right badge badge-outline-primary"><i class="fa fa-tag"></i> {{ $post->category->name }} </small></a>
                </div>
            </div>

          <!-- endcontent -->
@endsection



@section('js')

    <script src="{{ asset('user/js/prism.js') }}"></script>
    
@endsection