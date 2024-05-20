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
            {{-- @include('admin.body') --}}
            <div class="main-panel">
                <div class="content-wrapper">
                    {{-- <h1
                        class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white md:text-4xl lg:text-5xl text-center">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Add
                            Category</span>
                    </h1>

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
                            <form action="{{ route('add.category') }}" method="POST">
                                @csrf
                                <div class="grid gap-1 mb-3 md:grid-cols-0">
                                    <label for="email"
                                        class="block text-sm font-medium text-white-900 dark:text-white">Name
                                    </label>
                                    <input type="text" id="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Enter Category Name" name="category_name" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Add</button>
                                </div>
                            </form>
                        </div>
                    </div> --}}

                    <h1 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white text-center">
                        <span class="gradient-text">Add
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
                                <form action="{{ route('add.category') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category_name">Name</label>
                                        <input type="text" class="form-control text-dark bg-white" id="category_name"
                                            aria-describedby="emailHelp" placeholder="Enter Category Name"
                                            name="category_name" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Add</button>
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
