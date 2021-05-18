<?php

/** 
 * User: Jester Robin <>
 *       Zaira Mundo <zairajune@gmail.com> 
 * Date: 4/23/2021
 * Time: 11:36 PM
 */

/** @var $this \app\core\form\Form */
use app\core\form\Form;

/** 
 * @var $model User 
 * @var $model SigninForm
 */

/** @var $this \app\core\View */
$this->title = 'Sign In | Lenderoo';

$form = new Form();

if (isset($_POST['signupForm'])) {
    echo "
    <script>
        $(document).ready(function () {
            $('#slideBox').css({
                'marginLeft': '0'
            });
            $('.topLayer').css({
                'marginLeft': '100%'
            });
            document.title = 'Sign Up | Lenderoo'; 
        });
    </script>";
}

?>

<div id="back">
    <div class="backRight">
        <div class="content">Hello</div>
    </div>
    <div class="backLeft">
        <div class="content">Hello</div>
    </div>
</div>

<div id="slideBox">
    <div class="topLayer">
        <!-- SIGN UP FORM -->
        <div class="left">
            <div class="content">
                <h2>Sign Up</h2>

                <?php Form::begin('', 'post'); ?>
                    <div class="row mb-4">
                        <div class="col">
                            <?php echo $form->field($model, 'firstName') ?>
                        </div>
                        <div class="col">
                            <?php echo $form->field($model, 'lastName') ?>
                        </div>
                    </div>
                    <?php echo $form->field($model, 'email') ?>
                    <?php echo $form->field($model, 'contact'); ?>
                    <div class="row mb-4">
                        <div class="col">
                            <?php echo $form->field($model, 'password')->passwordField(); ?>
                        </div>
                        <div class="col">
                            <?php echo $form->field($model, 'confirmPassword')->passwordField(); ?>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <input type="submit" class="btn btn-primary btn-block" name="signupForm" value="Sign Up">

                    <!-- Register buttons -->
                    <div class="text-center">
                        <!-- <p>Already a member? <a href="/signin">Sign In</a></p> -->
                        <!-- <p>or sign up with:</p>
                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-facebook-f"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-google"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-twitter"></i>
                        </button>

                        <button type="button" class="btn btn-primary btn-floating mx-1">
                            <i class="fab fa-github"></i>
                        </button> -->
                    </div>

                <?php Form::end(); ?>

                <div class="btn-group btn-div">
                    <button class="btn btn-primary active">Sign Up</button>
                    <button id="goLeft" class="btn btn-primary off">Sign In</button>
                </div>

            </div>
        </div>
        <!-- END OF SIGN UP FORM -->

        <!-- SIGN IN FORM -->
        <div class="right">
            <div class="content">
                <h2>Sign In</h2>

                <?php Form::begin('', 'post'); ?>
                    <?php echo $form->field($model, 'email') ?>
                    <?php echo $form->field($model, 'password')->passwordField(); ?>

                    <!-- Submit button -->
                    <input type="submit" class="btn btn-primary btn-block" name="signinForm" value="Sign In">

                    <!-- Register buttons -->
                    <div class="text-center">
                        <!-- <p>Not a member? <a href="/signup">Register</a></p> -->
                        <!-- <p>or sign up with:</p>
                    <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-facebook-f"></i>
                    </button>

                    <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-google"></i>
                    </button>

                    <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-twitter"></i>
                    </button>

                    <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="fab fa-github"></i>
                    </button> -->
                    </div>

                <?php Form::end(); ?>

                <div class="btn-group btn-div">
                    <button id="goRight" class="btn btn-primary off">Sign Up</button>
                    <button class="btn btn-primary active">Sign In</button>
                </div>
            </div>
        </div>
        <!-- END OF SIGN IN FORM -->
    </div>
</div>