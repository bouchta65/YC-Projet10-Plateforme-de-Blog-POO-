<?php 
session_start();
include '../db/config.php'; 
include '../classes/Member.php';
$user = new User($conn,0,"","",0,"","","");

if(isset($_POST['loginbutton'])){
  $email = $_POST['emaillogin'];
  $pass = $_POST['passwordlogin'];
  $user->login($email,$pass);
  }

  
if(isset($_POST['registrebutton'])){
  $name = $_POST['nameregistre'];
  $dateofbirth = $_POST['dateofbirth'];
  $currentDate = time();
  $age = ($currentDate - strtotime($dateofbirth)) / (60 * 60 * 24 * 365.25);
  $email = $_POST['emailregister'];
  $pass = $_POST['passwordregister'];
  $member = new Member($conn,$name,$email,$age,$pass,"user");
  $member->registre();
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bruxy Blog</title>
  <link rel="icon" href="../../public/assets/images/Neon Green and Black Graffiti Urban Grunge Logo.png" type="image/png">
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-500">
<div class="absolute top-0 left-0 w-full h-full z-0">
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-blue-600 via-purple-600 to-transparent opacity-50"></div>
    <div class="absolute top-[10%] left-[20%] w-32 h-32 bg-white opacity-20 rounded-full"></div>
    <div class="absolute top-[30%] left-[50%] w-24 h-24 bg-white opacity-30 rounded-full"></div>
    <div class="absolute top-[50%] left-[70%] w-36 h-36 bg-white opacity-15 rounded-full"></div>
    <div class="absolute top-[70%] left-[10%] w-20 h-20 bg-white opacity-25 rounded-full"></div>
    <div class="absolute top-[60%] left-[80%] w-28 h-28 bg-white opacity-10 rounded-full"></div>
    <div class="absolute top-[15%] left-[60%] w-40 h-40 bg-white opacity-20 rounded-full"></div>
  </div>
<section id="login" >
<div class="font-[sans-serif] relative">
      <div class="h-[240px] font-[sans-serif]">
      </div>

      <div class="relative -mt-40 m-4">
        <form class="bg-white max-w-xl w-full mx-auto shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-8 rounded-2xl" action="#" method="POST">
          <div class="mb-12">
            <h3 class="text-gray-800 text-3xl font-bold text-center">Login</h3>
          </div>
            
          <div class="mt-8">
            <label class="text-gray-800 text-xs block mb-2">Email</label>
            <div class="relative flex items-center">
              <input name="emaillogin" type="text"  class="w-full bg-transparent text-sm text-gray-800 border-b border-gray-300 focus:border-blue-500 px-2 py-3 outline-none" placeholder="Enter email" />
              <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-2" viewBox="0 0 682.667 682.667">
                <defs>
                  <clipPath id="a" clipPathUnits="userSpaceOnUse">
                    <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                  </clipPath>
                </defs>
                <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                  <path fill="none" stroke-miterlimit="10" stroke-width="40" d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z" data-original="#000000"></path>
                  <path d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z" data-original="#000000"></path>
                </g>
              </svg>
            </div>
          </div>

          <div class="mt-8">
            <label class="text-gray-800 text-xs block mb-2">Password</label>
            <div class="relative flex items-center">
              <input name="passwordlogin" type="password"  class="w-full bg-transparent text-sm text-gray-800 border-b border-gray-300 focus:border-blue-500 px-2 py-3 outline-none" placeholder="Enter password" />
              <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-2 cursor-pointer" viewBox="0 0 128 128">
                <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
              </svg>
            </div>
          </div>

          <div class="mt-8">
            <button type="submit" name="loginbutton"  class="w-full shadow-xl py-2.5 px-5 text-sm font-semibold tracking-wider rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition-all">
              Login
            </button>
            <p  class="text-gray-800 text-sm mt-8 text-center">You don't have an account? <a href="" id="logintoregistre" class="text-blue-500 font-semibold hover:underline ml-1">Register now</a></p>
          </div>
        </form>
      </div>
    </div>
</section>

<section id="registre" class="hidden">
<div class="font-[sans-serif] relative">
      <div class="h-[240px] font-[sans-serif]">
      </div>

      <div class="relative -mt-40 m-4">
        <form class="bg-white max-w-xl w-full mx-auto shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] p-8 rounded-2xl" action="#" method="POST">
          <div class="mb-12">
            <h3 class="text-gray-800 text-3xl font-bold text-center">Register</h3>
          </div>

          <div>
            <label class="text-gray-800 text-xs block mb-2">Full Name</label>
            <div class="relative flex items-center">
              <input name="nameregistre" type="text" required class="w-full bg-transparent text-sm text-gray-800 border-b border-gray-300 focus:border-blue-500 px-2 py-3 outline-none" placeholder="Enter name" />
              <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-2" viewBox="0 0 24 24">
                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
              </svg>
            </div>
          </div>
          <div>
            <label class="text-gray-800 text-xs block mb-2">Date of Birth</label>
            <div class="relative flex items-center">
              <input name="dateofbirth" type="date" required class="w-full bg-transparent text-sm text-gray-800 border-b border-gray-300 focus:border-blue-500 px-2 py-3 outline-none" placeholder="Enter name" />
            </div>
          </div>

          <div class="mt-8">
            <label class="text-gray-800 text-xs block mb-2">Email</label>
            <div class="relative flex items-center">
              <input name="emailregister" type="text" required class="w-full bg-transparent text-sm text-gray-800 border-b border-gray-300 focus:border-blue-500 px-2 py-3 outline-none" placeholder="Enter email" />
              <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-2" viewBox="0 0 682.667 682.667">
                <defs>
                  <clipPath id="a" clipPathUnits="userSpaceOnUse">
                    <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                  </clipPath>
                </defs>
                <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                  <path fill="none" stroke-miterlimit="10" stroke-width="40" d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z" data-original="#000000"></path>
                  <path d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z" data-original="#000000"></path>
                </g>
              </svg>
            </div>
          </div>

          <div class="mt-8">
            <label class="text-gray-800 text-xs block mb-2">Password</label>
            <div class="relative flex items-center">
              <input name="passwordregister" type="password" required class="w-full bg-transparent text-sm text-gray-800 border-b border-gray-300 focus:border-blue-500 px-2 py-3 outline-none" placeholder="Enter password" />
              <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-2 cursor-pointer" viewBox="0 0 128 128">
                <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
              </svg>
            </div>
          </div>

          <div class="mt-8">
            <button type="submit" name="registrebutton" class="w-full shadow-xl py-2.5 px-5 text-sm font-semibold tracking-wider rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition-all">
              Register
            </button>
            <p  class="text-gray-800 text-sm mt-8 text-center">Already have an account? <a href="" id="registretologin" class="text-blue-500 font-semibold hover:underline ml-1">Login here</a></p>
          </div>
        </form>
      </div>
    </div>
</section>



<script src="../..//public/assets/js/index.js"></script>

</body>
</html>