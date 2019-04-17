document.addEventListener("DOMContentLoaded", function(){
    let eventName = document.getElementById('eventName').textContent;
    let eventPrice = document.getElementById('eventPrice').textContent;

    let submitBtn = document.querySelector('.checkout-btn');
    let clearBtn = document.querySelector('.clear');

    let ticketData = document.forms['ticketData'].elements[ 'tickets[]' ];
    let newTicketData = [];
    let cleanTickets = [];

    submitBtn.addEventListener('click', function(){
        for(let i = 0; i < ticketData.length; i++){
            if(ticketData[i].checked){
                newTicketData.push(ticketData[i].value);
            }
        }
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
        const tickets = {...localStorage};
        return tickets;
    }

    function clearCookies(){
        localStorage.clear();
    }
});
