<html lang="en">

<head>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>


<input type="text" id="date">


<script>



	
var dates = ["20/01/2018", "21/01/2018", "22/01/2018", "23/08/2020"];
 
function DisableDates(date) {
    var string = jQuery.datepicker.formatDate('dd/mm/yy', date);
    return [dates.indexOf(string) == -1];
}
 
$(function() {
     $("#date").datepicker({
         beforeShowDay: DisableDates,
         changeYear: true,
         changeMonth:true,
         dateFormat: 'yy/mm/dd',
         minDate: 0,
         maxDate: '+1Y'
     });
});

</script>
</body>

</html>