/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function btnClickHandler()
{
    var client = new XMLHttpRequest();
    var postdata= "action=1&state=1";
    
    
    client.open("POST", "./php/saveClickData.php");
    client.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        
    client.onreadystatechange = function () {
        if (client.readyState == client.DONE && client.status == 200) {
            alert(client.responseText);
        }
    };
    
    client.send(postdata);
    
}

function showDialog()
{
    
    var w = window.innerWidth;
    var h = window.innerHeight;
    
    
    var dialog = document.getElementById("rating_dialog");
    dialog.style.display = "block";
    dialog.style.position = "absolute";
    dialog.style.left = ((w - dialog.offsetWidth) / 2)+"px";
    dialog.style.top = ((h - dialog.offsetHeight) / 2)+"px";
    
    var checkbox = document.getElementById("rating_c_box");
    checkbox.checked = false;
    
    isGamePaused = true;
    
}

function hideRatingDialog()
{
  
    
    var dialog = document.getElementById("rating_dialog");
    dialog.style.display = "none";
    
    isGamePaused = false;
    
}



