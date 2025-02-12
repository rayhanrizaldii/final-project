<div class="tab-pane fade show active" id="likuiditas" role="tabpanel" aria-labelledby="likuiditas-tab">
    <div class="row">
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rasio Lancar</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="rasiolancarchart"></div>
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
                    <x-ratio-table :tahun="$data['tahun']" namaKolom1='Aset Lancar' namaKolom2='Liabilitas Lancar'
                        namaKolomRasio='Rasio Lancar' :isiKolom1="$data['aset_lancar']->pluck('total_aset_lancar')" :isiKolom2="$data['liabilitas_lancar']->pluck('total_liabilitas_lancar')" :isiKolomRasio="$rasio['Rasio_Lancar']"
                        :tambahPersen="true">
                    </x-ratio-table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Rasio Sangat Lancar</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div id="rasiosangatlancarchart"></div>
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
                    <x-ratio-table :tahun="$data['tahun']" namaKolom1='Aset Lancar tanpa Persediaan'
                        namaKolom2='Liabilitas Lancar' namaKolomRasio='Rasio Sangat Lancar' :isiKolom1="$data['aset_lancar_non_persediaan']->pluck('total_aset_lancar_non_persediaan')"
                        :isiKolom2="$data['liabilitas_lancar']->pluck('total_liabilitas_lancar')" :isiKolomRasio="$rasio['Rasio_Sangat_Lancar']" :tambahPersen="true">
                    </x-ratio-table>
                </div>
            </div>
        </div>
    </div>
</div>
