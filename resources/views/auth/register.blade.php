@extends('layouts.app')

@section('title', __('- Register'))

@section('PAGE_LEVEL_STYLES')
<style type="text/css">
    .register-title {
        font-family: 'DIN Pro Condensed Bold', sans-serif;
        font-size: 35px; 
        color: #214166;
    }
    .register-subtitle {
        font-family: 'DIN Pro Condensed Bold', sans-serif; 
        font-size: 12px; 
        color: #214166;
    }
    .register-desc {
        text-align: justify;
        font-family: 'Raleway Light', sans-serif;
        font-size: 12px; 
        color: #214166;
    }
    .info-title {
        font-family: 'DIN Pro Condensed Medium', sans-serif; 
        font-size: 21px; 
        color: #214166;
        text-transform: uppercase;
    }
    .label-style {
        font-family: 'DIN Pro Condensed Regular';
        font-size: 16px;
        color: #214166;
    }
    .input-form {
        width: 366px;
        height: 33px;
        font-family: 'Raleway Regular', sans-serif;
        font-size: 12px;
        color: #214166;
        border-radius: 0;
    }
    label.has-error {
        padding: 13px 16px 11px;
        font-size: 14px;
        color: #D22630;
        background: #ffecec;
        border: 1px solid #D22630;
        border-top: none;
        margin: 0;
        border-radius: 0 0 .25rem .25rem;
        width: 366px;
        text-align: left;
        font-family: 'calibri';
    }
    label.valid {
        padding: 13px 16px 11px;
        font-size: 14px;
        color: #5ea06d;
        background: #e4f7e5;
        border: 1px solid #5ea06d;
        border-top: none;
        margin: 0;
        border-radius: 0 0 .25rem .25rem;
        width: 366px;
        text-align: left;
        font-family: 'calibri';
    }
    .button-submit {
        width: 366px;
    }
    .footer-disclaimer {
        padding-top: 80px; 
        padding-bottom: 80px;
    }

    .footer-disclaimer .disclaimer-title {
        font-family: 'DIN Pro Condensed Bold', sans-serif;
        font-size: 10pt;
        color: #214166;
        text-align: justify;
    }


    .footer-disclaimer .disclaimer-desc {
        font-family: 'Raleway Light', sans-serif;
        font-size: 10pt;
        color: #214166;
        text-align: justify;
    }

    @media (max-width: 1350px) {
        .footer-disclaimer p {
            padding-left: 30px;
            padding-right: 30px;
        }
    }
    .select-bg {
        background: #fff;
        width: 366px;
        border-radius: 0.25rem;
    }
</style>
@endsection

@section('PAGE_START')
@endsection

@section('PAGE_END')
@endsection

