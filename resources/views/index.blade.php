@extends('layouts.app1');

@section('title', 'Home')

@section('content')

     <!-- ======= Hero Slider Section ======= -->
     <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">

             @foreach($blogsslide as $blog) 
                <div class="swiper-slide">
                  <a href="{{ route('blog.detail', ['id' => $blog->id]) }}" class="img-bg d-flex align-items-end sliderimage" style="background-image: url('/admin/images/blog/<?= $blog->image ?>') ">
                    <div class="img-bg-inner">
                      <h2>{{ $blog->title }}</h2>
                      <?= html_entity_decode(substr($blog->content, 0, 300)); ?>
                    </div>
                  </a>
                </div>
             @endforeach   

              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">

      @foreach($category as $cat)
        <div class="row g-5">
            <h3> {{ $cat->name }} </h3>
          <div class="col-lg-12">

            <div class="row g-5">
          @foreach( $blogs as $blog )
            @if( $blog->cat_id == $cat->id )
              <div class="col-lg-4 border-start custom-border">
                <div class="post-entry-1">
                  <a href="{{ route('blog.detail', ['id' => $blog->id]) }}"><img src="{{ asset('/admin/images/blog/'.$blog->image) }}" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date"> {{ $cat->name }} </span> <span class="mx-1">&bullet;</span> <span> {{ date('F jS Y', strtotime($blog->publishon)) }} </span></div>
                  <h2><a href="{{ route('blog.detail', ['id' => $blog->id]) }}"> {{ $blog->title }} </a></h2>
                </div>
              </div>
            @endif  
          @endforeach    
             
            </div>

          </div>

        </div> <!-- End .row -->
      @endforeach

      </div>
    </section> <!-- End Post Grid Section -->

@endsection