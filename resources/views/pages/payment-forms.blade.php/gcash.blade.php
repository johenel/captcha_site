@extends('layouts.admin')
@section('title','Admin Dashbaord')
@section('content')
    <section>
        <div class="summary-box">
            <div class="users">
                <div class="card text-center" style="width: max-content">
                    <div class="card-header">
                        <h3>Users</h3>
                    </div>
                    <div class="card-body">
                        <h1>{{$users_count}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
