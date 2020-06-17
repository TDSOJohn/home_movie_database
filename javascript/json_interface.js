function callPhp() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById("demo").innerHTML = myObj[2];
        }
    };

    xmlhttp.open("GET", "add_query.php", true);
    xmlhttp.send();
}
