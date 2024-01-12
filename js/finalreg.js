function validateform()
{
    var fn=document.forms["regform"]["firstnname"].value;
    var ln=document.forms["regform"]["lastnname"].value;
    var em=document.forms["regform"]["Email"].value;
    var pw=document.forms["regform"]["password"].value;

    if(fn==null||fn=="")
    {
        alert("First name cannot be blank");
        return false;
    }
    else if(em>=6)
    {
        alert("Please fill correct email");
        return false;
    }
    else if(pw===null && pw>8)
    {
        alert("Please give strong password");
        return false;
    }

}