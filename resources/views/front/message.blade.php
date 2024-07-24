{{-- @include('front.header')
@include('front.head') --}}








<section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Envoyez un message à l'administrateur</h2>

                            <!-- Validation Errors -->
                            <x-auth.validation-errors :errors="$errors" />

                            {{-- <h3 class="h-add-bottom">@lang('Register')</h3> --}}


                            <form class="s-content__form" method="post" action="{{ route('contacts.store') }}">
                                @csrf
                                <fieldset>

                                    @if(Auth::guest())
                                    <!-- Name -->
                                    <div class="form-outline mb-4">
                                        <label for="name">@lang('Name')</label>
                                        <input id="name" class="form-control form-control-lg" type="text" name="name"
                                            placeholder="@lang('Your name')" value="{{ old('name') }}" required
                                            autofocus>
                                    </div>

                                    <!-- Email Address -->
                                    <div class="form-outline mb-4">
                                        <x-auth.input-email />
                                    </div>
                                    @endif

                                    <!-- Message -->
                                    <label for="message">@lang('Your Message')</label>
                                    <textarea  rows="5" name="message" id="message" class="form-control form-control-lg"
                                        placeholder="@lang('Your Message')" required>{{ old('message') }}</textarea>

                                    <br>
                                    <div class="form-outline mb-4">
                                        <x-auth.submit title="Send" />
                                    </div>

                                </fieldset>
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
