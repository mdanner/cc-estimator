<?php
/**
 * Main functionality
 **/
function cc_isPostBack()
{
//	return (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') and (basename($_SERVER['HTTP_REFERER']) == $_SERVER['SCRIPT_NAME']);
	return (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST');
}

function cc_display_form()
{
    $return_string = <<<EOS
<form method="post" action="">
    <h3>Current Infrastructure</h3>
    <table>
        <tr>
            <td>Number of Users:</td>
            <td><input type="text" name="userCount"></td>
        </tr>
        <tr>
            <td>Number of Servers:</td>
            <td><input type="text" name="serverCount"></td>
        </tr>
        <tr>
            <td>Average Age of Servers (years):</td>
            <td><input type="text" name="avgServerAge"></td>
        </tr>
    </table>
    <h3>Current Applications</h3>
    <table>
        <tr>
            <td>Email:</td>
            <td>
                <input type="radio" name="appEmail" value="Online">Online email service<br>
                <input type="radio" name="appEmail" value="In-house server">In-house email server<br>
            </td>
        </tr>
        <tr>
            <td>Accounting:</td>
            <td>
                <input type="radio" name="appAcctg" value="Online">Online<br>
                <input type="radio" name="appAcctg" value="In-house server">In-house server<br>
                <input type="radio" name="appAcctg" value="In-house desktop">In-house desktop<br>
                <input type="radio" name="appAcctg" value="Not application">We don't use an accounting programme<br>
            </td>
        </tr>
        <tr>
            <td>Customer Relationship Management (CRM):</td>
            <td>
                <input type="radio" name="appCRM" value="Online">Online<br>
                <input type="radio" name="appCRM" value="In-house server">In-house server<br>
                <input type="radio" name="appCRM" value="In-house desktop">In-house desktop<br>
                <input type="radio" name="appCRM" value="Not applicable">We don't use CRM<br>
            </td>
        </tr>
        <tr>
            <td>Data Backup:</td>
            <td>
                <input type="radio" name="appBackup" value="Online">Online<br>
                <input type="radio" name="appBackup" value="In-house tape backup">In-house tape backup<br>
                <input type="radio" name="appBackup" value="In-house other">In-house other<br>
                <input type="radio" name="appBackup" value="Not applicable">We don't do data backups<br>
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td>Please review your answers and then click this button<br>to calculate your potential savings</td>
            <td><input type="submit" value="Calculate my savings!"></td>
        </tr>
    </table>
</form>
EOS;
    return $return_string;
}

function cc_process_form()
{
    //TODO process the data in the form
    $return_string = <<<EOS
<h3>Your potential savings is 42%!</h3>
<p><a href="contact">Contact us</a> for more information on how you can achieve these savings.<br>
Phone: 09 889 2447<br>
Email: <a href="mailto:cloudcandle@arrowrock.com&subject=Please contact me">cloudcandle@arrowrock.com</a><br>
Or use our convenient <a href="contact">contact form</a>.
</p>
<p>This estimate is based on the following information:</p>
    <table>
        <tr>
            <td>Number of Users:</td>
            <td>{$_POST["userCount"]}</td>
        </tr>
        <tr>
            <td>Number of Servers:</td>
            <td>{$_POST["serverCount"]}</td>
        </tr>
        <tr>
            <td>Average Age of Servers (years):</td>
            <td>{$_POST["avgServerAge"]}</td>
        </tr>
    </table>
    <h3>Current Applications</h3>
    <table>
        <tr>
            <td>Email:</td>
            <td>{$_POST["appEmail"]}</td>
        </tr>
        <tr>
            <td>Accounting:</td>
            <td>{$_POST["appAcctg"]}</td>
        </tr>
        <tr>
            <td>Customer Relationship Management (CRM):</td>
            <td>{$_POST["appCRM"]}</td>
        </tr>
        <tr>
            <td>Data Backup:</td>
            <td>{$_POST["appBackup"]}</td>
        </tr>
    </table>
//<script>
//    document.write('<p><a href="' + document.referrer + '">Edit my calculator settings</a></p>');
//</script>
<p>Click your browser's <strong>Back</strong> button to change your settings and recalculate your savings.</p>
EOS;
    
    return $return_string;
}
?>