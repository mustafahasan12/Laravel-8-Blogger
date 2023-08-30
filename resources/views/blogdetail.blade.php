@extends('layouts.app1');

@section('title', 'Blog')

@section('content')

<main id="main">

<section class="single-post-content">
  <div class="container">
    <div class="row">
      <div class="col-md-9 post-content" data-aos="fade-up">

        <!-- ======= Single Post Content ======= -->
        <div class="single-post">
          <div class="post-meta"><span class="date">{{ $blogs->category->name }}</span> <span class="mx-1">&bullet;</span> <span> <?= date('F jS Y', strtotime($blogs->publishon)) ?> </span></div>
          <h1 class="mb-5"> {{ $blogs->title }} </h1>
          <?= html_entity_decode(substr($blogs->content, 0, 300)); ?>

          <figure class="my-4">
            <img src="{{ asset('admin/images/blog/'.$blogs->image) }}" alt="" class="img-fluid">
          </figure>
          <?= html_entity_decode( $blogs->content ); ?>
         
        </div><!-- End Single Post Content -->

     

        <!-- ======= Comments Form ======= -->
        <div class="row justify-content-center mt-5">

          <div class="col-lg-12">
            <h5 class="comment-title">Leave a Comment</h5>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="comment-name">Name</label>
                <input type="text" class="form-control" id="comment-name" placeholder="Enter your name">
              </div>
              <div class="col-lg-6 mb-3">
                <label for="comment-email">Email</label>
                <input type="text" class="form-control" id="comment-email" placeholder="Enter your email">
              </div>
              <div class="col-12 mb-3">
                <label for="comment-message">Message</label>

                <textarea class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
              </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary" value="Post comment">
              </div>
            </div>
          </div>
        </div><!-- End Comments Form -->

      </div>
      <div class="col-md-3">
        <!-- ======= Sidebar ======= -->
        <div class="aside-block">

          <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabContent">

            <!-- Popular -->
            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                @foreach($blogsslide as $blog1)
                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date"> {{ $blog1->category->name }} </span> <span class="mx-1">&bullet;</span> <span> <?= date('F jS Y', strtotime($blog1->publishon)) ?> </span></div>
                    <h2 class="mb-2"><a href="{{ route('blog.detail', ['id' => $blog1->id]) }}"> {{ $blog1->title }} </a></h2>
                    <span class="author mb-3 d-block"> {{ $blog1->user->name }} </span>
                </div>
                @endforeach
            </div> <!-- End Popular -->

            <!-- Trending -->
            <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                @foreach($blogsslide as $blog1)
                <div class="post-entry-1 border-bottom">
                    <div class="post-meta"><span class="date"> {{ $blog1->category->name }} </span> <span class="mx-1">&bullet;</span> <span> <?= date('F jS Y', strtotime($blog1->publishon)) ?> </span></div>
                    <h2 class="mb-2"><a href="{{ route('blog.detail', ['id' => $blog1->id]) }}"> {{ $blog1->title }} </a></h2>
                    <span class="author mb-3 d-block"> {{ $blog1->user->name }} </span>
                </div>
                @endforeach
            </div> <!-- End Trending -->

            <!-- Latest -->
            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">

            @foreach($blogsslide as $blog1)
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date"> {{ $blog1->category->name }} </span> <span class="mx-1">&bullet;</span> <span> <?= date('F jS Y', strtotime($blog1->publishon)) ?> </span></div>
                <h2 class="mb-2"><a href="{{ route('blog.detail', ['id' => $blog1->id]) }}"> {{ $blog1->title }} </a></h2>
                <span class="author mb-3 d-block"> {{ $blog1->user->name }} </span>
              </div>
            @endforeach  

            </div> <!-- End Latest -->

          </div>
        </div>

        <div class="aside-block">
          <h3 class="aside-title">Categories</h3>
          <ul class="aside-links list-unstyled">
            @foreach( $category as $cat )
               <li><a href="category.html"><i class="bi bi-chevron-right"></i> {{ $cat->name }} </a></li>
            @endforeach   
          </ul>
        </div><!-- End Categories -->


      </div>
    </div>
  </div>
</section>
</main><!-- End #main -->

@endsection