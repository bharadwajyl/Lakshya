//Popup messages
function popup(message){
    var popup = document.createElement("div");
    popup.setAttribute("id","popup");
    popup.setAttribute("class","show");
    if (message.match(/success:/g)){ 
        popup.innerHTML = message.replace(/success:/g,"<i class='fa fa-check-circle-o'></i>");
        popup.classList.add("success");
    } else {
        popup.innerHTML = message.replace(/failure:/g,"<i class='fa fa-times-circle-o'></i>");
        popup.classList.add("failure");
    }
    document.body.appendChild(popup);
    setTimeout(function(){
            popup.className = popup.className.replace("show", "");
            popup.remove();
            }, 5000);
    return 1;
}


