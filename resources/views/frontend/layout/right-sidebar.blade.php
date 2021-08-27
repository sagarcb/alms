<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
    <div class="sidebar-box pt-md-4">
        <form action="#" class="search-form">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
            </div>
        </form>
    </div>
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Events & Notices</h3>
        <ul class="categories">
            <li class="eventsNoticeList"><a href="{{route('events.list')}}">Events <span>({{$eventsCount}})</span></a></li>
            <li class="eventsNoticeList"><a href="{{route('notice.list')}}">Notices <span>({{$noticesCount}})</span></a></li>
        </ul>
    </div>
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Recent Notices:</h3>
        @forelse($notices as $notice)
        <div class="block-21 mb-4 d-flex">
            <div class="text">
                <h3 class="heading"><a href="{{route('notice.details',$notice->id)}}">{{$notice->notice_name}}</a></h3>
                <div class="meta">
                    <div><a href="{{route('notice.details',$notice->id)}}"><span class="icon-calendar"></span> {{date('d-M-Y',strtotime($notice->created_at))}}</a></div>
                </div>
            </div>
        </div>
        @empty

        @endforelse
        <hr>

    </div>
    <div class="sidebar-box ftco-animate">
        <h3 class="sidebar-heading">Recent Events:</h3>
        @forelse($events as $event)
        <div class="block-21 mb-4 d-flex">
            <div class="text">
                <h3 class="heading"><a href="{{route('event.details',$event->id)}}">{{$event->event_name}}</a></h3>
                <div class="meta">
                    <div><a href="{{route('event.details',$event->id)}}"><span class="icon-calendar"></span> {{date('d-M-Y',strtotime($event->created_at))}}</a></div>
                </div>
            </div>
        </div>
        @empty

        @endforelse
        <hr>

    </div>
{{--    <div class="sidebar-box ftco-animate">--}}
{{--        <h3 class="sidebar-heading">Tag Cloud</h3>--}}
{{--        <ul class="tagcloud">--}}
{{--            <a href="#" class="tag-cloud-link">animals</a>--}}
{{--            <a href="#" class="tag-cloud-link">human</a>--}}
{{--            <a href="#" class="tag-cloud-link">people</a>--}}
{{--            <a href="#" class="tag-cloud-link">cat</a>--}}
{{--            <a href="#" class="tag-cloud-link">dog</a>--}}
{{--            <a href="#" class="tag-cloud-link">nature</a>--}}
{{--            <a href="#" class="tag-cloud-link">leaves</a>--}}
{{--            <a href="#" class="tag-cloud-link">food</a>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="sidebar-box subs-wrap img py-4" style="background-image:url(images/xbg_1.jpg.pagespeed.ic.yyDakF8d8Y.jpg)">--}}
{{--        <div class="overlay"></div>--}}
{{--        <h3 class="mb-4 sidebar-heading">Newsletter</h3>--}}
{{--        <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia</p>--}}
{{--        <form action="#" class="subscribe-form">--}}
{{--            <div class="form-group">--}}
{{--                <input type="text" class="form-control" placeholder="Email Address">--}}
{{--                <input type="submit" value="Subscribe" class="mt-2 btn btn-white submit">--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--    <div class="sidebar-box ftco-animate">--}}
{{--        <h3 class="sidebar-heading">Archives</h3>--}}
{{--        <ul class="categories">--}}
{{--            <li><a href="#">Decob14 2018 <span>(10)</span></a></li>--}}
{{--            <li><a href="#">September 2018 <span>(6)</span></a></li>--}}
{{--            <li><a href="#">August 2018 <span>(8)</span></a></li>--}}
{{--            <li><a href="#">July 2018 <span>(2)</span></a></li>--}}
{{--            <li><a href="#">June 2018 <span>(7)</span></a></li>--}}
{{--            <li><a href="#">May 2018 <span>(5)</span></a></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="sidebar-box ftco-animate">--}}
{{--        <h3 class="sidebar-heading">Paragraph</h3>--}}
{{--        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>--}}
{{--    </div>--}}
</div>

