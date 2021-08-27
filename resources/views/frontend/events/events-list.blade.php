@extends('frontend.layout.master')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Events List</h3>
            <hr>
        </div>
    </div>
    <div class="row pt-md-4">
        @forelse($events as $event)
        <div class="col-md-12">
            <div class="blog-entry ftco-animate d-md-flex">
                <div class="text text-2 pl-md-4">
                    <h3 class="mb-2"><a href="{{route('event.details',$event->id)}}">{{$event->event_name}}</a></h3>
                    <div class="meta-wrap">
                        <p class="meta">
                            <span><i class="icon-calendar mr-2"></i>{{date('d-m-Y',strtotime($event->event_date))}}</span>
                        </p>
                    </div>
                    <p><a href="{{route('event.details',$event->id)}}" class="btn-custom">See Details <span class="ion-ios-arrow-forward"></span></a></p>
                </div>
            </div>
        </div>
        @empty

        @endforelse
    </div>
    <div class="row">
        <div class="col">
            <div class="block-27">
                {{$events->links()}}
            </div>
        </div>
    </div>
@endsection
