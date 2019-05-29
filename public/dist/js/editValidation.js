function handleError(e, b, m){
  $(e).addClass("has-danger");
  $(e + " .input input").addClass("form-control-danger");
  $(e + " .input small").text(m);
  $(b).attr("disabled", "disabled");
}
function validationSuccess(e, b){
  $(e).removeClass("has-danger");
  $(e + " .input input").removeClass("form-control-danger");
  $(e + " .input small").text("");
  $(b).removeAttr("disabled");
}
function cek(cek, btn){
  for(i = 0; i < cek.length; i++){
    if(cek[i] == 0) {
      $(btn).attr("disabled", "disabled");
    }
  }
}

var namaPemilik   = $("#namaPemilik input");
var telpPemilik   = $("#telpPemilik input");
var alamatPemilik = $("#alamatPemilik input");
var btnPemilik    = $("#btnPemilik");
var cekPemilik = [0,0,0];    // 0 == Error, 1 == Success
$(document).ready(function(){
  if(namaPemilik.val() != ""){
    namaPemilik.trigger("keyup");
  }
  if(telpPemilik.val() != ""){
    telpPemilik.trigger("keyup");
  }
  if(alamatPemilik.val() != ""){
    alamatPemilik.trigger("keyup");
  }
});

namaPemilik.keyup(function(){
  var re = /^[a-zA-Z\ ]+$/;
  if(namaPemilik.val() == null || namaPemilik.val() == ""){
    handleError("#namaPemilik", "#btnPemilik", "Tidak Boleh Kosong");
    cekPemilik[0] = 0;
  }
  else if(!re.test(namaPemilik.val())) {
    handleError("#namaPemilik", "#btnPemilik", "Gunakan huruf.");
    cekPemilik[0] = 0;
  }
  else {
    validationSuccess("#namaPemilik", "#btnPemilik");
    cekPemilik[0] = 1;
  }
  cek(cekPemilik, "#btnPemilik");
});

telpPemilik.keyup(function(){
  var re = /^[0-9]{6,15}$/;
  if(telpPemilik.val() == null || telpPemilik.val() == ""){
    handleError("#telpPemilik", "#btnPemilik", "Tidak Boleh Kosong");
    cekPemilik[1] = 0;
  }
  else if(!re.test(telpPemilik.val())) {
    handleError("#telpPemilik", "#btnPemilik", "Gunakan angka (6 - 15 karakter)");
    cekPemilik[1] = 0;
  }
  else {
    validationSuccess("#telpPemilik", "#btnPemilik");
    cekPemilik[1] = 1;
  }
  cek(cekPemilik, "#btnPemilik");
});

alamatPemilik.keyup(function(){
  if(alamatPemilik.val() == null || alamatPemilik.val() == ""){
    handleError("#alamatPemilik", "#btnPemilik", "Tidak Boleh Kosong");
    cekPemilik[2] = 0;
  }
  else {
    validationSuccess("#alamatPemilik", "#btnPemilik");
    cekPemilik[2] = 1;
  }
  cek(cekPemilik, "#btnPemilik");
});



//---------------------KOST--------------------------
var namaKost    = $("#namaKost input");
var telpKost    = $("#telpKost input");
var alamatKost  = $("#alamatKost input");
var kodePos     = $("#kodePos input");
var luasKamar   = $("#luasKamar input");
var jumlahKamar = $("#jumlahKamar input");
var penghuniKost= $("#penghuniKost input");
var btnKost     = $("#btnKost");
var cekKost = [0,0,0,0,0,0,1];    // 0 == Error, 1 == Success
$(document).ready(function(){
  if(namaKost.val() != ""){
    namaKost.trigger("keyup");
  }
  if(telpKost.val() != ""){
    telpKost.trigger("keyup");
  }
  if(alamatKost.val() != ""){
    alamatKost.trigger("keyup");
  }
  if(kodePos.val() != ""){
    kodePos.trigger("keyup");
  }
  if(luasKamar.val() != ""){
    luasKamar.trigger("keyup");
  }
  if(jumlahKamar.val() != ""){
    jumlahKamar.trigger("keyup");
  }
});


namaKost.keyup(function(){
  var re = /^[a-zA-Z\ ]+$/;
  if(namaKost.val() == null || namaKost.val() == ""){
    handleError("#namaKost", "#btnKost", "Tidak Boleh Kosong");
    cekKost[0] = 0;
  }
  else if(!re.test(namaKost.val())) {
    handleError("#namaKost", "#btnKost", "Gunakan huruf.");
    cekKost[0] = 0;
  }
  else {
    validationSuccess("#namaKost", "#btnKost");
    cekKost[0] = 1;
  }
  cek(cekKost, "#btnKost");
});

