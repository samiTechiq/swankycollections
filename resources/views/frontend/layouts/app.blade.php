
<!doctype html>
<html lang="en" class="no-js">

<head>
    <title>@yield('title') - {{ $appsetting->app_name }}</title>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="meta description">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/swanky-favicon.png') }}" type="image/x-icon">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- all css -->
    <style>
        :root {
            --primary-color: #00234D;
            --secondary-color: #F76B6A;

            --btn-primary-border-radius: 0.25rem;
            --btn-primary-color: #fff;
            --btn-primary-background-color: #00234D;
            --btn-primary-border-color: #00234D;
            --btn-primary-hover-color: #fff;
            --btn-primary-background-hover-color: #00234D;
            --btn-primary-border-hover-color: #00234D;
            --btn-primary-font-weight: 500;

            --btn-secondary-border-radius: 0.25rem;
            --btn-secondary-color: #00234D;
            --btn-secondary-background-color: transparent;
            --btn-secondary-border-color: #00234D;
            --btn-secondary-hover-color: #fff;
            --btn-secondary-background-hover-color: #00234D;
            --btn-secondary-border-hover-color: #00234D;
            --btn-secondary-font-weight: 500;

            --heading-color: #000;
            --heading-font-family: 'Poppins', sans-serif;
            --heading-font-weight: 700;

            --title-color: #000;
            --title-font-family: 'Poppins', sans-serif;
            --title-font-weight: 400;

            --body-color: #000;
            --body-background-color: #fff;
            --body-font-family: 'Poppins', sans-serif;
            --body-font-size: 14px;
            --body-font-weight: 400;

            --section-heading-color: #000;
            --section-heading-font-family: 'Poppins', sans-serif;
            --section-heading-font-size: 48px;
            --section-heading-font-weight: 600;

            --section-subheading-color: #000;
            --section-subheading-font-family: 'Poppins', sans-serif;
            --section-subheading-font-size: 16px;
            --section-subheading-font-weight: 400;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @livewireStyles
</head>

<body>
    <div class="body-wrapper">
        <!-- announcement bar start -->
        @include('frontend.components.annocement')
        <!-- announcement bar end -->

        <!-- header start -->
        @include('frontend.components.header')
        <!-- header end -->

        <main id="MainContent" class="content-for-layout">
           @yield('home-contents')
        </main>

        <!-- footer start -->
        @include('frontend.components.footer')
        <!-- footer end -->

        <!-- scrollup start -->
        <button id="scrollup">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
        </button>
        <!-- scrollup end -->

        <!-- drawer menu start -->
        @include('frontend.components.drawer-menu')
        <!-- drawer menu end -->


        <!-- product quickview start -->

        <!-- product quickview end -->

        <!-- newsletter subscribe modal start -->
        <!-- newsletter subscribe modal end -->
    </div>

  <!-- Modal -->
  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <input type="text" class="form-control" id="query" placeholder="Start typing...">
          <div class="list-group my-3" id="searchList">
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- all js -->
    <script src="{{ asset('frontend/assets/js/vendor.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @yield('frontend-scripts')
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <script>
        $(document).ready(function(){
            $('#query').keyup(function(){
                let searchTerm = $(this).val();
               if($(this).val() != ''){
                $.ajax({
                    url: '/search/product',
                    type: "GET",
                    data: {search:searchTerm},
                    success: function(response){
                        if(response.length > 0){
                            $('#searchList').empty()
                            $.each(response, function(key, value){
                                $('#searchList').append(`
                                <a href="/product/detail/${value.id}" class="list-group-item list-group-item-action">${value.name}</a>
                                `)
                            })
                        }else{
                            $('#searchList').empty()
                            $('#searchList').append(`
                                <a href="#" class="list-group-item list-group-item-action">No items match your search</a>
                            `)
                        }

                    }
                })
               }
            })
        })
    </script>
</body>

</html>
