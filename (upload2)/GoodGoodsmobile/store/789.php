
      <form style="margin-left: 20%;">
        <div class="form-group w-75 text-center " style="border-color: yellow;"> 
            <div class="text-center">    
            <img id="pre"  style="width: 100px;height: 100px; margin-left: 25%;"><br>
            </div>   
              <label class="btn btn-info ">
              <input id="upload_img" accept="image/*" style="display:none;" type="file" onchange="loadfile(event)">
              <i class="fa fa-photo"></i> 上傳圖片
            </label><br>
          <label for="itemname">商品名稱</label>
              <input type="text" placeholder="品名" class="form-control" name="itemname" size="20" >
              <labe>種類
                <select class="ml form-control" name="itemtype">
                  <option value="五金&電器">五金&電器</option>
                  <option value="文具">文具</option>
                  <option value="服飾鞋包">服飾鞋包</option>
                  <option value="3C">3C</option>
                  <option value="美妝">美妝</option>
                  <option value="美妝">美妝</option>
                </select>
              </labe>
          <label>商品描述</label>
              <textarea class="form-control" name="itemdis"rows="1" placeholder="商品描述" ></textarea>
          <label for="itemname">商品金額</label>
              <input type="text" placeholder="$NTD" class="form-control" name="itemprice">
          <label>庫存</label><br>
              <input class="form-control" placeholder="庫存" type="number" name="stock"><br>
      <button type="button" class="btn btn-warning btn-lg btn-block">確認新增</button>
    </div>
   </form>
    <script type="text/javascript">
      function loadfile(event){
        var out = document.getElementById('pre');
        out.src=URL.createObjectURL(event.target.files[0]);
      }
    </script> 








     <fieldset>
      <legend>Payment info</legend>
      <div class="field-wrapper">
        <label for="productphoto">上傳照片</label>
        <input type="file" name="productphoto" class="form-element" required autocomplete="productphoto">       

        <label for="cc-number">Card Number</label>
        <input type="text" name="cc-number" id="cc-number" class="form-element" required autocomplete="cc-number" placeholder="●●●● ●●●● ●●●● ●●●●" maxlength="19">

        <label for="cc-exp">Expiry</label>
        <input type="text" name="city" id="cc-exp" class="form-element" required autocomplete="cc-exp" placeholder="MM-YYYY" maxlength="7">

        <label for="cc-csc">CVV</label>
        <input type="text" name="cc-csc" id="cc-csc" class="form-element" required autocomplete="cc-csc" placeholder="CVC" maxlength="3">
      </div>
    </fieldset>
