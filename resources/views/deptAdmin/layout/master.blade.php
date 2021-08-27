    @include('deptAdmin.layout.header')
    @include('deptAdmin.layout.sidebar')
        <div class="page-heading">
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-12">
                    @yield('main-contents')
                </div>
            </section>
        </div>
@include('deptAdmin.layout.footer')
