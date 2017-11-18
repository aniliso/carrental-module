<html>
<head>
    <title>{{ $reservation->id }} No.lu Rezervasyon</title>
    <meta charset="utf-8">
    <style type="text/css">
        h3, table, p {
            font-family: sans-serif, Arial, Verdana, "Trebuchet MS";
        }
        .reservation{
            text-align: left;
        }
        .reservation tr {
            min-width: 300px;
            border-bottom: 1px solid #ccc;
        }
        .reservation td {
            padding: 5px;
        }
        .reservation th {
        	text-align: left;
        }
    </style>
</head>
<body>
    <h3>{{ $reservation->id }} No.lu Rezervasyon</h3>
    <hr />
    <table class="table table-striped reservation">
        <tr>
            <th>TC Kimlik No</th>
            <td>{{ $reservation->tc_no }}</td>
        </tr>
        <tr>
            <th>Adı Soyadı</th>
            <td>{{ $reservation->fullname }}</td>
        </tr>
        <tr>
            <th>Telefon</th>
            <td>{{ $reservation->phone }}</td>
        </tr>
        <tr>
            <th>Mobil Telefon</th>
            <td>{{ $reservation->mobile_phone }}</td>
        </tr>
        <tr>
            <th>E-Posta</th>
            <td>{{ $reservation->email }}</td>
        </tr>
        <tr>
            <th>İstekler</th>
            <td>{{ $reservation->requests }}</td>
        </tr>
		<tr>
			<th>Araç</th>
			<td>{{ isset($reservation->car->fullname) ? $reservation->car->fullname : '' }}</td>
		</tr>
        <tr>
            <th>Başlangıç Tarihi / Alış Lokasyonu</th>
            <td>{{ $reservation->pick_at->formatLocalized('%d %B %Y %H:%M') }} - {{ $reservation->present()->start_location }}</td>
        </tr>
        <tr>
            <th>Dönüş Tarihi / Dönüş Lokasyonu</th>
            <td>{{ $reservation->drop_at->formatLocalized('%d %B %Y %H:%M') }} - {{ $reservation->present()->return_location }}</td>
        </tr>
        <tr>
            <th>Toplam Gün / Fiyat</th>
            <td>{{ $reservation->total_day }} Gün - {{ $reservation->present()->total_price }} TL</td>
        </tr>
        <tr>
            <th>Günlük Fiyatı</th>
            <td>{{ $reservation->present()->daily_price }} TL / 1 Gün</td>
        </tr>
    </table>
<br/>
<p>Rezervasyon bilgilerinizde bir hata ile karşılaştıysanız lütfen bizimle iletişime ({{ setting('theme::phone') }}) geçiniz.</p>
</body>
</html>