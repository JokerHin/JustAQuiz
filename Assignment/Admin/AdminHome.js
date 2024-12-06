

document.querySelector(".del-button").addEventListener("click",()=>{
    alert("Hello");
    document.querySelector(".popup").style.display = "flex";
  })
  
  document.getElementById("close-button").addEventListener("click",()=>{
    document.querySelector(".popup").style.display = "none";
  })