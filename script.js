/**
 * Created by Awad on 5/12/2015.
 */

var asyncRequest;

function search(keyword, category) {
    try {
        var asyncRequest = new XMLHttpRequest();
        asyncRequest.addEventListener("readystatechange", showContent, false);
        asyncRequest.open("POST", "search.php");
        asyncRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        asyncRequest.send("keyword=" + keyword + "& category=" + selectedCateg);
    }
    catch(exception) {
        alert("Request Failed");
    }
}

function registerListener(){
    document.getElementById("searchButton").addEventListener("click", prepare(), false);
    document.getElementById("categoryList").addEventListener("click", prepare(), false);


}