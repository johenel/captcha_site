@extends('layouts.default')
@section('content')
    <style>
        #apdThankyouPage {
            background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url("/temp-rex/assets/images/apd-thankyou.jpg");
            background-size:cover;
            background-repeat: no-repeat;
            height: 100vh;
            padding:60px;
        }

        .content-wrapper {
            margin-top: 50px;
            padding: 134px;
            text-align: center;
            background: #fff;
            height: 500px;

        }

    </style>
    <section id="apdThankyouPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-wrapper">
                        <h1>Thank you for submitting you<br>Activation payment details!</h1>
                        <hr>
                        <p>An email will be sent to your registered email address : <span><b style="color:blue;">{{$email}}</b></span></p>
                        <a href="/logout" class="btn btn-success">Go to Home page</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection