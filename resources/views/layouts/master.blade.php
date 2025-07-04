
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

    <link rel="stylesheet" href="{{mix('css/app.css')}}" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @yield('css')
  <link rel="stylesheet" href="{{ asset('plugins/ijaboCropTool.min.css') }}">


</head>
<body class="hold-transition sidebar-mini ">
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">


<ul class="navbar-nav">

<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
@if(auth()->user()->role)
<li class="nav-item d-none d-sm-inline-block">
<a href="/voitures/create" class="nav-link"><i class="fa fa-car" aria-hidden="true"></i></a></li>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="/calendar/index" class="nav-link"><i class="fa fa-calendar" aria-hidden="true"></i></a></li>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="/entretiens/create" class="nav-link">  <i class="fa fa-wrench" aria-hidden="true"></i></a></li>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="/carburants/create" class="nav-link"> <i class="fas fa-gas-pump"></i> </a></li>
</li>
@endif
</ul>


<ul class="navbar-nav ml-auto">

<li class="nav-item">




<li class="nav-item">
<a class="nav-link" data-widget="fullscreen" href="#" role="button">
<i class="fas fa-expand-arrows-alt"></i>
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
<i class="fas fa-user"> </i>
</a>
</li>
</ul>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="/profile" class="brand-link">
<img src="/2itech.png" alt="" class="brand-image  elevation-3 " style="opacity: .8">
<span class="font-weight-light"> .</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
            <img  src="/images/2.png" class="img-size-50 mr-3 img-circle">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ userFullName() }}</a>
      </div>
    </div>



<x-menu />

</div>

</aside>

<div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield("content")

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>


<x-sidebar />


<footer class="main-footer">

<div class="float-right d-none d-sm-inline">
Anything you want
</div>

<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>








<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="{{ asset('plugins/ijaboCropTool.min.js') }}"></script>


<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

@yield('js')
{{-- CUSTOM JS CODES --}}

<script>

  $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });

  $(function(){

    /* UPDATE ADMIN PERSONAL INFO */

    $('#AdminInfoForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.admin_name').each(function(){
                     $(this).html( $('#AdminInfoForm').find( $('input[name="name"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });


    $(document).on('click','#change_picture_btn', function(){
      $('#admin_image').click();
    });


    $('#admin_image').ijaboCropTool({
          preview : '.admin_picture',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['CROP','QUIT'],
          buttonsColor:['#30bf7d','#ee5155', -15],
          processUrl:'{{ route("adminPictureUpdate") }}',
          // withCSRF:['_token','{{ csrf_token() }}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
       });

    $('#changePasswordAdminForm').on('submit', function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordAdminForm')[0].reset();
                alert(data.msg);
              }
            }
         });
    });


  });




</script>

</body>
</html>
