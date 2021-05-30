<?php

/** 
 * User: Raven Lucin <lucinraven@gmail.com> 
 * Date: 5/15/2021
 * Time: 12:05 PM
 */
include '../includes/header.php';
?>

<!-- start of account tabs page -->
<div class="account-tabs">
    <!-- container -->
    <div class="container-sm">
        <div class="tab-view-pages">
            <!-- Tab pages button -->
            <ul class="nav nav-tabs" id="myTab0" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab0" data-mdb-toggle="tab" data-mdb-target="#home0" type="button" role="tab" aria-controls="home" aria-selected="true">
                        Notifcation
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab0" data-mdb-toggle="tab" data-mdb-target="#profile0" type="button" role="tab" aria-controls="profile" aria-selected="false">
                        Favorites
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab0" data-mdb-toggle="tab" data-mdb-target="#contact0" type="button" role="tab" aria-controls="contact" aria-selected="false">
                        Searches
                    </button>
                </li>
            </ul>

            <!-- Tab pages content -->
            <div class="tab-content" id="myTabContent0">

                <!-- Notification Tab pane -->
                <div class="tab-pane fade show active" id="home0" role="tabpanel" aria-labelledby="home-tab0">
                    <!-- Tab view page body -->
                    <div class="tab-header">
                        <h1>All Notifications</h1>
                    </div>

                    <!-- Tab view page body -->
                    <div class="tab-body">
                        <div class="notification-item row">
                            <div class="left-content col-md-1">
                                <img src="" alt="">
                            </div>

                            <div class="right-content col-md-10">
                                <h2>Heading</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio explicabo, modi quae officiis quis at aliquid iste.</p>
                            </div>

                            <div class="delete-btn col-md-1">
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Favorites Tab pane -->
                <div class="tab-pane fade" id="profile0" role="tabpanel" aria-labelledby="profile-tab0">
                    <!-- Tab view page body -->
                    <div class="tab-header">
                        <h1>Favorites</h1>
                    </div>

                    <!-- Tab view page body -->
                    <div class="tab-body">
                        <div class="notification-item row">
                            <div class="left-content col-md-1">
                                <img src="" alt="">
                            </div>

                            <div class="right-content col-md-10">
                                <h2>Heading</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio explicabo, modi quae officiis quis at aliquid iste.</p>
                            </div>

                            <div class="delete-btn col-md-1">
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="contact0" role="tabpanel" aria-labelledby="contact-tab0">
                    <div class="tab-header">
                        <h1>Search</h1>
                    </div>
                    <!-- Tab view page body -->
                    <div class="tab-body">
                        <div class="notification-item row">
                            <div class="left-content col-md-1">
                                <img src="" alt="">
                            </div>

                            <div class="right-content col-md-10">
                                <h2>Heading</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio explicabo, modi quae officiis quis at aliquid iste.</p>
                            </div>

                            <div class="delete-btn col-md-1">
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                                <i class="fas fa-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- end of container -->
</div>
<!-- end of page container -->

<?php

include 'includes/footer.php';

?>