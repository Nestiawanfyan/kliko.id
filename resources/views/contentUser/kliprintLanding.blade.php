

    <div id="card-kliprint">
        @if(count($percetakans) == 0)
            <div class="center-error">
                <p style="text-align:center;">Mohon Maaf, <br> Data Percetakan Sedang Kosong...</p>
                <br>
                @if(!Auth('user')->check())
                    <li class="nav-item">
                        <a class="btn pointer" data-toggle="modal" data-target="#loginUser" style="text-align:center;background-color:#6f1994;border:1px solid #6f1994;color:#fff;padding:7px 20px;font-family: 'Didact Gothic', sans-serif;"><b>Tambah Toko Print Anda</b></a>
                    </li>
                @else
                    <li class="nav-item">
                        <div class="container">
                            <div class="row">
                                <a class="btn pointer col-md-3 offset-md-3" href="{{ route('tambahKlipritn') }}" data-toggle="modal" data-target="#loginUser" style="text-align:center;background-color:#6f1994;border:1px solid #6f1994;color:#fff;padding:7px 20px;font-family: 'Didact Gothic', sans-serif;"><b>Tambah Toko Print Anda</b></a>
                            </div>
                        </div>
                    </li>
                @endif
            </div>
        @else
            <div class="container">
                <div class="row">                
                    @foreach($percetakan as $kliprint)

                        <?php
                            $foto = "img/default-kost.png";
                            if(count($kliprint->fotoprint)>0) {
                                $fotoURL = $kliprint->fotoprint->first()->url;
                                //Thumbnail
                                $path = pathinfo($fotoURL);
                                $path = $path['dirname']."/".$path['filename']."-400.".$path['extension'];
                                $foto = "storage/".$path;
                            }
                        ?>
                        <div class="col-md-6 col-lg-4" style="padding-right:5px;padding-left:5px;margin-top:30px;max-width:24.333333%;height:390px;">
                            <a href="{{ route('kliprint.view', ['kliprint' => $kliprint->seoTitle]) }}" >
                                <div class="card" style="border:none;margin-bottom:40px;width:;">
                                    <img class="card-img-top" src="{{ asset($foto) }}" alt="Foto {{ $kliprint->nama }}">
                                    <div class="card-body" style="padding:1.25rem 0;">
                                        <h5 class="card-title" style="color:#212121;">{{ $kliprint->nama }}</h5>
                                        <p class="card-text" style="color:#424242;">{{ $kliprint->alamat }}.</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach 
                </div> 
            </div>
        @endif
    </div>
