<?php

require("connect.php");
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM data_movie WHERE id= $id");
$result = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$result['name']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <!--ส่วนบนสุด -->

</nav>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" >
  <div class="container-fluid">
    <a class="navbar-brand" href="./"><h2>HedDee</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./">Home</a>
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
  <div class="album py-5 bg-light" style="background-color: #3c4753!important;">
    <div class="container">
      
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">ใส่อะไรดี</a></li>
            </ol>
          </nav>
          <div class="card md-4 shadow-sm text-center" style="color: white; background-image: linear-gradient(to bottom,#ee0979,#ff6a00);"><h1><?=$result['name']?></h1></div></br>
      <div class="row" >
        <div class="col-md-3">
              <div class="card md-4 shadow-sm">
                  <img src="<?=$result['img']?>" while="100%" height="390" class="card-img-top"/>
              </div>
         </div>
                    
           

         <div class="col-md-9" class="center">
              <div class="card md-4 shadow-sm">
              <iframe width="100%" height="390" src="https://www.youtube.com/embed/<?=$result['vdo_ex']?>"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
         </div> 
      </div></br>

      <div class="col-md-12" class="center">
              <div class="card md-4 shadow-sm">
              <iframe width="100%" height="623" src="https://www.youtube.com/embed/<?=$result['vdo_main']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></br>
              </div>
              </div>
      </div>
    </div>
  </div>
</body>
</html>