<?php
date_default_timezone_set('America/New_York');
//set default value
$message = '';

//get value from POST array
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action =  'start_app';
}

//process
switch ($action) {
    case 'start_app':

        // set default invoice date 1 month prior to current date
        $interval = new DateInterval('P1M');
        $default_date = new DateTime();
        $default_date->sub($interval);
        $invoice_date_s = $default_date->format('n/j/Y');

        // set default due date 2 months after current date
        $interval = new DateInterval('P2M');
        $default_date = new DateTime();
        $default_date->add($interval);
        $due_date_s = $default_date->format('n/j/Y');

        $message = 'Enter two dates and click on the Submit button.';
        break;
    case 'process_data':
        $invoice_date_s = filter_input(INPUT_POST, 'invoice_date');
        $due_date_s = filter_input(INPUT_POST, 'due_date');

        // make sure the user enters both dates
	if (empty($invoice_date_f)) {
		$message = 'You must enter an invoice date.';
		break;
	}
	
	if (empty($due_date_s)) {
		$message = 'You must enter a due date.';
	}

        // convert date strings to DateTime objects
	echo $invoice_date_f->format('Y-m-d a\t\ H:i:s');
	echo $due_date_s->format('Y-m-d a\t\ H:i:s');

        // and use a try/catch to make sure the dates are valid
	$valid_date = checkdate($M, $D, $Y);
	$valid_time = checktime($H, $i, $s);

        // make sure the due date is after the invoice date
	if ($due_date < $invoice_date_f) {
		echo 'The due date must be after the invoice date';
	}

        // format both dates
        $invoice_date_f = date('Y-m-d a\t\ H:i:s');
        $due_date_f = date('Y-m-d a\t\ H:i:s');; 
        
        // get the current date and time and format it
        $current_date_f = date(Y-m-d);
        $current_time_f = time(H:i:s);
        
        // get the amount of time between the current date and the due date
        // and format the due date message
        $time_span = $current_date_f->diff($due_date_f);
	echo $time_span->format('%R%dd %H:%I:%SH')
        break;
}
include 'date_tester.php';
?>
