var quiEst1 = document.getElementById("choixOne");
var quiEst2 = document.getElementById("choixTwo");
var typeDemarche = document.getElementById("nameDemarche");
var choixQui;


function getPiafs(choixQui) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'database/functions/piaf.php');
    xhr.onload = function () {
        document.getElementById('contentResultList').innerHTML = this.responseText;
    };
    var formData = new FormData();
    formData.append('demarches', document.getElementById('nameDemarche').value);
    formData.append('quiEst', choixQui);
    xhr.send(formData);
}

function getPiafsDem(choixQui) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'database/functions/piafOneDemarche.php');
    xhr.onload = function () {
        document.getElementById('contentResultList').innerHTML = this.responseText;
    };
    var formData = new FormData();
    formData.append('demarches', document.getElementById('demarcheValue').value);
    formData.append('quiEst', choixQui);
    xhr.send(formData);
}