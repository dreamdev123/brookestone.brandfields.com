@extends('layouts.marketing')


@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/style_new.css') }}" rel="stylesheet">
<link href="{{ asset('css/test.css') }}" rel="stylesheet">
@endsection


@section('PAGE_LEVEL_SCRIPTS')
@endsection


@section('PAGE_START')
@endsection


@section('PAGE_END')
@endsection


@section('content')

    @include('sections.test')
    @include('sections.approach')

    <div class="container" style="padding: 0 0 100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-0">
                    <div class="col-12 text-center">
                        <h2 class="box-head text-uppercase mb-5">Our Teams</h2>
                    </div>
                </div>
            </div>
        </div>
                
        <div class="row">
            <div class="column">
                <div class="team-1">
                    <div class="team-img">
                        <img src="{{ asset('images/profile/team-2-5.jpg') }}" alt="Team Image">
                    </div>
                    <div class="team-content">
                        <h2>Guo Yanyan</h2>
                        <h3>Senior Frontend Engineer</h3>
                        <p>11+ years of hands-on experience in all leading frontend stacks, especially React.js, Typescript and Vue.js</p>
                        <h4>guo.yanyan@brandfields.com</h4>
                        <div class="team-social">
                            <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                            <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                            <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="team-1">
                    <div class="team-img">
                        <img src="{{ asset('images/profile/team-2-2.jpg') }}" alt="Team Image">
                    </div>
                    <div class="team-content">
                        <h2>David Qu</h2>
                        <h3>iOS Mobile Developer</h3>
                        <p>Developed 36 iOS apps to the App Store for startups and mid companies. Experienced in Android as well.</p>
                        <h4>david.qu@brandfields.com</h4>
                        <div class="team-social">
                            <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                            <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                            <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="team-1">
                    <div class="team-img">
                        <img src="{{ asset('images/profile/team-2-3.jpg') }}" alt="Team Image">
                    </div>
                    <div class="team-content">
                        <h2>Guobin Yu</h2>
                        <h3>Full-stack Developer</h3>
                        <p>Yu has 8+ years of full-stack development in industries such as e-Commerce, B2B, B2C, Blockchain, etc.</p>
                        <h4>yu.guobin@brandfields.com</h4>
                        <div class="team-social">
                            <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                            <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                            <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="team-1">
                    <div class="team-img">
                        <img src="{{ asset('images/profile/team-2-4.jpg') }}" alt="Team Image">
                    </div>
                    <div class="team-content">
                        <h2>Jennifer Loris</h2>
                        <h3>Web Designer</h3>
                        <p>Very skillful in creating web graphic designs for websites, mobile apps, icons in Figma, Adobe XD, Adobe CS, etc.</p>
                        <h4>jennifer.loris@brandfields.com</h4>
                        <div class="team-social">
                            <a class="social-tw" href=""><i class="fab fa-twitter"></i></a>
                            <a class="social-fb" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="social-li" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="social-in" href=""><i class="fab fa-instagram"></i></a>
                            <a class="social-yt" href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    @include('sections.participate')

@endsection