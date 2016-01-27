<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $bs_cls =  (get_user_org_product($this->session->userdata('id_user')) <> 1) ? 'col-md-9 dasboard_detasl' : 'col-md-12'; ?>
            <div class="<?php echo $bs_cls; ?>">
                <section class="dase_orgat content-container">
                    <?php if(is_object($page)): ?>
                    <?php $page_title = $page->page_title; ?>
                    <?php $page_content = $page->page_content; ?>
                    <header class="pagetitle">
                        <h2><?php echo $page_title; ?></h2>
                    </header>
                    <div class="pagecontent">
                        <?php echo $page_content; ?>
                    </div>
                    <?php else: ?>
                        <?php echo message_alert($page, 1); ?>
                    <?php endif; ?>
                </section>
            </div>
            <?php if(get_user_org_product($this->session->userdata('id_user')) <> 1): ?>
            <?php $this->load->view('site/common/employee_sidebar', $sidebar); ?>
            <?php endif; ?>
        </div>
    </div>
</div>