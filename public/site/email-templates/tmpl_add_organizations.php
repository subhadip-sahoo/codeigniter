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
                    <p style="text-decoration: underline; text-align: center;">To whom it may concern</p>                
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p><?php echo $name ?> has been registered as an organization. Please login with email id and OTP provided with this email.</p>
                    <p><a href="<?php echo base_url('organization').'/'.$url;?>">Click here to login</a> or copy the below url and paste it to the address bar of your browser.</p>
                    <p><a href="<?php echo base_url('organization').'/'.$url;?>"><?php echo base_url('organization').'/'.$url;?></a></p>
                    <p></p>
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p>Your login credentials are as follows</p>
                    <p>Email id: <?php echo $email;?><br/>
                    OTP (One Time Password): <?php echo $otp;?></p>
                    <p></p>
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"><p></p></td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000">
                    <p>Please find the organization details below.</p>                
                </td>
            </tr>
            <tr>
                <td>
                    <table width="99%" border="0" cellspacing="1" cellpadding="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000; margin:5px 0;">
                        <tr>
                            <td valign="top"> Organization Name</td>
                            <td valign="top">:</td>
                            <td><?php echo $name;?></td>
                        </tr>
                        <tr>
                            <td valign="top">Organization URL</td>
                            <td valign="top">:</td>
                            <td><a href="<?php echo base_url('organization').'/'.$url;?>"><?php echo base_url('organization').'/'.$url;?></a></td>
                        </tr>
                        <tr>
                            <td valign="top">Organization Departments</td>
                            <td valign="top">:</td>
                            <td><?php echo $depts;?></td>
                        </tr>
                        <tr>
                            <td valign="top">Organization Levels</td>
                            <td valign="top">:</td>
                            <td><?php echo $levels;?></td>
                        </tr>
                        <tr>
                            <td valign="top">Organization Location</td>
                            <td valign="top">:</td>
                            <td><?php echo $location;?></td>
                        </tr>
                        <tr>
                            <td valign="top">Organization Email</td>
                            <td valign="top">:</td>
                            <td><?php echo $email;?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000000"> <p>Organization details can be modified once log into the account. But the URL can't be changed.</p></td>
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