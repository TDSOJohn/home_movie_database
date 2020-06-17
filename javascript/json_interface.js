function callPhp() {
    var title = document.getElementById('title').value;

    var xmlhttp = new XMLHttpRequest();
    alert("starting shit");
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById("demo").innerHTML = myObj[2];
        }
    };

    xmlhttp.open("GET", "add_query.php?name=" + title, true);
    xmlhttp.send();
}
