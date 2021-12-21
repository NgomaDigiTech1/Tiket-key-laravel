@extends('layouts.other')

@section('content')
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Contact Us Page</h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb text-center">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nous contactez</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>

    <section class="contact mt-lg-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div id="contact-form" class="contact-form">
                        <form method="post" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Name:</label>
                                    <input
                                        type="text"
                                        name="full_name"
                                        class="form-control @error('full_name') is-invalid @enderror"
                                        placeholder="Enter full name"
                                        required=""
                                        value="{{ old('full_name') }}"
                                        aria-required="true">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Email:</label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="abc@xyz.com"
                                        required=""
                                        value="{{ old('email') }}"
                                        aria-required="true">
                                </div>
                                <div class="form-group col-lg-6 col-left-padding">
                                    <label>Phone Number:</label>
                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="XXXX-XXXXXX"
                                        required=""
                                        value="{{ old('phone') }}"
                                        aria-required="true">
                                </div>
                                <div class="textarea col-lg-12">
                                    <label>Message:</label>
                                    <textarea
                                        name="comments"
                                        placeholder="Enter a message"
                                        required=""
                                        aria-required="true"
                                        class="@error('comments') is-invalid @enderror"
                                    >{{ old('comments') }}</textarea>
                                </div>
                                <div class="col-lg-12">
                                    <div class="comment-btn">
                                        <button type="submit" class="btn-blue btn-red">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-about footer-margin">
                        <div class="logo">
                            <img src="{{ asset('assets/admins/images/logo.png') }}" alt="Image">
                        </div>
                        <h4>Travel With Us</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                        <div class="contact-location">
                            <ul>
                                <li><i class="flaticon-maps-and-flags" aria-hidden="true"></i> Location</li>
                                <li><i class="flaticon-phone-call"></i> (012)-345-6789</li>
                                <li><i class="flaticon-mail"></i> <a href="https://htmldesigntemplates.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="90e4ffe5e2fee4e2f1e6f5fcd0e4f5e3e4fdf1f9fcbef3fffd">[email&nbsp;protected]</a></li>
                            </ul>
                        </div>
                        <div class="footer-social-links">
                            <ul>
                                <li class="social-icon"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li class="social-icon"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li class="social-icon"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li class="social-icon"><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                <li class="social-icon"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
