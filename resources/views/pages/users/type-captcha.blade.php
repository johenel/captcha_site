@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-black-50 font-weight-bold">Encode, Earn and Enjoy!</h1>
        </div>
    </div>
    <div class="row" style="margin-top: 30px;">
        <div class="container" style="width: 100%;">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">{{$total_captcha}}</span></div>
                                        <div class="stat-heading">Total Captcha</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">&#8369; <span class="count">0</span></div>
                                        <div class="stat-heading">Total Captcha Earnings</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">0</span></div>
                                        <div class="stat-heading">Today's Total Captcha</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-4">
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text">&#8369; <span class="count">0</span></div>
                                        <div class="stat-heading">Today's Total Earnings</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row text-center" style="padding-top:50px;">
        <div class="col-md-12">
            <div style="width:600px;margin: auto;">
                @if(session()->has('success'))
                    @if(session()->get('success'))
                        <div class="alert-success" style="padding: 10px;">
                            Captcha is correct!
                        </div>
                    @else
                        <div class="alert-danger" style="padding: 10px;">
                            Captcha is wrong!
                        </div>
                    @endif
                @endif
            </div>

        </div>
        <div class="col-md-12">


            <div class="captcha-box" style="width:600px;margin: auto;">
                <div class="card">
                    <div class="card-header">
                        Sample Captcha Input
                    </div>
                    <div class="card-body">
                        <form action="/typing-captcha/attempt" method="post">
                            @csrf
                            <img src="{{\Illuminate\Support\Facades\URL::to('/')}}/images/captcha-sample.png" style="border: solid 1px #ddd;width:100%;">
                            <div class="captcha-input" style="height:100px;background: #dde;margin-top:30px;padding:30px;">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input class="form-control" name="captcha_user_input" placeholder="Enter">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="submit" class="btn btn-dark">
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.user-side-bar li:nth-child(2)').addClass('active');
        })
    </script>
@endsection