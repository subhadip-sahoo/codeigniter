<footer class="footer-container clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">&copy; SMG Health 2015. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="<?php echo SITE_ASSETS_URI; ?>/js/jquery.min.js"><\/script>')</script>
<script src="<?php echo SITE_ASSETS_URI; ?>/js/angular.min.js"></script>
<script src="<?php echo SITE_ASSETS_URI; ?>/js/jPages.min.js"></script>
<script src="<?php echo SITE_ASSETS_URI; ?>/ckeditor/ckeditor.js"></script>
<script src="<?php echo SITE_ASSETS_URI; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo SITE_ASSETS_URI; ?>/js/jquery-ui.js"></script>
<script src="<?php echo SITE_ASSETS_URI; ?>/js/resilience-app.js"></script> 
<script src="<?php echo SITE_ASSETS_URI; ?>/js/resilience.js"></script>

<script type="text/javascript">
    function htmlbodyHeightUpdate(){
        var height3 = $( window ).height();
        var height1 = $('.nav').height()+50;
        height2 = $('.main').height();
        if(height2 > height3){
            $('html').height(Math.max(height1,height3,height2)+10);
            $('body').height(Math.max(height1,height3,height2)+10);
        }else{
            $('html').height(Math.max(height1,height3,height2));
            $('body').height(Math.max(height1,height3,height2));
        }
    }
    
    $(document).ready(function () {
        htmlbodyHeightUpdate();
        $( window ).resize(function() {
            htmlbodyHeightUpdate();
        });
        $( window ).scroll(function() {
            height2 = $('.main').height();
            htmlbodyHeightUpdate();
        });
    });
</script>

</body>
</html>