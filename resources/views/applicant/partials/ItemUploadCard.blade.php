<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">File</div>


            <div class="card-body row">

                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Ijazah</label>

                    <div class="col-md-8">
                        <input id="text" type="file" class="form-control" name="degree_file">

                        @error('degree')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Transkrip</label>

                    <div class="col-md-8">
                        <input id="text" type="file" class="form-control" name="transcript_file">

                        @error('transcript')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">KTP</label>

                    <div class="col-md-8">
                        <input id="text" type="file" class="form-control" name="ic_file">

                        @error('identity_card')
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