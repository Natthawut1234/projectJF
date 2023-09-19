<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หนังออนไลน์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <!--ส่วนบนสุด -->

</nav>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" >
  <div class="container-fluid">
    <a class="navbar-brand" href="./">HedDee</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            หมวดหมู่
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">หนังต่างชาติ</a></li>
            <li><a class="dropdown-item" href="#">หนังไทย</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">อนิเมะ</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> ติดต่ออออ </a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="พิมพ์ชื่อหนัง"required aria-label="Search">
        <button class="btn btn-outline-success" type="submit">ค้นหา</button>
      </form>
    </div>
  </div>
</nav>
<!-- รายการหนังที่แสดง-->
  <div class="album py-5 bg-light">
    <div class="container">
            <nav aria-label="breadcrumb">
            </nav>
      <div class="row">
            
      <?php for($i=1;$i<5;$i++){ ?>  
            <div class="col-md-3">
              <div class="card md-4 shadow-sm">
                <a href="./">
                  <img src="img/ไหมไทย.jpg" while="100%" height="390" class="card-img-top"/>
                  <div class="card-body">
                    <p class="card-text text-center">ไหมไทยเรนเจอร์</p>
                  </div>
                </a>  
              </div>
            </div>
      <?php } ?>

      </div>
       
        <!--Buttonด้านล่าง-->
      <div class="btn-toolbar text-center" role="toolbar" aria-label="Toolbar with button groups" style="display: block;">
        <div class="btn-group me-2" role="group" aria-label="First group">
          <button type="button" class="btn btn-primary">1</button>
          <button type="button" class="btn btn-primary">2</button>
          <button type="button" class="btn btn-primary">3</button>
          <button type="button" class="btn btn-primary">4</button>
          <button type="button" class="btn btn-secondary">5</button>
          <button type="button" class="btn btn-secondary">6</button>
          <button type="button" class="btn btn-secondary">7</button>
          <button type="button" class="btn btn-info">8</button>
        </div>
      </div>
    </div>
  </div>


</body>
</html>