$(document).ready(function(){
                $('.productt').click(function(){
                    var pid = $(this).data('id');
                    $.ajax({
                        url: 'product_info.php',
                        type: 'post',
                     
                        data: {pid: pid},
                        success: function(response){ 
                            $('.imodal-body').html(response); 
                            $('#proModal').modal('show'); 
                        }
                    });
                });
            });