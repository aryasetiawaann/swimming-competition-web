
{{-- INI TEMPLATE BUAT PDF YAAA JANGAN DIHAPUS --}}
<html>
    <head>
        <style>
            /** Define the margins of your page **/
            @page {
                margin: 130px 25px 160px 25px;
            }

            header {
                position: fixed;
                top: -140px;
                left: 0px;
                right: 0px;
                height: 130px;

                /** Extra personal styles **/
                text-align: center;
            }

            header p {
                text-align: right;
                font-size: 12px;
                text-transform: uppercase;
                margin-top: 60px;
                margin-right: 80px;
                margin-bottom: 3px;
            }

            header h1 {
                text-transform: capitalize;
                font-size: 13px;
                width: 350px;
                margin: 0 auto;
            }

            footer {
                position: fixed; 
                bottom: -160px; 
                left: 0px; 
                right: 0px;
                height: 150px; 

                /** Extra personal styles **/
                text-align: center;
            }

            .table-footer{
            margin: 0 auto;
            }

            .table-footer tr td {
                width: 200px;
                text-align: center;
            }

            .table-footer tr img {
                width: 65px;
            }

            main {
                font-size: 12px;
            }

            main h2 {
                font-size: 12px;
            }

            main table {
                width: 100%;
                text-align: left;
            }

            .garis {
                border-top: 2px solid black;
            }

            
            .line {
                width: 10%;
                text-align: center;
            }

            .name, .club {
                width: 30%;
                text-align: left;
            }


            .age {
                width: 10%;
                text-align: center;
            }

            .record, .finals, .place {
                width: 20%;
                text-align: right;
            }

            .record {
                text-align: left;
            }

        </style>
    </head>
    <body>
        <header>
            <p>HY-TEK's MEET MANAGER 8.0 - 5:00 PM 09/08/2024</p>
            <h1>Tirta Benteng Club Fun Swimming 2024 Tangerang - 10/08/2024 Meet Program</h1>
        </header>

        <footer>
            <table class="table-footer">
                <tr>
                    <td>
                        <img src="{{ public_path('assets/img/logo.png') }}" alt="logo">
                    </td>
                    <td>
                        <img src="{{ public_path('assets/img/logo.png') }}" alt="logo">
                    </td>
                    <td>
                        <img src="{{ public_path('assets/img/logo.png') }}" alt="logo">
                    </td>
                </tr>
            </table>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            @foreach ($acaras as $acara)
                <h2>Event {{ $acara->nomor_lomba }} {{ $acara->nama }} {{ $acara->grup }}</h2>
                <table>
                    <thead>
                        <tr class="head">
                            <th class="line">Lane</th>
                            <th class="name">Name</th>
                            <th class="age">Age</th>
                            <th class="club">Club</th>
                            <th class="record">Best Record</th>
                            <th class="finals">Finals</th>
                            <th class="place">Place</th>
                        </tr>
                    </thead>
                    <tr>
                        <td colspan="7" class="garis"></td>
                    </tr>
                    <tbody>
                            @foreach($acara->heats as $heatIndex => $heat)
                            <tr>
                                <td style="text-align: left;" colspan="7"><h4>Heat {{ $heatIndex + 1 }} of {{ count($acara->heats) }} Timed Finals</h4></td>
                            </tr>
                            @foreach($heat as $key => $participant)
                                    <tr>
                                        <td class="line">{{ $key+1 }}</td>
                                        <td class="name">{{ $participant['name'] }}</td>
                                        <td class="age">{{ now()->diffInYears(\Carbon\Carbon::parse($participant['umur'])) }}</td>
                                        <td class="club">{{ $participant['club']}}</td>
                                        <td class="record">{{ str_replace('.', ':', sprintf('%04.2f', $participant['track_record']))}}</td>
                                        <td class="finals">____________</td>
                                        <td class="place">____________</td>
                                    </tr>
                            @endforeach
                            @endforeach
                    </tbody>
                </table>
            @endforeach
            <table>

            </table>
        </main>
    </body>
</html>