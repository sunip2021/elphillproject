<!doctype html>
<html>
<head>
<title>Getting values from MultiSelect onChange with JQuery and Javascript</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
<link href="css/custom.css" rel="stylesheet" />
<style type="text/css">
</style>
</head>
<body>
<div class="wrapper">
  <header>
    <div class="container">
    <h1 class="col-lg-9">Getting values from MultiSelect onChange with JQuery and Javascript</h1>
    </div>
  </header>
  <div class="container">
    <h5>Author: Julian Hansen, November 2015</h5>
    <p>Demonstrate how to retrieve the selected values of a multiselect dropdown in the onchange event handler using both plain JavaScript and JQuery</p>
    <h2>JavaScript</h2>
    <select id="mySelect" multiple="multiple" onchange="myFunction(this, event)" onblur="myFunctionBlur(this, event)">
      <option value="Audi">Audi
      <option value="BMW">BMW
      <option value="Mercedes">Mercedes
      <option value="Volvo">Volvo
    </select>
  <h4>On Change Result</h4>
    <ul id="JSResult">
    </ul>
  <h4>On Blur Result</h4>
    <ul id="JSResultBlur">
    </ul>
    <h2>JQuery</h2>
    <select id="mySelectJQ" multiple="multiple">
      <option value="Audi">Audi
      <option value="BMW">BMW
      <option value="Mercedes">Mercedes
      <option value="Volvo">Volvo
    </select>
  <h4>On Change Result</h4>
    <ul id="JQResult">
    </ul>
  <h4>On Blur Result</h4>
    <ul id="JQResultBlur">
    </ul>
</div>
</div>
<footer>
  <div class="container">
    Copyright Julian Hansen &copy; 2015
  </div>
</footer>
 
<script src="http://code.jquery.com/jquery.js"></script>
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
$(function() {
  $('#mySelectJQ').change(function() {
    $('#JQResult').html('');
    $('option:selected', $(this)).each(function() {
      $('#JQResult').append(
        $('<li/>').html($(this).val())
      );
    });
  });
  $('#mySelectJQ').blur(function() {
    $('#JQResultBlur').html('');
    $('option:selected', $(this)).each(function() {
      $('#JQResultBlur').append(
        $('<li/>').html($(this).val())
      );
    });
  });
});
 
</script>
<script>
function myFunction(element, event)
{
  var result = document.getElementById('JSResult');
  while(result.firstChild) result.removeChild(result.firstChild);
  var values = [];
  for (var i = 0; i < element.options.length; i++) {
    if (element.options[i].selected) {
      var li = document.createElement('li');
      li.appendChild(document.createTextNode(element.options[i].value));
      result.appendChild(li);
    }
  }
}
function myFunctionBlur(element, event)
{
  var result = document.getElementById('JSResultBlur');
  while(result.firstChild) result.removeChild(result.firstChild);
  var values = [];
  for (var i = 0; i < element.options.length; i++) {
    if (element.options[i].selected) {
      var li = document.createElement('li');
      li.appendChild(document.createTextNode(element.options[i].value));
      result.appendChild(li);
    }
  }
}
</script>
</body>
</html>