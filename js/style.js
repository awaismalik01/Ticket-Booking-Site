
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) 
{
  showDivs(slideIndex += n);
}

function showDivs(n) 
{
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) 
  {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

function myFunction($parameter)
{
    document.getElementById($parameter).disabled = true;
}

function checkPassword(form, temp1, temp2)
{ 
    username = form.username.value; 
    password = form.password.value; 

    if (username != temp1 || password != temp2) 
    {
        alert ("Incorrect username or password");       
        return false;
    }
    else
    {
        return true; 
    }
}
