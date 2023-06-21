<HTML>
 <head>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="dist/jquery.payform.js"></script>

 <div class="form-group">

  <label for="ccnum">Number</label>

  <input type="text" name="ccnum" id="ccnum" class="form-control">

</div>

<div class="form-group">
  <label for="expiry">Expiry</label>

  <input type="text" name="expiry" id="expiry" class="form-control">

</div>

<div class="form-group">

  <label for="cvc">CVC</label>

  <input type="text" name="cvc" id="cvc" class="form-control">
</div>

<div class="form-group">

  <label for="numeric">Numeric</label>
  <input type="text" name="numeric" id="numeric" class="form-control">

</div>

  
  
 </body>
 <script type="text/javascript">
   $('#ccnum').payform('formatCardNumber');
$('#expiry').payform('formatCardExpiry');
$('#cvc').payform('formatCardCVC');
$('#numeric').payform('formatNumeric');
 </script>
</html>