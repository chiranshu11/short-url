<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>
    <!-- Favicon -->
    <link href="/argon/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="/argon/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="/argon/css/argon.css?v=1.0.0" rel="stylesheet">
           <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-laravel" />
    <!--  Social tags      -->
    <meta name="keywords" content="dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, argon, argon ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, argon dashboard">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
    <meta itemprop="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
    <meta name="twitter:description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/argon-dashboard/index.html" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg" />
    <meta property="og:description" content="Start your development with a Dashboard for Bootstrap 4." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>
    <!-- End Google Tag Manager -->

    <style>
    .active{
    display: block;
}
.in-active{
    display: none;
}
.logout{
    height: 37px;
    color: #fff;
    float: right;
    transition: background-color .3s linear;
    transition-delay: .15s;
    border: 0px solid;
    border-radius: 2rem;
    background-color: #1AAC7A;
    margin: 10px;
    align-items: center;
    align-content: center;
    width: 150px;
    /*padding: 2px 12px 2px 4px;*/
}
    .generate-code{
        transition: background-color .3s linear;
        transition-delay: .15s;
        border: 0px solid;
        border-radius: 2rem;
        background-color: #1AAC7A;
        margin-top: 7px;
        padding: 2px 12px 2px 4px;
        width: 22%;
    }
    #red-circle {
      width: 20px;
      height: 20px;
      background: red;
      border-radius: 50%
    }
    #green-circle {
      width: 20px;
      height: 20px;
      background: #1AAC7A;
      border-radius: 50%
    }

    #gray-circle{
      width: 20px;
      height: 20px;
      background: gray;
      border-radius: 50%
    }    
    .box {
       border-radius: 4px;
       padding: 6px;
    }
</style>
</head>
<body class="clickup-chrome-ext_installed">
    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form> --}}
        
