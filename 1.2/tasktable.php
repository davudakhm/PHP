<?php
  session_start();

  if($_SESSION == null){
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  min-width: 250px;
  background-color: #71a3ff;
}

button:hover{
  opacity: .70;
}

/* Include the padding and border in an element's total width and height */
* {
  font-family: sans-serif;
  box-sizing: border-box;
}

/* Remove margins and padding from the list */
ul {
  margin: 0;
  padding: 0;
}

/* Style the list items */
ul li {
  margin-top: 10px;
  margin-bottom: 10px;
  margin-left: 20px;
  margin-right: 30px;
  border-radius: 5px;
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  list-style-type: none;
  background: #eee;
  font-size: 18px;
  transition: 0.2s;
  
  /* make the list items unselectable */
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Set all odd list items to a different color (zebra-stripes) */
ul li:nth-child(odd) {
  background: #fff;
}

/* Darker background-color on hover */
ul li:hover {
  opacity: .80;
}

/* When clicked on, add a background color and strike out text */
ul li.checked {
  background: black;
  color: #fff;
  text-decoration: line-through;
}

/* Add a "checked" mark when clicked on */
ul li.checked::before {
  content: '';
  position: absolute;
  border-color: #fff;
  border-style: solid;
  border-width: 0 2px 2px 0;
  top: 10px;
  left: 16px;
  transform: rotate(45deg);
  height: 15px;
  width: 7px;
}

/* Style the close button */
.close {
  border-radius: 5px;
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  background-color: #f44336;
  color: white;
}

/* Style the header */
.header {
  background-color: #71a3ff;
  padding: 10px 20px;
  color: white;
  text-align: center;
}

/* Clear floats after the header */
.header:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the input */
input {
  margin: 0;
  border: none;
  border-radius: 5px;
  width: 25%;
  padding: 10px;
  float: left;
  font-size: 16px;
}

/* Style the "Add" button */
.addBtn {
  float: left;
  background: rgb(45, 98, 243);
  padding: 10px 15px;
  color: #fff;
  border-radius: 5px;
  margin-right: 10px;
  margin-left: 10px;
  border: none;
}

#bnn{
    height: 40px;
    width: 90px;
    border-radius: 5px;
    color: rgb(255, 255, 255);
    background-color: rgb(44, 103, 233);
    border: none;
}

.addBtn:hover {
  opacity: .70;
}

button {
  float: right;
  background: rgb(45, 98, 243);
  padding: 10px 15px;
  color: #fff;
  font-size: 16px;
  border-radius: 5px;
  margin-right: 10px;
  border: none;
}
</style>
</head>
<body>

<div id="myDIV" class="header">
  <form action = "addtask.php" >
    <input type="text" name = "task" id="myInput" placeholder="Title...">
    <span onclick="newElement()" class="addBtn">Add</span>  
  </form>
  <form action="addtask.php" method="post"><button type="submit" name = "lgn">Sign In</button></form>
  <a href = "logout.php">LOGOUT</a>
</div>

<ul id="myUL">
  <li class="checked">Pay bills</li>
  <li>Read a book</li>
</ul>

<script>
// Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}
</script>

<?php
//if(isset($_POST["lgn"])){
//  echo   '<script type="text/javascript">
//              window.open("index.php", "_self");
//          </script>';
//}
?>

</body>
</html>
