
<div>
	<p>Dear  {{$email['name']}},</p>

<p>Me Yen Yi, <br> 
The finance department, arranges school tuition payments, arranges  class schedules and arranges registration for the IELTS & TOEFL tests at Best Partner Education. 
</p>

<p>This is a friendly reminder from {{$email['school_name']}} that your college fees of </p>


@php
if($email['discount_percents'] != ""){
$amount = $email['tuition_fee'] - ($email['tuition_fee'] * $email['discount_percents'] / 100);	
}else if($email['discount_amounts'] != ""){
$amount = $email['tuition_fee'] - $email['discount_amounts'];	
}else{
	$amount = $email['tuition_fee'];
}

if($email['material_fee'] ==""){
	$material = 0;
}else{
	$material = $email['material_fee'];
}

$total = $amount + $material;
@endphp

<p>Amount Due : {{$total}} {{$email['currency_code']}} are due on  {{date("d F Y",strtotime($email['due_date']))}}, which is approximately  in 2 weeks time. </p>

<p>
To avoid late fees please ensure you pay your fees before this date {{date("d F Y",strtotime($email['due_date']))}}.</p>

<p>please pay no later than 1 week before the date of payment of the college, if past the payment date will be subject to fines and fines at your own expense. </p>

Thank You. <br>

Kind Regards, <br>
Yen Yi | Financial Officer Team <br>
Best Partner Education <br>
</div>