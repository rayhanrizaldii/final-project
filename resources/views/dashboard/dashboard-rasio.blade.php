<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Rasio</th>
                    <th class="text-center"><i class="bi bi-arrow-up-right" style="color: #90C9AA;"></i>
                        (<i class="bi bi-arrow-down-left" style="color: red;"></i>)</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $selisih_rasio_lancar = 0;
                    $selisih_rasio_sangat_lancar = 0;
                    $selisih_ROI = 0;
                    $selisih_ROE = 0;
                    $selisih_rasio_utang_aset = 0;
                    $selisih_rasio_utang_ekuitas = 0;
                    $selisih_rasio_lancar = $rasio['Rasio_Lancar'][9] - $rasio['Rasio_Lancar'][8];
                    $selisih_rasio_sangat_lancar = $rasio['Rasio_Sangat_Lancar'][9] - $rasio['Rasio_Sangat_Lancar'][8];
                    $selisih_ROI = $rasio['ROI'][9] - $rasio['ROI'][8];
                    $selisih_ROE = $rasio['ROE'][9] - $rasio['ROE'][8];
                    $selisih_rasio_utang_aset = $rasio['Rasio_Utang_Terhadap_Aset'][9] - $rasio['Rasio_Utang_Terhadap_Aset'][8];
                    $selisih_rasio_utang_ekuitas = $rasio['Rasio_Utang_Terhadap_Ekuitas'][9] - $rasio['Rasio_Utang_Terhadap_Ekuitas'][8];
                @endphp
                <x-rasio-dashboard nama="Rasio Lancar" :rasioSaatIni="$rasio['Rasio_Lancar'][9]" :rasioSebelumnya="$rasio['Rasio_Lancar'][8]" :selisih="$selisih_rasio_lancar" />
                <x-rasio-dashboard nama="Rasio Sangat Lancar" :rasioSaatIni="$rasio['Rasio_Sangat_Lancar'][9]" :rasioSebelumnya="$rasio['Rasio_Sangat_Lancar'][8]" :selisih="$selisih_rasio_sangat_lancar" />
                <x-rasio-dashboard nama="ROI" :rasioSaatIni="$rasio['ROI'][9]" :rasioSebelumnya="$rasio['ROI'][8]" :selisih="$selisih_ROI" />
                <x-rasio-dashboard nama="ROE" :rasioSaatIni="$rasio['ROE'][9]" :rasioSebelumnya="$rasio['ROE'][8]" :selisih="$selisih_ROE" />
                <x-rasio-dashboard nama="Rasio Utang Terhadap Aset" :rasioSaatIni="$rasio['Rasio_Utang_Terhadap_Aset'][9]" :rasioSebelumnya="$rasio['Rasio_Utang_Terhadap_Aset'][8]" :selisih="$selisih_rasio_utang_aset" />
                <x-rasio-dashboard nama="Rasio Utang Terhadap Ekuitas" :rasioSaatIni="$rasio['Rasio_Utang_Terhadap_Ekuitas'][9]" :rasioSebelumnya="$rasio['Rasio_Utang_Terhadap_Ekuitas'][8]" :selisih="$selisih_rasio_utang_ekuitas" />
            </tbody>
        </table>
    </div>
</div>
