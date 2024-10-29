@extends('layouts.panel')

@section('title', __('- SUPPORT'))

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
                    <h3 class="text-left register-title">SUPPORT</h3>
                    <img src="{{ asset('/images/Icons/IconSupportBlue.svg') }}" alt="support svg" class="page-logo" />
                </div>
                
                <p class="mt-5 mb-3 text-center register-subtitle">IMPORTANT NOTICE!</p>
                <p class="mb-0 text-center register-desc">We will reply to you within 24 hours during opening hours.</p>
                <p class="mb-3 text-center register-desc">Opening hours: monday - friday 09.00am - 05.00pm.</p>
                
                
                <div class="row justify-content-center mt-5 mb-5">
                    <div class="col-lg-8 m-auto pb-5">
                        <input type="text" name="search" class="form-control input-form" id="searchKey" placeholder="Search" tabindex="1">
                        <textarea name="message" class="form-control mt-3" id="message" placeholder="Message" rows="8" tabindex="2" style="background-color: #fff"></textarea>
                        <button class="btn btn-success btn-block btn-lg button-submit mt-5" tabindex="3">SEND MESSAGE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection
