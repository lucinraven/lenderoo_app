<?php

include '../includes/header.php';

// checks if user is not logged in to access the page
if (!isset($_SESSION['email'])) {
    header("Location: ../pages/authentication.php");
    $user_id - $_SESSION['user_id'];
}

$lender_id = 1;

$message_query = $con->prepare("SELECT * FROM message WHERE user_id=?");
$message_query->bind_param("i", $user_id);
$message_query->execute();

$result = $message_query->get_result();

?>

<!-- Inbox messenger page -->
<div class="inbox-messenger-page">
    <div class="container-lg">
        <div class="row">

            <!-- Inbox messenger left content -->
            <div class="col-md-3">
                <!-- Chat header -->
                <div class="left-header">
                    <h1>Messages</h1>
                </div>

                <!-- Chat list body -->
                <div class="left-body">
                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="col-md-3 mb-4 ">

                            <ul class="nav md-pills pills-secondary d-flex flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#panel11" role="tab">Link 1</a>
                                </li>

                                <?php

                                while ($row = $result->fetch_assoc()) {

                                    $lender_id = $row['lender_id'];

                                    $lender_query = $con->prepare("SELECT * FROM users WHERE user_id=?");
                                    $lender_query->bind_param("i", $lender_id);
                                    $lender_query->execute();

                                    $lender_result = $lender_query->get_result();
                                    $lender_row = $lender_result->fetch_assoc();

                                    echo '
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#panel12" role="tab">
                                        <div class="chat-list-profile col-md-4">
                                            <img src="" alt="">
                                        </div>
                                        <div class="ui-id col-md-8">
                                            <h1>' . $lender_row['firstName'] . ' ' . $lender_row['lastName'] . '</h1>
                                            <p>' . $row['body'] . '</p>
                                        </div>
                                        </a>
                                    </li>
                                    ';
                                }

                                ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Inbox messenger right content -->
            <div class="col-md-9">

                <!-- Chat message conversation information -->
                <div class="right-header">
                    <div class="profile-icon">
                        <img src="" alt="">
                    </div>

                    <div class="user-info">
                        <h1>Leaser Name</h1>
                    </div>
                </div>

                <!-- Chat message conversation body -->
                <div class="right-body">
                    <div class="conversation-body">


                    </div>

                    <div class="conversation-message-input">
                        <form action="">
                            <input type="text" value="" placeholder="">

                            <button class="send-btn"><i class="fas fa-paper-plane"></i></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';


?>