<?php

session_start();

?>
<!DOCTYPE html5>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        ::Datalytics | All Adverts
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

    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Load DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <!-- Load DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

    <!-- Load Buttons extension CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">

    <!-- Load Buttons extension JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>



    <style>
        .dataTables_paginate .paginate_button i {
            vertical-align: middle;
            font-size: 1rem;
            margin: 0 15px;
        }

        .dataTables_paginate .paginate_button {
            margin: 0 5px;
            cursor: pointer;
            padding: 5px;
            /* Adds spacing between pagination buttons */
        }

        .dataTables_paginate .paginate_button:hover {
            border-bottom: 1px solid #007bff;
            /* Blue border for professional look */
            border-radius: 10%;
            /* Adds space inside the button */
            color: #007bff;
            /* Matches the border color */
            background-color: #f8f9fa;
            /* Light background for contrast */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
        }

        .dataTables_paginate .paginate_button.active {
            background-color: #007bff;
            /* Change the background color for the active page */
            color: #ffffff;
            /* White text for the active page */
            border: 1px solid #007bff;
            /* Matches the border to the active color */
            box-shadow: 0px 4px 8px rgba(0, 123, 255, 0.2);
            /* Optional: adds a shadow for emphasis */
        }

        #advertsTable thead tr th {
            font-size: 12px;
            letter-spacing: 1.5;
        }

        #advertsTable tbody tr td {
            font-size: 10px;
        }

        .pagination-icon {
            border: 1px solid #007bff;
            /* Blue border for professional look */
            border-radius: 50%;
            /* Makes it circular */
            padding: 5px;
            /* Adds space inside the button */
            color: #007bff;
            /* Matches the border color */
            background-color: #f8f9fa;
            /* Light background for contrast */
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
            transition: all 0.3s ease;
            /* Smooth hover effect */
            cursor: pointer;
            /* Makes it clear it's clickable */
        }

        .pagination-icon:hover {
            color: #fff;
            /* Text turns white on hover */
            background-color: #007bff;
            /* Blue background on hover */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            /* Enhanced shadow effect */
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
                    <h3 class="mb-0 h4 font-weight-bolder">All Adverts</h3>
                    <p class="mb-4">
                        Includes all adverts as picked from the API data &nbsp; &nbsp;<a class="text-sm text-primary link-underline-dark-blue" href="#">Learn More</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-2 pb-1">
                                <h6 class="text-white text-capitalize ps-3">All time Adverts</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-4">
                                <div class="mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                                    <div>
                                        <label for="startDate" class="form-label">Start Date:</label>
                                        <input type="date" id="startDate" class="form-control">
                                    </div>
                                    <div>
                                        <label for="endDate" class="form-label">End Date:</label>
                                        <input type="date" id="endDate" class="form-control">
                                    </div>
                                    <button id="filterButton" class="btn btn-primary">Filter</button>
                                </div>
                                <table id="advertsTable" class="display">
                                    <thead>
                                        <tr style="padding: 10px !important" class=" bg-dark text-light">
                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Time</th>
                                            <th>Duration</th>
                                            <th>Commercials Name</th>
                                            <th>Ad Type</th>
                                            <th>Cost Net</th>
                                            <th>Cost Gross</th>
                                            <th>Comments</th>
                                            <th>Position</th>
                                            <th>Media</th>
                                            <th>Brand</th>
                                            <th>Company</th>
                                            <th>Subsector</th>
                                            <th>Sector</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
    <?php

    include_once('../includes/nav-config.php');

    ?>
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

    <!-- Include jQuery and DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            let advertsTable = $('#advertsTable').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                ajax: {
                    url: '../includes/fetch/fetch-adverts.php',
                    type: 'GET',
                    dataSrc: function(json) {
                        if (!json.data || !Array.isArray(json.data)) {
                            console.error('Invalid JSON response:', json);
                            alert('Error fetching data. Please try again.');
                            return [];
                        }
                        return json.data;
                    },
                    error: function(xhr, error, code) {
                        console.error('AJAX error:', xhr.responseText, error, code);
                        alert('Error fetching data from server. Please check your connection.');
                    }
                },
                columns: [{
                        data: 'date'
                    },
                    {
                        data: 'day'
                    },
                    {
                        data: 'time'
                    },
                    {
                        data: 'duration'
                    },
                    {
                        data: 'commercials_Name'
                    },
                    {
                        data: 'adtype'
                    },
                    {
                        data: 'cost_Net'
                    },
                    {
                        data: 'cost_Gross'
                    },
                    {
                        data: 'comments'
                    },
                    {
                        data: 'position'
                    },
                    {
                        data: 'media'
                    },
                    {
                        data: 'brand'
                    },
                    {
                        data: 'company'
                    },
                    {
                        data: 'subsector'
                    },
                    {
                        data: 'sector'
                    }
                ],


                columnDefs: [{
                    type: 'date-uk',
                    targets: 0
                }],
                reponsive: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                order: [
                    [0, 'asc']
                ],
                dom: 'Blfrtip',
                buttons: [{
                    extend: 'print',
                    text: 'Print Table',
                    title: 'My Custom Table Title',
                    message: 'This is a custom print message.',
                    autoPrint: true, // Automatically triggers print dialog when clicked
                    exportOptions: {
                        columns: ':visible', // Exports only visible columns
                        format: {
                            body: function(data, row, column, node) {
                                // Custom format for cell data (optional)
                                return data;
                            }
                        }
                    },
                    customize: function(win) {
                        $(win.document.body).css('font-size', '12pt'); // Customize font size
                        $(win.document.body).find('table').addClass('table table-bordered'); // Add CSS classes to table
                    }
                }],
                language: {
                    print: "Print the table"
                },
                language: {
                    search: "Filter adverts:",
                    searchPlaceholder: "Search for adverts...",
                    lengthMenu: "Show _MENU_ entries per page",
                    zeroRecords: "No matching records found",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "No entries available",
                    infoFiltered: "(filtered from _MAX_ total entries)",
                    loadingRecords: "Loading data, please wait...",
                    processing: "Processing...",
                    emptyTable: "No data available in the table",
                    infoPostFix: "entries",
                    infoThousands: ",",
                    paginate: {
                        next: '<i class="material-symbols-rounded pagination-icon">arrow_forward</i>',
                        previous: '<i class="material-symbols-rounded pagination-icon">arrow_back</i>',
                        first: 'First',
                        last: 'Last'
                    },
                    aria: {
                        sortAscending: ": activate to sort column ascending",
                        sortDescending: ": activate to sort column descending"
                    }
                }

            });

            // Add custom filtering logic for date range
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                let startDate = $('#startDate').val();
                let endDate = $('#endDate').val();
                let rowDate = data[0]; // The 'date' column (0th index in the table)

                // If no start or end date is specified, show all rows
                if (!startDate && !endDate) {
                    return true;
                }

                // Convert dates to a comparable format (ISO 8601: YYYY-MM-DD)
                let rowDateObj = new Date(rowDate);
                let startDateObj = startDate ? new Date(startDate) : null;
                let endDateObj = endDate ? new Date(endDate) : null;

                // Check if rowDate is within the specified range
                if (
                    (!startDateObj || rowDateObj >= startDateObj) &&
                    (!endDateObj || rowDateObj <= endDateObj)
                ) {
                    return true;
                }

                return false;
            });

            // Trigger filtering on button click
            $('#filterButton').click(function() {
                advertsTable.draw();
                // console.log("Row date" + rowDate);
                // console.log("S".startDateObj);
                // console.log("E".endDateObj);
            });

            $('#filterButton').on('click', function() {
                let startDate = $('#startDate').val();
                let endDate = $('#endDate').val();

                // Check if both dates are provided
                if (!startDate || !endDate) {
                    alert('Please select both Start Date and End Date.');
                    return;
                }

                // Reload DataTable with additional parameters
                advertsTable.ajax.url(`../includes/fetch/fetch-adverts.php?startDate=${startDate}&endDate=${endDate}`).load();
            });

        });
    </script>





</body>

</html>