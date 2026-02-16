<?php
include('includes/header.php');
?>
<!-- About Section -->
<section id="about" class="about section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>About Us</h2>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100" id="aboutText1">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.
        </p>
        <ul>
          <li><i class="bi bi-check2-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
          <li><i class="bi bi-check2-circle"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
          <li><i class="bi bi-check2-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo</span></li>
        </ul>
      </div>

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200" id="aboutText2">
        <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
        <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
      </div>

    </div>

  </div>

</section><!-- /About Section -->

<!-- Team Section -->
<section id="team" class="team section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up" id="team_title">
    <h2>Team</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4" id="team_member">

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="assets/img/person/person-m-7.webp" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Walter White</h4>
            <span>Chief Executive Officer</span>
            <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""> <i class="bi bi-linkedin"></i> </a>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="assets/img/person/person-f-8.webp" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Sarah Jhonson</h4>
            <span>Product Manager</span>
            <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""> <i class="bi bi-linkedin"></i> </a>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="assets/img/person/person-m-6.webp" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>William Anderson</h4>
            <span>CTO</span>
            <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""> <i class="bi bi-linkedin"></i> </a>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
        <div class="team-member d-flex align-items-start">
          <div class="pic"><img src="assets/img/person/person-f-4.webp" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Amanda Jepson</h4>
            <span>Accountant</span>
            <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""> <i class="bi bi-linkedin"></i> </a>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->

    </div>

  </div>

</section><!-- /Team Section -->

<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section dark-background">

  <img src="assets/img/bg/bg-8.webp" alt="">

  <div class="container">

    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <div class="col-xl-9 text-center text-xl-start">
        <h3>Call To Action</h3>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="col-xl-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="#">Call To Action</a>
      </div>
    </div>

  </div>

</section><!-- /Call To Action Section -->

<?php
include('includes/footer.php');
?>

<script>
  $(document).ready(function() {
    getTitle('about_us');
    getTitle('pages');
    loadItem('teams');


  });

  function getTitle(reqType) {

    $.ajax({
      type: "POST",
      url: "./Apis/load.php",
      data: {
        reqType
      },
      success: function(response) {
        const res = JSON.parse(response);
        console.log(res);
        switch (reqType) {
          case 'about_us': {
            $('#aboutText1 p').replaceWith(res.data.text_col_1);
            $('#aboutText2 p').replaceWith(res.data.text_col_2);
          }
          
          case 'pages': {
            $('#team_title p').text(res.data.teams);
          }
          break;

          default:
            break;
        }
      },
      error: function(response) {
        alert(response)
      }
    });
  }

  function loadItem(reqType) {
    $.ajax({
      type: "POST",
      url: "./Apis/load.php",
      data: {
        reqType
      },
      success: function(response) {
        const res = JSON.parse(response);
        var htmlData = '';
        if (res.statusCode === 200) {
          $(res.data).each(function(index, val) {
            htmlData += `
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                      <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="<?= TEAMS_PROFILE_URL ?>${val.profile_img}" class="img-fluid" alt=""></div>
                        <div class="member-info">
                          <h4>${val.member_name}</h4>
                          <span>${val.member_designation}</span>
                          <p>${val.member_description}</p>
                          <div class="social">
                            <a href="${val.X}"><i class="bi bi-twitter-x"></i></a>
                            <a href="${val.facebook}"><i class="bi bi-facebook"></i></a>
                            <a href="${val.instagram}"><i class="bi bi-instagram"></i></a>
                            <a href="${val.linkdin}"> <i class="bi bi-linkedin"></i> </a>
                          </div>
                        </div>
                      </div>
                    </div><!-- End Team Member -->
                    `;
          });
        }
        $('#team_member').empty();
        $('#team_member').html(htmlData);
      },
      error: function(response) {
        console.log('>>>>>  ' + response);
      }
    });

  }
</script>