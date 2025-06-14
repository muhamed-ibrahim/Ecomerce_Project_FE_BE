<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">

            @if ($product->isEmpty())
                <div class="col-12 text-center">
                    <h4>No products found.</h4>
                </div>
            @else
                @foreach ($product as $data)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <div class="box">
                            <div class="option_container">
                                <div class="options">
                                    <a href="{{ route('product.details', $data->id) }}" class="option1"
                                        style="width: 180px;">
                                        Product Details
                                    </a>

                                    @if ($data->quantity > 0)
                                        <form action="{{ route('product.addCart', $data->id) }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3 rounded" style="width: 180px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn option2" type="submit">Add To Cart</button>
                                                </div>
                                                <input type="number" class="form-control" min="1"
                                                    max="{{ $data->quantity }}" value="1" name="quantity"
                                                    aria-label="" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    @else
                                        <div class="text-danger text-center font-weight-bold"
                                            style="width: 180px; margin-top: 10px;">
                                            Out of Stock
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="img-box">
                                <img src="{{ Storage::url($data->image) }}" alt="">
                            </div>

                            <div class="detail-box">
                                <h5 class="d-flex justify-content-end align-items-end">
                                    {{ $data->title }}
                                </h5>

                                <div class="d-flex flex-column">
                                    @if (!empty($data->discount_price))
                                        <h6>
                                            <div class="text-danger">
                                                {{ $data->discount_price }}%
                                            </div>
                                            <div style="text-decoration: line-through;">
                                                ${{ $data->price }}
                                            </div>
                                        </h6>
                                        <h6 class="text-danger">
                                            ${{ $data->price - ($data->price / 100) * $data->discount_price }}
                                        </h6>
                                    @else
                                        <h6 class="text-danger" style="padding-top: 55px">
                                            ${{ $data->price }}
                                        </h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            @endif


            {{-- <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p2.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $80
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p3.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $68
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p4.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $70
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p5.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $75
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p6.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $58
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p7.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $80
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p8.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p9.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p10.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p11.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      Add To Cart
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="images/p12.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Women's Dress
                   </h5>
                   <h6>
                      $65
                   </h6>
                </div>
             </div>
          </div> --}}
        </div>
        {{-- <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div> --}}
</section>
