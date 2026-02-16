<?php
include('includes/header.php');
?>

<!-- Services Section -->
<section id="services" class="services section dark-background">

  <img src="assets/img/bg/bg-8.webp" alt="">


  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up" id="service_title">
    <h2>Services</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-5" id="service_item">

      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <div class="icon"><i class="bi bi-activity icon"></i></div>
          <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
          <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
        <div class="service-item position-relative">
          <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
          <h4><a href="" class="stretched-link">Sed ut perspici</a></h4>
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
        <div class="service-item position-relative">
          <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
          <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
          <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
        </div>
      </div><!-- End Service Item -->

      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
        <div class="service-item position-relative">
          <div class="icon"><i class="bi bi-broadcast icon"></i></div>
          <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
        </div>
      </div><!-- End Service Item -->

    </div>

  </div>

</section><!-- /Services Section -->

<?php
include('includes/footer.php');
?>

<script>
  $(document).ready(function() {
    getTtile('pages');
    loadItem('services');

  });

  function getTtile(reqType) {

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
          case 'pages': {
            $('#service_title p').text(res.data.services);
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
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                      <div class="service-item position-relative">
                        <div class="icon"><i class="${val.icon}"></i></div>
                        <h4><a href="" class="stretched-link">${val.title}</a></h4>
                        <p>${val.description}</p>
                      </div>
                    </div><!-- End Service Item -->              
                    `;
          });
        }
        $('#service_item').empty();
        $('#service_item').html(htmlData);
      },
      error: function(response) {
        console.log('>>>>>  ' + response);
      }
    });

  }
</script>