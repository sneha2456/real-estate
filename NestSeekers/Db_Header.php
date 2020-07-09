<?php include_once("admin/Connection.php");?>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- <a class="navbar-brand logo pad-0" href="index.html">
                <img src="img/logos/black-logo.png" alt="logo">
            </a> -->
            <a href="index.php"><img src="img/logos/bl.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <!--  <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
                    <li class="nav-item dropdown active">
                        <a href="dashboard.html" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="messages.html" class="nav-link">Messages</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="bookings.html" class="nav-link">Bookings</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="my-properties.html" class="nav-link">My Properties</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="my-invoices.html" class="nav-link">My Invoices</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="favorited-properties.html" class="nav-link">Favorited Properties</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="SubmitProperty.php" class="nav-link">Submit Property</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="my-profile.html" class="nav-link">My Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="Logout.php" class="nav-link">Logout</a>
                    </li>
                </ul> -->
                <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
                    <ul>
                        <li>
                            <div class="dropdown btns">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                        $select_query="select * from tbluser where UserID='".$_SESSION['UserID']."'";
                                        $Execute_Q=mysqli_query($con,$select_query) or die(mysqli_error($con));
                                        $fetch=mysqli_fetch_array($Execute_Q);
                                              $imageName=$fetch['ProfilePic'];
                                              if($imageName=="" || !file_exists("img/ProfileImages/$imageName"))
                                              {
                                                $imageName="No.png";
                                              }
                                            ?>
                                    <img src="img/ProfileImages/<?php echo $imageName;?>" alt="avatar">
                                    My Account
                                </a>
                                <div class="dropdown-menu">
                                     

                                        <!--  -->
                                        <?php
                                        if($_SESSION['UserType']=='A')
                                        {
                                        ?>
                                           
                                            <a class="dropdown-item" href="Dashboard.php?UserID=<?php echo $_SESSION['UserID'];?>">Dashboard</a>
                                            <hr>
                                            <a class="dropdown-item" href="AgentRecentProperty.php?UserID=<?php echo $_SESSION['UserID'];?>">Recent Properties</a>

                                            <a class="dropdown-item" href="AgentDeal.php?UserID=<?php echo $_SESSION['UserID'];?>">My Deal </a>
                                            <a  class="dropdown-item" href="SoldProperty.php">Sold Property</a>
                                        <?php
                                        }
                                        if($_SESSION['UserType']=='O')
                                        {
                                        ?>
                                            <a class="dropdown-item" href="Dashboard.php?UserID=<?php echo $_SESSION['UserID'];?>">Dashboard</a>
                                            <hr>
                                            <a class="dropdown-item" href="my-properties.php?UserID=<?php echo $_SESSION['UserID'];?>">MyProperties</a>
                                            <a class="dropdown-item" href="favorited-properties.php?UserID=<?php echo $_SESSION['UserID'];?>">favourite Properties</a>
                                     
                                            <?php
                                        }
                                        ?>
                                    
                                      <hr>
                                    <a class="dropdown-item" href="my-profile.php?UserID=<?php echo $_SESSION['UserID'];?>">My profile</a>
                                      <a class="dropdown-item" href="Change-Password.php?UserID=<?php echo $_SESSION['UserID'];?>">Change Password</a>
                                    <a class="dropdown-item" href="Logout.php">Logout</a>
                                </div>
                            </div>
                        </li>
                        <!-- <li>
                            <a class="btn btn-theme btn-md" href="SubmitProperty.php">Submit property</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>