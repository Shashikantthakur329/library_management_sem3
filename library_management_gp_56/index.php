<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Central Library</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="assets/vendors/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="shortcut icon" 
  style="object-fit: cover;" href="./assets/images/favicon.png" type="image/x-icon">
</head>

<body style="max-width: 100%; overflow-x: hidden;">
  <?php 
           include('./navbar.php')
  ?>
  <div>
    <header class="foi-header landing-header index_image_header" style="position: relative; max-width: 100% !important; overflow-x: hidden; ">
      <div class="container" style=" overflow-y: hidden; overflow-x: hidden;">
        <div class="header-content" style="margin-top:150px">
          <div class="row">
            <div class="col-md-7  pl-5 " data-aos="fade-rights" data-aos-duration="1000">
              <h1 style="color:#574240">Get books you want</h1>
              <h3 style="color:#141313;">We provide a large varities with latest edition.</h3>
             <a href="./frontend/profile.php"><button class="btn nav-items get_started  ml-sm-0 mt-2" style="border-radius:6px;">Borrow Now</button></a>
            </div>
            <div class="col-md-5 " data-aos="fade-ups" data-aos-duration="900" id="person-image">
      
            </div>
          </div>
        </div>
        <div class="container img1" style="z-index: -1;">
          <!-- <img src="assets/images/brainstorm-meeting-min-removebg-preview.png" alt="app" width="500px" class="img-fluid" style="padding-bottom: 35px; margin-left: 14px;"> -->
        </div>
        <div class="container img2">
          <img src="assets/images/bg_block_1.png" alt="app" width="80px" class="img-fluid" style="padding-bottom: 35px; margin-left: 14px;">
          
        </div>        
        <div class="container img3">
          <img src="assets/images/bg_block_2.png" alt="app" width="140px" class="img-fluid" style="padding-bottom: 35px; margin-left: 14px;">
          
        </div>        
        <div class="container img4">
          <img src="assets/images/bg_block_3.png" alt="app"  class="img-fluid" style="padding-bottom: 35px; margin-left: 14px;">
          
        </div>        
        <div class="container img5">
          <img src="assets/images/bg_block_4.png" alt="app"  class="img-fluid" style="padding-bottom: 35px; margin-left: 14px;">
          
        </div>        
        <div class="container img6">
          <img src="assets/images/bg_block_5.png" alt="app" width="420px" class="img-fluid" style="padding-bottom: 35px; margin-left: 14px;">
          
        </div>
      </div>
    </header>
  </div>






  <section class="py-5 mb-5 bgcolor-21">
    <div class="container">
      <h1 class="text-center">Choose the section, you want to borrow books from</h1>
      <p class="text-muted mb-5 text-center"> </p>
      <div class="row" data-aos="fade-up">
        <div class="col-lg-4 mb-4">
          <div class="card pricing-card border-warning ">
            <div class="card-body">
              <h3 class="mb-1">Fiction</h3>
              <p class="mb-4 overflow_style" style="height: 11rem;">Fiction is any creative work, chiefly any narrative work, portraying people, events, or places in ways that are imaginary, or not strictly based on history or fact.</p>
              <a href="./frontend/profile.php" class="btn btn-outline-warning btn-rounded " >Borrow Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card pricing-card border-primary ">
            <div class="card-body">
              <h3>Poetry</h3>

              <p class="mb-4 overflow_style" style="height: 11rem;">Poetry is a form of literature that uses aesthetic and often rhythmic[1][2][3] qualities of language − such as phonaesthetics, sound symbolism, and metre − to evoke meanings in addition to, or in place of, a prosaic ostensible meaning.
              </p>
              <a href="./frontend/profile.php" class="btn btn-outline-primary btn-rounded">Borrow Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card pricing-card border-danger ">
            <div class="card-body">
              <h3>Science</h3>
              <p class="mb-4 overflow_style" style="height: 11rem; ">Science is a systematic enterprise that builds and organizes knowledge in the form of testable explanations and predictions about the universe.</p>
              <a href="./frontend/profile.php" class="btn  btn-rounded btn-outline-danger">Borrow Now</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center" data-aos="fade-up">
        <div class="col-lg-4 mb-4">
          <div class="card pricing-card border-info ">
            <div class="card-body">
              <h3>Computer Science</h3>
              <p class="mb-4 overflow_style" style="height: 10rem;">Computer science is the study of computers and computing. Computer science applies the principles of mathematics, engineering, and logic to a plethora of functions.
              </p>
              <a href="./frontend/profile.php" class="btn btn-outline-info btn-rounded">Borrow Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card pricing-card border-success ">
            <div class="card-body">
              <h3>Daily Readings</h3>
              <p class="mb-4 overflow_style" style="height: 10rem;">This section includes daily newspapers of all kinds,daily magzines,weekly magzines in english and hindi language.</p>
              <a href="./frontend/profile.php" class="btn btn-outline-success btn-rounded">Borrow Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <?php 
      include('./footer.php')
  ?>

  <script src="assets/vendors/jquery/jquery.min.js"></script>
  <script src="assets/vendors/popper.js/popper.min.js"></script>
  <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <?php 
      include('./script.php');
    ?>
</body>

</html>
