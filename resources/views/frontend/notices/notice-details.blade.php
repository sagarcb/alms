@extends('frontend.layout.master')

@section('main-content')
    <div class="row pt-md-4">
        <div class="col-md-12">
            <div class="blog-entry ftco-animate d-md-flex">
                <div class="text text-2 pl-md-4">
                    <h3 class="mb-2"><a href="#">{{$notice->notice_name}}</a></h3>
                    <div class="meta-wrap">
                        <p class="meta">
                            <span><i class="icon-calendar mr-2"></i>{{date('d-m-Y',strtotime($notice->notice_date))}}</span>
                        </p>
                    </div>
                    <div class="text">
                        {!! $notice->notice_details !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
