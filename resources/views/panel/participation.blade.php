@extends('layouts.panel')

@section('title', __('- PARTICIPATION'))

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
                    <h3 class="text-left register-title">PARTICIPATION</h3>
                    <img src="{{ asset('/images/Icons/IconParticipationBlue.svg') }}" alt="profile svg" class="page-logo" />
                </div>
                
                <p class="mt-5 mb-3 text-left register-subtitle">GAMMA</p>
                <p class="mb-3 register-desc">GAMMA is Brookestone Capital’s flagship Investment Strategy.</p>
                <p class="mb-3 register-desc">Predominantly built around price-action based models, the GAMMA strategy exploits temporary price inefficiencies across a range of financial instruments to enter positions in the direction of the short-term trend. The strategy employs rigid risk-control parameters and positively skewed risk/reward ratios to achieve well above-average returns with incredibly low downside.</p>
                <p class="mb-3 register-desc">With a third-party verified track record of over 2 years, the GAMMA strategy has been able to perform with undisputed consistency and excellent results under the most diverse market conditions.</p>
                
                <div class="row performance-table-section mx-0 mt-5 mb-5">
                    <div class="container">
                        <div class="row">
                            <table>
                                <thead>
                                    <td class="text-left pl-3">YEAR</td>
                                    <td>JAN</td>
                                    <td>FEB</td>
                                    <td>MAR</td>
                                    <td>APR</td>
                                    <td>MAY</td>
                                    <td>JUN</td>
                                    <td>JUL</td>
                                    <td>AUG</td>
                                    <td>SEP</td>
                                    <td>OCT</td>
                                    <td>NOV</td>
                                    <td>DEC</td>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="year text-left pl-3">2020</td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                        <td class="t-positive">3.4%</td>
                                        <td class="t-positive">12.3%</td>
                                        <td class="t-positive">14.8%</td>
                                        <td class="t-positive">12.3%</td>
                                        <td class="t-positive">10.2%</td>
                                    </tr>
                                    <tr>
                                        <td class="year text-left pl-3">2021</td>
                                        <td class="t-positive">15.4%</td>
                                        <td class="t-positive">11.8%</td>
                                        <td class="t-positive">12.1%</td>
                                        <td class="t-positive">12.0%</td>
                                        <td class="t-positive">11.3%</td>
                                        <td class="t-positive">9.9%</td>
                                        <td class="t-positive">6.6%</td>
                                        <td class="t-positive">7.3%</td>
                                        <td class="t-positive">9.2%</td>
                                        <td class="t-positive">10.4%</td>
                                        <td class="t-positive">8.7%</td>
                                        <td class="t-positive">10.4%</td>
                                    </tr>
                                    <tr>
                                        <td class="year text-left pl-3">2022</td>
                                        <td class="t-positive">11.0%</td>
                                        <td class="t-positive">8.3%</td>
                                        <td class="t-positive">10.3%</td>
                                        <td class="t-positive">9.4%</td>
                                        <td class="t-positive">9.3%</td>
                                        <td class="t-positive">5.0%</td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                        <td class="nodata"></td>
                                    </tr>
                                    {{--@foreach($visitorTraffic as $year => $portStatistics)
                                        <tr>
                                            <td class="year">{{$year}}</td>
                                            @foreach($portStatistics['monthly'] as $portStatisticsItem)
                                                <td class="@if($portStatisticsItem == 'n/a') {{'nodata'}} @elseif($portStatisticsItem <= 0) {{'t-negative'}} @else {{'t-positive'}} @endif">@if($portStatisticsItem == 'n/a') {{'-'}} @elseif($portStatisticsItem <= 0) {{'0 %'}} @else {{$portStatisticsItem.'%'}} @endif</td>
                                            @endforeach
                                            <td class="t-year-total">{{($portStatistics['yearly'] <= 0) ? '0' : $portStatistics['yearly'] }} %</td>
                                        </tr>
                                    @endforeach--}}
                                </tbody>
                                <tfoot>
                                    <td colspan="13">
                                        <div class="d-flex justify-content-between px-3">
                                            <span>TOTAL COMPOUNDED ROI FROM DATE OF INCEPTION</span>
                                            <span>{{ __('801.3%') }}</span>
                                        </div>
                                    </td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <p class="mb-3 text-left register-subtitle">IMPORTANT NOTE</p>
                <p class="mb-3 register-desc">Monthly results will be assigned as following: Client: 50%, Referring Client: 10%, Trader: 20%, Broker: 20% .</p>

                <div class="mt-5 mb-5 d-md-flex align-items-center">
                    <a class="mr-5 mb-3 participate-button" href="javascript:;">PARTICIPATE NOW</a>
                    <div class="d-flex align-items-center mb-3 ">
                        <span class="text-uppercase register-subtitle pr-3">Your Brookestone Capital Referral Link</span>
                        <div class="clipboard-button" onclick="copyLink(this,event)" attr_href="{{url('/')}}/{{ $user->customer_id }}">Copy</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('PAGE_LEVEL_SCRIPTS')
<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.participate-button').on('click', function() {
        var send_data = {};
        $.ajax({
          type: 'POST',
          url: '{{ route('participation.create.account') }}',
          data : send_data,
          success:function(data){
            if (data.status) {
                window.open(data.url, 'PUPRIME', 'height=' + screen.height + ',width=' + screen.width + ',resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');
            } else {
                toastr['error'](data.message, 'Error');
                setTimeout(function() {
                    window.open('https://myaccount.puprime.com/register', 'PUPRIME', 'height=' + screen.height + ',width=' + screen.width + ',resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,location=yes');
                }, 1500);
            }
          },
          error:function(data){
            console.log(data);
          }
        });
    })

    function copyLink(element, event) {
        event.preventDefault();
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).attr('attr_href')).select();
        document.execCommand("copy");
        $temp.remove();
        alert('Copied to Clipboard');
    }
</script>
@endsection

