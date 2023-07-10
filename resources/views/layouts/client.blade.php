<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="{{ asset('client/assets/images/favicon.svg') }}" type="image/x-icon" />
  <title>Tool - @yield('title')</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="{{ asset('client/assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('client/assets/css/lineicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('client/assets/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('client/assets/css/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{ asset('client/assets/css/main.css') }}" />
  <style>
    h2, h3 {
        text-align: center;
    }

    .container {
        margin-left: auto;
        margin-right: auto;
    }

    .section > .container-fluid {
        padding: 0;
    }

    .main-wrapper .header {
        position: sticky;
        top: 0;
        z-index: 2;
        padding: 12px 0;
        border-radius: 0 0 10px 10px;
        box-shadow: 0px 10px 20px rgba(200, 208, 216, 0.3);
        background: #fff;
    }

    .header .header-left .header-search form{
        max-width: 330px;
    }

    .header .header-left .menu-toggle-btn .main-btn {
        height: 50px;
        width: 50px;
        border-radius: 40px;
    }

    .header .header-left .header-search form button {
        left: 22px;
        top: 5px;
    }

    .header .header-left .header-search form input {
        background: #fff;
        height: 50px;
        width: 330px;
        border: 2px solid #e9e9e9;
        border-radius: 40px;
        padding-left: 50px;
    }

    .header .header-left .header-search form input:focus {
        border-color: #0067FF;
        box-shadow: 0px 10px 20px rgba(200, 208, 216, 0.3);
    }

    .header-search-result {
        display: none;
        padding-bottom: 0;
    }

    .result{
        width: 330px;
    }

    .input {
        display: block;
        width: 100%;
        padding: 5px;
        font-size: 20px;
        border-radius: 5px;
        border: 2px solid #ccc;
    }

    .cardform span {
        font-size: 30px
    }

    .input-style-1 label,
    .select-style-1 label {
        font-size: 16px;
        font-weight: 500;
        color: #262d3f;
        display: block;
        margin-bottom: 10px;
        width: 100%;
    }

    .input-style-1 input,
    .input-style-1 textarea,
    .select-style-1 .select-position select {
        background: #fff;
        border: 2px solid #e1e1e1;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 18px;
        color: #454b5c;
    }

    button.calculate{
        padding: 0 30px;
        font-size: 32px;
    }

    .lythuyet ul{
        padding-left: 130px;
    }

    .lythuyet ul li {
        margin-bottom: 10px;
    }

    p, .lythuyet ul li {
        font-size: 18px;
    }

    .icon-card .icon.primary {
        background: rgba(0, 102, 255, 0.1);
        color: #0067FF;
    }
    a:hover{
        color: #0067FF;
    }

    .phanso {
        display: inline-block;
    }

    .phanso>span {
        display: block;
        padding-top: 2px;
    }

    .phanso span.vetruoc {
        text-align: center;
    }
    
    .phanso span.vesau {
        border-top: thin solid black;
        text-align: center;
    }
  </style>
  @yield('css')
</head>

<body>
  <div class="container-fluid">
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <h3>
            <a href="<?php echo route('home'); ?>">
            {{-- <img src="{{ asset('client/assets/images/logo/logo.svg') }}" alt="logo" /> --}}
            {{-- @lang('lang.tool') --}}
            TOOL
            </a>
        </h3>
      </div>
      <nav class="sidebar-nav">
        <ul>

        {{-- menu --}}
          @include('layouts.menu')

        </ul>
      </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row d-flex align-items-center">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-20">
                  <button id="menu-toggle" class="main-btn light-btn-outline rounded-md btn-hover">
                    <i class="lni lni-chevron-left"></i>
                  </button>
                </div>
                <div class="header-search position-relative">
                  <form action="#">
                    <input class="header-search-input" type="text" placeholder="Tìm kiếm theo khái niệm" />
                    <button><i class="lni lni-search-alt"></i></button>
                  </form>
                  <div class="result position-absolute">
                    <div class="card-style cardform header-search-result">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- profile start -->

                <div class="profile-box ml-15">
                  <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-info">

                      {{-- <div class="info">
                        <p>@lang('lang.language')</p>
                      </div>
                    </div>
                    <i class="lni lni-chevron-down"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                    <li>
                      <a href="{{url('lang/vi')}}">
                        <i class="lni lni-user"></i> Tiếng Việt
                      </a>
                    </li>
                    <li>
                      <a href="{{url('lang/en')}}">
                        <i class="lni lni-alarm"></i>English
                      </a>
                    </li>
                  </ul>
                </div> --}}
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">

          <!-- ========== content start ========== -->
            @yield('content')
          <!-- ========== content end ========== -->

        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      <!-- ========== footer start =========== -->
      {{-- <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                 tool toán lý hóa
                </p>
              </div>
            </div>
            <!-- end col-->
            <div class="col-md-6">
              <div class="
                    terms
                    d-flex
                    justify-content-center justify-content-md-end
                  ">
                <a href="#0" class="text-sm">Term & Conditions</a>
                <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer> --}}
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->
  </div>


  <!-- ========= All Javascript files linkup ======== -->
  <script src="{{ asset('client/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('client/assets/js/Chart.min.js') }}"></script>
  <script src="{{ asset('client/assets/js/dynamic-pie-chart.js') }}"></script>
  <script src="{{ asset('client/assets/js/moment.min.js') }}"></script>
  <script src="{{ asset('client/assets/js/fullcalendar.js') }}"></script>
  <script src="{{ asset('client/assets/js/jvectormap.min.js') }}"></script>
  <script src="{{ asset('client/assets/js/world-merc.js') }}"></script>
  <script src="{{ asset('client/assets/js/polyfill.js') }}"></script>
  <script src="{{ asset('client/assets/js/main.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentPath = window.location.pathname;
        var anchors = document.querySelectorAll('.collapse.dropdown-nav li > a');

        // Iterate over each anchor and compare the route with the current URL path
        anchors.forEach(function(anchor) {
            var href = anchor.getAttribute('href');
            var route = href.split('/').pop();
            var currentRoute = currentPath.split('/').pop();
            if (currentRoute === route) {
                anchor.classList.add('active');
                var parentUl = anchor.parentNode.parentNode;
                parentUl.classList.add('show');
                var outermostAnchor = parentUl.parentNode.querySelector('a[data-bs-toggle="collapse"]');
                if (outermostAnchor) {
                    outermostAnchor.setAttribute('aria-expanded', 'true');
                    outermostAnchor.classList.remove('collapsed');
                }
            }
        });
    });


    $('.header-search-input').keyup(function() {
        var _text = $(this).val();

        $.ajax({
            url: '{{ route('search') }}?tukhoa=' + _text,
            type: 'GET',
            success: function(res){
                var _html = '';

                for(var pro of res){
                    var _url = '{{ url("chitietkhainiem"); }}';

                    _html += '<div class="card-content mb-4">';
                    _html += '<h5><a href="' + _url + '/' + pro.id + '">' + pro.kyhieu + ' - ' + pro.tenkhainiem + '</a></h5>';
                    _html += '</div>';
                }
                if(res){
                    $('.header-search-result').html(_html);
                    $('.header-search-result').show();
                }
                else{
                    $('.header-search-result').hide();
                }
            }
        });

    }).keyup();
  </script>
  @yield('script')
</body>

</html>
