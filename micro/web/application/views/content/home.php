<?php $this->load->view('include/metadata');?>



<nav class="navbar navbar-default navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Micro Blog</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- body -->

<div class="row" id="rePosting">
    <div class="col-md-8 col-md-offset-2">
        <div class="jumbotron" style="padding:50px;">
            <input type="hidden" name="id_posting" id="id_posting" value="">
            <input type="hidden" name="view" id="view" value="">
            <input type="hidden" name="date" id="date" value="">
            <textarea class="form-control" placeholder="Write Here....." id="text_content" name="text_content"></textarea><br>
            <button type="button" class="btn btn-primary pull-right" id="post" disabled>Post !</button>
        </div>
    </div>
    <div id="posting_div">
        
    </div>
    <!-- posting foreach -->
    <!-- End Posting  -->
</div>

<script type='text/javascript'>
$(document).ready(function(){
    $.ajax({
        type: "POST",
        url: '<?php echo base_url('home/view'); ?>',
        success: function(msg){
            $('#posting_div').html(msg);
        }
    }); 
    
    $('#post').prop("disabled", true);
    $('#text_content').val("");
    
    $("#text_content").keypress(function(){
        var txt=$(this).val();
        if(txt=='')
        {
            $('#post').prop("disabled", true);
        }
        else
        {
            $('#post').prop("disabled", false);
        }
        
    });
    
    $("#post").click(function(){      
        var text_content=$("#text_content").val();
        var id_posting=$("#id_posting").val();
        var view=$("#view").val();
        var date=$("#date").val();
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('home/add'); ?>',
            data:{text_content:text_content,id_posting:id_posting,view:view,date:date},
            success: function(msg){
                if(msg=="1")
                {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('home/view'); ?>',
                        success: function(msg){
                            $("#text_content").val("");
                            $("#id_posting").val("");
                            $("#view").val("");
                            $("#date").val("");
                            $('#post').prop("disabled", true);
                            $('#posting_div').html(msg);
                        }
                    }); 
                }
            }
        });
    });
    
    $(document).on("click", "#posting", function(event){            
        var id_posting=$(this).attr('id_r');
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('home/count_view'); ?>',
            data:{id_posting:id_posting},
            success: function(msg){
                if(msg=="1")
                {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('home/view'); ?>',
                        success: function(msg){
                            $('#posting_div').html(msg);
                        }
                    }); 
                }
            }
        });          
    });
    
    $(document).on("click", "#delete", function(event){            
        var id_posting=$(this).attr('id_r');
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('home/delete'); ?>',
            data:{id_posting:id_posting},
            success: function(msg){
                if(msg=="1")
                {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('home/view'); ?>',
                        success: function(msg){
                            $('#posting_div').html(msg);
                        }
                    }); 
                }
            }
        });          
    });
    
    $(document).on("click", "#update", function(event){            
        var id_posting=$(this).attr('id_r');
        $.ajax({
            type: "POST",
            url: '<?php echo base_url('home/get_content'); ?>',
            data:{id_posting:id_posting},
            success: function(msg){
                var data=JSON.parse(msg);
//                alert(data.text_content);
                $("#text_content").val(data.text_content);
                $("#id_posting").val(data.id_posting);
                $("#view").val(data.view);
                $("#date").val(data.date);
                $('#post').prop("disabled", false);
                if($("#text_content").val()=="")
                {
                    $('#post').prop("disabled", true);
                }
            }
        });          
    });
});
</script>