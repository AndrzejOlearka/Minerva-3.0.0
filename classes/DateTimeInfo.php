<?php

		class DateTimeInfo {

			public static function getDateTime($data1, $data2){
				require "../classes/DataGenerator.php";
				$dataRowGenerator = new DataRowGenerator();
				return $dataRowGenerator->getDataRow($data1, $data2);
			}
			
			public static function getStampTime($data1, $data2){
				$dateTime = new DateTime();
				$dateTime->format('Y-m-d H:i:s');
				require "../classes/DataGenerator.php";
				$dataRowGenerator = new DataRowGenerator();
				$endTime = DateTime::createFromFormat('Y-m-d H:i:s', $dataRowGenerator->getDataRow($data1, $data2));
				$dateTime = new DateTime();
				$diffTime = $dateTime->diff($endTime);
				$endTime->format('Y/m/d H:i:s');
				$stampEndTime = strtotime($endTime->format('Y/m/d H:i:s'));
				return $ajaxJsonData = $stampEndTime*1000;
			}
		}

?>
