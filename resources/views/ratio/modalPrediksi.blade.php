<div class="modal fade text-left" id="defaultModalPrediksi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitlePrediksi">Prediksi Rasio Keuangan</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body" id="modalContent2">
                <div class="d-flex justify-content-end align-items-end">
                    <form class="form">
                        <div class="row align-items-end">
                            <div class="col-auto">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="tahun">Rasio</label>
                                    <select class="form-select" id="selectedRatio" name="selectedRatio"
                                        style="width: 250px">
                                        <option selected>Pilih Rasio...</option>
                                        {{-- <option disabled>Rasio Likuiditas</option> --}}
                                        <option value="Rasio_Lancar">Rasio Lancar</option>
                                        <option value="Rasio_Sangat_Lancar">Rasio Sangat Lancar</option>
                                        {{-- <option disabled>Rasio Profitabilitas</option> --}}
                                        <option value="ROI">Return On Investment</option>
                                        <option value="ROE">Return On Equity</option>
                                        {{-- <option disabled>Rasio Solvabilitas</option> --}}
                                        <option value="Rasio_Utang_Terhadap_Aset">Rasio Utang Terhadap Aset</option>
                                        <option value="Rasio_Utang_Terhadap_Ekuitas">Rasio Utang Terhadap Ekuitas
                                        </option>
                                        {{-- <option disabled>Rasio Aktivitas</option> --}}
                                        <option value="Rasio_Perputaran_Persediaan">Rasio Perputaran Persediaan</option>
                                        <option value="Rasio_Perputaran_Modal_Kerja">Rasio Perputaran Modal Kerja
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button id="submitPrediksi" class="btn btn-primary mb-3">Prediksi</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Nilai Aktual</th>
                                <th>Hasil Forecasting</th>
                                <th>Error</th>
                                <th>Abs Error</th>
                                <th>MAPE</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyPrediksi">
                        </tbody>
                        <tfoot id="tfootPrediksi">
                        </tfoot>
                    </table>
                </div>
                <div class="table-responsive mt-2">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Forecasting</th>
                                <th>Rekomendasi</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyPrediksi2">
                        </tbody>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var dataRasio = @json($rasio);
</script>
