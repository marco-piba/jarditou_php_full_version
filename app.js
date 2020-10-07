/*****************tableau.php************************************/ 
const photoAdd =document.getElementById('photoAdd')
const inputPhoto=document.getElementById("inputPhoto")

           /*****functions***********/ 
           function addphoto(){
            let value = inputPhoto.value;
            console.log(value)
            photoAdd.innerHTML=`<img src="${value}" class="img-fluid" id="image" name='image' alt="photo du produit"></img>
            <input type="text" id='inputPhoto2' name="inputPhoto" class='my-3'></br>`;
            const inputPhoto2=document.getElementById("inputPhoto2")
            inputPhoto2.value = value ;
            }

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
    });


