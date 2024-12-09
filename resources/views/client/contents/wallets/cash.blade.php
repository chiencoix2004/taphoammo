@extends('client.layouts.main')
@section('content')
    <!-- ==========Page Header Section Start Here========== -->
    {{-- <section class="page-header-section style-1">
        <div class="container">
            <div class="page-header-content">
                <div class="page-header-inner">
                    <div class="page-title">
                        <h2>Nạp Tiền </h2>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Nạp Tiền</li>
                    </ol>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- ==========Page Header Section Ends Here========== -->


    <!-- ==========wallet Section start Here========== -->
    <section class="wallet-section padding-top padding-bottom">
        <div class="container">
            <div class="wallet-inner">
                <div class="wallet-title">
                    <h3 class="mb-3">Nạp Tiền</h3>
                </div>
                <div class="row g-3">
                    @foreach ($listBank as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="wallet-item">
                                <div class="wallet-item-inner">
                                    <div class="wallet-thumb">
                                        {{-- <a href="signin.html"> --}}
                                        {{-- <img src="{{ asset('assets2/images/wallet/06.png') }}" alt="wallet-img"> --}}
                                        @if ($item->bank_name == 970422)
                                            <img src="{{ asset('assets/images/logos/mb.jpg') }}"
                                                class="rounded-circle thumb-md me-1 d-inline" alt="" width="40px"
                                                height="40px">
                                        @elseif($item->bank_name == 970416)
                                            <img src="{{ asset('assets/images/logos/logo-acb.jpg') }}" alt=""
                                                width="40px" height="40px" class="rounded-circle thumb-md me-1 d-inline">
                                        @endif
                                        {{-- </a> --}}
                                    </div>
                                    <div class="wallet-content">
                                        @if ($item->bank_name == 970422)
                                            <h5><a href="#!">MBBank</a></h5>
                                        @elseif($item->bank_name == 970416)
                                            <h5><a href="#!">ACB</a></h5>
                                        @endif
                                        <li class="crypto-copy" style="color: aqua">
                                            STK: <a href="#!">{{ $item->account_number }}</a>
                                        </li>
                                        <li class="crypto-copy" style="color: aqua">
                                            Tên TK: <a href="#!">{{ $item->bankers }}</a>
                                        </li>
                                        <li class="crypto-copy" style="color: aqua">
                                            Nội Dung Ck: <a href="#!">{{ $item->bankers }}</a>
                                        </li> 
                                        <br>
                                        <span style="color: red">Hoặc quét mã Qrcode</span>
                                        <p> <img src="https://img.vietqr.io/image/{{ $item->bank_name }}-
                                            {{ $item->account_number }}-compact.png"
                                                width="300px" height="300px"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-lg-4 col-md-6">
                        <div class="wallet-item">
                            <div class="wallet-item-inner">
                                <div class="wallet-thumb">
                                    <a href="signin.html">
                                        <img src="{{ asset('assets2/images/wallet/07.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="signin.html">Binance</a></h5>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="wallet-item">
                            <div class="wallet-item-inner">
                                <div class="wallet-thumb">
                                    <a href="signin.html">
                                        <img src="{{ asset('assets2/images/wallet/08.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="signin.html">Formatic</a></h5>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="wallet-item">
                            <div class="wallet-item-inner">
                                <div class="wallet-thumb">
                                    <a href="signin.html">
                                        <img src="{{ asset('assets2/images/wallet/01.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="signin.html">Autherum</a></h5>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="wallet-item">
                            <div class="wallet-item-inner">
                                <div class="wallet-thumb">
                                    <a href="signin.html">
                                        <img src="{{ asset('assets2/images/wallet/02.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="signin.html">Bitski</a></h5>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="wallet-item">
                            <div class="wallet-item-inner">
                                <div class="wallet-thumb">
                                    <a href="signin.html">
                                        <img src="{{ asset('assets2/images/wallet/03.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="signin.html">Coinbase</a></h5>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="wallet-item">
                            <div class="wallet-item-inner">
                                <div class="wallet-thumb">
                                    <a href="signin.html">
                                        <img src="{{ asset('assets2/images/wallet/04.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="signin.html">Dapper</a></h5>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="wallet-item">
                            <div class="wallet-item-inner">
                                <div class="wallet-thumb">
                                    <a href="signin.html">
                                        <img src="{{ asset('assets2/images/wallet/05.png') }}" alt="wallet-img">
                                    </a>
                                </div>
                                <div class="wallet-content">
                                    <h5><a href="signin.html">Portis</a></h5>
                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <br>
                <hr>
                <h3 class="mb-3">*Lưu ý khi nạp tiền:</h3>
                <p class="mt-5 mb-0 wallet-notice"><span class="me-1 theme-color">
                        <i class="icofont-bulb-alt"></i></span> - Vui lòng điền chính xác nội dung chuyển khoản để thực hiện
                    nạp tiền tự động.</p>
                <p class="mt-5 mb-0 wallet-notice"><span class="me-1 theme-color">
                        <i class="icofont-bulb-alt"></i></span>- Tiền sẽ vào tài khoảng trong vòng 1-10 phút kể từ khi giao
                    dịch thành công. Tuy nhiên đôi lúc do
                    một
                    vài lỗi khách quan, tiền có thể sẽ vào chậm hơn một chút.</p>
                <p class="mt-5 mb-0 wallet-notice"><span class="me-1 theme-color">
                        <i class="icofont-bulb-alt"></i></span>- Vietcombank trong khoảng 23-3h không thể kiểm tra lịch sử
                    giao dịch, các giao dịch trong khung giờ
                    này có thể mất từ 15 phút đến 2 giờ tiền mới vào tài khoản. Bạn có thể tránh nạp tiền trong khung
                    giờ này để đỡ mất thời gian chờ đợi nhé.</p>
                <p class="mt-5 mb-0 wallet-notice"><span class="me-1 theme-color">
                        <i class="icofont-bulb-alt"></i></span>- Nếu quá lâu không thấy cập nhật số dư, Vui lòng liên hệ hỗ
                    trợ viên: <a href="signup.html">Tại đây.</a></p>

            </div>
        </div>
    </section>
    <!-- ==========wallet Section ends Here========== -->
    
   
@endsection 

