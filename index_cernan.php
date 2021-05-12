<?php


?>
<!DOCTYPE html>
<html>
<body>

<ol id="testList">
  <li>Coffee</li>
  <li>Tea</li>
</ol>


<label for="testName">Test name:</label>
<input type="text" id="testName" name="testName"><br><br>
<button onclick="myFunction()">Try it</button>

<script>
function myFunction() {
    var node = document.createElement("LI");
    var text = document.getElementById("testName");
    //var textnode = document.createTextNode("Water");
    node.appendChild(text);
    document.getElementById("testList").appendChild(node);
}
</script>

<p><strong>Note:</strong><br>First create an LI node,<br> then create a Text node,<br> then append the Text node to the LI node.<br>Finally append the LI node to the list.</p>

</body>
</html>