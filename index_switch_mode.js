const uploadbtn=document.getElementById('uploadbtn');
const capturebtn=document.getElementById('capturebtn');
const upload=document.getElementById('upload');
const capture=document.getElementById('capture');

uploadbtn.addEventListener('click',function(){
    capture.style.display="none";
    upload.style.display="block";
})
capturebtn.addEventListener('click', function(){
    capture.style.display="block";
    upload.style.display="none";
})