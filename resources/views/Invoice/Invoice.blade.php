<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <style>
        :root {
            --primary-color: '#065567'
        }

        @page {
            margin: 0px;
            padding: 0px;
        }

        body {
            padding: 0;
            margin: 0;
            color: #065567
        }

        .container {
            page-break-after: always;
            position: relative;
        }

        .container:last-child {
            page-break-after: auto;
        }

        .container header {
            position: absolute;
            top: 0;
            left: 0;
        }

        .container header div {
            z-index: 1000;
            position: absolute;
            background-color: #065567;
            color: #fff;
            width: 100%;
            height: 120px;
            border-radius: 0 0 0 5rem;
        }

        .container header img {
            position: absolute;
            top: 10px;
        }

        .container footer {
            position: absolute;
            bottom: 0;
            left: 0;
            background-color: #065567;
            color: #fff;
            width: 100%;
            height: 60px;
            border-radius: 0 30px 0 0;

        }



        footer {
            position: fixed;
            bottom: -80px;
            left: 0px;
            right: 0px;
            height: 50px;
            border-top: 1px solid #ddd;
            color: black;
            text-align: center;
            line-height: 35px;
        }



        .container footer span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .container .cover-footer {
            background: #AB3D1B
        }

        .container .cover-bg {
            background-color: #065567;
            height: 480px;
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            border-radius: 0 30px 0 0;
        }

        .container .cover-wave {
            position: absolute;
            bottom: 200px;
            left: 0;
        }

        .container .logo-container {
            position: absolute;
            transform: translateX(-50%);
            left: 50%;
            top: 63px;
            z-index: 1000;
        }

        .container .logo-container img {
            width: 550px;
        }

        .cover-image {
            position: absolute;
            bottom: -120px;
            left: 0;
        }

        .text-center {
            text-align: center
        }

        .font-poppins {
            font-family: 'Poppins';
            margin: 2rem;
        }

        #table-quote tr:nth-child(odd) {
            background-color: #cddde1;
        }

        .checkbox {}

        input[type=checkbox] {
            display: inline-block;
            margin-bottom: -7px !important;
            padding-bottom: 0px !important;
        }

        .title {
            color: #666464;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 0 !important;
        }

        .value {
            margin-top: 0 !important;
            font-size: 14px;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .mt-0 {
            margin-top: 0 !important;
        }


        .item-table th {
            padding: 5px;
            font-size: 12px;
            height: 80px;
            padding-top: 30px;
            border: none !important;
            /* writing-mode: vertical-rl;
            text-orientation: sideways;
            text-align: left; */
        }

        .item-table th p {
            width: 26px;
            height: 10px;
            text-align: left;
            align-items: left;
            justify-content: left;
        }

        .rotate {
            -webkit-transform: rotate(270deg);
            -moz-transform: rotate(270deg);
        }

        .p-5 {
            padding: 5px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .price-field {
            min-width: 100px;
        }
    </style>
</head>

<body>

    {{-- Cover --}}
    <div class="container">
        <header>
            <div></div>
            <img src="./images/blue-waves-top1.png" />
        </header>
        <div class="logo-container">
            <img src="./images/logo.png" />
            <div class="text-center font-poppins">
                <p style="font-size: 16px; font-weight:700 " class="font-poppins">Moving made easy<br />
                    <span style="font-size: 24px;">with care</span>
                </p>
            </div>
        </div>
        <div class="cover-bg"></div>
        <img src="./images/blue-waves-2.png" width="100%" class="cover-wave" />
        <img src="./images/cover-image.png" width="100%" class="cover-image" />

        <footer class="cover-footer">
            <div style="display: inline-block;margin-left:30px;margin-top:35px">
                <img src="./images/icon-mail-brown.png" height="25" />
                <span style="margin:0 15px 7px 4px">manager address</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-mobile-brown.png" height="25" />
                <span style="margin:0 15px 7px 4px">phone number</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-web-brown.png" height="25" />
                <span style="margin:0 15px 7px 4px">website link</span>
            </div>
            <div style="display: inline-block;margin-left:20px;">
                <img src="./images/logo-footer.png" height="35" style="margin:0 0" />
            </div>

        </footer>
    </div>

    {{-- Information --}}
    <div class="container">
        <header>
            <div style="z-index: 1003"></div>
            <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
            <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
            <img src="./images/1.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
            <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Your information regarding the move
            </h2>
        </header>
        <div style="margin-left:40px; margin:right:40px">
            <table style="margin-top: 140px;width:100%;z-index:1300; font-size:16px;">
                <tr style="width:100%">
                    <td style="text-align:left;">
                        <span style="font-weight:bold;">Name</span><br />
                        <span style="height: 7px;display:block;color:white">--</span>
                        <span style="color: black">
                            @if (count($proposalData) > 0)
                                {{ $proposalData[0]->vezeteknev . ' ' . $proposalData[0]->keresztnev }}
                            @endif

                        </span><br />
                        <span style="height: 7px;display:block;color:white">--</span>


                        <span style="font-weight:bold">Email</span><br />
                        <span style="height: 7px;display:block;color:white">--</span>
                        <span style="color: black">
                            @if (count($proposalData) > 0)
                                {{ $proposalData[0]->email }}
                            @endif
                        </span><br />
                        <span style="height: 7px;display:block;color:white">ss</span>

                        <span style="font-weight:bold">Telephone number</span><br />
                        <span style="height: 7px;display:block;color:white">ss</span>
                        <span style="color: black">
                            @if (count($proposalData) > 0)
                                {{ $proposalData[0]->telefonszam }}
                            @endif

                        </span><br />
                        <span style="height: 7px;display:block;color:white">ss</span>
                    </td>
                    <td style="text-align:right; ">
                        <span style="font-weight:bold">Contact person</span><br />
                        <span style="height: 7px;display:block;color:white">ss</span>
                        <span style="color: black">person name</span><br />
                        <span style="height: 7px;display:block;color:white">ss</span>

                        <span style="font-weight:bold">Telephone</span><br />
                        <span style="height: 7px;display:block;color:white">ss</span>
                        <span style="color: black">phone number</span>
                        <span style="height: 7px;display:block;color:white">ss</span>
                    </td>
                </tr>
                <tr style="width:100%">
                    <td>
                        <h3 style="font-size: 24px">Dear<span>
                                @if (count($proposalData) > 0)
                                    {{ $proposalData[0]->vezeteknev . ' ' . $proposalData[0]->keresztnev }}
                                @endif
                            </span> </h3>
                    </td>
                </tr>
                <tr style="width:100%">
                    <td style="width: 100%" colspan="2" style="color: #000">
                        <p> Take the heavy lifting out of moving.</p>
                        <p>
                            Moving is one of the most disruptive events in a person's life - from finding a new home and leaving the old one, to packing up your entire life, to the logistics of moving day and the unique hurdles that come with it.
                        </p>
                        <p>
                            We believe in the power of outsourcing the stress of moving to talented, trustworthy and reliable professionals like us. We have developed processes that take the work out of moving for you and ensure that your valuable possessions arrive at their destination with the same level of care as you would.
                        </p>
                    </td>
                </tr>
                <tr style="width:100%">
                    <td style="width: 50%" style="color: #000">
                        <p> Your move, your style.</p>
                        <p> As a full-service moving company, we can offer packages tailored to your desired level of support. </p>
                        <p> Let us be your expert for worry-free moving services with speed and safety.</p>
                    </td>

                </tr>
            </table>

        </div>


        <img src="./images/book-box.png" height="300px" style="position: absolute;bottom: 40px; right:0px; " />

        <img src="./images/blue-waves-bottom.png" style="position: absolute;bottom:-200px;left:-80px" />
        <footer>
            <div style="display: inline-block;margin-left:30px;margin-top:35px">
                <img src="./images/icon-mail-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">manager address</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-mobile-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">phone number</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-web-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">website link</span>
            </div>
            <div style="display: inline-block;margin-left:20px;">
                <img src="./images/logo-footer.png" height="35" style="margin:0 0" />
            </div>

        </footer>
    </div>

    {{-- address data --}}
    @php
        $count = count($proposalTourPlan);
    @endphp

    @for ($i = 1; $i <= $count - 1; $i = $i + 1)
        <div class="container">
            <header>
                <div style="z-index: 1003"></div>
                <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
                <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
                <img src="./images/2.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
                <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Your information regarding the move
                </h2>
            </header>

            <div style="margin-left:40px; margin:right:40px;">
                <table style="margin-top: 160px;width:100%;z-index:1300; font-size:16px;">
                    <tr style="width:100%">
                        <td colspan="2" style="font-weight: bold;padding-bottom: 10px">Loading address:</td>
                    </tr>
                    <tr style="width:100%">
                        <td colspan="2" style="color: #000;padding-bottom: 15px">
                            Street
                            {{ $proposalTourPlan[$i]->streetNumber ?? '' }}
                        </td>
                    </tr>
                    <tr style="width:100%;color: #000">
                        <td style="padding-bottom: 10px">{{ $proposalTourPlan[$i]->cim ?? '' }}</td>
                    </tr>
                    <tr style="width:100%;color: #000">
                        <td style="padding-bottom: 30px">{{ $proposalTourPlan[$i]->country ?? '' }}</td>
                    </tr>
                    <tr style="width:100%">
                        <td style="width: 60%;padding-bottom: 15px">
                            <div>
                                <span style="padding-right:10px">Lift</span> <input class="checkbox"
                                    type="checkbox" @if ($proposalTourPlan[$i]->lift === 1) checked @endif>
                            </div>
                        </td>
                        <td style="width: 40%;font-weight:bold;padding-bottom: 15px'">Additional services:</td>
                    </tr>
                    <tr style="width:100%">
                        <td style="width: 60%;padding-bottom: 15px">
                            <div>
                                <span style="padding-right:10px">Access road</span> <input class="checkbox"
                                    type="checkbox" />
                            </div>
                        </td>
                        <td style="width: 40%;padding-bottom: 15px'">
                            <div>
                                <span style="padding-right:10px">HVZ/approval</span> <input class="checkbox"
                                    type="checkbox" @if ($proposalTourPlan[$i]->kozteruleti_ugyintezes === 1) checked @endif />
                            </div>
                        </td>
                    </tr>
                    <tr style="width:100%">
                        <td style="width: 60%;padding-bottom: 15px">
                            <div>
                                <span style="padding-right:10px">Slow path</span> <input class="checkbox"
                                    type="checkbox" />
                            </div>
                        </td>
                        <td style="width: 40%;padding-bottom: 15px">
                            <div>
                                <span style="padding-right:10px">Stecklift/AAZ</span>
                                <input class="checkbox" type="checkbox"
                                    @if ($proposalLogistic[0]->butorlift >= 1 || $proposalLogistic[0]->kulso_lift_kezelovel >= 1) checked @endif />
                            </div>
                        </td>
                    </tr>
                    <tr style="width:100%">
                        <td
                            style="width: 60%;padding-bottom: 15px
                         @if (count($proposalTourPlan[$i]->image) == 0) padding-bottom:30px @endif
                         ">
                            <div>
                                <span style="padding-right:10px">Special features</span> <input class="checkbox"
                                    type="checkbox" />
                            </div>
                        </td>
                    </tr>
                    <tr style="width:100%">
                        <td style="width: 100%;padding-top: 15px;padding-bottom:30px;" colspan="2">
                            @foreach ($proposalTourPlan[$i]->image as $index => $image)
                                @if ($index < 6)
                                    <img height="100" src="{{ 'data:image/png;base64,' . $image->image }}" />
                                @endif {{-- <img height="100" src="{{ 'data:image/png;base64,' . $image->image }}" /> --}}
                            @endforeach
                        </td>
                    </tr>
                </table>

                @if ($i < $count - 1)
                    <table style="margin-top: ;width:100%;z-index:1300; font-size:16px;">
                        <tr style="width:100%">
                            <td colspan="2" style="font-weight: bold;padding-bottom: 10px">Loading address:</td>
                        </tr>
                        <tr style="width:100%">
                            <td colspan="2" style="color: #000;padding-bottom: 15px">
                                Street
                                {{ $proposalTourPlan[$i + 1]->streetNumber ?? '' }}
                            </td>
                        </tr>
                        <tr style="width:100%;color: #000">
                            <td style="padding-bottom: 10px">{{ $proposalTourPlan[$i + 1]->cim ?? '' }}</td>
                        </tr>
                        <tr style="width:100%;color: #000">
                            <td style="padding-bottom: 30px">{{ $proposalTourPlan[$i + 1]->country ?? '' }}</td>
                        </tr>
                        <tr style="width:100%">
                            <td style="width: 60%;padding-bottom: 15px">
                                <div>
                                    <span style="padding-right:10px">Lift</span> <input class="checkbox"
                                        type="checkbox" @if ($proposalTourPlan[$i + 1]->lift === 1) checked @endif>
                                </div>
                            </td>
                            <td style="width:
                            40%;font-weight:bold;padding-bottom: 15px'">
                                Additional services:</td>
                        </tr>
                        <tr style="width:100%">
                            <td style="width: 60%;padding-bottom: 15px">
                                <div>
                                    <span style="padding-right:10px">Access road</span> <input class="checkbox"
                                        type="checkbox" />
                                </div>
                            </td>
                            <td style="width: 40%;padding-bottom: 15px'">
                                <div>
                                    <span style="padding-right:10px">HVZ/approval</span> <input class="checkbox"
                                        type="checkbox" @if ($proposalTourPlan[$i + 1]->kozteruleti_ugyintezes === 1) checked @endif />
                                </div>
                            </td>
                        </tr>
                        <tr style="width:100%">
                            <td style="width: 60%;padding-bottom: 15px">
                                <div>
                                    <span style="padding-right:10px">Slow path</span> <input class="checkbox"
                                        type="checkbox" />
                                </div>
                            </td>
                            <td style="width: 40%;padding-bottom: 15px">
                                <div>
                                    <span style="padding-right:10px">Stecklift/AAZ</span> <input class="checkbox"
                                        type="checkbox" @if ($proposalLogistic[0]->butorlift >= 1 || $proposalLogistic[0]->kulso_lift_kezelovel >= 1) checked @endif />


                                </div>
                            </td>
                        </tr>
                        <tr style="width:100%">
                            <td
                                style="width: 60%;padding-bottom: 15px
                             @if (count($proposalTourPlan[$i + 1]->image) == 0) padding-bottom:30px @endif
                             ">
                                <div>
                                    <span style="padding-right:10px">Special features</span> <input class="checkbox"
                                        type="checkbox" />
                                </div>
                            </td>
                        </tr>
                        <tr style="width:100%">
                            <td style="width: 100%;padding-top: 15px;padding-bottom:30px;" colspan="2">
                                @foreach ($proposalTourPlan[$i + 1]->image as $index => $image)
                                    @if ($index < 6)
                                        <img height="100" src="{{ 'data:image/png;base64,' . $image->image }}" />
                                    @endif
                                    {{-- <img height="100" src="{{ 'data:image/png;base64,' . $image->image }}" /> --}}
                                @endforeach
                            </td>
                        </tr>

                    </table>
                    @php
                        $i = $i + 1;
                    @endphp
                @endif


            </div>

            <img src="./images/blue-waves-bottom.png" style="position: absolute;bottom:-200px;left:-80px" />
            <footer>
                <div style="display: inline-block;margin-left:30px;margin-top:35px">
                    <img src="./images/icon-mail-green.png" height="25" />
                    <span style="margin:0 15px 7px 4px">manager address</span>
                </div>
                <div style="display: inline-block">
                    <img src="./images/icon-mobile-green.png" height="25" />
                    <span style="margin:0 15px 7px 4px">phone number</span>
                </div>
                <div style="display: inline-block">
                    <img src="./images/icon-web-green.png" height="25" />
                    <span style="margin:0 15px 7px 4px">website link</span>
                </div>
                <div style="display: inline-block;margin-left:20px;">
                    <img src="./images/logo-footer.png" height="35" style="margin:0 0" />
                </div>

            </footer>
        </div>
    @endfor

    {{-- Packing Materials --}}
    <div class="container">
        <header>
            <div style="z-index: 1003"></div>
            <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
            <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
            <img src="./images/3.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
            <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Your information regarding the move
            </h2>
        </header>

        <div style="margin-left:40px; margin:right:40px">

            <table style="margin-top: 160px;width:100%;z-index:1300; font-size:16px;">
                <tr style="width:100%">
                    <td colspan="4" style="font-weight: bold;padding-bottom: 10px">Description De-Remontagen:
                    </td>
                </tr>
                <tr style="width:100%">
                    <td colspan="4" style="color:#000;font-weight:500;line-height:25px;padding-bottom: 10px">
                        <div style="background: #e6eef0;padding:5px; border-radius:10px;">
                            “Lorem
                            ipsum dolor sit
                            amet,
                            consectetur adipiscing elit. In eu magna eu nulla bibendum rhoncus eu non ipsum.
                            Pellentesque
                            habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Pellentesque
                            aliquam lectus vel mauris scelerisque, ac accumsan nisi dictum. Aenean imperdiet est quis
                            turpis
                            tempor commodo. Etiam bibendum nisi vel diam hendrerit dapibus. Donec in eros in tortor
                            dignissim condimentum. Cras pretium tempus pulvinar. Suspendisse rutrum, nisl in lobortis
                            cursus, felis lacus auctor libero, vulputate facilisis eros sapien et ipsum. Donec maximus,
                            magna a ultricies pharetra, leo nisl maximus lorem, scelerisque imperdiet felis metus nec
                            enim.”
                        </div>
                    </td>
                </tr>
            </table>

            <table style="margin-top: 10px;width:100%;z-index:1300; font-size:16px;">
                <tr style="width:100%">
                    <td colspan="4" style="font-weight: bold;padding-bottom: 10px">Packmittel:
                    </td>
                </tr>
                @foreach ($propsoalPackingMaterials as $pMaterial)
                    <tr style="width:100%">
                        <td colspan="2" style="font-weight: normal;padding-bottom: 10px; ">
                            <span style="background: #cddde1; padding:5px;border-radius:5px;">
                                {{ $pMaterial->verpackungs_material }}</span>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>


        <img src="./images/blue-waves-bottom.png" style="position: absolute;bottom:-200px;left:-80px" />
        <footer>
            <div style="display: inline-block;margin-left:30px;margin-top:35px">
                <img src="./images/icon-mail-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">manager address</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-mobile-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">phone number</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-web-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">website link</span>
            </div>
            <div style="display: inline-block;margin-left:20px;">
                <img src="./images/logo-footer.png" height="35" style="margin:0 0" />
            </div>

        </footer>
    </div>

    {{-- Date of moving --}}
    <div class="container">
        <header>
            <div style="z-index: 1003"></div>
            <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
            <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
            <img src="./images/4.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
            <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Your information regarding the move
            </h2>
        </header>
        <div style="margin-left:40px; margin:right:40px">
            <table style="margin-top: 180px;width:100%;z-index:1300; font-size:18px;">
                <tr style="width:100%">
                    <td colspan="1" style="font-weight: bold;padding-bottom: 10px">Moving time:
                    </td>
                    <td colspan="1"
                        style="font-weight: normal;padding-bottom: 10px;font-size:24px;text-align:left">
                        @if (count($proposalLogistic) > 0)
                            {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                        @endif
                    </td>
                </tr>
            </table>

            <table style="margin-top: 100px;width:100%;z-index:1300; font-size:16px;">
                @php
                    $count = count($proposalTourPlan);
                @endphp

                @for ($i = 1; $i <= $count - 1; $i = $i + 1)
                    <tr style="width:100%">
                        <td colspan="1" style="font-weight: bold;padding-bottom: 10px">{{ $i }}.
                            Moving day:
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 10px">
                            <span style="padding-bottom: 15px;font-size:24px;">
                                @if (count($proposalLogistic) > 0)
                                    {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                                @endif
                            </span><br />
                        </td>
                    </tr>
                    <tr style="width:100%">
                        <td colspan="1" style="font-weight: bold;padding-bottom: 10px">
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 10px">
                            <span style="padding-bottom: 15px"></span><br />
                        </td>
                    </tr>
                    {{--  --}}
                @endfor


            </table>

            <table style="margin-top: 40px;width:100%;z-index:1300; font-size:16px;">
                <tr style="width:100%">
                    <td colspan="4" style="font-weight: bold;padding-bottom: 10px">Miscellaneous:
                    </td>
                </tr>
                <tr style="width:100%">
                    <td colspan="4" style="color:#000;font-weight:00;line-height:25px;padding-bottom: 10px">
                        <div style="background: #e6eef0;padding:10px; border-radius:10px;">
                            “Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eu magna eu nulla bibendum
                            rhoncus eu non ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada
                            fames ac turpis egestas. Pellentesque aliquam lectus vel mauris scelerisque, ac accumsan
                            nisi dictum. Aenean imperdiet est quis turpis tempor commodo.”
                        </div>
                    </td>
                </tr>
            </table>

        </div>

        <img src="./images/blue-waves-bottom.png" style="position: absolute;bottom:-200px;left:-80px" />
        <footer>
            <div style="display: inline-block;margin-left:30px;margin-top:35px">
                <img src="./images/icon-mail-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">manager address</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-mobile-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">phone number</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-web-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">website link</span>
            </div>
            <div style="display: inline-block;margin-left:20px;">
                <img src="./images/logo-footer.png" height="35" style="margin:0 0" />
            </div>

        </footer>
    </div>

    {{-- Price Quote --}}

    @php
        $row = 1;
    @endphp

    @if ($sumChecked > 17)
        @include('Invoice.summary-17', [
            'proposalTourPlan' => $proposalTourPlan,
            // 'tourPlanLength' => $tourPlanLength,
        ])
    @elseif ($sumChecked > 11)
        @include('Invoice.summary-11', [
            'proposalTourPlan' => $proposalTourPlan,
            // 'tourPlanLength' => $tourPlanLength,
        ])
    @else
        @include('Invoice.summary', [
            'proposalTourPlan' => $proposalTourPlan,
            // 'tourPlanLength' => $tourPlanLength,
        ])
    @endif




    {{-- Versicherung --}}

    <div class="container">
        <header>
            <div style="z-index: 1003"></div>
            <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
            <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
            <img src="./images/6.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
            <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Your information regarding the move
            </h2>
        </header>
        <div style="margin-left:40px; margin:right:40px">
            <table style="margin-top: 180px;width:100%;z-index:1300; font-size:16px;">
                <tr style="width:100%">
                    <td colspan="3" style="font-weight: normal;padding-bottom: 5px">
                        <h2>Offer for <span style="font-weight: bold">
                                @if (count($proposalData) > 0)
                                    {{ $proposalData[0]->vezeteknev . ' ' . $proposalData[0]->keresztnev }}
                                @endif
                            </span></h2>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 2px;text-align:right">
                        Offer number:<br />
                        @if (count($proposalLogistic) > 0)
                            {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                        @endif
                    </td>
                </tr>
                <tr style="width:100%">date
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">

                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 15px;text-align:right">
                        Offer date:<br />
                        @if (count($proposalLogistic) > 0)
                            {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                        @endif
                    </td>
                </tr>

                <tr style="width:100%">Date
                    <td colspan="3" style="font-weight: normal;padding-bottom: 5px;color:#000">
                        For the execution of a move
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        Valid until:<br />
                        @if (count($proposalLogistic) > 0)
                            {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                        @endif
                    </td>
                </tr>

                @php
                    $tourPlanLength = count($proposalTourPlan);
                @endphp
                @if ($tourPlanLength > 2)
                    <tr style="width:100%">date
                        <td colspan="3" style="padding-bottom: 5px;color:#000">
                            <span style="font-weight: bold;margin-right: 20px">von</span>
                            <span
                                style="font-weight: normal;margin-right: 20px">{{ trim($proposalTourPlan[0]->streetNumber) }}
                            </span>
                            <span
                                style="font-weight: normal;margin-right: 20px">{{ trim($proposalTourPlan[0]->cim) }}</span>
                            <span style="font-weight: normal;margin-right: 20px">
                                {{ trim($proposalTourPlan[0]->megallo) }}EG</span>
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        </td>
                    </tr>
                    <tr style="width:100%">date
                        <td colspan="3" style="padding-bottom: 5px;color:#000">
                            <span style="font-weight: bold;margin-right: 12px">after</span>
                            <span
                                style="font-weight: normal;margin-right: 20px">{{ trim($proposalTourPlan[1]->streetNumber) }}
                            </span>
                            <span
                                style="font-weight: normal;margin-right: 20px">{{ trim($proposalTourPlan[1]->cim) }}</span>
                            <span style="font-weight: normal;margin-right: 20px">EG +
                                {{ trim($proposalTourPlan[1]->megallo) }}m</span>
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        </td>
                    </tr>
                @else
                    @if ($tourPlanLength > 1)
                        <tr style="width:100%">date
                            <td colspan="3" style="padding-bottom: 5px;color:#000">
                                <span style="font-weight: bold;margin-right: 20px">from</span>
                                <span
                                    style="font-weight: normal;margin-right: 20px">{{ $proposalTourPlan[0]->streetNumber }}
                                </span>
                                <span
                                    style="font-weight: normal;margin-right: 20px">{{ $proposalTourPlan[0]->cim }}</span>
                                <span style="font-weight: normal;margin-right: 20px">
                                    {{ $proposalTourPlan[0]->megallo }}EG</span>
                            </td>
                            <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">

                            </td>
                        </tr>
                    @endif
                @endif

            </table>

        </div>

        <div style="margin-left:40px; margin:right:40px">
            <table style="margin-top: 100px;width:100%;z-index:1300; font-size:16px;">
                <tr style="width:100%">

                    <td colspan="2"
                        style="font-weight: bold;padding-left:300px;padding-bottom: 2px;text-align:left">
                        Insurance:<br />
                        <p style="background:#e6eef0; padding:10px;line-height:24px;font-weight:normal;color:#000">
                        Bla bla bla bla bla bla
                        I/we have taken note of the appendix "Liability information for removal companies in accordance with Section 451g of the German Commercial Code"
                        and the supplementary "General Terms and Conditions" as part of this contract.
                        If the recipient of the removal goods is a third party,
                        I/we will inform them how they should behave upon delivery and in the event of damage in order to prevent claims for damages from becoming void.
                        </p>
                    </td>
                </tr>
            </table>
        </div>


        <img src="./images/blue-waves-bottom.png" style="position: absolute;bottom:-200px;left:-80px" />
        <img src="./images/box-plant.png" style="position: absolute;bottom:0px;left:0px;" />

        <footer>
            <div style="display: inline-block;margin-left:30px;margin-top:35px">
                <img src="./images/icon-mail-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">manager address</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-mobile-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">phone number</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-web-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">website link</span>
            </div>
            <div style="display: inline-block;margin-left:20px;">
                <img src="./images/logo-footer.png" height="35" style="margin:0 0" />
            </div>

        </footer>
    </div>


    {{-- Whonimmer --}}
    @php
        $proposalItemsCount = count($proposalItems);
    @endphp

    @foreach ($proposalItems as $index => $proposalItem)
        <div class="container">
            <header>
                <div style="z-index: 1003"></div>
                <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
                <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
                <img src="./images/7.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
                <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Your information regarding the move
                </h2>
            </header>
            <div style="margin-left:40px; margin:right:40px">
                <table style="margin-top: 180px;width:100%;z-index:1300; font-size:16px;">
                    <tr style="width:100%">
                        <td colspan="3" style="font-weight: normal;padding-bottom: 5px">
                            <h2>Offer for <span style="font-weight: bold">Customer name</span></h2>
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 2px;text-align:right">
                            Offer number:<br />
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                    </tr>
                    <tr style="width:100%">date
                        <td colspan="3" style="font-weight: bold;padding-bottom: 5px">

                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 15px;text-align:right">
                            Offer date:<br />
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                    </tr>

                    <tr style="width:100%">date
                        <td colspan="3" style="font-weight: normal;padding-bottom: 5px;color:#000">
                            For the execution of a move
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                            Valid until:<br />
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                    </tr>

                    {{-- address --}}


                    <tr style="width:100%">date
                        <td colspan="3" style="padding-bottom: 5px;color:#000">
                            <span style="font-weight: bold;margin-right: 20px">von</span>
                            <span style="font-weight: normal;margin-right: 20px">
                                @if (count($proposalTourPlan) > $index + 1)
                                    {{ trim($proposalTourPlan[$index + 1]->streetNumber) }}
                                @endif
                            </span>
                            <span style="font-weight: normal;margin-right: 20px">
                                @if (count($proposalTourPlan) > $index + 1)
                                    {{ trim($proposalTourPlan[$index + 1]->cim) }}
                                @endif
                            </span>
                            <span style="font-weight: normal;margin-right: 20px">
                                @if (count($proposalTourPlan) > $index + 1)
                                    @if (trim($proposalTourPlan[$index + 1]->megallo) != '')
                                        EG
                                        + {{ trim($proposalTourPlan[$index + 1]->megallo) . 'm' }}
                                    @endif
                                @endif

                            </span>
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        </td>
                    </tr>
                    <tr style="width:100%">date
                        <td colspan="3" style="padding-bottom: 5px;color:#000">
                            <span style="font-weight: bold;margin-right: 12px">after</span>
                            <span style="font-weight: normal;margin-right: 20px">
                                @if (count($proposalTourPlan) > $index + 2)
                                    {{ trim($proposalTourPlan[$index + 2]->streetNumber) }}
                                @endif
                            </span>
                            <span style="font-weight: normal;margin-right: 20px">
                                @if (count($proposalTourPlan) > $index + 2)
                                    {{ trim($proposalTourPlan[$index + 2]->cim) }}
                                @endif
                            </span>
                            <span style="font-weight: normal;margin-right: 20px">
                                @if (count($proposalTourPlan) > $index + 2)
                                    @if (trim($proposalTourPlan[$index + 2]->megallo) != '')
                                        EG + {{ trim($proposalTourPlan[$index + 2]->megallo) . 'm' }}
                                    @endif
                                @endif
                            </span>
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        </td>
                    </tr>
                </table>
                {{-- address --}}

            </div>
            <div style="margin-left:40px; margin:right:40px">
                <table class="item-table" cellpadding="0" cellspacing="0" sty>
                    <thead style="font-weight: normal;">
                        <th style="width: 13rem;font-size:18px;color:#000;text-align:left">
                            No. Description
                        </th>
                        <th>
                            <p class="rotate">Dismantling</p>
                        </th>
                        <th>
                            <p class="rotate">Montage</p>
                        </th>

                        <th>
                            <p class="rotate">Einpacken</p>
                        </th>
                        <th>
                            <p class="rotate">Unpacking</p>
                        </th>
                        <th>
                            <p class="rotate">Packaging</p>
                        </th>
                        <th>
                            <p class="rotate">Damaged</p>
                        </th>
                        <th>
                            <p class="rotate">Dispose</p>
                        </th>
                        <th>
                            <p class="rotate">Storage</p>
                        </th>
                        <th>
                            <p class="rotate">Land</p>
                        </th>
                        <th>
                            <p class="rotate">See</p>
                        </th>
                        <th>
                            <p class="rotate">Remains</p>
                        </th>
                        <th style="padding:0;padding-top:18px">
                            <p style="padding:0;padding-top:18px;text-align:center">RE</p>
                        </th>
                        <th style="width: 80px;padding:0;padding-top:18px;padding-right:40px;">
                            <p style="width: 80px;padding:0;padding-top:18px;text-align:center">RE total</p>
                        </th>
                    </thead>
                    <tbody style="font-size: 15px;">
                        @foreach ($proposalItem->items as $item)
                            <tr>
                                <td style="padding-bottom:5px;">{{ $item->targy_neve }}</td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox"
                                        @if ($item->demontage_checked === 1) checked @endif>
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox"
                                        @if ($item->montage_checked === 1) checked @endif>
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox"
                                        @if ($item->einpacken_checked === 1) checked @endif>
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox"
                                        @if ($item->auspacken_checked === 1) checked @endif>
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox"
                                        @if ($item->luftpolsterfol_checked === 1) checked @endif>
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox" />
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox"
                                        @if ($item->einlagern_checked === 1) checked @endif>
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox"
                                        @if ($item->demontage_checked === 1) checked @endif>
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox">
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox" />
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    <input class="checkbox" type="checkbox" />
                                </td>
                                <td style="text-align: center;padding-bottom:5px;">
                                    {{ number_format($item->gegenstand, 2) }}</td>
                                <td style="text-align: left;width: 80px;padding-left: 20px;padding-bottom:5px;">
                                    {{ number_format($item->zwischensum, 2) }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>






            <img src="./images/blue-waves-bottom.png" style="position: absolute;bottom:-200px;left:-80px" />

            <div style="position: absolute; bottom:100px;right:30px">
                <p style="border-bottom: 1px dashed #000; width:200px"></p>

            </div>
            <footer>
                <div style="display: inline-block;margin-left:30px;margin-top:35px">
                    <img src="./images/icon-mail-green.png" height="25" />
                    <span style="margin:0 15px 7px 4px">manager address</span>
                </div>
                <div style="display: inline-block">
                    <img src="./images/icon-mobile-green.png" height="25" />
                    <span style="margin:0 15px 7px 4px">phone number</span>
                </div>
                <div style="display: inline-block">
                    <img src="./images/icon-web-green.png" height="25" />
                    <span style="margin:0 15px 7px 4px">website link</span>
                </div>
                <div style="display: inline-block;margin-left:20px;">
                    <img src="./images/logo-footer.png" height="35" style="margin:0 0" />
                </div>

            </footer>
        </div>
    @endforeach


    {{-- Schlafzimmer --}}
    {{-- <div class="container">
        <header>
            <div style="z-index: 1003"></div>
            <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
            <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
            <img src="./images/8.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
            <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Ihre Informationen bezüglich
                des Umzugs
            </h2>
        </header>

        <div style="margin-left:40px; margin:right:40px">
            <table style="margin-top: 180px;width:100%;z-index:1300; font-size:16px;">
                <tr style="width:100%">
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">
                        <h2>Angebot for<span style="font-weight: bold">Kundename !</span></h2>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        Angebotsnummer:<br />
                        date
                    </td>
                </tr>
                <tr style="width:100%">date
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">

                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        Angebotsnummer:<br />
                        date
                    </td>
                </tr>

                <tr style="width:100%">date
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">
                        Für die Durchführung eines Umzuges
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        Angebotsnummer:<br />
                        date
                    </td>
                </tr>

                <tr style="width:100%">date
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">
                        <span style="margin-right: 20px">von</span>
                        <span style="margin-right: 20px">88212 Ravensburg </span>
                        <span style="margin-right: 20px">Gartenstraße 17</span>
                        <span style="margin-right: 20px">EG</span>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">

                    </td>
                </tr>
                <tr style="width:100%">date
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">
                        <span style="margin-right: 20px">von</span>
                        <span style="margin-right: 20px">88212 Ravensburg </span>
                        <span style="margin-right: 20px">Gartenstraße 17</span>
                        <span style="margin-right: 20px">EG + 20m</span>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                    </td>
                </tr>
            </table>

        </div>

        <img src="./images/blue-waves-bottom.png" style="position: absolute;bottom:-200px;left:-80px" />
        <footer>
            <div style="display: inline-block;margin-left:30px;margin-top:35px">
                <img src="./images/icon-mail-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">manager address</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-mobile-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">phone number</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-web-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">website link</span>
            </div>
            <div style="display: inline-block;margin-left:20px;">
                <img src="./images/logo-footer.png" height="35" style="margin:0 0" />
            </div>

        </footer>
    </div> --}}

    {{-- Kuche --}}
    {{-- <div class="container">
        <header>
            <div style="z-index: 1003"></div>
            <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
            <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
            <img src="./images/9.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
            <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Ihre Informationen bezüglich
                des Umzugs
            </h2>
        </header>
        <div style="margin-left:40px; margin:right:40px">
            <table style="margin-top: 180px;width:100%;z-index:1300; font-size:16px;">
                <tr style="width:100%">
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">
                        <h2>Angebot for<span style="font-weight: bold">Kundename !</span></h2>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        Angebotsnummer:<br />
                        date
                    </td>
                </tr>
                <tr style="width:100%">date
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">

                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        Angebotsnummer:<br />
                        date
                    </td>
                </tr>

                <tr style="width:100%">date
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">
                        Für die Durchführung eines Umzuges
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                        Angebotsnummer:<br />
                        date
                    </td>
                </tr>

                <tr style="width:100%">date
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">
                        <span style="margin-right: 20px">von</span>
                        <span style="margin-right: 20px">88212 Ravensburg </span>
                        <span style="margin-right: 20px">Gartenstraße 17</span>
                        <span style="margin-right: 20px">EG</span>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">

                    </td>
                </tr>
                <tr style="width:100%">date
                    <td colspan="3" style="font-weight: bold;padding-bottom: 5px">
                        <span style="margin-right: 20px">von</span>
                        <span style="margin-right: 20px">88212 Ravensburg </span>
                        <span style="margin-right: 20px">Gartenstraße 17</span>
                        <span style="margin-right: 20px">EG + 20m</span>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                    </td>
                </tr>
            </table>

        </div>


        <img src="./images/blue-waves-bottom.png" style="position: absolute;bottom:-200px;left:-80px" />
        <footer>
            <div style="display: inline-block;margin-left:30px;margin-top:35px">
                <img src="./images/icon-mail-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">manager address</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-mobile-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">phone number</span>
            </div>
            <div style="display: inline-block">
                <img src="./images/icon-web-green.png" height="25" />
                <span style="margin:0 15px 7px 4px">website link</span>
            </div>
            <div style="display: inline-block;margin-left:20px;">
                <img src="./images/logo-footer.png" height="35" style="margin:0 0" />
            </div>

        </footer>
    </div> --}}

</body>

</html>
