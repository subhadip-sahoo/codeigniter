<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9  dasboard_detasl dasboard-area">
                <section class="dase_orgat mannageadmin-container">
                <?php 
                        if($this->session->userdata('pdf_suc_msg')){
                            echo message_alert($this->session->userdata('pdf_suc_msg'), 2);
                            $this->session->unset_userdata('pdf_suc_msg');
                        }
                        
                    ?>
                    <header class="pagetitle">
                        <h2>Manage Pdf</h2>
                        <span class="addtitle">
                            <?php echo anchor('dashboard/add-pdf', '<i class="fa fa-plus"></i> <span>Add PDF</span>', array('class' => 'btn add_org_buton', 'title' => 'Add PDF')); ?>
                        </span>
                    </header>
                     
                     <?php /* if(is_array($pdfs)): 
                            $sn_count = 1;
                            foreach($pdfs as $doc): $pdf_id = $doc->pdf_id;?>
                                <ul class="list-inline bordered-nav">
                                    <li><?php echo $sn_count; ?></li>
                                    <li><a href="./assets/site/pdf/<?php echo $doc->pdf_name;?>" target="_blank"><?php echo $doc->pdf_name; ?></a></li>
                                    <li><?php echo anchor("Manage_pdf/delete_row/{$pdf_id}", 'DELETE'); ?></li>
                                </ul>
                            <?php 
                                $sn_count++;
                                    endforeach; 
                                else:
                                echo message_alert($docs, 1);
                            endif; 
                            */ ?>  

                     <div class="table-responsive">
                         <table class="table table-admin">
                             <?php if(is_array($pdfs)): 
                            $sn_count = 1;
                            foreach($pdfs as $doc): $pdf_id = $doc->pdf_id;?>
                                <tr class="bordered-nav">
                                    <td><strong><?php echo $sn_count; ?></strong></td>
                                    <td><a href="./assets/site/pdf/<?php echo $doc->pdf_name;?>" target="_blank">
                                        <i class="fa fa-file-pdf-o"></i> <?php echo $doc->pdf_name; ?>
                                    </a></td>
                                    <td>
                                    <?php echo anchor("Manage_pdf/delete_row/{$pdf_id}", '<i class="glyphicon glyphicon-trash"></i>'); ?>
                                    </td>
                                </tr>
                            <?php 
                                $sn_count++;
                                    endforeach; 
                                else:
                                echo message_alert($docs, 1);
                            endif; 
                            ?>  
                        </table>
                     </div>
                </section>
            </div>
		
        </div>
    </div>
</div>
</div>