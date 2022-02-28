function allLetter(inputtxt)
{
    var letters = /^[A-Za-z]+$/;
    if(letters.test(inputtxt))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function matchemail(inputtext)
{
    var patt = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
    if(patt.test(inputtext))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function allnumber(inputnum)
{
    if(isNaN(inputnum)==false)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function matchmobile(inputtext)
{
    var patt = /^(?:\+88|88)?(01[3-9]\d{8})$/;
    if(patt.test(inputtext))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function validatelogin()
{
    document.getElementById("validateLoginUserName").innerHTML=null;
    document.getElementById("validateLoginPassword").innerHTML=null;
    var uname=document.getElementById("loginUserName").value;
    var password=document.getElementById("loginPassword").value;

    if(uname.length==0)
    {
        document.getElementById("validateLoginUserName").innerHTML="Please input username";
        return false;
    }

    if(password.length==0)
    {
        document.getElementById("validateLoginPassword").innerHTML="Please input password";
        return false;
    }
    return true;
}

function validateregistration()
{
    document.getElementById("validatefname").innerHTML="";
    document.getElementById("validatelname").innerHTML="";
    document.getElementById("validategender").innerHTML="";
    document.getElementById("validateusername").innerHTML="";
    document.getElementById("validatepassword").innerHTML="";
    document.getElementById("validateemail").innerHTML="";
    document.getElementById("validatemobile").innerHTML="";
    document.getElementById("validatedob").innerHTML="";
    document.getElementById("validatepic").innerHTML="";
    
    fname=document.getElementById("fname").value;
    lname=document.getElementById("lname").value;
    username=document.getElementById("username").value;
    password=document.getElementById("password").value;
    email=document.getElementById("email").value;
    mobile=document.getElementById("mobile").value;
    dob=document.getElementById("dob").value;
    
    if(fname.length==0)
    {
        document.getElementById("validatefname").innerHTML="<h4>Please enter first name</h4>";
        return false;
    }
    for(var i=0;i<fname.length;i++)
    {
        if(fname[i]==' ')
        {
            document.getElementById("validatefname").innerHTML="<h4>Name cannot contain space</h4>";
            return false;
        }
    }
    if(allLetter(fname)==false)
    {
        document.getElementById("validatefname").innerHTML="<h4>Only alphabets allowed</h4>";
        return false;
    }
    if(fname[0]>='a' && fname[0]<='z')
    {
        document.getElementById("validatefname").innerHTML="<h4>First letter must be capital</h4>";
        return false;
    }
    if(fname.length<5)
    {
        document.getElementById("validatefname").innerHTML="<h4>Atleast 5 alphabet required</h4>";
        return false;
    }

    if(lname.length==0)
    {
        document.getElementById("validatelname").innerHTML="<h4>Please enter last name</h4>";
        return false;
    }

    for(var i=0;i<lname.length;i++)
    {
        if(lname[i]==' ')
        {
            document.getElementById("validatelname").innerHTML="<h4>Name cannot contain space</h4>";
            return false;
        }
    }

    if(allLetter(lname)==false)
    {
        document.getElementById("validatelname").innerHTML="<h4>Only alphabets allowed</h4>";
        return false;
    }
    if(lname[0]>='a' && lname[0]<='z')
    {
        document.getElementById("validatelname").innerHTML="<h4>First letter must be capital</h4>";
        return false;
    }
    if(lname.length<5)
    {
        document.getElementById("validatelname").innerHTML="<h4>Atleast 3 alphabet required</h4>";
        return false;
    }

    if(document.getElementById("gender").checked==false)
    {
        document.getElementById("validategender").innerHTML="<h4>Must choose 1 option</h4>";
        return false;
    }


    if(username.length==0)
    {
        document.getElementById("validateusername").innerHTML="<h4>Please enter username</h4>";
        return false;
    }
    for(var i=0;i<username.length;i++)
    {
        if(username[i]==' ')
        {
            document.getElementById("validateusername").innerHTML="<h4>Username cannot contain space</h4>";
            return false;
        }
    }
    if(username.length<5)
    {
        document.getElementById("validateusername").innerHTML="<h4>Atleast 5 character required</h4>";
        return false;
    }

    if(password.length==0)
    {
        document.getElementById("validatepassword").innerHTML="<h4>Please enter password</h4>";
        return false;
    }
    if(password.length<8)
    {
        document.getElementById("validatepassword").innerHTML="<h4>Atleast 8 characters required</h4>";
        return false;
    }

    var cnt1=0;
    var cnt2=0;

    for(var i=0;i<password.length;i++)
    {
        if((password[i]>='a' && password[i]<='z') || (password[i]>='A'  && password[i]<='Z'))
        {
            cnt1=cnt1+1;
        }
        if(password[i]>='0' && password[i]<='9')
        {
            cnt2=cnt2+1;
        }
    }

    if(cnt1==0 || cnt2==0)
    {
        document.getElementById("validatepassword").innerHTML="<h4>Password must be a combination of both numbers and letters</h4>";
        return false;
    }

    if(email.length==0)
    {
        document.getElementById("validateemail").innerHTML="<h4>Please enter email</h4>";
        return false;
    }

    if(matchemail(email)===false)
    {
        document.getElementById("validateemail").innerHTML="<h4>Enter a valid email</h4>";
        return false;
    }

    if(mobile.length==0)
    {
        document.getElementById("validatemobile").innerHTML="<h4>Please enter mobile no</h4>";
        return false;
    }

    if(matchmobile(mobile)==false)
    {
        document.getElementById("validatemobile").innerHTML="<h4>Please enter a valid mobile no</h4>";
        return false;
    }
    if(dob.length===0)
    {
        document.getElementById("validatedob").innerHTML="<h4>Please enter date of birth</h4>";
        return false;
    }

    var year=dob[0]+dob[1]+dob[2]+dob[3];
    if(year>2000)
    {
        document.getElementById("validatedob").innerHTML="<h4>Birth year must be greater than 2001</h4>";
        return false;
    }
    
    return true;
}


function validateedit()
{
    document.getElementById("validatefname").innerHTML="";
    document.getElementById("validatelname").innerHTML="";
    document.getElementById("validatepassword").innerHTML="";
    document.getElementById("validateemail").innerHTML="";
    document.getElementById("validatemobile").innerHTML="";
    document.getElementById("validatedob").innerHTML="";
    
    fname=document.getElementById("fname").value;
    lname=document.getElementById("lname").value;
    password=document.getElementById("password").value;
    email=document.getElementById("email").value;
    mobile=document.getElementById("mobile").value;
    dob=document.getElementById("dob").value;
    
    if(fname.length==0)
    {
        document.getElementById("validatefname").innerHTML="<h4>Please enter first name</h4>";
        return false;
    }
    for(var i=0;i<fname.length;i++)
    {
        if(fname[i]==' ')
        {
            document.getElementById("validatefname").innerHTML="<h4>Name cannot contain space</h4>";
            return false;
        }
    }
    if(allLetter(fname)==false)
    {
        document.getElementById("validatefname").innerHTML="<h4>Only alphabets allowed</h4>";
        return false;
    }
    if(fname[0]>='a' && fname[0]<='z')
    {
        document.getElementById("validatefname").innerHTML="<h4>First letter must be capital</h4>";
        return false;
    }
    if(fname.length<5)
    {
        document.getElementById("validatefname").innerHTML="<h4>Atleast 5 alphabet required</h4>";
        return false;
    }

    if(lname.length==0)
    {
        document.getElementById("validatelname").innerHTML="<h4>Please enter last name</h4>";
        return false;
    }

    for(var i=0;i<lname.length;i++)
    {
        if(lname[i]==' ')
        {
            document.getElementById("validatelname").innerHTML="<h4>Name cannot contain space</h4>";
            return false;
        }
    }

    if(allLetter(lname)==false)
    {
        document.getElementById("validatelname").innerHTML="<h4>Only alphabets allowed</h4>";
        return false;
    }
    if(lname[0]>='a' && lname[0]<='z')
    {
        document.getElementById("validatelname").innerHTML="<h4>First letter must be capital</h4>";
        return false;
    }
    if(lname.length<5)
    {
        document.getElementById("validatelname").innerHTML="<h4>Atleast 3 alphabet required</h4>";
        return false;
    }

    if(password.length==0)
    {
        document.getElementById("validatepassword").innerHTML="<h4>Please enter password</h4>";
        return false;
    }
    if(password.length<8)
    {
        document.getElementById("validatepassword").innerHTML="<h4>Atleast 8 characters required</h4>";
        return false;
    }

    var cnt1=0;
    var cnt2=0;

    for(var i=0;i<password.length;i++)
    {
        if((password[i]>='a' && password[i]<='z') || (password[i]>='A'  && password[i]<='Z'))
        {
            cnt1=cnt1+1;
        }
        if(password[i]>='0' && password[i]<='9')
        {
            cnt2=cnt2+1;
        }
    }

    if(cnt1==0 || cnt2==0)
    {
        document.getElementById("validatepassword").innerHTML="<h4>Password must be a combination of both numbers and letters</h4>";
        return false;
    }

    if(email.length==0)
    {
        document.getElementById("validateemail").innerHTML="<h4>Please enter email</h4>";
        return false;
    }

    if(matchemail(email)===false)
    {
        document.getElementById("validateemail").innerHTML="<h4>Enter a valid email</h4>";
        return false;
    }

    if(mobile.length==0)
    {
        document.getElementById("validatemobile").innerHTML="<h4>Please enter mobile no</h4>";
        return false;
    }

    if(matchmobile(mobile)==false)
    {
        document.getElementById("validatemobile").innerHTML="<h4>Please enter a valid mobile no</h4>";
        return false;
    }
    if(dob.length===0)
    {
        document.getElementById("validatedob").innerHTML="<h4>Please enter date of birth</h4>";
        return false;
    }

    var year=dob[0]+dob[1]+dob[2]+dob[3];
    if(year>2000)
    {
        document.getElementById("validatedob").innerHTML="<h4>Birth year must be greater than 2001</h4>";
        return false;
    }
    
    return true;
}

function showResult()
{
    var id=document.getElementById("id").value;
    var name=document.getElementById("name").value;

    if(id.length==0 && name.length==0)
    {
        document.getElementById("result").innerHTML="";
    }
    else
    {
        if(allnumber(id)==false)
        {
            document.getElementById("result").innerHTML="<b>Id must be integer<b>";
            return;
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("result").innerHTML = this.responseText;
            }
            else
            {
                document.getElementById("result").innerHTML = this.status;
            }
        };
        xhttp.open("POST", "../control/admin_search_control.php", true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send("id="+id+"&name="+name);
    }
}

var colors = ['purple', 'yellow', 'orange', 'brown', 'white','orangered'];
var f=document.getElementById('changeback1');
var cnt=0;
$(document).ready(function(){
   
    //$("#homename").hide();
    //$("#slideshow1").hide(2000);
    $("#slideshow1").slideDown(2000);
    $("#msg").css("color","white");
    $("#changeback1").show(function myloop(){
        color=colors.shift();
        colors.push(color);
        f.style.color=color;
        cnt=cnt+1;
        if(cnt<12)
            setInterval(myloop,1000);
    });
    $("#homename").fadeIn(4000);
    $("#hide1").click(function(){
        $(".table1").hide(1000);
    });
    $("#show1").click(function(){
        $(".table1").show(1000);
    });

    $("#id").keydown(function(){
        var x = $("#msg");  
        x.css("color","green");
      });

    $("#id").keyup(function(){
        var x = $("#msg");  
        x.css("color","white");
    });

    $("#name").keydown(function(){
        var x = $("#msg");  
        x.css("color","blue");
      });

    $("#name").keyup(function(){
        var x = $("#msg");  
        x.css("color","white");
    });
});
