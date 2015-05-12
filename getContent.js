/**
 * Created by fcm2009 on 5/11/15.
 */

function getContent(category) {
    var server = new XMLHttpRequest();
    server.open("POST", "search.php", true);
    server.onreadystatechange(function() {
        if(server.readyState == 4 && server.status == 200)
            document.write("*********************");
    });
    server.send("data=a");
}

getContent("All");