<?php $info = App\Models\DetailModel::find(1) ?>

<!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

<div class="footer-content">
  <div class="container">

    <div class="row g-5">
      <div class="col-lg-4">
        <h3 class="footer-heading">About ZenBlog</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
        <p><a href="{{ route('about') }}" class="footer-link-more">Learn More</a></p>
      </div>
      <div class="col-6 col-lg-2">
        <h3 class="footer-heading">Navigation</h3>
        <ul class="footer-links list-unstyled">
          <li><a href="{{ route('about') }}"><i class="bi bi-chevron-right"></i> About us</a></li>
          <li><a href="{{ route('contact') }}"><i class="bi bi-chevron-right"></i> Contact</a></li>
        </ul>
      </div>
      <div class="col-6 col-lg-2">
        <h3 class="footer-heading">Categories</h3>  
        <ul class="footer-links list-unstyled">
          @foreach( App\Models\Categories::all() as $category )
             <li><a href="category.html"><i class="bi bi-chevron-right"></i> {{ $category->name }} </a></li>
          @endforeach   
        </ul>
      </div>

      <div class="col-lg-4">
        <h3 class="footer-heading">Recent Posts</h3>

        <ul class="footer-links footer-blog-entry list-unstyled">

        @foreach( App\Models\Blog::with('user', 'category')->where('status', '1')->limit('4')->get() as $blog1 )
          <li>
            <a href="{{ route('blog.detail', ['id' => $blog1->id]) }}" class="d-flex align-items-center">
              <img src="{{ asset('admin/images/blog/'.$blog1->image) }}" alt="" class="img-fluid me-3">
              <div>
                <div class="post-meta"><span class="date"> {{ $blog1->category->name }} </span> <span class="mx-1">&bullet;</span> <span> <?= date('F jS Y', strtotime($blog1->publishon)) ?> </span></div>
                <span> {{ $blog1->title }} </span>
              </div>
            </a>
          </li>
        @endforeach

        </ul>

      </div>
    </div>
  </div>
</div>

<div class="footer-legal">
  <div class="container">

    <div class="row justify-content-between">
      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
        <div class="copyright">
           <?= $info->copyright ?>
        </div>

        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
          Designed by <a href="https://stepsppoint.com/">StepsPoint</a>
        </div>

      </div>

      <div class="col-md-6">
        <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
          <a href="<?= $info->twitter_link ?>" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="<?= $info->facebbok_link ?>" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="<?= $info->instagram_link ?>" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="<?= $info->skype_link ?>" class="google-plus"><i class="bi bi-skype"></i></a>
          <a href="<?= $info->linkedin_link ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

      </div>

    </div>

  </div>
</div>

</footer>