<div class="container">
    <header>
        <div style="z-index: 1003"></div>
        <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
        <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
        <img src="./images/5.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
        <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Your information regarding the move
        </h2>
    </header>

    <div style="margin-left:40px; margin:right:40px">
        <table style="margin-top: 160px;width:100%;z-index:1300; font-size:16px;">
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

            <tr style="width:100%">date
                <td colspan="3" style="font-weight: bold;padding-bottom: 5px;">
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
                <tr style="width:100%">
                    <td colspan="3" style="padding-bottom: 5px;">
                        <span style="font-weight: bold;margin-right: 20px">from</span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[0]->streetNumber) }}
                        </span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[0]->cim) }}</span>
                        <span style="font-weight: bold;margin-right: 20px">
                            {{ trim($proposalTourPlan[0]->megallo) }}EG</span>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                    </td>
                </tr>
                <tr style="width:100%">date
                    <td colspan="3" style="padding-bottom: 5px;">
                        <span style="font-weight: bold;margin-right: 12px">after</span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[1]->streetNumber) }}
                        </span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[1]->cim) }}</span>
                        <span style="font-weight: bold;margin-right: 20px">EG +
                            {{ trim($proposalTourPlan[1]->megallo) }}m</span>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                    </td>
                </tr>
            @else
                @if ($tourPlanLength > 1)
                    <tr style="width:100%">date
                        <td colspan="3" style="padding-bottom: 5px;">
                            <span style="font-weight: bold;margin-right: 20px">from</span>
                            <span style="font-weight: bold;margin-right: 20px">{{ $proposalTourPlan[0]->streetNumber }}
                            </span>
                            <span style="font-weight: bold;margin-right: 20px">{{ $proposalTourPlan[0]->cim }}</span>
                            <span style="font-weight: bold;margin-right: 20px">
                                {{ $proposalTourPlan[0]->megallo }}EG</span>
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">

                        </td>
                    </tr>
                @endif
            @endif

        </table>

    </div>
    <div style="margin-left:10px; margin:right:10px">
        <table id="table-quote"
            style="margin-top: 40px;width:100%;z-index:1300; font-size:14px;border-collapse : collapse">
            <tr style="width:100%;background:#065567;color:#fff; ">
                <td colspan="3"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                    Description
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Date
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Crowd
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Unit
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Unit price
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    USt. %
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right;padding-right:20px;">
                    Amount
                </td>
            </tr>

            @if (count($proposalSummery) > 0)

                {{-- utvonal ar --}}
                @if ($proposalSummery[0]->utvonal_ar_checked == 1)

                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Travel costs
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->utvonal_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->utvonal_ar + ($proposalSummery[0]->utvonal_ar * 19) / 100, 2) }}€
                        </td>
                    </tr>
                @endif
                {{-- alacsony ar --}}
                @if ($proposalSummery[0]->alacsony_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Floor price
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->alacsony_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->alacsony_ar + ($proposalSummery[0]->alacsony_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- stop ar --}}
                @if ($proposalSummery[0]->stop_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Stop price

                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->stop_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->stop_ar + ($proposalSummery[0]->stop_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- nincs zone ar --}}
                @if ($proposalSummery[0]->nincs_zone_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            No stopping zone <br /> (approved, established) price

                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->nincs_zone_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->nincs_zone_ar + ($proposalSummery[0]->nincs_zone_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- bonstasi ar --}}
                @if ($proposalSummery[0]->bonstasi_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Demolition price
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->bonstasi_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->bonstasi_ar + ($proposalSummery[0]->bonstasi_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- telepitesi ar --}}
                @if ($proposalSummery[0]->telepitesi_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Installation price

                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->telepitesi_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->telepitesi_ar + ($proposalSummery[0]->telepitesi_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif




            @endif
        </table>
    </div>


    <img src="./images/blue-waves-bottom.png" style="position: fixed;bottom:-200px;left:-80px" />
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
<div class="container">
    <header>
        <div style="z-index: 1003"></div>
        <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
        <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
        <img src="./images/5.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
        <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Your information regarding the move
        </h2>
    </header>

    <div style="margin-left:40px; margin:right:40px">
        <table style="margin-top: 160px;width:100%;z-index:1300; font-size:16px;">
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

            <tr style="width:100%">date
                <td colspan="3" style="font-weight: bold;padding-bottom: 5px;">
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
                <tr style="width:100%">
                    <td colspan="3" style="padding-bottom: 5px;">
                        <span style="font-weight: bold;margin-right: 20px">from</span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[0]->streetNumber) }}
                        </span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[0]->cim) }}</span>
                        <span style="font-weight: bold;margin-right: 20px">
                            {{ trim($proposalTourPlan[0]->megallo) }}EG</span>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                    </td>
                </tr>
                <tr style="width:100%">date
                    <td colspan="3" style="padding-bottom: 5px;">
                        <span style="font-weight: bold;margin-right: 12px">after</span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[1]->streetNumber) }}
                        </span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[1]->cim) }}</span>
                        <span style="font-weight: bold;margin-right: 20px">EG +
                            {{ trim($proposalTourPlan[1]->megallo) }}m</span>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                    </td>
                </tr>
            @else
                @if ($tourPlanLength > 1)
                    <tr style="width:100%">date
                        <td colspan="3" style="padding-bottom: 5px;">
                            <span style="font-weight: bold;margin-right: 20px">from</span>
                            <span style="font-weight: bold;margin-right: 20px">{{ $proposalTourPlan[0]->streetNumber }}
                            </span>
                            <span style="font-weight: bold;margin-right: 20px">{{ $proposalTourPlan[0]->cim }}</span>
                            <span style="font-weight: bold;margin-right: 20px">
                                {{ $proposalTourPlan[0]->megallo }}EG</span>
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">

                        </td>
                    </tr>
                @endif
            @endif

        </table>

    </div>
    <div style="margin-left:10px; margin:right:10px">
        <table id="table-quote"
            style="margin-top: 40px;width:100%;z-index:1300; font-size:14px;border-collapse : collapse">
            <tr style="width:100%;background:#065567;color:#fff; ">
                <td colspan="3"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                    Description
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Date
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Crowd
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Unit
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Unit price
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    USt. %
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right;padding-right:20px;">
                    Amount
                </td>
            </tr>

            @if (count($proposalSummery) > 0)

                {{-- Nehéz rakomány felár --}}
                @if ($proposalSummery[0]->nehez_rakomany_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Heavy cargo surcharge
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->nehez_rakomany_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->nehez_rakomany_ar + ($proposalSummery[0]->nehez_rakomany_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif
                {{-- csomagolasi ar --}}
                @if ($proposalSummery[0]->csomagolasi_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Packaging price

                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->csomagolasi_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->csomagolasi_ar + ($proposalSummery[0]->csomagolasi_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- buborekfolio ar --}}
                @if ($proposalSummery[0]->buborekfolio_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Blister price

                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->buborekfolio_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->buborekfolio_ar + ($proposalSummery[0]->buborekfolio_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- butoremelo_ar --}}
                @if ($proposalSummery[0]->butoremelo_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Furniture lifting price
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->butoremelo_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->butoremelo_ar + ($proposalSummery[0]->butoremelo_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- Külső lift ára, kezelővel --}}
                @if ($proposalSummery[0]->kulso_lift_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Price of external elevator, with operator
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->kulso_lift_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->kulso_lift_ar + ($proposalSummery[0]->kulso_lift_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- Bolti ár --}}
                @if ($proposalSummery[0]->bolti_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            The price of loading and unloading
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->bolti_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->bolti_ar + ($proposalSummery[0]->bolti_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif


            @endif
        </table>
    </div>


    <img src="./images/blue-waves-bottom.png" style="position: fixed;bottom:-200px;left:-80px" />
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
<div class="container">
    <header>
        <div style="z-index: 1003"></div>
        <img src="./images/logo-footer.png" style="top: 20px; left:40px;z-index:1004" height="20" />
        <img src="./images/blue-waves-top1.png" style="top: -120px;z-index:1002" />
        <img src="./images/5.png" height="100px" style="top: 40px; left:700px;  z-index:1004" />
        <h2 style="color:white;position: absolute; left:40px; top:35px;z-index:1004">Your information regarding the move
        </h2>
    </header>

    <div style="margin-left:40px; margin:right:40px">
        <table style="margin-top: 160px;width:100%;z-index:1300; font-size:16px;">
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

            <tr style="width:100%">date
                <td colspan="3" style="font-weight: bold;padding-bottom: 5px;">
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
                <tr style="width:100%">
                    <td colspan="3" style="padding-bottom: 5px;">
                        <span style="font-weight: bold;margin-right: 20px">from</span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[0]->streetNumber) }}
                        </span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[0]->cim) }}</span>
                        <span style="font-weight: bold;margin-right: 20px">
                            {{ trim($proposalTourPlan[0]->megallo) }}EG</span>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                    </td>
                </tr>
                <tr style="width:100%">date
                    <td colspan="3" style="padding-bottom: 5px;">
                        <span style="font-weight: bold;margin-right: 12px">after</span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[1]->streetNumber) }}
                        </span>
                        <span style="font-weight: bold;margin-right: 20px">{{ trim($proposalTourPlan[1]->cim) }}</span>
                        <span style="font-weight: bold;margin-right: 20px">EG +
                            {{ trim($proposalTourPlan[1]->megallo) }}m</span>
                    </td>
                    <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">
                    </td>
                </tr>
            @else
                @if ($tourPlanLength > 1)
                    <tr style="width:100%">date
                        <td colspan="3" style="padding-bottom: 5px;">
                            <span style="font-weight: bold;margin-right: 20px">from</span>
                            <span style="font-weight: bold;margin-right: 20px">{{ $proposalTourPlan[0]->streetNumber }}
                            </span>
                            <span style="font-weight: bold;margin-right: 20px">{{ $proposalTourPlan[0]->cim }}</span>
                            <span style="font-weight: bold;margin-right: 20px">
                                {{ $proposalTourPlan[0]->megallo }}EG</span>
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right">

                        </td>
                    </tr>
                @endif
            @endif

        </table>

    </div>
    <div style="margin-left:10px; margin:right:10px">
        <table id="table-quote"
            style="margin-top: 40px;width:100%;z-index:1300; font-size:14px;border-collapse : collapse">
            <tr style="width:100%;background:#065567;color:#fff; ">
                <td colspan="3"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                    Description
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Date
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Crowd
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Unit
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    Unit price
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                    USt. %
                </td>
                <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right;padding-right:20px;">
                    Amount
                </td>
            </tr>

            @if (count($proposalSummery) > 0)

                {{-- Személyzeti ár --}}
                @if ($proposalSummery[0]->szemelyzeti_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Staff price
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->szemelyzeti_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->szemelyzeti_ar + ($proposalSummery[0]->szemelyzeti_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif
                {{-- kuchenmonteur ár --}}
                @if ($proposalSummery[0]->kuchenmonteur_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Kitchen fitter price
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->kuchenmonteur }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->kuchenmonteur + ($proposalSummery[0]->kuchenmonteur * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif


                {{-- Konyhaszerelő ár --}}
                @if ($proposalSummery[0]->konyhaszerelo_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Kitchen fitter price
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->konyhaszerelo_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->konyhaszerelo_ar + ($proposalSummery[0]->konyhaszerelo_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- Villanyszerelő ár --}}
                @if ($proposalSummery[0]->villanyszerelo_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Electrician price
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->villanyszerelo_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->villanyszerelo_ar + ($proposalSummery[0]->villanyszerelo_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- Tétel ár --}}
                @if ($proposalSummery[0]->tetal_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Item price
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->tetal_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->tetal_ar + ($proposalSummery[0]->tetal_ar * 19) / 100, 2) }}
                            €
                        </td>
                    </tr>
                @endif

                {{-- Verpackungsmaterial ár --}}
                @if ($proposalSummery[0]->verpackungsmaterial_ar_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Packaging material price

                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->verpackungsmaterial_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->verpackungsmaterial_ar + ($proposalSummery[0]->verpackungsmaterial_ar * 19) / 100, 2) }}
                            €

                        </td>
                    </tr>
                @endif

                {{-- Tárolási ár --}}
                @if ($proposalSummery[0]->tarolasi_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            Storage price
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->tarolasi_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->tarolasi_ar + ($proposalSummery[0]->tarolasi_ar * 19) / 100, 2) }}
                            €

                        </td>
                    </tr>
                @endif
                {{-- extra service --}}
                @if ($proposalSummery[0]->extra_service_checked == 1)
                    <tr style="width:100%;color:#000; ">
                        <td colspan="3"
                            style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                            {{ $proposalSummery[0]->extra_service }}
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            @if (count($proposalLogistic) > 0)
                                {{ $proposalLogistic[0]->plusz_szolgaltatas_date }}
                            @endif
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            1,00
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            h
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            {{ $proposalSummery[0]->extra_service_ar }} €
                        </td>
                        <td colspan="1" style="font-weight: normal;padding-bottom: 5px;text-align:right">
                            19,00 %
                        </td>
                        <td colspan="1" style="font-weight: bold;padding-bottom: 5px;text-align:right;padding-right:20px;">
                            {{ round($proposalSummery[0]->extra_service_ar + ($proposalSummery[0]->extra_service_ar * 19) / 100, 2) }}
                            €

                        </td>
                    </tr>
                @endif
            @endif
        </table>
    </div>
    <div style="margin-left: 10px;margin-right:10px">
        <table style="margin-top: 40px;width:100%;z-index:1300; font-size:16px;border-collapse : collapse">
            <tr style="width:100%; ">
                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:5px;">
                    Bank Name
                </td>

                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:5px;">
                    Bank Name
                </td>
                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:5px;">
                    Net Amount
                </td>

                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:5px;">
                    {{ round($proposalSummery[0]->teljes_ar, 2) }} €
                </td>
            </tr>
            <tr style="width:100%;">
                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                    Account nummer
                </td>

                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                    Account nummer
                </td>
                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                    Rabbat
                </td>

                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                    {{ round(($proposalSummery[0]->teljes_ar * $proposalSummery[0]->kedvezmeny) / 100, 2) }}
                    €
                </td>
            </tr>
            <tr style="width:100%;">
                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                </td>

                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">

                </td>
                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;color:#AB3D1B">
                    USt. 19,00 %
                </td>

                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;color:#AB3D1B">
                    {{ round((($proposalSummery[0]->teljes_ar - ($proposalSummery[0]->teljes_ar * $proposalSummery[0]->kedvezmeny) / 100) * 19) / 100, 2) }}
                    €
                </td>
            </tr>
            <tr style="width:100%;">
                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">

                </td>

                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">

                </td>
                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                    In total
                </td>

                <td colspan="1"
                    style="font-weight: bold;padding-bottom: 5px;padding-left:20px;padding-top:10px;padding-bottom:10px;">
                    {{ round($proposalSummery[0]->teljes_ar + (($proposalSummery[0]->teljes_ar - ($proposalSummery[0]->teljes_ar * $proposalSummery[0]->kedvezmeny) / 100) * 19) / 100 - ($proposalSummery[0]->teljes_ar * $proposalSummery[0]->kedvezmeny) / 100, 2) }}
                    €
                </td>
            </tr>
        </table>

    </div>

    <img src="./images/blue-waves-bottom.png" style="position: fixed;bottom:-200px;left:-80px" />
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