<?php

namespace App\Http\Controllers;

use App\Payment;
use App\RecentlyWatched;
use Auth;
use App\User;
use App\Slider;
use App\Series;
use App\Movies;
use App\HomeSection;
use App\SubscriptionPlan;
use App\Transactions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Session;


class UserController extends Controller
{

    public function dashboard()
    {
        if(!Auth::check())
        {

            \Session::flash('error_flash_message', trans('words.access_denied'));

            return redirect('login');

        }

        if(Auth::user()->usertype=='Admin' OR Auth::user()->usertype=='Sub_Admin')
        {
            return redirect('admin/dashboard');
        }

        $user_id=Auth::user()->id;
        $user = User::findOrFail($user_id);

        $count_movies = DB::table('payments')->where('user_id', $user_id)->count();

        $plan = DB::table('payments')->select('plan')->where('user_id', $user_id)->get();
        $total_pay = DB::table('payments')->where('user_id', $user_id)->sum('amount');

        $movies_list = DB::table('payments')->where('user_id', $user_id)->get();


        return view('pages.dashboard',compact('user','count_movies','total_pay','plan','movies_list'));



//        $pl =Payment::where('user_id', $user_id)->get();
//       dd('here');

//        $movies=Movies::where('id',$user_id)->get();
//        dd($movies);
//        $movies=DB::select('SELECT * FROM movie_videos
//                       INNER JOIN payments
//                           ON movie_videos.id = payments.movie_id');


    }

    public function profile()
    {

        if(!Auth::check())
       {

            \Session::flash('error_flash_message', trans('words.access_denied'));

            return redirect('login');

        }

        if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
            return redirect('admin');
        }

        $user_id=Auth::user()->id;
        $user = User::findOrFail($user_id);

