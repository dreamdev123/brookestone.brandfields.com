
<section id="compound" data-anchor="compound">
    <div class="compound-row wealth parallax">
        <div class="container" style="transform: translate3d(0px, 0px, 0px);">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="row" style="margin:  0 0 65px;">
                        <div class="col-12">
                            <h2 class="home-head text-left text-white" >The Power of Compounding</h2>
                        </div>
                        <div class="header-strips-one"></div>
                    </div>
                    <div class="row m-0">
                        <div class="col-12">
                            <h3 class="box-head text-uppercase text-white mb-5">ALBERT EINSTEIN</h3>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col-12">
                            <p class="box-desc text-white" style="text-align: justify;">Albert Einstein reportedly said it.</p>
                        </div>
                    </div>
                    <div class="row" style=" margin: 20px 0 0;">
                        <div class="col-12">
                            <p class="box-desc text-white" style="text-align: justify;">“Compound interest is the eighth wonder of the world.<br/>He who understands it, earns it. He who doesn't, pays it.”</p>
                        </div>
                    </div>
                    <div class="row" style=" margin: 20px 0 0;">
                        <div class="col-12">
                            <p class="box-desc text-white" style="text-align: justify;">It's time to discover Compound Return On Return.<br/>Start compounding today.</p>
                        </div>
                    </div>

                    <div class="row mt-5 ml-0">
                        <div class="col" style="align-self: center; ">
                            <a class="participate-button" href="{{ route('register') }}">PARTICIPATE NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="padding: 100px 0;">
        <div class="row" style="margin:  0 0 65px;">
            <div class="col-12">
                <h2 class="home-head text-left" style="">Compound ROR Calculator</h2>
            </div>
            <div class="header-strips-one"></div>
        </div>
        <div class="row mx-0">
            <div class="col-md-8 col-lg-6">
                <h3 class="box-head text-uppercase mb-3">COMPOUND RETURN ON RETURN CALCULATOR</h3>
                <p class="box-desc" style="text-align: justify;">This calculator is for illustrative purposes only and no financial advice. Results from the past are no guarantee for the future.</p>
                <div class="d-flex justify-content-between pt-3">
                    <h4 class="box-head mt-2 pt-1">INITIAL INVESTMENT</h4>
                    <div class="d-flex">
                        <h4 class="box-head mt-2 pt-1 mr-2">EURO</h4>
                        <div class="form-group text-left mb-0">
                            <input type="text" class="compound-input form-control" name="initial_investment">
                            <label id="initialInvestment-error" class="has-error" style="display: none"></label>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-2">
                    <h4 class="box-head mt-2 pt-1">ESTIMATED MONTHLYY ROI RATE</h4>
                    <div class="d-flex">
                        <h4 class="box-head mt-2 pt-1 mr-2">%</h4>
                        <div class="form-group text-left mb-0">
                            <input type="text" class="compound-input form-control" placeholder="" name="ror_rate">
                            <label id="rorRate-error" class="has-error" style="display: none"></label>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-2">
                    <h4 class="box-head mt-2 pt-1">TERM</h4>
                    <div class="d-flex">
                        <h4 class="box-head mt-2 pt-1 mr-2">MONTHS</h4>
                        <div class="form-group text-left mb-0">
                            <input type="text" class="compound-input form-control" placeholder="" name="term">
                            <label id="term-error" class="has-error" style="display: none"></label>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-2 pt-1">
                    <div></div>
                    <a class="calculate-button compound-result" href="javascript:;" data-button="calculate">CALCULATE</a>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-2">
                    <h4 class="box-head mt-2 pt-1">RESULT</h4>
                    <div class="d-flex">
                        <h4 class="box-head mt-2 pt-1 mr-2">EURO</h4>
                        <div class="record-even-box d-flex align-items-center compound-result">
                            <span class="box-desc font-weight-normal" data-content="result"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</section>