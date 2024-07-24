@include('front.header')
@include('front.head')
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">

                            <div class="text-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                    style="width: 185px;" alt="logo">
                                <h4 class="mt-1 mb-5 pb-1">Le droit pour tous et partout</h4>
                            </div>
                            <!-- Session Status -->
                            <x-auth.session-status :status="session('status')" />
                            <!-- Validation Errors -->
                            <x-auth.validation-errors :errors="$errors" />

                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                Session::forget('success');
                                @endphp
                            </div>
                            @endif
                            <form class="h-add-bottom" method="POST" action="{{ route('login.custom') }}" {{--
                                action="{{ route('login') }}" --}}>
                                @csrf
                                <div>
                                <div class="form-outline mb-4">

                                    <x-auth.input-email />
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif

                                </div>
                                <!-- Password -->

                                <div class="form-outline mb-4">

                                    <x-auth.input-password />
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif

                                </div>
                                <!-- Remember Me -->
                                <div class="form-outline mb-4">
                                    <label class="h-add-bottom">
                                        <input id="remember_me" type="checkbox" name="remember_me" {{ old('remember_me')
                                            ? 'checked' : '' }}>
                                        <span class="label-text">@lang('Remember me')</span>
                                    </label>
                                </div>
                                <div class="text-center">

                                    <x-auth.submit title="Login" />
                                </div>
                                <br>

                                <label class="h-add-bottom">
                                    <a href="{{ route('password.request') }}">
                                        @lang('Forgot Your Password?')
                                    </a>
                                    <a href="{{ route('register') }}" style="float: right;">
                                        @lang('Not registered?')
                                    </a>
                                </label>
                                </div>

                            </form>

                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                            <h4 class="mb-4">We are more than just a company</h4>
                            <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }
</style>
