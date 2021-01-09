@extends('client.layouts.master')
@section('content')
<?php
    $username = $customer->username;
    $email = $customer->email;
    $name = $customer->name;
    $mobile = $customer->mobile;
    $photo = $customer->photo;
    $address = $customer->address;
?>

<section id="login_section" class="section-features text-xs-center" style="padding-top:120px">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="background:transparent">
                    <h3 class="display-3 text-uppercase" style="font-weight:bold;text-align:left;font-size:2em">PROFILE
                        USER
                    </h3>
                    <form id="profile-form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-icon-left form-control-name">
                                    <label class="sr-only" for="username">Username</label>
                                    <input type="text" class="form-control form-control-lg" id="username"
                                        name="username" placeholder="Username" value="{{ $username }}">
                                    <span class="field_error" id="username_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="padding-right:5px">
                                <div class="form-group has-icon-left form-control-email">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                                        placeholder="Your Email Address" value="{{ $email }}">
                                    <span class="field_error" id="email_error" style="margin-left:1px"></span>
                                </div>
                            </div>
                        </div>
                        <hr style="margin-top:0px">
                        <style>
                            .text-form {
                                display: flex;
                            }

                        </style>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5 class="text-form" for="full_name">Full Name</h5>
                                    <input type="text" class="form-control form-control-lg" id="full_name"
                                        name="full_name" placeholder="Enter your Full Name" value="{{ $name }}">
                                    <span class="field_error" id="full_name_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                        $date='';
                            $dob = '';
                        ?>
                            <div class="col-md-5" style="padding-right:5px">
                                <div class="form-group">
                                    <h5 class="text-form" for="date_of_birth">Date of Birth</h5>
                                    <input type="date" class="form-control form-control-lg" id="date_of_birth"
                                        name="date_of_birth" placeholder="Date of Birth" value="<?=$dob?>">
                                    <span class="field_error" id="date_of_birth_error"></span>
                                </div>
                            </div>
                            <style>
                                input[type="date"].form-control {
                                    line-height: 30px;
                                }

                            </style>
                            <div class="col-md-4" style="padding-left:5px;padding-right:5px">
                                <div class="form-group">

                                    <h5 class="text-form" for="email">Photo Profile</h5>

                                    <input type="file" class="form-control form-control-lg" id="photo_profile"
                                        onclick="attach_photo('')" name="photo_profile" placeholder="Photo Profile">
                                    <span class="field_error" id="photo_profile_error"></span>
                                </div>
                            </div>
                            <div class="col-md-2" style="padding-left:5px">
                                <div class="form-group">
                                    <output style="display:flex" class="mx-2" id="result" />
                                    <?php
                                    // if($row['PHOTO'] != ''){
                                    //     // $src = CUSTOMER_SITE_PATH.$row['PHOTO'];
                                    //     $src = '';
                                    // }else{
                                    // }
                                    $src = "../assets/client/image/man.png";
                                    ?>
                                    <img id="image_old" class="" src="<?=$src?>"
                                        style="width:100px;height:100px;border: 1px solid #e0e0e5;border-radius:10px"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="address" name="address"
                                        placeholder="Address" value="{{ $address }}">
                                    <span class="field_error" id="address_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select type="text" class="form-control form-control-lg" id="province"
                                        name="province" placeholder="Province">
                                        <option value="">Select Province</option>
                                    </select>
                                    <span class="field_error" id="province_error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select type="text" class="form-control form-control-lg" id="city" name="city"
                                        placeholder="City">
                                        <option value="">Select City</option>
                                    </select>
                                    <span class="field_error" id="city_error"></span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary-outline btn-block" id="update_profile_btn"
                                    value="Update Profile" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="background:transparent">
                    <h3 class="display-3 text-uppercase" style="font-weight:bold;text-align:left;font-size:2em">CHANGED
                        PASSWORD
                    </h3>
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-icon-left form-control-name">
                                    <input type="password" class="form-control form-control-lg" id="cpassword"
                                        name="cpassword" placeholder="Your Current Passoword">
                                    <span class="field_error" id="cpassword_error" style=""></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-icon-left form-control-password">
                                    <input type="password" class="form-control form-control-lg" id="npassword"
                                        name="npassword" placeholder="Enter New Password">
                                    <span class="field_error" id="npassword_error" style="margin-left:-340px"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-icon-left form-control-password">
                                    <input type="password" class="form-control form-control-lg" id="cfpassword"
                                        name="cfpassword" placeholder="Confirmation New Password">
                                    <span class="field_error" id="cfpassword_error" style="margin-left:-290px"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="display:flex">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to change my password into new password.
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" onclick="changePassword()" class="btn btn-primary-outline">Change
                                    Password</button>
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
    function changePassword() {
        $('.field_error').html('')
        var password = $("#cpassword").val()
        var npassword = $("#npassword").val()
        var cfpassword = $("#cfpassword").val()
        var is_error = '';

        if (password == '') {
            $("#cpassword_error").html('Please Enter Password')
            is_error = 'yes'
        }
        if (npassword == "") {
            $("#npassword_error").html('Please Enter New Password')
            is_error = 'yes'
        }
        if (cfpassword == "") {
            $("#cfpassword_error").html('Please Enter Confirm New Password')
            is_error = 'yes'
        }

        if (password == '' || npassword == '' || cfpassword == '') {
            alert('Silahkan Lengkapi Form')
        } else if( npassword !== cfpassword){
            alert('Konfirmasi Password Tidak Sesuai')

        }else{
            $.ajax({
                url: '/client/auth/updateProfile',
                type: 'post',
                data: {
                    password,
                    npassword
                },
                success: function (result) {
                    if (result == 'wrong') {             
                        $("#cpassword_error").html('Incorrect Password Customer')
                         is_error = 'yes'          
                    }else{
                        alert('Sucess Change Password')
                        window.location.reload();
                    }
                    
                }
            })
        }
    }

</script>
@endpush
