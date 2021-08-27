@extends('frontend.layout.master')

@section('main-content')
    <div class="row pt-md-4">
            <div class="col-md-12">
                <div class="blog-entry ftco-animate d-md-flex">
                    <div class="text text-2 pl-md-4">
                        <h3 class="mb-2"><a href="#">{{$event->event_name}}</a></h3>
                        <div class="meta-wrap">
                            <p class="meta">
                                <span><i class="icon-calendar mr-2"></i>{{date('d-m-Y',strtotime($event->event_date))}}</span>
                            </p>
                        </div>
                        <div class="text">
                            {!! $event->event_details !!}
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
