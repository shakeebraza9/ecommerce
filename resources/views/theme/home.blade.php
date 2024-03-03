@extends('theme.layout')

@php

@endphp

@section('metatags')
    <title>Erha Wears</title>

@endsection

@section('css')

<style>
   
</style>

@endsection
@section('content')

<div id="page-content">

            <!-- Home Banner slider -->
            <div class="slideshow slideshow-wrapper pb-section">
                <div class="home-slideshow slideshow--large">

                    @foreach ($sliders as $slide)
                        <div class="slide slide1 d-block">
                            <div class="slideimg blur-up lazyload">
                                <img class="blur-up lazyload" 
                                data-src="{{ asset($slide->image ? $slide->image->path : '')}}" 
                                src="{{asset($slide->image ? $slide->image->path : '')}}" 
                                alt="Welcome to Diva" title="Welcome to Diva" />
                                <div class="slideshow__text-wrap slideshow__overlay">
                                    <div class="slideshow__text-content mt-0 center">
                                        <div class="container">
                                            <div class="wrap-caption {{$slide->alignment}}">
                                                <h2 class="h1 mega-title slideshow__title">{{$slide->title}}</h2>
                                                <span class="mega-subtitle slideshow__subtitle">{{$slide->details}}</span>
                                                <a href="{{$slide->link}}" class="btn btn--large">{{$slide->button}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
               
               
                </div>
            </div>
            <!-- End Home Banner slider -->

        <!-- Collection -->
        <div class="collection-box tle-bold section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Shop By Category</h2>
                            <p>Browse the collection of our best selling and top interesting products. <br/> You'll definitely find what you are looking for.</p>
                        </div>
                    </div>
                </div>
                <div class="row collection-grids">
                    @foreach ($categories as $collect)
                        <div class="col-12 col-sm-6 col-md-4 item">
                            <div class="collection-grid-item">
                                <img class="blur-up lazyload" 
                                data-src="{{asset($collect->image? $collect->image->path : '')}}" 
                                src="{{asset($collect->image? $collect->image->path : '')}}" />
                                <a href="{{URL::to('/shop')}}" class="collection-grid-item__title-wrapper">
                                    <div class="title-wrapper">
                                        <h3 class="collection-grid-item__title fw-bold">
                                            {{$collect->title}}</h3>
                                        <span class="btn btn--secondary border-btn-1">Shop Now</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- End Collection -->

         <!-- Parallax Section -->
         <div class="section hero-background">
            <div class="hero hero--large bg-size background-parallax" data-stellar-background-ratio="0.08" data-stellar-vertical-offset="0">
                <img class="bg-img blur-up" src="{{asset('theme/assets/images/parallax-banners/home3-parallax-banner.jpg')}}" alt="image" />
                <div class="hero__inner">
                    <div class="container">
                        <div class="wrap-text center text-medium font-bold">
                            <span>Lookbook</span>
                            <h2 class="h1 mega-title text-black">Spring summer 2018</h2>
                            <div class="rte-setting mega-subtitle text-black">We enjoy working on the Services & Products. we provide as much as you need them. This help us in delivering your Goals easily. Browse through the wide range of services we provide.</div>
                            <a href="shop-left-sidebar.html" class="btn border-btn-2">Get Your set Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Parallax Section -->



        <!-- Let's Get Personal -->
        <div class="product-rows section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Let’s Get Personal</h2>
                            <p>Our favorite pieces handpicked for you.</p>
                        </div>
                    </div>
                </div>

                <!-- Grid Product -->
                <div class="grid-products grid--view-items ">
                    <div class="row">
                        @foreach ($products as $product)
                         <?php 
                            $thumb = $product->get_thumbnail() ? asset($product->get_thumbnail()->path) : '';
                            $img_hover = $product->get_hover_image() ? asset($product->get_hover_image()->path) : '';
                         ?>
                        
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                            <div class="product-image">
                                <a href="{{URL::to('/products')}}/{{$product->slug}}">
                                    
                                    <img class="primary blur-up lazyload" 
                                    data-src="{{$thumb}}"
                                    src="{{$thumb}}" 
                                    alt="image" 
                                    title="product" />

                                    <img class="hover blur-up lazyload" 
                                    data-src="{{$img_hover}}" 
                                    src="{{$img_hover}}" 
                                    alt="image" 
                                    title="product" />
                                    
                                    @if($product->is_popular)
                                    <div class="product-labels"><span class="lbl pr-label3">Popular</span></div>
                                    @endif
                                </a>
                            </div>
                            <!-- End Product Image -->

                            <!-- Product Details -->
                            <div class="product-details text-center">
                                <div class="product-name">
                                    <a href="{{URL::to('/products')}}/{{$product->slug}}">{{$product->title}}</a>
                                </div>
                                <div class="product-price">
                                    <span class="old-price">${{$product->selling_price}}</span>
                                    <span class="price">${{$product->price}}</span>
                                </div>
                                <div class="product-review">
                                    <i class="an an-star"></i>
                                    <i class="an an-star"></i>
                                    <i class="an an-star"></i>
                                    <i class="an an-star"></i>
                                    <i class="an an-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End Let's Get Personal -->



   

    

   




   
     <!-- Instagram -->
     <div class="d-none section home-instagram no-pb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">POPULAR BRANDS</h2>
                        <p>Phasellus lorem malesuada ligula pulvinar commodo maecenas suscipit auctom.</p>
                    </div>
                </div>
            </div>

            <!-- Instagram Slider -->
            <div class="instagram-section instagram-slider">
                @foreach($brands as $brand)
                    <div class="instagram-item">
                        <a href="#">
                            <img class="blur-up lazyload" 
                              src="{{asset('theme/'.$brand->image)}}" 
                              data-src="{{asset('theme/'.$brand->image)}}" 
                              alt="image" 
                              title="" />
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="followus text-center mt-3 d-none">
                <a href="#" target="_blank" class="btn">View Gallery</a>
            </div>
        </div>
    </div>
    <!-- End Instagram -->


    <!-- Store Feature -->
    <div class="d-none store-feature style3 mt-2 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-3 mb-md-0">
                    <div class="store-info px-3 py-3 text-center">
                        <div class="icons mb-3"><i class="icon an an-truck"></i></div>
                        <div class="store-info-text">
                            <h5 class="text-dark" >Free Worldwide Shipping</h5>
                            <span class="sub-text">Free shipping on all US orders</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-3 mb-md-0">
                    <div class="store-info px-3 py-3 text-center">
                        <div class="icons mb-3"><i class="icon an an-money-bill-alt"></i></div>
                        <div class="store-info-text">
                            <h5 class="text-dark">Money Guarantee</h5>
                            <span class="sub-text">30 days money back guarantee</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-3 mb-md-0">
                    <div class="store-info px-3 py-3 text-center">
                        <div class="icons mb-3"><i class="icon an an-question-circle"></i></div>
                        <div class="store-info-text">
                            <h5 class="text-dark">Top Notch Support</h5>
                            <span class="sub-text">We support online 24/7 on day</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-3 mb-3 mb-md-0">
                    <div class="store-info px-3 py-3 text-center">
                        <div class="icons mb-3"><i class="icon an an-lock"></i></div>
                        <div class="store-info-text">
                            <h5>Secure Payments</h5>
                            <span class="sub-text">All payment are Secured, trusted.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Store Feature -->




</div>
@endsection
