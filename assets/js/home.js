//Global variables
var call_type, serialize;

//Add to cart
function Cart(type, id){
    $("body").css("pointer-events", "none");
    call_type = type;
    Ajax(id);
}

//Ajax
function Ajax(id){
    switch(call_type){
        case "addtocart":
            serialize = "&FormType=addtocart&Product_id=" + id;
            break;
        case "deletefromcart":
            serialize = "&FormType=deletefromcart&Product_id=" + id;
            break;
        default:
            alert("Not allowed");
            break;
    }
    
    $.ajax({
        type: "POST",
        url: "root/",
        data: serialize,
        success: function(result){
            $("body").css("pointer-events", "auto");
            if (result.match(/added_to_cart:/g)) {
                $(".cart").children("sub").html(parseInt($(".cart").children("sub").html()) + 1);
                popup("success: Added to the cart");
            } else if (result.match(/deleted_from_cart:/g)) {
                $('#body').load(window.location.href + '#body');
            } else {
                alert(result);
            }
        }
    });
}


