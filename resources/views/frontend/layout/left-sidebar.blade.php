<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
<aside id="colorlib-aside" role="complementary" class="js-fullheight">
    <nav id="colorlib-main-menu" role="navigation">
        <ul>
{{--            <li class="colorlib-active"><a href="index-2.html">Home</a></li>--}}
            <li><a href="{{route('alumni.profile',session('alumni_id'))}}">
                    <img src="{{isset($profilePic->photo_link) ? asset('/frontend/pro-image/'.$profilePic->photo_link) : asset('/frontend/pro-image/pro-thumbnail.png')}}"
                         style="border-radius: 50%;" alt="" height="40px" width="40px">
                    {{$alumniBasic->name}}
                </a></li>
            <li>
                <a href="{{route('alumni.logout',session('alumni_id'))}}">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </li>

        </ul>
    </nav>
    <div class="colorlib-footer">
        <h1 id="colorlib-logo" class="mb-4"><a href="{{route('frontend.home')}}" style="background-image:url({{asset('/frontend/assets/images/xbg_1.jpg.pagespeed.ic.yyDakF8d8Y.jpg')}})"><img
                    src="https://upload.wikimedia.org/wikipedia/en/3/3b/SUB-Logo-with-name.png" height="100px" width="200px" alt=""></a></h1>
        <p class="pfooter">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by State University Of Bangladesh
        </p>
    </div>
</aside>
