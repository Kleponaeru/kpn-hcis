<div class="card-body bg-light rounded shadow-none" id="taksi_div">
    <div class="h5 text-uppercase text-primary">
        <b>Taxi/Grab</b>
    </div>
    <label for="additional-fields-title" class="mb-2">
        <span class="text-info fst-italic">* Only applicable GrabCar & GrabBike</span>
    </label>
    <div class="row">
        <div class="col-md-12 mb-2" id="taksi_div">
            <label class="form-label">Total Voucher</label>
            <div class="input-group input-group-sm">
                <input class="form-control" name="no_vt" id="no_vt" type="number" min="0"
                    placeholder="ex: 2" value="{{ $taksiLuarKota->no_vt ?? '' }}">
            </div>
        </div>
        <div class="col-md-12 mb-2">
            <label class="form-label">Detail Information</label>
            <div class="input-group input-group-sm">
                <textarea class="form-control form-control-sm" id="vt_detail" name="vt_detail" rows="3"
                    placeholder="Fill your need">{{ $taksiLuarKota->vt_detail ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
