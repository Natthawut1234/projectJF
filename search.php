<?php
require("connection/connect.php");

// ดำเนินการค้นหาหนังหรือแสดงรายการหนังทั้งหมด
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $search_results = searchMovies($search);
} else {
    $search_results = getAllMovies();
}

// ฟังก์ชันค้นหาหนัง
function searchMovies($query) {
    global $conn;
    $query = mysqli_real_escape_string($conn, $query);
    $sql = "SELECT * FROM data_movie WHERE name LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);
    $search_results = [];
    
    while ($row = mysqli_fetch_array($result)) {
        $search_results[] = $row;
    }
    
    return $search_results;
}

// ฟังก์ชันรับรายการหนังทั้งหมด
function getAllMovies() {
    global $conn;
    $sql = "SELECT * FROM data_movie";
    $result = mysqli_query($conn, $sql);
    $all_movies = [];
    
    while ($row = mysqli_fetch_array($result)) {
        $all_movies[] = $row;
    }
    
    return $all_movies;
}

// รายการหนังที่แสดง
$num_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM data_movie"));
$limit_page = 8;
$page = isset($_GET['Page']) ? $_GET['Page'] : 1;
$num_page = ceil($num_rows / $limit_page);

if ($page < 1) {
    $page = 1;
} elseif ($page > $num_page) {
    $page = $num_page;
}

$limit_start = ($page - 1) * $limit_page;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- เขียนส่วน head และ stylesheet/script ที่ใช้ -->
</head>
<body>
    <!-- เขียนส่วน navbar -->
    
    <!-- รายการหนังที่แสดง -->
    <div class="album py-5 bg-light">
        <div class="container">
            <!-- รายการหนังที่แสดงตามการค้นหาหรือหนังทั้งหมด -->
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
                        ?>
                        <div class="col-md-3">
                            <div class="card md-4 shadow-sm" style="border: none;">
                                <a href="./play_VDO.php?id=<?=$result['id']?>" style="text-decoration: none;">
                                    <img src="<?=$result['img']?>" width="100%" height="380" class="card-img-top"/>
                                    <div class="card-body" style="color: white; background-color: #3a3e42;">
                                        <p class="card-text text-center" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?=$result['name']?></p>
                                        <div style="position: absolute; bottom: 0; right: 0; rgba(0, 0, 0, 0.7); padding: 5px;">
                                            <span class="inline-metadata-item style-scope ytd-video-meta-block" style="text-align: right; color: #757b81;"><?=$result['views']?> viewing</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // ไม่พบรายการหนัง
                    ?>
                    <div class="h1">ไม่พบรายการหนัง</div>
                    <?php
                }
            } else {
                // ถ้าไม่มีการค้นหาจะแสดงหนังทั้งหมด
                // ...
            }
                ?>
            </div>
            
            <!-- แสดงปุ่มแบ่งหน้า -->
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?Page=<?php echo $page - 1; ?>">Previous</a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $num_page; $i++) {
                        ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="?Page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                    <li class="page-item <?php echo ($page == $num_page) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?Page=<?php echo $page + 1; ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>
