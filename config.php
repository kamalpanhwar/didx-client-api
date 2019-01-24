<?php
/*
 * It uses normal userid and password
 * Just replace your userid and password and try apis.
 * These simple script for people who getting problem in using didx.net as they were not willing to 
 * updated their api, so I have provide this to public as they may help. It also transfer data in json
 * =============================================================
 * Provide to help people to use it for creating application
 * developed by Kamal uddin Panhwar http://www.kamalpanhwar.com  kamalpanhwar@gmail.com
 * =============================================================
 */
 */

$user = "__youruserid__"; // it is same portal userid and password
$password ='__yourpassword__';

// Tabular format
$page_top =  '<html><body>';
$table_start = '<table rules="all" style="border-color: #666;" cellpadding="10">';
$table_head_row_start = "<tr style='background: #eee;'>";
$table_head_row_end = "</tr>";
$table_end = "</table>";
$page_end = "</body></html>";

$data_heading_tag = ""; $row_data = "";


function create_table(){
	global $page_top, $data_title, $table_start, $table_head_row_start, $data_heading_tag, $table_head_row_end, $html, $row_data,$table_end;
	$html = $page_top . $data_title . $table_start . $table_head_row_start . $data_heading_tag . $table_head_row_end;
	$html .=  $row_data . $table_end;

return $html;
}
// ChangeSip error
$changeSip_errors = array('-1' => ' User ID does not exist',
'-2'=> 'Your Password is Incorrect',
'-3' => 'This DID is not in your ownership.',
'-4' => 'No such DID Number exists.',
'-5' => 'lease provide a valid value for the fifth parameter'
	);

function Return_changeSip_err($number){
global $changeSip_errors;
	return  $changeSip_errors[$number];
}


// GetRingToType error
$GetRingToType_errors = array(
	'-1' => ' User ID does not exist',
	'-2'=> 'Your Password is Incorrect',
	'-3' => 'This DID is not in your ownership.',
	'-4' => 'No such DID Number exists.',
	'-5' => 'lease provide a valid value for the fifth parameter'
	);

function Return_GetRingToType_err($number){
global $changeSip_errors;
	return  $changeSip_errors[$number];
}

// GetRingToType error
$GetRingAddress_errors = array(
	'-1' => ' User ID does not exist',
	'-2'=> 'Your Password is Incorrect',
	'-3' => 'This DID is not in your ownership.',
	'-4' => 'No such DID Number exists.',
	'-5' => 'lease provide a valid value for the fifth parameter'
	);

function Return_GetRingAddress_err($number){
global $GetRingAddress_errors;
	return  $GetRingAddress_errors[$number];
}

// getDIDMinutesInfo error
$getDIDMinutesInfo_errors = array(
	'-1' => ' User ID does not exist',
	'-2'=> 'Your Password is Incorrect',
	'-3' => 'There are no DID in our Database.',
	);

function Return_getDIDMinutesInfo_err($number){
global $getDIDMinutesInfo_errors;
	return  $getDIDMinutesInfo_errors[$number];
}


// getDIDMinutesInfo error
$getDIDCallLog_errors = array(
	'0' => "Something went wrong!",
	'-1' => ' User ID does not exist',
	'-2'=> 'Your Password is Incorrect',
	'-3' => 'There are no LOG in our Database.',
	);

function Return_getDIDCallLog_err($number){
global $getDIDCallLog_errors;
	return  $getDIDCallLog_errors[$number];
}



// getDIDMinutesInfo error
$getDIDInfo_errors = array(
	'0' => "Something went wrong! 0 error",
	'-2' => ' User ID does not exist',
	'-3'=> 'There are no DID in our Database',
	);

function Return_getDIDInfo_err($number){
global $getDIDInfo_errors;
	return  $getDIDInfo_errors[$number];
}

// getDIDMinutesInfo error
$GetCountriesForBackOrder_errors = array(
	'0' => "Something went wrong! 0 error",
	'-1' => 'Invalid UserID/Password',
	'-2'=> 'Account is not Active',
	'-3'=> 'Invalid account type.',
	'-4'=> 'Invalid quantity provided.',
	'-5'=> 'Insufficient funds to place back order.',

	);

function Return_GetCountriesForBackOrder_err($number){
global $GetCountriesForBackOrder_errors;
	return  $GetCountriesForBackOrder_errors[$number];
}



// getDIDMinutesInfo error
$BuyDIDByNumber_errors = array(
	'0' => "Something went wrong! 0 error",
	'-1' => 'User ID does not exist',
	'-2'=> 'Your Password is Incorrect',
	'-3'=> 'This DID Number is already Sold',
	'-4'=> 'This DID Number is already Reserved',
	'-5'=> 'DID Number doesn\'t exit',
	'-6'=> 'The Country Code does not exist',
	'-20'=> 'Account not active',
	'-22'=> 'Due not cleared',
	'-23'=> 'Customer documents required. See Also Submiting Documents',
	'-24'=> 'This DID is reserved for another customer',
	'-30'=> 'Invalid Account Type',
	'-31'=> 'Rating of this DID is less then the one you have been allowed',
	);

function Return_BuyDIDByNumber_err($number){
global $BuyDIDByNumber_errors;
	return  $BuyDIDByNumber_errors[$number];
}

/**
 * Indents a flat JSON string to make it more human-readable.
 *
 * @param string $json The original JSON string to process.
 *
 * @return string Indented version of the original JSON string.
 */
function indent($json) {

    $result      = '';
    $pos         = 0;
    $strLen      = strlen($json);
    $indentStr   = '  ';
    $newLine     = "\n";
    $prevChar    = '';
    $outOfQuotes = true;

    for ($i=0; $i<=$strLen; $i++) {

        // Grab the next character in the string.
        $char = substr($json, $i, 1);

        // Are we inside a quoted string?
        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;

        // If this character is the end of an element,
        // output a new line and indent the next line.
        } else if(($char == '}' || $char == ']') && $outOfQuotes) {
            $result .= $newLine;
            $pos --;
            for ($j=0; $j<$pos; $j++) {
                $result .= $indentStr;
            }
        }

        // Add the character to the result string.
        $result .= $char;

        // If the last character was the beginning of an element,
        // output a new line and indent the next line.
        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $result .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos ++;
            }

            for ($j = 0; $j < $pos; $j++) {
                $result .= $indentStr;
            }
        }

        $prevChar = $char;
    }

    return $result;
}


