<?php

function getTableData($ComplaintId,$ComplainantName,$ComplainantPhNo,$Municipality,$Address,$CATEGORY,$color,$description,$type)
{  if($color=="red")
    {
        $tr_class = "table-danger";
    }
 
    else if($color=="green")
    {
        $tr_class = "table-warning";
    }
 
    
    else if($color=="yellow")
    {
        $tr_class = "table-info";
    }
 
    else if($color=="blue")
    {
        $tr_class = "table-success";
    }
        
    
    $element = "
    <form method=\"post\" action=\"website.php\">
    <tr class=$tr_class>
      <input type=\"hidden\" name=\"complaintId\" value=$ComplaintId><th scope=\"row\">$ComplaintId</th>
     <input type=\"hidden\" name=\"ComplainantName\" value=$ComplainantName> <td>$ComplainantName</td>
      <input type=\"hidden\" name=\"ComplainantPhNo\" value=$ComplainantPhNo><td>$ComplainantPhNo</td>
      <input type=\"hidden\" name=\"Municipality\" value=$Municipality><td>$Municipality</td>
      <input type=\"hidden\" name=\"Address\" value=$Address><td>$Address</td>
      <input type=\"hidden\" name=\"CATEGORY\" value=$CATEGORY><td>$CATEGORY</td>
     <input type=\"hidden\" name=\"desc\" value=$description > <td style=\"display:none\" >$description</td>
     <input type=\"hidden\" name=\"type\" value=$type > <td style=\"display:none\" >$type</td>
      <td><button type = \"submit\" class=\"btn btn-danger\" name=\"action\" >TAKE ACTION</button></td>
     <td><button type = \"submit\" class=\"btn btn-success\" name=\"solved\" >PROBLEM SOLVED</button></td>
    </tr>
    </form>";
       
 echo $element;
}

function getTableDataCommunity($ComplaintId,$ComplainantName,$ComplainantPhNo,$Complainant2Name,$Municipality,$Address,$CATEGORY,$color,$description,$type)
{  if($color=="red")
    {
        $tr_class = "table-danger";
    }
 
    else if($color=="green")
    {
        $tr_class = "table-warning";
    }
 
    
    else if($color=="yellow")
    {
        $tr_class = "table-info";
    }
 
    else if($color=="blue")
    {
        $tr_class = "table-success";
    }
        
    
    $element = "
    <form method=\"post\" action=\"website.php\">
    <tr class=$tr_class>
      <input type=\"hidden\" name=\"complaintId\" value=$ComplaintId><th scope=\"row\">$ComplaintId</th>
     <input type=\"hidden\" name=\"ComplainantName\" value=$ComplainantName> <td>$ComplainantName</td>
      <input type=\"hidden\" name=\"ComplainantPhNo\" value=$ComplainantPhNo><td>$ComplainantPhNo</td>
      <input type=\"hidden\" name=\"Complainant2Name\" value=$Complainant2Name> <td>$Complainant2Name</td>
      <input type=\"hidden\" name=\"Municipality\" value=$Municipality><td>$Municipality</td>
      <input type=\"hidden\" name=\"Address\" value=$Address><td>$Address</td>
      <input type=\"hidden\" name=\"CATEGORY\" value=$CATEGORY><td>$CATEGORY</td>
     <input type=\"hidden\" name=\"desc\" value=$description > <td style=\"display:none\" >$description</td>
     <input type=\"hidden\" name=\"type\" value=$type > <td style=\"display:none\" >$type</td>
      <td><button type = \"submit\" class=\"btn btn-danger\" name=\"action\" >TAKE ACTION</button></td>
     <td><button type = \"submit\" class=\"btn btn-success\" name=\"solved\" >PROBLEM SOLVED</button></td>
    </tr>
    </form>";
       
 echo $element;
}



?>
