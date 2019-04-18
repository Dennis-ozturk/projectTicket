document.addEventListener('DOMContentLoaded', function(){
    let submitBtn = document.querySelector('.submitBtn');
    submitBtn.addEventListener('click', function() {
        send();
    });

    function createElement(){
        //items ... gets all the localStorage data in a object 
        const items = {...localStorage};
        //Checks how many keys there is in object which is the cookie data that items recived
        let i = Object.keys(items).length - 3;
        // Foreach key that there is in item create a new element and assign to variable
        for(key in items){
            let td = document.createElement("td");
            if(key == "price"){
                let sum = document.getElementById('card-text');
                let price = parseInt(items[key], 10);
                let total = price * i;
                sum.innerHTML = total;
            }
            //Send the information to td element that we created in our document 
            td.appendChild(document.createTextNode(items[key]));
            document.getElementById('items').appendChild(td);
        }
    }
    createElement();

    function send(){
        // Post the information to new_order page with Ajax
        let localData = {...localStorage};
        let jsonString = JSON.stringify(localData);
        jsonString = JSON.parse(jsonString);
        $.ajax({
            type: "POST",
            url: "http://projectticket/new_order.php",
            dataType: "text",
            data: {"data": jsonString},
            success: function(data){
                window.location.replace('http://projectticket/insert_order.php');
                localStorage.clear();
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            console.log('Failed! error: ' + errorThrown);
        });
    }

});