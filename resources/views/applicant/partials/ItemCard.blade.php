<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Biodata</div>


            <div class="card-body row">

                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

                    <div class="col-md-8">
                        <input id="text" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Email</label>

                    <div class="col-md-8">
                        <input id="text" class="form-control" value="{{ Auth::User()->email }}" disabled>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 row form-group">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>

                    <div class="col-md-8">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Umur</label>

                    <div class="col-md-8">
                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                        @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 row form-group">
                    <label for="pob" class="col-md-4 col-form-label text-md-right">Tempat Lahir</label>

                    <div class="col-md-8">
                        <input id="pob" type="text" class="form-control @error('pob') is-invalid @enderror" name="pob" value="{{ old('pob') }}" required autocomplete="pob" autofocus>

                        @error('pob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 row form-group">
                    <label for="dob" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>

                    <div class="col-md-8">
                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Status Pernikahan</label>

                    <div class="col-md-8">
                        <select name="marital" id="" class="form-control">
                            <option value="LANJANG">LANJANG</option>
                            <option value="MENIKAH">MENIKAH</option>
                            <option value="CERAI">CERAI</option>
                        </select>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6 row form-group">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Kategori Alamat</label>

                    <div class="col-md-8">
                        <select name="address_type" id="" class="form-control">
                            <option value="DEKAT">DEKAT Radius 5Km</option>
                            <option value="SEDANG">SEDANG Radius 10km</option>
                            <option value="JAUH">JAUH lebih dari 10km</option>
                        </select>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12 row form-group">
                    <label for="name" class="col-md-2 col-form-label text-md-right">Alamat</label>

                    <div class="col-md-10">
                        <input id="text" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
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