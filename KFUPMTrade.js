/**
 * Created by Awad on 5/12/2015.
 */

var asyncRequest;

function search(keyword, category, id, start, whatToDo) {
    try {
        asyncRequest = new XMLHttpRequest();
        asyncRequest.addEventListener("readystatechange", whatToDo, false);
        asyncRequest.open("POST", "search.php", true);
        asyncRequest.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        asyncRequest.send("keyword=" + keyword + "&category=" + category + "&id=" + id + "&start=0");
    }
    catch(exception) {
        alert("Request Failed");
    }
}

function init() {
    document.getElementById("searchButton").addEventListener("click", prepare, false);

    document.getElementById("addButton").addEventListener("click", prepare, false);

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

function previewContent(event) {
    if(asyncRequest.readyState == 4 && asyncRequest.status == 200) {
        var result = JSON.parse(asyncRequest.responseText);
        for(var i = 0; i < result.length; i++) {
            var item = buildPreview(result[i]);
            item.addEventListener("click", prepare, false);
            document.getElementById("content").appendChild(item);
        }
    }
}

function prepare(event) {
    if(event.target.getAttribute("id") == "searchButton") {
        var keyword = document.getElementById("searchInput").value;
        var categoryList = document.getElementById("categoryList");
        var category = categoryList.options[categoryList.selectedIndex].value;

        document.getElementById("content").innerHTML = "";

        search(keyword, category, "", 0, previewContent);
    }

    else if(event.target.getAttribute("id") == "addButton"){

    }
    else if(event.target.parentNode.parentNode.getAttribute("id") == "category") {
        var category = event.target.textContent;

        document.getElementById("content").innerHTML = "";

        search("", category, "", 0, previewContent);
    }
    else if(event.target.getAttribute("class") == "preview" || event.target.parentNode.getAttribute("class") == "preview" ) {
        document.getElementById("content").innerHTML = "";
        if(event.target.getAttribute("class") == "item")
            search("", "", event.target.getAttribute("id"), 0, showItem());
        else
            search("", "", event.target.parentNode.getAttribute("id"), 0, showItem);
    }
    else {
        alert("error");
    }
}

function buildPreview(item) {
    var itemDiv = document.createElement("div");
    itemDiv.setAttribute("id", item.id);
    itemDiv.setAttribute("class", "preview");

    var itemImage = document.createElement("img");
    itemImage.setAttribute("src", item.image);

    var itemTitle = document.createElement("span");
    itemTitle.setAttribute("id", "title");
    itemTitle.textContent = item.title;

    var itemPrice = document.createElement("span");
    itemPrice.setAttribute("id", "price");
    itemPrice.textContent = item.price;


    itemDiv.appendChild(itemImage);
    itemDiv.appendChild(itemTitle);
    itemDiv.appendChild(itemPrice);

    return itemDiv;
}

function showItem(event) {
    if (asyncRequest.readyState == 4 && asyncRequest.status == 200) {
        var result = JSON.parse(asyncRequest.responseText);
        var item = result[0];
        document.getElementById("content").appendChild(buildItem(item));
    }
}

function buildItem(item) {
    var itemDiv = document.createElement("div");
    itemDiv.setAttribute("id", item.id);
    itemDiv.setAttribute("class", "item");

    var itemTitle = document.createElement("h1");
    itemTitle.textContent = item.title;

    var itemSeller = document.createElement("label");
    itemSeller.textContent = item.seller;

    var itemPrice = document.createElement("label");
    itemPrice.textContent = item.price;

    var itemType = document.createElement("label");
    itemType.textContent = item.type;

    var itemDescription = document.createElement("p");
    itemDescription.textContent = item.description;

    var itemImage = document.createElement("img");
    itemImage.setAttribute("src", item.image);

    var itemDate = document.createElement("label");
    itemDate.textContent = item.data;

    itemDiv.appendChild(itemTitle);
    itemDiv.appendChild(itemImage);
    itemDiv.appendChild(itemSeller);
    itemDiv.appendChild(itemPrice);
    itemDiv.appendChild(itemType);
    itemDiv.appendChild(itemDescription);

    return itemDiv;
}


window.addEventListener("load", init, false);