  <head runat="server">  
    <title>Table 2 Excel</title>  
        
    <script src="{{URL::to('js/jquery.min.js')}}" type="text/javascript"></script>  
    <script src="{{URL::to('js/jquery.table2excel.min.js')}}" type="text/javascript"></script>  

</head> 

  <div>  
    <table id="mytable" cellpadding="5" border="1" cellspacing="0">  
        <thead>  
            <tr>  
                <th>  
                    Employee Name  
                </th>  
                <th>  
                    Age  
                </th>  
                <th>  
                    Designation  
                </th>  
                <th>  
                    Experience  
                </th>  
            </tr>  
        </thead>  
        <tbody>  
            <tr>  
                <td>  
                    Rajeev  
                </td>  
                <td>  
                    31  
                </td>  
                <td>  
                    Developer  
                </td>  
                <td>  
                    6  
                </td>  
            </tr>  
            <tr>  
                <td>  
                    Sandhya  
                </td>  
                <td>  
                    27  
                </td>  
                <td>  
                    Tester  
                </td>  
                <td>  
                    2  
                </td>  
            </tr>  
            <tr>  
                <td>  
                    Ramesh  
                </td>  
                <td>  
                    25  
                </td>  
                <td>  
                    Designer  
                </td>  
                <td>  
                    1  
                </td>  
            </tr>  
            <tr>  
                <td>  
                    Sanjay  
                </td>  
                <td>  
                    32  
                </td>  
                <td>  
                    Developer  
                </td>  
                <td>  
                    5  
                </td>  
            </tr>  
            <tr>  
                <td>  
                    Ramya  
                </td>  
                <td>  
                    23  
                </td>  
                <td>  
                    Developer  
                </td>  
                <td>  
                    1  
                </td>  
            </tr>  
        </tbody>  
    </table>  
    <br />  
    <button onclick="exportexcel()">  
        Export to Excel</button>  
</div>  

<script type="text/javascript">  
        function exportexcel() {  
            $("#mytable").table2excel({  
                name: "Table2Excel",  
                filename: "myFileName.xls",  
                fileext: ".xls"  
            });  
        }  
</script>  


