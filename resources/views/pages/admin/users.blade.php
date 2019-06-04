@extends('layouts.admin')
@section('title','Activated Users')
@section('content')
    <section id="adminUsers">
        <h1>Activated Users</h1>
        <hr>
        <div class="content">
            <table class="table table-bordered table-striped bg-white">
                <thead style="background-color: #0d3537;color: white;">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        @if($status == 'activated')
                            <th>Captcha Income</th>
                            <th>Referral Income</th>
                        @endif
                        @if($status == 'pending')
                            <th>Activation Request</th>
                        @endif
                        <th>Registration Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                        <tr>
                            <td>{{$count}}</td>
                            <td>{{$u->first_name}} {{$u->last_name}}</td>
                            <td>{{$u->email}}</td>
                            @if($status == 'activated')
                                <td></td>
                                <td></td>
                            @endif
                            @if($status== 'pending')
                                <td>
                                    @if(count($u->activationRequests) > 0)
                                        <a href="/activation-request/{{$u->id}}" target="_blank" class="btn btn-success color-white">Verify</a>
                                    @else
                                        <span style="color:red;">NONE</span>
                                    @endif
                                </td>
                            @endif
                            <td>{{date_format($u->created_at,'F - d - Y')}}</td>
                        </tr>
                        <?php
                        $count--;
                        ?>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </section>
@endsection
