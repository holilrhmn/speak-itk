<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img style="height:30px" src="{{ asset('landing-page/images/Speak-01.png') }}" alt="SPEAK ITK">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
