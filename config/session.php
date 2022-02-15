<?php

session_start();

 if (!isset($_SESSION['connected'])) $_SESSION['connected'] = false;

 if (!isset($_SESSION['user_role'])) $_SESSION['user_role'] = null;

 if (!isset($_SESSION['login_info'])) $_SESSION['login_info'] = null;

 if (!isset($_SESSION['user_id'])) $_SESSION['user_id'] = null;

 if (!isset($_SESSION['user_pseudo'])) $_SESSION['user_pseudo'] = null;

/**
 * Redirection link
 */
 if (!isset($_SESSION['redirect_to_onError'])) $_SESSION['redirect_to_onError'] = null;

 if (!isset($_SESSION['redirect_to_signup'])) $_SESSION['redirect_to_signup'] = null;

 if (!isset($_SESSION['redirect_after_login'])) $_SESSION['redirect_after_login'] = null;

 if (!isset($_SESSION['redirect_if_update_error'])) $_SESSION['redirect_if_update_error'] = null;

 if (!isset($_SESSION['redirect_to_after_request'])) $_SESSION['redirect_to_after_request'] = null;


/**
 * Error variable
 */

if (!isset($_SESSION['login_error'])) $_SESSION['login_error'] = null;

if (!isset($_SESSION['login_success'])) $_SESSION['login_success'] = null;

 if (!isset($_SESSION['signup_error'])) $_SESSION['signup_error'] = null;

 if (!isset($_SESSION['signup_pseudo_error'])) $_SESSION['signup_pseudo_error'] = null;

 if (!isset($_SESSION['signup_email_error'])) $_SESSION['signup_email_error'] = null;

 if (!isset($_SESSION['file_upload_error_1'])) $_SESSION['file_upload_error_1'] = null;

 if (!isset($_SESSION['file_upload_error_2'])) $_SESSION['file_upload_error_2'] = null;

 if (!isset($_SESSION['update_success_message'])) $_SESSION['update_success_message'] = null;

 if (!isset($_SESSION['update_error_message'])) $_SESSION['update_error_message'] = null;

 if (!isset($_SESSION['create_success_message'])) $_SESSION['create_success_message'] = null;

 if (!isset($_SESSION['welcome_message'])) $_SESSION['welcome_message'] = null;

 if (!isset($_SESSION['info_message'])) $_SESSION['info_message'] = null;

 if (!isset($_SESSION['error_message'])) $_SESSION['error_message'] = null;

