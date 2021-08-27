@include('frontend.layout.header')
@include('frontend.layout.left-sidebar')
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-xl-8 py-5 px-md-5">

                    @yield('main-content')

                </div>
                @include('frontend.layout.right-sidebar')
            </div>
        </div>
    </section>
</div>
@include('frontend.layout.footer')
