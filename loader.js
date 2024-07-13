function loader(){
    document.querySelector('.loader').style.display = 'none';
 }
 
 function fadeOut(){
    setInterval(loader, 1500);
 }
 
 window.onload = fadeOut;