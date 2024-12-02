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
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=verified" />

    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">



    <style>
        .dataTables_paginate .paginate_button i {
            vertical-align: middle;
            font-size: 1.2rem;
        }
    </style>


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
                    <h3 class="mb-0 h4 font-weight-bolder">All System Users</h3>
                    <p class="mb-4">
                        Includes Master, Senior, and Junior Users &nbsp; &nbsp;<a class="text-sm text-primary link-underline-dark-blue" href="#">Learn More</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-dark d-flex pb-0 p-4 justify-content-between shadow-dark border-radius-lg pt-2 pb-1">
                                <h6 class="text-white text-capitalize ps-3">Datalytics Users</h6>
                                <a href="register.php" class="btn btn-light">Add users</a>

                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-4">
                                <table id="usersTable" class="table table-striped table-hover align-items-center mb-0">
                                    <thead>
                                        <tr class="text-sm">
                                            <th class="p-3">ID</th>
                                            <th class="p-2">Fullname</th>
                                            <th class="p-2">Username</th>
                                            <th class="p-2">Email</th>
                                            <th class="p-2">Role</th>
                                            <th class="p-2">Joined</th>
                                            <th class="p-2">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM users";
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
                                                    <td class="text-xs" style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal; max-width: 90px;"><?php echo htmlentities($result->created_at) ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                        if (htmlentities($result->status) == 1) { ?>
                                                            <span style="display: flex; padding: 5px 10px; border-radius: 8px; background-color: #d4edda; color: #155724; font-size: 14px; font-weight: bold;">
                                                                <i class="material-symbols-outlined">
                                                                    verified
                                                                </i>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                responsive: true,
                order: [
                    [0, 'asc']
                ],
                pageLength: 10,
                language: {
                    search: "Filter records:",
                    lengthMenu: "Show _MENU_ entries per page",
                    zeroRecords: "No matching records found",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "No entries available",
                    infoFiltered: "(filtered from _MAX_ total entries)",
                    paginate: {
                        next: '<i class="material-symbols-rounded">arrow_forward</i>',
                        previous: '<i class="material-symbols-rounded">arrow_back</i>'
                    }
                }
            });
        });
    </script>




</body>

</html>