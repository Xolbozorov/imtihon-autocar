<x-layouts.main>

    <x-slot:title>
        Post/{{ $post->id }}
    </x-slot:title>


    <x-page-header>
      Post/{{ $post->id }}
    </x-page-header>

            <!-- Single Post Start-->
            <div class="single">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-8">
                        @auth
                            
                        
                        <div class="row mb-4">
                            <a class="mb-4 btn btn-custom mr-2" href="{{ route('posts.edit',['post' => $post->id]) }}">edit</a>
                            <form action="{{ route('posts.destroy',['post' => $post->id]) }}"
                                 method="POST" onsubmit="return confirm('Post rostdan ham o\'chirilsinmi?');">
                                 @csrf
                                 @method('DELETE')
                                <button type="submit" class="mb-4 btn btn-custom">destroy</button>
                            </form>
                        </div>
                        @endauth
                           <div class="single-content">
                            <div>
                                @foreach ($post->tags as $tag)
                                <p><i class="fa fa-user"></i><a>{{ $tag->name }}</a></p>
                                @endforeach
                                <p><i class="fa fa-user"></i><a>{{ $post->category->name }}</a></p>
                                <p><i class="fa fa-user"></i><a href="">{{ $post->created_at }}</a></p>
                            </div>
                               <img src="/img/single.jpg" />
                               <h2>{{ $post->title }}</h2>
                               <p>{{ $post->content }}</p>
                           </div>
                           <div class="single-tags">
                               <a href="">National</a>
                               <a href="">International</a>
                               <a href="">Economics</a>
                               <a href="">Politics</a>
                               <a href="">Lifestyle</a>
                               <a href="">Technology</a>
                               <a href="">Trades</a>
                           </div>
                           <div class="single-related">
                               <h2>Related Post</h2>
                               <div class="owl-carousel related-slider">
                                   <div class="post-item">
                                       <div class="post-img">
                                           <img src="/img/post-1.jpg" />
                                       </div>
                                       <div class="post-text">
                                           <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                           <div class="post-meta">
                                               <p>By<a href="">Admin</a></p>
                                               <p>In<a href="">Web Design</a></p>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="post-item">
                                       <div class="post-img">
                                           <img src="/img/post-2.jpg" />
                                       </div>
                                       <div class="post-text">
                                           <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                           <div class="post-meta">
                                               <p>By<a href="">Admin</a></p>
                                               <p>In<a href="">Web Design</a></p>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="post-item">
                                       <div class="post-img">
                                           <img src="/img/post-3.jpg" />
                                       </div>
                                       <div class="post-text">
                                           <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                           <div class="post-meta">
                                               <p>By<a href="">Admin</a></p>
                                               <p>In<a href="">Web Design</a></p>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="post-item">
                                       <div class="post-img">
                                           <img src="/img/post-4.jpg" />
                                       </div>
                                       <div class="post-text">
                                           <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                           <div class="post-meta">
                                               <p>By<a href="">Admin</a></p>
                                               <p>In<a href="">Web Design</a></p>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
   
                           <div class="single-comment">
                               <h2>{{ $post->comments()->count() }} Izoh</h2>

                               @foreach ($post->comments as $comment)
                                   
                               
                               <ul class="comment-list">
                                   <li class="comment-item">
                                       <div class="comment-body">
                                           <div class="comment-img">
                                               <img src="/img/user.jpg" />
                                           </div>
                                           <div class="comment-text">
                                               <h3><a href="">{{ $comment->user->name }}</a></h3>
                                               <span>0{{ $comment->created_at }}</span>
                                               <p>{{ $comment->body }}</p>
                                               {{-- <a class="btn" href="">Reply</a> --}}
                                           </div>
                                       </div>
                                   </li>
                               </ul> 
                               @endforeach
                           </div>
                           <div class="comment-form">
                               <h2>Izoh qoldirish</h2>
                               <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                   <div class="form-group">
                                       <label for="message">Xabar *</label>
                                       <textarea name="body" cols="30" rows="5" class="form-control"></textarea>
                                   </div>
                                   <input type="hidden" name="post_id" value="{{ $post->id }}">
                                   <div class="form-group">
                                       <input type="submit" value="Yuborish" class="btn btn-custom">
                                   </div>
                               </form>
                           </div>
                       </div>
   
                       <div class="col-lg-4">
                           <div class="sidebar">
                               <div class="sidebr-widget">
                                   <div class="single-bio">
                                       <div class="single-bio-img">
                                           <img src="/img/user.jpg" />
                                       </div>

                                       <div class="single-bio-text">



                                           <h3 class="col-lg-4">{{ $post->user->name }}</h3>
                                           <p></p>
                                       </div>
                                       <div class="single-bio-social">
                                           <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                                           <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                                           <a class="btn" href=""><i class="fab fa-youtube"></i></a>
                                           <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                                           <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                                       </div>
                                   </div>
                               </div>
                               
                               <div class="sidebar-widget">
                                   <div class="search-widget">
                                       <form>
                                           <input class="form-control" type="text" placeholder="Search Keyword">
                                           <button class="btn"><i class="fa fa-search"></i></button>
                                       </form>
                                   </div>
                               </div>
   
                               <div class="sidebar-widget">
                                   <h2 class="widget-title">Recent Post</h2>

                                   @foreach ($recent_posts as $post)
                                   <div class="recent-post">
                                       <div class="post-item">
                                           <div class="post-img">
                                               <img src="/img/post-1.jpg" />
                                           </div>
                                           <div class="post-text">
                                               <a class="text-dark mb-2" href="">{{ $post->title }}</a>
                                               <div class="post-meta">
                                                   <p>By<a href="">Admin</a></p>
                                                   <p>In<a href="">Web Design</a></p>
                                               </div>
                                           </div>
                                       </div>
                                    @endforeach

                                   </div>
                               </div>
   
                               <div class="sidebar-widget">
                                   <div class="image-widget">
                                       <a href="#"><img src="/img/blog-1.jpg" alt="Image"></a>
                                   </div>
                               </div>
   
                               <div class="sidebar-widget">
                                   <div class="tab-post">
                                       <ul class="nav nav-pills nav-justified">
                                           <li class="nav-item">
                                               <a class="nav-link active" data-toggle="pill" href="#featured">Featured</a>
                                           </li>
                                           <li class="nav-item">
                                               <a class="nav-link" data-toggle="pill" href="#popular">Popular</a>
                                           </li>
                                           <li class="nav-item">
                                               <a class="nav-link" data-toggle="pill" href="#latest">Latest</a>
                                           </li>
                                       </ul>
   
                                       <div class="tab-content">
                                           <div id="featured" class="container tab-pane active">
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-1.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-2.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-3.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-4.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-5.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div id="popular" class="container tab-pane fade">
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-1.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-2.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-3.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-4.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-5.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div id="latest" class="container tab-pane fade">
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-1.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-2.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-3.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-4.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="post-item">
                                                   <div class="post-img">
                                                       <img src="/img/post-5.jpg" />
                                                   </div>
                                                   <div class="post-text">
                                                       <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                       <div class="post-meta">
                                                           <p>By<a href="">Admin</a></p>
                                                           <p>In<a href="">Web Design</a></p>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
   
                               <div class="sidebar-widget">
                                   <div class="image-widget">
                                       <a href="#"><img src="/img/blog-2.jpg" alt="Image"></a>
                                   </div>
                               </div>
   
                               <div class="sidebar-widget">
                                   <h2 class="widget-title">Categories</h2>
                                   <div class="category-widget">
                                       <ul>
                                        @foreach ($categories as $category)
                                           <li><a href="">{{ $category->name }}</a><span>{{ $category->posts()->count() }}</span></li>
                                        @endforeach
                                       </ul>
                                   </div>
                               </div>

                               <div class="sidebar-widget">
                                <h2 class="widget-title">Tags Cloud</h2>
                                <div class="tag-widget">
                                    @foreach ($tags as $tag)
                                       <a href="">{{ $tag->name }}</a>
                                    @endforeach
                                </div>
                            </div>

   
                               <div class="sidebar-widget">
                                   <div class="image-widget">
                                       <a href="#"><img src="/img/blog-3.jpg" alt="Image"></a>
                                   </div>
                               </div>
   
                              
                               <div class="sidebar-widget">
                                   <h2 class="widget-title">Text Widget</h2>
                                   <div class="text-widget">
                                       <p>
                                           Lorem ipsum dolor sit amet elit. Integer lorem augue purus mollis sapien, non eros leo in nunc. Donec a nulla vel turpis tempor ac vel justo. In hac platea nec eros. Nunc eu enim non turpis id augue.
                                       </p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Single Post End-->  

</x-layouts.main>