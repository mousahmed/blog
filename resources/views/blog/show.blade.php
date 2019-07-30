@extends('layouts.blog')

@section('title')

@endsection
@section('header')
    <header class="header text-white h-fullscreen pb-80"
            style="background-image: url({{asset('storage/'.$post->image)}});"
            data-overlay="9">
        <div class="container text-center">

            <div class="row h-100">
                <div class="col-lg-8 mx-auto align-self-center">

                    <p class="opacity-70 text-uppercase small ls-1">{{$post->category->name}}</p>
                    <h1 class="display-4 mt-7 mb-8">{{$post->title}}</h1>
                    <p><span class="opacity-70 mr-1">By</span> <a class="text-white" href="#">{{$post->user->name}}</a>
                    </p>
                    <p><img class="avatar avatar-sm" src="{{Gravatar::src($post->user->email)}}" alt="..."></p>

                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
                </div>

            </div>

        </div>
    </header>
@endsection
@section('content')
    <main class="main-content">


        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Blog content
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="section" id="section-content">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 mx-auto">

                        <p class="lead">{{$post->description}}</p>

                        <hr class="w-100px">



                    </div>
                </div>


                <div class="text-center my-6">
                    <img class="rounded-md" src="{{asset('storage/'.$post->image)}}" alt="...">
                </div>


                <div class="row">
                    <div class="col-lg-8 mx-auto">

                        {!!$post->content!!}

                        <blockquote class="blockquote">
                            <div class="quote-sign"></div>
                            <p>{{$post->user->about}}</p>
                            <footer>{{$post->user->name}} in <cite title="Onemar Associates Inc.">Onemar Associates Inc.</cite>
                            </footer>
                        </blockquote>

                        @if($post->tags->count() > 0)
                            <div class="gap-xy-2 mt-6">
                                @foreach($post->tags as $tag)
                                    <a class="badge badge-pill badge-secondary" href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>


            </div>
        </div>


        <!--
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        | Comments
        |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
        <div class="section bg-gray">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 mx-auto">

                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                            var disqus_config = function () {
                            this.page.url = "{{config('app.url')}}/blog/{{$post->id}}";  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = "{{$post->id}}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };

                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://cms-bnmmrr19zu.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                </div>

            </div>
        </div>


    </main>
@endsection
@section('scripts')
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d3c50397f8197b7"></script>
@endsection