<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Dashboard</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="https://i.ibb.co.com/6w26Pc2/logo.jpg"
      type=""
    />

    <!-- Fonts and icons -->
    <script src="{{asset_custom('assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{asset_custom('assets/css/fonts.min.css')}}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    <!-- CSS Files -->

    <link rel="stylesheet" href="{{asset_custom('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset_custom('assets/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset_custom('assets/css/kaiadmin.min.css')}}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset_custom('assets/css/demo.css')}}" />
  </head>
  <body style="margin: 0px">

    <div id="app">
      <app></app>
    </div>

    <script>window.baseUrl = '{{url('/')}}';</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.3.0/tinymce.min.js" integrity="sha512-RUZ2d69UiTI+LdjfDCxqJh5HfjmOcouct56utQNVRjr90Ea8uHQa+gCxvxDTC9fFvIGP+t4TDDJWNTRV48tBpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--   Core JS Files   -->
    <script src="{{asset_custom('assets/js/core/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset_custom('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset_custom('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery Scrollbar -->
    <script src="{{asset_custom('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset_custom('assets/js/plugin/chart.js/chart.min.js')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset_custom('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Chart Circle -->
    <script src="{{asset_custom('assets/js/plugin/chart-circle/circles.min.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset_custom('assets/js/plugin/datatables/datatables.min.js')}}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{asset_custom('assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{asset_custom('assets/js/plugin/jsvectormap/world.js')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset_custom('assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset_custom('assets/js/kaiadmin.min.js')}}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{asset_custom('assets/js/setting-demo.js')}}"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>


    <script>
      window.publicPath = '{{ env('PUBLIC_PATH') }}';
      window.uploadPath = '{{ env('UPLOAD_PATH') }}';
    </script>


    <script src="{{ asset_custom('js/app.js') }}"></script>

  </body>
</html>

