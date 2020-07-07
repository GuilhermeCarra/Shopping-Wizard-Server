var product = {
    name: "Mock Sneakers",
    color: "black",
    size: 38,
    price: 19.95
}
// phase 1 start from here
function eventListenerFunction() {
    //Hide elements process
    for(let i = 2; i < 5; i++) document.getElementById("box_"+i).style.display = "none";
    document.getElementById("gift_text").style.display = "none";
    document.getElementById("FormPage").style.display = "none";

    // hoverover mouse to see image in the biger view
    document.getElementById("ml_preview").addEventListener("mouseover", function (event) {
        var modId = event.target.id.slice(4, event.target.id.length);
        // using slice method to take charecter after (4)
        modId == "review" ? modId = "image1" : "";

        // mouseover will change the source of the large picture by adding color, small picture ID and jpg format:  
        document.getElementById("ml_image1").src = product.color + "/" + modId + ".jpg";
    })

    // at mouseout source of the large picture returns back to image1:
    document.getElementById("ml_preview").addEventListener("mouseout", function () {
        document.getElementById("ml_image1").src = product.color + "/image1.jpg";
    })
    //selecting all the product with diffrent color 
    document.getElementById("mr_color").addEventListener("click", function (event) {
        // getting name of the color by clicking small color picture:
        var modColor = event.target.id.slice(4, event.target.id.length);
        modColor == "olor" ? modColor = product.color : "";

        //changing color value of the product object:
        product.color = modColor;

        document.getElementById("ml_image1").src = product.color + "/image1.jpg"; //changing color of the large image through source
        document.getElementById("main_title").innerHTML = product.name + " " + product.color.charAt(0).toUpperCase() + product.color.slice(1); //changing color text in product name

        //changing colors of the small preview images:
        for (let i = 0; i < document.getElementsByClassName("ml_preview_image").length; i++)
            document.getElementsByClassName("ml_preview_image")[i].src = product.color + "/image" + (i + 1) + ".jpg";
    })
    // selecting shoes sizes and by change method for diffrent sizes shoes
    document.getElementById("size_selector").addEventListener("change", function (event) {
        // changing the price value when user selecting diffrent sizes
        product.size = event.target.options[event.target.selectedIndex].value;
        product.price = 19.95 + ((product.size - 38) * 2);
        document.getElementById("main_show_price").innerHTML = product.price + " €";
        document.getElementById("f_price").innerHTML = product.price + " €";
    })
    
    document.getElementById("gift_checkbox").addEventListener("change", function () {
        if (this.checked) document.getElementById("gift_text").style.display = "block";
        else document.getElementById("gift_text").style.display = "none";
    }) 

   document.getElementById('radio_parent').addEventListener("click", function (event) {
    if(event.target.name=="shipment") {
        var dateStart = new Date();
        var shipmentPrice = 0;

        switch (event.target.value) {
            case "free" :  
                    dateStart.setDate(dateStart.getDate() + 3);
                    break;
            case "extra" : 
                    dateStart.setDate(dateStart.getDate() + 2);
                    shipmentPrice = 5;
                    break;
            case "prem" : 
                    dateStart.setDate(dateStart.getDate() + 1); 
                    shipmentPrice = 10;
                    break;
        }

        document.getElementById("f_shipping").innerText = shipmentPrice + ".00 €";
        document.getElementById("f_total").innerText = product.price + shipmentPrice + " €"; 

        var dateEnd = new Date(dateStart);
        dateEnd.setHours(dateEnd.getHours() + 6);

        document.getElementById("date_1").innerHTML = dateStart.toLocaleString();
        document.getElementById("date_2").innerHTML = dateEnd.toLocaleString();
        document.getElementById("f_date_1").innerHTML = dateStart.toLocaleString();
        document.getElementById("f_date_2").innerHTML = dateEnd.toLocaleString();
    }
    })

    document.getElementById("f_required_checkbox").addEventListener("change", function(event){
        event.target.checked ? document.getElementById("f_required_buynow").style.display = "block" : document.getElementById("f_required_buynow").style.display = "none";
    })

    let countryCodes = [376,34,33,49,30]
    let countryNames=["Andorra", "España", "Francia", "Alemania", "Grecia"]
    let selectors=document.querySelectorAll("#box_2 select");
    selectors[0].addEventListener("click",getValue);
        
    function getValue() {
        let countryName=selectors[0].value;
        let index = countryNames.indexOf(countryName);
        selectors[1].value=countryCodes[index];
    }
}

