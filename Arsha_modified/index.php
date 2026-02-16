<?php
include('includes/header.php');
?>

<!-- Hero Section -->
<section id="hero" class="hero section dark-background">

  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
        <h1>Better Solutions For Your Business</h1>
        <p>We are team of talented designers making websites with Bootstrap</p>
        <div class="d-flex">
          <a href="#about" class="btn-get-started">Get Started</a>
          <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- /Hero Section -->

<!-- Clients Section -->
<section id="clients" class="clients section light-background">

  <div class="container" data-aos="zoom-in">

    <div class="swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 2,
              "spaceBetween": 40
            },
            "480": {
              "slidesPerView": 3,
              "spaceBetween": 60
            },
            "640": {
              "slidesPerView": 4,
              "spaceBetween": 80
            },
            "992": {
              "slidesPerView": 5,
              "spaceBetween": 120
            },
            "1200": {
              "slidesPerView": 6,
              "spaceBetween": 120
            }
          }
        }
      </script>
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide"><img src="assets/img/clients/clients-1.webp" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/clients-2.webp" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/clients-3.webp" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/clients-4.webp" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/clients-5.webp" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/clients-6.webp" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/clients-7.webp" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="assets/img/clients/clients-8.webp" class="img-fluid" alt=""></div>
      </div>
    </div>

  </div>

</section><!-- /Clients Section -->

<!-- Why Us Section -->
<section id="why-us" class="section why-us light-background" data-builder="section">

  <div class="container-fluid">

    <div class="row gy-4">

      <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
          <h3><span>Eum ipsam laborum deleniti </span><strong>velit pariatur architecto aut nihil</strong></h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
          </p>
        </div>

        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

          <div class="faq-item faq-active">

            <h3><span>01</span> Non consectetur a erat nam at lectus urna duis?</h3>
            <div class="faq-content">
              <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <h3><span>02</span> Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
            <div class="faq-content">
              <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item">
            <h3><span>03</span> Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
            <div class="faq-content">
              <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

        </div>

      </div>

      <div class="col-lg-5 order-1 order-lg-2 why-us-img">
        <img src="assets/img/why-us.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
      </div>
    </div>

  </div>

</section><!-- /Why Us Section -->

<!-- Skills Section -->
<section id="skills" class="skills section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">

      <div class="col-lg-6 d-flex align-items-center">
        <img src="assets/img/illustration/illustration-10.webp" class="img-fluid" alt="">
      </div>

      <div class="col-lg-6 pt-4 pt-lg-0 content">

        <h3>Voluptatem dignissimos provident quasi corporis voluptas</h3>
        <p class="fst-italic">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>

        <div class="skills-content skills-animation">

          <div class="progress">
            <span class="skill"><span>HTML</span> <i class="val">100%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- End Skills Item -->

          <div class="progress">
            <span class="skill"><span>CSS</span> <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- End Skills Item -->

          <div class="progress">
            <span class="skill"><span>JavaScript</span> <i class="val">75%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- End Skills Item -->

          <div class="progress">
            <span class="skill"><span>Photoshop</span> <i class="val">55%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div><!-- End Skills Item -->

        </div>

      </div>
    </div>

  </div>

</section><!-- /Skills Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Testimonials</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          }
        }
      </script>
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="assets/img/person/person-m-9.webp" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="assets/img/person/person-f-5.webp" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="assets/img/person/person-f-12.webp" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.</span>
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="assets/img/person/person-m-12.webp" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="testimonial-item">
            <img src="assets/img/person/person-m-13.webp" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
            <div class="stars">
              <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
              <i class="bi bi-quote quote-icon-left"></i>
              <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
              <i class="bi bi-quote quote-icon-right"></i>
            </p>
          </div>
        </div><!-- End testimonial item -->

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>

</section><!-- /Testimonials Section -->

<!-- Recent Blog Postst Section -->
<section id="recent-blog-postst" class="recent-blog-postst section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Recent Blog Posts</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-5">

      <div class="col-xl-4 col-md-6">
        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">

          <div class="post-img position-relative overflow-hidden">
            <img src="assets/img/blog/blog-post-1.webp" class="img-fluid" alt="">
            <span class="post-date">December 12</span>
          </div>

          <div class="post-content d-flex flex-column">

            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis</h3>

            <div class="meta d-flex align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
              </div>
              <span class="px-3 text-black-50">/</span>
              <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
              </div>
            </div>

            <hr>

            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

          </div>

        </div>
      </div><!-- End post item -->

      <div class="col-xl-4 col-md-6">
        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

          <div class="post-img position-relative overflow-hidden">
            <img src="assets/img/blog/blog-post-2.webp" class="img-fluid" alt="">
            <span class="post-date">July 17</span>
          </div>

          <div class="post-content d-flex flex-column">

            <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>

            <div class="meta d-flex align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
              </div>
              <span class="px-3 text-black-50">/</span>
              <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
              </div>
            </div>

            <hr>

            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

          </div>

        </div>
      </div><!-- End post item -->

      <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="post-item position-relative h-100">

          <div class="post-img position-relative overflow-hidden">
            <img src="assets/img/blog/blog-post-3.webp" class="img-fluid" alt="">
            <span class="post-date">September 05</span>
          </div>

          <div class="post-content d-flex flex-column">

            <h3 class="post-title">Quia assumenda est et veritati tirana ploder</h3>

            <div class="meta d-flex align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
              </div>
              <span class="px-3 text-black-50">/</span>
              <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
              </div>
            </div>

            <hr>

            <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

          </div>

        </div>
      </div><!-- End post item -->

    </div>

  </div>

</section><!-- /Recent Blog Postst Section -->

<!-- Subscribe Section -->
<section id="subscribe" class="subscribe section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 justify-content-between align-items-center">
      <div class="col-lg-6">
        <div class="cta-content" data-aos="fade-up" data-aos-delay="200">
          <h2>Subscribe to our newsletter</h2>
          <p>Proin eget tortor risus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur aliquet quam id dui posuere blandit.</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form cta-form" data-aos="fade-up" data-aos-delay="300">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email address..." aria-label="Email address" aria-describedby="button-subscribe">
              <button class="btn btn-primary" type="submit" id="button-subscribe">Subscribe</button>
            </div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="cta-image" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/cta/cta-1.webp" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section><!-- /Subscribe Section -->


<?php
include('includes/footer.php');
?>