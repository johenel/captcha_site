@extends('layouts.default')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Hello {{$name}},</h3>
                <p>
                    Good day! here is the link to update your account password.<br><a href="{{$site_url}}/forgot-password/{{$slug}}">{{$site_url}}/forgot-password/{{$slug}}</a>
                </p>
                <br><br>
                <p>
                    SITE TEMPLATE
                </p>
            </div>
        </div>
    </div>
@endsection