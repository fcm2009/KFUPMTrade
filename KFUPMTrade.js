/**
 * Created by Awad on 5/12/2015.
 */

var asyncRequest;

function search(keyword, category, id, start) {
    try {
        asyncRequest = new XMLHttpRequest();
        asyncRequest.addEventListener("readystatechange", showContent, false);
        asyncRequest.open("POST", "search.php", true);
        asyncRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        asyncRequest.send("keyword=" + keyword + "&category=" + category + "&id=" + id + "&start=0");
    }
    catch(exception) {
        alert("Request Failed");
    }
}

function registerListener() {
    document.getElementById("searchButton").addEventListener("click", prepare, false);

    var categories = document.getElementById("category").children;
    for(var i = 0; i < categories.length; i++) {
        a = categories[i].firstChild;
        a.addEventListener("click", prepare, false);
    }

    var items = document.getElementsByClassName("item");
    for(var i = 0; i < items.length; i++) {
        items[i].addEventListener("click", prepare, false);
    }
}

function showContent(event) {
    if(asyncRequest.readyState == 4 && asyncRequest.status == 200) {
        var result = JSON.parse(asyncRequest.responseText);
        for(var i = 0; i < result.length; i++) {
            document.getElementById("content").appendChild(buildItem(result[i]));
        }
        registerListener();
    }
}

function prepare(event) {
    if(event.target.getAttribute("id") == "searchButton") {
        var keyword = document.getElementById("searchInput").value;
        var categoryList = document.getElementById("categoryList");
        var category = categoryList.options[categoryList.selectedIndex].value;

        document.getElementById("content").innerHTML = "";

        search(keyword, category, null, 0);
    }
    else if(event.target.parentNode.parentNode.getAttribute("id") == "category") {
        var category = event.target.textContent;

        document.getElementById("content").innerHTML = "";

        search(null, category, null, 0);
    }
    else if(event.target.getAttribute("class") == "item" || event.target.parentNode.getAttribute("class") == "item" ) {
        $(".item").fadeOut(600);
        if(event.target.getAttribute("class") == "item")
            search(null, null, event.target.getAttribute("id"), 0);
        else
            search(null, null, event.target.parentNode.getAttribute("id"), 0);
    }
    else {
        alert("error");
    }
}

function buildItem(item) {
    var itemDiv = document.createElement("div");
    itemDiv.setAttribute("id", item.id);
    itemDiv.setAttribute("class", "item");

    var itemImage = document.createElement("img");
    itemImage.setAttribute("src", item.image);

    var itemTitle = document.createElement("label");
    itemTitle.textContent = item.title;

    var itemPrice = document.createElement("label");
    itemPrice.textContent = item.price;

    itemDiv.appendChild(itemImage);
    itemDiv.appendChild(itemTitle);
    itemDiv.appendChild(itemPrice);

    return itemDiv;
}

window.addEventListener("load", registerListener, false);