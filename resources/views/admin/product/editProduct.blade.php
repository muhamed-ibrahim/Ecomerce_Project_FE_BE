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
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1 class="mb-4 text-2xl font-extrabold text-gray-900 dark:text-white text-center">
                        <span class="gradient-text">Edit
                            Product</span>
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
                                <form action="{{ route('update.product', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">

                                        <div class="form-group col-md-6 ">
                                            <label for="Title">Title</label>
                                            <input type="text" class="form-control text-dark bg-white" id="Title"
                                                aria-describedby="emailHelp" placeholder="Enter Title" name="title"
                                                value="{{ $product->title }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Description">Description</label>
                                            <input type="text" class="form-control text-dark bg-white"
                                                id="Description" aria-describedby="emailHelp"
                                                placeholder="Enter Description" name="description"
                                                value="{{ $product->description }}" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="Image">Image</label>
                                            <img class="d-block mb-2"
                                                style="width: 55px;
                                            height: 55px;"
                                                src="{{ Storage::url($product->image) }}">
                                            <input type="file" class="form-control text-dark bg-white" id="Image"
                                                aria-describedby="emailHelp" placeholder="Enter Image" name="image">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="quantity">Quantity</label>
                                            <input type="text" class="form-control text-dark bg-white" id="quantity"
                                                aria-describedby="emailHelp" placeholder="Enter Quantity"
                                                name="quantity" value="{{ $product->quantity }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Price">Price</label>
                                            <input type="text" class="form-control text-dark bg-white" id="Price"
                                                aria-describedby="emailHelp" placeholder="Enter Price" name="price"
                                                value="{{ $product->price }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="Category">Category</label>
                                            <select id="Category" class="form-control text-dark bg-white"
                                                name="category">
                                                @foreach ($allcategory as $data)
                                                    @if ($product->category == $data->category_name)
                                                        <option value="{{ $data->category_name }}" selected>
                                                            {{ $data->category_name }}</option>
                                                    @else
                                                        <option value="{{ $data->category_name }}">
                                                            {{ $data->category_name }}</option>
                                                    @endif
                                                @endforeach


                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="discount">Discount</label>
                                            <input type="text" class="form-control text-dark bg-white" id="discount"
                                                aria-describedby="emailHelp" placeholder="Enter Discount if you want"
                                                name="discount_price" value="{{ $product->discount_price }}">
                                        </div>
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
