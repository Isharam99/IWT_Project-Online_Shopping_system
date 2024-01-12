function validateform()
{
    var em=document.forms["regform"]["Email"].value;
    var pw=document.forms["regform"]["password"].value;

    if(em>=6)
    {
        alert("Please fill correct email");
        return false;
    }
    else if(pw===null && pw>8)
    {
        alert("Please give strong password");
        return false;
    }
    else{
        alert("You can register");
        return true;
    }

}