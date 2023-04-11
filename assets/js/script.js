



'use strict';



/**
 * navbar toggle
 */

const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navbar = document.querySelector("[data-navbar]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");

const navElemArr = [navOpenBtn, navCloseBtn];

for (let i = 0; i < navElemArr.length; i++) {
  navElemArr[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
  });
}

/**
 * toggle navbar when click any navbar link
 */

const navbarLinks = document.querySelectorAll("[data-nav-link]");

for (let i = 0; i < navbarLinks.length; i++) {
  navbarLinks[i].addEventListener("click", function () {
    navbar.classList.remove("active");
  });
}





/**
 * header active when window scrolled down
 */

const header = document.querySelector("[data-header]");

window.addEventListener("scroll", function () {
  window.scrollY >= 50 ? header.classList.add("active")
    : header.classList.remove("active");
});
/**
 * Control the input of the form 
 */
const email = document.getElementById("email");
const fn = document.getElementById("fn");
const cardname = document.getElementById("card-name");
const cardnumber = document.getElementById("nbr");
const amount = document.getElementById("donation");
const btn = document.getElementById("donation-button");
const arr=new Array(email,fn,cardname,cardnumber,amount);
const card1=document.getElementById("card1");
const card2=document.getElementById("card2");
const card3=document.getElementById("card3");
const card4=document.getElementById("card4");
btn.addEventListener("click",(e)=>{
  e.preventDefault();
  var str="";
  var test=true;
  console.log(arr);
  for (let i of arr) {
    console.log(i.value);
    if (i && i.value.toString().trim().length === 0) {
        str += i.name + "\n";
    }
  }

    if(str.length > 0){
      console.log(str);
      window.alert("These fields are mandatory:\n"+str);
    }
    else{
      if(!card1.checked&&!card2.checked&&!card3.checked&&!card4.checked){
        window.alert("Please choose card type");
      }
      else{
        const emailInput = document.getElementById("email");
        const email = emailInput.value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
          window.alert("Format E-mail non valide!");
        }
      }
    }

  })
  


