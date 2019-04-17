document.addEventListener('DOMContentLoaded', function(){
    let submitBtn = document.querySelector('.submitBtn');
    submitBtn.addEventListener('click', function() {
        send();
    });

    function createElement(){
        const items = {...localStorage};
        let i = Object.keys(items).length - 3;
        for(key in items){
            let td = document.createElement("td");
            if(key == "price"){
                let sum = document.getElementById('card-text');
                let price = parseInt(items[key], 10);
                let total = price * i;
                sum.innerHTML = price * i;
            }
            td.appendChild(document.createTextNode(items[key]));
            document.getElementById('items').appendChild(td);
        }
    }
    createElement();

    function send(){
        let localData = {...localStorage};
        let jsonString = JSON.stringify(localData);
        jsonString = JSON.parse(jsonString);
        $.ajax({
            type: "POST",
            url: "http://projectticket/new_order.php",
            dataType: "text",
            data: {"data": jsonString},
            success: function(data){
                console.log(data);
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log('Failed! error: ' + errorThrown);
        });
    }

});