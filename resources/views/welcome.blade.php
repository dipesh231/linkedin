@extends('frontend.master')

@section('content')

<div id="main">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                @foreach ($banner as $bannerItem)
                <div style="position: relative;">
                    <img src="{{ asset('uploads/' . $bannerItem->banner_image) }}" alt="{{ $bannerItem->banner_title }}" style="width: 100%; height: 800px;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                        <h2 style="color: white; font-size: 25px;">Now Hiring!</h2>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>

    <br>
    <br>

    <div class="inner">
        <!-- About Us -->
        <header id="inner">
            <h1>Find your perfect job!</h1>
            <p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>
        </header>

        <br>

        <h2 class="h2">Featured Jobs</h2>

        <!-- Jobs -->
        <section class="tiles">
        @foreach($job as $item)
            <article class="style1">
                <span class="image">
                    <img src="{{asset('frontend/images/product-1-720x480.jpg')}}" alt="" />
                </span>
                <a href="job-details.html">
                    <h2>{{$item->name}}</h2>
                    <h5>{{$item->description}}</h5>
                    
                    <p><strong>{{@$item->getJobCategory->name}}</strong></p>

                    <p>
                        <i class="fa fa-calendar"></i> 15-06-2020 &nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="fa fa-people"></i> {{$item->total_seats}} &nbsp;&nbsp;&nbsp;&nbsp;
                        <i class="fa fa-map-marker"></i> London
                    </p>
                </a>
            </article>
            @endforeach
        </section>

        <p class="text-center"><a href="jobs.html">View Jobs &nbsp;<i class="fa fa-long-arrow-right"></i></a></p>
        
        <br>

        <h2 class="h2">Testimonials</h2>
        
        <div class="row">
            <div class="col-sm-6 text-center">
                <p class="m-n"><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt delectus mollitia, debitis architecto recusandae? Quidem ipsa, quo, labore minima enim similique, delectus ullam non laboriosam laborum distinctio repellat quas deserunt voluptas reprehenderit dignissimos voluptatum deleniti saepe. Facere expedita autem quos."</em></p>

                <p><strong> - John Doe</strong></p>
            </div>

            <div class="col-sm-6 text-center">
                <p class="m-n"><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt delectus mollitia, debitis architecto recusandae? Quidem ipsa, quo, labore minima enim similique, delectus ullam non laboriosam laborum distinctio repellat quas deserunt voluptas reprehenderit dignissimos voluptatum deleniti saepe. Facere expedita autem quos."</em></p>

                <p><strong>- John Doe</strong> </p>
            </div>
        </div>

        <p class="text-center"><a href="testimonials.html">Read More &nbsp;<i class="fa fa-long-arrow-right"></i></a></p>

        <br>

        <h2 class="h2">Blog</h2>
        
        <div class="row">
            <div class="col-sm-4 text-center">
                <img src="{{asset('frontend/images/blog-1-720x480.jpg')}}" class="img-fluid" alt="" />

                <h2 class="m-n"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h2>

                <p> John Doe &nbsp;|&nbsp; 12/06/2020 10:30</p>
            </div>

            <div class="col-sm-4 text-center">
                <img src="{{asset('frontend/images/blog-2-720x480.jpg')}}" class="img-fluid" alt="" />

                <h2 class="m-n"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h2>

                <p> John Doe &nbsp;|&nbsp; 12/06/2020 10:30</p>
            </div>

            <div class="col-sm-4 text-center">
                <img src="{{asset('frontend/images/blog-3-720x480.jpg')}}" class="img-fluid" alt="" />

                <h2 class="m-n"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h2>

                <p> John Doe &nbsp;|&nbsp; 12/06/2020 10:30</p>
            </div>
        </div>

        <p class="text-center"><a href="blog.html">Read More &nbsp;<i class="fa fa-long-arrow-right"></i></a></p>

        
    </div>
</div>
@endsection

