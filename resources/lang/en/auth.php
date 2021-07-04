<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'password' => 'The provided password is incorrect.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    // Halaman Login
    'login' => [
        'meta-title' => 'Authentication',
        'title_1' => 'Laravel',
        'title_2' => 'Admin Panel',
        'subtitle' => 'Sign in to start your session',
        'email' => 'Email...',
        'password' => 'Password...',
        'remember_me' => 'Remember Me',
        'sign_in' => 'Sign In',
        'or' => '- Or - ',
        'sign_in_facebook' => 'Sign in with Facebook',
        'sign_in_google' => 'Sign in with Google',
        'forgot_password' => 'Forgot Password',
        'register' => 'Register New Membership',
    ],

    // Halaman Register
    'register' => [
        'meta-title' => 'Authentication',
        'title_1' => 'Laravel',
        'title_2' => 'Admin Panel',
        'subtitle' => 'Register a new membership',
        'full_name' => 'Full name...',
        'email' => 'Email...',
        'phone' => 'Phone... (+44 example)',
        'password' => 'Password...',
        'confirm_password' => 'Password...',
        'agree' => 'I agree to the',
        'terms' => 'terms',
        'sign_up' => 'Sign Up',
        'or' => '- Or - ',
        'sign_up_facebook' => 'Sign in with Facebook',
        'sign_up_google' => 'Sign in with Google',
        'membership' => 'I already have a membership',
    ],

    'verify' => [
        'title_1' => 'Laravel',
        'title_2' => 'Admin Panel',
        'resend' => 'A fresh verification link has been sent to your email address.',
        'message' => 'We already send verification to your email.',
        're-resend' => 'click here to request another.',
        'login' => 'Back to login page.',
        'back_to_home' => 'Back to home page.',
    ],

    'forgot' => [
        'title_1' => 'Laravel',
        'title_2' => 'Admin Panel',
        'message' => 'You forgot your password? Here you can easily retrieve a new password.',
        'request' => 'Request new password',
        'login' => 'Back to login page.',
    ],

    'reset' => [
        'title_1' => 'Laravel',
        'title_2' => 'Admin Panel',
        'message' => 'You are only one step a way from your new password, recover your password now.',
        'email' => 'Email...',
        'password' => 'Password...',
        'confirm_password' => 'Confirm Password...',
        'request' => 'Change Password',
        'login' => 'Back to login page.',
    ],

];
