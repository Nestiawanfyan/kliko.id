var namaPemilik     = document.querySelector("#namaPemilik input").value;
var errorKost       = [1,1,0,0,1,1,0,1,1,1];
var errorSewa       = [0,0,0,0,0];
var errorPengirim   = [1,1,1];
function btnNext(id, idCollapse, error)
{
  var i;
  for(i=1; i<error.length; i++){
    var element = document.getElementById(id);
    var elementColl = document.getElementById(idCollapse);
    if(error[i]==1){
      element.setAttribute("disabled", "disabled");
      elementColl.removeAttribute("data-toggle");
      break;
    }
    else {
      element.removeAttribute("disabled");
      elementColl.setAttribute("data-toggle", "collapse");
    }
  }
}
function pesanError(pesan)
{
  ms = "<div class='alert alert-danger'>" + pesan + "</div>";
  return ms;
}
function formError(selector, bool)
{
  var element = document.querySelector(selector);
  if(bool==1) element.classList.add("has-danger");
  else element.classList.remove("has-danger");
}
function innerPesan(selector, pesan)
{
  if(pesan==null) {
    document.querySelector(selector).innerHTML = "";
  }
  else {
    document.querySelector(selector).innerHTML = pesanError(pesan);
  }
}

function validasiNamaPemilik()
{
  var id = "#namaPemilik";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[a-zA-Z\ ]+$/;
  if(input == null || input == ""){
    formError(id, 1);
    innerPesan(idMssg, "Tidak boleh kosong");
    errorKost[7] = 1;
  }
  else if(!re.test(input)) {
    formError(id, 1);
    innerPesan(idMssg, "Tidak boleh mengandung angka atau karakter");
    errorKost[7] = 1;
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorKost[7] = 0;
  }
  btnNext("btnNextSewa", "btnCollapseSewa", errorKost);
}


function validasiTelpPemilik()
{
  var id = "#telpPemilik";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[0-9]{6,15}$/;
  if(input == null || input == ""){
    formError(id, 1);
    innerPesan(idMssg, "Tidak boleh kosong");
    errorKost[8] = 1;
  }
  else if(!re.test(input)) {
    formError(id, 1);
    innerPesan(idMssg, "Masukkan nomor Telpon/HP dengan benar");
    errorKost[8] = 1;
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorKost[8] = 0;
  }
  btnNext("btnNextSewa", "btnCollapseSewa", errorKost);
}

function validasiAlamatPemilik()
{
  var id = "#alamatPemilik";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[0-9]{6,15}$/;
  if(input == null || input == ""){
    formError(id, 1);
    innerPesan(idMssg, "Tidak boleh kosong");
    errorKost[9] = 1;
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorKost[9] = 0;
  }
  btnNext("btnNextSewa", "btnCollapseSewa", errorKost);
}

function validasiNamaKost()
{
  var id = "#namaKost";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[a-zA-Z0-9\ ]+$/;
  if(input == null || input == ""){
    formError(id, 1);
    innerPesan(idMssg, "Tidak boleh kosong");
    errorKost[0] = 1;
  }
  else if(!re.test(input)) {
    formError(id, 1);
    innerPesan(idMssg, "Tidak boleh mengandung karakter, gunakan huruf dan angka");
    errorKost[0] = 1;
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorKost[0] = 0;
  }
  btnNext("btnNextSewa", "btnCollapseSewa", errorKost);
}

function validasiAlamatKost()
{
  var id = "#alamatKost";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  if(input == null || input == ""){
    formError(id, 1);
    innerPesan(idMssg, "Tidak boleh kosong");
    errorKost[1] = 1;
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorKost[1] = 0;
  }
  btnNext("btnNextSewa", "btnCollapseSewa", errorKost);
}

function validasiPosKost()
{
  var id = "#posKost";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[0-9]{5}$/;
  if(input != ""){
    if(!re.test(input)) {
      formError(id, 1);
      innerPesan(idMssg, "Masukkan kode pos, contoh 35151");
      errorKost[2] = 1;
    }
    else {
      formError(id, 0);
      innerPesan(idMssg, null);
      errorKost[2] = 0;
    }
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorKost[2] = 0;
  }
  btnNext("btnNextSewa", "btnCollapseSewa", errorKost);
}

function validasiTelpKost()
{
  var id = "#telpKost";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[0-9]{6,15}$/;
  if(input != ""){
    if(!re.test(input)) {
      formError(id, 1);
      innerPesan(idMssg, "Masukkan nomor Telpon/HP dengan benar");
      errorKost[3] = 1;
    }
    else {
      formError(id, 0);
      innerPesan(idMssg, null);
      errorKost[3] = 0;
    }
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorKost[3] = 0;
  }
  btnNext("btnNextKost", "btnCollapseKost", errorKost);
}

