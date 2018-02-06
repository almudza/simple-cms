@extends('user.main')

@section('css')

<style>
    
    #home-profile {
        margin-top: 2em;

    }

</style>

@endsection


@section('content')


    
            <div id="home-profile">
                <div class="card border-primary mb-3 mx-auto">
                    
                    <div class="card-header">
                           <p class="display-4"> Dashboard </p>
                    </div> 
                    <div class="card-body">
                        

                        <p class="card-text">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            You are logged in!
                        </p>
                    </div>
                </div>
            </div>

@endsection
