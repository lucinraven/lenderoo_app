<?php

include '../includes/header.php';

// checks if user is not logged in to access the page
if (!isset($_SESSION['email'])) {
    header("Location: ../pages/authentication.php");
} 
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
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
                        </div>
                    </div>

                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
                        </div>
                    </div>

                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
                        </div>
                    </div>

                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
                        </div>
                    </div>

                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
                        </div>
                    </div>

                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
                        </div>
                    </div>

                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
                        </div>
                    </div>

                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
                        </div>
                    </div>

                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
                        </div>
                    </div>

                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
                        </div>
                    </div>

                    <!-- Chat list items -->
                    <div class="chat-list-item row">
                        <div class="chat-list-profile col-md-4">
                            <img src="" alt="">
                        </div>
                        <div class="ui-id col-md-8">
                            <h1>Test</h1>
                            <p>Lorem Lorem Loream</p>
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
                        <p>Last Online 3 Minutes Ago</p>
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