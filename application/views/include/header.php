<!DOCTYPE html>
<html lang="en" style="width: 100%;max-width: 100%;overflow-x: hidden;">

<head>
<meta charset="utf-8">
<title>Hotel Room Booking</title>
<!-- Stylesheets -->
<link href="<?php echo base_url('assets/css/bootstrap.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
<!-- Responsive File -->
<link href="<?php echo base_url('assets/css/responsive.css');?>" rel="stylesheet">
<!-- Color File -->
<link href="<?php echo base_url('assets/css/color.css');?>" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@400;500;600;700&amp;family=DM+Sans:wght@400;500;700&amp;display=swap" rel="stylesheet">

<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png');?>" type="image/x-icon">
<link rel="icon" href="<?php echo base_url('assets/images/favicon.png');?>" type="image/x-icon">

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

<style>
    .mob-nav-none{
        display:block!important;
    }
    @media only screen and (max-width: 991px){
        .main-header .header-upper .middle-column{
            display:flex!important;
        }
        .mob-nav-none{
        display:none!important;
    }
    }
    body{
        width: 100%;
        max-width: 100%;
        overflow-x: hidden;
    }
    .row-1{
      display:flex;
    }
    .row-1 > *{
        padding-right: calc(var(--bs-gutter-x) / 2);
        padding-left: calc(var(--bs-gutter-x) / 2);
        margin-top: var(--bs-gutter-y);
    }
    .row-2{
    display:flex;
    }
    .row-2 > * {
    /* flex-shrink: 0;
    width: 100%;
    display:flex;
    flex-wrap:wrap;
    max-width: 100%; */
    padding-right: calc(var(--bs-gutter-x) / 2);
    padding-left: calc(var(--bs-gutter-x) / 2);
    margin-top: var(--bs-gutter-y);
   }
   @media(max-width:760px){
    .row-2 > * {
    flex-shrink: 0;
    width: max-content;
    display:flex;
    flex-wrap:nowrap;
    max-width: max-content;
    padding-right: calc(var(--bs-gutter-x) / 3);
    padding-left: calc(var(--bs-gutter-x) / 3);
    margin-top: var(--bs-gutter-y);
   }
   }
   .input-group-addon{
    padding:0px 20px;
    margin:auto;
    font-size:35px;
    color:#c77a63;
   }
   .input-group-addon-2{
    padding:0px 20px;
    margin:auto;
    font-size:35px;
    color:#c77a63;
   }
   @media(max-width:760px){
    .input-group-addon{
       padding:0px 10px;
       font-size:25px;
    }
    .input-group-addon-2{
       display:none;
    }
   }
   #ui-datepicker-div{
    z-index: 9!important;
   }
   .hvr-img-zoom-1{
    max-height: 250px;
   }
   a{
    clear: both;
    display: inline-block;
    overflow: hidden;
    white-space: nowrap;
   }
   .box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #fff;
}
.box-header:before, .box-body:before, .box-footer:before, .box-header:after, .box-body:after, .box-footer:after {
    content: " ";
    display: table;
}
   .box-footer nav{
    display: flex;
    width: max-content;
    margin: auto;
   }
   .pagination {
    /* display: inline-block; */
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
   }
   .pagination li {
    display: inline;
    position: relative;
    overflow: hidden;
    padding: 7px 5px 6px;
    text-align: center;
    z-index: 1;
    letter-spacing: 1px;
    color: #ffffff;
    font-weight: 500;
    text-transform: uppercase;
    transition: .5s;
   }
   .pagination>li:first-child>a, .pagination>li:first-child>span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
.pagination>li>a {
    background: #fafafa;
    color: #666;
    border-radius: 0 !important;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: var(--theme-color);
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 2;
    color: #fff;
    cursor: default;
    background-color: var(--theme-color);
    border-color: var(--theme-color);
}
.container {
	margin: 0 auto;
	max-width: 700px;
	max-height: 100vh;
	background-color: white;
}


