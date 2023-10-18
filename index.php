<?php
require("connection/connect.php");
$num_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM data_movie"));

$limit_page = 8;
$page = isset($_GET['Page']) ? $_GET['Page'] : 1;

$num_page = $num_rows / $limit_page;
if (!($num_page == (int) $num_page))
    $num_page = (int) $num_page + 1;

if ($page > $num_page)
    $page = $num_page;

if ($page < 1) {
    $page = 1;
} elseif ($page > $num_page) {
    $page = $num_page;
}

$limit_start = ($page * $limit_page) - $limit_page;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หนังออนไลน์</title><!--รูป title-->
    <link rel="icon" type="image/png" sizes="16x16" href="img/HedDee.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</head>
<body>
<!--ส่วนบนสุด -->

<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./"><img src="img/HedDee.png" width="100" height="50" ></a>
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <?php
// ดึงรายการหมวดหมู่จากตาราง tbl_type
$query = "SELECT * FROM tbl_type";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<li class="nav-item dropdown">';
    echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
    echo 'หมวดหมู่';
    echo '</a>';
    echo '<ul class="dropdown-menu">';
    
    while ($row = mysqli_fetch_array($result)) {
        echo '<li><a class="dropdown-item" href="#">' . $row['type_name'] . '</a></li>';
    }
    
    echo '</ul>';
    echo '</li>';
}
?>

                <li class="nav-item">
                    <a class="nav-link" href="#"> ติดต่ออออ </a>
                </li>
            </ul>

            <form class="d-flex" role="search" method="GET" action="">
                <input class="form-control me-2" type="search" name="search" placeholder="พิมพ์ชื่อหนัง" required
                       aria-label="Search">
                <button class="btn btn-outline-success" type="submit">ค้นหา</button>
            </form>


        </div>
    </div>
</nav>
<!-- รายการหนังที่แสดง -->
<div class="album py-5 bg-light"
     style="background: linear-gradient( #1a237e, #283593, #303f9f, #3949ab, #3f51b5, #5c6bc0);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">รายการหนังเเนะนำ</a></li>
                </ol>
            </nav>
        </nav>
        <div class="row">
            <?php
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                // คิวรี่ฐานข้อมูลเพื่อค้นหาหนังที่ตรงกับคำค้นหา
                $query = "SELECT * FROM data_movie WHERE name LIKE '%$search%'";
                $result = mysqli_query($conn, $query);
                // ตรวจสอบว่ามีหนังที่ตรงกับคำค้นหาหรือไม่
            if (mysqli_num_rows($result) > 0) {
                // แสดงผลลัพธ์ค้นหา
                while ($row = mysqli_fetch_array($result)) {
                    // แสดงข้อมูลหนังที่ตรงกับคำค้นหา
                    ?><div class="col-md-3">
                      <div class="card md-4 shadow-sm" style="border: none;">
                          <a href="./play_VDO.php?id=<?=$row['id']?>" style="text-decoration: none;">
                              <img src="<?=$row['img']?>" width="100%" height="380" class="card-img-top"/>
                              <div class="card-body" style="color: white; background-color: #3a3e42; ">
                                  <p class="card-text text-center" style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?=$row['name']?></p>
                                  <div style="position: absolute; bottom: 0; right: 0; rgba(0, 0, 0, 0.7); padding: 5px;">
                                    <span class="inline-metadata-item style-scope ytd-video-meta-block" style="text-align: right; color: #757b81;"><?=$row['views']?> viewing</span>
                                  </div>
                              </div>
                          </a>  
                      </div></br>
                      </div>
                    <?php
                }
          } else {
              // ค้นหาเเล้วพบรายการหนัง
              ?>
              <div class="h1">ไม่พบรายการหนัง</div>
              <?php
          }
          } else {
            // ถ้าไม่มีการค้นหาจะแสดงหนังทั้งหมด
            $query = mysqli_query($conn, "SELECT * FROM data_movie ORDER BY id DESC LIMIT $limit_start, $limit_page");
            if (mysqli_num_rows($query) > 0) {
                // แสดงหนังทั้งหมด
                while ($result = mysqli_fetch_array($query)) {
                    // แสดงข้อมูลหนังทั้งหมด
                    ?>
                    <div class="col-md-3">
                      <div class="card md-4 shadow-sm" style="border: none;">
                          <a href="./play_VDO.php?id=<?=$result['id']?>" style="text-decoration: none;">
                              <img src="<?=$result['img']?>" width="100%" height="380" class="card-img-top"/>
                              <div class="card-body" style="color: white; background-color: #3a3e42; ">
                                  <p class="card-text text-center" style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis;"><?=$result['name']?></p>
                                  <div style="position: absolute; bottom: 0; right: 0; rgba(0, 0, 0, 0.7); padding: 5px;">
                                    <span class="inline-metadata-item style-scope ytd-video-meta-block" style="text-align: right; color: #757b81;"><?=$result['views']?> viewing</span>
                                  </div>
                              </div>
                          </a>  
                      </div></br>
                    </div>
                    <?php
                }
                ?>
                <!-- Button ด้านล่าง -->
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
              <!-- --------------------------------------------------------------------------- -->
              <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="?Page=<?php echo $page - 1; ?>">Previous</a>
              </li>

              <!-- --------------------------------------------------------------------------- -->
              <?php
              if($page >5){
                ?>
                  <li class="page-item">
                    <a class="page-link" href ="?Page=1">1</a>
                  </li>
                  <li class="page-item disabled">
                    <a class="page-link">..</a>
                  </li>
                <?php
              }
              ?>

              <!-- --------------------------------------------------------------------------- -->
              <?php

              if($num_page >= 9){
                if($page <= 5){
                  $num_start = 1;
                  $num_stop = 9;
                }elseif($page > $num_page-4){
                  $num_start = $num_page-8;
                  $num_stop = $num_page;
                }else{
                  $num_start = $page-4;
                  $num_stop = $page+4; 
                }
              }else{
                $num_start = 1;
                $num_stop = $num_page;  
              }

              /*<!----------------------------------------------------------------------------- -->*/
              for ($i = $num_start; $i <= $num_stop; $i++) {
                  if ($page == $i) {
              ?>
                      <li class="page-item active" aria-current="page">
                          <span class="page-link"><?=$i?><span class="sr-only"></span></span> 
                      </li>               
                  <?php    
                  } else {
                  ?>
                      <li class="page-item"><a class="page-link" href="?Page=<?=$i?>"><?=$i?></a></li>
                  <?php    
                  }
              }
              ?>
              <!-- --------------------------------------------------------------------------- -->
              <?php
              if($page < $num_page-4){
                ?>
                  <li class="page-item disabled">
                    <a class="page-link">..</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href ="?Page=<?=$num_page?>"><?=$num_page?></a>
                  </li>
                <?php
              }
              ?>

              <!----------------------------------------------------------------------------- -->
              <li class="page-item <?php echo ($page == $num_page) ? 'disabled' : ''; ?>">
                  <a class="page-link" href="?Page=<?php echo $page + 1; ?>">Next</a>
              </li>
              <!-- --------------------------------------------------------------------------- -->

          </ul>
          </nav>
          <?php
            }
        }
        ?>
    </div>
  </div>
</body>
</html>