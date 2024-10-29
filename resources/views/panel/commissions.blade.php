@extends('layouts.panel')

@section('title', __('- COMMISSIONS'))

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
                    <h3 class="text-left register-title">COMMISSIONS</h3>
                    <img src="{{ asset('/images/Icons/IconCommissionsBlue.svg') }}" alt="commissions svg" class="page-logo" />
                </div>
                
                <p class="mt-5 mb-3 text-left register-subtitle">IMPORTANT NOTICE!</p>
                <p class="mb-0 register-desc">Commissions will be paid out every 15th after the trading month is calculated and closed.</p>
                <p class="mb-3 register-desc">Please remember that clients that participate after the 1st of the month will have a different ROI for that particular month.</p>
                
                <div class="row performance-table-section mx-0 mt-5 mb-5">
                    @foreach($commissionTraffic as $year => $yearlyTraffic)
                        @if ($year == Date('Y'))
                        <table>
                            <thead>
                                <td class="text-left pl-3">{{ $year }}</td>
                                <td class="text-right">TOTAL AUM</td>
                                <td class="text-right pr-3">STATUS</td>
                            </thead>
                            <tbody>
                            @foreach($yearlyTraffic['monthly'] as $month => $monthlyAum)
                                <tr>
                                    <td class="year text-left pl-3 text-uppercase">{{ $month }}</td>
                                    <td class="nodata text-right">
                                        @if($monthlyAum == 'n/a') {{ '-' }} @else {{ '€ ' . $monthlyAum }} @endif
                                    </td>
                                    <td class="nodata text-right pr-3">-</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <td colspan="13">
                                    <div class="d-flex justify-content-between px-3">
                                        <span>TOTAL COMMISSION {{ $year }}</span>
                                        <span>€ {{ $yearlyTraffic['yearlyCommission'] }}</span>
                                    </div>
                                </td>
                            </tfoot>
                        </table>
                        @endif
                    @endforeach
                </div>

                <div class="mt-5 mb-5">
                    <a class="participate-button" href="javascript:;">PAY OUT</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection
