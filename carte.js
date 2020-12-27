
//*****carte.js et pro_detail;js a modifié pour faire en sorte q la carte soit accessible sur toutes les pages  */



const shop_cart_nb =document.querySelector(".shop_cart_nb");
const carttotal =document.querySelector('.cart-total')
const clearCart = document.querySelector('.clear-cart')
const carteAjout =document.querySelector(".cart-content");


/***convertir produits.json en js objets */

let carte =[];
let value=1;

class Produits {

 async AccProduits (){
   try{
      let result = await fetch("produits.json");
      let data = await result.json();
      console.log(data);
      return data;
  }catch(error){
  console.log(error);
      }
  }

}

class AjoutProd{


  ajoutCart(produits,quantite,btnid){
    let produit=produits.filter((pro)=>pro.pro_id==btnid)
    console.log(produit);
    let checkUniq = carte.filter((prod)=>prod.pro_id==btnid)
    console.log(checkUniq)

    if(checkUniq.length===0){
      produit[0].pro_quant = quantite
      carte=[...carte,produit[0]];
      console.log(carte)
      Depot.saveCart(carte);
    }
    else{
      console.log(checkUniq[0]);
      let v =carte.find((prod)=>prod.pro_id==checkUniq[0].pro_id)
      console.log(v);
      v.pro_quant += quantite
      Depot.saveCart(carte);
    }
    console.log(carte)
  }

  affichCart(){


    let you=this;
    carte.forEach((produit)=>{

    const div = document.createElement("div");
    div.classList.add("cart-item");
    div.innerHTML = `
    <div class="contimg"><img src=photo/${produit.pro_id}.${produit.pro_photo}
    alt="produit"/></div>
    <div>
    <h4>${produit.pro_libelle} (ref:${produit.pro_ref})</h4>
    <h5>${produit.pro_prix}Eur</h5>
    <span class="remove-item" data-id=${produit.pro_id}>Retirer</span>
    </div>
    <div>
    <i class="fas fa-chevron-up" data-id=${produit.pro_id}></i>
    <p class="item-amount">${produit.pro_quant}</p>
    <i class="fas fa-chevron-down" data-id=${produit.pro_id}></i>
    </div>`;
    
    carteAjout.appendChild(div);

    const chevronUp = div.querySelector(".fa-chevron-up");
    const chevronDown = div.querySelector(".fa-chevron-down");
    const removeItem =div.querySelector('.remove-item')


    removeItem.addEventListener('click',function(e){
      let btnID=removeItem.dataset.id;
      carte=carte.filter((article)=>article.pro_id !==btnID )
      e.target.parentNode.parentNode.parentNode.removeChild(e.target.parentNode.parentNode)
      you.calculTotCarte();
      you.QuantItemCart();
      Depot.saveCart(carte);
      
    })
    

    chevronDown.addEventListener('click',function(){
    let valeur =parseInt(chevronDown.previousElementSibling.textContent)-1
      if(valeur==0){valeur=1}
    chevronDown.previousElementSibling.textContent=valeur;
     produit.pro_quant = valeur;
      Depot.saveCart(carte);
      you.calculTotCarte();
      you.QuantItemCart();

     console.log(carte)
   })

    chevronUp.addEventListener('click',function(){
  
    let valeur =parseInt(chevronDown.previousElementSibling.textContent)+1
    chevronDown.previousElementSibling.textContent=valeur;
    produit.pro_quant = valeur;
    Depot.saveCart(carte);
    you.calculTotCarte();
    you.QuantItemCart(),
    console.log(carte)
    })

   })  
 }

 calculTotCarte(){
   let total = 0;
  carte.forEach((produit)=>{total+=produit.pro_prix * produit.pro_quant})
  carttotal.textContent=total.toFixed(2);

 }

 QuantItemCart(){
    let total = 0;
    carte.forEach((produit)=>{total+= produit.pro_quant})
    shop_cart_nb.textContent=total;
 }

 CarteLogic(){
   this.affichCart();
   this.calculTotCarte();
   this.QuantItemCart();
 }

}


//session depot
class Depot {

  static saveCart(cart) {
    sessionStorage.setItem("cart", JSON.stringify(cart));
  }
  static getCart() {
    return sessionStorage.getItem("cart")
      ? JSON.parse(sessionStorage.getItem("cart"))
      : [];}
  }

 




clearCart.addEventListener('click',function(){
carteAjout.innerHTML='';
carte=[];
carttotal.textContent=0;
shop_cart_nb.textContent=0
Depot.saveCart(carte);

})



 document.addEventListener("DOMContentLoaded", () => {

  const produits = new Produits();
  const ajoutprod= new AjoutProd();

  carte= Depot.getCart();
  console.log(carte)
  ajoutprod.CarteLogic();
  produits
    .AccProduits()
     
});
