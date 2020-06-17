function callPhp() {
    var title = document.getElementById('title').value;

    var xmlhttp = new XMLHttpRequest();
    alert(title);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            alert(myObj[1]);
            document.getElementById("demo").innerHTML = myObj[2];
        }
    };

    xmlhttp.open("GET", "http://192.168.1.110/home_movie_database/php/add_query.php?name=" + title + "&submit=Add", true);
    xmlhttp.send();
}
