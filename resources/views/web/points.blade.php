@extends('web.layout')
@section('content')
<!-- wishlist Content -->
<style>
    .wishlist-content .media-main .media img {
        width: auto;
         !important;
        height: 160px;
        border: 1px solid #ddd;
        margin-right: 1rem;
    }

    .wishlist-content .media-main .media {
        padding: 20px 2px;
         !important;
    }

    .price span {
        color: #6c757d;
        text-decoration: line-through;
        margin-left: 10px;
        font-size: 1.075rem;
        line-height: 1.5;
        color: #6c757d !important;
    }

    h5 {

        text-align: center;
        line-height: 250px;

    }

</style>
<section class="wishlist-content my-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="heading">
                    <h2>
                        @lang('website.My Account')
                    </h2>
                    <hr>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="nav-link" href="{{ URL::to('/profile')}}">
                            <i class="fas fa-user"></i>
                            @lang('website.Profile')
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="{{ URL::to('/wishlist')}}">
                            <i class="fas fa-heart"></i>
                            @lang('website.Wishlist')
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="{{ URL::to('/orders')}}">
                            <i class="fas fa-shopping-cart"></i>
                            @lang('website.Orders')
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="{{ URL::to('/points')}}">
                            <i class="fas fa-coins"></i>
                            @lang('website.Points')
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="{{ URL::to('/shipping-address')}}">
                            <i class="fas fa-map-marker-alt"></i>
                            @lang('website.Shipping Address')
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="{{ URL::to('/logout')}}">
                            <i class="fas fa-power-off"></i>
                            @lang('website.Logout')
                        </a>
                    </li>
                </ul>

            </div>

            <div class="col-12 col-lg-9 media-main" style="padding: 21px;">
                <div class="heading">
                    <h2>
                        @lang('website.Points')
                    </h2>
                    <hr>
                </div>
                @if($result['finalpoints'] !=null )
                <div class="coupandiv">

                    <h2> @lang('website.Points') : {{$result['finalpoints']->points }}</h2>

                </div>

                <div class="container mt-5">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-4">
                            <div class="coupon p-3 bg-white">
                                <div class="row no-gutters">

                                    <div class="col-md-8">
                                        <div>
                                            <div class="d-flex flex-row justify-content-end off">
                                                <h1>AED 100</h1><span>OFF</span>
                                            </div>
                                            <div class="d-flex flex-row justify-content-between off px-3 p-2">
                                                <span class="border border-success px-3 rounded code pointcoupan"
                                                    data-savemonet="100">Generate</span></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="coupon p-3 bg-white">
                                <div class="row no-gutters">

                                    <div class="col-md-8">
                                        <div>
                                            <div class="d-flex flex-row justify-content-end off">
                                                <h1>AED 1000</h1><span>OFF</span>
                                            </div>
                                            <div class="d-flex flex-row justify-content-between off px-3 p-2">
                                                <span class="border border-success px-3 rounded code pointcoupan"
                                                    data-savemonet="1000">Generate</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="coupon p-3 bg-white">
                                <div class="row no-gutters">

                                    <div class="col-md-8">
                                        <div>
                                            <div class="d-flex flex-row justify-content-end off">
                                                <h1>AED 10000</h1><span>OFF</span>
                                            </div>
                                            <div class="d-flex flex-row justify-content-between off px-3 p-2">
                                                <span class="border border-success px-3 rounded code pointcoupan"
                                                    data-savemonet="10000">Generate</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table">

                    <thead>
                        <tr>
                            <th class="col-12 col-md-2">S.no</th>
                            <th class="col-12 col-md-4">Coupon Code</th>
                            <th class="col-12 col-md-3">Price</th>
                            <th class="col-12 col-md-3">Status</th>
                            <th class="col-12 col-md-3">Validity date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if($result['customerpointcoupon']->count() > 0)
                        @foreach($result['customerpointcoupon'] as $pointcoupon)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="clipboard">
                                    <input onclick="copy('{{$pointcoupon->coupon_code}}',this)" val="{{$pointcoupon->coupon_code}}" class="copy-input" value="{{$pointcoupon->coupon_code}}"
                                        id="copyClipboard" readonly>
                                    <button class="copy-btn" id="copyButton" onclick="copy('{{$pointcoupon->coupon_code}}',this)" value="{{$pointcoupon->coupon_code}}"><i
                                            class="far fa-copy"></i></button>
                                </div>
                                <div id="copied-success" class="copied">
                                    <span>Copied!</span>
                                </div>
                                <style>
                                    .coupon {
                                        border-radius: 12px;
                                        box-shadow: 5px 8px 10px #d6d5d533;
                                        border: 1px solid #000
                                    }

                                    body {
                                        background: rgb(251, 253, 255)
                                    }

                                    .code:hover {
                                        background: green;
                                        color: #fff;
                                        cursor: pointer
                                    }

                                    .clipboard {
                                        position: relative;
                                        `
                                    }

                                    /* You just need to get this field */
                                    .copy-input {
                                        max-width: 275px;
                                        width: 100%;
                                        cursor: pointer;
                                        background-color: #eaeaeb;
                                        border: none;
                                        color: #6c6c6c;
                                        font-size: 14px;
                                        border-radius: 5px;
                                        padding: 15px 45px 15px 15px;
                                        font-family: 'Montserrat', sans-serif;
                                    }

                                    .copy-input:focus {
                                        outline: none;
                                    }

                                    .copy-btn {
                                        width: 40px;
                                        background-color: #eaeaeb;
                                        font-size: 18px;
                                        padding: 6px 9px;
                                        border-radius: 5px;
                                        border: none;
                                        color: #6c6c6c;
                                        margin-left: 90px;
                                        transition: all .4s;
                                    }

                                    .copy-btn:hover {
                                        transform: scale(1.3);
                                        color: #1a1a1a;
                                        cursor: pointer;
                                    }

                                    .copy-btn:focus {
                                        outline: none;
                                    }

                                    .copied {
                                        font-family: 'Montserrat', sans-serif;
                                        width: 100px;
                                        opacity: 0;
                                        position: fixed;
                                        bottom: 20px;
                                        left: 0;
                                        right: 0;
                                        margin: auto;
                                        color: #fff;
                                        padding: 15px 15px;
                                        background-color: #000;
                                        border-radius: 5px;
                                        transition: .4s opacity;
                                    }

                                </style>
                            </td>
                            <td>AED {{ $pointcoupon->coupon_price}}</td>
                            <td>
                                <span class="alert alert-success">Pending</span>
                            </td>
                            <td>

                                {{ date("d/m/Y",strtotime($pointcoupon->coupon_expiry)) }}





                            </td>


                        </tr>
                        @endforeach

                        @else
                        <tr>
                            <td colspan="4">@lang('website.No record found')</td>
                        </tr>
                        @endif



                    </tbody>
                </table>

                @else

                <h5> @lang('website.No record found') </h5>

                @endif
                <!-- ............the end..... -->
            </div>
        </div>
    </div>
</section>
<script>
    function copy(code,obj) {
        // console.log(obj.value);
        // return 0;
//   let copyText = document.getElementById("copyClipboard");
  var copySuccess = document.getElementById("copied-success");
//   obj.select();
//   obj.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(code);
// window.alert('text copied');
 copySuccess.style.opacity = "1";
//  setTimeout(function(){ copySuccess.style.opacity = "1" }, 2000);
 setInterval(() => {
	copySuccess.style.opacity = "0"
                      }, 1500);
}
</script>
@endsection
