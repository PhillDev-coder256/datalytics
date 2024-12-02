<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Datalytics
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include_once('../includes/sidebar.php'); ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include_once('../includes/top-bar.php'); ?>
        <!-- End Navbar -->
        <div class="container-fluid py-2">
            <div class="row">
                <div class="ms-3">
                    <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
                    <p class="mb-4">
                        Check the sales, value and bounce rate by country.
                    </p>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Total Adverts</p>
                                    <h4 class="mb-0">
                                        <div style="display: none;">
                                            <?php
                                            include_once('../includes/fetch/fetch-adverts.php');
                                            ?>

                                        </div>
                                        <?php

                                        if (isset($totalRecords)) {
                                            echo $totalRecords;
                                        } else {
                                            echo "N/A";
                                        }
                                        ?>

                                    </h4>
                                </div>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">campaign</i>
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-2 ps-3">
                            <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">
                                    <?php

                                    if (isset($totalRecords)) {
                                        echo $totalRecords;
                                    } else {
                                        echo "N/A";
                                    }
                                    ?>
                                </span>adverts fetched. <a href="#">More</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <a href="all-users.php">
                        <div class="card">
                            <div class="card-header p-2 ps-3">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                                        <h4 class="mb-0">
                                            <?php
                                            $sqlUsers = "SELECT * FROM users";
                                            $queryUsers = $dbh->prepare($sqlUsers);
                                            $queryUsers->execute();

                                            $totalUsers = $queryUsers->rowCount();

                                            if (isset($totalUsers)) {
                                                echo $totalUsers;
                                            } else {
                                                echo "N/A";
                                            }
                                            ?>
                                        </h4>
                                    </div>
                                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                        <i class="material-symbols-rounded opacity-10">groups</i>
                                    </div>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-2 ps-3">
                                <p class="mb-0 text-sm"><span class="text-success font-weight-bolder"></span>Master, Senior, & Junior Users</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Ads Views</p>
                                    <h4 class="mb-0">3,462</h4>
                                </div>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">leaderboard</i>
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-2 ps-3">
                            <p class="mb-0 text-sm"><span class="text-danger font-weight-bolder">-2% </span>than yesterday</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Sales</p>
                                    <h4 class="mb-0">$103,430</h4>
                                </div>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">weekend</i>
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-2 ps-3">
                            <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+5% </span>than yesterday</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-6 mt-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-0 ">Weekly Adverts(Bar Chart)</h6>
                            <p class="text-sm ">Adverts per day, all through the week</p>
                            <div class="pe-2">
                                <div class="chart">
                                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm"> Weekly capture of adverts</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card ">
                        <div class="card-body">
                            <h6 class="mb-0 ">Weekly Adverts(Line Graph)</h6>
                            <p class="text-sm "> Adverts per day, all through the week</p>
                            <div class="pe-2">
                                <div class="chart">
                                    <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                                <p class="mb-0 text-sm"> updated 4 min ago </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mt-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-0 ">Adverts by month</h6>
                            <p class="text-sm ">Monthly Advertisement Performance</p>
                            <div class="pe-2">
                                <div class="chart">
                                    <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div>
                            <hr class="dark horizontal">
                            <div class="d-flex ">
                                <i class="material-symbols-rounded text-sm my-auto me-1">calendar_today</i>
                                <p class="mb-0 text-sm">Last updated: <span id="last-updated-time">recently</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Recent Users</h6>
                                    <p class="text-sm mb-0">
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <?php
                                        $sql2 = "SELECT * FROM users WHERE status = 1";
                                        $query2 = $dbh->prepare($sql2);
                                        $query2->execute();

                                        $fetchusers2 = $query2->fetchAll(PDO::FETCH_OBJ);

                                        $totalUsersActive = count($fetchusers2);

                                        ?>
                                        <span class="font-weight-bold ms-1">
                                            <?php
                                            if (isset($totalUsersActive)) {
                                                echo $totalUsersActive;
                                            } else {
                                                echo "N/A";
                                            }
                                            ?>
                                            Active User</span> this month

                                    </p>
                                </div>
                                <div class="col-lg-6 col-5 my-auto text-end">
                                    <a href="register.php" class="btn btn-success"><i class="fa fa-add text-secondary"></i> Add User</a>
                                    &nbsp; &nbsp;
                                    <div class="dropdown float-lg-end pe-4">
                                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v text-secondary"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Master Users</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Senior User</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Junior Users</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr class="text-sm">
                                            <th class="p-3">ID</th>
                                            <th class="p-2">Fullname</th>
                                            <th class="p-2">Username</th>
                                            <th class="p-2">Email</th>
                                            <th class="p-2">Role</th>
                                            <th class="p-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM users WHERE status = 1";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();

                                        $fetchusers = $query->fetchAll(PDO::FETCH_OBJ);

                                        if ($query->rowCount() > 0) {
                                            foreach ($fetchusers as $result) { ?>
                                                <tr>
                                                    <td class="text-xs p-3" style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal; max-width: 90px;"><?php echo htmlentities($result->user_id) ?></td>
                                                    <td class="text-xs" style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal; max-width: 90px;"><?php echo htmlentities($result->fullname) ?></td>
                                                    <td class="text-xs" style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal; max-width: 90px;"><?php echo htmlentities($result->username) ?></td>
                                                    <td class="text-xs" style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal; max-width: 90px;"><?php echo htmlentities($result->email) ?></td>
                                                    <td class="text-xs" style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal; max-width: 90px;"><?php echo htmlentities($result->role) ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                        if (htmlentities($result->status) == 1) { ?>
                                                            <span style="display: flex; padding: 5px 10px; border-radius: 8px; background-color: #d4edda; color: #155724; font-size: 14px; font-weight: bold;">
                                                                &#x2713;
                                                                &nbsp; Active
                                                            </span>
                                                        <?php } else { ?>
                                                            <span style="display: flex; padding: 5px 10px; border-radius: 8px; background-color: #f8d7da; color: #721c24; font-size: 14px; font-weight: bold;">
                                                                <i class="material-symbols-rounded dropdown-icon opacity-5" style="vertical-align: middle; margin-right: 5px;">error</i>
                                                                &nbsp; Inactive
                                                            </span>
                                                        <?php }
                                                        ?>
                                                    </td>

                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan="7" class="text-center">No users found. <a href="register.php">Register Users</a></td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6>Orders overview</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">24%</span> this month
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-success text-gradient">notifications</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-danger text-gradient">code</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-info text-gradient">shopping_cart</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-warning text-gradient">credit_card</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-primary text-gradient">key</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                                    </div>
                                </div>
                                <div class="timeline-block">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-dark text-gradient">payments</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <?php

            include_once('../includes/footer.php'); ?>
        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-symbols-rounded py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-symbols-rounded">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark active" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2  active ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
                <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2"
                        target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>

    <!-- Adverts by week chart -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('../includes/fetch/fetch-adverts-weekly.php')
                .then(response => response.json())
                .then(data => {
                    // Update the chart
                    var ctx = document.getElementById("chart-bars").getContext("2d");

                    new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: data.labels, // Use labels from the fetched data
                            datasets: [{
                                label: "Adverts",
                                tension: 0.4,
                                borderWidth: 0,
                                borderRadius: 4,
                                borderSkipped: false,
                                backgroundColor: "#43A047",
                                data: data.data, // Use data values from the fetched data
                                barThickness: 'flex'
                            }],
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
                                        borderDash: [5, 5],
                                        color: '#e5e5e5'
                                    },
                                    ticks: {
                                        suggestedMin: 0,
                                        suggestedMax: 500,
                                        beginAtZero: true,
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            lineHeight: 2
                                        },
                                        color: "#737373"
                                    },
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
                                        color: '#737373',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            lineHeight: 2
                                        },
                                    }
                                },
                            },
                        },
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>

    <!-- Adverts by week line graph -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('../includes/fetch/fetch-adverts-weekly.php')
                .then(response => response.json())
                .then(data => {
                    // Update the chart
                    var ctx2 = document.getElementById("chart-line").getContext("2d");

                    new Chart(ctx2, {
                        type: "line",
                        data: {
                            labels: data.labels, // Use labels from the fetched data
                            datasets: [{
                                label: "Adverts",
                                tension: 0,
                                borderWidth: 2,
                                pointRadius: 3,
                                pointBackgroundColor: "#43A047",
                                pointBorderColor: "transparent",
                                borderColor: "#43A047",
                                backgroundColor: "transparent",
                                fill: true,
                                data: data.data,
                                maxBarThickness: 6
                            }],
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
                                        borderDash: [5, 5],
                                        color: '#e5e5e5'
                                    },
                                    ticks: {
                                        suggestedMin: 0,
                                        suggestedMax: 500,
                                        beginAtZero: true,
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            lineHeight: 2
                                        },
                                        color: "#737373"
                                    },
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
                                        color: '#737373',
                                        padding: 10,
                                        font: {
                                            size: 14,
                                            lineHeight: 2
                                        },
                                    }
                                },
                            },
                        },
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>

    <!-- Adverts by months in a year -->
    <script>
        var ctxyear = document.getElementById("chart-line-tasks").getContext("2d");

        // Fetch data from the PHP endpoint
        fetch('../includes/fetch/fetch-adverts-year.php') // Replace with your actual PHP file path
            .then(response => response.json())
            .then(data => {
                // Extract labels and data from the JSON response
                var labels = data.labels;
                var chartData = data.data;

                new Chart(ctxyear, {
                    type: "line",
                    data: {
                        labels: labels, // Use the fetched month labels
                        datasets: [{
                            label: "Number of Adverts",
                            tension: 0,
                            borderWidth: 2,
                            pointRadius: 3,
                            pointBackgroundColor: "#43A047",
                            pointBorderColor: "transparent",
                            borderColor: "#43A047",
                            backgroundColor: "transparent",
                            fill: true,
                            data: chartData, // Use the fetched data for number of adverts
                            maxBarThickness: 6
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false,
                            },
                            tooltip: {
                                callbacks: {
                                    title: function(context) {
                                        const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                                        return fullMonths[context[0].dataIndex];
                                    }
                                }
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
                                    borderDash: [4, 4],
                                    color: '#e5e5e5'
                                },
                                ticks: {
                                    display: true,
                                    color: '#737373',
                                    padding: 10,
                                    font: {
                                        size: 12,
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
                                    color: '#737373',
                                    padding: 10,
                                    font: {
                                        size: 12,
                                        lineHeight: 2
                                    },
                                }
                            },
                        },
                    },
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    </script>


    <!-- <script>
        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Tasks",
                    tension: 0,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: "#43A047",
                    pointBorderColor: "transparent",
                    borderColor: "#43A047",
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
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
                            borderDash: [4, 4],
                            color: '#e5e5e5'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#737373',
                            font: {
                                size: 14,
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
                            borderDash: [4, 4]
                        },
                        ticks: {
                            display: true,
                            color: '#737373',
                            padding: 10,
                            font: {
                                size: 14,
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script> -->
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
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>

</body>

</html>