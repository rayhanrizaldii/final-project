<div class="tab-pane fade" id="aktivitas" role="tabpanel" aria-labelledby="aktivitas-tab">
    <div class="row">
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rasio Perputaran Persediaan</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="rasioPerputaranPersediaan"></div>
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
                    <x-ratio-table :tahun="$data['tahun']" namaKolom1='Penjualan' namaKolom2='Persediaan'
                        namaKolomRasio='Rasio Perputaran Persediaan' :isiKolom1="$data['pendapatan']->pluck('total_pendapatan')" :isiKolom2="$data['persediaan']->pluck('total_persediaan')" :isiKolomRasio="$rasio['Rasio_Perputaran_Persediaan']"
                        :tambahPersen="false">
                    </x-ratio-table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rasio Perputaran Modal Kerja</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="rasioPerputaranModalKerja"></div>
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
                    <x-ratio-table :tahun="$data['tahun']" namaKolom1='Penjualan' namaKolom2='Modal Kerja'
                        namaKolomRasio='Rasio Perputaran Modal Kerja' :isiKolom1="$data['pendapatan']->pluck('total_pendapatan')" :isiKolom2="$data['modal_kerja']->pluck('total_modal_kerja')"
                        :isiKolomRasio="$rasio['Rasio_Perputaran_Modal_Kerja']" :tambahPersen="false">
                    </x-ratio-table>
                </div>
            </div>
        </div>
    </div>
</div>
