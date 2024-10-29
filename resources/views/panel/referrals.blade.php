@extends('layouts.panel')

@section('title', __('- REFERRALS'))

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
                    <div class="d-md-flex align-items-center">
                        <h3 class="text-left register-title pr-5">REFERRALS</h3>
                        <p class="m-0 pr-5 text-left register-subtitle">ACTIVE CLIENTS: {{ $user->referrers()->count() }}</p>
                        <p class="m-0 pr-5 text-left register-subtitle">TOTAL AUM:&nbsp;&nbsp; € {{ number_format($totalAum, '2', '.', ',') }}</p>
                    </div>
                    <img src="{{ asset('/images/Icons/IconReferralsBlue.svg') }}" alt="referrals svg" class="page-logo" />
                </div>
                
                
                
                <div class="row performance-table-section mx-0 mt-5 mb-5">
                    <table>
                        <thead>
                            <td class="text-left pl-3">NAME</td>
                            <td class="text-right">AUM</td>
                            <td class="text-right pr-3">COMMISSION</td>
                        </thead>
                        <tbody>
                            @if (count($user->referrers) > 0)
                                @foreach($user->referrers as $referralUser)
                                    @if ($referralUser->profile->deposit_amount > 0)
                                        <tr>
                                            <td class="year text-left pl-3">{{ $referralUser->profile->first_name }} {{ $referralUser->profile->last_name }}</td>
                                            <td class="nodata text-right">€ {{ number_format($referralUser->profile->deposit_amount, '2', '.', ',') }}</td>
                                            <td class="nodata text-right pr-3">€ {{ number_format($referralUser->profile->enrollCommission(), '2', '.', ',') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                            <tr>
                                <td class="year text-left pl-3" colspan="3">No Referral Users</td>
                            </tr>
                            @endif
                        </tbody>
                        <tfoot>
                            <td colspan="13">
                                <div class="d-flex justify-content-between px-3">
                                    <span>COMMISSION 2022</span>
                                    <span>€ {{ number_format($totalCommission, '2', '.', ',') }}</span>
                                </div>
                            </td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection
