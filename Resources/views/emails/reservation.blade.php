@component('mail::message')

@component('mail::promotion')
{{ $reservation->id }} No.lu Rezervasyon Bilgileri
@endcomponent

@component('mail::table')
|              |              |
|:-------------|:-------------|
| TC Kimlik No | {{ $reservation->tc_no }} |
| Adı Soyadı | {{ $reservation->fullname }} |
| Telefon | {{ $reservation->phone }} |
| Mobil Telefon | {{ $reservation->mobile_phone }} |
| E-Posta | {{ $reservation->email }} |
| İstekler | {{ $reservation->requests }} |
| Araç | {{ isset($reservation->car->fullname) ? $reservation->car->fullname : '' }} |
| Başlangıç Tarihi / Alış Lokasyonu | {{ $reservation->pick_at->formatLocalized('%d %B %Y %H:%M') }} - {{ $reservation->present()->start_location }} |
| Dönüş Tarihi / Dönüş Lokasyonu | {{ $reservation->drop_at->formatLocalized('%d %B %Y %H:%M') }} - {{ $reservation->present()->return_location }} |
| Toplam Gün / Fiyat | {{ $reservation->total_day }} Gün - {{ $reservation->present()->total_price }} TL |
| Günlük Fiyatı | {{ $reservation->present()->daily_price }} TL / 1 Gün |
@endcomponent

@endcomponent