        return view('pages.profile',compact('user'));
    }


    public function editprofile(Request $request)
    {

        $id=Auth::user()->id;
        $user = User::findOrFail($id);

        $data =  \Request::except(array('_token'));

        $rule=array(
                'name' => 'required',
                'email' => 'required|email|max:255|unique:users,email,'.$id,
                'user_image' => 'mimes:jpg,jpeg,gif,png'
                 );

         $validator = \Validator::make($data,$rule);

            if ($validator->fails())
            {
                    return redirect()->back()->withErrors($validator->messages());
            }


        $inputs = $request->all();

        $icon = $request->file('user_image');


        if($icon){

            \File::delete(public_path('/upload/').$user->user_image);

            //$tmpFilePath = public_path().'/upload/';
            $tmpFilePath = public_path('/upload/');

            $hardPath =  Str::slug($inputs['name'], '-').'-'.md5(time());

            $img = Image::make($icon);

            $img->fit(250, 250)->save($tmpFilePath.$hardPath.'-b.jpg');
            //$img->fit(80, 80)->save($tmpFilePath.$hardPath. '-s.jpg');

            $user->user_image = $hardPath.'-b.jpg';
        }


        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->phone = $inputs['phone'];
        $user->user_address = $inputs['user_address'];

        if($inputs['password'])
        {
            $user->password = bcrypt($inputs['password']);
        }

        $user->save();

        Session::flash('flash_message', trans('words.successfully_updated'));

        return redirect()->back();


    }

    public function membership_plan()
    {

        if(!Auth::check())
       {

            \Session::flash('error_flash_message', trans('words.access_denied'));

            return redirect('login');

        }

        if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
        {
            return redirect('admin');
        }


        $plan_list = SubscriptionPlan::where('status','1')->orderby('id')->get();

        return view('pages.membership_plan',compact('plan_list'));
    }


    public function show_price($id){
        $user_id= Auth::user()->id;

        $data=Movies::find($id);
//        dd($data->id);
        $payment = Payment::where('movie_id', $data->id)->where('user_id',$user_id)->first();

//        $payment = Payment::where('movie_id', $data->id)->first();
        if($payment==null){
            if(!Auth::check())
            {

                \Session::flash('error_flash_message', trans('words.access_denied'));

                return redirect('login');

            }

            if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
            {
                return redirect('admin');
            }


            $plan_list = SubscriptionPlan::where('status','1')->orderby('id')->get();
//        $plan_list = SubscriptionPlan::find($id);
            $price_packages=Movies::find($id);
            return view('pages.show_price',compact('plan_list','price_packages'));

        }
        else{
            $movies_info=Movies::find($id);
            $user = Payment::where('movie_id',$id)->get();

            return view('pages.pad_movie',compact('movies_info','user'));
        }
           }
    public function payment_save(Request $request){
        $data=new Payment();
        $data->movie_id=$request->movie_id;
        $data->plan=$request->plan;
        $data->amount=$request->amount;
        $data->user_id=$request->user_id;
        $data->video_slug=$request->video_slug;
        $data->video_access=$request->video_access;
        $data->video_title=$request->video_title;
        $data->duration=$request->duration;
        $data->video_image_thumb=$request->video_image_thumb;
        if($request->plan=='day'){
            $data->expiry_date= date('Y-m-d', strtotime("+1 day"));

        }
        if($request->plan=='month'){
            $data->expiry_date= date('Y-m-d', strtotime("+30 day"));

        }
        if($request->plan=='year'){
            $data->expiry_date= date('Y-m-d', strtotime("+360 day"));

        }
        if($request->plan=='lifetime'){
            $data->expiry_date= date('Y-m-d', strtotime("+3600 day"));

        }

        $data->save();

        return redirect('dashboard');
    }

    public function payment_method(Request $request, $plan_id)
    {
       $user_id= Auth::user()->id;

        $data=Movies::find($plan_id);
//        $payment = Payment::where('movie_id', $data->id)->where('user_id',$user_id)->first();
//        $user = Payment::where('user_id',$user_id)->get();
//        if($payment==null){
            if($request->type=='day'){

                $price1=$data->one_day_price;
                $plan=$request->type;
                $movie_id=$data->id;
                $video_slug=$data->video_slug;
                $video_access=$data->video_access;
                $video_title=$data->video_title;
                $duration=$data->duration;
                $video_image_thumb=$data->video_image_thumb;

                $user_id= Auth::user()->id;


                return view('pages.payment_method',compact('price1'
                    ,'plan',
                    'movie_id','user_id','duration','video_access','video_image_thumb',
                    'video_title','video_slug'));

            }
            if($request->type=='month'){

                $price1=$data->one_month_price;
                $plan=$request->type;
                $movie_id=$data->id;
                $video_slug=$data->video_slug;
                $video_access=$data->video_access;
                $video_title=$data->video_title;
                $duration=$data->duration;
                $video_image_thumb=$data->video_image_thumb;

                $user_id= Auth::user()->id;


                return view('pages.payment_method',compact('price1'
                    ,'plan',
                    'movie_id','user_id','duration','video_access','video_image_thumb',
                    'video_title','video_slug'));
            }
            if($request->type=='year'){
                $price1=$data->one_year_price;
                $plan=$request->type;
                $movie_id=$data->id;
                $video_slug=$data->video_slug;
                $video_access=$data->video_access;
                $video_title=$data->video_title;
                $duration=$data->duration;
                $video_image_thumb=$data->video_image_thumb;

                $user_id= Auth::user()->id;


                return view('pages.payment_method',compact('price1'
                    ,'plan',
                    'movie_id','user_id','duration','video_access','video_image_thumb',
                    'video_title','video_slug'));
            }
            if($request->type=='lifetime'){
                $price1=$data->life_time_price;
                $plan=$request->type;
                $movie_id=$data->id;
                $video_slug=$data->video_slug;
                $video_access=$data->video_access;
                $video_title=$data->video_title;
                $duration=$data->duration;
                $video_image_thumb=$data->video_image_thumb;

                $user_id= Auth::user()->id;


                return view('pages.payment_method',compact('price1'
                    ,'plan',
                    'movie_id','user_id','duration','video_access','video_image_thumb',
                    'video_title','video_slug'));
            }
//        }
//        else{
//            $movies_info=Movies::find($plan_id);
//        $user = Payment::where('user_id',$user_id)->get();
////dd($user);
//
//            return view('pages.pad_movie',compact('movies_info','user'));
//        }



//        dd($request);

//        if(!Auth::check())
//        {
//            \Session::flash('error_flash_message', trans('words.access_denied'));
//            return redirect('login');
//        }
//        if(Auth::User()->usertype=="Admin" OR Auth::User()->usertype=="Sub_Admin")
//        {
//            return redirect('admin');
//        }
//
//        $plan_info = SubscriptionPlan::where('id',$plan_id)->where('status','1')->first();
//
//        if(!$plan_info)
//        {
//            \Session::flash('flash_message', 'Select plan!');
//            return redirect('membership_plan');
//        }
//
//        //For free plan
//        if($plan_info->plan_price <=0)
//        {
//            $plan_days=$plan_info->plan_days;
//            $plan_amount=$plan_info->plan_price;
//
//            $currency_code=getcong('currency_code')?getcong('currency_code'):'USD';
//
//            $user_id=Auth::user()->id;
//            $user = User::findOrFail($user_id);
//
//            $user->plan_id = $plan_id;
//            $user->start_date = strtotime(date('m/d/Y'));
//            $user->exp_date = strtotime(date('m/d/Y', strtotime("+$plan_days days")));
//
//            $user->plan_amount = $plan_amount;
//            //$user->subscription_status = 0;
//            $user->save();
//
//
//            $payment_trans = new Transactions;
//
//            $payment_trans->user_id = Auth::user()->id;
//            $payment_trans->email = Auth::user()->email;
//            $payment_trans->plan_id = $plan_id;
//            $payment_trans->gateway = 'NA';
//            $payment_trans->payment_amount = $plan_amount;
//            $payment_trans->payment_id = '-';
//            $payment_trans->date = strtotime(date('m/d/Y H:i:s'));
//            $payment_trans->save();
//
//            Session::flash('plan_id',Session::get('plan_id'));
//
//            \Session::flash('success',trans('words.payment_success'));
//             return redirect('dashboard');
//        }
//
//        Session::put('plan_id', $plan_id);
//        Session::flash('razorpay_order_id',Session::get('razorpay_order_id'));

    }

}
