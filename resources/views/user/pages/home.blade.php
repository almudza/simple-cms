@extends('user.main')

@section('header')
@include('user.partials._header')
@endsection



@section('featured')

        <div class="row">
          <div class="col-sm-12 col-md-4">
            <div class="card mb-4">
              <img class="card-img-right flex-auto d-none d-md-block" width="100%" src="{{ asset('user/img/large.jpg')}}" alt="Card image cap">
              <div class="card-body text-center">
                <h5 class="card-title">Card Title</h5>
                <p class="card-text">Some quick text to build up on the card title</p>
                <a href="" class="card-link"></a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img class="card-img-right flex-auto d-none d-md-block" width="100%" src="{{ asset('user/img/large.jpg')}}" alt="Card image cap">
              <div class="card-body text-center">
                <h5 class="card-title">Card Title</h5>
                <p class="card-text">Some quick text to build up on the card title</p>
                <a href="" class="card-link"></a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <img class="card-img-right flex-auto d-none d-md-block" width="100%" src="{{ asset('user/img/large.jpg')}}" alt="Card image cap">
              <div class="card-body text-center">
                <h5 class="card-title">Card Title</h5>
                <p class="card-text">Some quick text to build up on the card title</p>
                <a href="" class="card-link"></a>
              </div>
            </div>
          </div>
        </div>
@endsection


@section('content')

            <div id="post-list">
                <h3>An important heading</h3>
                <p class="lead">A sort of importand subheading can go here.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                  Minus voluptates laboriosam tempore nemo deleniti accusamus nisi illum quaerat culpa voluptatem 
                  aut repellendus consectetur eaque, magnam nam iusto eos ea ut.</p>
                  <small>3 days ago</small>
                  <small class="pull-right"><i class="fa fa-heart"></i> mudza</small>
            </div>
            <div id="post-list">
                <h3>An important heading</h3>
                <p class="lead">A sort of importand subheading can go here.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                  Minus voluptates laboriosam tempore nemo deleniti accusamus nisi illum quaerat culpa voluptatem 
                  aut repellendus consectetur eaque, magnam nam iusto eos ea ut.</p>
                <small>3 days ago</small>
                <small class="pull-right"><i class="fa fa-heart"></i> mudza</small>
            </div>


@endsection


@section('js')
 
@endsection