@section('content')
<div class="main-bg pb-0">
    <div class="container">
        
        <div class="row">
            
            <div class="col-lg-10 offset-lg-1 align-self-center text-center m-auto pt-5 pb-5">
                <h3 class="mb-3 text-left register-title">CLIENT REGISTRATION</h3>
                <p class="mb-3 text-left register-subtitle">YOUR REGISTRATION AT BROOKESTONE CAPITAL MANAGEMENT</p>
                <p class="mb-3 register-desc">Client registration at Brookestone Capital Management is on invitation only and creates a virtual office with portals to current and future portfolio’s.</p>
                <div class="row" style="margin-top: 80px;">
                    <div class="col-lg-12 col-md-12">
                        <form data-form="register" action="{{route('register')}}" method="post">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br/>
                                    @endforeach
                                </div>
                            @endif

                            @csrf
                            @if ($sponsor && $sponsor_set_by_cookie)
                            <input type="hidden" name="sponsor" value="{{$sponsor}}" />
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="info-title text-left">PERSONAL INFO (OFFICIAL DATA ONLY)</h3>
                                    <div class="form-group text-left">
                                        <label for="firstName" class="label-style">Given Name</label>
                                        <input type="text" name="first_name" class="form-control input-form" id="firstName" placeholder="Given Name" tabindex="1" value="{{old('first_name')}}">
                                        <label id="first-name-error" class="has-error" for="first_name" style="display: none"></label>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="lastName" class="label-style">Surname</label>
                                        <input type="text" name="last_name" class="form-control input-form" id="lastName" placeholder="Surname" tabindex="2" value="{{old('last_name')}}">
                                        <label id="last-name-error" class="has-error" for="last_name" style="display: none"></label>
                                    </div>

                                    <div class="form-group text-left">
                                        <label for="gender" class="label-style">Gender</label>
                                        <div class="d-flex">
                                            <label class="checkbox-container">
                                                <input type="radio" name="gender" id="gender-male" checked class="radio-button" value="M" tabindex="3">
                                                <span class="checkmark mr-1 align-middle"></span>
                                                <span class="mb-1">Male</span>
                                            </label>
                                            <label class="checkbox-container ml-3">
                                                <input type="radio" name="gender" id="gender-female" class="radio-button" value="F" tabindex="4">
                                                <span class="checkmark mr-1 align-middle"></span>
                                                <span class="mb-1">Female</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="streetName" class="label-style">Street Name</label>
                                        <input type="text" name="street_name" class="form-control input-form" id="streetName" placeholder="Street Name" tabindex="5" value="{{old('street_name')}}">
                                        <label id="street-name-error" class="has-error" for="street_name" style="display: none"></label>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="houseNumber" class="label-style">House Number</label>
                                        <input type="text" name="house_number" class="form-control input-form" id="houseNumber" placeholder="House Number" tabindex="6" value="{{old('house_number')}}">
                                        <label id="house-number-error" class="has-error" for="house_number" style="display: none"></label>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="city" class="label-style">City</label>
                                        <input type="text" name="city" class="form-control input-form" id="city" placeholder="City" tabindex="7" value="{{old('city')}}">
                                        <label id="city-error" class="has-error" for="city" style="display: none"></label>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="postalCode" class="label-style">Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control input-form" id="postalCode" placeholder="Postal Code" tabindex="8" value="{{old('postal_code')}}">
                                        <label id="postal-code-error" class="has-error" for="postal_code" style="display: none"></label>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="country" class="label-style">Country</label>
                                        <div class="select-bg">
                                            <select class="form-control input-form webkit_style" id="country" name="country" style="padding: 0 16px;" tabindex="9" value="{{old('country')}}">
                                                @foreach($countries as $country)
                                                    <option value="{{ $country['id'] }}" @if($country['code'] == \GeoIP::getLocation()['iso_code']) selected @endif>{{ $country['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="mobileNumber" class="label-style">Mobile Number</label>
                                        <input type="text" name="phone" class="form-control input-form" id="mobileNumber" placeholder="Mobile Number" tabindex="10" value="{{old('phone')}}">
                                        <label id="mobile-number-error" class="has-error" for="phone" style="display: none"></label>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="email" class="label-style">E-mail Address</label>
                                        <input type="email" name="email" class="form-control input-form" id="email" placeholder="E-mail Address" tabindex="11" value="{{old('email')}}">
                                        <label id="email-error" class="has-error" for="email" style="display: none"></label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="info-title text-left">Legal info (Official data only)</h3>
                                    <div class="form-group text-left">
                                        <label for="passportID" class="label-style">Passport or National ID Number</label>
                                        <input type="text" name="passport_id" class="form-control input-form" id="passportID" placeholder="123456789" tabindex="12" value="{{old('passport_id')}}">
                                        <label id="passport-id-error" class="has-error" for="passport_id" style="display: none"></label>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="passportIssuanceDate" class="label-style">Date of Passport or National ID Issuance</label>
                                        <input type="text" name="passport_issuance_date" class="form-control input-form" id="passportIssuanceDate" placeholder="DD/MM/YYYY" tabindex="13" value="{{old('passport_issuance_date')}}">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="passportExpirationDate" class="label-style">Passport or National ID Expiration Date</label>
                                        <input type="text" name="passport_expirition_date" class="form-control input-form" id="passportExpirationDate" placeholder="DD/MM/YYYY" tabindex="14" value="{{old('passport_expirition_date')}}">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="dateBirth" class="label-style">Date of Birth</label>
                                        <input type="text" name="birthday" class="form-control input-form" id="dateBirth" placeholder="DD/MM/YYYY" tabindex="15" value="{{old('birthday')}}">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="countryBirth" class="label-style">Country of Birth</label>
                                        <div class="select-bg">
                                            <select class="form-control input-form webkit_style" id="countryBirth" name="country_of_birth" style="padding: 0 16px;" tabindex="16">
                                                @foreach($countries as $country)
                                                    <option value="{{ $country['id'] }}"
                                                        @if($country['code'] == \GeoIP::getLocation()['iso_code']) selected @endif>{{ $country['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="countryPassport" class="label-style">Country of Passport or National ID Issuance</label>
                                        <div class="select-bg">
                                            <select class="form-control input-form webkit_style" id="countryPassport" name="country_of_passport_issuance" style="padding: 0 16px;" tabindex="17">
                                                @foreach($countries as $country)
                                                    <option value="{{ $country['id'] }}"
                                                        @if($country['code'] == \GeoIP::getLocation()['iso_code']) selected @endif>{{ $country['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <h3 class="info-title text-left" style="margin-top: 50px;">Account Info</h3>
                                    <div class="form-group text-left">
                                        <label for="username" class="label-style">Create Username</label>
                                        <input type="text" name="username" class="form-control input-form" id="username" placeholder="Username" tabindex="18" value="{{old('username')}}">
                                        <label id="username-error" class="has-error" for="username" style="display: none"></label>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="password" class="label-style">Create Password</label>
                                        <input type="password" name="password" class="form-control input-form" id="password" placeholder="Password" data-password="register" tabindex="19" value="">
                                        <label id="password-error" class="has-error" for="password" style="display: none"></label>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="passwordConfirmation" class="label-style">Re-type Password</label>
                                        <input type="password" name="password_confirmation" class="form-control input-form" id="passwordConfirmation" placeholder="Password" data-password="register" tabindex="20" value="">
                                        <label id="password-confirmation-error" class="has-error" for="password_confirmation" style="display: none"></label>
                                    </div>

                                    
                                    <button class="btn btn-success btn-block btn-lg button-submit mt-5" data-button="submit" tabindex="25">CREATE ACCOUNT
                                    </button>
                                </div>
                                <div class="col-6 offset-6 mt-5">
                                    <!-- <button class="btn btn-success btn-block btn-lg button-submit" data-button="submit"
                                            tabindex="21">CREATE ACCOUNT
                                    </button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 bg-white">
        <div class="footer-disclaimer">
            <div class="container">
                <p style="margin-top: 0px" class="disclaimer-title">DISCLAIMER</p>
                <p style="margin-top: 20px" class="disclaimer-desc">ELYSIUM CAPITAL LTD AND/OR ITS SUBSIDIARIES ARE NOT DIRECTLY OR INDIRECTLY INVOLVED IN THE OFFERING OF SECURITIES.</p>
                <p style="margin-top: 20px;" class="disclaimer-desc">We are a Fintech access provider and signal provider. We develop trade signals per quantitative analysis. Clients engage our EA's to execute their trades via 3rd party brokerages. Clients can at all times manually intervene in open positions c.q. our portfolios. We grant access to the data on trading portfolio operations allowing other participants to auto-copy signals automatically via their EA on their own trading accounts via a 3rd party independent prime brokerage, not being Elysium Capital Limited or any of our subsidiaries.</p>
                <p style="margin-top: 20px;" class="disclaimer-desc">The prime brokerages we introduce our participants to are regulated in several jurisdictions. Participants can, at their own discretion and liability, appoint a proprietary trading desk to trade on their behalf by providing a signed limited power of attorney subject to compliance approval. Their money is held in a segregated account with that 3rd party brokerage. Participants have full control over entries and exits. Past performance is not an indication of future results. This is not investment advice. All transactions on the currency spot market are speculative and all investments should be made using risk capital that is not crucially required. There may be a considerable risk of losses on the currency spot market and all transactions are at risk of capital loss. You should consider carefully whether such participation is appropriate to you when taking into account your financial assets. We advise everyone to seek independent advice regarding participation in the currency spot market. No information on this website should be understood to constitute financial advice from Elysium Capital Limited. It is published solely for information and marketing purposes. The 3rd party brokerages do not accept clients from the U.S, Iran, Syria, North Korea, Yemen, and Cuba. They may reject any applicant from any jurisdiction at their sole discretion without the requirement to explain the reason why. Affiliates – introducing brokers earn performance fees, if derived, on participants and do not facilitate transactions and therefore can’t be involved in the receiving and transmitting of orders. The information in this paper, website, is provided for general informational purposes only, and may not reflect the current law in your jurisdiction. A Multi Account Manager (MAM) is designed to provide the professional trading desk with essential integrated software tools to quickly and conveniently allocate and auto-copy our signals under the master account arrangement in live trading conditions. In some jurisdictions, the act of referring clients are deemed to be regulated activities and, as such, require the Introducing Broker (IB) to have the necessary regulatory authorisation. It is the duty as an IB to ensure that they only carry out activities and provide services in accordance with local laws and regulations.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('PAGE_LEVEL_SCRIPTS')

    <script src="{{ asset('/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const register = {
            init: function () {
                this.variables();
                this.addEventListeners();
                this.firstInputFocus();
                this.datePicker();
            },
            variables: function () {
                this.passwordRegisterInput = $('[data-password="register"]');
                this.passwordRegisterEye = $('[data-password="password-eye"]');
                this.passwordRegisterEyeShow = $('[data-password="password-eye-show"]');
                this.passwordRegisterEyeHide = $('[data-password="password-eye-hide"]');
                this.form = $('[data-form="register"]');
                this.affiliateInput = $('#affiliate');
                this.firstNameInput = $('#firstName');
                this.firstNameError = $('#first-name-error');
                this.lastNameInput = $('#lastName');
                this.lastNameError = $('#last-name-error');
                this.streetNameInput = $('#streetName');
                this.streetNameError = $('#street-name-error');
                this.houseNumberInput = $('#houseNumber');
                this.houseNumberError = $('#house-number-error');
                this.cityInput = $('#city');
                this.cityError = $('#city-error');
                this.postalCodeInput = $('#postalCode');
                this.postalCodeError = $('#postal-code-error');
                this.mobileNumberInput = $('#mobileNumber');
                this.mobileNumberError = $('#mobile-number-error');
                this.passportIDInput = $('#passportID');
                this.passportIDError = $('#passport-id-error');
                this.emailInput = $('#email');
                this.emailError = $('#email-error');
                this.passwordInput = $('#password');
                this.passwordError = $('#password-error');
                this.passwordConfirmInput = $('#passwordConfirmation');
                this.passwordConfirmError = $('#password-confirmation-error');
                this.dateBirth = $('#dateBirth');
                this.passportExpirationDate = $('#passportExpirationDate');
                this.passportIssuanceDate = $('#passportIssuanceDate');
                this.usernameInput = $('#username');
                this.usernameError = $('#username-error');
                this.scrollToError = '';
                this.submitButton = $('[data-button="submit"]');
            },
            addEventListeners: function () {
                this.firstNameInput.on('keyup', function () {
                    this.validateFirstNameInput();
                }.bind(this));
                this.lastNameInput.on('keyup', function () {
                    this.validateLastNameInput();
                }.bind(this));
                this.emailInput.on('keyup', function () {
                    this.validateEmailInput();
                }.bind(this));
                this.passwordInput.on('keyup', function () {
                    this.validatePasswordInput();
                }.bind(this));
                this.passwordConfirmInput.on('keyup', function () {
                    this.validatePasswordConfirmationInput();
                }.bind(this));
                this.streetNameInput.on('keyup', function () {
                    this.validateStreetNameInput();
                }.bind(this));
                this.houseNumberInput.on('keyup', function () {
                    this.validateHouseNumberInput();
                }.bind(this));
                this.cityInput.on('keyup', function () {
                    this.validateCityInput();
                }.bind(this));
                this.postalCodeInput.on('keyup', function () {
                    this.validatePostalCodeInput();
                }.bind(this));
                this.mobileNumberInput.on('keyup', function () {
                    this.validateMobileNumberInput();
                }.bind(this));
                this.passportIDInput.on('keyup', function () {
                    this.validatePassportIDInput();
                }.bind(this));
                this.usernameInput.on('keyup', function () {
                    this.validateUsernameInput();
                }.bind(this));
                this.form.on('submit', function (event) {
                    if (this.validateFirstNameInput() &&
                        this.validateLastNameInput() &&
                        this.validateEmailInput() &&
                        this.validatePasswordInput() &&
                        this.validatePasswordConfirmationInput() &&
                        this.validateStreetNameInput() &&
                        this.validateHouseNumberInput() &&
                        this.validateCityInput() &&
                        this.validatePostalCodeInput() &&
                        this.validateMobileNumberInput() &&
                        this.validatePassportIDInput() &&
                        this.validateUsernameInput()) {
                        $('.button-submit').attr('disabled', true);
                        return true;
                    } else {
                        event.preventDefault();
                        this.scrollToElement(this.scrollToError);
                        this.scrollToError.focus();
                    }
                }.bind(this));
                $(document).on('keypress', function (e) {
                    if ((e.which === 13)) {
                        this.form.submit();
                    }
                }.bind(this));
            },
            scrollToElement: function (element) {
                $('body, html').animate({
                    scrollTop: element.offset().top - 80
                }, 500);
            },
            togglePasswordVisibility: function () {
                if (this.passwordRegisterInput.attr('type') === "password") {
                    this.passwordRegisterInput.attr('type', 'text');
                    this.passwordRegisterEyeShow.hide();
                    this.passwordRegisterEyeHide.show();
                } else {
                    this.passwordRegisterInput.attr('type', 'password');
                    this.passwordRegisterEyeShow.show();
                    this.passwordRegisterEyeHide.hide();
                }
            },
            firstInputFocus: function () {
                setTimeout(function () {
                    this.firstNameInput.focus();
                }.bind(this), 300);
            },
            validateFirstNameInput: function () {
                var validationMessage = '';
                var formControl = this.firstNameInput.parent('.form-group').find('.form-control');
                var value = this.firstNameInput.val();

                if ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value))) {
                    validationMessage = 'Now, that\'s a good name.\n';
                    formControl.addClass('valid');
                    this.firstNameError.addClass('valid');
                    this.firstNameError.show();
                } else if (value === '') {
                    validationMessage = 'The name field is required.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.firstNameError.removeClass('valid');
                    this.firstNameError.show();
                } else {
                    validationMessage = 'The name must contain only letter and be minimum of 2 characters.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.firstNameError.removeClass('valid');
                    this.firstNameError.show();
                }

                this.firstNameError.html(validationMessage);
                this.scrollToError = this.firstNameInput;

                return ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value)));
            },
            validateLastNameInput: function () {
                var validationMessage = '';
                var formControl = this.lastNameInput.parent('.form-group').find('.form-control');
                var value = this.lastNameInput.val();

                if ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value))) {
                    validationMessage = 'Now, that\'s a good last name.\n';
                    formControl.addClass('valid');
                    this.lastNameError.addClass('valid');
                    this.lastNameError.show();
                } else if (value === '') {
                    validationMessage = 'The last name field is required.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.lastNameError.removeClass('valid');
                    this.lastNameError.show();
                } else {
                    validationMessage = 'The last name must contain only letter and be minimum of 2 characters.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.lastNameError.removeClass('valid');
                    this.lastNameError.show();
                }

                this.lastNameError.html(validationMessage);
                this.scrollToError = this.lastNameInput;

                return ((/^[a-zA-Z\-0-9 ]{2,50}$/.test(value)));
            },
            validateUsernameInput: async function () {
                var validationMessage = '';
                var formControlEmail = this.usernameInput.parent('.form-group').find('.form-control');
                var value = this.usernameInput.val();
                var action = 'verifyUsername';
                var response = await onVerify(action, value);
                if (response.status) {
                    validationMessage = 'The username seems to be exist !';
                    formControlEmail.removeClass('valid');
                    formControlEmail.addClass('has-error');
                    this.usernameError.removeClass('valid');
                    this.usernameError.show();
                } else {

                    if ((/^.{6,50}$/.test(value))) {
                        validationMessage = 'Now, that\'s a good username.\n';
                        formControlEmail.addClass('valid');
                        this.usernameError.addClass('valid');
                        this.usernameError.show();
                    } else if (value === '') {
                        validationMessage = 'The username field is required.';
                        formControlEmail.removeClass('valid');
                        formControlEmail.addClass('has-error');
                        this.usernameError.removeClass('valid');
                        this.usernameError.show();
                    } else {
                        validationMessage = 'Username must contain letter and number and be minimum of 6 characters.';
                        formControlEmail.removeClass('valid');
                        formControlEmail.addClass('has-error');
                        this.usernameError.removeClass('valid');
                        this.usernameError.show();
                    }
                }

                this.usernameError.html(validationMessage);
                this.scrollToError = this.usernameInput;

                return ((/^.{6,50}$/.test(value)));
            },
            validateEmailInput: async function () {
                var validationMessage = '';
                var formControlEmail = this.emailInput.parent('.form-group').find('.form-control');
                var value = this.emailInput.val();
                var action = 'verifyEmail';
                var response = await onVerify(action, value);
                if (response.status) {
                    validationMessage = 'The email seems to be exist !';
                    formControlEmail.removeClass('valid');
                    formControlEmail.addClass('has-error');
                    this.emailError.removeClass('valid');
                    this.emailError.show();
                } else {
                    if ((/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value))) {
                        validationMessage = 'Now, that\'s a good email.\n';
                        formControlEmail.addClass('valid');
                        this.emailError.addClass('valid');
                        this.emailError.show();
                    } else if (value === '') {
                        validationMessage = 'The email field is required.';
                        formControlEmail.removeClass('valid');
                        formControlEmail.addClass('has-error');
                        this.emailError.removeClass('valid');
                        this.emailError.show();
                    } else {
                        validationMessage = 'This email is not valid.';
                        formControlEmail.removeClass('valid');
                        formControlEmail.addClass('has-error');
                        this.emailError.removeClass('valid');
                        this.emailError.show();
                    }
                }

                this.emailError.html(validationMessage);
                this.scrollToError = this.emailInput;

                return ((/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value)));
            },
            validatePasswordInput: function () {
                var validationMessage = '';
                var value = this.passwordInput.val();

                if ((/\d/.test(value)) && (/[a-zA-Z]/.test(value)) && (/^.{7,}$/.test(value))) {
                    validationMessage = 'Now, that\'s a secure password.\n';
                    this.errorRegisterPassword();
                } else if ((/\d/.test(value)) && (/[a-zA-Z]/.test(value))) {
                    validationMessage = 'Password must contain a <strong><del>letter</del></strong> and a <strong><del>number</del></strong>, and be minimum of <strong>7 characters</strong>.';
                    this.validRegisterPassword();
                } else if ((/^.{7,}$/.test(value)) && (/[a-zA-Z]/.test(value))) {
                    validationMessage = 'Password must contain a <strong><del>letter</del></strong> and a <strong>number</strong>, and be minimum of <strong><del>7 characters</del></strong>.';
                    this.validRegisterPassword();
                } else if ((/^.{7,}$/.test(value)) && (/\d/.test(value))) {
                    validationMessage = 'Password must contain a <strong>letter</strong> and a <strong><del>number</del></strong>, and be minimum of <strong><del>7 characters</del></strong>.';
                    this.validRegisterPassword();
                } else if ((/^.{7,}$/.test(value))) {
                    validationMessage = 'Password must contain a <strong>letter</strong> and a <strong>number</strong>, and be minimum of <strong><del>7 characters</del></strong>.';
                    this.validRegisterPassword();
                } else if ((/\d/.test(value))) {
                    validationMessage = 'Password must contain a <strong>letter</strong> and a <strong><del>number</del></strong>, and be minimum of <strong>7 characters</strong>.';
                    this.validRegisterPassword();
                } else if ((/[a-zA-Z]/.test(value))) {
                    validationMessage = 'Password must contain a <strong><del>letter</del></strong> and a <strong>number</strong>, and be minimum of <strong>7 characters</strong>.';
                    this.validRegisterPassword();
                } else if (value === '') {
                    validationMessage = 'Password must contain a <strong>letter</strong> and a <strong>number</strong>, and be minimum of <strong>7 characters</strong>.';
                    this.validRegisterPassword();
                } else {
                    validationMessage = 'Password must contain a <strong>letter</strong> and a <strong>number</strong>, and be minimum of <strong>7 characters</strong>.';
                    this.validRegisterPassword();
                }

                // if ((/^[a-zA-Z\-0-9 ]{7,50}$/.test(value))) {
                //     validationMessage = 'Now, that\'s a secure password.\n';
                //     this.errorRegisterPassword();
                // } else if (value === '') {
                //     validationMessage = 'Password must contain a <strong>letter</strong> or a <strong>number</strong>, and be minimum of <strong>7 characters</strong>.';
                //     this.validRegisterPassword();
                // } else {
                //     validationMessage = 'Password must contain a <strong>letter</strong> or a <strong>number</strong>, and be minimum of <strong>7 characters</strong>.';
                //     this.validRegisterPassword();
                // }

                this.passwordError.html(validationMessage);
                this.scrollToError = this.passwordInput;

                return (/\d/.test(value)) && (/[a-zA-Z]/.test(value)) && (/^.{7,}$/.test(value));
            },
            validatePasswordConfirmationInput: function () {
                var validationMessage = '';
                var formControlPassConfirm = this.passwordConfirmInput.parent('.form-group').find('.form-control');
                var value = this.passwordConfirmInput.val();

                if (value === this.passwordInput.val()) {
                    validationMessage = 'Now, that\'s a good password confirmation.\n';
                    formControlPassConfirm.addClass('valid');
                    this.passwordConfirmError.addClass('valid');
                    this.passwordConfirmError.show();
                } else if (value === '') {
                    validationMessage = 'The password confirmation field is required.';
                    formControlPassConfirm.removeClass('valid');
                    formControlPassConfirm.addClass('has-error');
                    this.passwordConfirmError.removeClass('valid');
                    this.passwordConfirmError.show();
                } else {
                    validationMessage = 'The password confirmation and password must match.';
                    formControlPassConfirm.removeClass('valid');
                    formControlPassConfirm.addClass('has-error');
                    this.passwordConfirmError.removeClass('valid');
                    this.passwordConfirmError.show();
                }

                this.passwordConfirmError.html(validationMessage);
                this.scrollToError = this.passwordConfirmInput;

                return (value === this.passwordInput.val());
            },
            validRegisterPassword: function () {
                var formControlPassword = this.passwordInput.parent('.form-group').find('.form-control');
                formControlPassword.removeClass('valid');
                formControlPassword.addClass('has-error');
                this.passwordError.removeClass('valid');
                this.passwordError.show();
            },
            errorRegisterPassword: function () {
                var formControlPassword = this.passwordInput.parent('.form-group').find('.form-control');
                formControlPassword.addClass('valid');
                this.passwordError.addClass('valid');
                this.passwordError.show();
            },
            validateStreetNameInput: function () {
                var validationMessage = '';
                var formControl = this.streetNameInput.parent('.form-group').find('.form-control');
                var value = this.streetNameInput.val();

                if ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value))) {
                    validationMessage = 'Now, that\'s a good street name.\n';
                    formControl.addClass('valid');
                    this.streetNameError.addClass('valid');
                    this.streetNameError.show();
                } else if (value === '') {
                    validationMessage = 'The street name field is required.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.streetNameError.removeClass('valid');
                    this.streetNameError.show();
                } else {
                    validationMessage = 'The street name must contain letter and number and be minimum of 3 characters.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.streetNameError.removeClass('valid');
                    this.streetNameError.show();
                }

                this.streetNameError.html(validationMessage);
                this.scrollToError = this.streetNameInput;

                return ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)));
            },
            validateHouseNumberInput: function () {
                var validationMessage = '';
                var formControl = this.houseNumberInput.parent('.form-group').find('.form-control');
                var value = this.houseNumberInput.val();

                if ((/^.{1,50}$/.test(value))) {
                    validationMessage = 'Now, that\'s a good house number.\n';
                    formControl.addClass('valid');
                    this.houseNumberError.addClass('valid');
                    this.houseNumberError.show();
                } else if (value === '') {
                    validationMessage = 'The house number field is required.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.houseNumberError.removeClass('valid');
                    this.houseNumberError.show();
                } else {
                    validationMessage = 'The house number must contain letter and number and be minimum of 3 characters.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.houseNumberError.removeClass('valid');
                    this.houseNumberError.show();
                }

                this.houseNumberError.html(validationMessage);
                this.scrollToError = this.houseNumberInput;

                return ((/^.{1,50}$/.test(value)));
            },
            validateCityInput: function () {
                var validationMessage = '';
                var formControl = this.cityInput.parent('.form-group').find('.form-control');
                var value = this.cityInput.val();

                if ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value))) {
                    validationMessage = 'Now, that\'s a good city name.\n';
                    formControl.addClass('valid');
                    this.cityError.addClass('valid');
                    this.cityError.show();
                } else if (value === '') {
                    validationMessage = 'The city name field is required.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.cityError.removeClass('valid');
                    this.cityError.show();
                } else {
                    validationMessage = 'The city name must contain letter and number and be minimum of 3 characters.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.cityError.removeClass('valid');
                    this.cityError.show();
                }

                this.cityError.html(validationMessage);
                this.scrollToError = this.cityInput;

                return ((/^[a-zA-Z\-0-9 ]{3,50}$/.test(value)));
            },
            validatePostalCodeInput: function () {
                var validationMessage = '';
                var formControl = this.postalCodeInput.parent('.form-group').find('.form-control');
                var value = this.postalCodeInput.val();

                if ((/^.{3,50}$/.test(value))) {
                    validationMessage = 'Now, that\'s a good postal code.\n';
                    formControl.addClass('valid');
                    this.postalCodeError.addClass('valid');
                    this.postalCodeError.show();
                } else if (value === '') {
                    validationMessage = 'The postal code field is required.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.postalCodeError.removeClass('valid');
                    this.postalCodeError.show();
                } else {
                    validationMessage = 'The postal code must contain letter and number and be minimum of 3 characters.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.postalCodeError.removeClass('valid');
                    this.postalCodeError.show();
                }

                this.postalCodeError.html(validationMessage);
                this.scrollToError = this.postalCodeInput;

                return ((/^.{3,50}$/.test(value)));
            },
            validateMobileNumberInput: function () {
                var validationMessage = '';
                var formControl = this.mobileNumberInput.parent('.form-group').find('.form-control');
                var value = this.mobileNumberInput.val();

                if ((/^[0-9]{7,50}$/.test(value))) {
                    validationMessage = 'Now, that\'s a good mobile number.\n';
                    formControl.addClass('valid');
                    this.mobileNumberError.addClass('valid');
                    this.mobileNumberError.show();
                } else if (value === '') {
                    validationMessage = 'The mobile number field is required.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.mobileNumberError.removeClass('valid');
                    this.mobileNumberError.show();
                } else {
                    validationMessage = 'The mobile number must contain only number and be minimum of 7 characters.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.mobileNumberError.removeClass('valid');
                    this.mobileNumberError.show();
                }

                this.mobileNumberError.html(validationMessage);
                this.scrollToError = this.mobileNumberInput;

                return ((/^[0-9]{7,50}$/.test(value)));
            },
            validatePassportIDInput: function () {
                var validationMessage = '';
                var formControl = this.passportIDInput.parent('.form-group').find('.form-control');
                var value = this.passportIDInput.val();

                if ((/^[a-zA-Z\-0-9]{7,50}$/.test(value))) {
                    validationMessage = 'Now, that\'s a good passport ID.\n';
                    formControl.addClass('valid');
                    this.passportIDError.addClass('valid');
                    this.passportIDError.show();
                } else if (value === '') {
                    validationMessage = 'The passport ID field is required.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.passportIDError.removeClass('valid');
                    this.passportIDError.show();
                } else {
                    validationMessage = 'The passport ID must contain only letter and be minimum of 7 characters.';
                    formControl.removeClass('valid');
                    formControl.addClass('has-error');
                    this.passportIDError.removeClass('valid');
                    this.passportIDError.show();
                }

                this.passportIDError.html(validationMessage);
                this.scrollToError = this.passportIDInput;

                return ((/^[a-zA-Z\-0-9]{7,50}$/.test(value)));
            },
            datePicker: function () {
                this.dateBirth.datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    endDate: '-18y',
                    format: 'yyyy-mm-dd',
                    showOnFocus: true
                }).on('hide', function () {
                    if (!this.firstHide) {
                        if (!$(this).is(":focus")) {
                            this.firstHide = true;
                            // this will inadvertently call show (we're trying to hide!)
                            this.focus();
                        }
                    } else {
                        this.firstHide = false;
                    }
                }).on('show', function () {
                    if (this.firstHide) {
                        // careful, we have an infinite loop!
                        $(this).datepicker('hide');
                    }
                });

                this.passportIssuanceDate.datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    startDate: '-40y',
                    endDate: '-0y',
                    format: 'yyyy-mm-dd',
                    showOnFocus: true
                }).on('hide', function () {
                    if (!this.firstHide) {
                        if (!$(this).is(":focus")) {
                            this.firstHide = true;
                            // this will inadvertently call show (we're trying to hide!)
                            this.focus();
                        }
                    } else {
                        this.firstHide = false;
                    }
                }).on('show', function () {
                    if (this.firstHide) {
                        // careful, we have an infinite loop!
                        $(this).datepicker('hide');
                    }
                });

                this.passportExpirationDate.datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    startDate: '+1d',
                    endDate: '+40y',
                    format: 'yyyy-mm-dd',
                    showOnFocus: true
                }).on('hide', function () {
                    if (!this.firstHide) {
                        if (!$(this).is(":focus")) {
                            this.firstHide = true;
                            // this will inadvertently call show (we're trying to hide!)
                            this.focus();
                        }
                    } else {
                        this.firstHide = false;
                    }
                }).on('show', function () {
                    if (this.firstHide) {
                        // careful, we have an infinite loop!
                        $(this).datepicker('hide');
                    }
                })
            },
            addLoader: function () {
                this.submitButton.addClass('loader');
            },
            removeLoader: function () {
                this.submitButton.removeClass('loader');
            }
        };

        $(document).ready(function () {
            register.init();

            if(!$('input[name=sponsor]').val())
            {
                alert('Please contact info@brookestone.capital');
                document.location.href = "{{route('landing.index')}}";
            }
        });

        function onVerify(action, value) {
            return $.ajax({
                url: '{{ route('auth.verify') }}',
                type: 'POST',
                data: {
                    key: action,
                    value: value
                }
            });
        }

    </script>
@endsection