function validasiLuasKamar()
{
  var id = "#luasKamar";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^([0-9]+)\x([0-9]+)$/;
  if(input == null || input == ""){
    formError(id, 1);
    innerPesan(idMssg, "Tidak boleh kosong");
    errorKost[4] = 1;
  }
  else if(!re.test(input)) {
    formError(id, 1);
    innerPesan(idMssg, "Luas kamar, contoh 4x3");
    errorKost[4] = 1;
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorKost[4] = 0;
  }
  btnNext("btnNextSewa", "btnCollapseSewa", errorKost);
}

function validasiJumlahKamar()
{
  var id = "#jumlahKamar";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[0-9]+$/;
  if(input == null || input == ""){
    formError(id, 1);
    innerPesan(idMssg, "Tidak boleh kosong");
    errorKost[5] = 1;
  }
  else if(!re.test(input)) {
    formError(id, 1);
    innerPesan(idMssg, "Jumlah Kamar, contoh 4");
    errorKost[5] = 1;
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorKost[5] = 0;
  }
  btnNext("btnNextSewa", "btnCollapseSewa", errorKost);
}

function validasiPenghuni()
{
  var id  = "#penghuni";
  var id1 = "#penghuni1";
  var id2 = "#penghuni2";
  var id3 = "#penghuni3";
  var idMssg = id + " .mssg";
  var input1 = document.querySelector(id1).checked;
  var input2 = document.querySelector(id2).checked;
  var input3 = document.querySelector(id3).checked;
  if(input1==false && input2==false && input3==false){
    formError(id, 1);
    innerPesan(idMssg, "Harus dipilih");
    errorKost[6] = 1;
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorKost[6] = 0;
  }
  btnNext("btnNextSewa", "btnCollapseSewa", errorKost);
}
var inputNamaPemilik    = document.querySelector("#namaPemilik input").value;
var inputTelpPemilik    = document.querySelector("#telpPemilik input").value;
var inputAlamatPemilik  = document.querySelector("#alamatPemilik input").value;
var inputNamaKost       = document.querySelector("#namaKost input").value;
var inputAlamatKost     = document.querySelector("#alamatKost input").value;
var inputPosKost        = document.querySelector("#posKost input").value;
var inputTelpKost       = document.querySelector("#telpKost input").value;
var inputLuasKamar      = document.querySelector("#luasKamar input").value;
var inputJumlahKamar    = document.querySelector("#jumlahKamar input").value;
if(inputNamaPemilik   !="") validasiNamaPemilik();
if(inputTelpPemilik   !="") validasiTelpPemilik();
if(inputAlamatPemilik !="") validasiAlamatPemilik();
if(inputNamaKost      !="") validasiNamaKost();
if(inputAlamatKost    !="") validasiAlamatKost();
if(inputPosKost       !="") validasiPosKost();
if(inputTelpKost      !="") validasiTelpKost();
if(inputLuasKamar     !="") validasiLuasKamar();
if(inputJumlahKamar   !="") validasiJumlahKamar();
// if(inputKamarKosong   !="") validasiKamarKosong();

// function validasiKamarKosong() {
//   return null;
// }

function validasiSewaHari()
{
  var id = "#sewaHari";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[0-9]+$/;
  if(input != ""){
    if(!re.test(input)) {
      formError(id, 1);
      innerPesan(idMssg, "Masukkan angka");
      errorSewa[1] = 1;
    }
    else {
      formError(id, 0);
      innerPesan(idMssg, null);
      errorSewa[1] = 0;
    }
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorSewa[1] = 0;
  }
  // btnNext("btnNextPengirim", "btnCollapsePengirim", errorSewa);
  btnNext("btnNextFoto", "btnCollapseFoto", errorSewa);
  btnNext("btnNextFasilitas", "btnCollapseFasilitas", errorSewa);
}


function validasiSewaMinggu()
{
  var id = "#sewaMinggu";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[0-9]+$/;
  if(input != ""){
    if(!re.test(input)) {
      formError(id, 1);
      innerPesan(idMssg, "Masukkan angka");
      errorSewa[2] = 1;
    }
    else {
      formError(id, 0);
      innerPesan(idMssg, null);
      errorSewa[2] = 0;
    }
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorSewa[2] = 0;
  }
  // btnNext("btnNextPengirim", "btnCollapsePengirim", errorSewa);
  btnNext("btnNextFoto", "btnCollapseFoto", errorSewa);
  btnNext("btnNextFasilitas", "btnCollapseFasilitas", errorSewa);
}


function validasiSewaBulan()
{
  var id = "#sewaBulan";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[0-9]+$/;
  if(input != ""){
    if(!re.test(input)) {
      formError(id, 1);
      innerPesan(idMssg, "Masukkan angka");
      errorSewa[3] = 1;
    }
    else {
      formError(id, 0);
      innerPesan(idMssg, null);
      errorSewa[3] = 0;
    }
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorSewa[3] = 0;
  }
  // btnNext("btnNextPengirim", "btnCollapsePengirim", errorSewa);
  btnNext("btnNextFoto", "btnCollapseFoto", errorSewa);
  btnNext("btnNextFasilitas", "btnCollapseFasilitas", errorSewa);
}

