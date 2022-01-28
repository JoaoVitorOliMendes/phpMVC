const tel = document.getElementById("tel");

//Mascara Telefone
function mascara() {
    var tel_f = document.getElementById("tel").value;

    if (tel_f[2]!='\xa0') {
        if (tel_f[2]!=undefined) {
            document.getElementById("tel").value = tel_f.slice(0,2)+'\xa0'+tel_f[2];
        }
    }else if (tel_f[8]!="-") {
        if (tel_f[8]!=undefined) {
            document.getElementById("tel").value = tel_f.slice(0,8)+"-"+tel_f[8];
        }
    }
}