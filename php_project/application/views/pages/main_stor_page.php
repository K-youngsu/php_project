<!--
=========================================================
* Soft UI Dashboard - v1.0.6
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/common/sidebar.php'); ?>  <!--TODO:사이드바-->

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/common/header.php'); ?>  <!--TODO:헤더-->

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row mt-4" style="margin-top: 0rem !important;">
      <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">

<?php
if(!empty($stor_best_like['b_nickname']) && $stor_best_like['like_count'] != 0){
?>
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">글쓴이 : <?=$stor_best_like['b_nickname']?></p>
                    <h5 class="font-weight-bolder">제목 : <?=$stor_best_like['title']?></h5>
                    <p class="mb-0">내용 : <?=$stor_best_like['content']?></p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/main/replay_view/<?=$stor_best_like['board_seq'].'/'.$category?>">
                      좋아요 1등! [<?=$stor_best_like['like_count']?>♥]
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <!-- <img src="/assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-40 top-0 d-lg-block d-none" alt="waves"> -->
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
<?php
if(empty($stor_best_like['file_url'])){
?>
                      <img class="w-100 position-relative z-index-2 pt-0" src="/assets/img/illustrations/rocket-white.png" alt="rocket" width="300px" height="200px">
<?php
} else{
?>                      
                      <img class="w-100 position-relative z-index-2 pt-0" src="<?=$stor_best_like['file_url']?>" alt="이미지 오류.." width="300px" height="200px">
<?php
}
?>                    
                    </div>
                  </div>
                </div>
              </div>
<?php
} else {
?>
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">글쓴이 : 준비중</p>
                    <h5 class="font-weight-bolder">제목 : 준비중</h5>
                    <p class="mb-0">내용 : 준비중</p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="#">
                      좋아요 1등! [준비중♥]
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <!-- <img src="/assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-40 top-0 d-lg-block d-none" alt="waves"> -->
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-0" src="/assets/img/illustrations/rocket-white.png" alt="rocket" width="300px" height="200px">
                    </div>
                  </div>
                </div>
              </div>
<?php
}
?>
            </div>
          </div>
        </div> 
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">

<?php
if(!empty($stor_best_view_cnt['b_nickname']) && $stor_best_view_cnt['view_cnt'] != 0){
?>
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">글쓴이 : <?=$stor_best_view_cnt['b_nickname']?></p>
                    <h5 class="font-weight-bolder">제목 : <?=$stor_best_view_cnt['title']?></h5>
                    <p class="mb-0">내용 : <?=$stor_best_view_cnt['content']?></p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/main/replay_view/<?=$stor_best_view_cnt['board_seq'].'/'.$category?>">
                      조회수 1등! [<?=$stor_best_view_cnt['view_cnt']?>]
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <!-- <img src="/assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-40 top-0 d-lg-block d-none" alt="waves"> -->
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
<?php
if(empty($stor_best_view_cnt['file_url'])){
?>                      
                      <img class="w-100 position-relative z-index-2 pt-0" src="/assets/img/illustrations/rocket-white.png" alt="rocket" width="300px" height="200px">
<?php
} else{
?>                      
                      <img class="w-100 position-relative z-index-2 pt-0" src="<?=$stor_best_view_cnt['file_url']?>" alt="이미지 오류.." width="300px" height="200px">
<?php
}
?>                    
                    </div>
                  </div>
                </div>
              </div>
<?php
} else {
?>  
              <div class="row">
                <div class="col-lg-6">
                  <div class="d-flex flex-column h-100">
                    <p class="mb-1 pt-2 text-bold">글쓴이 : 준비중</p>
                    <h5 class="font-weight-bolder">제목 : 준비중</h5>
                    <p class="mb-0">내용 : 준비중</p>
                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="#">
                      조회수 1등! [준비중]
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                  <div class="bg-gradient-primary border-radius-lg h-100">
                    <!-- <img src="/assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-40 top-0 d-lg-block d-none" alt="waves"> -->
                    <div class="position-relative d-flex align-items-center justify-content-center h-100">
                      <img class="w-100 position-relative z-index-2 pt-0" src="/assets/img/illustrations/rocket-white.png" alt="rocket" width="300px" height="200px">
                    </div>
                  </div>
                </div>
              </div>
<?php
}
?>
            </div>
          </div>
        </div> 
      </div>
      <div class="row" style="margin-top: 25px;">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <a href="/main">
              <div class="card-body p-3" >  <!-- 현재 사용할 div 구역 -->
                <div class="row">
                  <div class="col-8">
                    <div class="numbers" >
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">전체 게시글</p>
                      <h5 class="font-weight-bolder mb-0">
                        <span class="text-info text-sm font-weight-bolder">[ <?=$all_list_cnt['cnt']?> ]</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <a href="/main/today_list">
              <div class="card-body p-3">
               <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">오늘자 게시글</p>
                      <h5 class="font-weight-bolder mb-0">
                        <!-- 2,300 -->
                        <span class="text-info text-sm font-weight-bolder">[ <?=$today_list_cnt['cnt']?> ]</span>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card  border border-primary border-3">
            <a href="/main/stor_list">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">찜한 게시글</p>
                      <h5 class="font-weight-bolder mb-0">
