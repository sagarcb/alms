@include('superAdmin.layout.header')
@include('superAdmin.layout.sidebar')
<div class="page-heading">
    <h3></h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">

            @yield('main-contents')

        </div>
    </section>
</div>
@include('superAdmin.layout.footer')