/* Useful Classes */
.xy-center {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

.transition {
	transition: all 350ms ease-in-out;
}

.r-3-2 {
	width: 100%;
	padding-bottom: 66.667%;
	background-color: #ddd;
}

.image-holder {
	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
}

/* Main Styles */
.gallery-wrapper {
	position: relative;
	overflow: hidden;
}

.gallery {
	position: relative;
	white-space: nowrap;
	font-size: 0;
}

.item-wrapper {
	cursor: pointer;
	width: 23%; /* arbitrary value */
	display: inline-block;
	background-color: white;
}

.gallery-item { opacity: 0.5; }
.gallery-item.active { opacity: 1; }

.controls {
	font-size: 0;
	border-top: none;
}
.move-btn {
	display: inline-block;
	width: 50%;
	border: none;
  color: #ccc;
	background-color: transparent;
	padding: 0.2em 1.5em;
}
.move-btn:first-child {border-right: none;}
.move-btn.left  { cursor: w-resize; }
.move-btn.right { cursor: e-resize; }
.form-check-input:checked {
    background-color: #c77a63;
    border-color: #c77a63;
}
.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
    z-index: 999999;
}
.modal {
  background: rgba(0, 0, 0, 0.5); 
}
.modal-backdrop {
  display: none;
}
@media(max-width:750px){
    .row-2 {
       display: flex;
       flex-wrap: inherit;
    }
}
</style>
</head>

<body>

<div class="page-wrapper">

    <div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>

    <header class="main-header header-style-one">

        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container d-flex align-items-center justify-content-between">
                    <div class="logo-box">
                        <div class="logo" style="width: 100px;"><a href="<?php echo base_url('');?>"><img src="<?php echo base_url('assets/images/logo1.png');?>" alt=""></a></div>
                    </div>
                    <div class="right-column d-flex align-items-center middle-column">
                        <div class="nav-outer">
                            <div class="mobile-nav-toggler"><img src="<?php echo base_url('assets/images/icons/icon-bar-2.png');?>" alt=""></div>
                            <nav class="main-menu navbar-expand-md navbar-light" style="padding-right:40px;">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation">
                                        <li><a href="<?php echo base_url('');?>" class="active">Home</a></li>                                    
                                        
                                        <li><a href="<?php echo base_url('rooms');?>">Rooms</a></li>
                                        <!-- <li class="dropdown"><a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="blog-standard.html">Blog Standard</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="<?php echo base_url('contact');?>">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <button type="button" class="theme-btn search-toggler mob-nav-none"><i class="icon-1"></i></button>                        
                        <div class="header-link-btn"><a href="javascript:void(0);" class="btn-1 btn-small btn-alt mob-nav-none">Book Your Stay <span></span></a></div>
                    </div>
                    <!-- <div class="right-column d-flex align-items-center" style="display:none;">
                        <button type="button" class="theme-btn search-toggler"><i class="icon-1"></i></button>                        
                        <div class="header-link-btn"><a href="javascript:void(0);" class="btn-1 btn-small btn-alt">Book Your Stay <span></span></a></div>
                    </div>                       -->
                </div>
            </div>
        </div>
        <div class="sticky-header">
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container d-flex align-items-center justify-content-between">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo" style="width: 100px;"><a href="<?php echo base_url('');?>"><img src="<?php echo base_url('assets/images/logo1.png');?>" alt=""></a></div>
                        </div>
                        <div class="right-column d-flex align-items-center">
                            <!--Nav Box-->
                            <div class="nav-outer">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler"><img src="<?php echo base_url('assets/images/icons/icon-bar-2.png');?>" alt=""></div>
    
                                <!-- Main Menu -->
                                <nav class="main-menu navbar-expand-md navbar-light" style="padding-right:40px;">
                                </nav>
                            </div>
                            <div class="header-link-btn mob-nav-none"><a href="javascript:void(0);" class="btn-1 btn-small btn-alt">Book Your Stay <span></span></a></div>
                        </div>
                        <!-- <div class="right-column d-flex align-items-center " style="display:none;">                        
                            <div class="header-link-btn"><a href="javascript:void(0);" class="btn-1 btn-small btn-alt">Book Your Stay <span></span></a></div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="fal fa-times"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="<?php echo base_url('');?>"><img src="<?php echo base_url('assets/images/logo-light1.png');?>" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				<!--Social Links-->
				<div class="social-links">
					<ul class="clearfix">
						<li><a href="#"><span class="fab fa-twitter"></span></a></li>
						<li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
						<li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
						<li><a href="#"><span class="fab fa-instagram"></span></a></li>
						<li><a href="#"><span class="fab fa-youtube"></span></a></li>
					</ul>
                </div>
            </nav>
        </div>

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>


    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><span class="fal fa-times"></span></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <form method="post" action="https://html.tonatheme.com/2022/royalking/index.html">
                    <div class="form-group">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >
                            <input type="submit" value="Search Now!" class="theme-btn">
                        </fieldset>
                    </div>
                </form>
                <br>
                <h3>Recent Search Keywords</h3>
                <ul class="recent-searches">
                    <li><a href="#">Finance</a></li>
                    <li><a href="#">Idea</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Growth</a></li>
                    <li><a href="#">Plan</a></li>
                </ul>
            </div>
        </div>
    </div>