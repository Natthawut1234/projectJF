<?php

require("connection/connect.php");
//แสดงหนังที่คลิก
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * FROM data_movie WHERE id= $id");
$result = mysqli_fetch_array($query);

//update_viwes
if (!empty($id)) {
  mysqli_query($conn, "INSERT INTO data_movie (id, views) VALUES ($id, 1) ON DUPLICATE KEY UPDATE views = views + 1");
}
function getViewsCount($id) {
  global $conn;
  $query2 = mysqli_query($conn, "SELECT SUM(views) AS total_views FROM data_movie WHERE id = $id");
  $result2 = mysqli_fetch_array($query2);
  return $result2['total_views'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$result['name']?></title><!--รูป title-->
    <link rel="icon" type="image/png" sizes="16x16" href="img/HedDee.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!---ขยาย(กดดูหนังออนไลน์ที่นี่)-->
  <style>
    .expand-block {
      transition: transform 0.2s; /* ตั้งค่าเวลาในการทำtransition */
    }

    .expand-block:hover {
      transform: scale(1.1); /* ปรับขนาดเมื่อโฮเวอร์ */
    }
  </style>

  </head>
<body>
    <!--ส่วนบนสุด -->

</nav>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" >
  <div class="container-fluid">
    <a class="navbar-brand" href="./"><img src="img/HedDee.png" width="100" height="50" ></a>
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

      <form class="d-flex" role="search" method="GET" action="index.php?search=<?=$result['name']?>">
    <input class="form-control me-2" type="search" name="search" placeholder="พิมพ์ชื่อหนัง" required
           aria-label="Search">
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
              <li class="breadcrumb-item" style="color:white;">
                <p>
                  <?php
                  ?>
                  <!-- นับจำนวนเข้าชม -->
                  <p>จำนวนการเข้าชม  <?php echo getViewsCount($id); ?> ครั้ง</p>


                </p>
              </li>
            </ol>
          </nav>
          <!--ชื่อเรื่อง-->
          <div class="card md-4 shadow-sm text-center" style="color: white; background-image: linear-gradient(to bottom,#ee0979,#ff6a00);"><h1><?=$result['name']?></h1></div></br>

      <!-- รูป-->    
      <div class="row" >
        <div class="col-md-3">
              <div class="card md-4 shadow-sm" style="border: none;">
                  <img src="<?=$result['img']?>" while="100%" height="390" class="card-img-top"/>
              </div>
         </div>
                    
           
        <!--วิดีโอตัวอย่าง-->
         <div class="col-md-9" class="center">
              <div class="card md-4 shadow-sm" style="border: none;">
              <iframe width="100%" height="390" src="<?=$result['vdo_ex']?>"  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
         </div> 
      </div></br>

       <!--รายละเอียด-->
      <div class="col-md-5">
          <div class="card md-1 shadow-sm" style="color: white; background-image: linear-gradient(to bottom,#212529,#031757);">
            <div><h6>ชื่อเรื่อง:&nbsp;<?=$result['name']?></h6>
                 <h6>ประเภท:&nbsp;<?=$result['Genres']?></h6>
                 <h6>ปีหนัง:&nbsp;<?=$result['movie_year']?></h6>
                 <h6>เรทอายุ:&nbsp;<?=$result['Age_rating']?></h6>
            </div>
          </div>
      </div>

<!--คำบรรยาย Synopsis-->
  <div class="card md-4 " style="color: white; background-image: linear-gradient(to bottom,#212529,#031757););">
      <h3>Synopsis</h3></br>
      <h6><?=$result['Synopsis']?></h6>
   </div></br>

      <!--เงื่อนไขวิดีโอ-->
      <?php 
      if ($result['vdo_main'] >=1) {
        ?>
          <div class="col-md-12" class="center">
                    <div class="card md-4 shadow-sm">
                    <iframe width="100%" height="623" src="<?=$result['vdo_main']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></br>
                    </div>
                    </div>
      <?php } 
      elseif ($result['Netflix'] >=1) {
        ?>
              <div class="col-md-3 text-center">
                  <div class="card md-4 shadow-sm expand-block" style="background-image: linear-gradient(to bottom,#ee0979,#ff6a00);">
                    <h3><a style="text-decoration: none; color: blue" href="<?=$result['Netflix']?>">(กดดูหนัง Netflix ที่นี่)</a></h3>
                  </div></br>
              </div>

      <?php }
      elseif ($result['not_have_vdo'] >=1) {
        ?>

              <div class="col-md-3 text-center">
                  <div class="card md-4 shadow-sm expand-block" style="background-image: linear-gradient(to bottom,#ee0979,#ff6a00);">
                    <h3><a style="text-decoration: none; color: blue" href="<?=$result['not_have_vdo']?>">(กดดูหนังออนไลน์ที่นี่)</a></h3>
                  </div></br>
              </div>
      <?php }?>
<!-- comment -->
    <form action="commant_save.php" method="post" class="from-horizontal">    
      <h6>Your Name:</h6>
        <input type="text" name="name_com" placeholder="Please enter your name" required>
          
      <h6>Comment:</h6>
        <textarea name="comment" class=" from-control" placeholder="Please enter your comment" style="width: 300px;" required></textarea></br> 
        <input type="hidden" name="ref_id" value="<?=$result['id']?>">       
        <button type="submit" class="btn btn-primary">แสดงความคิดเห็น</button>  
    </form>
    <!-- รายการcomment -->
    <p>
        <h5>ความคิดเห็น</h5>
        <?php require("comment_list.php");?>
    </p>
      </div>      
    </div>
  </div>
</body>
</html>
