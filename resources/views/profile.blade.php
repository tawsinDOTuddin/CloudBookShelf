@extends('layouts.app')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

<div class="container">
    <div class="row text-center">
        <div class="col-xs-12 col-sm-6 col-md-12 text-center">
            <div class="well well-sm">
                <div class="row">
                    <!--div class="col-sm-6 col-md-4">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div-->
                    <div class="col-sm-6 col-md-11">
                        <h1>
                            {{$user->name}}</h1>
                            <br>
                          <h2>  
                        <i class="glyphicon glyphicon-globe"></i>Username: {{$user->username}}
                        </h2>
                         <br>
                        <h3>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{$user->email}}
                            <br />
                             <br>
                            <i class="glyphicon glyphicon-globe"></i><a href="/">Homepage</a>
                            <br />
                             <br>
                            <i class="glyphicon glyphicon-globe"></i>
                            GET YOURSELF SOCIAL</p>
                           </h3>
                        <!-- Split button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-lg">
                                Social</button>
                            <button type="button" class="btn btn-primary dropdown-toggle btn-lg" data-toggle="dropdown">
                                <span class="caret"></span><span class="sr-only">Social</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="https://www.twitter.com">Twitter</a></li>
                                <li><a href="https://plus.google.com">Google </a></li>
                                <li><a href="https://www.facebook.com">Facebook</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Github</a></li>
                            </ul>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection