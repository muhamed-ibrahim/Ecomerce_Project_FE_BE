<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.header')
    <style>
        .gradient-text {
            background-image: linear-gradient(to right, #10B981, #93C5FD);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
    </style>
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
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white text-center">
                        <span class="gradient-text">Show All
                            Product</span>
                    </h1>
                    <div class="d-flex justify-content-center text-center">

                        <div class="card mx-auto w-75 mt-4 overflow-auto">
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-primary alert-dismissible fade show text-left"
                                        role="alert">
                                        {{ Session::get('message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allproduct as $data)
                                            <tr>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ $data->description }}</td>
                                                <td><img style="width: 75px;
                                                    height: 75px;"
                                                        src="{{ Storage::url($data->image) }}">
                                                </td>
                                                <td>{{ $data->quantity }}</td>
                                                <td>{{ $data->price }}</td>
                                                <td>{{ $data->category }}</td>
                                                <td>{{ $data->discount_price }}</td>
                                                <td><a class="btn btn-primary mx-2"
                                                        href="{{ route('dashboard.edit.product', $data->id) }}">Edit</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ route('dashboard.delete.product', $data->id) }}">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach





                                    </tbody>
                                </table>

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
