<section class="section home-feature">
    <div class="container2">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12 col-md-6 col-sm-6 col-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.6s">
                    <div class="features-small-item">
                        <div class="panel panel-default">
                            <div class="panel-heading"><strong>Laporan Yang Ingin Disampaikan</strong> </div>
                            <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                        <textarea name="laporan" id="" rows="5" class="form-control-plaintext @error('laporan') form-control is-invalid @enderror"
                                        placeholder="Ketikkan Aspirasi Anda disini"> {{old ('laporan') }} </textarea>
                                        @error('laporan')
                                            <span  class="text-danger"> {{ $message }} </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for=""@error('subjek') class="text-danger" @enderror ></label>
                                    <input type="text" name="subjek" class="form-control @error('subjek') form-control is-invalid @enderror"
                                    placeholder="Subjek*"> {{old ('subjek') }} </textarea>
                                    @error('subjek')
                                        <span  class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('kategori_id') has-error @enderror ">
                                    <select name="kategori_id" class="form-control select2" >
                                            <option value="pilih_kategori">Kategori*</option>
                                        @foreach ($category as $c)
                                            <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <span  class="help-block"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="form-group @error('lampiran') has-error @enderror">
                                    <input type="file" name="lampiran" class="form-control">
                                    @error('lampiran')
                                        <span  class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <b><p class="">Format Lampiran : JPG,JPEG,PNG,PDF</p></b>
                                </div>
                                <div class="form-group">
                                    <select class="form-control select2" id="type" name="pilihan" @error('pilihan') has-error form-control is-invalid @enderror>
                                        <option value="nama">Tampilkan Nama</option>
                                        <option value="Anonim">Anonim</option>
                                    </select>
                                    @error('pilihan')
                                        <span  class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="container h-100">
                                        <div class="row h-100 justify-content-center align-items-center">
                                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                                <label class="text-center">Are You Human ?</label>
                                                <div class="center-block">
                                                    {!! app('captcha')->display() !!}
                                                    @if ($errors->has('g-recaptcha-response'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <button class="btn btn-primary" id="tombol-submit" type="submit">LAPOR !</button>
                            </form>
                        </div>
                    </div>
                    <!-- ***** Features Small Item End ***** -->
                </div>
            </div>
        </div>
    </div>
</section>

@push('select2css')
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    <script>
        $('.select2').select2();
    </script>
@endpush

