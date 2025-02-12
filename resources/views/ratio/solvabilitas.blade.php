<div class="tab-pane fade" id="solvabilitas" role="tabpanel" aria-labelledby="solvabilitas-tab">
    <div class="row">
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rasio Utang Terhadap Aset</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="rasioUtangTerhadapAset"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-body">
                    <x-ratio-table :tahun="$data['tahun']" namaKolom1='Liabilitas' namaKolom2='Total Aset'
                        namaKolomRasio='Rasio Utang Terhadap Aset' :isiKolom1="$data['liabilitas']->pluck('total_liabilitas')" :isiKolom2="$data['aset']->pluck('total_aset')" :isiKolomRasio="$rasio['Rasio_Utang_Terhadap_Aset']"
                        :tambahPersen="true">
                    </x-ratio-table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rasio Utang Terhadap Modal</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="rasioUtangTerhadapModal"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-body">
                    <x-ratio-table :tahun="$data['tahun']" namaKolom1='Liabilitas' namaKolom2='Total Ekuitas'
                        namaKolomRasio='Rasio Utang Terhadap Modal' :isiKolom1="$data['liabilitas']->pluck('total_liabilitas')" :isiKolom2="$data['ekuitas']->pluck('total_ekuitas')"
                        :isiKolomRasio="$rasio['Rasio_Utang_Terhadap_Ekuitas']" :tambahPersen="true">
                    </x-ratio-table>
                </div>
            </div>
        </div>
    </div>
</div>
