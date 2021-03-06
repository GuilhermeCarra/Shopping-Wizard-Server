var product =[];
var productFinal = {};
productRequest();

function productRequest() {
    var productReq = new XMLHttpRequest();
    productReq.onload = function() {
        if (this.responseText.includes("error")) {
            window.location.href = "notfound.php";
        } else {
            product = JSON.parse(this.responseText)[1];
            product.id = JSON.parse(this.responseText)[0];
            eventListenerFunction()
}
    };
    productReq.open("GET", "get-product.php", true);
    productReq.send();
}

function eventListenerFunction() {
    // Hide elements process
    for(let i = 2; i < 5; i++) document.getElementById("box_"+i).style.display = "none";
    document.getElementById("gift_text").style.display = "none";
    document.getElementById("FormPage").style.display = "none";

    /*
        FILLING PAGE WITH THE REQUESTED PRODUCT INFORMATION:
    */

    // Product title
    document.querySelector("#main_title").innerHTML = product.name + " " + product.color[0];
    // Preview images thumbnails
    changePreviewImages(0);
    // Price
    document.querySelector("#main_show_price").innerHTML = product.size[Object.keys(product.size)[0]] + " €"
    // Colors options
    for (let i = 0; i < 3; i ++ ) {
        document.querySelectorAll(".mr_color_image")[i].dataset.color = i;
        document.querySelectorAll(".mr_color_image")[i].src = "assets/img/products/"+ product.id + "-" + product.color[i] + "-0.jpg";
    }
    // Shoes sizes (select input options)
    for(let i = 0; i < Object.keys(product.size).length; i++) {
        let option = document.createElement("option");
        option.value = Object.keys(product.size)[i];
        option.innerText = Object.keys(product.size)[i];
        document.querySelector("#size_selector").appendChild(option);
    }

    /*
        USER ACTIONS:
    */

    // User mouse over preview thumbnails to see it in the bigger view
    document.getElementById("ml_preview").addEventListener("mouseover", function () {
        if(event.target.classList.contains("ml_preview_image")) {
            document.getElementById("ml_image1").src = event.target.src;
        }
    });

    // User selects a product with a different color (click on image)
    document.getElementById("mr_color").addEventListener("click", function () {
        if (event.target.classList.contains("mr_color_image")){
            changePreviewImages(event.target.dataset.color);
            document.getElementById("main_title").innerHTML = product.name + " " + product.color[event.target.dataset.color];
        }
    });

    // User changes shoes size (input select change)
    document.getElementById("size_selector").addEventListener("change", function () {
        // Updates price based on product size
        let size = event.target.options[event.target.selectedIndex].value;
        document.getElementById("main_show_price").innerHTML = product.size[size] + " €";
    });

    document.getElementById("gift_checkbox").addEventListener("change", function () {
        if (this.checked) document.getElementById("gift_text").style.display = "block";
        else document.getElementById("gift_text").style.display = "none";
    });

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
    });

    document.getElementById("f_required_checkbox").addEventListener("change", function(event){
        event.target.checked ? document.getElementById("f_required_buynow").style.display = "block" : document.getElementById("f_required_buynow").style.display = "none";
    });

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
    // start 5 minutes time count
    warningInterval = setInterval( () => {
        timeLeft--;
        if (timeLeft == 0) resetBuy();
        reviewTime.innerText = "You started registration " + (5 - timeLeft) + " minutes ago. You have " + timeLeft + " minutes left.";
        reviewTime.style.display = "block";
        setTimeout(() => reviewTime.style.display = "none", 6000);
    }, 60000);

    timerInterval = setInterval (() => {
        timerSec++;
        if (timerSec == 60) {
            timerMin++;
            timerSec=0;
        }
    }, 1000);

    var divCircles = document.getElementsByClassName("div_circle");
    var buttons = document.getElementsByClassName("black_button");
    //for each next button resetting the time countdown - 5 minutes for each step of registration
    for(let button of buttons) {
        if (!timeOver && button.innerText != "BUY") {
            button.addEventListener("click", function(event){
                event.preventDefault();
                nextStep();
            });
        }
    }

    document.getElementById("FormPage").style.display = "block";
    //adding properties of chosen product to final page summary:

    document.getElementById("final_product_name").innerHTML = document.getElementById("main_title").innerHTML;
    document.getElementById("final_size").innerHTML = product.size;
    document.getElementById("finish_image").src = document.getElementById("ml_image1").src;
    document.getElementById("final_color").style.backgroundColor = product.color;

    nextStep();
    async function nextStep() {
        if (page > 0) {
            if (page == 3) {
                document.querySelector(".background_grey").style.display = "block"
            }
            if(page == 4){
                clearInterval(warningInterval);
                clearInterval(timerInterval);
                document.getElementById("f_required_buynow").style.display = "none";
                document.getElementById("f_required_checkbox").style.display = "none";
                document.getElementById("f_conditions").innerHTML = "You purchase took " + timerMin + " minutes and "+timerSec+" seconds";
                document.getElementById("f_conditions").classList.add("f_time");
                document.getElementById("f_conditions").classList.remove("fix");
                document.getElementById("y_purchase").innerHTML = "Your order is complete! Thank You!";
                return;
            } else if(page == 3) document.getElementsByTagName("footer")[1].style.display = "none";

            let inputArr = document.getElementsByClassName("step" + page + "_input");
            await checkAnswers(inputArr, page);
        }
        divCircles[page].style.backgroundColor = "#888";
        page++;

        document.getElementById("box_" + (page - 1)).style.display = "none";
        document.getElementById("box_" + page).style.display = "block";
    }
}

var warningInterval;
var timeOver = false;
var timerSec = 0;
var timerMin = 0;
var timerInterval;

function resetBuy() {
    timeOver = true;
    clearInterval(warningInterval);
    clearInterval(timerInterval);
    timerSec = 0;
    timerMin = 0;
    page = 0;
    timeLeft = 5;
    document.getElementById("box_0").style.display = "block";
    document.getElementsByTagName("footer")[1].style.display = "flex";
    document.getElementById("box_1").style.display = "block";
    document.getElementById("box_2").style.display = "none";
    document.getElementById("box_3").style.display = "none";
    document.getElementById("box_4").style.display = "none";
    document.getElementById("box_4").style.display = "none";
    document.querySelector(".background_grey").style.display = "none"
    document.getElementById("FormPage").style.display = "none";
}

async function checkAnswers(inputArr, page) {
    console.log(page)
    const formId = {
        1: '#form-profile',
        2: '#form-address'
    }[page];

    await $.ajax({
        type: 'POST',
        url: 'validate.php',
        data: $(formId).serialize(),
        success: (response) => {
            console.log(response)
            checked_answers = JSON.parse(response);

            if (checked_answers.includes(false)) {
                for (let i in checked_answers)
                    !checked_answers[i] ? inputArr[i].parentElement.classList.add("input_error") : inputArr[i].parentElement.classList.remove("input_error");
                return;
            }
        }
    })
}

// NEW FUNCTIONS
function changePreviewImages(colorNumber) {
    document.getElementById("ml_image1").src = "assets/img/products/"+ product.id + "-" + product.color[colorNumber] + "-" + 0 + ".jpg";
    for (let i = 0; i < document.getElementsByClassName("ml_preview_image").length; i++)
    document.getElementsByClassName("ml_preview_image")[i].src = "assets/img/products/"+ product.id + "-" + product.color[colorNumber] + "-" + i + ".jpg";
}


//!script admin //

// search admins
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
