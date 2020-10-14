
/***********************produits_ajouts.php************************/ 
const btnImage=document.getElementById("btnImage");
const confirmSuppressPage =document.querySelector('.confirmSuppressPage');
const supConfirm =document.querySelector('.supConfirm');

            /*****functions***********/ 

function toggleSup(){
    confirmSuppressPage.classList.toggle('showPage')};

            /*****addeventlisteners***********/ 

supConfirm.addEventListener('click',function(){
    toggleSup();
    window.scroll(0,500);
    })


