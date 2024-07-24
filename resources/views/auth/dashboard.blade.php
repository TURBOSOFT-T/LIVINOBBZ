@include('front.header')
@include('front.head')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
           
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    Hello, you are welcome!
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@include('front.footer')
