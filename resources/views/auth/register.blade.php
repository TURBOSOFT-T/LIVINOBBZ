@include('front.header')
@include('front.head')


<section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Créer votre compte</h2>

                            <!-- Validation Errors -->
                            <x-auth.validation-errors :errors="$errors" />

                            {{-- <h3 class="h-add-bottom">@lang('Register')</h3> --}}
                            <form class="h-add-bottom" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Name -->
                                <div class="form-outline mb-4">
                                    <label for="first_name">@lang('First Name')</label>
                                    <input id="name" class="form-control form-control-lg" type="text" name="first_name"
                                        placeholder="@lang('Your  first name')" value="{{ old('first_name') }}" required
                                        autofocus>
                                </div>
                                <div class="form-outline mb-4">
                                    <label for="last_name">@lang('Last Name')</label>
                                    <input id="last_name" class="form-control form-control-lg" type="text"
                                        name="last_name" placeholder="@lang('Your last Name')"
                                        value="{{ old('last_name') }}" required autofocus>
                                </div>

                                <!-- Email Address -->
                                <div class="form-outline mb-4">
                                    <x-auth.input-email />
                                </div>
                                 <div class="form-group{{ $errors->has('image_path') ? ' is-invalid' : '' }}">
                                    <label for="description">Image</label>
                                    @if(isset($user) && !$errors->has('image'))
                                    <div>
                                        <p><img src="{{ asset('images/thumbs/' . $user->avatar) }}"></p>
                                        <button id="changeImage" class="btn btn-warning">Changer d'image</button>
                                    </div>
                                    @endif
                                    <div id="wrapper">
                                        @if(!isset($user) || $errors->has('image_path'))
                                        <div class="custom-file">
                                            <input type="file" id="image_path" name="image_path"
                                                class="{{ $errors->has('avatar') ? ' is-invalid ' : '' }}custom-file-input"
                                                required>
                                            <label class="custom-file-label" for="image_path"></label>
                                            @if ($errors->has('image_path'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('image_path') }}
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                {{-- <div class="profile_picture text-center">
                                    <input type="file" name="image_path" accept="image/png, image/jpeg, image/jpg" onchange="display_image(this);"
                                        class="d-none upload-box-image">
                                    <img class="box-image-preview img-fluid img-circle elevation-2" src="{{ asset('assets/images/user-thumb.jpg') }}"
                                        alt="Profile picture" onclick="$(this).closest('.profile_picture').find('input').click();"
                                        style="height:150px; width:150px;">
                                </div> --}}
                                <br>


                                <!-- Password -->
                                <div class="form-outline mb-4">
                                    <x-auth.input-password />
                                </div>



                                <!-- Confirm Password -->
                                <div>
                                    <label for="password_confirmation">@lang('Confirm Password')</label>
                                    <input id="password_confirmation" class="form-control form-control-lg"
                                        type="password" name="password_confirmation"
                                        placeholder="@lang('Confirm your Password')" required>
                                </div>
                                <br>
                                <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value=""
                                        id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3g">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                service</u></a>
                                    </label>
                                </div>


                                <div class="text-center">
                                    <x-auth.submit title="Register" />
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .gradient-custom-3 {
        /* fallback for old browsers */
        background: #84fab0;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
    }

    .gradient-custom-4 {
        /* fallback for old browsers */
        background: #84fab0;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }
</style>






{{-- <link rel="stylesheet" href="http://www.expertphp.in/css/bootstrap.css">
<script src="http://demo.expertphp.in/js/jquery.js"></script>


 --}}



<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ url('assets/js/userprofile.js') }}"></script>

@php

/**
* Alert
*/
$message = '';
$icon = '';

if (!empty($errors->all())) {
$icon = 'error';
$message = $errors->first();
} elseif (session()->has('success')) {
$icon = 'success';
$message = session()->get('success');
} elseif (session()->has('error')) {
$icon = 'error';
$message = session()->get('error');
} elseif (!empty($success)) {
$icon = 'success';
$message = $success;
}

@endphp

<script>
    var Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
        });
        var message = '{{ $message }}';
        var icon = '{{ $icon }}';
        if (message.length > 0) {
            Toast.fire({
                icon: icon,
                title: message
            });
        }
</script>

<script>
    function saverecord() {
            $("#submitbtn").trigger('click');
        }

        /**
         *  Display Image
         */
        function display_image(input) {

            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function(e) {

                    $(input).closest('div').find('.box-image-preview').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }

        }
</script>


{{-- @include('auth.api') --}}


</section>
@include('front.footer')
