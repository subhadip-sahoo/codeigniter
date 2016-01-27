<script>
var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
        , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
        return function (table, name, filename) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }

            document.getElementById("dlink").href = uri + base64(format(template, ctx));
            document.getElementById("dlink").download = filename;
            document.getElementById("dlink").click();

        }
    })()
</script>
<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9  dasboard_detasl dasboard-area">
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
                <section class="dase_orgat siteadmin-dashboard mannageadmin-container">
                    <header class="pagetitle">
                        <h2>Manage Reports</h2>
                        <span class="addtitle">
                            
                        </span>
                    </header>
                    <div class="search-report">
                        <form action="search-report" name="report_filter" method="POST" id="report_filter" class="form-inline">
                            <?php if(isset($locations)): ?>
                            <div class="form-group">
                            <select name="location" class="form-control">
                                <option value="">All Locations</option>
                                <?php foreach($locations as $location): if($location == ''){continue;}?>
                                <option value="<?php echo $location; ?>"><?php echo $location; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($ages)): ?>
                            <div class="form-group">
                            <select name="ages" class="form-control">
                                <option value="">All Ages</option>
                                <?php foreach($ages as $age): if($age == ''){continue;}?>
                                <option value="<?php echo $age; ?>"><?php echo $age; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($genders)): ?>
                            <div class="form-group">
                            <select name="genders" class="form-control">
                                <option value="">All Genders</option>
                                <?php foreach($genders as $gender): if($gender == ''){continue;}?>
                                <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option> 
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($departments)): ?>
                            <div class="form-group">
                            <select name="departments" class="form-control">
                                <option value="">All Departments</option>
                                <?php foreach($departments as $department): if($department == ''){continue;}?>
                                <option value="<?php echo $department; ?>"><?php echo $department; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($levels)): ?>
                            <div class="form-group">
                            <select name="levels" class="form-control">
                                <option value="">All Levels</option>
                                <?php foreach($levels as $level): if($level == ''){continue;}?>
                                <option value="<?php echo $level; ?>"><?php echo $level; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <?php endif; ?>
                            <button type="submit" name="filter_report" value="Filter"  class="btn btn-danger btn-filter">Filter <i class="fa fa-filter"></i></button>
                            <a id="dlink"  style="display:none;"></a>
                            <button type="button" onclick="tableToExcel('tbExport', 'Report Table', 'report.xls')" value="Export to Excel" class="btn btn-danger btn-filter">Export to Excel <i class="fa fa-table"></i></button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped survey-table text-center" id="tbExport"> 
                            <thead> 
                                <tr class="info"> 
                                    <th>User</th>
                                    <?php if(isset($dimentions)) :?>
                                    <?php foreach($dimentions as $dimention): ?>
                                    <th><?php echo $dimention->question; ?></th> 
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tr> 
                            </thead> 
                            <tbody> 
                                <tr> 
                                    <?php echo $surveys; ?> 
                                </tr> 
                            </tbody> 
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>