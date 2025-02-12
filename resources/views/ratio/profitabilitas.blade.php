<div class="tab-pane fade" id="profitabilitas" role="tabpanel" aria-labelledby="profitabilitas-tab">
    <div class="row">
        <!-- Bagian Chart 1 Likuiditas -->
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Return on Investment (ROI)</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="rasioROI"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bagian Table 1 Profitabilitas -->
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-body">
                    <x-ratio-table :tahun="$data['tahun']" namaKolom1='Laba Bersih' namaKolom2='Total Aset'
                        namaKolomRasio='Rasio Return On Investment (ROI)' :isiKolom1="$rasio['Laba_Bersih']" :isiKolom2="$data['aset']->pluck('total_aset')"
                        :isiKolomRasio="$rasio['ROI'] " :tambahPersen="true">
                    </x-ratio-table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <!-- Bagian Chart 2 Profitabilitas -->
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Return On Equity (ROE)</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="rasioROE"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bagian Table 2 Profitabilitas -->
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-body">
                    <x-ratio-table :tahun="$data['tahun']" namaKolom1='Laba Bersih' namaKolom2='Total Ekuitas'
                        namaKolomRasio='Rasio Return On Equity (ROE)' :isiKolom1="$rasio['Laba_Bersih']" :isiKolom2="$data['ekuitas']->pluck('total_ekuitas')"
                        :isiKolomRasio="$rasio['ROE']" :tambahPersen="true">
                    </x-ratio-table>
                </div>
            </div>
        </div>
    </div>
</div>
