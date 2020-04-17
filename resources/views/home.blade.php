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
                anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                doloremque
                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae
                vitae
                dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed
                quia
                consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
                dolorem
                ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt
                ut
                labore et dolore magnam aliquam quaerat voluptatem.
            </div>
            <div class="leavea">
                LEAVE A COMMENT
            </div>
        </div>
    </section>

    <section class="container">
        <div class="section-img">
            <div class="row item-row">
                @foreach($news1 as $new)
                    <div class="col-12 col-lg-6 item-col item-col-1">
                        <div>
                            <a href="{{route('liftstyle')}}"><img class="news_image_intro"
                                                                  src="{{url('/')}}/{{$new->news_image_intro}}" alt=""></a>
                            @foreach($categories as $category)
                                @if($new->category_id == $category->id)
                                    <div class="item-div-1"><a class="item-a"
                                                               href="{{route('liftstyle')}}">{{$category->category_name}}</a>
                                    </div>
                                @endif
                            @endforeach
                            <div class="item-div-2">{{$new->name}}</div>
                            <div class="item-div-3">{{$new->description}}</div>
                        </div>
                    </div>
                @endforeach
                @foreach($news2 as $new)
                    <div class="col-12 col-lg-6 item-col">
                        <div>
                            <a href="{{route('photodiary')}}"><img class="news_image_intro"
                                                                   src="{{url('/')}}/{{$new->news_image_intro}}" alt=""></a>
                            @foreach($categories as $category)
                                @if($new->category_id == $category->id)
                                    <div class="item-div-1"><a class="item-a"
                                                               href="{{route('photodiary')}}">{{$category->category_name}}</a>
                                    </div>
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
    <section class="respon-none">
        <div class="section-form">
            <div class="item-section-form">
                <div class="item-p">Sign up for our newsletter!</div>
                <form action="{{route('postmail')}}" method="post">
                    <input type="text" name="name" placeholder="Enter a valid email address">
                    <button type="submit"><img src="{{asset('layout/FrontEnd/images/icon.png')}}" alt=""></button>
                    {{csrf_field()}}
                </form>
            </div>

        </div>
    </section>
    <section class="container">
        <div class="section-img">
            <div class="row item-row">
                @foreach($news3 as $new)
                    <div class="col-12 col-lg-6 item-col">
                        <div>
                            <a href="{{route('liftstyle')}}"><img class="news_image_intro"
                                                                  src="{{url('/')}}/{{$new->news_image_intro}}" alt=""></a>
                            @foreach($categories as $category)
                                @if($new->category_id == $category->id)
                                    <div class="item-div-1"><a class="item-a"
                                                               href="{{route('liftstyle')}}">{{$category->category_name}}</a>
                                    </div>
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
                <a href="{{route('home.loadmore')}}">Load more</a>
            </div>
        </div>
    </section>
@endsection
