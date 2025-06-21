<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
            {{-- @include('admin.body') --}}
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white text-center">
                        <span class="gradient-text">Edit
                            Category</span>
                    </h1>
                    <div class="d-flex justify-content-center">

                        <div class="card mx-auto w-75 mt-4">
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        {{ Session::get('message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                @endif
                                <form action="{{ route('dashboard.update.category',$category->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category_name">Name</label>
                                        <input type="text" class="form-control text-dark bg-white" id="category_name"
                                             placeholder="Enter Category Name"
                                            name="category_name" value="{{$category->category_name}}">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
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
