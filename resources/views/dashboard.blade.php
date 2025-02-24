<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid"  style="background-color: #15202B;min-height:100vh">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar" style="background-color: #192734;min-height:100vh">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column"  style="background-color: #22303C;border-radius: 5%">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/items">Items</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/customers">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/categories">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/delivery_employees">Delivery Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/orders">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/shipping_deps">Shipping Department</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/suppliers">Suppliers</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="height: auto">
                @yield('content') <!-- This will be replaced by the content of each route -->
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>