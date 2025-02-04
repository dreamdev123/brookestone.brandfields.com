@extends('layouts.panel')

@section('title', __('- DASHBOARD'))

@section('content')
<div class="main-bg d-flex align-items-center">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="{{ route('profile') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background: new 0 0 172 172;" xml:space="preserve">
                                <path id="XMLID_1633_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12c-16.84,0-30.49-13.65-30.49-30.49V31.12
                                    c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                                <path fill="#FFFFFF" d="M98.09,85.38c7.5-4.24,12.57-12.28,12.57-21.48c0-13.6-11.06-24.66-24.66-24.66
                                    c-13.6,0-24.66,11.06-24.66,24.66c0,9.21,5.07,17.25,12.57,21.48c-17.3,5.21-29.95,21.28-29.95,40.26c0,1.37,1.11,2.48,2.48,2.48
                                    h79.12c1.37,0,2.48-1.11,2.48-2.48C128.04,106.66,115.4,90.59,98.09,85.38z"/>
                            </svg>
                        </a>
                        <span>PROFILE</span>
                    </div>
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="{{ route('participation') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background:new 0 0 172 172;" xml:space="preserve">
                            <path id="XMLID_00000132802223055085960810000000873597871773167518_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12
                                c-16.84,0-30.49-13.65-30.49-30.49V31.12c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76
                                C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                            <g>
                                <g>
                                    <path fill="#FFFFFF" d="M50.87,129.8l14.84-5.4c2.16-0.79,4.16-2.06,5.77-3.68L121.3,70.9l-19.63-19.63l-49.82,49.82
                                        c-1.62,1.62-2.9,3.62-3.68,5.78l-5.4,14.84C39.22,130.73,41.3,133.28,50.87,129.8z"/>
                                </g>
                                <g>
                                    <path fill="#FFFFFF" d="M128.09,49.53l-5.05-5.05c-1.99-2-4.9-2.99-7.87-2.71c-2.84,0.26-5.58,1.58-7.72,3.72l-1.3,1.3l19.63,19.63
                                        l1.31-1.31c2.14-2.14,3.46-4.88,3.72-7.72C131.08,54.39,130.09,51.52,128.09,49.53z"/>
                                </g>
                            </g>
                            </svg>
                        </a>
                        <span>PARTICIPATION</span>
                    </div>
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="{{ route('portfolio') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background:new 0 0 172 172;" xml:space="preserve">
                            <path id="XMLID_00000044885356501483545040000011812339157127921855_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12
                                c-16.84,0-30.49-13.65-30.49-30.49V31.12c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76
                                C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                            <path fill="#FFFFFF" opacity="0.5" d="M113.44,112.78c-0.89,0-1.62-0.73-1.62-1.62v-6.2h-5.86c-0.89,0-1.62-0.73-1.62-1.62V73.22
                                c0-0.89,0.73-1.62,1.62-1.62h5.86v-6.65c0-0.89,0.73-1.62,1.62-1.62h2.21c0.89,0,1.62,0.73,1.62,1.62v6.65h5.86
                                c0.89,0,1.62,0.73,1.62,1.62v30.12c0,0.89-0.73,1.62-1.62,1.62h-5.86v6.2c0,0.89-0.73,1.62-1.62,1.62H113.44z"/>
                            <path fill="#FFFFFF" d="M84.38,136.4c-0.89,0-1.62-0.73-1.62-1.62v-10.63H76.9c-0.89,0-1.62-0.73-1.62-1.62V53.15
                                c0-0.89,0.73-1.62,1.62-1.62h5.86V38.24c0-0.89,0.73-1.62,1.62-1.62h2.21c0.89,0,1.62,0.73,1.62,1.62v13.29h5.86
                                c0.89,0,1.62,0.73,1.62,1.62v69.38c0,0.89-0.73,1.62-1.62,1.62h-5.86v10.63c0,0.89-0.73,1.62-1.62,1.62H84.38z"/>
                            <path fill="#FFFFFF" opacity="0.5" d="M55.33,119.28c-0.89,0-1.62-0.73-1.62-1.62v-12.7h-5.86c-0.89,0-1.62-0.73-1.62-1.62V73.22
                                c0-0.89,0.73-1.62,1.62-1.62h5.86V60.97c0-0.89,0.73-1.62,1.62-1.62h2.21c0.89,0,1.62,0.73,1.62,1.62V71.6h5.86
                                c0.89,0,1.62,0.73,1.62,1.62v30.12c0,0.89-0.73,1.62-1.62,1.62h-5.86v12.7c0,0.89-0.73,1.62-1.62,1.62H55.33z"/>
                            </svg>
                        </a>
                        <span>PORTFOLIO</span>
                    </div>
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="{{ route('referrals') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background:new 0 0 172 172;" xml:space="preserve">
                            <path id="XMLID_00000155144256151913784890000017069972463023457936_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12
                                c-16.84,0-30.49-13.65-30.49-30.49V31.12c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76
                                C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                            <path fill="#FFFFFF" opacity="0.5" d="M115.59,84.99c5.78-3.27,9.7-9.47,9.7-16.58c0-10.49-8.54-19.03-19.03-19.03c-10.49,0-19.03,8.54-19.03,19.03
                                c0,7.1,3.92,13.31,9.7,16.58C92.9,86.21,89.2,88.19,86,90.76c-3.2-2.57-6.9-4.55-10.93-5.76c5.78-3.27,9.7-9.47,9.7-16.58
                                c0-10.49-8.54-19.03-19.03-19.03c-10.49,0-19.03,8.54-19.03,19.03c0,7.1,3.92,13.31,9.7,16.58c-13.35,4.02-23.11,16.42-23.11,31.06
                                c0,1.06,0.86,1.91,1.91,1.91h40.52h20.52h40.52c1.06,0,1.91-0.86,1.91-1.91C138.7,101.42,128.95,89.01,115.59,84.99z"/>
                            <path fill="#FFFFFF" d="M96.37,85.14c6.43-3.63,10.78-10.52,10.78-18.42c0-11.66-9.49-21.15-21.15-21.15
                                c-11.66,0-21.15,9.49-21.15,21.15c0,7.89,4.35,14.79,10.78,18.42c-14.83,4.47-25.67,18.25-25.67,34.52c0,1.17,0.95,2.13,2.13,2.13
                                h67.83c1.17,0,2.13-0.95,2.13-2.13C122.04,103.39,111.2,89.61,96.37,85.14z"/>
                            </svg>
                        </a>
                        <span>REFERRALS</span>
                    </div>
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="{{ route('commissions') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background:new 0 0 172 172;" xml:space="preserve">
                            <path id="XMLID_00000051342537705866687660000006943342174937817763_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12
                                c-16.84,0-30.49-13.65-30.49-30.49V31.12c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76
                                C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                            <g>
                                <path id="XMLID_2926_" fill="#FFFFFF" d="M120.79,82.42h-5.09c-3.2,0-5.8,2.6-5.8,5.8v7.33c0,3.2,2.6,5.8,5.8,5.8h5.09h11.61v16.34
                                    c0,4.89-3.96,8.86-8.86,8.86H48.45c-4.89,0-8.86-3.96-8.86-8.86V57.23h83.95c4.89,0,8.86,3.96,8.86,8.86v16.34H120.79z"/>
                                <path id="XMLID_2925_" fill="#FFFFFF" opacity="0.5" d="M39.6,57.23l55.15-16.06c5.65-1.65,11.31,2.59,11.31,8.48v7.58H39.6z"/>
                                <circle id="XMLID_2924_" fill="#FFFFFF" opacity="0.5" cx="120.08" cy="91.89" r="4.82"/>
                            </g>
                            </svg>
                        </a>
                        <span>COMMISSIONS</span>
                    </div>
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="{{ route('news') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background:new 0 0 172 172;" xml:space="preserve">
                            <path id="XMLID_00000134960926567481684650000003276686612674392508_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12
                                c-16.84,0-30.49-13.65-30.49-30.49V31.12c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76
                                C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                            <path id="Mail" fill="#FFFFFF" d="M120.99,52.47H51.01c-6.43,0-11.66,5.23-11.66,11.66v43.74c0,6.43,5.23,11.66,11.66,11.66h69.98
                                c6.43,0,11.66-5.23,11.66-11.66V64.13C132.66,57.7,127.42,52.47,120.99,52.47z M119.92,72.22L87.85,98.46
                                c-0.54,0.44-1.19,0.66-1.85,0.66s-1.31-0.22-1.85-0.66L52.08,72.22c-1.25-1.02-1.43-2.86-0.41-4.1c1.02-1.25,2.85-1.43,4.1-0.41
                                L86,92.44l30.23-24.73c1.25-1.02,3.08-0.84,4.1,0.41C121.35,69.36,121.17,71.2,119.92,72.22z"/>
                            </svg>
                        </a>
                        <span>NEWS</span>
                    </div>
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="{{ route('downloads') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background:new 0 0 172 172;" xml:space="preserve">
                            <path id="XMLID_00000068641971516085445580000008097082221190972085_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12
                                c-16.84,0-30.49-13.65-30.49-30.49V31.12c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76
                                C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                            <path fill="#FFFFFF" d="M128.42,91.2c-0.06,0-0.11,0.02-0.16,0.02c1.01-2.34,1.58-4.92,1.58-7.63c0-10.63-8.62-19.25-19.25-19.25
                                c-3.76,0-7.25,1.09-10.22,2.96c-4.01-9.74-13.59-16.61-24.77-16.61c-14.8,0-26.79,11.99-26.79,26.79c0,1.12,0.09,2.21,0.22,3.3
                                c-0.08,0-0.15-0.01-0.22-0.01c-9.92,0-17.96,8.04-17.96,17.96s8.04,17.96,17.96,17.96h79.62c7.04,0,12.74-5.7,12.74-12.74
                                C141.16,96.9,135.45,91.2,128.42,91.2z M88.21,92.48l-12.46,12.46c-0.29,0.29-0.69,0.46-1.1,0.46c-0.42,0-0.81-0.16-1.1-0.46
                                L61.09,92.48c-0.46-0.46-0.59-1.09-0.34-1.7c0.25-0.6,0.79-0.96,1.44-0.96h6.05V76.78c0-0.56,0.46-1.02,1.02-1.02h10.77
                                c0.56,0,1.02,0.46,1.02,1.02v13.07l6.05-0.02c0.65,0,1.19,0.36,1.44,0.96C88.8,91.39,88.67,92.02,88.21,92.48z"/>
                            </svg>
                        </a>
                        <span>DOWNLOADS</span>
                    </div>
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="{{ route('support') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background:new 0 0 172 172;" xml:space="preserve">
                            <path id="XMLID_00000054266355209855059210000003509761886644214928_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12
                                c-16.84,0-30.49-13.65-30.49-30.49V31.12c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76
                                C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                            <path fill="#FFFFFF" d="M103.63,55.27c-16.81-9.72-38.44-3.92-48.15,12.89c-7.9,13.69-5.58,30.47,4.6,41.5l1.07,12.24
                                c0.26,2.92,3.34,4.71,6,3.46l11.13-5.19c14.65,3.29,30.34-3.09,38.24-16.77C126.25,86.55,120.48,65,103.63,55.27z M70.29,90.01
                                c-2.34,0-4.23-1.89-4.23-4.23c0-2.34,1.89-4.23,4.23-4.23c2.34,0,4.23,1.89,4.23,4.23C74.52,88.12,72.63,90.01,70.29,90.01z
                                 M86,90.01c-2.34,0-4.23-1.89-4.23-4.23c0-2.34,1.89-4.23,4.23-4.23c2.34,0,4.23,1.89,4.23,4.23C90.23,88.12,88.34,90.01,86,90.01z
                                 M101.71,90.01c-2.34,0-4.23-1.89-4.23-4.23c0-2.34,1.89-4.23,4.23-4.23c2.34,0,4.23,1.89,4.23,4.23
                                C105.94,88.12,104.05,90.01,101.71,90.01z"/>
                            <path fill="#FFFFFF" opacity="0.5" d="M103.83,131.45c-1.78,0-3.18-0.64-3.95-1.8c-1.65-2.5,0.17-6.52,4.16-9.16c1.97-1.3,4.2-2.05,6.1-2.05
                                c0.61,0,1.18,0.07,1.69,0.22c1.36-1.06,2.66-2.22,3.88-3.43c7.94-7.94,12.31-18.49,12.31-29.71s-4.37-21.78-12.31-29.71
                                S97.22,43.49,86,43.49S64.22,47.86,56.29,55.8S43.98,74.29,43.98,85.51c0,2.39,0.2,4.79,0.6,7.13c0.02,0.12,0.03,0.25,0.04,0.37
                                c0.15,1.08,0.24,2.55-0.52,3.82c-1.23,2.08-2.75,3.18-4.42,3.18c-3.9,0-6.95-6.37-6.95-14.51c0-8.14,3.05-14.51,6.95-14.51
                                c0.58,0,1.14,0.13,1.68,0.4c2.24-7.1,6.22-13.64,11.55-18.97C61.76,43.6,73.5,38.73,86,38.73s24.24,4.87,33.08,13.7
                                c5.33,5.33,9.31,11.87,11.55,18.97c0.54-0.27,1.11-0.4,1.68-0.4c3.9,0,6.95,6.37,6.95,14.51c0,8.14-3.05,14.51-6.95,14.51
                                c-0.58,0-1.14-0.13-1.68-0.4c-2.24,7.1-6.22,13.64-11.55,18.97c-1.37,1.37-2.85,2.67-4.38,3.87c-0.06,2.32-1.91,5.05-4.77,6.93
                                C107.96,130.71,105.74,131.45,103.83,131.45z"/>
                            </svg>
                        </a>
                        <span>SUPPORT</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
