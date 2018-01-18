<!DOCTYPE html>
<html>
   <head>
      <title>table2excel</title>
   </head>
   <body>
      <div clas="tableholder">
         <table id="MyTable2export" border="1" cellpadding="5">
            <tr>
               <th>Heading 1</th>
               <th>Heading 2</th>
               <th>Heading 3</th>
               <th>Heading 4</th>
               <th>Heading 5</th>
               <th>Heading 6</th>
               <th>Heading 7</th>
            </tr>
            <tr>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
            </tr>
            <tr>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
            </tr>
            <tr>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
            </tr>
            <tr>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
               <td>Row</td>
            </tr>
         </table>
         <button id="donwload">Download</button>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>
      <script>
      	// button click
      	$('#donwload').on('click',function(){
      		// get the table id
      		$("#MyTable2export").table2excel();
      	});
      </script>
   </body>
</html>