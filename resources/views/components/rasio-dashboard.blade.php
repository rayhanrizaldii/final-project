@props(['nama', 'rasioSaatIni', 'rasioSebelumnya', 'selisih'])

<tr>
    <td>{{ $nama }}</td>
    <td>{{ number_format($rasioSaatIni, 2) }}%</td>
    <td class="text-center">
        @if ($rasioSaatIni > $rasioSebelumnya)
            <div class="d-inline-block p-2"
                style="background-color: #40c4aa2c; color: #40C4AA; border-radius: 5px; width: 75px; text-align: center;">
                {{ number_format($selisih, 2, ',', '.') }}%
            </div>
        @elseif($rasioSaatIni < $rasioSebelumnya)
            <div class="mx-2 d-inline-block p-2"
                style="background-color: rgba(255, 0, 0, 0.152); color: red; border-radius: 5px; width: 75px; text-align: center;">
                ({{ number_format(abs($selisih), 2, ',', '.') }}%)
            </div>
        @else
            -
        @endif
    </td>
</tr>
