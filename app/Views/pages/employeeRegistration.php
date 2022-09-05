<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .text-danger{
           color:red;
        }
        input:focus~label,
        input:valid~label {
            position: absolute;
            top: -19px;
            color: green;
            font-size: 13px;
            font-weight: 600
        }

        input:focus {
            border: 1px solid green
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0
        }

        .warning {
            border: 1px solid red !important
        }

        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
        }

        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none
            }

            50% {
                transform: scale3d(1.1, 1.1, 1)
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142
            }
        }
    </style>
</head>

<body>
    <div class="py-10 min-h-screen bg-gray-300 px-2">
    <?php
                if(!empty(session()->getFlashdata('fail'))){ ?>
                   <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
               <?php }
                if(!empty(session()->getFlashdata('success'))){ ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php }
                 ?>
        <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg overflow-hidden md:max-w-lg">
            <!--<div class="md:flex">-->
               
            <div class="w-full">
                <form method="post" action="<?php echo base_url('employee') ?>">
                <p class="flex justify-center items-center h-16 w-full bg-pink-900 text-white">Create campaign</p>
                <div class="main block">
                    <div class="mt-7 px-4 relative"> <input
                            class="h-12 transition-all px-1 outline-none w-full border rounded-lg user_name" type="text"
                            name="fname" value="<?php echo set_value('fname'); ?>">
                            <span class="text-danger"><?= isset($validText) ? display_error($validText,'fname') : '' ?></span>
                             <label class="text-pink-600 absolute transition-all top-4 pointer-events-none text-sm left-5">First
                            Name</label> </div>
                    <div class="mt-6 px-4 relative"> <input
                            class="h-12 transition-all px-1 outline-none w-full border rounded-lg" type="text" name="lname" value="<?php echo set_value('lname'); ?>">
                            <span class="text-danger"><?= isset($validText) ? display_error($validText,'lname') : '' ?></span>
                        <label class="text-pink-600 absolute transition-all top-4 pointer-events-none text-sm left-5">Last
                            Name</label> </div>
                    <div class="mt-6 px-4 relative"> <input
                            class="h-12 transition-all px-1 outline-none w-full border rounded-lg" type="number" name="phone" value="<?php echo set_value('phone'); ?>" autocomplete="off">
                            <span class="text-danger"><?= isset($validText) ? display_error($validText,'phone') : '' ?></span>
                            <label class="text-pink-600 absolute transition-all top-4 pointer-events-none text-sm left-5">Phone
                            Number</label> </div>
                    <div class="flex w-full gap-px">
                        <div class="w-full mt-6 px-4 relative"> <input
                                class="h-12 transition-all px-1 outline-none w-full border rounded-lg" type="text" name="email" value="<?php echo set_value('email'); ?>">
                                <span class="text-danger"><?= isset($validText) ? display_error($validText,'email') : '' ?></span>
                                 <label class="text-pink-600 absolute transition-all top-4 pointer-events-none text-sm left-5">E-mail</label>
                        </div>
                        <div class="w-full mt-6 px-4 relative"> <input
                                class="h-12 transition-all px-1 outline-none pr-8 w-full border rounded-lg pass"
                                type="password" name="password" value="<?php echo set_value('password'); ?>"> 
                                <span class="text-danger"><?= isset($validText) ? display_error($validText,'password') : '' ?></span>
                                <label class="text-pink-600 absolute transition-all top-4 pointer-events-none text-sm left-5">Password</label>
                            <i class="text-pink-600 fa fa-eye-slash absolute top-4 cursor-pointer right-6"></i> </div>
                    </div>
                    <div class="flex w-full gap-px">
                        <div class="w-full mt-6 px-4 relative"> <input
                                class="h-12 transition-all px-1 outline-none pr-8 w-full border rounded-lg pass"
                                type="password" name="cpassword" value="<?php echo set_value('cpassword'); ?>">
                                <span class="text-danger"><?= isset($validText) ? display_error($validText,'cpassword') : '' ?></span>
                                 <label class="text-pink-600 absolute transition-all top-4 pointer-events-none text-sm left-5">Confirm Password</label>
                            </div>
                    </div>
                    <div class="mt-6 flex justify-center px-4 relative"> <button
                            class="create_acc text-md h-12 w-full bg-green-400 rounded-full text-white hover:bg-green-600 transition-all" type="submit">Create
                            Account</button> </div>
                    <p class="my-10 text-center text-sm px-4 text-gray-500">Have already an account? <a class="text-blue-800" href="<?php echo base_url('/') ?>">Login Here</a></p>
                </div>
                
    </form> 
            </div>
            <!--</div>-->
        </div>
    </div>
    <script>
        let formnumber = 0;
        function validateform() {
            var validate = true;
            var inputs = document.querySelectorAll(".main.block input");
            inputs.forEach(function (e) {
                e.classList.remove('warning');
                if (e.hasAttribute('require')) {
                    if (e.value.length == "0") {
                        validate = false;
                        e.classList.add('warning')
                    }
                }

            });
            return validate;
        }

        var eye = document.querySelector(".fa-eye-slash");
        var pass = document.querySelector(".pass");
        var seteye = document.querySelector(".fa-eye-slash");

        eye.onclick = function () {
            alert("sdff");
            if (pass.type == "password") {
                pass.type = "text";
                seteye.classList.remove('fa-eye-slash');
                seteye.classList.add('fa-eye');
            } else {
                pass.type = "password";
                seteye.classList.add('fa-eye-slash');
                seteye.classList.remove('fa-eye');
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>