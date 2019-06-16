@extends('layouts.admin')
@section('title','Admin Dashbaord')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <h1 class="col-md-12" style="margin-bottom:20px">USERS</h1>
                <div class="col-md-2">
                    <div class="summary-box">
                        <div class="users">
                            <div class="card text-center" style="width: max-content">
                                <div class="card-header">
                                    <strong>Pending</strong>
                                </div>
                                <div class="card-body">
                                    <h1>{{$users_pending}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="summary-box">
                        <div class="users">
                            <div class="card text-center" style="width: max-content">
                                <div class="card-header">
                                    <strong>Activated</strong>
                                </div>
                                <div class="card-body">
                                    <h1>{{$users_activated}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="summary-box">
                        <div class="users">
                            <div class="card text-center" style="width: max-content">
                                <div class="card-header">
                                    <strong>Deactivated</strong>
                                </div>
                                <div class="card-body">
                                    <h1>{{$users_deactivated}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="summary-box">
                        <div class="users">
                            <div class="card text-center" style="width: max-content">
                                <div class="card-header">
                                    <strong>Users Income</strong>
                                </div>
                                <div class="card-body">
                                    <h1>{{$users_income[0]->total ? $users_income[0]->total : 0}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="summary-box">
                        <div class="users">
                            <div class="card text-center" style="width: max-content">
                                <div class="card-header">
                                    <strong>Encashment Requests</strong>
                                </div>
                                <div class="card-body">
                                    <h1>{{$users_encashments[0]->total ? $users_encashments[0]->total : 0}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>
@endsection
