/******AJAX bouton Search ***********/
const formSearch= document.querySelector('.formSearch');

formSearch.addEventListener('submit', function ajaxFunction(e){
  //  e.preventDefault();
    console.log('hello');
    let ajaxRequest;  // The variable that makes Ajax possible!

    try {
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
     }catch (e) {
        // Internet Explorer Browsers
        try {
           ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }catch (e) {
           try{
              ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
           }catch (e){
              // Something went wrong
              alert("Your browser broke!");
              return false;
           }
        }
     }
     
          
  /* ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4 && this.status == 200){
           let ajaxDisplay = document.getElementById('ajaxDiv');
           ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
     }*/
     
     // Now get the value from user and pass it to
          
     ajaxRequest.open("GET","tab2.php", true);
     ajaxRequest.send(); 
  })

/*****************tableau.php-header******************************/ 

const btnSearch =document.querySelector('.btnSearch');
const inputSearch = document.querySelector('.inputSearch');
const produits =document.querySelectorAll('.produit');
const precedentBtn =document.querySelector(".precedentBtn");
const suivantBtn=document.querySelector(".suivantBtn");
let lastPage = document.getElementById('lastPage').value;

const url =  window.location.href;


/*********btn precedent ou suivant disparait *****************/
if (url.endsWith(1)){precedentBtn.style.display='none'}

if(url.endsWith(parseInt(lastPage))){suivantBtn.style.display='none'}
    
