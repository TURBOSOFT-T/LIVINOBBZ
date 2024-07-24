<!DOCTYPE html>
<html lang="en">


@include('front.header')

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <!-- Start breadcrumb Area -->
    <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3" style="background-color:rgb(245, 245, 244);">
        {{-- <div class="breadcrumb-inner">
            <img src="{{asset('assets/images/bg/bg-image-10.jpg')}}" alt="Education Images">
        </div> --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content text-start" style="background-color:rgb(246, 245, 243);">

                        <h2 class="title">Si vous êtes recruteur ou directeur des ressources humaines!</h2>
                        <p class="description">L'optimisation de votre processus de recrutement - de la recherche de
                            candidats jusqu'à l'embauche - est un défi
                            constant et sans fin</p>

                        {{-- <div class="d-flex align-items-center mb--20 flex-wrap rbt-course-details-feature">



                            <div class="feature-sin rating">
                                <a href="#">4.8</a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>

                            <div class="feature-sin total-rating">
                                <a class="rbt-badge-4" href="#">215,475 rating</a>
                            </div>

                            <div class="feature-sin total-student">
                                <span>616,029 students</span>
                            </div>

                        </div> --}}

                        <div class="rbt-author-meta mb--20">
                            <div class="rbt-avater">
                                <a href="#">
                                  {{--   <img src="/avatars/{{ $post->user->avatar }}" style="width:80px;margin-top: 10px;"> --}}
                                </a>
                            </div>
                            {{-- <div class="rbt-author-info">
                                By <a href="profile.html">{{$post->user->first_name}} {{$post->user->last_name}}</a>
                                <br> In <a href="#">@foreach($post->categories as $category)
                                    <a href="#">{{ $category->title }}</a>
                                    @endforeach</a>
                            </div> --}}
                        </div>


                        <ul class="rbt-meta">
                            <li><i class="feather-calendar"></i>Publié le:{{$product->created_at}} </li>
                          {{--   <li><i class="feather-users"></i> {{$post->candidatures->count()}} Candidatures</li> --}}

                            @if(Auth::user())
                            <a {{-- href="{{ url('apply_posts', $product->id)}}" --}} {{-- data-id="{{ $exam->id }}" --}}
                                style="background-color:rgba(204, 158, 82, 0.06);"
                                class="apply_posts small-box-footer">Add to Cart<i
                                    class="fas fa-arrow-circle-right"></i></a>
                            @endif
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-course-details-area ptb--60">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8">
                    <div class="course-details-content">


                        <div class="col s12 m6">

                            <img style="width: 100%" src="/images/{{ $post->image }}" alt="Card image">
                            {{$product->name}}
                        </div>



                        <div class="rbt-inner-onepage-navigation sticky-top mt--30">
                            <nav class="mainmenu-nav onepagenav">
                                <ul class="mainmenu">
                                    <li>
                                        <a href="#details">Description</a>
                                    </li>


                                    <li>
                                        <a href="#intructor">Recruteur</a>
                                    </li>
                                    <li>
                                        <a href="#review">Commentaires</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- Start Course Feature Box  -->
                        <div class="rbt-course-feature-box rbt-shadow-box details-wrapper mt--30" id="details">
                            <div class="row g-5">
                                <!-- Start Feture Box  -->
                                <div class="col-lg-6">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3 mb--20">Description</h4>
                                    </div>

                                </div>

                            </div>
                            <div>
                                {{$product->body}}
                            </div>



                        </div>



                        <!-- Start Intructor Area  -->
                        <div class="rbt-instructor rbt-shadow-box intructor-wrapper mt--30" id="intructor">
                            <div class="about-author border-0 pb--0 pt--0">
                                <div class="section-title mb--30">
                                    <h4 class="rbt-title-style-3">Recruteur</h4>
                                </div>
                                <div class="media align-items-center">
                                    <div class="thumbnail">
                                        <a href="#">
                                           {{--  <img src="/avatars/{{ $post->user->avatar }}"
                                                style="width:80px;margin-top: 10px;"> --}}
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="author-info">
                                            <h5 class="title">
                                                {{-- <a class="hover-flip-item-wrapper" href="#">{{$post->user->first_name}}
                                                    {{$post->user->last_name}}
                                                </a> --}}
                                            </h5>

                                            <ul class="rbt-meta mb--20 mt--10">
                                                {{-- li><i class="fa fa-star color-warning"></i>75,237 Reviews <span
                                                    class="rbt-badge-5 ml--5">4.4 Rating</span></> --}}
{{--
                                                <li><a href="#"><i class="feather-video"></i>{{$post->user->count()}}
                                                        Offres</a></li> --}}
                                            </ul>
                                        </div>
                                        <div class="content">
                                            {{-- <p class="description">John is a brilliant educator, whose life was
                                                spent
                                                for computer science and love of nature.</p> --}}

                                            {{-- <ul
                                                class="social-icon social-default icon-naked justify-content-start">
                                                <li><a href="https://www.facebook.com/">
                                                        <i class="feather-facebook"></i>
                                                    </a>
                                                </li>
                                                <li><a href="https://www.twitter.com">
                                                        <i class="feather-twitter"></i>
                                                    </a>
                                                </li>
                                                <li><a href="https://www.instagram.com/">
                                                        <i class="feather-instagram"></i>
                                                    </a>
                                                </li>
                                                <li><a href="https://www.linkdin.com/">
                                                        <i class="feather-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul> --}}

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Intructor Area  -->

                        <!-- Start Edu Review List  -->
                        <div class="rbt-review-wrapper rbt-shadow-box review-wrapper mt--30" id="review">
                            <div class="course-content">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Commentaires</h4>
                                </div>

                                {{--
                                @include('front.posts.commentsDisplay', ['comments' => $post->comments, 'post_id' =>
                                $post->id])
                                --}}
                                <br>
                                <br>



                                <hr />
                                <h4>Ajoutez un commentaire</h4>
                                <form method="post" action="{{ route('comments.store'   ) }}" {{--
                                    action="{{ route('posts.comments.store', $post->id) }}" --}}>
                                    @csrf
                                    {{-- <input id="commentId" name="commentId" type="hidden" value="">
                                    <div class="form-group">
                                        <textarea class="form-control" name="body"></textarea>
                                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Ajoutez commentaire" />
                                    </div> --}}
                                    {{-- <input id="commentId" name="commentId" type="hidden" value="">
                                    <div class="message form-field">
                                        <textarea name="message" id="message" class="h-full-width"
                                            placeholder="@lang('Your Message')"></textarea>
                                    </div>
                                    <br>
                                    <p id="forSubmit" class="text-center">
                                        <input name="submit" id="submit"
                                            class="btn btn--primary btn-wide btn--large h-full-width"
                                            value="@lang('Add Comment')" type="submit">
                                    </p>
                                    <p id="commentIcon" class="h-text-center" hidden>
                                        <span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>
                                    </p> --}}
                                </form>



                            </div>


                        </div>





                        <!-- End Edu Review List  -->





                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>



    <!-- Start Course Action Bottom  -->
    <div class="rbt-course-action-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="section-title text-center text-md-start">
                        <h5 class="title mb--0">The Complete Histudy 2023: From Zero to Expert!</h5>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mt_sm--15">
                    <div class="course-action-bottom-right rbt-single-group">
                        <div class="rbt-single-list rbt-price large-size justify-content-center">
                            <span class="current-price color-primary">$750.00</span>
                            <span class="off-price">$1500.00</span>
                        </div>
                        <div class="rbt-single-list action-btn">
                            <a class="rbt-btn btn-gradient hover-icon-reverse btn-md" href="#">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Purchase Now</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Course Action Bottom  -->
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
    <!-- Start Footer aera -->
    @include('front.footer')

    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        (() => {

                // Variables
                const headers = {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
                const commentId = document.getElementById('commentId');
                const alert = document.getElementById('alert');
                const message = document.getElementById('message');
                const forName = document.getElementById('forName');
                const abort = document.getElementById('abort');
                const commentIcon = document.getElementById('commentIcon');
                const forSubmit = document.getElementById('forSubmit');

                // Add comment
                const addComment = async e => {
                    e.preventDefault();

                    // Get datas
                    const datas = {
                        message: message.value
                    };

                    if(document.querySelector('#commentId').value != '') {
                        datas['commentId'] = commentId.value;
                    }

                    // Icon
                    commentIcon.hidden = false;
                    forSubmit.hidden = true;

                    // Send request
                    const response = await fetch('{{ route('posts.comments.store', $post->id) }}', {
                        method: 'POST',
                        headers: headers,
                        body: JSON.stringify(datas)
                    });

                    // Wait for response
                    const data = await response.json();

                    // Icon
                    commentIcon.hidden = true;
                    forSubmit.hidden = false;

                    // Manage response
                    if (response.ok) {
                        purge();
                        if(data == 'ok') {
                            showComments();
                            showAlert('success', '@lang('Your comment has been saved')');
                        } else {
                            showAlert('info', "@lang('Thanks for your comment. It will appear when an administrator has validated it. Once you are validated your other comments immediately appear.')");
                        }
                    } else {
                        if(response.status == 422) {
                            showAlert('error', data.errors.message[0]);
                        } else {
                            errorAlert();
                        }
                    }
                }

                const errorAlert = () =>  Swal.fire({
                                            icon: 'error',
                                            title: '@lang('Whoops!')',
                                            text: '@lang('Something went wrong!')'
                                        });

                // Show alert
                const showAlert = (type, text) => {
                    alert.style.display = 'block';
                    alert.className = '';
                    alert.classList.add('alert-box', 'alert-box--' + type);
                    alert.firstChild.textContent = text;
                }

                // Hide alert
                const hideAlert = () => alert.style.display = 'none';

                // Prepare show comments
                const prepareShowComments = e => {
                    e.preventDefault();

                    document.getElementById('showbutton').toggleAttribute('hidden');
                    document.getElementById('showicon').toggleAttribute('hidden');
                    showComments();
                }

                // Show comments
                const showComments = async () => {

                    // Send request
                    const response = await fetch('{{ route('posts.comments', $post->id) }}', {
                        method: 'GET',
                        headers: headers
                    });

                    // Wait for response
                    const data = await response.json();

                    document.getElementById('commentsList').innerHTML = data.html;
                    @if(Auth::check())
                        document.getElementById('respond').hidden = false;
                    @endif
                }

                // Reply to comment
                const replyToComment = e => {
                    e.preventDefault();

                    forName.textContent = `@lang('Reply to') ${e.target.dataset.name}`;
                    commentId.value = e.target.dataset.id;
                    abort.hidden = false;
                    message.focus();
                }

                // Abort reply
                const abortReply = (e) => {
                    e.preventDefault();
                    purge();
                }

                // Purge reply
                const purge = () => {
                    forName.textContent = '';
                    commentId.value = '';
                    message.value = '';
                    abort.hidden = true;
                }

                // Delete comment
                const deleteComment = async e => {
                    e.preventDefault();

                    Swal.fire({
                    title: '@lang('Really delete this comment?')',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "@lang('Yes')",
                    cancelButtonText: "@lang('No')",
                    preConfirm: () => {
                        return fetch(e.target.getAttribute('href'), {
                            method: 'DELETE',
                            headers: headers
                        })
                        .then(response => {
                            if (response.ok) {
                                showComments();
                            } else {
                                errorAlert();
                            }
                        });
                    }
                    });
                }

                // Listener wrapper
                const wrapper = (selector, type, callback, condition = 'true', capture = false) => {
                    const element = document.querySelector(selector);
                    if(element) {
                        document.querySelector(selector).addEventListener(type, e => {
                            if(eval(condition)) {
                                callback(e);
                            }
                        }, capture);
                    }
                };

                // Set listeners
                window.addEventListener('DOMContentLoaded', () => {
                    wrapper('#showcomments', 'click', prepareShowComments);
                    wrapper('#abort', 'click', abortReply);
                    wrapper('#message', 'focus', hideAlert);
                    wrapper('#messageForm', 'submit', addComment);
                    wrapper('#commentsList', 'click', replyToComment, "e.target.matches('.replycomment')");
                    wrapper('#commentsList', 'click', deleteComment, "e.target.matches('.deletecomment')");
                })

            })()

    </script>
    @endsection
</body>

</html>
