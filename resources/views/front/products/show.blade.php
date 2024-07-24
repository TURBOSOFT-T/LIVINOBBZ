{{-- <div class="container">

    <div class=row>
        <div class="col s12 m6">
            <img style="width: 100%" src="/images/{{ $produit->image }}">
        </div>
        <div class="col s12 m6">
            <h4>{{ $produit->name }}</h4>
            <p><strong>{{ number_format($produit->price, 2, ',', ' ') }} € TTC</strong></p>
            <p>{{ $produit->description }}</p>
            <form method="POST" action="#">
                @csrf
                <div class="input-field col">
                    <input type="hidden" id="id" name="id" value="{{ $produit->id }}">
                    <input id="quantity" name="quantity" type="number" value="1" min="1">
                    <label for="quantity">Quantité</label>
                    <p>
                        <button class="btn waves-effect waves-light" style="width:100%" type="submit"
                            id="addcart">Ajouter au panier
                            <i class="material-icons left">add_shopping_cart</i>
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>

</div>
--}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>

    <!-- Product section-->
  {{--   <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            @if(session()->has('cart'))
            <div class="modal">
                <div class="modal-content center-align">
                    <h5>Produit ajouté au panier avec succès</h5>
                    <hr>
                    <p>Il y a {{ $cartCount }} @if($cartCount > 1) articles @else article @endif dans votre panier pour un total de
                        <strong>{{ number_format($cartTotal, 2, ',', ' ') }} € TTC</strong> hors frais de port.</p>
                    <p><em>Vous avez la possibilité de venir chercher vos produits sur place, dans ce cas vous cocherez la case
                            correspondante lors de la confirmation de votre commande et aucun frais de port ne vous sera
                            facturé.</em></p>
                    <div class="modal-footer">
                        <button class="modal-close btn waves-effect waves-light left" id="continue">
                            Continuer mes achats
                        </button>
                        <a href="{{ route('panier.index') }}" class="btn waves-effect waves-light">
                            <i class="material-icons left">check</i>
                            Commander
                        </a>
                    </div>
                </div>
            </div>
            @endif --}}

            <div class="row gx-4 gx-lg-5 align-items-center">
                <h1 class="display-5 fw-bolder">Detail sur le produit</h1>
                <br><br>
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" />
                    <img class="card-img-top product-image" src="{{ url('public/Image/Products/' . $product->image) }}">

                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                    <div class="small mb-1">{{$product->description}}</div>

                    <div class="fs-5 mb-5">
                        <p><strong class="text-muted text-decoration-line-through">{{ number_format($product->originalPrice, 2, ',', ' ') }} € TTC</strong></p>
                       {{--  <span class="text-muted text-decoration-line-through">{{$product->originalPrice}}</span> <br> --}}
                        {{$product->discountPrice}}
                    </div>

                    <form method="POST" action="{{ route('panier.store') }}">
                        @csrf
                        <div class="d-flex">
                            <input class="form-control text-center me-3" type="hidden" id="id" name="id"
                                value="{{ $product->id }}">

                            <div class=" col text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="{{ route('add.to.cart', $product->id) }}">Ajouter au panier</a></div>
                            <p>

                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @section('javascript')
    <script>
        @if(session()->has('cart'))
      document.addEventListener('DOMContentLoaded', () => {
        const instance = M.Modal.init(document.querySelector('.modal'));
        instance.open();
      });
    @endif
    </script>
    @endsection

    <!-- Footer-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
