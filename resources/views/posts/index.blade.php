<x-layouts.main>

    <x-slot:title>
       Blog
    </x-slot:title>


    <x-page-header>
       Blog
    </x-page-header>

    <!-- Blog Start -->
    <div class="blog">
        <div class="container">
            <div class="section-header text-center">
                <p>Our Blog</p>
                <h2>Oxirgi Postlar</h2>
            </div>
            <div class="row">

                @foreach ($posts as $post) 
                <div class="col-lg-4">
                    <div class="blog-item">
                        <div class="blog-img">
                            <img src="img/blog-1.jpg" alt="Image">
                            <div class="meta-date">
                                <span>01</span>
                                <strong>Jan</strong>
                                <span>2045</span>
                            </div>
                        </div>
                        <div class="blog-text">
                            <h3><a href="">{{ $post->title }}</a></h3>
                            <p>{{ $post->short_content }}</p>
                        </div>
                        <div class="ml-auto">
                            <a class="mb-5 btn btn-custom" href="{{ route('posts.show', ['post' => $post->id]) }}">O'qish</a>
                        </div>
                        <div class="blog-meta">
                            @foreach ($post->tags as $tag)
                                
                            <p><i class="fa fa-user"></i><a>{{ $tag->name }}</a></p>
                            @endforeach
                            <p><i class="fa fa-user"></i><a>{{ $post->category->name }}</a></p>
                            <p><i class="fa fa-user"></i><a href="">{{ $post->created_at }}</a></p>
                        </div>
                    </div>
                </div>
                @endforeach

                {{ $posts->links() }}

            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul> 
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Blog End -->

</x-layouts.main>