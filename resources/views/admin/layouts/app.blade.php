<!doctype html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>@yield('title')</title>
      <link rel="shortcut icon" href="/dist/assets/images/favicon.ico">
      <link rel="stylesheet" href="/dist/assets/css/core/libs.min.css"
      <link rel="stylesheet" href="/dist/assets/vendor/aos/dist/aos.css">
      <link rel="stylesheet" href="/dist/assets/css/hope-ui.min.css?v=4.0.0">
      <link rel="stylesheet" href="/dist/assets/css/custom.min.css?v=4.0.0">
      <link rel="stylesheet" href="/dist/assets/css/dark.min.css">
      <link rel="stylesheet" href="/dist/assets/css/customizer.min.css">
      <link rel="stylesheet" href="dist/assets/css/rtl.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
   </head>
   <body class="  ">
      <aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="{{ route('admin.home') }}" class="navbar-brand">
                <div class="logo-main">
                    <div class="logo-normal">
                        <img src="/assets/images/logo.png" alt="Logo Sekolah" style="width: 50px; height: auto;">
                    </div>
                </div>
                <h4 class="logo-title">AHDA</h4>
            </a>
        </div>
         <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
               <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                  <li class="nav-item static-item">
                     <a class="nav-link static-item disabled" href="{{ route('admin.home') }}" tabindex="-1">
                     <span class="default-icon">Home</span>
                     <span class="mini-icon">-</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}" href="{{ route('admin.home') }}" aria-current="page">
                        <i class="icon">
                           <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20">
                              <path opacity="0.4" d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z" fill="currentColor"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="currentColor"></path>
                           </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                     </a>
                  </li>
                <li>
                     <hr class="hr-horizontal">
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}" href="{{ route('admin.siswa.index') }}">
                        <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                <path d="M9.34933 14.8577C5.38553 14.8577 2 15.47 2 17.9173C2 20.3665 5.364 20.9999 9.34933 20.9999C13.3131 20.9999 16.6987 20.3876 16.6987 17.9403C16.6987 15.4911 13.3347 14.8577 9.34933 14.8577Z" fill="currentColor"></path>                                <path opacity="0.4" d="M9.34935 12.5248C12.049 12.5248 14.2124 10.4062 14.2124 7.76241C14.2124 5.11865 12.049 3 9.34935 3C6.65072 3 4.48633 5.11865 4.48633 7.76241C4.48633 10.4062 6.65072 12.5248 9.34935 12.5248Z" fill="currentColor"></path>                                <path opacity="0.4" d="M16.1733 7.84873C16.1733 9.19505 15.7604 10.4513 15.0363 11.4948C14.961 11.6021 15.0275 11.7468 15.1586 11.7698C15.3406 11.7995 15.5275 11.8177 15.7183 11.8216C17.6165 11.8704 19.3201 10.6736 19.7907 8.87116C20.4884 6.19674 18.4414 3.79541 15.8338 3.79541C15.551 3.79541 15.2799 3.82416 15.0157 3.87686C14.9795 3.88453 14.9404 3.90177 14.9208 3.93244C14.8954 3.97172 14.914 4.02251 14.9394 4.05605C15.7232 5.13214 16.1733 6.44205 16.1733 7.84873Z" fill="currentColor"></path>                                <path d="M21.779 15.1693C21.4316 14.4439 20.593 13.9465 19.3171 13.7022C18.7153 13.5585 17.0852 13.3544 15.5695 13.3831C15.547 13.386 15.5343 13.4013 15.5324 13.4109C15.5294 13.4262 15.5363 13.4492 15.5656 13.4655C16.2662 13.8047 18.9737 15.2804 18.6332 18.3927C18.6185 18.5288 18.729 18.6438 18.867 18.6246C19.5333 18.5317 21.2476 18.1704 21.779 17.0474C22.0735 16.4533 22.0735 15.7634 21.779 15.1693Z" fill="currentColor"></path>
                                </svg>
                        </i>
                        <span class="item-name">Siswa</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('admin.wali.*') ? 'active' : '' }}" href="{{ route('admin.wali.index') }}">
                        <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>                                <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>                                <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>                                <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>                                <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>                                <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>                                </svg>
                        </i>
                        <span class="item-name">Wali</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('admin.operator.*') ? 'active' : '' }}" href="{{ route('admin.operator.index') }}">
                        <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>                                <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>                                </svg>
                            </i>
                        <span class="item-name">Operator</span>
                     </a>
                  </li>
                <li>
                     <hr class="hr-horizontal">
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('admin.rekening.*') ? 'active' : '' }}" href="{{ route('admin.rekening.index') }}">
                        <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9964 8.37513H17.7618C15.7911 8.37859 14.1947 9.93514 14.1911 11.8566C14.1884 13.7823 15.7867 15.3458 17.7618 15.3484H22V15.6543C22 19.0136 19.9636 21 16.5173 21H7.48356C4.03644 21 2 19.0136 2 15.6543V8.33786C2 4.97862 4.03644 3 7.48356 3H16.5138C19.96 3 21.9964 4.97862 21.9964 8.33786V8.37513ZM6.73956 8.36733H12.3796H12.3831H12.3902C12.8124 8.36559 13.1538 8.03019 13.152 7.61765C13.1502 7.20598 12.8053 6.87318 12.3831 6.87491H6.73956C6.32 6.87664 5.97956 7.20858 5.97778 7.61852C5.976 8.03019 6.31733 8.36559 6.73956 8.36733Z" fill="currentColor"></path>                                <path opacity="0.4" d="M16.0374 12.2966C16.2465 13.2478 17.0805 13.917 18.0326 13.8996H21.2825C21.6787 13.8996 22 13.5715 22 13.166V10.6344C21.9991 10.2297 21.6787 9.90077 21.2825 9.8999H17.9561C16.8731 9.90338 15.9983 10.8024 16 11.9102C16 12.0398 16.0128 12.1695 16.0374 12.2966Z" fill="currentColor"></path>                                <circle cx="18" cy="11.8999" r="1" fill="currentColor"></circle>                                </svg>
                        </i>
                        <span class="item-name">Rekening</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}" href="{{ route('admin.kelas.index') }}">
                        <i class="icon">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M9.5,13.09L10.91,14.5L6.41,19H10V21H3V14H5V17.59L9.5,13.09M10.91,9.5L9.5,10.91L5,6.41V10H3V3H10V5H6.41L10.91,9.5M14.5,13.09L19,17.59V14H21V21H14V19H17.59L13.09,14.5L14.5,13.09M13.09,9.5L17.59,5H14V3H21V10H19V6.41L14.5,10.91L13.09,9.5Z" />
                            </svg>
                        </i>
                        <span class="item-name">Kelas</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('admin.biaya.*') ? 'active' : '' }}" href="{{ route('admin.biaya.index') }}">
                        <i class="icon">
                            <svg class="icon-20" xmlns="http://www.w3.org/2000/svg"  width="20"   fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </i>
                        <span class="item-name">Biaya</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('admin.tagihan.*') ? 'active' : '' }}" href="{{ route('admin.tagihan.index') }}">
                        <i class="icon">
                            <svg class="icon-20" width="20px"  viewBox="0 0 24 24">
                                <path fill="currentColor" d="M11.19,2.25C11.97,2.26 12.71,2.73 13,3.5L18,15.45C18.09,15.71 18.14,16 18.13,16.25C18.11,17 17.65,17.74 16.9,18.05L9.53,21.1C9.27,21.22 9,21.25 8.74,21.25C7.97,21.23 7.24,20.77 6.93,20L1.97,8.05C1.55,7.04 2.04,5.87 3.06,5.45L10.42,2.4C10.67,2.31 10.93,2.25 11.19,2.25M14.67,2.25H16.12A2,2 0 0,1 18.12,4.25V10.6L14.67,2.25M20.13,3.79L21.47,4.36C22.5,4.78 22.97,5.94 22.56,6.96L20.13,12.82V3.79M11.19,4.22L3.8,7.29L8.77,19.3L16.17,16.24L11.19,4.22M8.65,8.54L11.88,10.95L11.44,14.96L8.21,12.54L8.65,8.54Z" />
                            </svg>
                        </i>
                        <span class="item-name">Tagihan</span>
                     </a>
                  </li>
                <li>
                     <hr class="hr-horizontal">
                  </li>
                  <li class="nav-item">
                     <a class="nav-link {{ request()->routeIs('admin.Cetaklaporan.*') ? 'active' : '' }}" href="{{ route('admin.Cetaklaporan.index') }}">
                        <i class="icon">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                               <path opacity="0.4" d="M16.6756 2H7.33333C3.92889 2 2 3.92889 2 7.33333V16.6667C2 20.0711 3.92889 22 7.33333 22H16.6756C20.08 22 22 20.0711 22 16.6667V7.33333C22 3.92889 20.08 2 16.6756 2Z" fill="currentColor"></path>                                <path d="M7.36866 9.3689C6.91533 9.3689 6.54199 9.74223 6.54199 10.2045V17.0756C6.54199 17.5289 6.91533 17.9022 7.36866 17.9022C7.83088 17.9022 8.20421 17.5289 8.20421 17.0756V10.2045C8.20421 9.74223 7.83088 9.3689 7.36866 9.3689Z" fill="currentColor"></path>                                <path d="M12.0352 6.08887C11.5818 6.08887 11.2085 6.4622 11.2085 6.92442V17.0755C11.2085 17.5289 11.5818 17.9022 12.0352 17.9022C12.4974 17.9022 12.8707 17.5289 12.8707 17.0755V6.92442C12.8707 6.4622 12.4974 6.08887 12.0352 6.08887Z" fill="currentColor"></path>                                <path d="M16.6398 12.9956C16.1775 12.9956 15.8042 13.3689 15.8042 13.8312V17.0756C15.8042 17.5289 16.1775 17.9023 16.6309 17.9023C17.0931 17.9023 17.4664 17.5289 17.4664 17.0756V13.8312C17.4664 13.3689 17.0931 12.9956 16.6398 12.9956Z" fill="currentColor"></path>
                                 </svg>
                        </i>
                        <span class="item-name">Laporan</span>
                     </a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="sidebar-footer"></div>
      </aside>
      <main class="main-content">
         <div class="position-relative iq-banner">
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
               <div class="container-fluid navbar-inner">
                  <a href="#" class="navbar-brand">
                     <div class="logo-main">
                        <div class="logo-normal">
                           <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                              <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                              <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                              <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                           </svg>
                        </div>
                        <div class="logo-mini">
                           <svg class="text-primary icon-30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                              <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                              <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                              <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                           </svg>
                        </div>
                     </div>
                     <h4 class="logo-title">Hope UI</h4>
                  </a>
                  <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                     <i class="icon">
                        <svg  width="20px" class="icon-20" viewBox="0 0 24 24">
                           <path fill="currentColor" d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                        </svg>
                     </i>
                  </div>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon">
                  <span class="mt-2 navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                  </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                        <li class="nav-item dropdown">
                           <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <img src="{{ Auth::user()->foto ? asset('storage/profiles/' . Auth::user()->foto) : asset('storage/uploads/profiles/avatar.png') }}" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                              <div class="caption ms-3 d-none d-md-block ">
                                 <h6 class="mb-0 caption-title">{{ Auth::user()->name }}</h6>
                              </div>
                           </a>
                           <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="{{ route('admin.profiles.index') }}">Profile</a></li>
                              <li>
                                 <hr class="dropdown-divider">
                              </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
            <div class="iq-navbar-header" style="height: 150px;">
               <div class="container-fluid iq-container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                           <div>
                              <h1>@yield('title')</h1>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="iq-header-img">
                  <img src="/dist/assets/images/dashboard/top-header.png" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                  <img src="/dist/assets/images/dashboard/top-header1.png" alt="header" class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                  <img src="/dist/assets/images/dashboard/top-header2.png" alt="header" class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                  <img src="/dist/assets/images/dashboard/top-header3.png" alt="header" class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                  <img src="/dist/assets/images/dashboard/top-header4.png" alt="header" class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                  <img src="/dist/assets/images/dashboard/top-header5.png" alt="header" class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
               </div>
            </div>
         </div>
         <div class="container m-0">
            @yield('content')
         </div>
         {{--  <footer class="footer">
            <div class="footer-body">
               <div class="right-panel">
                  ©<script>document.write(new Date().getFullYear())</script> SMP Ahmad Dahlan
               </div>
            </div>
         </footer>  --}}
      </main>
      <a class="btn btn-fixed-end btn-warning btn-icon btn-setting" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" role="button" aria-controls="offcanvasExample">
         <svg width="24" viewBox="0 0 24 24" class="animated-rotate icon-24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8064 7.62361L20.184 6.54352C19.6574 5.6296 18.4905 5.31432 17.5753 5.83872V5.83872C17.1397 6.09534 16.6198 6.16815 16.1305 6.04109C15.6411 5.91402 15.2224 5.59752 14.9666 5.16137C14.8021 4.88415 14.7137 4.56839 14.7103 4.24604V4.24604C14.7251 3.72922 14.5302 3.2284 14.1698 2.85767C13.8094 2.48694 13.3143 2.27786 12.7973 2.27808H11.5433C11.0367 2.27807 10.5511 2.47991 10.1938 2.83895C9.83644 3.19798 9.63693 3.68459 9.63937 4.19112V4.19112C9.62435 5.23693 8.77224 6.07681 7.72632 6.0767C7.40397 6.07336 7.08821 5.98494 6.81099 5.82041V5.82041C5.89582 5.29601 4.72887 5.61129 4.20229 6.52522L3.5341 7.62361C3.00817 8.53639 3.31916 9.70261 4.22975 10.2323V10.2323C4.82166 10.574 5.18629 11.2056 5.18629 11.8891C5.18629 12.5725 4.82166 13.2041 4.22975 13.5458V13.5458C3.32031 14.0719 3.00898 15.2353 3.5341 16.1454V16.1454L4.16568 17.2346C4.4124 17.6798 4.82636 18.0083 5.31595 18.1474C5.80554 18.2866 6.3304 18.2249 6.77438 17.976V17.976C7.21084 17.7213 7.73094 17.6516 8.2191 17.7822C8.70725 17.9128 9.12299 18.233 9.37392 18.6717C9.53845 18.9489 9.62686 19.2646 9.63021 19.587V19.587C9.63021 20.6435 10.4867 21.5 11.5433 21.5H12.7973C13.8502 21.5001 14.7053 20.6491 14.7103 19.5962V19.5962C14.7079 19.088 14.9086 18.6 15.2679 18.2407C15.6272 17.8814 16.1152 17.6807 16.6233 17.6831C16.9449 17.6917 17.2594 17.7798 17.5387 17.9394V17.9394C18.4515 18.4653 19.6177 18.1544 20.1474 17.2438V17.2438L20.8064 16.1454C21.0615 15.7075 21.1315 15.186 21.001 14.6964C20.8704 14.2067 20.55 13.7894 20.1108 13.5367V13.5367C19.6715 13.284 19.3511 12.8666 19.2206 12.3769C19.09 11.8873 19.16 11.3658 19.4151 10.928C19.581 10.6383 19.8211 10.3982 20.1108 10.2323V10.2323C21.0159 9.70289 21.3262 8.54349 20.8064 7.63277V7.63277V7.62361Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle cx="12.1747" cy="11.8891" r="2.63616" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
         </svg>
      </a>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" data-bs-scroll="true" data-bs-backdrop="true" aria-labelledby="offcanvasExampleLabel">
         <div class="offcanvas-header">
            <div class="d-flex align-items-center">
               <h3 class="offcanvas-title me-3" id="offcanvasExampleLabel">Settings</h3>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body data-scrollbar">
            <div class="row">
               <div class="col-lg-12">
                  <h5 class="mb-3">Scheme</h5>
                  <div class="d-grid gap-3 grid-cols-3 mb-4">
                     <div class="btn btn-border" data-setting="color-mode" data-name="color" data-value="auto">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill="currentColor" d="M7,2V13H10V22L17,10H13L17,2H7Z" />
                        </svg>
                        <span class="ms-2 "> Auto </span>
                     </div>
                     <div class="btn btn-border" data-setting="color-mode" data-name="color" data-value="dark">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill="currentColor" d="M9,2C7.95,2 6.95,2.16 6,2.46C10.06,3.73 13,7.5 13,12C13,16.5 10.06,20.27 6,21.54C6.95,21.84 7.95,22 9,22A10,10 0 0,0 19,12A10,10 0 0,0 9,2Z" />
                        </svg>
                        <span class="ms-2 "> Dark  </span>
                     </div>
                     <div class="btn btn-border active" data-setting="color-mode" data-name="color" data-value="light">
                        <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path fill="currentColor" d="M12,8A4,4 0 0,0 8,12A4,4 0 0,0 12,16A4,4 0 0,0 16,12A4,4 0 0,0 12,8M12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6A6,6 0 0,1 18,12A6,6 0 0,1 12,18M20,8.69V4H15.31L12,0.69L8.69,4H4V8.69L0.69,12L4,15.31V20H8.69L12,23.31L15.31,20H20V15.31L23.31,12L20,8.69Z" />
                        </svg>
                        <span class="ms-2 "> Light</span>
                     </div>
                  </div>
                  <hr class="hr-horizontal">
                  <div class="d-flex align-items-center justify-content-between">
                     <h5 class="mt-4 mb-3">Color Customizer</h5>
                     <button class="btn btn-transparent p-0 border-0" data-value="theme-color-default" data-info="#079aa2" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Default">
                        <svg class="icon-18" width="18"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M21.4799 12.2424C21.7557 12.2326 21.9886 12.4482 21.9852 12.7241C21.9595 14.8075 21.2975 16.8392 20.0799 18.5506C18.7652 20.3986 16.8748 21.7718 14.6964 22.4612C12.518 23.1505 10.1711 23.1183 8.01299 22.3694C5.85488 21.6205 4.00382 20.196 2.74167 18.3126C1.47952 16.4293 0.875433 14.1905 1.02139 11.937C1.16734 9.68346 2.05534 7.53876 3.55018 5.82945C5.04501 4.12014 7.06478 2.93987 9.30193 2.46835C11.5391 1.99683 13.8711 2.2599 15.9428 3.2175L16.7558 1.91838C16.9822 1.55679 17.5282 1.62643 17.6565 2.03324L18.8635 5.85986C18.945 6.11851 18.8055 6.39505 18.549 6.48314L14.6564 7.82007C14.2314 7.96603 13.8445 7.52091 14.0483 7.12042L14.6828 5.87345C13.1977 5.18699 11.526 4.9984 9.92231 5.33642C8.31859 5.67443 6.8707 6.52052 5.79911 7.74586C4.72753 8.97119 4.09095 10.5086 3.98633 12.1241C3.8817 13.7395 4.31474 15.3445 5.21953 16.6945C6.12431 18.0446 7.45126 19.0658 8.99832 19.6027C10.5454 20.1395 12.2278 20.1626 13.7894 19.6684C15.351 19.1743 16.7062 18.1899 17.6486 16.8652C18.4937 15.6773 18.9654 14.2742 19.0113 12.8307C19.0201 12.5545 19.2341 12.3223 19.5103 12.3125L21.4799 12.2424Z" fill="#31BAF1"/>
                           <path d="M20.0941 18.5594C21.3117 16.848 21.9736 14.8163 21.9993 12.7329C22.0027 12.4569 21.7699 12.2413 21.4941 12.2512L19.5244 12.3213C19.2482 12.3311 19.0342 12.5633 19.0254 12.8395C18.9796 14.283 18.5078 15.6861 17.6628 16.8739C16.7203 18.1986 15.3651 19.183 13.8035 19.6772C12.2419 20.1714 10.5595 20.1483 9.01246 19.6114C7.4654 19.0746 6.13845 18.0534 5.23367 16.7033C4.66562 15.8557 4.28352 14.9076 4.10367 13.9196C4.00935 18.0934 6.49194 21.37 10.008 22.6416C10.697 22.8908 11.4336 22.9852 12.1652 22.9465C13.075 22.8983 13.8508 22.742 14.7105 22.4699C16.8889 21.7805 18.7794 20.4073 20.0941 18.5594Z" fill="#0169CA"/>
                        </svg>
                     </button>
                  </div>
                  <div class="grid-cols-5 mb-4 d-grid gap-x-2">
                     <div class="btn btn-border bg-transparent"  data-value="theme-color-blue"   data-info="#573BFF" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-1">
                        <svg  class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" >
                           <circle cx="12" cy="12" r="10" fill="#00C3F9" />
                           <path d="M2,12 a1,1 1 1,0 20,0" fill="#573BFF" />
                        </svg>
                     </div>
                     <div class="btn btn-border bg-transparent" data-value="theme-color-gray" data-info="#FD8D00" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-2">
                        <svg  class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" >
                           <circle cx="12" cy="12" r="10" fill="#91969E" />
                           <path d="M2,12 a1,1 1 1,0 20,0" fill="#FD8D00" />
                        </svg>
                     </div>
                     <div class="btn btn-border bg-transparent"  data-value="theme-color-red" data-info="#366AF0" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-3">
                        <svg  class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" >
                           <circle cx="12" cy="12" r="10" fill="#DB5363" />
                           <path d="M2,12 a1,1 1 1,0 20,0" fill="#366AF0" />
                        </svg>
                     </div>
                     <div class="btn btn-border bg-transparent"  data-value="theme-color-yellow" data-info="#6410F1" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-4">
                        <svg  class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" >
                           <circle cx="12" cy="12" r="10" fill="#EA6A12" />
                           <path d="M2,12 a1,1 1 1,0 20,0" fill="#6410F1" />
                        </svg>
                     </div>
                     <div class="btn btn-border bg-transparent"  data-value="theme-color-pink" data-info="#25C799" data-setting="color-mode1" data-name="color" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Theme-5">
                        <svg  class="customizer-btn icon-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" >
                           <circle cx="12" cy="12" r="10" fill="#E586B3" />
                           <path d="M2,12 a1,1 1 1,0 20,0" fill="#25C799" />
                        </svg>
                     </div>
                  </div>
                  <hr class="hr-horizontal">
                  <h5 class="mb-3 mt-4">Scheme Direction</h5>
                  <hr class="hr-horizontal">
                  <h5 class="mt-4 mb-3">Sidebar Color</h5>
                  <div class="d-grid gap-3 grid-cols-2 mb-4">
                     <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-white">
                        <span class=""> Default </span>
                     </div>
                     <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-dark">
                        <span class=""> Dark </span>
                     </div>
                     <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-color">
                        <span class=""> Color </span>
                     </div>
                     <div class="btn btn-border d-block" data-setting="sidebar" data-name="sidebar-color" data-value="sidebar-transparent">
                        <span class=""> Transparent </span>
                     </div>
                  </div>
                  {{--  <div>
                    <a class="btn btn-primary" href="{{ route('admin.resetpassword.index') }}">Reset Password</a>
                  </div>  --}}
               </div>
            </div>
         </div>
      </div>
        @include('sweetalert::alert')

      <script src="/dist/assets/js/core/libs.min.js"></script>
      <script src="/dist/assets/js/core/external.min.js"></script>
      <script src="/dist/assets/js/charts/widgetcharts.js"></script>
      <script src="/dist/assets/js/charts/vectore-chart.js"></script>
      <script src="/dist/assets/js/charts/dashboard.js" ></script>
      <script src="/dist/assets/js/plugins/fslightbox.js"></script>
      <script src="/dist/assets/js/plugins/setting.js"></script>
      <script src="/dist/assets/js/plugins/slider-tabs.js"></script>
      <script src="/dist/assets/js/plugins/form-wizard.js"></script>
      <script src="/dist/assets/vendor/aos/dist/aos.js"></script>
      <script src="/dist/assets/js/hope-ui.js" defer></script>
      <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
   </body>
</html>
