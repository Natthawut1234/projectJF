<?php

require("connect.php");


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
    <a class="navbar-brand" href="./"><h2>HedDee</h2></a>
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
  <div class="album py-5 bg-light" style="background: linear-gradient( #1a237e, #283593, #303f9f, #3949ab, #3f51b5, #5c6bc0);">
    <div class="container">
      
            <nav aria-label="breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
            </nav>
            </nav>
      <div class="row"> 
        
        <?php
          $query = mysqli_query($conn,"SELECT * FROM data_movie ORDER BY id DESC");
          while( $result = mysqli_fetch_array($query)){ 
        ?>  
              <div class="col-md-3">
                <div class="card md-4 shadow-sm">
                  <a href="./play_VDO.php?id=<?=$result['id']?>">
                    <img src="<?=$result['img']?>" while="100%" height="380" class="card-img-top"/>
                    <div class="card-body">
                      <p class="card-text text-center"><?=$result['name']?></p>
                    </div>
                  </a>  
                </div></br>
              </div>
        <?php } ?>
      </div>
       
        <!--Buttonด้านล่าง-->
              <nav aria-label="...">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <span class="page-link">Previous</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active" aria-current="page">
              <span class="page-link">2</span>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>
      
    </div>
  </div>

</body>
</html>