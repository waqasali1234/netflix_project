@extends('site_app')

@section('head_title', trans('words.dashboard_text').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
{{--    <div class="show-listing vfx_movie_list_item">--}}

{{--        @foreach($movies_list as $movies_data)--}}
{{--                                        <div class="col-md-2 col-sm-4 col-xs-6">--}}
{{--                                            <div class="vfx_video_item">--}}
{{--                                                <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.$movies_data->video_image_thumb)}}" alt="{{$movies_data->video_title}}">--}}

{{--                                                    <div class="thumb-hover">--}}

{{--                                                        <i class="icon fa fa-play"></i><span class="ripple"></span>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="vfx_video_detail">--}}
{{--                                                    <h4 class="vfx_video_title"><a href="{{ URL::to('movies/'.$movies_data->video_slug.'/'.$movies_data->movie_id) }}">{{Str::limit(stripslashes($movies_data->video_title),12)}}</a></h4>--}}
{{--                                                    <p class="vfx_video_length"><i class="fa fa-clock-o"></i> {{$movies_data->duration}}</p>--}}
{{--                                                    <h4 class="vfx_video_title"><a href="{{'show_price/'.$movies_data->movie_id}}">Price</a></h4>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}


{{--                @endforeach--}}

{{--    </div>--}}

<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="{{ URL::to('/') }}">{{trans('words.home')}}</a></li>
         <li>{{trans('words.dashboard_text')}}</li>
      </ul>
    </div>
    </div>
  </div>
</div>
<div class="main-wrap">
  <div class="section section-padding ">

    <div class="container">

       @if(Session::has('flash_message'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  {{ Session::get('flash_message') }}
              </div>
        @endif
        @if(Session::has('success'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  {{ Session::get('success') }}
              </div>
        @endif
        @if(Session::has('error_flash_message'))
              <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  {{ Session::get('error_flash_message') }}
              </div>
        @endif
        <div class="col-md-12 col-sm-12 col-xs-12 profile-sec-1 card-1">
            <div class="col-md-3 col-sm-4">
              <div class="img-profile">
                @if(Auth::User()->user_image)
                  <img src="{{ URL::asset('upload/'.Auth::User()->user_image) }}" class="img-rounded" alt="profile_img">
                @else
                  <img src="{{ URL::asset('site_assets/images/avatar.jpg') }}" class="img-rounded" alt="profile_img">
                @endif
              </div>
        <div class="profile_title_item">
          <h5>{{Auth::User()->name}}</h5>
          <p>{{Auth::User()->email}}</p>
          <a href="{{ URL::to('profile') }}" class="pure-button btn btn-primary">{{trans('words.edit')}}</a>
        </div>
            </div>
            <div class="col-md-9">
                @foreach($movies_list as $movies_data)
                                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                                            <div class="vfx_video_item">
                                                                <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.$movies_data->video_image_thumb)}}" alt="{{$movies_data->video_title}}">

                                                                    <div class="thumb-hover">

                                                                        <i class="icon fa fa-play"></i><span class="ripple"></span>

                                                                    </div>
                                                                </div>
                                                                <div class="vfx_video_detail">
                                                                    <h4 class="vfx_video_title"><a href="{{ URL::to('movies/'.$movies_data->video_slug.'/'.$movies_data->movie_id) }}">{{Str::limit(stripslashes($movies_data->video_title),12)}}</a></h4>
                                                                    <p class="vfx_video_length"><i class="fa fa-clock-o"></i> {{$movies_data->duration}}</p>
                                                                    <h4 class="vfx_video_title"><a href="{{'show_price/'.$movies_data->movie_id}}">Play Video</a></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>


                                @endforeach
{{--              <div class="col-md-6 col-sm-6">--}}
{{--                <div class="member-ship-option">--}}
{{--                  <h5 class="color-up">{{trans('words.my_subscription')}}</h5>--}}

{{--                  @if($user->plan_id!=0)--}}

{{--                  <p class="premuim-memplan"><b>{{trans('words.current_plan')}}:</b> {{\App\SubscriptionPlan::getSubscriptionPlanInfo($user->plan_id,'plan_name')}}</p>--}}

{{--                  @if($user->exp_date)<p>{{trans('words.subscription_expires_on')}} <b>{{date('F,  d, Y',$user->exp_date)}}</b></p>@endif--}}

{{--                  <div>--}}
{{--                      <a href="{{ URL::to('membership_plan') }}" class="member-a" onclick="">{{trans('words.upgrade_plan')}} </a>--}}
{{--                  </div>--}}

{{--                  @else--}}

{{--                  <div>--}}
{{--                      <a href="{{ URL::to('membership_plan') }}" class="member-a" onclick="">{{trans('words.select_plan')}} </a>--}}
{{--                  </div>--}}

{{--                  @endif--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="col-md-6 col-sm-6">--}}
{{--                <div class="member-ship-option">--}}
{{--                  <h5 class="color-up">{{trans('words.last_invoice')}}</h5>--}}
{{--                  <p class="premuim-memplan"><b>{{trans('Plans')}}:</b> <span class="mem-span">--}}
{{--                          @if($user->start_date){{date('F,  d, Y',$user->start_date)}}@endif--}}
{{--                          @foreach($plan as $plan)--}}
{{--                          {{$plan->plan}} ,--}}
{{--                          @endforeach--}}
{{--                      </span></p>--}}
{{--                  <p class="premuim-memplan"><b>{{trans('Total movies')}}:</b> <span class="mem-span">--}}
{{--                          {{\App\SubscriptionPlan::getSubscriptionPlanInfo($user->plan_id,'plan_name')}}--}}
{{--                          {{$count_movies}}--}}
{{--                      </span></p>--}}
{{--                  <p class="premuim-memplan"><b>{{trans('Total Paid Amount')}}:</b> <span class="mem-span">--}}
{{--                          @if($user->plan_amount){{number_format($user->plan_amount,2,'.', '') }}@endif--}}
{{--                          {{$total_pay}}--}}
{{--                      </span></p>--}}
{{--                </div>--}}
{{--              </div>--}}
            </div>
        </div>
    </div>
  </div>
</div>




@endsection
