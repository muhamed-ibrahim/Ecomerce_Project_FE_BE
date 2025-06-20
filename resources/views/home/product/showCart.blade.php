<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion & More Online</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />

</head>

<body>
    <div class="">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>

    <div class="container my-5">
        <div class="heading_container heading_center">
            <h2>
                Your <span>Cart</span>
            </h2>
        </div>
        <div class="text-center">

            <div class="card mx-auto mt-4 overflow-auto col-lg-8">
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-primary alert-dismissible fade show text-left" role="alert">
                            {{ Session::get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                    @endif

                    @if (Session::has('warning'))
                        <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
                            {{ Session::get('warning') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                    @endif
                    <?php $sum = 0; ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product Title</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @if ($CartOfUser->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center" style="padding: 30px;">
                                        <strong>Your cart is empty.</strong>
                                    </td>
                                </tr>
                            @else
                                @foreach ($CartOfUser as $data)
                                    <tr>
                                        <td style="padding: 30px 0%">{{ $data->product_title }}</td>
                                        <td style="padding: 30px 0%">{{ $data->quantity }}</td>
                                        <td style="padding: 30px 0%">{{ $data->price }}</td>
                                        <td>
                                            <img style="width: 75px; height: 75px; border-radius: 50%"
                                                src="{{ Storage::url($data->image) }}" alt="">
                                        </td>
                                        <td style="padding: 25px 1%">
                                            <a href="{{ route('product.removeCart', $data->id) }}"
                                                class="btn btn-danger">Remove</a>
                                        </td>
                                    </tr>
                                    @php
                                        $sum += $data->price;
                                    @endphp
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="my-5">
                <h5>Proceed To Order</h5>
                <a class="btn btn-primary my-3 mx-2" href="{{ route('product.cashOrder') }}">Cash On Delivery</a>
                <a class="btn btn-primary my-3 mx-2" href="{{ route('product.Card', $sum) }}">Pay Using Card</a>
            </div>
        </div>

    </div>



    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>
