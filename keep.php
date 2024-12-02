<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href="#">
            <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
            <span class="ms-1 text-sm text-dark">Datalytics</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul style="border: 0px solid red;" class="p-0 navbar-nav">
            <li class="nav-item">
                <a class="nav-link active bg-gradient-dark text-white" href="./">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li style="cursor: pointer" data-bs-toggle="collapse" data-bs-target="#filterAdverts" aria-expanded="false" aria-controls="filterAdverts" class="nav-item mt-3">
                <h6 class="d-flex justify-content-between align-items-center ps-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-5">
                    Filter Adverts
                    <i class="material-symbols-rounded dropdown-icon">expand_more</i>
                </h6>
            </li>
            <div class="collapse" id="filterAdverts">
                <li class="nav-item" title="Comprehensive list of campaigns with performance data.">
                    <a class="nav-link text-dark" href="all-users.php">
                        <i class="material-symbols-rounded dropdown-icon opacity-5">chevron_right</i>
                        <span class="nav-link-text ms-1">By Region</span>
                    </a>
                </li>
                <li class="nav-item" title="Comprehensive list of campaigns with performance data.">
                    <a class="nav-link text-dark" href="all-users.php">
                        <i class="material-symbols-rounded dropdown-icon opacity-5">chevron_right</i>
                        <span class="nav-link-text ms-1"> By Media</span>
                    </a>
                </li>
                <li class="nav-item" title="Comprehensive list of campaigns with performance data.">
                    <a class="nav-link text-dark" href="all-users.php">
                        <i class="material-symbols-rounded dropdown-icon opacity-5">chevron_right</i>
                        <span class="nav-link-text ms-1">By Month</span>
                    </a>
                </li>
            </div>

            <!-- Users -->
            <li style="cursor: pointer" data-bs-toggle="collapse" data-bs-target="#userMenu" aria-expanded="false" aria-controls="userMenu" class="nav-item mt-3">
                <h6 class="d-flex justify-content-between align-items-center ps-2 ms-2 text-uppercase text-xs font-weight-bolder opacity-5">
                    System Users
                    <i class="material-symbols-rounded dropdown-icon">expand_more</i>
                </h6>
            </li>
            <div class="collapse" id="userMenu">
                <li class="nav-item" title="Comprehensive list of campaigns with performance data.">
                    <a class="nav-link text-dark" href="all-users.php">
                        <i class="material-symbols-rounded dropdown-icon opacity-5">chevron_right</i>
                        <span class="nav-link-text ms-1">Master Users</span>
                    </a>
                </li>
                <li class="nav-item" title="Comprehensive list of campaigns with performance data.">
                    <a class="nav-link text-dark" href="all-users.php">
                        <i class="material-symbols-rounded dropdown-icon opacity-5">chevron_right</i>
                        <span class="nav-link-text ms-1"> Senior Users</span>
                    </a>
                </li>
                <li class="nav-item" title="Comprehensive list of campaigns with performance data.">
                    <a class="nav-link text-dark" href="all-users.php">
                        <i class="material-symbols-rounded dropdown-icon opacity-5">chevron_right</i>
                        <span class="nav-link-text ms-1">Junior Users</span>
                    </a>
                </li>
            </div>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn btn-outline-dark mt-4 w-100" href="#" type="button">Login</a>
            <a class="btn bg-gradient-dark w-100" href="#" type="button">Phillip Ssempeebwa</a>
        </div>
    </div>
</aside>

<script>
    document.querySelector('[data-bs-toggle="collapse"]').addEventListener('click', function() {
        const icon = this.querySelector('.dropdown-icon');
        const isExpanded = this.getAttribute('aria-expanded') === 'true';

        // Toggle icon based on expanded state
        icon.textContent = isExpanded ? 'expand_more' : 'expand_less';
    });
</script>

<script src="https://kit.fontawesome.com/ecf5c1768c.js" crossorigin="anonymous"></script>