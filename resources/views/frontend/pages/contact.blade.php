@extends('frontend.layouts.master')

@section('title', 'Contact Us - ' . ($settings['general']['site_name'] ?? 'Team Frontline'))

@section('content')


    <div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/installation-bg-1.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="position-relative overflow-hidden space-top mb-5">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title">Our Contact Information</h2>
            </div>
            <div class="row gy-4 justify-content-center">

                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani text-center">
                        <div class="icon mb-3 text-theme fs-1">
                            <i class="fas fa-network-wired"></i>
                        </div>
                        <h3 class="box-title"> IT DIVISION </h3>
                        <p class="box-text">
                            + 91 85929 88890 <br>
                            sales@teamfrontline.com

                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani text-center">
                        <div class="icon mb-3 text-theme fs-1">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3 class="box-title"> POWER DIVISION </h3>
                        <p class="box-text">
                            +91 99460 44888 <br> + 91 85929 88890 <br>
                            sales@teamfrontline.com
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="feature-card th-ani text-center">
                        <div class="icon mb-3 text-theme fs-1">
                            <i class="fas fa-user-headset"></i>
                        </div>
                        <h3 class="box-title"> SUPPORT DIVISION </h3>
                        <p class="box-text">
                            +91 93499 84967 <br>
                            callcentre@teamfrontline.com
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="bg-theme">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-4 cta-item_wrapp">
                    <div class="cta-item bg-title">
                        <h3 class="box-title">Kochi</h3>
                        <p class="text-white text-sm leading-relaxed mb-3">
                            Prashanth Bhavan, Mathangar Rd,<br>
                            Gandhi Nagar, Kadavanthara,<br>
                            Kochi - Kerala - 682 017, INDIA
                        </p>
                        <p class="text-white font-medium">📞 +91 93499 84974</p>
                        <p class="text-white font-medium">✉️ sales@teamfrontline.com</p>
                    </div>
                </div>
                <div class="col-lg-4 cta-item_wrapp bg-body">
                    <div class="cta-item bg-body">
                        <h3 class="box-title">Trivandrum</h3>
                    <p class="text-white text-sm leading-relaxed mb-3">
                        Thiruvananthapuram,<br>
                        Kerala, INDIA
                    </p>
                    <p class="text-white font-medium">📞 +91 85929 88890</p>
                    <p class="text-white font-medium">✉️ sales@teamfrontline.com</p>
                    </div>
                </div>
                <div class="col-lg-4 cta-item_wrapp bg-title">
                    <div class="cta-item bg-title">
                        <h3 class="box-title">Calicut</h3>
                    <p class="text-white text-sm leading-relaxed mb-3">
                        Naduvilayil House, Modakallur,<br>
                        Calicut - Kerala - 673 315, INDIA
                    </p>
                    <p class="text-white font-medium">📞 +91 94469 34967</p>
                    <p class="text-white font-medium">✉️ sales@teamfrontline.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="space-bottom">
        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-7">
                    <form action="" method="POST"
                        class="contact-form2 input-smoke ajax-contact">
                        <h3 class="h2 mt-n3 mb-25">Get In Touch</h3>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Your Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email Address">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" name="number" id="number"
                                    placeholder="Phone Number">
                            </div>
                            <div class="form-group col-md-6">
                                <select name="subject" id="subject" class="form-select nice-select">
                                    <option value="" disabled="disabled" selected="selected" hidden>Select an
                                        Options
                                    </option>
                                    @foreach ($solutions as $solution)
                                        <option value="{{$solution->name}}">{{$solution->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control"
                                    placeholder="Your Message"></textarea>
                            </div>
                            <div class="form-btn col-12">
                                <button class="th-btn fw-btn"><span class="btn-text" data-back="Send Messages"
                                        data-front="Send Messages"></span></button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
                <div class="col-xl-5">
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed/v1/place?q=Team%20Frontline%20Limited.&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('frontend.home.sections.brand-slider')


@endsection
