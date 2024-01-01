<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>RFQ Collab</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}


		</style>
	</head>

	<body>
		<div class="invoice-box">
        <div style="text-align:center;"><h2><u>Request For Quote</u></h2></div>
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img style="width:150px;height:100px;" src="/<?php  echo $result['sender'][0]->{'business_logo'}?>" style="width: 100%; max-width: 300px" />
								</td>

								<td>
									RFQ  #: <?php  echo $result['quotation_details'][0]->{'rfq_id'}?><br />
									Date: <?php  echo $result['quotation_details'][0]->{'qdate'}?><br />

								</td>
							</tr>
                            <tr>
								<td>

                                <?php  echo $result['sender'][0]->{'business_name'}?><br />
                                <?php  echo $result['sender'][0]->{'business_email'}?><br />
                                <?php  echo $result['sender'][0]->{'business_main_phone_number'}?><br />

								</td>

				</tr>
						</table>
					</td>
				</tr>
               <!-- <tr class="heading"><td>Company Details</td></tr>-->


				<tr class="heading"><td>To</td></tr>



                            <tr>

								<td >

                                <?php  echo $result['receiver'][0]->{'business_name'}?><br />
                                <?php  echo $result['receiver'][0]->{'business_email'}?><br />
                                <?php  echo $result['receiver'][0]->{'business_main_phone_number'}?><br />
								</td>
							</tr>



                            </table>
                            <div style="text-align:center;"><h3><u>RFQ Details</u></h3></div>

            <table >
				<tr class="heading">

                    <td style="width:5%;">#</td>
					<td style="text-align:left;width:75%;">Particulars</td>
                    <td style="width:20%;">Quantity</td>
				</tr>
                <?php
                 $i=0;
                 $count=0;
                foreach ($result['quotation_details'] as $quote_details) {

                    $i++;
                    $amount=($quote_details->quantity)*($quote_details->rate);
                    $amount=number_format((float)$amount, 2, '.', '');

                    $count++;
                    ?>
				<tr class="item">

                    <td style="width:5%;"><?php echo $i?></td>
					<td style="text-align:left;width:75;"><?php echo $quote_details->english_name?></td>
                    <td style="width:20%;"><?php echo $quote_details->quantity?></td>
				</tr>

				<?php }?>

				<tr>
					<td></td>
                    <td>Total Items</td>
					<td><?php echo $count ?></td>
				</tr>
			</table>

            <p style="text-align: justify;">
        We hope to hear from you soon regarding this quote request.
        We also look forward to a long-standing business relationship with you if this transaction is a success.
        </p>
		</div>
	</body>
</html>
