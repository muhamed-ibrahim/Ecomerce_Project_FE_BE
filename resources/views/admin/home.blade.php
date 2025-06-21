<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.siderbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')

            <!-- partial -->
            {{-- @include('admin.body') --}}
            <div class="main-panel">
                <div class="content-wrapper">
                    <h2 class="mb-4 font-weight-bold text-dark">Dashboard Overview</h2>

                    <div class="row">
                        <!-- Category Count -->
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card text-white shadow-sm"
                                style="background: linear-gradient(135deg, #007bff, #0056b3); border: none; border-radius: 1rem;">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="card-title">Categories</h5>
                                        <p class="card-text mb-0">Total: {{ $categoryCount }}</p>
                                    </div>
                                    <i class="fa fa-tags fa-2x"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Product Count -->
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card text-white shadow-sm"
                                style="background: linear-gradient(135deg, #28a745, #1e7e34); border: none; border-radius: 1rem;">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="card-title">Products</h5>
                                        <p class="card-text mb-0">Total: {{ $productCount }}</p>
                                    </div>
                                    <i class="fa fa-cube fa-2x"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Orders Count -->
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card text-white shadow-sm"
                                style="background: linear-gradient(135deg, #ffc107, #d39e00); border: none; border-radius: 1rem;">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="card-title">Orders</h5>
                                        <p class="card-text mb-0">Total: {{ $orderCount }}</p>
                                    </div>
                                    <i class="fa fa-shopping-cart fa-2x"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Users Count -->
                        <div class="col-md-3 stretch-card grid-margin">
                            <div class="card text-white shadow-sm"
                                style="background: linear-gradient(135deg, #dc3545, #bd2130); border: none; border-radius: 1rem;">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h5 class="card-title">Users</h5>
                                        <p class="card-text mb-0">Total: {{ $userCount }}</p>
                                    </div>
                                    <i class="fa fa-users fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
</body>

</html>
