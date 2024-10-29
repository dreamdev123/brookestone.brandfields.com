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
                        <h3 class="box-head text-uppercase mb-3">PRIVACY POLICY</h3>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-12">
                        <p class="box-desc mt-2" style="text-align: justify;">Welcome to our website.</p>
                        <p class="box-desc" style="text-align: justify;">By browsing and using this website you agree to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern the relationship with you in relation to this website. The use of this website is subject to the following terms:</p>
                        <p class="box-desc" style="text-align: justify;">The content of the pages of this website is for general information and use only.</p>
                        <p class="box-desc" style="text-align: justify;">It is subject to change without notice.</p>
                        <p class="box-desc" style="text-align: justify;">Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.</p>
                        <p class="box-desc" style="text-align: justify;">Use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.</p>
                        <p class="box-desc" style="text-align: justify;">This website contains material which is owned by or licensed by us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.</p>
                        <p class="box-desc" style="text-align: justify;">All trademarks reproduced in this website which are not the property of, or licensed to, the operator are acknowledged on the website.</p>
                        <p class="box-desc" style="text-align: justify;">Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.</p>
                        <p class="box-desc" style="text-align: justify;">From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).</p>
                        <p class="box-desc" style="text-align: justify;">You may not create a link to this website from another website or document without the owner’s prior written consent.</p>
                        <p class="box-desc" style="text-align: justify;">Your use of this website and any dispute arising out of such use of the website is subject to the laws of Saint Vincent and the Grenadines.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('sections.participate')

@endsection