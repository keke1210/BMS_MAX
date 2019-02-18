function newElement() {
    var li = document.createElement("li");
    var e = document.getElementById("mySelect");
    var selected = e.options[e.selectedIndex].value;
    var t = document.createTextNode(selected);

    document.getElementById("display").appendChild(li);

    document.getElementById("mySelect").value= "";
    var span = document.createElement("SPAN");
    var txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    li.appendChild(span);
}