<!DOCTYPE HTML>
	<html lang='en' dir='ltr'>
	<head></head>
	<body>
		<table width="90%" style="margin:auto;border: 1px solid #f1f1f1;border-collapse: collapse;">
			<tr>
				<td style="border-bottom: 1px solid #f1f1f1;background: #f1f1f1;padding: 1%;">
					<img src="https://toovem.onlinereputationking.com/assets/img/logo.png" style="width:8%" />
				</td>
			</tr>
			<tr>
				<td style="padding:2%">
					<p>Dear {{$name}},</p>
					<h3>Welcome to </h3>
					<p>Thank you for registering with us.</p>
					<p>Please <a href="{{url('/').'/email_verify/?token='.$token}}" target="_blank">click</a> here to verify your account.</p>
					<p>For further assistance, please don't hesitate to contact at our email <a href="mailto:info@demoshowcase.com">info@demoshowcase.com</a></p>
					<p>&nbsp;</p>
					<p>Thanks & Regards</p>
					<p>E-medical Team</p>
				</td>
			</tr>
			<tr>
				<td style="padding:1%;background: #f1f1f1;text-align: center;">
					Copyright @{{date('Y')}} E-medical. All Rights Reserved
				</td>
			</tr>
			
		</table>
	</body>