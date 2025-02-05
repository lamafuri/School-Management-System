
let msgBox= document.getElementById("msgBox");
let msgViewPage = document.getElementById("msg");
let userBox = document.getElementById("userBox");
let userViewPage = document.getElementById("user");
msgBox.addEventListener("click",()=>{
    console.log("scroll msg");
    msgViewPage.scrollIntoView({behavior:"smooth"});//navigate to #msgReceived
});
userBox.addEventListener("click",()=>{
    console.log("scroll user");

    userViewPage.scrollIntoView({behavior:"smooth"});
});
