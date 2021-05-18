<?php

/** 
 * User: Jester Robin <>
 *       Zaira Mundo <zairajune@gmail.com> 
 * Date: 4/23/2021
 * Time: 11:36 PM
 */

include 'includes/header.php';
?>

<div class="authentication-page">
    <div id="back">
        <div class="backRight"></div>
        <div class="backLeft"></div>
    </div>

    <div id="slideBox">
        <div class="topLayer">
            <!-- SIGN UP FORM -->
            <div class="left">
                <div class="content">
                    <h2>Sign Up</h2>

                    <form method="post">
                        <div class="form-group">
                            <input type="text" placeholder="Email or Phone" />
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Confirm Password" />
                        </div>
                    </form>

                    <button id="goLeft" class="off">Login</button>
                    <button>Sign up</button>
                </div>
            </div>
            <!-- END OF SIGN UP FORM -->

            <!-- SIGN IN FORM -->
            <div class="right">
                <div class="content">
                    <h2>Login</h2>

                    <form method="post">
                        <div class="form-group">
                            <label for="username" class="form-label" placeholder="Email or Phone"></label>
                            <input type="text" />
                        </div>

                        <div class="form-group">
                            <label for="username" class="form-label" placeholder="Password"></label>
                            <input type="text" />
                        </div>


                    </form>
                    <button id="goRight" class="off">Sign Up</button>
                    <button id="login" type="submit">Login</button>

                </div>
            </div>
            <!-- END OF SIGN IN FORM -->
        </div>
    </div>
</div>

</body>

<script type="text/javascript" src="../../js/entry.js"></script>
<script type="module" src="../../js/main.js"></script>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

</html>