@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="section-text">
            <a href="{{route('photodiary')}}" class="photodiary">
                PHOTODIARY
            </a>
            <div class="the-perfect">
                The perfect weekend getaway
            </div>
            <div class="full-lorem">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex
                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit
            </div>
            <div class="leavea">
                LEAVE A COMMENT
            </div>
        </div>
    </section>

    <section class="container">
        <div class="section-img">
            <div class="row item-row">
                @foreach($news as $new)
                    <div class="col-12 col-lg-6 item-col item-col-1">
                        <div>
                            <a href="{{route('liftstyle')}}"><img class="news_image_intro" src="{{url('/')}}/{{$new->news_image_intro}}" alt=""></a>
                            @foreach($categories as $category)
                                @if($new->category_id == $category->id)
                                    <div class="item-div-1"><a class="item-a" href="{{route('liftstyle')}}">{{$category->category_name}}</a></div>
                                @endif
                            @endforeach
                            <div class="item-div-2">{{$new->name}}</div>
                            <div class="item-div-3">{{$new->description}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section>
        <div class="section-loadmore">
            <div class="item-section-loadmore">
                <a href="{{route('liftstyle.loadmore')}}">Load more</a>
            </div>
        </div>
    </section>
@endsection
