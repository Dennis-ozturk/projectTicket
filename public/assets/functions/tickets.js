document.addEventListener("DOMContentLoaded", function(){
    // Gets event name and price by id
    let eventName = document.getElementById('eventName').textContent;
    let eventPrice = document.getElementById('eventPrice').textContent;

    // Query selector for checkout btn and clear
    let submitBtn = document.querySelector('.checkout-btn');
    let clearBtn = document.querySelector('.clear');

    // returns a HTMLCollection listing all the forms that contains in the document by the name of tickets[]
    let ticketData = document.forms['ticketData'].elements[ 'tickets[]' ];
    let newTicketData = [];
    let cleanTickets = [];

    //If checkout btn is clicked list all the values which is checked from event tickets to an array
    submitBtn.addEventListener('click', function(){
        for(let i = 0; i < ticketData.length; i++){
            if(ticketData[i].checked){
                newTicketData.push(ticketData[i].value);
            }
        }
        //Gets all data and set unique values to store
        cleanTickets = [ ...new Set(newTicketData) ];
        
        if(!displayCookies()){
            clearCookies();
        }else{
            setCookies(cleanTickets, eventName, eventPrice);
        }
    });

    clearBtn.addEventListener('click', function(){
        clearCookies();
    });

    //set cookie all the tickets and event name,price and total price
    function setCookies(data, event, price){
        if(data.length != 0){
            for(let i = 0; i < data.length; i++){
                localStorage.setItem('Ticket'+i, data[i]);
            }
            localStorage.setItem('event', event);
            localStorage.setItem('price', price);
            localStorage.setItem('total', price * data.length);
            window.location.href = "http://projectticket/checkout.php";
        }
    }

    function displayCookies(){
        //tickets ... gets all the localStorage data in a object 
        const tickets = {...localStorage};
        return tickets;
    }

    function clearCookies(){
        localStorage.clear();
    }
});
