<?php 

/** 
 * User: Zaira Mundo <zairajune@gmail.com> 
 * Date: 4/23/2021
 * Time: 11:36 PM
*/

/** @var $exception \Exception*/

 /** @var $this \app\core\View */
 $this->title = ''.$exception->getCode().'| Lenderoo';
?>

<h3><?php echo $exception->getCode() ?> - <?php echo $exception->getMessage() ?></h3>