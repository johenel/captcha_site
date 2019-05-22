@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="count">234.00</span></div>
                                <div class="stat-heading">Total Income</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="count">100.00</span></div>
                                <div class="stat-heading">Total Encashment</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="pe-7s-cash"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="count">134.00</span></div>
                                <div class="stat-heading">Remaining Balance</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                            <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="count">40.00</span></div>
                                <div class="stat-heading">Referral Bonus</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="pe-7s-browser"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text">&#8369; <span class="count">22.00</span></div>
                                <div class="stat-heading">Captcha Bonus</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Referral Link
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" id="disabled-input" name="disabled-input" placeholder="Disabled" disabled="" class="form-control" value="https://trihomebased.com/signup?ref=FBiV2C1552884508306">
                        <div class="input-group-btn"><button class="btn btn-primary">COPY</button></div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="row" style="margin-bottom: 40px;">
        <div class="col-md-12">
            <h1>Announcements <span class="badge badge-secondary">New</span></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="https://image.shutterstock.com/image-vector/discount-voucher-template-clean-modern-450w-338616335.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mb-3">Card Image Title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="https://image.shutterstock.com/image-vector/three-horizontal-black-friday-banners-450w-1027957408.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mb-3">Card Image Title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="https://image.shutterstock.com/image-vector/three-horizontal-black-friday-banners-450w-1027957408.jpg" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mb-3">Card Image Title</h4>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.user-side-bar li:nth-child(1)').addClass('active');
        })
    </script>
@endsection