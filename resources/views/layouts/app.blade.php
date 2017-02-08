<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laced-Up') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/angular.min.js')}}"></script>
    <script src="{{asset('js/maintenance.js')}}"></script>
    <script>
        window.Laced_Up = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body ng-app="angularApp" >
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laced-Up') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @elseif (Auth::check() && Auth::user()->is_admin)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Maintenance<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a data-toggle="modal" href="#modalBrands">
                                            Brands
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="modal" href="#modalCategories">
                                            Categories
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="modal" href="#modalSize">
                                            Sizes
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="modal" href="#modalProduct">
                                            Products
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Welcome, {{ Auth::user()->name }} <span style="color:red">(Administrator)</span>!<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Welcome, {{ Auth::user()->name }}! <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- MODALS -->
    <!-- MODALS -->
    @if (Auth::check() && Auth::user()->is_admin)

    <div ng-controller="brandCtrl" data-init="{{$brand}}" class="modal fade" id="modalBrands" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Brand
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </h5>
          </div>
          <div class="modal-body" style="max-height: 300px;overflow-y: auto;">

            <table>
                <thead>
                    <tr>
                        <th>Brand Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="brand in brands">
                        <td>
                            <label ng-hide="isEdit && num == $index">@{{brand.name}}</label>
                            <input ng-show="isEdit && num == $index" type="text" id="brandEdit@{{$index}}" value="@{{brand.name}}">
                        </td>
                        <td>
                            <button ng-hide="isEdit && num == $index" class="pull-right" ng-click="removeBrand($index)">Remove</button>
                            <button ng-hide="isEdit && num == $index" class="pull-right" ng-click="setEdit(true,$index)">Edit</button>
                            <button ng-show="isEdit && num == $index" class="pull-right" ng-click="updateBrand($index)">Save</span></button>
                            <button ng-show="isEdit && num == $index" class="pull-right" ng-click="setEdit(false,$index)">Cancel</span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <input type="text" name="newBrand" ng-model="newBrand"><button type="button" ng-click="addBrand()" class="btn btn-primary">Add Brand</button>
          </div>
        </div>
      </div>
    </div>

    <div ng-controller="categoriesCtrl" data-init="{{$category}}" class="modal fade" id="modalCategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Categories
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </h5>
          </div>
          <div class="modal-body" style="max-height: 300px;overflow-y: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="category in categories">
                        <td>
                            <label ng-hide="isEdit && num == $index">@{{category.name}}</label>
                            <input ng-show="isEdit && num == $index" type="text" id="categoryEdit@{{$index}}" value="@{{category.name}}">
                        </td>
                        <td>
                            <button ng-hide="isEdit && num == $index" class="pull-right" ng-click="removeCategory($index)">Remove</button>
                            <button ng-hide="isEdit && num == $index" class="pull-right" ng-click="setEdit(true,$index)">Edit</button>
                            <button ng-show="isEdit && num == $index" class="pull-right" ng-click="updateCategory($index)">Save</span></button>
                            <button ng-show="isEdit && num == $index" class="pull-right" ng-click="setEdit(false,$index)">Cancel</span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <input type="text" name="newCategory" ng-model="newCategory"><button type="button" ng-click="addCategory()" class="btn btn-primary">Add Category</button>
          </div>
        </div>
      </div>
    </div>

    <div ng-controller="sizesCtrl" data-init="{{$size}}" class="modal fade" id="modalSize" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sizes
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </h5>
          </div>
          <div class="modal-body" style="max-height: 300px;overflow-y: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Size Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="size in sizes">
                        <td>
                            <label ng-hide="isEdit && num == $index">@{{size.name}}</label>
                            <input ng-show="isEdit && num == $index" type="text" id="sizeEdit@{{$index}}" value="@{{size.name}}">
                        </td>
                        <td>
                            <button ng-hide="isEdit && num == $index" class="pull-right" ng-click="removeSize($index)">Remove</button>
                            <button ng-hide="isEdit && num == $index" class="pull-right" ng-click="setEdit(true,$index)">Edit</button>
                            <button ng-show="isEdit && num == $index" class="pull-right" ng-click="updateSize($index)">Save</span></button>
                            <button ng-show="isEdit && num == $index" class="pull-right" ng-click="setEdit(false,$index)">Cancel</span></button>
                        </td>
                    </tr>
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <input type="text" name="newSize" ng-model="newSize"><button type="button" ng-click="addSize()" class="btn btn-primary">Add Size</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Products</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- MODALS -->
    <!-- MODALS -->
    @endif
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
