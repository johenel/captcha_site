@extends('layouts.admin')
@section('title','Encashment')
@section('content')
    <style>
        .card {
            height:350px;
        }
        .card-header, .card-footer {
            background: #0d3537 !important;
            color:white;
        }
    </style>
    <section>
        <div class="container-fluid">
            <div class="row text-center align-content-center">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Globe GCASH
                        </div>
                        <div class="card-body">
                            <img src="/images/globegcash.png">
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-success">Withdraw</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Palawan Pawnshop
                        </div>
                        <div class="card-body">
                            <img src="/images/palawan-pawnshop.png">
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-success">Withdraw</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Coins.ph
                        </div>
                        <div class="card-body">
                            <img src="/images/coinsph.png">
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-success">Withdraw</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            MLHUILLIER
                        </div>
                        <div class="card-body">
                            <img src="/images/mlhuillier.png">
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-success">Withdraw</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
