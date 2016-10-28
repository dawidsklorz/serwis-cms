$(function()
{
    function redirect(to, delay)
    {
      window.setTimeout(function() {
      window.location.href = to;
    }, delay);
    }

    $('#signin').after('<p><div id="info"></div></p>');

    $('#signin').on('submit', function(e) 
    {
        var email = $("#email").val();
        var pass = $("#pass").val();
        var error = 0;
        
        var request = $.ajax(
        {
            url: "?controller=User&action=loginProcess",
            type: "POST",
            datatype: "json",
            data: {
                email: email,
                pass: pass
            },
            success: function(html) 
            {
                var array = $.parseJSON(html);

                if(array['status'] == true)
                {
                    $('#info').addClass('alert alert-success').html(array['message']).css("color", "black").css("background-color", "rgba(0, 179, 0, 0.8)");
                    redirect('?controller=Homepage&action=index', 1500);
                }
                else if(array['status'] == false)
                {
                    $('#email').removeAttr("style");
                    $('#pass').removeAttr("style").val("");

                    var text="";
                    for(var i in array.errors)
                    {
                        if(text != array.errors[i] + "<br>")
                        {
                            text = text + array.errors[i] + "<br>";
                        }
                        $('#' + i).css("border", "2px solid red");
                    }
                    $('#info').addClass('alert alert-error').html(text).css("color", "black").css("background-color", "rgba(255, 0, 0, 0.8)");
                }
            }     
        });
        e.preventDefault();
    });
});
