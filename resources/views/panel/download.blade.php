@extends('layouts.panel')

@section('title', __('- DOWNLOADS'))

@section('PAGE_LEVEL_STYLES')
<style type="text/css">
    .register-title {
        font-family: 'DIN Pro Condensed Bold', sans-serif;
        font-size: 35px; 
        color: #214166;
    }
    .register-subtitle {
        font-family: 'DIN Pro Condensed Bold', sans-serif; 
        font-size: 18px; 
        color: #214166;
    }
    .register-desc {
        text-align: justify;
        font-family: 'DIN Pro Condensed Regular', sans-serif; 
        font-size: 16px; 
        color: #214166;
    }
    .info-title {
        font-family: 'DIN Pro Condensed Medium', sans-serif; 
        font-size: 21px; 
        color: #214166;
        text-transform: uppercase;
    }
</style>
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_END')
@endsection

@section('content')
<div class="main-bg">
    <div class="container">
        
        <div class="row justify-content-center">
            
            <div class="col-lg-10 m-auto pt-5">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="text-left register-title">DOWNLOADS</h3>
                    <img src="{{ asset('/images/Icons/IconDownloadsBlue.svg') }}" alt="downloads svg" class="page-logo" />
                </div>
                
                
                <div class="row mt-5 mb-5">
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="javascript:;">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background: new 0 0 172 172;" xml:space="preserve">
                                <path id="XMLID_1633_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12c-16.84,0-30.49-13.65-30.49-30.49V31.12
                                    c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                            </svg>
                        </a>
                        <span>DOWNLOAD PDF</span>
                    </div>
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="javascript:;">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background: new 0 0 172 172;" xml:space="preserve">
                                <path id="XMLID_1633_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12c-16.84,0-30.49-13.65-30.49-30.49V31.12
                                    c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                            </svg>
                        </a>
                        <span>DOWNLOAD PDF</span>
                    </div>
                    <div class="col-6 col-sm-4 text-center navItem mb-3">
                        <a href="javascript:;">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="124" height="124" x="0px" y="0px" viewBox="0 0 172 172" style="enable-background: new 0 0 172 172;" xml:space="preserve">
                                <path id="XMLID_1633_" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M140.88,171.37H31.12c-16.84,0-30.49-13.65-30.49-30.49V31.12
                                    c0-16.84,13.65-30.49,30.49-30.49h109.76c16.84,0,30.49,13.65,30.49,30.49v109.76C171.37,157.72,157.72,171.37,140.88,171.37z"/>
                            </svg>
                        </a>
                        <span>DOWNLOAD PDF</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection
