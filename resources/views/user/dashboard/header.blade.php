<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Rated Marine Services</title>
      <!-- App favicon -->
      <link rel="shortcut icon" href="{{ asset('user/dashboard/assets/dist/img/favicon.png')}}">
      <!-- Global Styles(used by all pages) -->
      <link href="{{ asset('user/dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{ asset('user/dashboard/assets/plugins/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
      <link href="{{ asset('user/dashboard/assets/plugins/fontawesome/css/all.min.css')}}" rel="stylesheet">
      <!-- Third party Styles(used by this page) -->
      <link href="{{ asset('user/dashboard/assets/plugins/toastr/toastr.css')}}" rel="stylesheet">
      <link href="{{ asset('user/dashboard/assets/plugins/datatables/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
      <!-- App css -->
      <link href="{{ asset('user/dashboard/assets/dist/css/app.min.css')}}" rel="stylesheet">
      <!-- Start Your Custom Style Now -->
      <link href="{{ asset('user/dashboard/assets/dist/css/style.css')}}" rel="stylesheet">
   </head>
   <body class="fixed sidebar-mini">
      <!-- Start preloader -->
      <div class="page-loader page-loader-active">
         <div class="page-loader-content">
            <div class="page-loader-logo">
               <img src="{{ asset('user/dashboard/assets/images/logo.png')}}" alt="Logo" class="logo_main_loader" >
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
               <a href="index.php" class="sidebar-brand">
               <span class="sidebar-brand_text">
                   <img class="sidebar-brand_icon logo_main_as" src="{{ asset('user/dashboard/assets/images/logo.png')}}" alt="">
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
                     <li class="">
                        <a href="{{route('user.index')}}" class="index_activ" >
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-home"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                           <span class="ms-2">Dashboard</span>
                        </a>
                     </li>
                     <li>
                        <a href="wishlist.php" class="wish_activ" >
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                           <span class="ms-2">My Favorites</span>
                        </a>
                     </li>
                      
                     <li>
                        <a href="{{route('user-quotes.list')}}" class="quot_activ" >
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clipboard-text"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path><path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path><path d="M9 12h6"></path><path d="M9 16h6"></path></svg>
                           <span class="ms-2">Quote</span>
                           <span class="badge rounded-pill bg-success">2</span>
                        </a>
                     </li>
                      
                     <li>
                        <a href="review.php" class="revw_activ" >
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                              <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z" />
                           </svg>
                           <span class="ms-2">Reviews</span>
                        </a>
                     </li>
                         
                     <li>
                        <a href="profile.php" class="prof_activ" >
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                              <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                              <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                           </svg>
                           <span class="ms-2">My Account</span>
                        </a>
                     </li>
                     
                     <!-- <li>
                        <a href="#">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                              <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                           </svg>
                           <span class="ms-2">Logout</span>
                        </a>
                     </li> -->
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
                                    <img src="" class="img-fluid rounded-circle" alt="">
                                 </div>
                                 <div class="profile-text">
                                    <h6 class="m-0 fw-medium fs-14">{{ $user->name }}</h6>
                                 </div>
                              </div>
                           </a>
                           <div class="dropdown-menu">
                              <div class="dropdown-header d-sm-none">
                                 <a href="" class="header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                              </div>
                              <div class="user-header">
                                 <div class="img-user">
                                    <img src="">
                                 </div>
                                 <!-- img-user -->
                                 <h6>{{ $user->name }}</h6>
                              </div>
                              <!-- user-header -->
                              
                              <form method="POST" action="{{ route('logout') }}">
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
            