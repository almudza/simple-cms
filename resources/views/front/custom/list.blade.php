@extends('user.main')


@section('css')
<style>
    #custom-list{
        margin-top: .7em;
    }
    #custom-list .lead{
        text-align: center;
    }
</style>
@endsection

@section('content')

            <div id="custom-list">
                <ul class="list-group">
                    <h4 class="lead">Samsung</h4>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Cras justo odio
                    <span class="badge badge-primary badge-pill">Samsung</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Dapibus ac facilisis in
                    <span class="badge badge-primary badge-pill">ANdroid</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Morbi leo risus
                    <span class="badge badge-primary badge-pill">Samsung j3</span>
                  </li>
                </ul>
                <h4 class="lead">Xiaomi</h4>
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Cras justo odio
                    <span class="badge badge-primary badge-pill">Samsung</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Dapibus ac facilisis in
                    <span class="badge badge-primary badge-pill">ANdroid</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Morbi leo risus
                    <span class="badge badge-primary badge-pill">Samsung j3</span>
                  </li>
                </ul>
            </div>

          <!-- endcontent -->
@endsection


@section('js')



@endsection