<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.kutethemes.com/kuteshop/html/home1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 20:17:24 GMT -->

<head>
    <title>S-Mart - Multi-Purpose Ecommerce </title>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

    </style>

    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.css') }}">

    {{-- checkbox css  --}}

    
    <style>
        .custom-radio-button div {
display: inline-block;
}
.custom-radio-button input[type="radio"] {
display: none;
}
.custom-radio-button input[type="radio"] + label {
color: #333;
font-family: Arial, sans-serif;
font-size: 10px;
}
.custom-radio-button input[type="radio"] + label span {
display: inline-block;
width: 25px;
height: 25px;
margin: -1px 4px 0 0;
vertical-align: middle;
cursor: pointer;
border-radius: 50%;
border: 2px solid #ffffff;
box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
background-repeat: no-repeat;
background-position: center;
text-align: center;
line-height: 30px;
}
.custom-radio-button input[type="radio"] + label span img {
opacity: 0;
transition: all 0.3s ease;
}
/* .custom-radio-button input[type="radio"]#color-red + label span {
background-color: red;
}
.custom-radio-button input[type="radio"]#color-blue + label span {
background-color: blue;
}
.custom-radio-button input[type="radio"]#color-orange + label span {
background-color: orange;
}
.custom-radio-button input[type="radio"]#color-pink + label span {
background-color: pink;
} */
.custom-radio-button input[type="radio"]:checked + label span {
opacity: 1;
background: url("https://www.positronx.io/wp-content/uploads/2019/06/tick-icon-4657-01.png")
center center no-repeat;
width: 30px;
height: 30px;
display: inline-block;
}
    </style>


</head>
@yield('body_content')

<!-- Mirrored from html.kutethemes.com/kuteshop/html/home1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2023 20:17:27 GMT -->

</html>
