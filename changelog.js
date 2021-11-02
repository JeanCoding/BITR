document.getElementById("body").style.backgroundColor = "black";
document.getElementById("darkmodebutton").style.display = "block";
document.getElementById("darkmodebutton2").style.display = "none";

function changeMode() {
    document.getElementById("darkmodebutton").style.display = "none";
    document.getElementById("darkmodebutton2").style.display = "block";
    document.getElementById("body").style.backgroundColor = "#FAFAFA";
    document.getElementById("box").style.backgroundColor = "black";
    document.getElementById("header").style.color = "black";
    document.getElementById("undertext").style.color = "black";
    document.getElementById("box").style.color = "white";
    document.getElementById("li1").style.color = "white";
    document.getElementById("li2").style.color = "white";
    document.getElementById("li3").style.color = "white";
    document.getElementById("li4").style.color = "white";
    document.getElementById("startt").style.color = "black";
    document.getElementById("downloadt").style.color = "black";
    document.getElementById("faqt").style.color = "black";
    document.getElementById("start").src = "house2.png";
    document.getElementById("download").src = "download2.png";
    document.getElementById("faq").src = "faq2.png";
    document.getElementById("home").src = "logo.png";
    document.getElementById("a1").style.color = "black";
    document.getElementById("a2").style.color = "black";
    document.getElementById("a3").style.color = "black";
}

function changeMode2() {
    document.getElementById("body").style.backgroundColor = "black";
    document.getElementById("darkmodebutton").style.display = "block";
    document.getElementById("darkmodebutton2").style.display = "none";
    document.getElementById("box").style.color = "black";
    document.getElementById("li1").style.color = "black";
    document.getElementById("li2").style.color = "black";
    document.getElementById("li3").style.color = "black";
    document.getElementById("li4").style.color = "black";
    document.getElementById("box").style.backgroundColor = "white";
    document.getElementById("header").style.color = "white";
    document.getElementById("undertext").style.color = "white";
    document.getElementById("startt").style.color = "white";
    document.getElementById("downloadt").style.color = "white";
    document.getElementById("faqt").style.color = "white";
    document.getElementById("start").src = "house.png";
    document.getElementById("download").src = "download.png";
    document.getElementById("faq").src = "faq.png";
    document.getElementById("home").src = "logow.png";
    document.getElementById("a1").style.color = "white";
    document.getElementById("a2").style.color = "white";
    document.getElementById("a3").style.color = "white";
}

function nextText() {
    document.getElementById("insideh2").innerHTML = "Version 1.1 | First upgrades!";
    document.getElementById("li1").innerHTML = "Added dark/white mode";
    document.getElementById("li2").style.display = "none";
    document.getElementById("li3").style.display = "none";
    document.getElementById("li4").style.display = "none";
    document.getElementById("li5").style.display = "none";
}
