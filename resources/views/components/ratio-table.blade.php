@props([
    'tahun',
    'namaKolom1',
    'namaKolom2',
    'namaKolomRasio',
    'isiKolom1',
    'isiKolom2',
    'isiKolomRasio',
    'tambahPersen' => true,
])

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Tahun</th>
                <th>{{ $namaKolom1 }}</th>
                <th>{{ $namaKolom2 }}</th>
                <th>{{ $namaKolomRasio }}</th>
                <th class="text-center"><i class="bi bi-arrow-up-right" style="color: #40C4AA;"></i>
                    (<i class="bi bi-arrow-down-left" style="color: red;"></i>)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tahun as $index => $tahunItem)
                @php
                    $rasioSaatIni = $isiKolomRasio[$index] ?? 0;
                    $rasioSebelumnya = $index === 0 ? 0 : $isiKolomRasio[$index - 1];
                    $selisihRasio = $index === 0 ? null : $rasioSaatIni - $rasioSebelumnya;
                @endphp
                <tr>
                    <td>{{ $tahunItem }}</td>
                    <td>{{ number_format($isiKolom1[$index] ?? 0, 2) }}</td>
                    <td>{{ number_format($isiKolom2[$index] ?? 0, 2) }}</td>
                    <td>
                        {{ number_format($rasioSaatIni, 2) }}
                        @if ($tambahPersen)
                            %
                        @else
                            kali
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($index === 0)
                            -
                        @elseif ($selisihRasio > 0)
                            <div class="d-inline-block p-2"
                                style="background-color: #40c4aa2c; color: #40C4AA; border-radius: 5px; width: 100px; text-align: center;">
                                {{ number_format($selisihRasio, 2, ',', '.') }}%
                            </div>
                        @elseif($selisihRasio < 0)
                            <div class="mx-2 d-inline-block p-2"
                                style="background-color: rgba(255, 0, 0, 0.152); color: red; border-radius: 5px; width: 100px; text-align: center;">
                                ({{ number_format(abs($selisihRasio), 2, ',', '.') }}%)
                            </div>
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
