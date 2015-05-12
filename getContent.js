/**
 * Created by fcm2009 on 5/11/15.
 */

var server;

function ready() {
    if(server.readyState == 4 && server.status == 200) {
        document.write(server.responseText);
    }
}

function getContent(category) {
    try {
        server = new XMLHttpRequest();
        server.open("POST", "test.php", true);
        server.addEventListener("readystatechange", ready, false);
        server.setRequestHeader("Content-type","application/x-www-form-urlencoded")
        server.send("data=" + "a");
    }
    catch (exception) {
        document.write("********");
    }
}

getContent("All");