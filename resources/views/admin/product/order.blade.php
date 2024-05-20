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
                        <span class="gradient-text">All Orders
                        </span>
                    </h1>
                    <form action="{{ route('search.order') }}" method="get">
                        @csrf
                        <div class="text-center mx-auto w-50">
                            <div class="input-group">
                                {{-- <div class="form-outline"> --}}
                                <input type="search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}"
                                    class="form-control text-white" placeholder="Search" name="search" />
                                {{-- </div> --}}
                                <button type="submit" class="btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>



                    <div class="d-flex justify-content-center text-center">

                        <div class="card mx-auto mt-4 overflow-auto">
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
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Product Title</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Delivery Status</th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $data)
                                            <tr>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->phone }}</td>
                                                <td>{{ $data->address }}</td>

                                                <td><img style="width: 75px;
                                                height: 75px;"
                                                        src="{{ Storage::url($data->image) }}">
                                                </td>
                                                <td>{{ $data->product_title }}</td>
                                                <td>{{ $data->quantity }}</td>
                                                <td>{{ $data->price }}</td>
                                                <td>{{ $data->payment_status }}</td>
                                                <td>{{ $data->delivery_status }}</td>
                                                @if ($data->delivery_status != 'delivered')
                                                    <td><a class="btn btn-primary mx-2"
                                                            href="{{ route('delivered.product', $data->id) }}">Delivered</a>
                                                    </td>
                                                @else
                                                    <td class="text-success d-flex" style="padding-top: 43px">
                                                        <span class="mdi mdi-check-circle mx-2"></span>
                                                        <p> successfully</p>
                                                    </td>
                                                @endif

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
