/**
 * header active when window scrolled down
 */

const header = document.querySelector("[data-header]");

window.addEventListener("scroll", function () {
  window.scrollY >= 50 ? header.classList.add("active")
    : header.classList.remove("active");
});
  /** */
  const op1=document.getElementById("option1");
  const op2=document.getElementById("option2");
  const op3=document.getElementById("option3");
  const op4=document.getElementById("option4");
  const o1=document.getElementById("op1");
  const o2=document.getElementById("op2");
  const o3=document.getElementById("op3");
  const o4=document.getElementById("op4");
  op1.addEventListener('click', function() {
    // Simulate a click event on the checkbox
    if (op1.checked){
        o1.classList.add("shown");
    }
    else{
        o1.classList.remove("shown");
    }
  });
  op2.addEventListener('click', function() {
    // Simulate a click event on the checkbox
    if (op2.checked){
        o2.classList.add("shown");
    }
    else{
        o2.classList.remove("shown");
    }
  });
  op3.addEventListener('click', function() {
    // Simulate a click event on the checkbox
    if (op3.checked){
        o3.classList.add("shown");
    }
    else{
        o3.classList.remove("shown");
    }
  });
  op4.addEventListener('click', function() {
    // Simulate a click event on the checkbox
    if (op4.checked){
        o4.classList.add("shown");
    }
    else{
        o4.classList.remove("shown");
    }
  });
  /**** */
  function switchParagraph(buttonId, paragraphId) {
    var buttons = document.getElementsByClassName("tab-btn");
    var paragraphs = document.getElementsByClassName("section-text");
  
    // Reset color of all buttons
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove("active");
    }
  
    // Hide all paragraphs
    for (var i = 0; i < paragraphs.length; i++) {
        paragraphs[i].style.display = "none";
    }
  
    // Set color of clicked button and show corresponding paragraph
    var button = document.getElementById(buttonId);
    var paragraph = document.getElementById(paragraphId);
  
    button.classList.add("active");
    paragraph.style.display = "block";
  }
  /**
 * Control the input of the form 
 */
console.log("Starting form submission...");
const email = document.getElementById("email");
const fn = document.getElementById("fn");
const cardname = document.getElementById("card-name");
const cardnumber = document.getElementById("nbr");
const btn = document.getElementById("donation-button");
const arr=new Array(email,fn,cardname,cardnumber);
const card1=document.getElementById("paypal");
const card2=document.getElementById("mastercard");
const card3=document.getElementById("american express");
const card4=document.getElementById("visa");
btn.addEventListener("click",(e)=>{
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
      e.preventDefault(); 
    }
    else{
      console.log("checkpoint1");
      if(!card1.checked&&!card2.checked&&!card3.checked&&!card4.checked){
        window.alert("Please choose card type");
        e.preventDefault(); 
      }
      else{
        const emailInput = document.getElementById("email");
        const email = emailInput.value;
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
          window.alert("E-mail format not Valid!");
          e.preventDefault(); 
        }
        else{
          if(!op1.checked && !op2.checked && !op3.checked && !op4.checked){
            window.alert("Please choose the purpose of donation");
            e.preventDefault(); 
        }
          else{
            const HarvestRainwater = parseInt(document.getElementById("donation1").value);
            console.log(HarvestRainwater);
            const ConserveWater = parseInt(document.getElementById("donation2").value);
            console.log(ConserveWater);
            const Desalination = parseInt(document.getElementById("donation3").value);
            console.log(Desalination);
            const ReuseWastewater = parseInt(document.getElementById("donation4").value);
            console.log(ReuseWastewater);
            
            const DonAmounts = [HarvestRainwater, ConserveWater, Desalination, ReuseWastewater];
            
            if (DonAmounts.every(amount => amount === 0)) {
              window.alert("Please enter the amount of donation");
              e.preventDefault(); 
            }
            console.log("Reached the end of form submission logic.");
          }
        }
      }
    }


  })
  ////zooomimages
  // Code JavaScript
var aboutImages = document.querySelectorAll('.about-img');

aboutImages.forEach(function(image) {
  image.addEventListener('mouseenter', function() {
    this.style.transform = 'scale(1.2)';
  });

  image.addEventListener('mouseleave', function() {
    this.style.transform = 'scale(1)';
  });
});

  