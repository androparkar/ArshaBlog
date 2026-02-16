<?php
include('includes/header.php');
?>

<!-- Pricing Section -->
<section id="pricing" class="pricing section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up" id="pricing_title">
    <h2>Pricing</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4" id="pricing_item">

      <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
        <div class="pricing-item">
          <h3>Free Plan</h3>
          <h4><sup>$</sup>0<span> / month</span></h4>
          <ul>
            <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
            <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
            <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
            <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
            <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
          </ul>
          <a href="#" class="buy-btn">Buy Now</a>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
        <div class="pricing-item featured">
          <h3>Business Plan</h3>
          <h4><sup>$</sup>29<span> / month</span></h4>
          <ul>
            <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
            <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
            <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
            <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
            <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
          </ul>
          <a href="#" class="buy-btn">Buy Now</a>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="pricing-item">
          <h3>Developer Plan</h3>
          <h4><sup>$</sup>49<span> / month</span></h4>
          <ul>
            <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
            <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
            <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
            <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
            <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
          </ul>
          <a href="#" class="buy-btn">Buy Now</a>
        </div>
      </div><!-- End Pricing Item -->

    </div>

  </div>

</section><!-- /Pricing Section -->

<?php
include('includes/footer.php');
?>
<script>
  $(document).ready(function() {
    getTitle('pages');
    loadItem('pricing');

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
        switch (reqType) {
          case 'pages': {
            $('#pricing_title p').text(res.data.pricing);
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
                  <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-item ${(val.status == 0)? '' : 'featured'}">
                      <h3>${val.plan_name}</h3>
                      <h4><sup>₹</sup>${val.cost}<span> / month</span></h4>
                      <ul>
                        <li${(val.feature_1_sts == 0)?' class="na"><i class="bi bi-x"></i>' : '><i class="bi bi-check"></i>'} <span>${val.feature_1}</span></li>
                        <li${(val.feature_2_sts == 0)?' class="na"><i class="bi bi-x"></i>' : '><i class="bi bi-check"></i>'} <span>${val.feature_2}</span></li>
                        <li${(val.feature_3_sts == 0)?' class="na"><i class="bi bi-x"></i>' : '><i class="bi bi-check"></i>'} <span>${val.feature_3}</span></li>
                        <li${(val.feature_4_sts == 0)?' class="na"><i class="bi bi-x"></i>' : '><i class="bi bi-check"></i>'} <span>${val.feature_4}</span></li>
                        <li${(val.feature_5_sts == 0)?' class="na"><i class="bi bi-x"></i>' : '><i class="bi bi-check"></i>'} <span>${val.feature_5}</span></li>
                      </ul>
                      <a href="#" class="buy-btn">Buy Now</a>
                    </div>
                  </div><!-- End Pricing Item -->
                  `;
          });
        }
        $('#pricing_item').empty();
        $('#pricing_item').html(htmlData);
      },
      error: function(response) {
        console.log('>>>>>  ' + response);
      }
    });

  }
</script>