@extends('frontend.layout.master')

@section('main-content')
    <div class="row pt-md-4">
        <div class="col-md-12">
            <div class="blog-entry ftco-animate d-md-flex mt-2">
{{--                <a href="single.html" class="img img-2" style="background-image:url({{asset('/frontend/assets/images/ximage_1.jpg.pagespeed.ic.HkfdBUS8CU.jpg')}});--}}
{{--                    height: 40px; width: 40px"></a>--}}
{{--                <div class="text text-2 pl-md-4">--}}
{{--                    <input type="text" class="ml-1">--}}
{{--                </div>--}}
                <div class="sticky-top" style="margin-left: auto; margin-right: auto;">
                    <form action="{{route('post.store',session('alumni_id'))}}" method="post" enctype="multipart/form-data" id="postForm">
                        @csrf
                        <textarea name="post" class="form-control" id="postText"
                                  placeholder="What's on your mind" rows="2" cols="70"></textarea>
                        <button type="submit" class="btn btn-primary mt-1" style="margin-top: 5px" id="postSubmitBtn">Post</button>
                    </form>
                </div>
                <hr>
            </div>
        </div>
        @forelse($posts as $post)
        <div class="col-md-12">
            <div class="blog-entry ftco-animate d-md-flex" >
                <a href="{{route('other.profile',$post->id)}}" class="img img-2"
                   style="background-image:url({{isset($post->alumniPersonalInfo->photo_link)
                        ? asset("frontend/pro-image/".$post->alumniPersonalInfo->photo_link)
                        : asset("frontend/pro-image/pro-thumbnail.png")}});
                    height: 40px; width: 40px"></a>
                <div class="text text-2 pl-md-4">
                    <h6 class="mb-1"><a href="{{route('other.profile',$post->id)}}">{{$post->alumniBasicInfo->name}}</a></h6>
                    <span><i class="icon-calendar mr-1"></i>{{date('d-M-Y',strtotime($post->created_at))}}</span>
                    <p class="mb-1">{{substr($post->post,0,120)}}.......</p>
                    @if(strlen($post->post) >120)
                    <p><a href="{{route('post.details',$post->id)}}" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
                    @endif
                    <hr>
                </div>
            </div>
        </div>
        @empty
            <div class="col-md-12">
                <p class="text-center">There are no posts</p>
            </div>
        @endforelse

    </div>
    <div class="row">
        <div class="col">
            <div class="block-27">
                {{$posts->links()}}
{{--                <ul>--}}
{{--                    <li><a href="#">&lt;</a></li>--}}
{{--                    <li class="active"><span>1</span></li>--}}
{{--                    <li><a href="#">2</a></li>--}}
{{--                    <li><a href="#">3</a></li>--}}
{{--                    <li><a href="#">4</a></li>--}}
{{--                    <li><a href="#">5</a></li>--}}
{{--                    <li><a href="#">&gt;</a></li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{asset('/frontend/js/alumni-post.js')}}"></script>
@endsection
