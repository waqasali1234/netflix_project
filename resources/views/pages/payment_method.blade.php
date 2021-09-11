@extends('site_app')

@section('head_title', trans('words.payment_method').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')


<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="{{ URL::to('dashboard') }}">{{trans('words.dashboard_text')}}</a></li>
         <li>{{trans('words.payment_method')}}</li>
      </ul>
    </div>
  </div>
  </div>
</div>

<div class="main-wrap">
  <div class="section section-padding">
    <div class="container">
        <div class="membership_plan_block">

        <div class="row">
          <div class="col-md-6 col-sm-4 col-xs-12 membership_plan_dtl">
            <h5>{{trans('words.payment_method')}}</h5>
            <p>{{trans('words.you_have_selected')}} <b></b></p>
            <p>{{trans('words.you_are_logged')}} <b>{{Auth::User()->email}}</b> {{trans('words.if_you_would_like')}}<br>{{trans('words.different_account_subscription')}}, <a href="{{ URL::to('logout') }}">{{trans('words.logout')}}</a> {{trans('words.now')}}.</p>
{{--            <a href="{{ URL::to('membership_plan') }}" class="btn btn-primary" onclick="">{{trans('words.change_plan')}}</a>--}}
          </div>

        <div class="col-md-6 col-sm-4 col-xs-12">
        @if(getcong('paypal_payment_on_off')==1)
        <div class="col-md-6 col-sm-4 col-xs-12">
          <div class="member-ship-option select_plan">
            <span><img src="{{ URL::asset('site_assets/images/icons/ic_paypal.png') }}" alt="paypal" /></span>
            <p>{{trans('words.pay_with_paypal')}}</p>
            <form class="" method="POST" id="payment-form" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
            {{ csrf_field() }}
            <input id="plan_id" type="hidden" class="form-control" name="plan_id" value="">
            <input id="amount" type="hidden" class="form-control" name="amount" value="">
            <input id="plan_name" type="hidden" class="form-control" name="plan_name" value="">
            <button type="submit" class="pure-button btn btn-primary" style="margin-top: 14px;">{{trans('words.pay_now')}}</button>
            </form>
           </div>
        </div>
        @endif

            @if(getcong('bitcoin_payment_on_off')==1)
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <div class="member-ship-option select_plan">
                        <span><img src="{{url('images/icons/ic_bitcoin.png')}}" alt="stripe"/></span>
                        <p>Pay With Bitcoin</p>
{{--                        <button class="btn cryptochill-button theme-button continue-button-two"--}}
{{--                                data-amount="{{$price1}}"--}}
{{--                                data-currency="USD"--}}
{{--                                data-product=""--}}
{{--                                data-passthrough=""--}}
{{--                                data-show-payment-url="true">--}}
{{--                            Pay {{$price1}} USD--}}
{{--                        </button>--}}
                        <form method="post" action="{{url('payment_save')}}">
                            @csrf
                            <input type="text" name="amount" value="{{$price1}}">
                            <input type="text" name="plan" value="{{$plan}}">
                            <input type="hidden" name="movie_id" value="{{$movie_id}}">
                            <input type="hidden" name="user_id" value="{{$user_id}}">
                            <input type="hidden" name="video_slug" value="{{$video_slug}}">
                            <input type="hidden" name="video_access" value="{{$video_access}}">
                            <input type="hidden" name="video_title" value="{{$video_title}}">
                            <input type="hidden" name="duration" value="{{$duration}}">
                            <input type="hidden" name="video_image_thumb" value="{{$video_image_thumb}}">
                            <button type="submit">pay now</button>
                        </form>
                    </div>
                </div>
            @endif

        @if(getcong('stripe_payment_on_off')==1)
        <div class="col-md-6 col-sm-4 col-xs-12">
          <div class="member-ship-option select_plan">
            <span><img src="{{ URL::asset('site_assets/images/icons/ic_stripe.png') }}" alt="stripe" /></span>
            <p>{{trans('words.pay_with_stripe')}}</p>
            <a href="{{ URL::to('stripe/'.$plan_info->id) }}">{{trans('words.pay_now')}}</a>
          </div>
        </div>
        @endif

        @if(getcong('razorpay_payment_on_off')==1)
        <div class="col-md-6 col-sm-4 col-xs-12">
          <div class="member-ship-option select_plan">
            <span><img src="{{ URL::asset('site_assets/images/icons/razorpay.png') }}" alt="razorpay" /></span>
            <p>{{trans('words.pay_with_razorpay')}}</p>
            <a href="{{ URL::to('razorpay/') }}">{{trans('words.pay_now')}}</a>
          </div>
        </div>
        @endif


        @if(getcong('paystack_payment_on_off')==1)
        <div class="col-md-6 col-sm-4 col-xs-12">
          {!! Form::open(array('url' => 'pay','class'=>'','id'=>'','role'=>'form','method'=>'POST')) !!}
          <input type="hidden" name="amount" value="{{number_format($plan_info->plan_price,2)}}">
          <div class="member-ship-option select_plan">
            <span><img src="{{ URL::asset('site_assets/images/icons/paystack.png') }}" alt="paystack" /></span>
            <p>{{trans('words.pay_with_paystack')}}</p>
            <button type="submit" class="pure-button btn btn-primary">{{trans('words.pay_now')}}</button>
          </div>
          {!! Form::close() !!}
        </div>

        @endif
      </div>
        </div>
    </div>
  </div>
</div>

    <script src="https://static.cryptochill.com/static/js/sdk.js"></script>
    <script>

        function onPaymentOpen(data, code) {

            // console.log(data)


            $.post("{{route('bitcoin_success')}}",
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    data: data,
                },
                function(data, status){
                    // console.log('done')
                    // location.reload();
                    return false;
                });
        }

        CryptoChill.setup({
            account: "{{\App\Settings::first()->bitcoin_account_id}}",
            profile: "{{\App\Settings::first()->bitcoin_profile_id}}",

            // Event callbacks
            onOpen: onPaymentOpen,
            // onSuccess: onPaymentSuccess,
            // onCancel: onPaymentCancel
        })
    </script>


@endsection
