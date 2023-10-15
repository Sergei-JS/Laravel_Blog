@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
        <section class="featured-posts-section"> {{--секция постов --}}
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{('storage/' . ($post->preview_image))}}" alt="">
                    </div>
                    <p class="blog-post-category">{{$post->category->title}}</p>
                    <a href="#" class="blog-post-permalink">
                        <h6 class="blog-post-title">{{$post->title}}</h6>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="mx-auto" style="margin-top: -80px">
                    {{$posts->links()}}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-8">
                <section>
{{--                    <div class="row blog-post-row">--}}
{{--                        <div class="col-md-6 blog-post" data-aos="fade-up">--}}
{{--                            <div class="blog-post-thumbnail-wrapper">--}}
{{--                                <img src="{{asset('assets/images/blog_4.jpg')}}" alt="blog post">--}}
{{--                            </div>--}}
{{--                            <p class="blog-post-category">Blog post</p>--}}
{{--                            <a href="#!" class="blog-post-permalink">--}}
{{--                                <h6 class="blog-post-title">aaaadad</h6>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 blog-post" data-aos="fade-up">--}}
{{--                            <div class="blog-post-thumbnail-wrapper">--}}
{{--                                <img src="{{asset('assets/images/blog_5.jpg')}}" alt="blog post">--}}
{{--                            </div>--}}
{{--                            <p class="blog-post-category">Blog post</p>--}}
{{--                            <a href="#!" class="blog-post-permalink">--}}
{{--                                <h6 class="blog-post-title">Front becomes an official Instagram Marketing Partner</h6>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-carousel">
                    <h5 class="widget-title">Избранное</h5>
                    <div class="post-carousel">
                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselId" data-slide-to="1"></li>
                                <li data-target="#carouselId" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <figure class="carousel-item active">
                                    <img src="{{asset('assets/images/0dAmm5jkH3hjHDMqFK1A1lMjgJdvv4ub3vnSBWZS.jpg')}}" alt="First slide">
                                    <figcaption class="post-title">
                                        <a href="#!">добавить посты</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget widget-post-list">
                    <h5 class="widget-title">Post List</h5>
                    <ul class="post-list">
                        <li class="post">
                            <a href="#!" class="post-permalink media">
                                <img src="{{asset('assets/images/blog_widget_1.jpg')}}" alt="blog post">
                                <div class="media-body">
                                    <h6 class="post-title">aaaa</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</main>
<br>
<br>
@endsection