telpKost.keyup(function(){
  var re = /^[0-9]{6,15}$/;
  if(telpKost.val() != null && telpKost.val() != ""){
    handleError("#telpKost", "#btnKost", "Tidak Boleh Kosong");
    if(!re.test(telpKost.val())) {
      handleError("#telpKost", "#btnKost", "Gunakan angka (6 - 15 karakter)");
      cekKost[1] = 0;
    }
    else {
      validationSuccess("#telpKost", "#btnKost");
      cekKost[1] = 1;
    }
  }
  else {
    validationSuccess("#telpKost", "#btnKost");
    cekKost[1] = 1;
  }
  cek(cekKost, "#btnKost");
});

alamatKost.keyup(function(){
  if(alamatKost.val() == null || alamatKost.val() == ""){
    handleError("#alamatKost", "#btnKost", "Gunakan angka (6 - 15 karakter)");
    cekKost[2] = 0;
  }
  else {
    validationSuccess("#alamatKost", "#btnKost");
    cekKost[2] = 1;
  }
  cek(cekKost, "#btnKost");
});

kodePos.keyup(function(){
  var re = /^[0-9]{5}$/;
  if(kodePos.val() != null && kodePos.val() != ""){
    handleError("#kodePos", "#btnKost", "Gunakan 5 Angka saja untuk kode pos");
    if(!re.test(kodePos.val())) {
      handleError("#kodePos", "#btnKost", "Gunakan angka (6 - 15 karakter)");
      cekKost[3] = 0;
    }
    else {
      validationSuccess("#kodePos", "#btnKost");
      cekKost[3] = 1;
    }
  }
  else {
    validationSuccess("#kodePos", "#btnKost");
    cekKost[3] = 1;
  }
  cek(cekKost, "#btnKost");
});

luasKamar.keyup(function(){
  var re = /^([0-9]+)\x([0-9]+)$/;
  if(luasKamar.val() == null || luasKamar.val() == ""){
    handleError("#luasKamar", "#btnKost", "Tidak Boleh Kosong");
    cekKost[4] = 0;
  }
  else if(!re.test(luasKamar.val())) {
    handleError("#luasKamar", "#btnKost", "Penulisan luas kamar (contoh: 4x3)");
    cekKost[3] = 0;
  }
  else {
    validationSuccess("#luasKamar", "#btnKost");
    cekKost[4] = 1;
  }
  cek(cekKost, "#btnKost");
});

jumlahKamar.keyup(function(){
  var re = /^[0-9]+$/;
  if(jumlahKamar.val() == null || jumlahKamar.val() == ""){
    handleError("#jumlahKamar", "#btnKost", "Tidak Boleh Kosong");
    cekKost[5] = 0;
  }
  else if(!re.test(jumlahKamar.val())) {
    handleError("#jumlahKamar", "#btnKost", "Gunakan Angka (0 - tak terhingga)");
    cekKost[3] = 0;
  }
  else {
    validationSuccess("#jumlahKamar", "#btnKost");
    cekKost[5] = 1;
  }
  cek(cekKost, "#btnKost");
});

var valuePenghuni;
$(function(){
  $("#penghuniP").click(function(){
    valuePenghuni = "Putra";
  });
  $("#penghuniW").click(function(){
    valuePenghuni = "Putri";
  });
  $("#penghuniC").click(function(){
    valuePenghuni = "Campur";
  });
});

btnKost.click(function(){
  alert(valuePenghuni);
  $(window).ajaxStart(function(){
    $('#loadingKost').addClass('fa fa-refresh fa-spin fa-3x fa-fw');
  });
  $(window).ajaxComplete(function(){
    $('#loadingKost').removeClass();
  });
  $(window).ajaxError(function(){
    alert("asdas");
  });
  $.ajax({
    type  : 'post',
    url   : "{{ route('edit.kost', ['id' => $kost->id]) }}",
    data  : {
      '_token'      : $('#collapseKost input[name=_token]').val(),
      'namaKost'    : namaKost.val(),
      'alamatKost'  : alamatKost.val(),
      'telpKost'    : telpKost.val(),
      'kodePos'     : kodePos.val(),
      'luasKamar'   : luasKamar.val(),
      'jumlahKamar' : jumlahKamar.val(),
      'penghuniKost': valuePenghuni,
    },
    success: function(data) {
      alert(data);
      if (data.errors)
        alert("Terjadi Kesalahan");
      $('#loadingKost').removeClass();
    },
  });
});
