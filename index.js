document.getElementById("darkmodebutton2").style.display = "none";
document.getElementById("followbuttonn").style.display = "none";
document.getElementById("followbutton11").style.display = "none";
document.getElementById("followbutton22").style.display = "none";
document.getElementById("followbutton33").style.display = "none";

function changeMode() {
    document.getElementById("body").style.backgroundColor = "white";
    document.getElementById("startt").style.color = "black";
    document.getElementById("downloadt").style.color = "black";
    document.getElementById("faqt").style.color = "black";
    document.getElementById("start").src = "house2.png";
    document.getElementById("download").src = "download2.png";
    document.getElementById("faq").src = "faq2.png";
    document.getElementById("naamtag").style.color = "black";
    document.getElementById("home").src = "logo.png";
    document.querySelector(".tweet-input").style.backgroundColor = "#FAFAFA";
    document.querySelector(".tweet-input").style.color = "rgb(44, 44, 44)";
    document.getElementById("darkmodebutton").style.display = "none";
    document.getElementById("darkmodebutton2").style.display = "block";
    document.querySelector(".tweet-input").style.border = "none";
    document.getElementById("a1").style.color = "black";
    document.getElementById("a2").style.color = "black";
    document.getElementById("a3").style.color = "black";
    document.getElementById("username").style.color = "black";
    document.getElementById("table").style.color = "black";
    document.getElementById("table").style.backgroundColor = "#FAFAFA";

    document.getElementById("volg").style.color = "black";
    document.getElementById("jt").style.color = "black";
    document.getElementById("mt").style.color = "black";
    document.getElementById("st").style.color = "black";
    document.getElementById("st1").style.color = "black";
    document.getElementById("box").style.backgroundColor = "#FAFAFA";
    document.getElementById("followbutton").style.backgroundColor = "black";
    document.getElementById("followbutton1").style.backgroundColor = "black";
    document.getElementById("followbutton2").style.backgroundColor = "black";
    document.getElementById("followbutton3").style.backgroundColor = "black";
    document.getElementById("followbutton").style.color = "white";
    document.getElementById("followbutton1").style.color = "white";
    document.getElementById("followbutton2").style.color = "white";
    document.getElementById("followbutton3").style.color = "white";
    document.getElementById("personf").src = "personblack.png"
    document.getElementById("personf1").src = "personblack.png"
    document.getElementById("personf2").src = "personblack.png"
    document.getElementById("personf3").src = "personblack.png"
}

function changeMode2() {
    document.getElementById("body").style.backgroundColor = "black";
    document.getElementById("startt").style.color = "white";
    document.getElementById("downloadt").style.color = "white";
    document.getElementById("faqt").style.color = "white";
    document.getElementById("start").src = "house.png";
    document.getElementById("download").src = "download.png";
    document.getElementById("faq").src = "faq.png";
    document.getElementById("naamtag").style.color = "white";
    document.getElementById("home").src = "logow.png";
    document.querySelector(".tweet-input").style.backgroundColor = "rgb(44, 44, 44)";
    document.querySelector(".tweet-input").style.color = "white";
    document.getElementById("darkmodebutton").style.display = "block";
    document.getElementById("darkmodebutton2").style.display = "none";
    document.getElementById("a1").style.color = "white";
    document.getElementById("a2").style.color = "white";
    document.getElementById("a3").style.color = "white";
    document.getElementById("username").style.color = "white";
    document.getElementById("table").style.color = "white";
    document.getElementById("table").style.backgroundColor = "rgb(44, 44, 44)";

    document.getElementById("volg").style.color = "white";
    document.getElementById("jt").style.color = "white";
    document.getElementById("mt").style.color = "white";
    document.getElementById("st").style.color = "white";
    document.getElementById("st1").style.color = "white";
    document.getElementById("box").style.backgroundColor = "rgb(44, 44, 44)";
    document.getElementById("followbutton").style.backgroundColor = "white";
    document.getElementById("followbutton1").style.backgroundColor = "white";
    document.getElementById("followbutton2").style.backgroundColor = "white";
    document.getElementById("followbutton3").style.backgroundColor = "white";
    document.getElementById("followbutton").style.color = "black";
    document.getElementById("followbutton1").style.color = "black";
    document.getElementById("followbutton2").style.color = "black";
    document.getElementById("followbutton3").style.color = "black";
    document.getElementById("personf").src = "person.png"
    document.getElementById("personf1").src = "person.png"
    document.getElementById("personf2").src = "person.png"
    document.getElementById("personf3").src = "person.png"
}

function followUser1() {
    document.getElementById("followbutton").style.display = "none";
    document.getElementById("followbuttonn").style.display = "block";
}

function followUser2() {
    document.getElementById("followbutton1").style.display = "none";
    document.getElementById("followbutton11").style.display = "block";
}

function followUser3() {
    document.getElementById("followbutton22").style.display = "none";
    document.getElementById("followbutton22").style.display = "block";
}

function followUser4() {
    document.getElementById("followbutton3").style.display = "none";
    document.getElementById("followbutton33").style.display = "block";
}

function followUser11() {
    document.getElementById("followbutton").style.display = "block";
    document.getElementById("followbuttonn").style.display = "none";
    alert("Je hebt @JeanKalo ontvolgd!");
}

function followUser22() {
    document.getElementById("followbutton1").style.display = "block";
    document.getElementById("followbutton11").style.display = "none";
    alert("Je hebt @MauroScheltens ontvolgd!");
}

function followUser33() {
    document.getElementById("followbutton2").style.display = "block";
    document.getElementById("followbutton22").style.display = "none";
    alert("Je hebt @SezginKaraduman ontvolgd!");
}

function followUser44() {
    document.getElementById("followbutton3").style.display = "block";
    document.getElementById("followbutton33").style.display = "none";
    alert("Je hebt @SimonSandberg ontvolgd!");
}