function validasiSewaTahun()
{
  var id = "#sewaTahun";
  var idMssg = id + " .mssg";
  var input = document.querySelector(id + " input").value;
  var re = /^[0-9]+$/;
  if(input != ""){
    if(!re.test(input)) {
      formError(id, 1);
      innerPesan(idMssg, "Masukkan angka");
      errorSewa[4] = 1;
    }
    else {
      formError(id, 0);
      innerPesan(idMssg, null);
      errorSewa[4] = 0;
    }
  }
  else {
    formError(id, 0);
    innerPesan(idMssg, null);
    errorSewa[4] = 0;
  }
  // btnNext("btnNextPengirim", "btnCollapsePengirim", errorSewa);
  btnNext("btnNextFoto", "btnCollapseFoto", errorSewa);
  btnNext("btnNextFasilitas", "btnCollapseFasilitas", errorSewa);
  /*
  var td1 = document.getElementById('sewaTahun');
  for(i=0; i<5; i++) {
    var text = document.createTextNode(errorSewa[i]);
    td1.appendChild(text);
  }*/
}
var inputSewaHari     = document.querySelector("#sewaHari input").value;
var inputSewaMinggu   = document.querySelector("#sewaMinggu input").value;
var inputSewaBulan    = document.querySelector("#sewaBulan input").value;
var inputSewaTahun    = document.querySelector("#sewaTahun input").value;
if(inputSewaHari      !="") validasiSewaHari();
if(inputSewaMinggu    !="") validasiSewaMinggu();
if(inputSewaBulan     !="") validasiSewaBulan();
if(inputSewaTahun     !="") validasiSewaTahun();


// function validasiNamaPengirim()
// {
//   var id = "#namaPengirim";
//   var idMssg = id + " .mssg";
//   var input = document.querySelector(id + " input").value;
//   var re = /^[a-zA-Z\ ]+$/;
//   if(input == null || input == ""){
//     formError(id, 1);
//     innerPesan(idMssg, "Tidak boleh kosong");
//     errorPengirim[0] = 1;
//   }
//   else if(!re.test(input)) {
//     formError(id, 1);
//     innerPesan(idMssg, "Tidak boleh mengandung angka atau karakter");
//     errorPengirim[0] = 1;
//   }
//   else {
//     formError(id, 0);
//     innerPesan(idMssg, null);
//     errorPengirim[0] = 0;
//   }
//   btnNext("btnNextKost", "btnCollapseKost", errorPengirim);
// }
//
// function validasiTelpPengirim()
// {
//   var id = "#telpPengirim";
//   var idMssg = id + " .mssg";
//   var input = document.querySelector(id + " input").value;
//   var re = /^[0-9]{6,15}$/;
//   if(input == null || input == ""){
//     formError(id, 1);
//     innerPesan(idMssg, "Tidak boleh kosong");
//     errorPengirim[1] = 1;
//   }
//   else if(!re.test(input)) {
//     formError(id, 1);
//     innerPesan(idMssg, "Masukkan nomor Telpon/HP dengan benar");
//     errorPengirim[1] = 1;
//   }
//   else {
//     formError(id, 0);
//     innerPesan(idMssg, null);
//     errorPengirim[1] = 0;
//   }
//   btnNext("btnNextFoto", "btnCollapseFoto", errorPengirim);
// }
//
// function validasiEmailPengirim()
// {
//   var id = "#emailPengirim";
//   var idMssg = id + " .mssg";
//   var input = document.querySelector(id + " input").value;
//   var re = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
//   if(input == null || input == ""){
//     formError(id, 1);
//     innerPesan(idMssg, "Tidak boleh kosong");
//     errorPengirim[2] = 1;
//   }
//   else if(!re.test(input)) {
//     formError(id, 1);
//     innerPesan(idMssg, "Masukkan Email dengan benar");
//     errorPengirim[2] = 1;
//   }
//   else {
//     formError(id, 0);
//     innerPesan(idMssg, null);
//     errorPengirim[2] = 0;
//   }
//   btnNext("btnNextFoto", "btnCollapseFoto", errorPengirim);
// }
// var inputNamaPengirim     = document.querySelector("#namaPengirim input").value;
// var inputTelpPengirim     = document.querySelector("#telpPengirim input").value;
// var inputEmailPengirim    = document.querySelector("#emailPengirim input").value;
// if(inputNamaPengirim      !="") validasiNamaPengirim();
// if(inputTelpPengirim      !="") validasiTelpPengirim();
// if(inputEmailPengirim     !="") validasiEmailPengirim();


// validasi select jenis hunian

function jenisHunian() {
  var hunian        = document.getElementById('jenishunianselect').value;
  var kamarKosongs  = document.getElementById('kamarKosong');

  // if( hunian === '2' || hunian === '3' ){
  //   kamarKosongs.style.display = 'none';
  // } else {
  //   kamarKosongs.style.display = 'block';    
  // }

  console.log(hunian);

}