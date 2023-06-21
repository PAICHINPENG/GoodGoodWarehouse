
<!DOCTYPE html>
<html>
<head>
    <title>Image Uploading</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container mt-3 w-100">
        <div class="card shadow-sm w-100">
            <div class="card-header d-flex justify-content-between">
                <h4>Image Uploading</h4>
                <form class="form" action="#" method="post" id="form">
                    <input type="file" name="Image" id="image" multiple="" class="d-none" onchange="image_select()">
                    <button class="btn btn-sm btn-primary" type="button" onclick="document.getElementById('image').click()">Choose Images</button>
                </form>
            </div>
            <div class="card-body d-flex flex-wrap justify-content-start" id="con">
                  <!-- image preview --><img src="3.jpg">
            </div>
        </div>
    </div>
    
<style type="text/css">
    .image_con {
    height: 120px;
    width: 200px;
    border-radius: 6px;
    overflow: hidden;
    margin: 10px;
}
.image_con img {
    height: 100%;
    width: auto;
    object-fit: cover;
}
.image_con span {
    top: -6px;
    right: 8px;
    color: red;
    font-size: 28px;
    font-weight: normal;
    cursor: pointer;
}
</style>
    
</body>
</html>
<script type="text/javascript">
    var images = [];
      function image_select() {
          var image = document.getElementById('image').files;
          for (i = 0; i < image.length; i++) {
              if (check_duplicate(image[i].name)) {
                images.push({
                    "name" : image[i].name,
                    "url" : URL.createObjectURL(image[i]),
                    "file" : image[i],
                })
              } else 
              {
                 alert(image[i].name + " is already added to the list");
              }
          }
          document.getElementById('form').reset();
          document.getElementById('con').innerHTML = image_show();
      }

      function image_show() {
          var image = "";
          images.forEach((i) => {
             image += `<div class="image_con d-flex justify-content-center position-relative">
                  <img src="`+ i.url +`" alt="Image">
                  <span class="position-absolute" onclick="delete_image(`+ images.indexOf(i) +`)">&times;</span>
              </div>`;
          })
          return image;
      }
      function delete_image(e) {
          images.splice(e, 1);
          document.getElementById('con').innerHTML = image_show();
      }

      function check_duplicate(name) {
        var image = true;
        if (images.length > 0) {
            for (e = 0; e < images.length; e++) {
                if (images[e].name == name) {
                    image = false;
                    break;
                }
            }
        }
        return image;
      }
</script>