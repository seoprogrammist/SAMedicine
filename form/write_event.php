<title>SAMedicine</title>
<?
// ������������ � �� 
include "../config/config.php"; 
$client_id=$_GET['client'];
$event_id=$_GET['event'];
$type_id=$_GET['type'];
$event_type = mysql_query("select * from EventType;");
$event = mysql_query("select * from Event where id=$event_id;");
   while($sel = mysql_fetch_array($event)){
$begDate = $sel['begDate'];
$endDate = $sel['endDate'];
$number = $sel['number'];
$ActionPropertyType = mysql_query("select * from ActionPropertyType;");

}

?>
<form method = "post">
<table>
<tr><td>
<?
   echo "<table border='1' width='100%' height='100%'>";
   echo '<thead>';
     echo '<tr>';
      echo "<td width='10%'> ���� ������</td>";
      echo '<td width=10%> <input type="date" name="begDate" value="' . $begDate . '"> </td>';
      echo '<td width=10%> ���� ���������</td>';
      echo '<td width=10%> <input type="date" name="endDate" value="' . $endDate . '"> </td>';
      echo '<td width=10%> ����� �������</td>';
      echo '<td width=10%> <input type="text" name="number" value="' . $number . '"> </td>';
      echo '</tr>';
      echo '</thead>';
      echo '</table>';
?>  
</td></tr>
<tr><td>
<?php 
if(isset($_POST['button2'])) {
$type = strip_tags(trim($_POST['type']));
$begDate = strip_tags(trim($_POST['begDate']));
$endDate = strip_tags(trim($_POST['endDate']));
$number = strip_tags(trim($_POST['number']));
if(empty($begDate)) 
{}  else {
 if(get_magic_quotes_gpc()) {
$type = stripslashes($type);
$begDate = stripslashes($begDate);
$endDate = stripslashes($endDate);
$number = stripslashes($number);
 }

$query = sprintf("UPDATE `Event` SET begDate='$begDate', endDate='$endDate', number='$number' WHERE id=$event_id");
$upd = mysql_query($query);
echo ($upd) ? '������ ������� ���������' : '������: '.mysql_error();
echo  "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=event.php?client=$client_id'>";
  }
}
?>


<?
    echo '<table border="1" width=100%>';
   echo '<tbody>';
// ������� � HTML-������� ��� ������ �������� �� ������� MySQL 
   while($sel = mysql_fetch_array($ActionPropertyType)){
      echo '<tr>';
      echo '<td width=30%>' . $sel['name'] . '</td>';
      echo '<td></td>';
      echo '</tr>';
   }
    echo '</tbody>';
   echo '</table>';

?>

</td></tr>
<?
      echo '<tr>';
      echo "<td> 
<input type = 'submit' name = 'button1' formaction='event.php?client=$client_id' value = '������'>
<input type = 'submit' name = 'button2' value = '��'>
</td>";
      echo '</tr>';
?>
</table>
<form>

