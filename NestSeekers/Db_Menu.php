<?php include_once("admin/Connection.php");?>
<div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-none d-xl-block d-lg-block">
                    <div class="dashboard-inner">
                        <h4>Main</h4>
                        <ul>
                            <li class="active"><a href="Dashboard.php?UserID=<?php echo $_SESSION['UserID'];?>"><i class="flaticon-dashboard"></i> Dashboard</a></li>
                            <!-- <li><a href="messages.html"><i class="flaticon-mail"></i> Messages <span class="nav-tag">6</span></a></li>
                            <li><a href="bookings.html"><i class="flaticon-calendar"></i> Bookings</a></li> -->
                        </ul>
                        <?php
                        if($_SESSION['UserType']=='A')
                        {
                        ?>
                        <h4>Agent Listings</h4>
                        <ul>
                            <li><a href="AgentRecentProperty.php?UserID=<?php echo $_SESSION['UserID'];?>"><i class="flaticon-apartment-1"></i>Recent Properties</a></li>
                            <!-- <li><a href="my-invoices.html"><i class="flaticon-bill"></i>My Invoices</a></li> -->
                            <li><a href="AgentDeal.php?UserID=<?php echo $_SESSION['UserID'];?>"><i class="flaticon-heart"></i>My Deal </a></li>
                            <li><a href="SoldProperty.php"><i class="flaticon-apartment"></i>Sold Property</a></li>
                        </ul>
                        <?php
                        }
                        if($_SESSION['UserType']=='O')
                        {
                        ?>
                        <h4>Listings</h4>
                        <ul>
                            <li><a href="my-properties.php?UserID=<?php echo $_SESSION['UserID'];?>"><i class="flaticon-apartment-1"></i>My Properties</a></li>
                            <!-- <li><a href="my-invoices.html"><i class="flaticon-bill"></i>My Invoices</a></li> -->
                            <li><a href="favorited-properties.php?UserID=<?php echo $_SESSION['UserID'];?>"><i class="flaticon-heart"></i>favourite Properties</a></li>
                             <li><a href="SoldProperty.php"><i class="flaticon-apartment"></i>My SoldOut Property</a></li>
                            <?php 
                                if($_SESSION['IsVerifiedEmail']==0 )
                                {
                                    if($_SESSION['UserType']=='A' && $_SESSION['UserIsVerified']==0)
                                    {
                            ?>
                            <li><a href="Package.php?UserID=<?php echo $_SESSION['UserID']; ?>" style="pointer-events: none;" ><i class="flaticon-plus"></i>Submit Property</a></li>
                            <?php
                                    }
                                }else
                                {
                            ?>
                            <li><a href="Package.php?UserID=<?php echo $_SESSION['UserID']; ?>"><i class="flaticon-plus"></i>Submit Property</a></li>

                            <?php
                                }
                            ?>
                        </ul>
                        <?php
                        }
                        ?>
                        <h4>Account</h4>
                        <ul>
                            <li><a href="my-profile.php?UserID=<?php echo $_SESSION['UserID'];?>"><i class="flaticon-people"></i>My Profile</a></li>
                            <li><a href="Change-Password.php?UserID=<?php echo $_SESSION['UserID'];?>"><i class="fa fa-key"></i>Change Password</a></li>
                            <li><a href="Logout.php"><i class="flaticon-logout"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>