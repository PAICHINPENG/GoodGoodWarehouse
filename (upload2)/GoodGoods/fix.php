<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>

<style type="text/css">
  /*顯示資訊視窗*/
   :root {
  --modal-duration: 1s;
  --modal-color: #428bca;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  background: #f4f4f4;
  font-size: 17px;
  line-height: 1.6;
  display: flex;
  height: 100vh;
  align-items: center;
  justify-content: center;
}

#click {
  background: #428bca;
  padding: 1em 2em;
  color: #fff;
  border: 0;
  border-radius: 5px;
  cursor: pointer;
}

#click:hover {
  background: #3876ac;
}

#infomodal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

#info-content {
  margin: 10% auto;
  width: 60%;
  box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 7px 20px 0 rgba(0, 0, 0, 0.17);
  animation-name: modalopen;
  animation-duration: var(--modal-duration);
}

.modal-header h2,
.modal-footer h3 {
  margin: 0;
}

.modal-header {
  background: var(--modal-color);
  padding: 15px;
  color: #fff;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

#infobody {
  padding: 10px 20px;
  background: #fff;
}

.modal-footer {
  background: var(--modal-color);
  padding: 10px;
  color: #fff;
  text-align: center;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

#closeinfo {
  color: #ccc;
  float: right;
  font-size: 30px;
  color: #fff;
}

#closeinfo:hover,
#closeinfo:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

@keyframes modalopen {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

</style>
</head>
<body>
  <button id="click" class="button">Click Here</button>

  <div id="infomodal" class="modal">
    <div class="modal-content" id="info-content">
      <div class="modal-header">
        <span class="close" id="closeinfo">&times;</span>
        <h2>Modal Header</h2>
      </div>
      <div class="modal-body" id="infobody">
          <form action="上傳倉庫.php" method="post" enctype="multipart/form-data">
     <p align="center" style="top: 30px;"><font size="6" >上傳一張照片</font></p>
      <input type="file" name="photo" accept="image/*" onchange="loadfile(event)"> <br><br>
      <img id="pre" width="50px" height="50px">
      <input type="text"  name="warehousename" placeholder="倉庫的名稱"><font size="6"></font>
      <div>
        <textarea id="text1" name="image_text"placeholder="對倉庫的描述"></textarea>        
      </div>
      <p style="text-align:center;"><input type="submit" name="upload" value="上傳" style="height: 120px ;width: 160px; font-size: 50px"></p>
    </form> 
      </div>
      <div class="modal-footer">
        <h3>Modal Footer</h3>
      </div>
    </div>
  </div>
<script src="infomodal.js"></script>
</body>
</html>