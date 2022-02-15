<?php

/**
 * Errors
 */
if ($_SESSION['update_error_message'] != null): echo "<div style='width: 95%; color: red; padding: 10px; background-color: rgba(255,0,0, 0.05); border: 1px red outset; margin-bottom: 15px'>"
    . $_SESSION['update_error_message'] ."</div>";  endif;

if ($_SESSION['error_message'] != null): echo "<div style='width: 95%; color: red; padding: 10px; background-color: rgba(255,0,0, 0.05); border: 1px red outset; margin-bottom: 15px'>"
    . $_SESSION['error_message'] ."</div>";  endif;


/**
 * Infos
 */
if ($_SESSION['update_success_message'] != null): echo "<div style='width: 95%; color: green; padding: 10px; background-color: rgba(0,255,0, 0.05); border: 1px green outset; margin-bottom: 15px'>"
    . $_SESSION['update_success_message'] ."</div>";  endif;

if ($_SESSION['create_success_message'] != null): echo "<div style='width: 95%; color: green; padding: 10px; background-color: rgba(0,255,0, 0.05); border: 1px green outset; margin-bottom: 15px'>"
    . $_SESSION['create_success_message'] ."</div>";  endif;

if ($_SESSION['welcome_message'] != null): echo "<div style='width: 95%; color: green; padding: 10px; background-color: rgba(0,255,0, 0.05); border: 1px green outset; margin-bottom: 15px'>"
    . $_SESSION['welcome_message'] ."</div>";  endif;

if ($_SESSION['info_message'] != null): echo "<div style='width: 95%; color: green; padding: 10px; background-color: rgba(0,255,0, 0.05); border: 1px green outset; margin-bottom: 15px'>"
    . $_SESSION['info_message'] ."</div>";  endif;


/**
 * CLean all messages
 */
include "../../chaussure/config/reset_messages.php";