<?php
if(!empty ($_SESSION['seq'])){
?>
                        <span class="text-info text-sm font-weight-bolder">[ <?=$stor_list_cnt['cnt']?> ]</span>
<?php
}
?>
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <a href="/main/my_list">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">나의 게시글</p>
                      <h5 class="font-weight-bolder mb-0">
<?php
if(!empty ($_SESSION['seq'])){
?>                       
                        <span class="text-info text-sm font-weight-bolder">[ <?=$my_list_cnt['cnt']?> ]</span>
<?php
}
?>                        
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>




      <form action="/main/stor_list" name="serch_from" method="get" onsubmit="return serch()">



      


      <div class="ms-md-auto pe-md-3 d-flex align-items-center" style="width: 700px; margin: 0 auto; margin-top: 20px;">
        <div class="input-group">
          <button type="button"  class="input-group-text text-body" onclick="serch()">
            <span class="input-group-text text-body" style="border: none;"><i class="fas fa-search" aria-hidden="true"></i></span>
          </button>
          <input type="text" name="serch_title" class="form-control" placeholder="게시글 제목 입력...">
        </div>
      </div>


      <div class="row my-4">
        <div class="col-12">
          <div class="card mb-4">
            <!-- <div class="card-header pb-0">
              <h6>리스트 테이블</h6>
            </div> -->
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">


              <input type="hidden" name="page" id="page" value="<?= !empty($page_num) ? $page_num : 1 ?>">  



                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">제목</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">조회수</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">작성자</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">찜한 날짜</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">파일 유무</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
foreach($board_list as $row => $list){
  if($list['is_file'] == 'Y'){
    $board_file_check = 'o';
  } else {
    $board_file_check = 'x';
  }
?>
                    <tr>
                      <td>
                        <a href="/main/replay_view/<?=$list['b_seq']. '/'.'stor'.'?'. $_SERVER['QUERY_STRING']; ?>">
                          <div class="d-flex px-2 py-1">
                            <div>
                              <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1"> -->
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"> <?=$list['title']?></h6>  <!-- 제목 -->
                              <!--<p class="text-xs text-secondary mb-0">john@creative-tim.com</p>  사용 안해도 될듯 -->
                            </div>
                          </div>
                        </a>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><h6 style="font-size: 15px; color: gray;">[<?=$list['view_cnt']?>]</h6></p>  <!-- 조회수 -->
                        <!-- <p class="text-xs text-secondary mb-0">Organization</p> 사용 안해도 될듯 -->
                      </td>
                      <td class="align-middle text-center text-sm">
                        <!-- <span class="badge badge-sm bg-gradient-success">Online</span> -->
                        <p class="text-xs font-weight-bold mb-0"><?=$list['b_nickname']?></p>  <!-- 작성자 -->
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$list['ts_regdt']?></span>
                      </td>
                      <td class="align-middle text-center">
                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          <?=$board_file_check?>
                        </a>
                      </td>
                    </tr>
<?php
}
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <div style="width: 100%; padding-left: 570px;">
            <?=$pagination?>   
          </div>




        </div>
      </div>
      

      </form>

  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>



  <script>

    function serch(){
      let serch = document.querySelector('input[name="serch_title"]');
      let page_num = document.querySelector('input[name="page"]');

      if(serch.value.length > 1){
        document.querySelector('#page').value = 1;
      }
      // alert('serch 폼 들어옴');
      document.serch_from.submit();
    }

  </script>




</body>

</html>