function tablefunct(id) {
  var input, filter, table, tr, td, i, col=2;
  input = document.getElementById(id);
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  if(id == "myInput1")
	  col=9;
  else if(id == "myInput2")
	  col=0;
  else if(id == "myInput3")
	  col=3;
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[col];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}


function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";	
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}


function allalert(id) {
    var x = document.getElementById(id).style;
    x.visibility = "visible";
    setTimeout(function(){ x.visibility = "hidden"; }, 3000);
}

function tans(id) {
    var x = document.getElementById(id);
    if (x.style.display == 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
var a=0;
function tansall() {
	a++;
	for(i=1;i<3;i++) {
		var x = document.getElementById(i);
		if (a%2 != 0) {
			x.style.display = 'block';
		} else {
			x.style.display = 'none';
		}
	}
}

function checkpsw()
{
	var ps = document.getElementById("sec").value;
	var pf = document.getElementById("fr").value;
	if(ps == pf)
		document.getElementById("wr").style.visibility="hidden";
	else
		document.getElementById("wr").style.visibility="visible";	
}
function checkpswold()
{
	var ps = document.getElementById("oldpsw").value;
	var pf = document.getElementById("fr").value;
	if(ps != pf)
		document.getElementById("err").style.visibility="hidden";
	else
		document.getElementById("err").style.visibility="visible";	
}
function checkpswlst(i)
{
	var ps = document.getElementById("wr").style.visibility;
	if(i == 2)
		var pf = document.getElementById("err").style.visibility;
	if(ps == "visible" || pf == "visible")
			return false;
}
