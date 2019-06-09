@extends('layouts.admin')
@section('title','Encashments')
@section('content')
    <section id="encashmentsPage">
        <h1>Encashments</h1>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Payment Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                    <tr>
                        <td>{{$u->first_name}} {{$u->last_name}}</td>
                        <td>{{$u->email}}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
