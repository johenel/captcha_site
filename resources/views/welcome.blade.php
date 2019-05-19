@extends('layouts.default')
@section('content')
        <!-- Start header section -->
        <div class="header-inner">
            <header id="header">
                <!-- Header image -->
                <img src="/temp-rex/assets/images/header-bg.jpg" alt="img" style="height:100%;">
                <div class="header-overlay">
                    <div class="header-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <h2 class="header-slide">THIS IS A
                                        <span>NICE</span>
                                        <span>WEBSITE</span>
                                        TEMPLATE
                                    </h2>
                                </div>
                                <div class="col-md-5">
                                    @if(session()->has('error'))
                                        <div style="background:red;color:white;padding: 10px;border-radius:5px;margin-bottom:20px;">
                                            @foreach(session()->get('error') as $e)
                                                <span>{{$e}}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="auth-box">
                                        @if(!empty($action))
                                            @if($action == 'signup')
                                                @include('includes.features.signup')
                                            @else
                                                @include('includes.features.login')
                                            @endif
                                        @else
                                            @include('includes.features.login')
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>

        <!-- End header section -->
        {{--<div class="flex-center position-ref full-height">--}}
            {{--@if (Route::has('login'))--}}
                {{--<div class="top-right links">--}}
                    {{--<a href="{{ route('login') }}">Login</a>--}}
                    {{--@if (Route::has('register'))--}}
                        {{--<a href="{{ route('register') }}">Register</a>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--@endif--}}


        {{--</div>--}}

@endsection
