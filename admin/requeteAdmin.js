function getTheDay(jour) {
   console.log(jour);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'modifyHorraire.php');
    xhr.onload = function () {
        document.getElementById('contentWinDay').innerHTML = this.responseText;
    };
    var formData = new FormData();
    formData.append("jour" ,jour);
    formData.append("type", "1");
    xhr.send(formData);
};

function modifyTheDay(jour) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'modifyHorraire.php');
    xhr.onload = function () {
        document.getElementById('contentAllHoraires').innerHTML = this.responseText;
    };
    var formData = new FormData();
    formData.append("jour" ,jour);
    formData.append("ouverture", document.getElementById("ouvert").value);
    formData.append("fermer", document.getElementById("fermer").value);
    formData.append("type", 2);
    xhr.send(formData);
}