
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('adm-title') - Admin Dashboard</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- WaitMe css -->
        <link href="{{ asset('wait-me/waitMe.min.css') }}" rel="stylesheet" type="text/css" />
        @livewireStyles
    </head>
    <body class="sb-nav-fixed">
        @include('admins.layouts.components.navbar')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('admins.layouts.components.left-sidebar')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                       @yield('contents')
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; {{ $appsetting->app_name }} - {{ date('Y') }} </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('admin/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        @yield('admin-scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- waitMe js -->
        <script src="{{ asset('wait-me/waitMe.min.js') }}"></script>
          <!-- Jquery Validator -->
          <script src="{{ asset('jquery-validator/dist/jquery.validate.min.js') }}"></script>
          <!-- notify js -->
          <script src="{{ asset('js/notify.min.js') }}"></script>
        <script>
             $('#layoutSidenav_content').waitMe({
                effect: 'roundBounce',
                text: 'Please wait...',
                bg: 'rgba(255,255,255,0.7)',
                color: '#000'
            })
            window.onload = function(){
                $('#layoutSidenav_content').waitMe('hide')
            }
        </script>
        @livewireScripts
        <x-livewire-alert::scripts />
        <!-- sizes event ---->
        <script>
            window.addEventListener('closeModal', event => {
                $('#exampleModal').modal('hide');
            })
        </script>
        <script>
            window.addEventListener('openSizeEditModal', event => {
                $('#sizeEditModal').modal('show');
            })
        </script>
        <script>
            window.addEventListener('closeSizeEditModal', event => {
                $('#sizeEditModal').modal('hide');
            })
        </script>
        <!--End size event ---->
         <!--start color event ---->
        <script>
            window.addEventListener('closeAddModal', event => {
                $('#addColorModal').modal('hide');
            })
        </script>
        <script>
            window.addEventListener('openColorEditModal', event => {
                $('#colorEditModal').modal('show');
            })
        </script>
        <script>
            window.addEventListener('closeColorEditModal', event => {
                $('#colorEditModal').modal('hide');
            })
        </script>
        <!-- galleries event ---->
         <script>
            window.addEventListener('closeGalleryModal', event => {
                $('#addGalleryModal').modal('hide');
            })
        </script>
        <script>
            window.addEventListener('openGalleryEditModal', event => {
                $('#GalleryEditModal').modal('show');
            })
        </script>
        <script>
            window.addEventListener('closeGalleryEditModal', event => {
                $('#GalleryEditModal').modal('hide');
            })
        </script>
        <!--End galleries event ---->
    </body>
</html>
