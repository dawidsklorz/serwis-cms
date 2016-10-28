$(function()
{
    $('.visibility').bind('click', function(e)
    {
        var icon = $(this).find("i");
        var that = $(this);
        
        var request = $.ajax({
            url: "?controller=Article&action=changeVisibility",
            type: "POST",
            data: {
                id: $(this).attr("data-id")
            },
            success: function(html) 
            {
                if(icon.hasClass("ion-android-checkbox-outline-blank"))
                {
                    icon.removeClass("ion-android-checkbox-outline-blank");
                    icon.addClass("ion-android-checkbox-outline");
                }
                else
                {
                    icon.removeClass("ion-android-checkbox-outline");
                    icon.addClass("ion-android-checkbox-outline-blank");
                }
            }
        });
        e.preventDefault();
    });
});
