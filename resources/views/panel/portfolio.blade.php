@extends('layouts.panel')

@section('title', __('- PORTFOLIO'))

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
                    <h3 class="text-left register-title">PORTFOLIO</h3>
                    <img src="{{ asset('/images/Icons/IconPortfolioBlue.svg') }}" alt="portfolio svg" class="page-logo" />
                </div>
                
                <p class="mt-5 mb-3 text-left register-subtitle">IMPORTANT NOTICE!</p>
                <p class="mb-3 register-desc">The moment of participation determines what % of ROI you will receive within your first month. If you participate on the 15th of the month, your ROI % will be different than other clients that participated on the 1st of this particular month. ROI % will be calculated from every 1st of the month 00.00am untill the last day of the month 11.59pm.</p>
                
                <div class="row performance-table-section mx-0 mt-5 mb-5">
                    <table>
                        <thead>
                            <td class="text-left pl-3">2021 | 2022</td>
                            <td class="text-right">AUM</td>
                            <td class="text-right">ROI %</td>
                            <td class="text-right">ROI MONTH</td>
                            <td class="text-right pr-3">ROI TOTAL</td>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="year text-left pl-3">JANUARY</td>
                                <td class="nodata text-right">€ 1.000,00</td>
                                <td class="t-positive text-right">+ 5%</td>
                                <td class="t-positive text-right">+ € 50,00</td>
                                <td class="t-positive text-right pr-3">€ 50,00</td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">FEBRUARY</td>
                                <td class="nodata text-right">€ 1.050,00</td>
                                <td class="t-positive text-right">+ 4%</td>
                                <td class="t-positive text-right">+ € 42,00</td>
                                <td class="t-positive text-right pr-3">€ 92,00</td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">MARCH</td>
                                <td class="nodata text-right">€ 1.092,00</td>
                                <td class="t-negative text-right">- 2%</td>
                                <td class="t-negative text-right">- € 21,84</td>
                                <td class="t-positive text-right pr-3">€ 70,16</td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">APRIL</td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">MAY</td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">JUNE</td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">JULY</td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">AUGUST</td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">SEPTEMBER</td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">OCTOBER</td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">NOVEMBER</td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                            </tr>
                            <tr>
                                <td class="year text-left pl-3">DECEMBER</td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                                <td class="nodata"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <td colspan="13">
                                <div class="d-flex justify-content-between px-3">
                                    <span>TOTAL ROI 2022</span>
                                    <span>€ 70,16</span>
                                </div>
                            </td>
                        </tfoot>
                    </table>
                </div>

                <div class="mt-5 mb-5 d-flex justify-content-between">
                    <a class="participate-button" href="javascript:;">ADD MORE FUNDS</a>
                    <a class="participate-button" href="javascript:;">CANCEL TRADING</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('PAGE_LEVEL_SCRIPTS')
@endsection
