<div class="modal fade text-left" id="defaultAktivitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- @if (isset($transaksi[0]) && isset($transaksi[0]->coa))
                    <h5 class="modal-title" id="myModalLabel1">Detail {{ $transaksi[0]->coa->nama }}</h5>
                    @else
                    <h5 class="modal-title" id="myModalLabel1" style="display: none;"></h5>
                    @endif --}}
                <h5 class="modal-title" id="myModalLabel2">Detail</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body" id="modalContent2">
                <div class="table-responsive" style="{{ $transaksi->isEmpty() ? 'display:none;' : '' }}">
                    <table class="table w-100 mb-0">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th colspan="3">Uraian</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
