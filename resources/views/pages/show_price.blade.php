@extends('site_app')

@section('head_title', trans('words.subscription_plan').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')


    <div class="page-header">
        <div class="vfx_page_header_overlay">
            <div class="container">
                <div class="vfx_breadcrumb">
                    <ul>
                        <li><a href="{{ URL::to('dashboard') }}">{{trans('words.home')}}</a></li>
                        <li>{{trans('words.subscription_plan')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-wrap">
        <div class="section section-padding">
            <div class="container">
                <div class="row">

{{--                    @foreach($plan_list as $plan_data)--}}
{{--                        <div class="col-md-3 col-sm-4 col-xs-12">--}}
{{--                            <div class="member-ship-option select_plan">--}}
{{--                                <h5 class="color-up">{{$price_packages->one_day_price}}<span>{{getcong('currency_code')}}</span><p class="premuim-memplan">For {{ App\SubscriptionPlan::getPlanDuration($plan_data->id) }}</p></h5>--}}
{{--                                <p>{{$plan_data->plan_name}}</p>--}}
{{--                                <a href="{{ URL::to('payment_method/'.$plan_data->id) }}">{{trans('words.select_plan')}}</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="member-ship-option select_plan">
                                                    <h5 class="color-up">{{$price_packages->one_day_price}}<span>{{getcong('currency_code')}}</span><p class="premuim-memplan"></p></h5>
                                                    <p>One Day</p>
                                                    <a href="{{ URL::to('payment_method/'.$price_packages['id'].'?type=day') }}">{{trans('words.select_plan')}}</a>
                                                </div>
                                            </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="member-ship-option select_plan">
                            <h5 class="color-up">{{$price_packages->one_month_price}}<span>{{getcong('currency_code')}}</span><p class="premuim-memplan"></p></h5>
                            <p>One Month</p>

                            <a href="{{ URL::to('payment_method/'.$price_packages->id.'?type=month') }}">{{trans('words.select_plan')}}</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="member-ship-option select_plan">
                            <h5 class="color-up">{{$price_packages->one_year_price}}<span>{{getcong('currency_code')}}</span><p class="premuim-memplan"></p></h5>
                            <p>One Year</p>

                            <a href="{{ URL::to('payment_method/'.$price_packages->id.'?type=year') }}">{{trans('words.select_plan')}}</a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="member-ship-option select_plan">
                            <h5 class="color-up">{{$price_packages->life_time_price}}<span>{{getcong('currency_code')}}</span><p class="premuim-memplan"></p></h5>
                            <p>Life Time</p>

                            <a href="{{ URL::to('payment_method/'.$price_packages->id.'?type=lifetime') }}">{{trans('words.select_plan')}}</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



@endsection
