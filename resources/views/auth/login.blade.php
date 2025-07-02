



<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Login</title>
      <link rel="shortcut icon" href="/dist/assets/images/favicon.ico">
      <link rel="stylesheet" href="/dist/assets/css/core/libs.min.css"
      <link rel="stylesheet" href="/dist/assets/vendor/aos/dist/aos.css">
      <link rel="stylesheet" href="/dist/assets/css/hope-ui.min.css?v=4.0.0">
      <link rel="stylesheet" href="/dist/assets/css/custom.min.css?v=4.0.0">
      <link rel="stylesheet" href="/dist/assets/css/dark.min.css">
      <link rel="stylesheet" href="/dist/assets/css/customizer.min.css">
      <link rel="stylesheet" href="dist/assets/css/rtl.min.css">
  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
      <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-6">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                        <div class="card-body">
                           <a href="#" class="navbar-brand d-flex align-items-center mb-3">
                              <div class="logo-main">
                                  <div class="logo-normal">
                                        <img src="/assets/images/logo.png" alt="Logo Sekolah" style="width: 50px; height: auto;">
                                  </div>
                                  <div class="logo-mini">
                                        <img src="/assets/images/logo.png" alt="Logo Sekolah" style="width: 50px; height: auto;">
                                  </div>
                              </div>
                              <h4 class="logo-title ms-3">SMP AHMAD DAHLAN</h4>
                           </a>
                           <form method="POST" action="{{ route('login') }}">
                            @csrf
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="username" class="form-label">username</label>
                                        <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                 </div>
                                <div class="col-lg-12 text-end mt-2">
                                    <a href="{{ route('custom.password.request') }}" class="text-primary">Lupa Password?</a>
                                </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Login</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sign-bg">
                  <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <g opacity="0.05">
                     <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                     <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                     <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                     <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                     </g>
                  </svg>
               </div>
            </div>
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="dist/assets/images/auth/01.png" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
         </div>
      </section>
      </div>
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
  </body>
</html>
