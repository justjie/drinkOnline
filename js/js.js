const title = document.querySelector(".title");

title.addEventListener("click", function(e){
    console.log(e);
   e.target.textContent = "Yay!!"; 
});