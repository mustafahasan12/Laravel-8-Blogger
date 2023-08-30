@extends('layouts.app1');

@section('title', 'About Us')


@section('content')

<section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">About us</h1>
          </div>
        </div>

        <div class="row mb-5">

          <div class="d-md-flex post-entry-2 half">
            <a href="#" class="me-4 thumbnail">
              <img src="{{ asset('admin/images/'.$aboutus->image1) }}" alt="" class="img-fluid">
            </a>
            <div class="ps-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4">About us</div>
               <?= html_entity_decode($aboutus->content1) ?> 
            </div>
          </div>

          <div class="d-md-flex post-entry-2 half mt-5">
            <a href="#" class="me-4 thumbnail order-2">
            <img src="{{ asset('admin/images/'.$aboutus->image2) }}" alt="" class="img-fluid">
            </a>
            <div class="pe-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4">Mission &amp; Vision</div>
              <?= html_entity_decode($aboutus->content2) ?> 
            </div>
          </div>

        </div>

      </div>
    </section>

    <section class="mb-5 bg-light py-5">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-between align-items-lg-center">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <?= html_entity_decode($aboutus->content3) ?> 
            <p><a href="#" class="more">View All Blog Posts</a></p>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-6">
                  <img src="{{ asset('admin/images/'.$aboutus->image3) }}" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  

@endsection
