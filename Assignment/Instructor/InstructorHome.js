let close = document.getElementById("close-button");
let open = document.querySelector(".profilepic");
let target = document.querySelector(".popup");


open.addEventListener("click",()=>{
    target.style.display = "flex";
  })
  
close.addEventListener("click",()=>{
    target.style.display = "none";
  })