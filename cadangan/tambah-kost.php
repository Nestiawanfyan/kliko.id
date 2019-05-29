 <!--FASILITAS KOST-->
    <div class="panel panel-default">
        <button type="button" id="btnCollapseFasilitas" class="list-group-item form-btn collapsed w-100" data-toggle="collapse" data-target="#fasilitas" aria-expanded="true" aria-controls="collapseOne">FASILITAS</button>
        <div class="info-kost collapse" id="fasilitas" aria-labelledby="btnCollapseFasilitas" data-parent="#formkost">
            <div class="form-group" id="fKhusus">
                <div class="row">
                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                        Fasilitas Khusus<br>
                        <small>Fasilitas untuk khusus untuk pribadi</small>
                    </label>
                    <div class="col-xs-12 col-md-9">
                        <div class="row">
                            @foreach($fks as $fk)
                            <div class="col-xs-6 col-md-4">
                                <label class="c-input c-checkbox">
                                    <input type="checkbox" name="fKhusus[]" value="{{ $fk->id }}"><span class="c-indicator"></span>{{ $fk->nama }}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="row fas-lain">
                                <div class="col-xs-12">
                                    <label>Fasilitas Khusus Lainnya</label>
                                    <small>(Pisahkan dengan tanda koma ",")</small>
                                    <input type="text" class="form-control" name="fKhususLain" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="fUmum">
                    <div class="row">
                        <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                            Fasilitas Umum<br>
                            <small>Fasilitas yang bisa digunakan bersama penghuni kost lain</small>
                        </label>
                        <div class="col-xs-12 col-md-9">
                            <div class="row">
                                @foreach($fus as $fu)
                                <div class="col-xs-6 col-md-4">
                                    <label class="c-input c-checkbox">
                                        <input type="checkbox" name="fUmum[]" value="{{ $fu->id }}"><span class="c-indicator"></span>{{ $fu->nama }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="row fas-lain">
                                    <div class="col-xs-12">
                                        <label>Fasilitas Umum Lainnya</label>
                                        <small>(Pisahkan dengan tanda koma ",")</small>
                                        <textarea class="form-control" name="fUmumLain" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="fLingkungan">
                        <div class="row">
                            <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                Akses Lingkungan<br>
                                <small>Sarana dan prasarana yang ada di lingkungan sekitar kost</small>
                            </label>
                            <div class="col-xs-12 col-md-9">
                                <div class="row">
                                    @foreach($fls as $fl)
                                    <div class="col-xs-6 col-md-4">
                                        <label class="c-input c-checkbox">
                                            <input type="checkbox" name="fLingkungan[]" value="{{ $fl->id }}"><span class="c-indicator"></span>{{ $fl->nama }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="row fas-lain">
                                        <div class="col-xs-12">
                                            <label>Akses Lingkungan Lainnya</label>
                                            <small>(Pisahkan dengan tanda koma ",")</small>
                                            <textarea class="form-control" name="fLingkunganLain" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="fKamarMandi">
                            <div class="row">
                                <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                    Kamar Mandi<br>
                                    <small>Fasilitas untuk kamar mandi</small>
                                </label>
                                <div class="col-xs-12 col-md-9">
                                    <div class="row">
                                        @foreach($fkms as $fkm)
                                        <div class="col-xs-6 col-md-4">
                                            <label class="c-input c-checkbox">
                                                <input type="checkbox" name="fKamarMandi[]" value="{{ $fkm->id }}"><span class="c-indicator"></span>{{ $fkm->nama }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row fas-lain">
                                            <div class="col-xs-12">
                                                <label>Fasilitas Kamar Mandi Lainnya</label>
                                                <small>(Pisahkan dengan tanda koma ",")</small>
                                                <textarea class="form-control" name="fMandiLain" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="parkir">
                                <div class="row">
                                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                        Parkir
                                    </label>
                                    <div class="col-xs-12 col-md-9">
                                        <div class="row">
                                            @foreach($parkirs as $parkir)
                                            <div class="col-xs-6 col-md-4">
                                                <label class="c-input c-checkbox">
                                                    <input type="checkbox" name="parkir[]" value="{{ $parkir->id }}"><span class="c-indicator"></span>{{ $parkir->nama }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="catatan">
                                <div class="row">
                                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right form-control-label">
                                        Deskripsi<br>
                                        <small>Jelaskan semua hal tentang kosan Anda.</small>
                                    </label>
                                    <div class="col-xs-12 col-md-9">
                                        <textarea class="form-control" name="catatan" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-12 col-md-3 text-xs-left text-md-right">
                                    </label>
                                    <div class="col-xs-12 col-md-9">
                                        <button type="button" id="btnNextFoto" style="background-color:#6f1994;border:1px solid #6f1994;" class="btn btn-primary" disabled data-toggle="collapse" data-parent="#formkost" href="#foto">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--FASILITAS KOST END-->