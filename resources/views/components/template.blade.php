<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Academic UG</title>
  
  @yield('styles_cdn')
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
   
  <style>
    .modal-dialog{
        max-width: 70% !important;
    }
    @media(min-width: 576px){
      .modal-dialog{
        max-width: 70% !important;
      }
    }
  </style>
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="{{ asset('js/jquery.min.js') }}"><\/script>')</script>
</head>

<body>

  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            
          </div>
        </form>
        <ul class="navbar-nav navbar-right">

          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <!--<img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">-->
            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name}} {{ auth()->user()->last_name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!--<div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>-->
              <div class="dropdown-divider"></div>
              <a href="{{ route('user.logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      
      @include('components.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('section')
      </div>
      {{--Ajax Modal--}}
    <div class="modal fade bs-modal-md in" id="modal-component" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body" id="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->.
    </div>
    {{--Ajax Modal Ends--}}
      <footer class="main-footer">
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/i18n/es.js"></script>
  @yield('scripts_cdn')
  @yield('scripts')
  <script src="{{ asset('js/stisla.js') }}"></script>
  <!-- JS Libraies -->

  <script src="{{ asset('js/pace.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('js/page/index.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/moment.js') }}"></script>
  <script src="{{ asset('js/toastr.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('.select2').select2();
      $.toast = toastr;

    });


    function deleteData(event, url, dt_id, id) {
      if(!confirm('¿Está seguro que desea eliminar la información?')){
        return ;
      }
      event.preventDefault();
      $.easyAjax({
          type: 'DELETE',
          url: url,
          data: $('#form-delete-'+id).serialize(),
          success: function (response) {
              if (response.status == "success") {
                  // $.easyBlockUI('#leads-table');
                  window.LaravelDataTables[dt_id+"-table"].draw();
                  if(toastr){
                    toastr.success(response.message)
                  }
                  // window.location.reload();
                  // $.easyUnblockUI('#leads-table');
              }
          }
      });
    }
    function restoreData(event, url, dt_id, id) {
      if(!confirm('¿Está seguro que desea restaurar la información?')){
        return ;
      }
      event.preventDefault();
      console.log($('#form-restore-'+id).serialize());
      $.easyAjax({
          type: 'POST',
          url: url,
          data: $('#form-restore-'+id).serialize(),
          success: function (response) {
              if (response.status == "success") {
                  // $.easyBlockUI('#leads-table');
                  window.LaravelDataTables[dt_id+"-table"].draw();
                  if(toastr){
                    toastr.success(response.message)
                  }
                  // window.location.reload();
                  // $.easyUnblockUI('#leads-table');
              }
          }
      });
    }
  </script>
</body>
</html>
