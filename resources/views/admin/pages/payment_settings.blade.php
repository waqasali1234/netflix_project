@extends("admin.admin_app")

@section("content")

<style type="text/css">
  .iframe-container {
  overflow: hidden;
  padding-top: 56.25% !important;
  position: relative;
}

.iframe-container iframe {
   border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;
}
</style>

  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('flash_message'))
                      <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          {{ Session::get('flash_message') }}
                      </div>
                @endif


                 {!! Form::open(array('url' => array('admin/payment_settings'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')) !!}

                  <input type="hidden" name="id" value="{{ isset($settings->id) ? $settings->id : null }}">


                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.currency_code')}}* <br/><small id="emailHelp" class="form-text text-muted">If you don't know <a href="https://developer.paypal.com/docs/api/reference/currency-codes/" target="_blank">click here</a></small></label>
                    <div class="col-sm-8">
                      <input type="text" name="currency_code" value="{{ isset($settings->currency_code) ? $settings->currency_code : null }}" class="form-control">
                    </div>
                  </div>
                  <br/>

                 <h5 class="m-b-5"><i class="fa fa-cc-paypal"></i> <b>Paypal Settings</b></h5>
                 <small id="emailHelp" class="form-text text-muted">For more info <a href="https://developer.paypal.com/docs/integration/admin/manage-apps/#create-or-edit-sandbox-and-live-apps" target="_blank">click here</a></small>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.paypal_payment')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="paypal_payment_on_off">

                                <option value="1" @if($settings->paypal_payment_on_off=="1") selected @endif>ON</option>
                                <option value="0" @if($settings->paypal_payment_on_off=="0") selected @endif>OFF</option>

                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.payment_mode')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="paypal_mode">
                                <option value="sandbox" @if($settings->paypal_mode=="sandbox") selected @endif>Sandbox</option>
                                <option value="live" @if($settings->paypal_mode=="live") selected @endif>Live</option>
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.paypal_client_id')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="paypal_client_id" value="{{ isset($settings->paypal_client_id) ? $settings->paypal_client_id : null }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.paypal_secret')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="paypal_secret" value="{{ isset($settings->paypal_secret) ? $settings->paypal_secret : null }}" class="form-control">
                    </div>
                  </div>
                  <br/>

                    <h5 class="m-b-5"><b>Bitcoin Settings</b></h5>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Bitcoin Payment</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="bitcoin_payment_on_off">

                                <option value="1" @if($settings->bitcoin_payment_on_off=="1") selected @endif>ON</option>
                                <option value="0" @if($settings->bitcoin_payment_on_off=="0") selected @endif>OFF</option>

                            </select>
                        </div>
                    </div>

{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-3 col-form-label">Cryptochill Api key</label>--}}
{{--                        <div class="col-sm-8">--}}
{{--                            <input type="text" name="bitcoin_client_id" value="{{ isset($settings->bitcoin_client_id) ? $settings->bitcoin_client_id : null }}" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label class="col-sm-3 col-form-label">Cryptochill Api Secret key</label>--}}
{{--                        <div class="col-sm-8">--}}
{{--                            <input type="text" name="bitcoin_secret" value="{{ isset($settings->bitcoin_secret) ? $settings->bitcoin_secret : null }}" class="form-control">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Cryptochill Account ID</label>
                        <div class="col-sm-8">
                            <input type="text" name="bitcoin_account_id" value="{{ isset($settings->bitcoin_account_id) ? $settings->bitcoin_account_id : null }}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Cryptochill Profile ID</label>
                        <div class="col-sm-8">
                            <input type="text" name="bitcoin_profile_id" value="{{ isset($settings->bitcoin_profile_id) ? $settings->bitcoin_profile_id : null }}" class="form-control">
                        </div>
                    </div>
                    <br/>


                  <h5 class="m-b-5"><i class="fa fa-cc-stripe"></i> <b>Stripe Settings</b></h5>
                 <small id="emailHelp" class="form-text text-muted">For more info <a href="https://support.stripe.com/questions/locate-api-keys" target="_blank">click here</a></small>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.stripe_payment')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="stripe_payment_on_off">

                                <option value="1" @if($settings->stripe_payment_on_off=="1") selected @endif>ON</option>
                                <option value="0" @if($settings->stripe_payment_on_off=="0") selected @endif>OFF</option>

                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.stripe_secret_key')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="stripe_secret_key" value="{{ isset($settings->stripe_secret_key) ? $settings->stripe_secret_key : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.stripe_publishable_key')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="stripe_publishable_key" value="{{ isset($settings->stripe_publishable_key) ? $settings->stripe_publishable_key : null }}" class="form-control">
                    </div>
                  </div>
                  <br/>
                  <h5 class="m-b-5"><i class="fa fa-rupee"></i> <b>Razorpay Settings</b></h5>
                 <small id="emailHelp" class="form-text text-muted">For more info <a href="https://razorpay.com/docs/payment-gateway/dashboard-guide/settings/#api-keys" target="_blank">click here</a></small>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.razorpay_payment')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="razorpay_payment_on_off">

                                <option value="1" @if($settings->razorpay_payment_on_off=="1") selected @endif>ON</option>
                                <option value="0" @if($settings->razorpay_payment_on_off=="0") selected @endif>OFF</option>

                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.razorpay_key_id')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="razorpay_key" value="{{ isset($settings->razorpay_key) ? $settings->razorpay_key : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.razorpay_key_secret')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="razorpay_secret" value="{{ isset($settings->razorpay_secret) ? $settings->razorpay_secret : null }}" class="form-control">
                    </div>
                  </div>
                  <br/>
                  <h5 class="m-b-5">₦ <b>Paystack Settings</b></h5>
                 <small id="emailHelp" class="form-text text-muted">For more info <a href="https://support.paystack.com/hc/en-us/articles/360009881600-Paystack-Test-Keys-Live-Keys-and-Webhooks" target="_blank">click here</a></small>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.paystack_payment')}}</label>
                      <div class="col-sm-8">
                            <select class="form-control" name="paystack_payment_on_off">

                                <option value="1" @if($settings->paystack_payment_on_off=="1") selected @endif>ON</option>
                                <option value="0" @if($settings->paystack_payment_on_off=="0") selected @endif>OFF</option>

                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.paystack_secret_key')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="paystack_secret_key" value="{{ isset($settings->paystack_secret_key) ? $settings->paystack_secret_key : null }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">{{trans('words.paystack_public_key')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="paystack_public_key" value="{{ isset($settings->paystack_public_key) ? $settings->paystack_public_key : null }}" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> {{trans('words.save_settings')}} </button>
                    </div>
                  </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      @include("admin.copyright")
    </div>




@endsection
