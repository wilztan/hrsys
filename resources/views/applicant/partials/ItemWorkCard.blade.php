<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Pengalaman Kerja</div>


            <div class="card-body row">

                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Edukasi terakhir</label>

                    <div class="col-md-8">
                        <select name="last_education" class="form-control">
                            <option value="SLTA">SLTA</option>
                            <option value="D1">D1</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                        </select>

                    </div>
                </div>


                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nilai Terakhir (0 - 4.0)</label>
                    <div class="col-md-8">
                        <input type="number" value="0.00" max="4.00" min="0" step=".01" placeholder="Nilai" required class="form-control" name="gpa">

                        @error('gpa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Total Lama Pengalaman Kerja (Tahun)</label>

                    <div class="col-md-8">
                        <input id="text" type="number" class="form-control @error('total_work_experience') is-invalid @enderror" name="total_work_experience" value="{{ old('total_work_experience') }}" required autocomplete="total_work_experience" autofocus>

                        @error('total_work_experience')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<br>