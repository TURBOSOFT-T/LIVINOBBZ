<!DOCTYPE html>
<html lang="en">
<style>
    body,
    .nunito {
        font-family: 'Nunito';
        background-color: #efefef;
    }

    img.product-image {
        width: 100%
    }

    .sidebar {
        display: flex;
        flex-direction: column;
        min-width: 270px;
    }

    .sidebar a {
        text-decoration: none;
        margin-bottom: 8px;
    }

    .sidebar p {
        font-size: 1.4rem;
        font-weight: 600;
    }

    .sidebar a.selected {
        font-weight: bold;
    }

    .category {
        display: flex;
    }

    .content-wrapper {
        margin-left: 15px
    }

    .thumbnail {
        height: 120px;
    }

    .thumbnail img {
        object-fit: contain;
        height: 120px;
    }

    .main-nav {
        display: flex;
        justify-content: space-between;
        padding: 11px 30px;
        background-color: blue;
        margin-bottom: 30px;
    }

    .main-nav a {
        text-decoration: none;
        color: white;
        font-weight: 600;
    }

    .push-right {
        display: flex;
    }

    .push-right *:not(:last-child) {
        margin-right: 10px;
    }

    .product {
        width: 100%;
        background-color: white;
        padding: 16px 16px 4px;
        border-radius: 4px;
        box-shadow: 0 0 4px rgba(0, 0, 0, .15);
        cursor: pointer;
    }

    .product p {
        font-weight: 600;
    }

    h5 {
        font-weight: 700;
        margin-bottom: .9rem;
    }
</style>
{{--  @include('front.header') --}}



<body class="rbt-header-sticky">



    <div class="rbt-page-banner-wrapper" style="background-color:rgb(246, 244, 241);">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
        <div class="rbt-banner-content">
            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top" style="background-color:rgb(248, 245, 242);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class=" title-wrapper">
                                <h1 class="title mb--0"> Les articles</h1>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->

        </div>
    </div>




    <!-- Start Card Style -->
    <div class=" content rbt-section-overlayping-top rbt-section-gapBottom"
        style="background-color:rgb(245, 243, 239);">
        <div class="container">
            <div class="row row--30 gy-5">
                <div class="col-lg-3 order-2 order-lg-1">


                    <!-- Start Widget Area  -->
                    <div class="rbt-single-widget rbt-widget-search">
                        <div class="inner">
                            <form action="#" class="rbt-search-style-1">
                                <input type="text" placeholder="Search ">

                            </form>
                        </div>
                    </div>
                    <!-- End Widget Area  -->

                    <!-- Start Widget Area  -->
                    <div class="category">

                        <div class="sidebar">

                            <a class="{{ !isset($current_category) ? 'selected' : '' }}" href="/">All categories</a>
                            @foreach ($categories as $category)
                            <a href="/category/{{ $category->id }}"
                                class="{{ isset($current_category) && $current_category->id === $category->id ? 'selected' : '' }}">
                                {{ $category->title }} <br>
                            </a>
                            @endforeach
                        </div>

                    </div>


                    <!-- Start Widget Area  -->
                    <div class="rbt-single-widget rbt-widget-instructor">
                        <div class="inner">
                            <h4 class="rbt-widget-title">Bests sellers</h4>
                            {{-- @foreach ($users as $key => $user)
                            @if ($user->role != 'user')
                            <ul class="rbt-sidebar-list-wrapper instructor-list-check">
                                <li class="rbt-check-group">
                                    <input id="ins-list-1" type="checkbox" name="ins-list-1">
                                    <label for="ins-list-1">{{ $user->first_name }}{{ $user->last_name }}
                                        <span class="rbt-lable count">{{ $user->posts()->count() }}</span></label>
                                </li>

                            </ul>
                            @endif
                            @endforeach --}}

                        </div>
                    </div>
                    <!-- End Widget Area  -->





                </div>


                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="rbt-course-grid-column">
                        <!-- Start Single Card  -->

                        <table>
                            <tbody>
                                @if (!empty($products) && $products->count())



                                <tr>
                                    <div class="content-wrapper variation-01 rbt-hover">
                                        <div class="row">
                                            @foreach ($products as $product)
                                            <div class="col-md-4 mb-3">
                                                <div class="product card h-100">
                                                    {{-- <div class="badge bg-success nunito">{{ $product->name }}</div>
                                                    --}}
                                                    <div class="thumbnail card-img-top">
                                                        {{-- <img class="product-image"
                                                            src="/public/Image/Product/{{ $product->image }}" /> --}}
                                                        <img class="product-image"
                                                            src="{{ url('public/Image/Products/' . $product->image) }}">
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <div class="text-center">
                                                            <!-- Product name-->
                                                            <h5 class="fw-bolder">{{ $product->name }}</h5>
                                                            <!-- Product price-->
                                                           <div class="fs-5 mb-5">
                                                            <span class="text-decoration-line-through">{{$product->originalPrice}}</span>
                                                            <span>$40.00</span>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!-- Product actions-->
                                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                        <div class=" col text-center"><a
                                                                class="btn btn-outline-dark mt-auto" href="#">Add to
                                                                cart</a></div>
                                                        <br>
                                                        <div class="row text-center"><a
                                                                class="btn btn-outline-dark mt-auto" href="#">View
                                                                options</a></div>


                                                    </div>

                                                    {{-- <p class="mt-4">{{ $product->name }}</p> --}}
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </tr>

                                @else
                                <tr>
                                    <td colspan="10">There are no data.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">

                            {{-- {{ $products->links('front.shoppings.pagination') }} --}}
                        </div>


                        <!-- End Single Card  -->

                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- End Card Style -->

    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
{{--      @include('front.footer') --}}

</body>

</html>
