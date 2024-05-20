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
                            Category</span>
                    </h1>
                    <div class="d-flex justify-content-center text-center">
                        <div class="card  mt-4">
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        {{ Session::get('message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                @endif
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allCategory as $data)
                                            <tr>
                                                <td>{{ $data->id }}</td>
                                                <td>{{ $data->category_name }}</td>
                                                <td><a class="btn btn-primary mx-3"
                                                        href="{{ route('edit.category', $data->id) }}">Edit</a>
                                                    {{-- <form
                                                        method="DELETE">
                                                        @csrf --}}
                                                    <a class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')"
                                                        href="{{ route('delete.category', $data->id) }}">Delete</a>

                                                    {{-- </form> --}}
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
