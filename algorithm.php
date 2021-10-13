<?php
$students = ['Adam', 'Ibrahim', 'Umar', 'Abdullah', 'Sulaiman', 'Ismail'];
$date =  ['21/08/2021', '22/08/2021', '23/08/2021'];
$time =  ['8:30 - 10:30', '10:30 - 12:30', '12:30 - 3:30'];
$timetable = [1, 2, 3, 4, 5, 6, 7, 8];
// $students = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

$allocation = [];
$noOfStudents = 2;
$studentArray = [];
$currentStudent = [];
$duplicate = [];
shuffle($students);

for ($i=0; $i < sizeof($date); $i++) { 
	// code...
	
	$currentDate = $date[$i];
	for ($j=0; $j < sizeof($time); $j++) { 
		// code...
		$arrayDiff = array_diff($students, $duplicate);
		shuffle($arrayDiff);
		if (empty($arrayDiff)) {
			// code...
			break;
		}
		$currentTime = $time[$j];
		for ($k=0; $k < 1; $k++) { 
			// code...
			if (!empty($arrayDiff[$k] )) {
				// code...
				$currentStudent[] = isset($arrayDiff[$k]) ? $arrayDiff[$k] : null;
				array_push($studentArray, $currentStudent[$k]);
				array_push($duplicate, isset($arrayDiff[$k]) ? $arrayDiff[$k] : null);
			}
		}
		$currentAllocation = $currentDate.'*'.$currentTime.'*'.json_encode($studentArray);
		array_push($allocation, $currentAllocation);
		$studentArray = [];
		$currentStudent = [];
	}
}



for ($i=0; $i < sizeof($allocation); $i++) { 
	// code...
	$student_list = explode('*', $allocation[$i])[2];
	$newDate = explode('*', $allocation[$i])[0];
	$newTime = explode('*', $allocation[$i])[1];
	for ($j=0; $j < sizeof(json_decode($student_list)); $j++) { 
		// code...
		$currStudent = $student_list[$j];


	}
	// echo $currentAllocation = $newDate.'*'.$newTime.'*'.$currStudent;
	 print_r($student_list);
}


// foreach ($allocation as $key => $value) {
// 	// code...
// 	 // $student_list = explode('*', $value)[2];
// 	 // print_r($student_list);
// 	 //  $staff_list = preg_replace('/["["]/', "", $staff_list);
// 	 // echo $staff_list = explode(']', $staff_list)[0]."<br>";

// 	 // echo $hall_list = explode('/', $value)[1]."<br>";

// 	 // echo $timetable_list = explode('/', $value)[0]."<br>";
// 	 echo "<br>";
// }

// print_r($allocation);


?>

<?php

// $begin = new DateTime( '2012/08/01' );
// $end = new DateTime( '2012/08/31' );
// $end = $end->modify( '+1 day' );

// $interval = new DateInterval('P1D');
// $daterange = new DatePeriod($begin, $interval ,$end);

// foreach($daterange as $date){
//     echo $date->format("d/m/Y") . "<br>";
}
?>