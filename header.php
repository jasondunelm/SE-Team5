<!-- the navigation bar of homepage -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href="https://www.teamdurham.com"><img src="images/small_logo.png"></a>&nbsp;&nbsp;
<!--    <a class="navbar-brand" href="https://www.teamdurham.com">DUS</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index_admin.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="events.php">Events</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Facilities
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="facility.php?facilityName=Fitness Suite">Fitness Suite</a>
                    <a class="dropdown-item" href="sportsHall.php">Sports Hall</a>
                    <a class="dropdown-item" href="facility.php?facilityName=Artificial Pitches">Artificial Pitches</a>
                    <a class="dropdown-item" href="facility.php?facilityName=Rowing Tank">Rowing Tank</a>
                    <a class="dropdown-item" href="facility.php?facilityName=Ergo Gallery">Ergo Gallery</a>
                    <a class="dropdown-item" href="outdoorFacilities.php">Outdoor Facilities</a>
                    <a class="dropdown-item" href="facility.php?facilityName=Maiden Castle Physiotherapy">Maiden Castle Physiotherapy</a>
                    <a class="dropdown-item" href="facility.php?facilityName=Aerobics Room">Aerobics Room</a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://www.teamdurham.com/queenscampus/">Queen's campus</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Other Information
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="openTime.php">Open time</a>
                    <a class="dropdown-item" href="cater.php">Cafe and Catering</a>

                </div>
            </li>

            <li class="nav-item dropdown" id="divId">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Management
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="facilityManage.php">Facility Mgt.</a>
                    <a class="dropdown-item" href="editUserType.php">User Mgt.</a>
                    <a class="dropdown-item" href="fullcalendar2/index.php">Booking Mgt.</a>

                </div>
            </li>


        </ul>


        <form class="form-inline my-2 my-lg-0" action="search_result.php" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="facilityName">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>

        </form>

        <ul class="navbar-nav mr-right">
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="Facilities" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    Accounts
                </a>
                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" id="login" href="login.php">Login</a>
                    <a class="dropdown-item" id="register" href="register.php">Sign up</a>
                    <a class="dropdown-item" id="account_update" href="user_update.php">Update info</a>
                    <a class="dropdown-item" id="logout" href="index_admin.php?action=logout">Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>