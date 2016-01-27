<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reset your password</title>
</head>
    <body>
	<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px #c4c0bf solid; padding:15px;">
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p>Dear <?php echo $display_name; ?>,</p>                
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p>Someone has requested to reset your account password. If this not done by you then simply ignore this mail. Nothing will happen.</p>
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p>Please click the link below to reset your password.</p>
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p><a href="<?php echo $link;?>">Click here to reset your password</a></p>
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p>OR, you can simply copy the below link and paste it into your browser's address bar.</p>
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p><a href="<?php echo $link;?>"><?php echo $link;?></a></p>
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