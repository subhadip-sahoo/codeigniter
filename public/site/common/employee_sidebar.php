<div class="col-md-3 col-sm-3 emp_dasboard_menu"> 
    <section class="panel panel-info panel-sidebar">
        <div class="panel-heading">
            <h3 class="panel-title"> <i class="fa fa-external-link"></i> Useful links</h3>
        </div>
        <div class="panel-body">
            <?php if(is_array($links)): ?>
            <ul class="nav" id="page-box">
                <?php foreach($links as $link): ?>
                <li><a href="<?php echo base_url("article/$link->page_slug"); ?>"><i class="fa fa-angle-right"></i> <?php echo $link->page_title; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php if(count($links) > EMPLOYEE_SIDEBAR_PAR_PAGE_ITEM): ?>
            <div id="page-box-jpages"></div>
            <?php endif; ?>
            <?php else: ?>
            <p><?php echo $links; ?></p>
            <?php endif; ?>
        </div>
    </section>
    <section class="panel panel-info panel-sidebar">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-file-video-o"></i> Videos</h3>
        </div>
        <div class="panel-body">
            <?php if(is_array($vids)): ?>
            <ul class="nav" id="video-box">
                <?php foreach($vids as $vid): ?>
                <li><a href="javascript;void(0);" data-toggle="modal" data-target="#videoModal" data-url="<?php echo $vid->video_name; ?>" data-title="<?php echo $vid->video_title; ?>"><i class="fa fa-angle-right"></i> <?php echo $vid->video_title;?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php if(count($vids) > EMPLOYEE_SIDEBAR_PAR_PAGE_ITEM): ?>
            <div id="video-box-jpages"></div>
            <?php endif; ?>
            <?php else: ?>
            <p><?php echo $vids; ?></p>
            <?php endif; ?>
        </div>
    </section>
    <section class="panel panel-info panel-sidebar">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-file-pdf-o"></i> PDf documents</h3>
        </div>
        <div class="panel-body">
            <?php if(is_array($pdfs)): ?>
            <ul class="nav" id="doc-box">
                <?php foreach($pdfs as $pdf): ?>
                <li><a href="<?php echo base_url("assets/site/pdf/$pdf->pdf_name");?>" target="_blank"><i class="fa fa-angle-right"></i> <?php echo $pdf->pdf_name; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php if(count($pdfs) > EMPLOYEE_SIDEBAR_PAR_PAGE_ITEM): ?>
            <div id="doc-box-jpages"></div>
            <?php endif; ?>
            <?php else: ?>
            <p><?php echo $pdfs; ?></p>
            <?php endif; ?>
        </div>
    </section>
    <section class="panel panel-info panel-sidebar">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-file-pdf-o"></i> All reports</h3>
        </div>
        <div class="panel-body">
            <?php if(!empty($surveylist)):?>
            <ul class="nav" id="report-box">
            <?php foreach ($surveylist as $sl) : ?>
                <li><a href="<?php echo base_url("pdfcreate/$id_user/$sl->created_at"); ?>" target="_blank"><i class="fa fa-angle-right"></i> <?php echo $sl->created_at; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php if(count($surveylist) > EMPLOYEE_SIDEBAR_PAR_PAGE_ITEM): ?>
            <div id="report-box-jpages"></div>
            <?php endif; ?>
            <?php else: ?>
            <p><?php echo message_alert('You have not given your survey yet', 1); ?></p>
            <?php endif; ?>
        </div>
    </section>
</div>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="videoModalLabel">Video title</h4>
            </div>
            <div class="modal-body">
                <iframe width="100%" height="300" src="" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
</div>