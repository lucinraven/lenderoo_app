<?php

use app\core\form\Form;

/** 
 * User: Jester Robin Domingo<>
 *       Zaira Mundo <zairajune@gmail.com> 
 * Date: 4/23/2021
 * Time: 11:36 PM
 */

/** @var $model SigninForm */

/** @var $this \app\core\View */
$this->title = 'Sign In | Lenderoo';

$form = new Form();

?>

<div id="slideBox">
    <div class="topLayer">
        <!-- SIGN IN FORM -->
        <div class="right">
            <div class="content">
                <h2>Sign In</h2>

                <?php $form = Form::begin('', "post"); ?>
                <?php echo $form->field($model, 'email') ?>
                <?php echo $form->field($model, 'password')->passwordField(); ?>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

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

                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(41,41,41);">
                    © 2021 Copyright:
                    <a class="text-white" href="/">Lenderoo.com</a>
                </div>
                <!-- Copyright -->

            </div>
        </div>
        <!-- END OF SIGN IN FORM -->
    </div>
</div>