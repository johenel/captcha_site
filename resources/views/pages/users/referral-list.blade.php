@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-black-50 font-weight-bold">Referrals</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(count($referrals) > 0)
                <table id="bootstrap-data-table" class="table table-bordered" style="background:white;margin-top:50px;">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Referral Level</th>
                            <th>Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                            <td>test</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <div class="card" style="margin-top:50px;">
                    <div class="card-body">
                        <h1>No Records Found</h1>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.user-side-bar li:nth-child(3)').addClass('active');

        })
    </script>
@endsection