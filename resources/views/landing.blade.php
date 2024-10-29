@extends('layouts.marketing')


@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/style_new.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
@endsection


@section('PAGE_LEVEL_SCRIPTS')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>



<script type="text/javascript">

    const compoundCalc = {
        init: function () {
            this.variables();
            this.addEventListeners();
        },
        variables: function () {
            this.initialInvestment = $('[name="initial_investment"]');
            this.initialInvestmentError = $('#initialInvestment-error');
            this.rorRate = $('[name="ror_rate"]');
            this.rorRateError = $('#rorRate-error');
            this.term = $('[name="term"]');
            this.termError = $('#term-error');
            this.calculateButton = $('[data-button="calculate"]');
            this.resultContent = $('[data-content="result"]');
        },
        addEventListeners: function () {
            this.initialInvestment.on('focusout', function () {
                this.validateInput(this.initialInvestment, this.initialInvestmentError);
            }.bind(this));
            this.rorRate.on('focusout', function () {
                this.validateInput(this.rorRate, this.rorRateError);
            }.bind(this));
            this.term.on('focusout', function () {
                this.validateInput(this.term, this.termError);
            }.bind(this));
            this.calculateButton.on('click', function () {
                if (this.validateInput(this.initialInvestment, this.initialInvestmentError) &&
                    this.validateInput(this.rorRate, this.rorRateError) &&
                    this.validateInput(this.term, this.termError)) {
                    this.calculateRorCompound();
                }
            }.bind(this));
        },
        calculateRorCompound: function () {
            var initialInvestmentValue = parseInt(this.initialInvestment.val());

            var termValue = parseInt(this.term.val());

            var rorRateValue = parseInt(this.rorRate.val());
            var exponents = 1 + rorRateValue / 100;
            var pow_parameter = Math.pow(exponents, termValue);

            var rorSum = initialInvestmentValue * pow_parameter;

            var rorSum_tofixed = rorSum.toFixed(2);

            this.resultContent.html(rorSum_tofixed.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        },
        validateInput: function (input, error) {
            var validationMessage = '';
            var formControl = input.parent('.form-group').find('.form-control');
            var value = input.val();

            if ((/^[0-9]{1,50}$/.test(value))) {
                formControl.addClass('valid-calculate');
                error.addClass('valid-calculate');
                error.hide();
            } else if (value === '') {
                validationMessage = 'This field is required.';
                formControl.removeClass('valid-calculate');
                formControl.addClass('error-calculate');
                error.removeClass('valid-calculate');
                error.show();
            } else {
                validationMessage = 'Please enter only digits.';
                formControl.removeClass('valid-calculate');
                formControl.addClass('error-calculate');
                error.removeClass('valid-calculate');
                error.show();
            }

            error.html(validationMessage);
            // input.focus();

            return ((/^[0-9]{1,50}$/.test(value)));
        },
    };

    const continent = "{{ \GeoIP::getLocation()['continent'] }}";
    jQuery(document).ready(function () {
        compoundCalc.init();
        if (continent === "EU") {
            $('#euPopUp').modal('show');
        }
    });
</script>
@endsection


@section('PAGE_START')
@endsection


@section('PAGE_END')
@endsection


@section('content')

    @include('sections.home')
    @include('sections.about')
    @include('sections.approach')
    @include('sections.strategy')
    @include('sections.compound')
    @include('sections.participate')

    <div class="modal fade" id="euPopUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content p-3 p-md-5 rounded-0">
            <div class="button-group-area py-5">
                <div class="row mx-0">
                    <div class="col-12">
                        <h2 class="home-head">Thank you for visiting Brookestone Capital</h2>
                    </div>
                    <div class="header-strips-one mx-auto"></div>
                    <div class="col-12 text-center pt-5 px-1 px-md-5">
                        <p class="box-desc text-center">This website is operated by Brookestone Capital Management LLC, an entity that is not established in the EU or regulated by an EU National Competent Authority. The entity falls outside the EU regulatory framework i.e. MiFID II and there is no provision for an Investor Compensation Scheme.</p>
                        <p class="box-desc text-center pt-3">Please confirm that the decision you make will be independently at your own exclusive initiative and that no solicitation or recommendation has been made by Brookestone Capital or any other entity within the group.</p>
                    </div>
                </div>
                <div class="d-lg-flex mt-3 justify-content-center px-5">
                    <div class="w-100 w-lg-50 p-2 p-lg-3 text-lg-right">
                        <a class="participate-button w-100" style="max-width: 285px;" href="javascript:;" data-dismiss="modal">I CONFIRM AND PROCEED</a>
                    </div>
                    <div class="w-100 w-lg-50 p-2 p-lg-3 text-lg-left">
                        <a class="participate-button w-100" style="max-width: 285px;" href="javascript:;" data-dismiss="modal">I DO NOT CONFIRM</a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
      </div>
    </div>

@endsection