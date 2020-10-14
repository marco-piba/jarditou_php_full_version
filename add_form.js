/********add_form.php**************/ 
const getFile =document.getElementById('getfile');
console.log(getFile);
const photoLink = document.querySelector('.photoLink');

getFile.addEventListener('change',function(e){
 const fileList = e.target.files[0].name;
 console.log(fileList);
 photoLink.textContent=fileList;
 });