window.addEventListener('load',()=>{
    console.log("NEW WORLD JS LOADED")
    let button1=document.getElementById("lookup");
    let input=document.querySelector("#country");
    let result=document.getElementById("result");

    const httpRequest =new XMLHttpRequest;
    
    button1.addEventListener("click",()=>{
        console.log("Clicked");
        let url="http://localhost/info2180-lab5/world.php?query="+input.value;
        httpRequest.onreadystatechange=function1;
        httpRequest.open('GET',url);
        httpRequest.send();

    });

    function function1() {
        
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
         if (httpRequest.status === 200) {
         let response = httpRequest.responseText;
         //alert(response);
         console.log(response);
         result.innerHTML=response;
         } else {
         alert('There was a problem with the request.');
         }
        }
        }

        
});