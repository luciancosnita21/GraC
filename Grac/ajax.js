
function loadlist1()
{ var xhttp = new XMLHttpRequest();
  var a="1";
  xhttp.open("GET","list.php?q="+ a, true);
  xhttp.send();
   xhttp.onreadystatechange = function(){
   if (this.readyState == 4 && this.status == 200){
  document.getElementById("demo").innerHTML = xhttp.responseText;}};
}
  function loadlist2()
{ var xhttp = new XMLHttpRequest();
  var a="2";
  xhttp.open("GET","list.php?q="+ a, true);
  xhttp.send();
   xhttp.onreadystatechange = function(){
   if (this.readyState == 4 && this.status == 200){
  document.getElementById("demo").innerHTML = xhttp.responseText;}};
}
  function loadlist3()
{ var xhttp = new XMLHttpRequest();
  var a="3";
  xhttp.open("GET","list.php?q="+ a, true);
  xhttp.send();
   xhttp.onreadystatechange = function(){
   if (this.readyState == 4 && this.status == 200){
  document.getElementById("demo").innerHTML = xhttp.responseText;}};
}
  
