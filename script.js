/**
 * Created by Awad on 5/12/2015.
 */



function doSearch(){

    try {
        var asyncRequest = new XMLHttpRequest();
        asyncRequest.addEventListener("readystatechange", getContent, false);
        asyncRequest.open("POST", "search.php");
        asyncRequest.send("keyword=" + keyword + "& category=" + selectedCateg);
    }
    catch(exception){
        alert("Request Failed");
    }
}