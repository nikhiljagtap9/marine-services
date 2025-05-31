<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Rated Marine Services</title>
      <!-- App favicon -->
      <link rel="shortcut icon" href="{{ asset('/admin/assets/dist/img/favicon.png')}}">
      <!-- Global Styles(used by all pages) -->
      <link href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{ asset('admin/assets/plugins/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
      <link href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css')}}" rel="stylesheet">
      <!-- Third party Styles(used by this page) -->
      <link href="{{ asset('admin/assets/plugins/toastr/toastr.css')}}" rel="stylesheet">
      <link href="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
      <!-- App css -->
      <link href="{{ asset('admin/assets/dist/css/app.min.css')}}" rel="stylesheet">
      <!-- Start Your Custom Style Now -->
      <link href="{{ asset('admin/assets/dist/css/style.css')}}" rel="stylesheet">
   </head>
   <body class="fixed sidebar-mini">
      <!-- Start preloader -->
      <div class="page-loader {{ request()->is('admin/users/detail/*') ? '' : 'page-loader-active' }}">
         <div class="page-loader-content">
            <div class="page-loader-logo">
               <img src="{{ asset('admin/assets/images/logo.png')}}" alt="Logo" class="logo_main_loader" >
            </div>
            <div class="page-loader-progress">
               <div class="page-loader-bar"></div>
               <div class="page-loader-percent">0%</div>
            </div>
         </div>
      </div>
      <!-- End /. preloader -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <nav class="sidebar">
            <div class="sidebar-header">
               <a href="{{route('admin.dashboard')}}" class="sidebar-brand">
               <!-- <img class="sidebar-brand_icon" src="assets/dist/img/mini-logo.png" alt=""> -->
               <span class="sidebar-brand_text">
                   <img class="sidebar-brand_icon logo_main_as" src="{{ asset('admin/assets/images/logo.png')}}" alt="">
               </span>
               </a>
            </div>
            <!--/.sidebar header-->
            <div class="sidebar-body">
               <nav class="sidebar-nav">
                  <ul class="metismenu">
                     <li class="nav-label">
                        <span class="nav-label_text">Main Menu</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-three-dots nav-label_ellipsis m-auto" viewBox="0 0 16 16">
                           <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                        </svg>
                     </li>
                     <li class="{{request()->routeIs('admin.dashboard') ? 'mm-active' : ''}}">
                        <a href="{{route('admin.dashboard')}}" class="index_activ" >
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-home"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                           <span class="ms-2">Dashboard</span>
                        </a>
                     </li>
                     

                     <li class="{{ request()->routeIs('admin.countries.*', 'admin.cities.*', 'admin.ports.*', 'admin.categories.*', 'admin.sub-categories.*') ? 'mm-active' : '' }}">
                            <a class="has-arrow material-ripple" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                                    <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5" />
                                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z" />
                                </svg>
                                <span class="ms-2">Setting</span>
                            </a>
                            <ul class="nav-second-level">
                                <li><a href="{{ route('admin.countries.index') }}">Manage Countries</a></li>
                                <li><a href="{{ route('admin.cities.index') }}">Manage Cities</a></li> 
                                <li><a href="{{ route('admin.ports.index') }}">Manage Ports</a></li> 
                                <li><a href="{{ route('admin.categories.index') }}">Manage Categories</a></li> 
                                <li><a href="{{ route('admin.sub-categories.index') }}">Manage Sub-Categories</a></li> 
                            </ul>
                     </li>   
                     
                     <li class="{{ request()->routeIs('admin.usres.*') ? 'mm-active' : '' }}">
                            <a class="has-arrow material-ripple" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-nested" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5" />
                                </svg>
                                <span class="ms-2">Users</span>
                            </a>
                            <ul class="nav-second-level">                            
                               <li class="{{ request()->has('plan') ? 'mm-active' : '' }}">
                                    <a class="has-arrow" href="#" aria-expanded="false">Service Provider</a>
                                    <ul class="nav-third-level {{ request()->has('plan') ? 'mm-show' : '' }}">
                                       <li><a href="{{ route('admin.usres.index', ['plan' => '1']) }}">Basic Plan</a></li>  
                                       <li><a href="{{ route('admin.usres.index', ['plan' => '2']) }}">Silver Plan</a></li>
                                       <li><a href="{{ route('admin.usres.index', ['plan' => '3']) }}">Gold Plan</a></li>
                                       <li><a href="{{ route('admin.usres.index', ['plan' => '4']) }}">Platinum Plan</a></li>
                                       <!-- <li>
                                          <a class="has-arrow" href="#" aria-expanded="false">Level - 3</a>
                                          <ul class="nav-fourth-level">
                                             <li><a href="#">Menu - 4(1)</a></li>
                                          </ul>
                                       </li> -->
                                    </ul>
                                </li>
                                 <li><a href="#">Client</a></li>
                            </ul>
                        </li>
  
                  </ul>
               </nav>
               
            </div>
            <!-- sidebar-body -->
         </nav>
         <!-- Page Content  -->
         <div class="content-wrapper">
            <div class="main-content">
               <!-- Star navbar -->
               <nav class="navbar-custom-menu navbar navbar-expand-xl m-0 navbar-transfarent">
                  <div class="sidebar-toggle">
                     <div class="sidebar-toggle-icon" id="sidebarCollapse">
                        sidebar toggle<span></span>
                     </div>
                  </div>
                  <!--/.sidebar toggle icon-->
                  <!-- Collapse -->
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <!-- Toggler -->
                     <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-expanded="true" aria-label="Toggle navigation"><span></span> <span></span></button>
                     <!-- Start search -->
                     <form class="search" action="#" method="get">
                        <div class="search__inner">
                           <input type="text" class="search__text" placeholder="Search (Ctrl+/)">
                           <svg data-sa-action="search-close" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search search__helper" viewBox="0 0 16 16">
                              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                           </svg>
                           <span class="search-shortcode">(Ctrl+/)</span>
                        </div>
                     </form>
                    
                  </div>
                  <div class="navbar-icon d-flex">
                     <ul class="navbar-nav flex-row align-items-center">
                        <li class="nav-item">
                           <a class="nav-link" href="#" id="btnFullscreen">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fullscreen" viewBox="0 0 16 16">
                                 <path d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5M.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5" />
                              </svg>
                           </a>
                        </li>
                         
                        <li class="nav-item">
                           <button class="nav-link light-button">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                                 <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                              </svg>
                           </button>
                        </li>
                        <li class="nav-item dropdown user-menu user-menu-custom">
                           <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <div class="profile-element d-flex align-items-center flex-shrink-0 p-0 text-start">
                                 <div class="avatar online">
                                    <img src="{{ asset('admin/assets/dist/img/avatar/01.jpg')}}" class="img-fluid rounded-circle" alt="">
                                 </div>
                                 <div class="profile-text">
                                    <h6 class="m-0 fw-medium fs-14">Ugur</h6>
                                    <span><span class="__cf_email__" data-cfemail="b5d0cdd4d8c5d9d0f5d2d8d4dcd99bd6dad8">[email&#160;protected]</span></span>
                                 </div>
                              </div>
                           </a>
                           <div class="dropdown-menu">
                              <div class="dropdown-header d-sm-none">
                                 <a href="" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                              </div>
                              <div class="user-header">
                                 <div class="img-user">
                                    <img src="{{ asset('admin/assets/dist/img/avatar/01.jpg')}}" alt="">
                                 </div>
                                 <!-- img-user -->
                                 <h6>Naeem Khan</h6>
                                 <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3f5a475e524f535a7f58525e5653115c5052">[email&#160;protected]</a></span>
                              </div>
                              <!-- user-header -->

                              <form method="POST" action="{{ route('admin.logout') }}">
                                 @csrf
                                 <button type="submit" class="dropdown-item"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                                                  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                                                  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                                               </svg>
                                 Sign Out</button>
                              </form>
                           </div>
                           <!--/.dropdown-menu -->
                        </li>
                     </ul>
                  </div>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fa-solid fa-bars fs-18"></i>
                  </button>
               </nav>
               <!-- End /. navbar -->
              
               <!--/.body content-->
            