var page = 0;
var timeLeft = 5;
var reviewTime = document.getElementById("time_alert");

//Function buy starts the process of purchase
function buy(){
    var divCircles = document.getElementsByClassName("div_circle");
    var buttons = document.getElementsByClassName("black_button");
    //for each next button resetting the time countdown - 5 minutes for each step of registration
    for(let button of buttons) { button.addEventListener("click", function(event){event.preventDefault(); nextStep()});}

    document.getElementById("FormPage").style.display = "block";
    //adding properties of chosen product to final page summary:

    document.getElementById("final_product_name").innerHTML = document.getElementById("main_title").innerHTML;
    document.getElementById("final_size").innerHTML = product.size;
    document.getElementById("finish_image").src = document.getElementById("ml_image1").src;
    document.getElementById("final_color").style.backgroundColor = product.color;

    nextStep();
    function nextStep() {
        if (page > 0) {
            if(page == 4){
                clearInterval(warningInterval);
                clearInterval(timerInterval);
                document.getElementById("f_required_buynow").style.display = "none";
                document.getElementById("f_required_checkbox").style.display = "none";
                document.getElementById("f_conditions").innerHTML = "You purchase took " + timerMin + " minutes and "+timerSec+" seconds";
                document.getElementById("y_purchase").innerHTML = "Your order is complete! Thank You!";
                return;
            } else if(page == 3) document.getElementsByTagName("footer")[1].style.display = "none";

            let inputArr = document.getElementsByClassName("step" + page + "_input");
            let checked_answers = checkAnswers(inputArr);

            if (checked_answers.includes(false)) {
                for (let i in checked_answers)
                    !checked_answers[i] ? inputArr[i].parentElement.classList.add("input_error") : inputArr[i].parentElement.classList.remove("input_error");
                    
                return;
            }
        }

        clearInterval(warningInterval);
        timeLeft = 5;  
        divCircles[page].style.backgroundColor = "#888";
        page++;

        document.getElementById("box_" + (page - 1)).style.display = "none";
        document.getElementById("box_" + page).style.display = "block"; 
    }
}

var warningInterval = setInterval(() => {
    if (timeLeft == 0) resetBuy();
    timeLeft--;
    reviewTime.innerText = "You started registration " + (5 - timeLeft) + " minutes ago. You have " + timeLeft + " minutes left.";
    reviewTime.style.backgroundColor = "#d9d9d9";
}, 60000);

var timerSec = 0;
var timerMin = 0;
 
var timerInterval = setInterval (() => {
    timerSec++;
    if (timerSec == 60) {
        timerMin++; 
        timerSec=0;
    }
}, 1000);

function resetBuy() {
    clearInterval(warningInterval);
    page = 0;
    document.getElementById("box_0").style.display = "block";
    document.getElementById("FormPage").style.display = "none";
}

function checkAnswers(answersArr) {
    let results = [];

    for (let i = 0; i < answersArr.length; i++) {
        let ratOfLaboratory = answersArr[i].value;
        let req;

        if (page == 1) {
            switch (i) {
                case 0: req = /^[a-zA-Z0-9]{5,20}$/; break; //Username
                case 1: req = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/; break; //Email
                case 2: req = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/; break; //Password
                case 3: req = new RegExp(answersArr[i-1].value); break; //Same Password
            }
        } else if (page == 2){
            switch (i) {
                case 0: req = /^[a-zA-Z]{1,20}$/; break; //First Name
                case 1: req = /^[a-zA-Z]{1,20}$/; break; //Last Name
                case 2: req = /^\s*\S+(?:\s+\S+){1,50}/; break; //Adress1
                case 3: req = /^[0-9]{5}$/; break; //Postal Code
                case 4: req = /^[0-9]{9}$/; break; //Phone
            }
        }

        req.test(ratOfLaboratory) ? results.push(true) : results.push(false);
    }

    return results;
}

//!script admin //

// search admins
$("#edit-user").click(function(){
    alert("gola");
})
$("#search-user-table").on("keyup", function () {
    const value = $(this).val().toLowerCase();
    $("#user-table tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});

// search product
$("#search-product-table").on("keyup", function () {
    const value = $(this).val().toLowerCase();
    $("#table-products tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
})