<div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="">
        
        <img src="/argon/img/brand/blue.png" class="navbar-brand-img" alt="...">
    </a>
    <ul class="navbar-nav align-items-center d-none d-md-flex" style="float: right;">
        <li class="nav-item dropdown">
            
            <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                <br>
                    <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="/argon/img/theme/team-4.jpg">
                    </span>
                    <br>
                    <span class="mb-0 text-sm  font-weight-bold">{{auth()->user()->name}}</span>
                </div>
                

                <div class="nav-link pr-0 logout" role="button" aria-haspopup="true" aria-expanded="false" ><a class = "nav-link pr-0" style="text-align: center; color: #fff" onclick="logout()" >Logout</a></div>
            </div>
                
            
        </li>
    </ul>
    
    <!-- User -->
    <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="/argon/img/theme/team-1.jpg">
                    </span>
                </div>
            </a>

            
        </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
            <div class="row">
                <div class="col-6 collapse-brand">
                    <a  href="">
                        <img src="/argon/img/brand/blue.png">
                    </a>
                </div>
                <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
            <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fa fa-search"></span>
                    </div>
                </div>
            </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                    <i class="fab fa-laravel" style="color: #f4645f;"></i>
                    <span class="nav-link-text" style="color: #f4645f;">{{ __('Laravel Examples') }}</span>
                </a>

                <div class="collapse show" id="navbar-examples">
                    <ul class="nav nav-sm flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                {{ __('User profile') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                            
                                {{ __('User Management') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                
                    <a class="nav-link" href="">
                    <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="">
                    <a class="nav-link" href="">
                        
                    <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    
                  <i class="ni ni-bullet-list-67 text-default"></i>
                  <span class="nav-link-text">Tables</span>
                </a>
            </li>

            @if(!empty($plan->is_default))
               <li class="nav-item mb-5 mr-4 ml-4 pl-1 bg-danger" style="position: absolute; bottom: 0;">
                    <a class="nav-link text-white" href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        <i class="ni ni-cloud-download-95"></i> Upgrade to PRO
                    </a>
                </li>
            @endif
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Documentation</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
                    <i class="ni ni-spaceship"></i> Getting started
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                    <i class="ni ni-palette"></i> Foundation
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                    <i class="ni ni-ui-04"></i> Components
                </a>
            </li>
        </ul>
    </div>
</div>
</nav>                
    <div class="main-content">
        <!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
<div class="container-fluid">
    <!-- Brand -->
    
    
    <!-- Form -->
    <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex px-8" style="float: left;">
        <div>
        <div class="form-group mb-0" align="top">
            <div class="input-group input-group-alternative" style="width:840px;" >
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Generate Code" type="text" id='store_url'>

                
            </div>
        </div>

        <div class="generate-code" align="bottom" >
            <a class="nav-link pr-0" role="button" aria-haspopup="true" aria-expanded="false" style="padding: 5px margin:  5px; color: #fff" onclick="store_url()">Generate URL Code</a>
        </div>
        </div>
    </form>
    <!-- User -->
    
</div>
</nav>    


<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
@if(!empty(Session::get('message')))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert" style="padding: 10px; margin: -105px 30px 20px 30px;">
        <strong>
            {{ Session::get('message') }}
        </strong>
      </div>
@endif
<div class="container-fluid">
    
    <div class="header-body">
        <!-- Card stats -->
        <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Current Plan</h5>
                                <span class="h2 font-weight-bold mb-0">{{$plan->name}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                            </div>
                        </div>
                        {{-- <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Used URLs</h5>
                                <span class="h2 font-weight-bold mb-0">{{$plan->pivot->used_limit}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                            </div>
                        </div>
                        {{-- <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                            <span class="text-nowrap">Since last week</span>
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Un-used URLS</h5>
                                <span class="h2 font-weight-bold mb-0">{{$plan->pivot->available_limit}}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        {{-- <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                            <span class="text-nowrap">Since yesterday</span>
                        </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            
                            @if(!empty($plan->is_default))
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Upgrade Plan</h5>
                                    {{-- <span class="h2 font-weight-bold mb-0">49,65%</span> --}}
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow" onclick="upgrade()">
                                        <i class="fas fa-angle-double-up" ></i>
                                    </div>
                                </div>
                            @else
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Welcom to Premium Plan</h5>
                                    {{-- <span class="h2 font-weight-bold mb-0">49,65%</span> --}}
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow" onclick="upgrade()">
                                        <i class="fas fa-globe" ></i>
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- <p class="mt-3 mb-0 text-muted text-sm">
                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="">
                    <div class="row align-items-center">
                        {{-- <div class="col-8">
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="" class="btn btn-sm btn-primary">Add user</a>
                        </div> --}}
                    </div>
                </div>
                
                <div class="col-12">
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">URL</th>
                                <th scope="col">CODE</th>
                                <th scope="col">Creation Date</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                        @if(!empty($shortenUrls))
                        @foreach($shortenUrls as $url)
                            <tr data-id = {{$url->id}}>
                                <td class="long_url">
                                    <div class="active" data-value = "{{$url->url}}" data-id= "{{$url->id}}">
                                        <a href="{{$url->url}}" data-value ="{{$url->url}}" >{{$url->url}}</a>
                                    </div>
                                    <div class="edit_url in-active" data-value = "{{$url->url}}" data-id= "{{$url->id}}">
                                        <div class="input-group input-group-alternative">
                                            <input class="form-control" placeholder="Enter URL" type="text" data-id = {{$url->id}}>
                                            <div class="icon icon-shape-success text-white box submit" data-id = {{$url->id}} >
                                            <i class="fas fa-check-circle"></i>

                                            </div>
                                        </div>
                                </td>
                                <td >{{$url->short_url}}</td>
                                <td>{{$url->activated_at}}</td>
                                <td>
                                    @if($url->status == 1)
                                        @php($var='green-circle')
                                    @elseif($url->status == 2)
                                        @php($var='red-circle')
                                    @else
                                        @php($var='gray-circle')
                                    @endif

                                    <div id='{{$var}}'></div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown" data-id = {{$url->id}}>
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" >
                                            <a class="dropdown-item dropdown-edit">Edit</a>
                                            <a class="dropdown-item" onclick="change_status()">Activate / Deactivate</a>
                                            <a class="dropdown-item" onclick="delete_url()">Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
        
    <footer class="footer">
<div class="row align-items-center justify-content-xl-between">
<div class="col-xl-6">
    <div class="copyright text-center text-xl-left text-muted">
        © 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> &amp;
        <a href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">Updivision</a>
    </div>
</div>
<div class="col-xl-6">
    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
        <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
        </li>
        <li class="nav-item">
            <a href="https://www.updivision.com" class="nav-link" target="_blank">Updivision</a>
        </li>
        <li class="nav-item">
            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
        </li>
        <li class="nav-item">
            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
        </li>
        <li class="nav-item">
            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
        </li>
    </ul>
</div>
</div></footer>    </div>
    </div>

    
    <script src="/argon/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    
    <script type="text/javascript">
        let base_url = 'http://testing.test';
        let url_id=null;
        let long_url=null;
        $(document).ready(function(){
            
            $('.text-right .dropdown').on('click', function() {
               url_id = $(this).data("id");
               long_url = $(this).closest('tr').find('.long_url').find('.active').data('value');
            });

            
            $(".text-right .dropdown .dropdown-menu-arrow").find('.dropdown-edit').on('click', function() {
                $(this).closest('tr').find('.long_url').find('.active').removeClass('active').addClass('in-active');
                $(this).closest('tr').find('.long_url').find('.edit_url').addClass('active').removeClass('in-active');
            });
            
            $(".text-right .dropdown .dropdown-menu").closest('tr').find('.long_url').find('div.edit_url').find('.submit').on('click', function() {
                var new_url = $(this).siblings('input').val();
                var selected_url_id = $(this).data('id');
                edit_url(new_url, selected_url_id);
            });
        });

        
        function store_url() {
            $.ajax({
                type: 'POST',
                data: {
                    'url': document.getElementById('store_url').value,
                    '_token': '{{csrf_token()}}'
                },
                url: base_url + '/user/store_url',
                success: function(data){
                    window.location.reload();
                },
                error: function(){
                    
                }
            }); 
        }

        function change_status() {
            $.ajax({
                type: 'POST',
                data: {
                    'url_id': url_id,
                    '_token': '{{csrf_token()}}'
                },
                url: base_url + '/user/update_url_status',
                success: function(data){
                    // window.alert(JSON.parse(data).fail);
                    window.location.reload();
                },
                error: function(){
                    
                }
            }); 
        }

        function delete_url() {
            $.ajax({
                type: 'POST',
                data: {
                    'url_id': url_id,
                    '_token': '{{csrf_token()}}'
                },
                url: base_url + '/user/delete_url',
                success: function(data){
                    window.location.reload();
                },
                error: function(){
                    
                }
            }); 
        }

        function upgrade() {
            $.ajax({
                type: 'POST',
                data: {
                    'user_id': {{$plan->pivot->user_id}},
                    'plan_id': 2,
                    '_token': '{{csrf_token()}}'
                },
                url: base_url + '/user/upgrade_plan',
                success: function(data){
                    window.location.reload();
                },
                error: function(){
                    
                }
            }); 
        }

        function logout() {
            $.ajax({
                type: 'POST',
                data: {
                    '_token': '{{csrf_token()}}'
                },
                url: base_url + '/auth/logout',
                success: function(data){
                    window.location.reload();
                },
                error: function(){
                    
                }
            }); 
        }

    
    function edit_url(new_url, selected_url_id) {
        $.ajax({
            type: 'POST',
            data: {
                'url': new_url,
                'url_id': selected_url_id,
                '_token': '{{csrf_token()}}'
            },
            url: base_url + '/user/edit_url',
            success: function(data){
                window.location.reload();
            },
            error: function(){
                
            }
        }); 
    }


    </script>        
    <!-- Argon JS -->
    <script src="/argon/js/argon.js?v=1.0.0"></script>
</body></html>
