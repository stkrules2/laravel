<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Kabab House</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,500,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/image-uploader.min.css') }}">
</head>

<body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <a class="navbar-brand" href="/admin">
                <img src="{{ URL::to('img/logo/kabab-house-logo-org.png') }}" width="100" alt="">
            </a>
            <div class="list-group list-group-flush">
                <a href="/admin" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="/admin/menu" class="list-group-item list-group-item-action bg-light">Restaurant Menu</a>
                <a href="/admin/banner" class="list-group-item list-group-item-action bg-light">Banner Images</a>
                <a href="/admin/history" class="list-group-item list-group-item-action bg-light">History Tab</a>
                <a href="/admin/promotion" class="list-group-item list-group-item-action bg-light">Promotion Images</a>
                <a href="/admin/users" class="list-group-item list-group-item-action bg-light">Users</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></button>




                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown"
                            aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/admin/profile">Profile</a>
                            <a class="dropdown-item" href="#">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                </ul>

            </nav>

            @yield('content')
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ URL::to('js/image-uploader.min.js') }}"></script>
    <script src="{{ URL::to('js/adminScript.js') }}"></script>



</body>

</html>