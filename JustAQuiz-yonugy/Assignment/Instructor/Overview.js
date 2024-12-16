let open = document.querySelector(".edit");
let close = document.getElementById("close-button");
let target = document.querySelector(".popup-edit");
let submit = document.querySelector(".pop-up-submit");

open.addEventListener("click",()=>{
    target.style.display = "flex";
  })
  
close.addEventListener("click",()=>{
    target.style.display = "none";
  })

submit.addEventListener("click",()=>{
    target.style.display = "none";
})