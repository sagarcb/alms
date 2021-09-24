@extends('frontend.layout.master')

@section('main-content')
    <div class="row pt-md-4">
        <div class="col-md-12">
            <div class="blog-entry ftco-animate d-md-flex" >
                <a href="single.html" class="img img-2"
                   style="background-image:url({{isset($post->alumniPersonalInfo->photo_link)
                        ? asset("frontend/pro-image/".$post->alumniPersonalInfo->photo_link)
                        : asset("frontend/pro-image/pro-thumbnail.png")}});
                       height: 40px; width: 40px"></a>
                <div class="text text-2 pl-md-4">
                    <h6 class="mb-1"><a href="">{{$post->alumniBasicInfo->name}}</a></h6>
                    <span><i class="icon-calendar mr-1"></i>{{date('d-M-Y',strtotime($post->created_at))}}</span>
                    <p class="mb-1">{{$post->post}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
