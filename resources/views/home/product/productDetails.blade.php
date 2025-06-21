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
    <div>
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <div class="container mt-5">
        <div class="heading_container heading_center">
            <h2>
                Our <span>product</span>
            </h2>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mx-auto">
                <div class="card my-4">

                    <img class="card-img-top p-3" src="{{ Storage::url($product->image) }}" alt="">
                    <div class="card-body">

                        <h5 class="card-title">
                            Name Of Product : {{ $product->title }}
                        </h5>
                        <p class="card-text">
                            Product Category : {{ $product->category }}
                        </p>
                        <p class="card-text">
                            Product Details : {{ $product->description }}
                        </p>

                        <p class="card-text">
                            Avaliable Quantity : {{ $product->quantity }}
                        </p>

                        <div class="d-flex flex-column">

                            <h6>
                                <div class="text-danger">
                                    Discount : {{ $product->discount_price }}%

                                </div>
                                <div>
                                    Original Price :
                                    <span class="" style="text-decoration: line-through;">
                                        ${{ $product->price }}
                                    </span>
                                </div>




                            </h6>
                            <h6 class="text-danger">
                                Price After Discount :
                                <span>${{ $product->price - ($product->price / 100) * $product->discount_price }}</span>


                            </h6>

                        </div>


                    </div>
                </div>
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
