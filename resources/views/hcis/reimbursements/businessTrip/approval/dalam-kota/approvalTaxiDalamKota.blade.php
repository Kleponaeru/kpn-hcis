<div class="card-body bg-light rounded shadow-none" id="taksi_div_dalam_kota">
    <div class="h5 text-uppercase">
        <b>Taxi/Grab</b>
    </div>
    <div class="row">
        <div class="col-md-12 mb-2" id="taksi_div_dalam_kota">
            <label class="form-label">Total Ticket</label>
            <div class="input-group input-group-sm">
                <input class="form-control bg-light" name="no_vt_dalam_kota" id="no_vt_dalam_kota" type="number" min="0"
                    placeholder="ex: 2" value="{{ $taksiDalamKota->no_vt ?? '' }}" readonly>
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <label class="form-label">Detail Information</label>
            <div class="input-group input-group-sm">
                <textarea class="form-control form-control-sm bg-light" id="vt_detail_dalam_kota" name="vt_detail_dalam_kota" rows="3"
                    placeholder="Fill your need" readonly>{{ $taksiDalamKota->vt_detail ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
</div>
