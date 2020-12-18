/************************contact.php*****************************/ 
const formSub =document.querySelector(".formSub");
console.log(formSub);

/*****bouton submit ****/

formSub.addEventListener("submit",function (e){

console.log('hhoh');

let notAllowed =/^([a-z]+(( |')[a-z]+)*)+([-]([a-z]+(( |')[a-z]+)*)+)*$/u;

//conditions nom
const firstName =document.getElementById("fname");
console.log(firstName);
let nomVal = firstName.value ;

if(!notAllowed.test(nomVal)){
const errorFname =document.querySelector(".messageError1");
e.preventDefault();
redBorder(firstName,errorFname,'Erreur dans la saisie du nom');
firstName.value="";
delayView(errorFname);
}
//conditions prenom
const lastName =document.getElementById("lname")
let prenomVal = lastName.value ;

if(!notAllowed.test(prenomVal)){
    const errorLname =document.querySelector(".messageError2")
    e.preventDefault();
    redBorder(lastName,errorLname,'Erreur dans la saisie du prenom');
    firstName.value="";
    delayView(errorLname)
}

//conditions sexe
const male=document.getElementById("male")
const female=document.getElementById("female")

if(!male.checked && !female.checked){
    const messageError3=document.querySelector(".messageError3");
    e.preventDefault();
    messageError3.classList.add("SeeMessageError");
    messageError3.innerText= 'renseignez votre sexe'
    delayView(messageError3)
}

// conditions code postal

const CodePostal =document.getElementById ("CodePostal");
const errorCodePostal =document.querySelector(".messageError5");

let regCodePostal = /^[0-9][^a-zA-Z]/

let valeur5 =CodePostal.value

if(!regCodePostal.test(CodePostal.value) || 5>valeur5.length>5){
    e.preventDefault();
    redBorder(CodePostal,errorCodePostal,"une code postal n'est pas valide")
    delayView(errorCodePostal)
}

// conditions pour email

const email =document.getElementById("email")
const errorEmail =document.querySelector(".messageError6")
let valeurEmail =email.value
let regForEmail  = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/



if(!regForEmail.test(valeurEmail)){
    e.preventDefault();
redBorder(email,errorEmail,"il y a une erreur dans votre adresse email")
delayView(errorEmail)
valeurEmail=""}


//conditions pour la question 
const question =document.getElementById("question")
const errorQuestion =document.querySelector(".messageError7")

let regQuestion = /\?$/
let questionValue =question.value

if(!regQuestion.test(questionValue)){
    e.preventDefault();
    redBorder(question,errorQuestion,"il ya une erreur dans votre question")
    delayView(errorQuestion)
    questionValue=""
}
//checkbox formulaire 
const checkBox =document.getElementById("formulaireValidation")
const errorCheckBox =document.querySelector(".messageError8")

if (!checkBox.checked) {
    e.preventDefault();
    errorCheckBox.classList.add("SeeMessageError");
errorCheckBox.innerText= 'cocher la case avant envoi'
delayView(errorCheckBox)}
})


const btnReset =document.querySelector(".btn34")
const formReset =document.querySelectorAll("fieldset form>input") 

/*****bouton reset ****/
formSub.addEventListener("reset",function(){
   console.log('yesssssss');

   formReset.forEach(inputEx5=>{
    if(inputEx5.id =='male'|| inputEx5.id =='female'){
    inputEx5.checked=false;}
    return inputEx5.value='';
    })
})

/*FUNCTIONS */

function redBorder(x,f,y){
    x.style.border = '2px solid red';
    f.classList.add("SeeMessageError");
    f.innerText =y;
}

function delayView(x){
    setTimeout(() => {
        x.classList.remove("SeeMessageError")
    }, 5000);
}



/************le message php disparait******************/

if (document.querySelector('.formulAir') !== 'undefined') {

    setTimeout(() => {document.querySelector('.formulAir').classList.add("messageForm");
    }, 5000);
}



