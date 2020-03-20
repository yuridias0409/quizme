function vSenha() {
    var s1 = document.getElementById('s1');
    var s2 = document.getElementById('s2');
    var msg = document.getElementById('msg');
    var s1l = document.getElementById('s1').value;
    var s2l = document.getElementById('s2').value;
    if (s1l.length >7 || s2l.length > 7) {
        msg.value="";
        msg.className="";
        if (s1.value == s2.value) {
            msg.value="As senhas coincidem";
            msg.className="alert alert-success";
            document.getElementById('btnCadastro').disabled = false;
        }
        else{
            msg.value="As senhas diferem";
            msg.className="alert alert-danger";
        }
    }
    else{
        msg.value="Senha muito curta";
        msg.className="alert alert-warning";
    }
}

function verificar_email(argument) {
    console.log("chegou");
    var str = document.getElementById('rec_email').value; 
    //Modal rec
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        //Aparecer a recuperaçao
        xmlhttp.open("GET", "verificaEmail.php?email=" + str, true);
        xmlhttp.send();
    }
} 

function verificar_codigo(argument) {
    var str = document.getElementById('codigo').value; 
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "0") {
                    document.getElementById('alert2').hidden = false;
                }
                else{
                    document.getElementById('verifica_codigo').hidden = true;
                    document.getElementById('digitar_senhas').hidden = false;
                }
            }
        };
        xmlhttp.open("GET", "verificarCodigo.php?codigo=" + str, true);
        xmlhttp.send();
    }
}

function verificar_senhas(){
    var s1 = document.getElementById('senha1').value;
    var s2 = document.getElementById('senha2').value;
    if (s1 == s2) {
        document.getElementById('senhas-container').hidden = true;
        document.getElementById('loader').hidden = false;
        var str = s1;
        if (str.length == 0) { 
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == "0") {
                        document.getElementById('senhas-container').hidden = false;
                        document.getElementById('loader').hidden = true;
                        alert('Senha não alterada, tente novamente');
                        senha();
                    }
                    else{
                        document.getElementById('senhas-container').hidden = true;
                        document.getElementById('loader').hidden = true;
                        document.getElementById('digitar_senhas').hidden = true;
                        alert('Senha alterada');
                        showLogin();
                    }
                }
            };
            xmlhttp.open("GET", "alteraSenhas.php?senha=" + str, true);
            xmlhttp.send();
        }
    }
    else{
        document.getElementById('senhas-erradas').hidden = false;
    }
}