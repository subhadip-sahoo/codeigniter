<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Organization details</title>
</head>
    <body>
	<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px #c4c0bf solid; padding:15px;">
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p>Dear employee</p>                
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p><?php echo $organization_name ?> has shared a link. Please click the link below.</p>
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p><a href="<?php echo $organization_url;?>"><?php echo $organization_url;?></a></p>
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"> Thanks & Regards<br />  </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"> SMG Health Admin<br />  
                <a target="_blank"  href="<?php echo base_url(); ?>"> <?php echo base_url(); ?></a></td>
            </tr>
        </table>
    </body>
</html>