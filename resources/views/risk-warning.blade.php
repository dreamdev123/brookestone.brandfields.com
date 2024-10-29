@extends('layouts.marketing')


@section('PAGE_LEVEL_STYLES')
<link href="{{ asset('css/style_new.css') }}" rel="stylesheet">
@endsection


@section('PAGE_LEVEL_SCRIPTS')
@endsection


@section('PAGE_START')
@endsection


@section('PAGE_END')
@endsection


@section('content')

    <div class="container" style="padding: 150px 0 100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-0">
                    <div class="col-12">
                        <h3 class="box-head text-uppercase mb-3">RISK WARNING</h3>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-12">
                        <p class="box-desc mt-2" style="text-align: justify;">This notice is provided to you in compliance with the Financial Services Authority requirements because you are proposing to undertake dealings in financial instruments in the form of Forex or CFDs with a firm which is carrying on investment business. This notice cannot and does not disclose or explain all of the risks and other significant aspects involved in dealing in such products.</p>
                        <p class="box-desc" style="text-align: justify;">Brookestone Capital is permitted under Financial Services Authority requirements to provide you with investment advice relating to investments or possible transactions in investments or from making investment recommendations of any kind. We can give you trading signals, market information or information, in relation to a transaction about which you have enquired, as to transaction procedures, potential risks involved and how those risks may be minimised.</p>
                        <p class="box-desc" style="text-align: justify;">Engaging in Forex or CFDs (in this notice referred to as a “Transaction”) carries a high risk to your capital. You should not engage in this form of investing unless you understand the nature of the Transaction you are entering into and the true extent of your exposure to the risk of loss. Your profit and loss will vary according to the extent of the fluctuations in the price of the underlying markets on which the trade is based.</p>
                        <p class="box-desc" style="text-align: justify;">For many members of the public, these Transactions are not suitable. You should, therefore, consider carefully whether they are suitable for you in the light of your circumstances and financial resources and investment objectives. In considering whether to engage in this form of investing, you should be aware of the following: The high degree of leverage is a particular feature of this type of Transaction. This stems from the initial financial requirements applicable to such Transactions which generally involve a comparatively modest deposit or margin in terms of the overall market value of the Transaction involved, so that a relatively small movement in the underlying market can have a disproportionately dramatic effect on your Transaction. If the underlying market movement is in your favour, you may achieve a good profit, but an equally small adverse market movement can not only quickly result in the loss of your entire deposit, but may also expose you to a large additional loss over and above your initial deposit.</p>
                        <p class="box-desc" style="text-align: justify;">You may be called upon to deposit substantial additional margin with your CFD Broker, at short notice, to maintain your position. If you do not provide such additional funds within the time required, your position may be closed at a loss and you will be liable for any resulting deficit.</p>
                        <p class="box-desc" style="text-align: justify;">The purpose of a CFD Transaction is to secure a profit or avoid a loss by reference to fluctuations in the price of underlying property or an index (the “Underlying Market”). In the context of our activities, the Underlying Market may be a single security, a basket of securities, a securities Index, an exchange rate between two currencies, a treasury product, a bullion, a commodity or such other investment as we may from time to time agree in writing. It is an express term of each spread bet or CFD Transaction that neither you nor us:</p>
                        <ul style="display: block; list-style-type: disc; padding-left: 16px; color: #214166;">
                            <li style="padding-left: 24px;"><p class="box-desc mb-0" style="text-align: justify;">acquire any interest in or right to acquire or is obliged to sell, purchase, hold, deliver or receive the Underlying Market; and</p></li>
                            <li style="padding-left: 24px;"><p class="box-desc" style="text-align: justify;">that the rights and obligations of each party under a CFD Transaction are principally to make and receive such related payments.</p></li>
                        </ul>
                        <p class="box-desc" style="text-align: justify;">Transactions suggested or placed on your behalf by Brookestone Capital are not transacted on a recognised or designated investment exchange and, accordingly, they may expose you to greater risks than exchange transactions. the same provider with whom it was originally entered into.</p>
                        <p class="box-desc" style="text-align: justify;">Where entering into such Transactions, Brookestone Capital must do so under a two-way client agreement (i.e. Terms and Conditions and documents incorporated by reference therein) pursuant to the Financial Services Authority rules unless exempted from doing so.</p>
                        <p class="box-desc" style="text-align: justify;">Gapping (or Slippage) refers to an occurrence whereby the market moves past a Stop Loss level. This may be because the particular Underlying Market has become unusually volatile for a period of time. In such instances the Underlying Market may have stopped trading and may only recommence trading at a price below a Stop Loss level. Where this happens a Stop Loss may not be effective and the Position will be closed at your Broker’s quote. Accordingly, where you have an open Position in a volatile market environment you must understand the potential impact of Gapping.</p>
                        <p class="box-desc" style="text-align: justify;">Furthermore, under certain trading conditions it may be difficult or impossible to liquidate a Position. This may occur, for example at times of rapid price movement if the price rises or falls in one trading session to such an extent that trading is restricted or suspended.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sections.participate')

@endsection