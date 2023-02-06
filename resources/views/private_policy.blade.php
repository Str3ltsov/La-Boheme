@extends('layouts.app')

@section('content')
    <div>
        <div class="d-flex flex-column justify-content-start" style="background-color: #1B3253; min-height: 100vh; padding: 0 2em">
            <div class="d-flex flex-column justify-content-center align-items-center bg-transparent p-4" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-start my-3 mb-5 p-5 fs-5 text-light" style="font-size: 1.1em; background-color: #151515; max-width: 1200px">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start my-3 fs-5">
                        <div class="d-flex flex-column" style="gap: 10px;">
                            <h1>{{ __('Privatumo politika') }}</h1>
                            <h3><strong>{{ __('BENDROVĖS TVARKOMŲ ASMENS DUOMENŲ SAUGUMO POLITIKA') }}</strong></h3>
                            <p>&nbsp;</p>
                            <p>{{ __('Pirkdami') }}&nbsp;<a class="0" download="0" href="https://www.laboheme.lt" rel="noopener noreferrer nofollow" target="_blank" title="0">www.laboheme.lt</a>&nbsp;{{ __('svetainėje Jūs patikite UAB &bdquo;Pramogų pilis&ldquo; (toliau &ndash; Bendrovė, arba mes) savo asmens duomenis ir suteikiate mums teisę juos tvarkyti &scaron;ioje Politikoje (toliau &ndash; Politika) ir Prekių pirkimo &ndash; pardavimo Jammi parduotuvėje internete taisyklėse (toliau &ndash; Taisyklės) numatyta apimtimi, būdais ir tikslais. Savo duomenis Jūs taip pat pateikiate teikdami mums savo atsiliepimus.') }}</p>
                            <p><strong>Jeigu Jūs nesutinkate su Taisyklėmis, &scaron;ia Politika ar atskiromis jų sąlygomis, mes, deja, negalėsime suteikti Jums galimybės naudotis visomis ar bet kuria i&scaron; Bendrovės teikiamų paslaugų (toliau &ndash; Paslaugos)</strong>.</p>
                            <p>&Scaron;ioje Politikoje Jūs rasite visą informaciją, kokius Jūsų duomenis mes renkame ir tvarkome, kam juos naudojame, kiek laiko saugome ir kt. &Scaron;i informacija svarbi, todėl tikimės, kad atidžiai ją perskaitysite.</p>
                            <p>Atkreipiame Jūsų dėmesį į tai, kad Politika gali būti keičiama, pildoma, atnaujinama.</p>
                            <p><strong>Asmens duomenys</strong>&nbsp;&ndash; tai bet kokia informacija, kuri gali būti naudojama identifikuoti asmenį, taip pat bet kokia informacija apie asmenį, kuris jau yra identifikuotas.</p>
                            <p><strong>Mes gerbiame Jūsų privatumą, o Jūsų asmens duomenų saugumas yra mūsų prioritetas. Mes</strong>&nbsp;imamės atitinkamų organizacinių ir techninių priemonių užtikrinti, kad Jūsų asmens duomenys visada būtų saugūs, o duomenų tvarkymo veiksmai atitiktų duomenų apsaugos teisės aktų ir mūsų vidaus politikos reikalavimus.</p>
                            <p><strong>Kokiu tikslu renkami (tvarkomi) asmens duomenys?</strong></p>
                            <p><strong>Bendrovė renka ir tvarko &scaron;ioje Politikoje i&scaron;vardintus Jūsų asmens duomenis &scaron;iais teisiniais pagrindais:</strong></p>
                            <p>&ndash; Jūsų sutikimas su Taisyklėse ir &scaron;ioje Politikoje numatytomis sąlygomis;</p>
                            <p>&ndash; Mūsų teisėtas interesas;</p>
                            <p>&ndash; Teisinės prievolės, kylančios ir taikomos Bendrovei, vykdymas.</p>
                            <p><strong>Taikomų teisės aktų numatyta apimtimi ir sąlygomis tų pačių Jūsų asmens duomenų tvarkymui gali būti taikomas vienas ar keli auk&scaron;čiau nurodyti teisiniai pagrindai.</strong></p>
                            <p><strong>Bendrovė renka ir tvarko &scaron;ioje Politikoje i&scaron;vardintus Jūsų asmens duomenis &scaron;iais teisiniais pagrindais:</strong></p>
                            <p>tvarkydamas asmens duomenis, Bendrovė vadovaujasi Lietuvos Respublikos asmens duomenų teisinės apsaugos įstatyme įtvirtintais asmens duomenų tvarkymo reikalavimais ir kitais teisės aktais, susijusiais su asmens duomenų apsauga, nuo 2018 m. gegužės 25 dienos Bendruoju duomenų apsaugos reglamentu (2016 m. balandžio 27 d. Europos Parlamento ir Tarybos reglamentas (ES) 2016/679 dėl fizinių asmenų apsaugos tvarkant asmens duomenis ir dėl laisvo tokių duomenų judėjimo).</p>
                            <p>Bendrovė renka bei toliau tvarko Jūsų asmens duomenis tik teisės aktuose apibrėžtais teisėtais pagrindais &ndash; siekiant sudaryti ir (ar) vykdyti su Jumis darbo santykių sutartį, Jūsų sutikimu, kai tvarkyti asmens duomenis Bendrovę įpareigoja atitinkami teisės aktai, bei kai asmens duomenis reikia tvarkyti dėl Bendrovės teisėto intereso (tik jei duomenų subjekto interesai nėra svarbesni).</p>
                            <p>Įprastai teisinis pagrindas tvarkyti asmens duomenis yra asmens kandidatavimas į Bendrovės siūlomas pareigas, taip pat pirkėjo pateikiama Užklausa (atsiliepimas). Sutikimas turi būti ai&scaron;kiai i&scaron;reik&scaron;tas, savanori&scaron;kas, suprantamai i&scaron;dėstytas ir jame turi būti pateikta informacija apie duomenų panaudojimo tikslą. Sutikimas tvarkyti asmens duomenis gali būti paprastai ir nemokamai at&scaron;auktas.</p>
                            <p><strong>Taikomų teisės aktų numatyta apimtimi ir sąlygomis tų pačių Jūsų asmens duomenų tvarkymui gali būti taikomas vienas ar keli auk&scaron;čiau nurodyti teisiniai pagrindai.</strong></p>
                            <p><strong>Kokius Jūsų duomenis tvarkome ir kodėl?</strong></p>
                            <p><strong>Jūsų pirkimo duomenų tvarkymas</strong></p>
                            <p>Teikdami Jums Paslaugas ir įvairius privalumus &ndash; sudarydami ir vykdydami pirkimo pardavimo sutartis, atlikdami pinigų grąžinimą (jei Jūs grąžinate įsigytą prekę), suteikdami nuolaidas ir kt. &ndash; mes tvarkome duomenis apie Jūsų pirkimo operacijas (toliau &ndash;&nbsp;<strong>pirkimo duomenys</strong>).</p>
                            <table>
                                <tbody>
                                <tr>
                                    <td colspan="2" rowspan="1">
                                        <p><strong>Paslaugų administravimo tikslu tvarkomi Jūsų pirkimo duomenys:</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" rowspan="1">
                                        <p>Duomenų kategorijos</p>
                                    </td>
                                    <td colspan="1" rowspan="1">
                                        <p>Jūsų vardas, pavardė, el. pa&scaron;to adresas, telefono numeris, pristatymo ir adresas, pirkimo bei pristatymo data ir laikas, prekių pavadinimai, kiekiai, pirkinių kainos ir suteiktos nuolaidos, mokėjimo už pirkinius metodas ir mokėjimų informacija</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" rowspan="1">
                                        <p>Duomenų tvarkymo pagrindas</p>
                                    </td>
                                    <td colspan="1" rowspan="1">
                                        <p>Jūsų sutikimas naudotis paskyra Taisyklėse numatytomis sąlygomis</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" rowspan="1">
                                        <p>Duomenų tvarkymo terminas</p>
                                    </td>
                                    <td colspan="1" rowspan="1">
                                        <p>5 metai nuo pirkimo operacijos atlikimo dienos.</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <p>Kaip mes naudojame Jūsų pirkimo duomenis?</p>
                            <p>Pirkimo duomenis mes saugome 5 metus nuo pirkimo operacijos atlikimo dienos, o terminui pasibaigus &ndash; juos sunaikiname.</p>
                            <p><strong>Klientų užklausų, skundų, pra&scaron;ymų ir atsiliepimų aptarnavimas</strong></p>
                            <p>Mes naudosime Jūsų asmens duomenis atsakydami į Jūsų užklausas, skundus, pra&scaron;ymus ir administruodami Jūsų atsiliepimus (toliau &ndash;&nbsp;<strong>Užklausa</strong>).</p>
                            <table>
                                <tbody>
                                <tr>
                                    <td colspan="2" rowspan="1">
                                        <p><strong>Mūsų pirkėjų atsiliepimų pateikiami duomenys</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" rowspan="1">
                                        <p>Duomenų kategorijos</p>
                                    </td>
                                    <td colspan="1" rowspan="1">
                                        <p>Jūsų įvardinta identifikavimo ir kontaktinė informacija: vardas, telefono numeris, elektroninio pa&scaron;to adresas;</p>
                                        <p>&nbsp;</p>
                                        <p>Jūsų Užklausos turinys: įvykis, dėl kurio kreipiatės, jo aplinkybės, data, vieta, Jūsų pra&scaron;ymas, reikalavimas ar atsiliepimas.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" rowspan="1">
                                        <p>Duomenų tvarkymo teisinis pagrindas</p>
                                    </td>
                                    <td colspan="1" rowspan="1">
                                        <p>Mūsų teisinės pareigos nagrinėti ir atsakyti į vartotojų Užklausas vykdymas, o taip pat mūsų teisėtas interesas vertinti savo klientų atsiliepimus, tikslu gerinti mūsų veiklos ir teikiamų paslaugų kokybę.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1" rowspan="1">
                                        <p>Duomenų tvarkymo terminas</p>
                                    </td>
                                    <td colspan="1" rowspan="1">
                                        <p>Iki 6 mėnesių</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <p>Jūsų duomenis mes naudojame tik tam, kad galėtume tinkamai ir objektyviai i&scaron;nagrinėti Jūsų Užklausą, suteikti Jums reikiamą informaciją, atsakyti į Jūsų klausimus, i&scaron;spręsti Jūsų pra&scaron;ymus ar reikalavimus. Užklausos duomenis mes taip pat galime analizuoti siekdami gerinti mūsų veiklos ir Jums teikiamų paslaugų kokybę, atsižvelgiant į Jūsų nuomonę bei pasiūlymus.</p>
                            <p>Jūsų Užklausą ir su ja susijusius Jūsų duomenis mes tvarkome ir saugome tol, kol i&scaron;nagrinėjame Užklausą, pateikiame Jums atsakymą ir įvykdome priimtus sprendimus, o taip pat dar iki 6 (&scaron;e&scaron;ių) mėnesių po Užklausos i&scaron;sprendimo.</p>
                            <p>Jeigu dėl Užklausos inicijuojamas teisinis ginčas arba yra tokio ginčo tikimybė, mes Jūsų duomenis galime saugoti ilgiau, iki pasibaigs teisės aktuose numatyti skundo pateikimo ar ie&scaron;kinio senaties terminai ir (arba) įsiteisės galutinis sprendimas.</p>
                            <p>Pasibaigus &scaron;ioje Politikoje nustatytam Jūsų duomenų tvarkymo ir saugojimo terminui, mes Jūsų duomenis sunaikinsime.</p>
                            <p><strong>I&scaron; kokių &scaron;altinių mes renkame Jūsų asmens duomenis?</strong></p>
                            <p>Beveik visus Jūsų asmens duomenis mes gauname tik i&scaron; Jūsų. Anketinius duomenis Jūs mums pateikiate tiesiogiai, pvz., pildydamas registracijos anketas.</p>
                            <p>Jūsų duomenis mes taip pat gauname tiesiogiai i&scaron; Jūsų, kai Jūs pateikiate Užklausą bet kuriuo i&scaron; Jūsų pasirinktų būdų: para&scaron;ydami mums elektroninį lai&scaron;ką, pateikdami mums ra&scaron;ytinę užklausą, skambindami į mūsų klientų nusiskundimo telefoną.</p>
                            <p>Jeigu siekiant kokybi&scaron;kai ir objektyviai i&scaron;nagrinėti Jūsų Užklausą mums reikia surinkti papildomą informaciją ar atlikti reik&scaron;mingų aplinkybių tyrimą, mes Jūsų Užklausos duomenis galime susieti su mūsų turimais ir (ar) nagrinėjant Jūsų Užklausą surinktais duomenimis, pvz. pirkimo operacijų duomenis, apklausti mūsų darbuotojus ir pan.</p>
                            <p>Jūsų duomenis mes taip pat gauname vykdydami vaizdo stebėjimą. Duomenys renkami atsižvelgiant į mūsų teisėtą interesą, siekiant užtikrinti klientų, personalo ir turto saugumą.</p>
                            <p><strong>Kokiais atvejais ir kokiems tretiesiems asmenims mes atskleidžiame Jūsų duomenis?</strong></p>
                            <p>Duomenys gali būti pateikiami kompetentingoms valdžios arba teisėsaugoms įstaigoms, pvz., policijai arba priežiūros institucijoms, tačiau tik joms pareikalavus ir tik tada, kai reikalaujama pagal galiojančius teisės aktus arba teisės aktų numatytais atvejais ir tvarka, siekiant užtikrinti mūsų teises, mūsų pirkėjų, darbuotojų ir i&scaron;teklių saugumą, pareik&scaron;ti, teikti ir ginti teisinius reikalavimus.</p>
                            <p><strong>Kokias teises Jums suteikia duomenų apsaugos teisės aktai ir kaip galite jomis pasinaudoti?</strong></p>
                            <p>Duomenų apsaugos teisės aktai suteikia Jums daug teisių, kuriomis Jūs galite laisvai naudotis, o mes turime užtikrinti Jums tokią galimybę. Informaciją apie konkrečias Jūsų teises ir jų įgyvendinimo būdus mes pateikiame &scaron;ioje Politikoje toliau, pra&scaron;ome atidžiai ją perskaityti.</p>
                            <p><strong>Teisė susipažinti su mūsų tvarkomais Jūsų asmens duomenimis</strong></p>
                            <p>Jūs turite teisę gauti mūsų patvirtinimą, ar mes tvarkome Jūsų asmens duomenis, o taip pat teisę susipažinti su mūsų tvarkomais Jūsų asmens duomenimis ir informacija apie duomenų tvarkymo tikslus, tvarkomų duomenų kategorijas, duomenų gavėjų kategorijas, duomenų tvarkymo laikotarpį, duomenų gavimo &scaron;altinius, automatizuotą sprendimų priėmimą, įskaitant profiliavimą, bei jo reik&scaron;mę ir pasekmes Jums.</p>
                            <p>Didžiąją dalį &scaron;ios informacijos mes pateikiame Jums &scaron;ioje Politikoje ir tikime, kad ji yra Jums naudinga.</p>
                            <p><strong>Teisė i&scaron;taisyti asmens duomenis</strong></p>
                            <p>Jeigu pasikeitė Jūsų kandidatavimo anketoje mums pateikti duomenys arba Jūs manote, kad mūsų tvarkoma informacija apie Jus yra netiksli ar neteisinga, Jūs turite teisę reikalauti &scaron;ią informaciją pakeisti, patikslinti ar i&scaron;taisyti.</p>
                            <p><strong>Teisė at&scaron;aukti sutikimą</strong></p>
                            <p>Tais atvejais, kai Jūsų duomenis mes tvarkome Jūsų sutikimo pagrindu, Jūs turite teisę bet kada at&scaron;aukti savo sutikimą ir Jūsų sutikimu grindžiamas duomenų tvarkymas bus nutrauktas.</p>
                            <p>Nustojus galioti Jūsų sutikimui, jį at&scaron;aukus arba panaikinus, mes Jūsų sutikimu tvarkytus duomenis sunaikiname.</p>
                            <p>Bet kokiu atveju Jūsų suteiktą sutikimą ir įrodymą apie jį mes galime saugoti ir ilgesnį laikotarpį, jei to reikia, kad galėtume apsiginti nuo mums pareik&scaron;tų reikalavimų, pretenzijų ar ie&scaron;kinių.</p>
                            <p><strong>Teisė pateikti skundą</strong></p>
                            <p>Jeigu Jūs manote, kad Jūsų duomenis mes tvarkome pažeisdami duomenų apsaugos teisės aktų reikalavimus, mes visuomet pirmiausia pra&scaron;ome kreiptis tiesiogiai į mus. Mes tikime, kad geranori&scaron;komis pastangomis mums pavyks i&scaron;sklaidyti visas Jūsų abejones, patenkinti pra&scaron;ymus ir i&scaron;taisyti mūsų padarytas klaidas, jeigu tokių bus.</p>
                            <p>Jeigu Jūsų netenkins mūsų siūlomas problemos i&scaron;sprendimo būdas arba, Jūsų nuomone, mes nesiimsime pagal Jūsų pra&scaron;ymą būtinų veiksmų, Jūs turėsite teisę pateikti skundą priežiūros institucijai, kuria Lietuvos Respublikoje yra Valstybinė duomenų apsaugos inspekcija.</p>
                            <p><strong>Teisė nesutikti su duomenų tvarkymu, kai tvarkymas pagrįstas teisėtais interesais</strong></p>
                            <p>Jūs turite teisę nesutikti su asmens duomenų tvarkymu, kai asmens duomenys yra tvarkomi remiantis mūsų teisėtais interesais. Vis dėlto, atsižvelgiant į Paslaugų teikimo tikslus ir abiejų &scaron;alių (tiek Jūsų, kaip duomenų subjekto, tiek mūsų, kaip duomenų valdytojo) teisėtų interesų pusiausvyrą, Jūsų prie&scaron;taravimas gali reik&scaron;ti, kad nutraukę mūsų teisėtu interesu grindžiamą Jūsų duomenų tvarkymą, mes negalėsime suteikti galimybės Jums toliau naudotis mūsų Paslaugomis.</p>
                            <p><strong>Teisė i&scaron;trinti duomenis (teisė būti pamir&scaron;tam)</strong></p>
                            <p>Esant tam tikroms duomenų tvarkymo teisės aktuose įvardintoms aplinkybėms (kai asmens duomenys tvarkomi neteisėtai, i&scaron;nyko duomenų tvarkymo pagrindas ir kt.), Jūs turite teisę pra&scaron;yti, kad mes i&scaron;trintume Jūsų asmens duomenis. Norėdami pasinaudoti &scaron;ia teise, pra&scaron;om pateikti ra&scaron;ti&scaron;ką pra&scaron;ymą mūsų Bendrovei.</p>
                            <p>Svarbu pažymėti, kad Jūsų duomenys be Jūsų atskiro pra&scaron;ymo bus i&scaron;trinti.</p>
                            <p><strong>Teisė apriboti duomenų tvarkymą</strong></p>
                            <p>Esant tam tikroms duomenų tvarkymo teisės aktuose įvardintoms aplinkybėms (kai asmens duomenys tvarkomi neteisėtai, Jūs užginčijate duomenų tikslumą, Jūs pateikėte prie&scaron;taravimą dėl duomenų tvarkymo mūsų teisėto intereso pagrindu ir kt.), Jūs taip pat turite teisę apriboti Jūsų duomenų tvarkymą.</p>
                            <p>Norėdami pasinaudoti &scaron;iame skirsnyje nurodyta teise, pra&scaron;om pateikti ra&scaron;ti&scaron;ką pra&scaron;ymą mūsų Bendrovei.</p>
                            <p><strong>Pra&scaron;ymų nagrinėjimo tvarka</strong></p>
                            <p>Siekdami apsaugoti visų savo mūsų kandidatų ir pirkėjų duomenis nuo neteisėto atskleidimo, mes, gavę Jūsų pra&scaron;ymą pateikti duomenis ar įgyvendinti kitas Jūsų teises, privalėsime nustatyti Jūsų tapatybę. &Scaron;iuo tikslu mes galime pra&scaron;yti Jus nurodyti Jūsų pateiktus aktualius anketinius duomenis (pvz.: vardą, el. pa&scaron;to adresą ar tel. numerį) ir lyginsime, ar Jūsų nurodyti duomenys sutampa su atitinkamais anketiniais duomenimis. Vykdydami &scaron;į patikrinimą, mes taip pat galime i&scaron;siųsti kontrolinį prane&scaron;imą registracijos anketoje nurodytu kontaktu (SMS arba el. pa&scaron;tu), pra&scaron;ydami atlikti autorizacijos veiksmą. Jeigu patikrinimo procedūra bus nesėkminga (pvz.: Jūsų nurodytieji anketiniai duomenys nesutaps su anketoje nurodytais duomenimis arba Jūs nesiautorizuosite pagal gautą SMS ar el. pa&scaron;to prane&scaron;imą), mes būsime priversti konstatuoti, kad Jūs nesate pra&scaron;omų duomenų subjektas ir privalėsime atmesti Jūsų pateiktą pra&scaron;ymą.</p>
                            <p>Gavę Jūsų pra&scaron;ymą dėl bet kurios Jūsų teisės įgyvendinimo ir sėkmingai atlikę auk&scaron;čiau nurodytą patikrinimo procedūrą, mes įsipareigojame nepagrįstai nedelsdami, tačiau bet kuriuo atveju ne vėliau kaip per vieną mėnesį nuo Jūsų pra&scaron;ymo gavimo ir patikrinimo procedūros užbaigimo, pateikti Jums informaciją apie veiksmus, kurių ėmėmės pagal Jūsų pateiktą pra&scaron;ymą. Atsižvelgdami į pra&scaron;ymų sudėtingumą ir skaičių, mes turime teisę vieno mėnesio laikotarpį pratęsti dar dviem mėnesiams, apie tai Jus informuodami iki pirmojo mėnesio pabaigos ir nurodydami tokio pratęsimo priežastis.</p>
                            <p>Jeigu Jūsų pra&scaron;ymas pateikiamas elektroninėmis priemonėmis, atsakymą mes Jums taip pat pateiksime elektroninėmis priemonėmis, i&scaron;skyrus atvejus, kai tai bus neįmanoma (pvz.: dėl itin didelės informacijos apimties) arba tuomet, jei Jūs pra&scaron;ysite Jums atsakyti kitu būdu.</p>
                            <p>Mes atsisakysime tenkinti Jūsų pra&scaron;ymą motyvuotu atsakymu, kai bus nustatytos teisės aktuose nurodytos aplinkybės, apie tai ra&scaron;tu informuodami Jus.</p>
                            <p><strong>Kokiais būdais ir kokiais kontaktais galite su mumis susisiekti? </strong></p>
                            <p>Visais duomenų tvarkymo klausimais su mumis susisiekti galite &scaron;iais būdais:</p>
                            <p>elektroniniu pa&scaron;tu joana@getweb.lt</p>
                            <p>pa&scaron;to korespondencijos adresas &ndash; Perkūnkiemio g. 13-91, LT-12114 Vilnius</p>
                            <p><em>Lai&scaron;ką adresuokite taip: MB "Du prieš du"</em>.</p>
                            <p>Mūsų, kaip duomenų valdytojo, rekvizitai:</p>
                            <p>MB "Du prieš du"</p>
                            <p>Juridinio asmens kodas 304073493</p>
                            <p>Buveinės adresas: Perkūnkiemio g. 13-91, LT-12114 Vilnius</p>
                            <p><strong>Kiek saugūs Jūsų duomenys?</strong></p>
                            <p>Mes naudojame įvairias saugumą užtikrinančias technologijas ir procedūras, siekdami apsaugoti Jūsų asmeninę informaciją nuo neteisėtos prieigos, naudojimo ar atskleidimo. Mūsų tiekėjai yra kruop&scaron;čiai atrenkami, mes i&scaron; jų reikalaujame naudoti tinkamas priemones, galinčias apsaugoti Jūsų konfidencialumą ir užtikrinti Jūsų asmeninės informacijos saugumą. Visgi, informacijos perdavimo internetu ar mobiliuoju ry&scaron;iu saugumas negali būti užtikrintas; bet koks informacijos mums perdavimas nurodytais būdais yra vykdomas Jūsų pačių rizika.</p>
                            <p><strong>Ilgesnis duomenų saugojimas</strong></p>
                            <p>Pasibaigus &scaron;ioje Politikoje nustatytam Jūsų duomenų tvarkymo ir saugojimo terminui, mes Jūsų duomenis sunaikiname.</p>
                            <p>Ilgesnis, negu specialiai nurodyta &scaron;ioje Politikoje, Jūsų asmens duomenų saugojimas gali būti vykdomas tik, kai:</p>
                            <p>&ndash; būtina, kad mes galėtume apsiginti nuo reikalavimų, pretenzijų ar ie&scaron;kinių ir įgyvendinti savo teises;</p>
                            <p>&ndash; esama pagrįstų įtarimų dėl neteisėtos veikos, dėl kurios yra atliekamas tyrimas;</p>
                            <p>&ndash; Jūsų duomenys būtini tinkamam ginčo, skundo i&scaron;sprendimui;</p>
                            <p>&ndash; rezervinių kopijų ir kitais pana&scaron;iais tikslais;</p>
                            <p>&ndash; esant kitiems teisės aktuose numatytiems pagrindams.</p>
                            <p>Mes taip pat naudojamės Facebook, kitų internetinių reklamų teikėjų paslaugomis. Apie &scaron;ių paslaugų teikėjų privatumo politiką, renkamus duomenis ir taikomas asmens duomenų apsaugos priemones galite perskaityti minėtų paslaugų teikėjų privatumo politikose. Daugiau informacijos apie tai, kaip veikia, o taip pat informaciją apie tai, kaip galite nesutikti su tokių reklamų rodymu ar tokiu duomenų naudojimu, rasite minėtų paslaugų teikėjų pateikiamoje informacijoje &ndash;&nbsp;<a class="0" download="0" href="https://www.facebook.com/policies/ads" rel="noopener noreferrer nofollow" target="_blank" title="0">https://www.facebook.com/policies/ads</a>.</p>
                            <p><strong>Politikos galiojimas ir pakeitimai</strong></p>
                            <p>&Scaron;i Politika galioja nuo 2023 m. vasario 1 d. Jei pakeisime &scaron;ią Politiką, paskelbsime jos atnaujintą versiją &scaron;iame puslapyje.</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center w-100 mt-4" style="gap: 20px;">
                        <button type="button" class="fw-bold fs-4 btn-hover-focus" onclick="window.location.href = `{{ route('livewire.reservation')}}`"
                                style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 170px">
                            {{ __('Uždaryti langą') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

