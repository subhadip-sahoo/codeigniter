<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $bs_cls =  (get_user_org_product($this->session->userdata('id_user')) <> 1) ? 'col-md-12 dasboard_detasl' : 'col-md-12'; ?>
            <div class="<?php echo $bs_cls; ?>">
                <section class="dase_orgat content-container">
                    <?php 
                        if($this->session->has_userdata('suc_msg')){
                            echo message_alert($this->session->userdata('suc_msg'), 2);
                            $this->session->unset_userdata('suc_msg');
                        }
                        if($this->session->has_userdata('err_msg')){
                            echo message_alert($this->session->userdata('err_msg'), 4);
                            $this->session->unset_userdata('err_msg');
                        }
                    ?>
                    <header class="pagetitle">
                        <h2>Thank you for giving bounce back survey</h2>
                    </header>
                    <div class="pagecontent">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </section>
            </div>
            <?php if(get_user_org_product($this->session->userdata('id_user')) <> 1): ?>
            <?php // $this->load->view('site/common/employee_sidebar', $sidebar); ?>
            <?php endif; ?>
        </div>
    </div>
</div>