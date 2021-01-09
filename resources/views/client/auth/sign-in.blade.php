@extends('client.layouts.master')
@section('content')


<?php
session_start(); 

?>
<section id="login_section" class="section-features text-xs-center" style="padding-top:120px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="background: transparent">
                    <h3 class="display-3 text-uppercase" style="font-weight:bold;text-align:left;font-size:2em">Login
                    </h3>
                    <form id="login-form" method="post">
                        <div class="form-group has-icon-left form-control-name">
                            <label class="sr-only" for="login_username">Username</label>
                            <input type="text" class="form-control form-control-lg" id="login_username"
                                name="login_username" placeholder="Username">
                            <span class="field_error" id="login_username_error"></span>
                        </div>
                        <div class="form-group has-icon-left form-control-password">
                            <label class="sr-only" for="login_password">Enter a password</label>
                            <input type="password" class="form-control form-control-lg" id="login_password"
                                name="login_password" placeholder="Enter a password" autocomplete="on">
                            <span class="field_error" id="login_password_error"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" onclick="user_login()"
                                    class="btn btn-primary-outline btn-block">Sign In</button>
                            </div>
                            <div class="col-md-6 " style="text-align:left;padding-top:10px">

                                <a href="" class="pull-left" style="text-align:left">Forget Password</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="background: transparent">
                    <h3 class="display-3 text-uppercase" style="font-weight:bold;text-align:left;font-size:2em">Register
                    </h3>
                    <form action="">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group has-icon-left form-control-email">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                                        placeholder="Your Email Address">
                                    <span class="field_error" id="email_error" style="margin-left:-265px"></span>
                                </div>

                            </div>
                            <div class="col-md-2">
                                {{-- <button type="submit" class="btn btn-primary-outline btn-block">OTP</button> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-icon-left form-control-name">
                                    <label class="sr-only" for="username">Username</label>
                                    <input type="text" class="form-control form-control-lg" id="username"
                                        name="username" placeholder="Your Username">
                                    <span class="field_error" id="username_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-icon-left form-control-password">
                                    <label class="sr-only" for="password">Enter a password</label>
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        name="password" placeholder="Enter a password" autocomplete="on">
                                    <span class="field_error" id="password_error" style="margin-left:-100px"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-icon-left form-control-password">
                                    <label class="sr-only" for="cpassword">Confirmation a password</label>
                                    <input type="password" class="form-control form-control-lg" id="cpassword"
                                        name="cpassword" placeholder="Confirmation password" autocomplete="on">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" onclick="user_register()" id="register-btn"
                                    class="btn btn-primary-outline btn-block">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection




@push('page-scripts')
<script>
    function user_register() {
        $('.field_error').html('')
        var username = $("#username").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        var is_error = '';
        if (username == '') {
            $("#username_error").html('Please Enter Username')
            is_error = 'yes'
        }
        if (email == "") {
            $("#email_error").html('Please Enter Email Address')
            is_error = 'yes'
        }
        if (password == "") {
            $("#password_error").html('Please Enter password')
            is_error = 'yes'
        }
        if (password != cpassword) {
            $("#password_error").html('Confirmation Password Wrong')
            is_error = 'yes'
        }

        if (is_error == '') {
            $("#login_section").LoadingOverlay("show", {
                background: "transparent"
            });
            $.ajax({
                url: '/client/auth/register',
                type: 'post',
                data: {
                    username,
                    email,
                    password
                },
                success: function (result) {
                    console.log(result)
                    $("#login_section").LoadingOverlay("hide", true);

                    if (result == 'email_present') {
                        $("#email_error").html('Email Already Taken')
                        $("#login_section").LoadingOverlay("hide", true);
                    }
                    if (result == 'username_present') {
                        $("#username_error").html('Username Already Taken')
                        $("#login_section").LoadingOverlay("hide", true);
                    }
                    if (result == 'insert') {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Registered Successfully. Please Login to Proceed',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $("#email").attr('disabled', 'disabled')
                        $("#username").attr('disabled', 'disabled')
                        $("#password").attr('disabled', 'disabled')
                        $("#cpassword").attr('disabled', 'disabled')
                        $("#register-btn").attr('disabled', 'disabled')

                        $("#login_section").LoadingOverlay("hide", true);

                    }
                },
                error: function (err) {
                    console.log(err)
                }
            })
        }
    }

    function user_login() {

        $('.field_error').html('')
        var username = $("#login_username").val();
        var password = $("#login_password").val();
        var is_error = '';
        if (username == "") {
            $("#login_username_error").html('Please Enter Username')
            is_error = 'yes'
        }
        if (password == "") {
            $("#login_password_error").html('Please Enter Password')
            is_error = 'yes'
        }

        if (is_error == '') {
            $("#login_section").LoadingOverlay("show", {
                    background: "transparent"
                });
            $.ajax({
                url: '/client/auth/login',
                type: 'post',
                data: {username , password},
                success: function (result) {
                    if (result == 'wrong') {
                        $("#login_section").LoadingOverlay("hide", true);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Plase enter your data correctly',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }
                    if (result == 'valid') {
                        window.location.href = 'vandhi';
                    }
                }
            })
        }
    }

</script>
@endpush
