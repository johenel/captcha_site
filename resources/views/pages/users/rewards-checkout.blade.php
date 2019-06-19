@extends('layouts.admin')
@section('title','Rewards')
@section('content')
    <style>
        .card {
            width: max-content;
            margin: auto;
            min-height: 300px;
        }

        .card img {
            height: 100%;
        }

        #checkoutPage .card-body, #checkoutPage .container {
            padding: 0px !important;
        }

        .price {
            list-style-type: none;
        }

        .price li {
            float: left;
            margin-right: 40px;
            font-size: 40px;
        }
    </style>
    <section id="checkoutPage">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($reward)
                        <div class="card">
                            <div class="card-body">

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-5" style="background-color: #0d3537;">
                                            <img src="/images/rewards/{{$reward->featured_image_url}}" alt="">
                                        </div>
                                        <div class="col-md-7" style="">
                                            @include('includes.error-validation')
                                            @if(session()->has('CLAIM_REWARD_FAIL'))
                                                <div class="alert alert-danger">
                                                    Your Reward Points or Money Balance is not enough.
                                                </div>
                                            @endif
                                            <div style="padding: 20px; width: 90%;">
                                                <h1>{{$reward->title}}</h1>
                                                <hr>
                                                <p>
                                                    {{$reward->description}}
                                                </p>
                                                <ul class="price">
                                                    <li>
                                                        <i class="fa fa-star" style="color:orange"></i> {{$reward->price_reward_points}}
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-money" style="color:#04d204"></i> {{$reward->price_money_balance}}
                                                    </li>
                                                </ul>
                                                <div style="clear:both;margin-top:20px"></div>
                                                <form id="claimReward" action="/rewards/claim" method="post" style="padding-top:20px;">
                                                    @csrf
                                                    <input type="hidden" name="rid" value="{{$reward->id}}">
                                                    <div class="form-group">
                                                        <input type="text" name="delivery_address" class="form-control" placeholder="Delivery Address">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea type="text" name="notes" class="form-control" placeholder="Notes"></textarea>
                                                    </div>
                                                    <h4>Claim With :</h4>
                                                    <div class="row" style="padding: 20px 0px;">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-warning form-control" style="background-color: orange;color: floralwhite" payment_option="{{\App\Models\RewardClaimRequests::PAYMENT_OPTION_REWARD}}">Reward Points</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button class="btn btn-success form-control" style="color: floralwhite" payment_option="{{\App\Models\RewardClaimRequests::PAYMENT_OPTION_MONEY}}">Money Balance</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <h1>Something weng wrong</h1>
                    @endif
                </div>
            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script>
        $(function() {
            $('form#claimReward button').click(function(e) {
                e.preventDefault();
                let po = $(this).attr('payment_option');
                $('form#claimReward').append('<input type="hidden" value="'+po+'" name="payment_option">');
                $('form#claimReward').submit();
            });
        });
    </script>
@endsection